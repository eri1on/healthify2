<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userDiet extends Model
{
    

    protected $table='user_diet';
    protected $primaryKey='diet_id';
    use HasFactory;
    protected $fillable=[

        'fk_signUp_id',
        'week_start_date',
        'week_end_date',
    ];
}
