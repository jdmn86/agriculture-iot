<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlagueType extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'typePlague',
        'name',
        'created_at'
    ]; 
}
 