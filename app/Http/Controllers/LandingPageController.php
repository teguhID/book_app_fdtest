<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\Books;

class LandingPageController extends Controller
{
    public function __construct() {}

    function index(Request $request)
    {
        $title = $request->input('title');
        $author = $request->input('author');
        $minRating = $request->input('min_rating');
        $maxRating = $request->input('max_rating');

        $query = Books::query();

        if ($title !== null && $title !== '') {
            $query->where('title', 'LIKE', '%' . $title . '%');
        }

        if ($author !== null && $author !== '') {
            $query->where('author', 'LIKE', '%' . $author . '%');
        }

        if ($minRating !== null && $minRating !== '') {
            $query->where('rating', '>=', $minRating);
        }

        if ($maxRating !== null && $maxRating !== '') {
            $query->where('rating', '<=', $maxRating);
        }

        $sortColumn = $request->input('sort', 'id_books');
        $sortDirection = $request->input('direction', 'desc');

        $allowedColumns = ['id_books', 'title', 'author', 'rating', 'created_at'];
        if (!in_array($sortColumn, $allowedColumns)) {
            $sortColumn = 'id_books';
        }

        $query->orderBy($sortColumn, $sortDirection);

        $perPage = $request->input('per_page', 5);

        $books = $query->paginate($perPage)
            ->appends($request->query());

        return view('landing_page.index', compact('books'));
    }
}
