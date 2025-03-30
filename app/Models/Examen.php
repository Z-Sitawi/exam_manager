<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    /** @use HasFactory<\Database\Factories\ExamenFactory> */
    use HasFactory;
    protected $fillable = [
        'code_module',
        'titre_module',
        'filiere',
        'type',
        'duree',
        'date_examen'

    ];
}
