<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    public function __construct() {}

    function index()
    {
        $data = User::orderby('updated_at', 'DESC')->get();
        return view('users.index')->with('data', $data);
    }
}
