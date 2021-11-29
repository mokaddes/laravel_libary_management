<?php

namespace App\Models;
use App\Models\User;
use App\Models\Book;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $table = 'rents';
    protected $fillable = [
        'user_id',
        'book_id',
        'issue_date',
        'return_date',
        'is_return'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
       return $this->belongsTo(Book::class);
    }
}
