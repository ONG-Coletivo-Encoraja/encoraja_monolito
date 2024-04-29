<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
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
        'data_term'
    ];

    public function search_user_by_name($search){
        if($search){
            $users = User::with('permissions')->where([
                ['name','like', '%'.$search.'%']
            ])->get();
        }else {
            $users = User::with('permissions')->get();
        }
        return $users;
    }
}
