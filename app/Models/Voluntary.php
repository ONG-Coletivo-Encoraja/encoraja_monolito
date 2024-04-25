<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntary extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'date_birthday',
        'image_term',
        'data_term',
        'availability',
        'course_experience',
        'how_know',
        'expectations'
    ];
}
