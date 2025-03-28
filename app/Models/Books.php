<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'id_books';
    protected $fillable = [
        'id_books',
        'cover',
        'title',
        'author',
        'description',
        'rating',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];
}
