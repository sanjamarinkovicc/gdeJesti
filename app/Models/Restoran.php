<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restoran extends Model
{
    use HasFactory;    public $timestamps = false;

    protected $fillable = ['ime', 'opis', 'adresa', 'slika','grad','cena'];

}
