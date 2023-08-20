<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{


   protected $table='contact';
    use HasFactory;

    protected $fillable=[

    'firstName',
    'email',
    'phone',
    'message',
    'fk_signUp_id',

    ];


}
