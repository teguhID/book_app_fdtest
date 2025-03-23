<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\Books;

class BooksController extends Controller
{
    public function __construct() {}

    function index()
    {
        $data = Books::orderby('updated_at', 'DESC')->get();
        return view('books.index')->with('data', $data);
    }

    function add(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'description' => 'nullable|string',
                'rating' => 'nullable|numeric|min:0|max:5',
            ]);

            $imagePath = '';

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->storeAs('images', $imageName, 'public');
                $imagePath = 'images/' . $imageName;
            }

            Books::create([
                'cover' => $imagePath,
                'title' => $validatedData['title'],
                'author' => $validatedData['author'],
                'description' => $validatedData['description'],
                'rating' => $validatedData['rating'],
            ]);

            return redirect()->back()->with('success', 'Data added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('books');
    }

    function detail($id_books)
    {
        $data = [];

        try {
            $data = Books::where('id_books', $id_books)->first();
        } catch (\Exception $e) {
            $data = [];
        }

        return $data;
    }

    function edit(Request $request, $id_books)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'description' => 'nullable|string',
                'rating' => 'nullable|numeric|min:0|max:5',
            ]);

            $book = Books::findOrFail($id_books);

            $data = [
                'title' => $validatedData['title'],
                'author' => $validatedData['author'],
                'description' => $validatedData['description'],
                'rating' => $validatedData['rating'],
            ];

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                if ($book->cover) {
                    Storage::disk('public')->delete($book->cover);
                }

                $imageName = time() . '.' . $request->image->extension();
                $request->image->storeAs('images', $imageName, 'public');
                $imagePath = 'images/' . $imageName;

                $data['cover'] = $imagePath;
            }

            $book->update($data);

            return redirect()->back()->with('success', 'Data updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('books');
    }

    function delete(Request $request, $id_books)
    {
        try {
            $book = Books::findOrFail($id_books);
            Storage::disk('public')->delete($book->cover);

            Books::where('id_books', $id_books)->delete();
            session()->flash('success', 'Data delete successfully');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('books');
    }
}
