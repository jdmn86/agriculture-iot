<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoreInfo extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'id', 'name' , 'email','phone' ,'message'
   ];
}
 