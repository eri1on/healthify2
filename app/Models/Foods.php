<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    protected $table='foods';
 protected $primaryKey = 'food_id';//By default, Laravel assumes that the primary key column in the table is named id, and that way we added this line of code 
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
