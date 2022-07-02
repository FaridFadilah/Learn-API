<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory,
    Illuminate\Database\Eloquent\Model;

class Book extends Model{
    use HasFactory;

    protected $fillable = ["name", "description", "publication_year"];


    // public function Author(){
    //     return $this->hasMany(Author::class);
    // }
}
