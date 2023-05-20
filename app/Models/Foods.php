<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    Protected $table='foods';
    use HasFactory;
    protected $fillable = [
        'nameOfFood',
        'category',
        'proteins',
        'vitamins',
        'calories',
        'carbohydrates',
        
    ];
    
}
