<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Books;

class BooksController extends Controller
{
    public function __construct() {}

    function list()
    {
        $data = Books::all();
        return view('admin.master.role.list')->with('data', $data);
    }

    function add_view()
    {
        return view('admin.master.role.add');
    }

    function detail()
    {
        return view('admin.master.role.detail');
    }

    function post(Request $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'desc' => $request->desc,
            ];

            Books::create($data);
            session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.role.list');
    }

    function edit_view($id_role)
    {
        $data = Books::where('id_role', $id_role)->first();
        return view('admin.master.role.ubah')->with('data', $data);
    }

    function edit(Request $request, $id_role)
    {
        try {
            $data = [
                'name' => $request->name,
                'desc' => $request->desc,
            ];

            Books::where('id_role', $id_role)->update($data);
            session()->flash('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.role.list');
    }

    function delete($id_role)
    {
        try {
            Books::where('id_role', $id_role)->delete();
            session()->flash('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.role.list');
    }
}
