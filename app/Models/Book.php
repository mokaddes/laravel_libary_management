<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $fillable = [
        'name', 'author',
    ];
    protected $guarded = [];

    public function rent()
    {
       return $this->hasMany(Rent::class);
    }
}
