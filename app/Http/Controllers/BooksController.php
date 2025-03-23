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
            $imagePath = '';

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->storeAs('images', $imageName, 'public');
                $imagePath = 'images/' . $imageName;
            }

            $data = [
                'cover' => $imagePath ? $imagePath : '',
                'title' => $request->title,
                'author' => $request->author,
                'description' => $request->description,
                'rating' => $request->rating,
            ];

            Books::create($data);
            session()->flash('success', 'Data add successfully');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
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

            $data = [
                'title' => $request->title,
                'author' => $request->author,
                'description' => $request->description,
                'rating' => $request->rating,
            ];

            if ($request->hasFile('image') && $request->file('image')->isValid()) {

                $book = Books::findOrFail($id_books);

                Storage::disk('public')->delete($book->cover);

                $imageName = time() . '.' . $request->image->extension();
                $request->image->storeAs('images', $imageName, 'public');
                $imagePath = 'images/' . $imageName;

                $data['cover'] = $imagePath;
            }

            Books::where('id_books', $id_books)->update($data);
            session()->flash('success', 'Data update successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
            session()->flash('error', $e->getMessage());
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
