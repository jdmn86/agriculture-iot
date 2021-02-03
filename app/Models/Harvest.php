<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    use HasFactory;

     protected $fillable = [ 
        'id', 
        'crop_id' , 
        'user_id', 
        'kg',
        'hectars',
        'created_at'
        
   ]; 

    public function user() 
   {
       return $this->belongsTo(User::class,'user_id');
   }

   public function crop()
   {
       return $this->belongsTo(Crop::class,'crop_id');
       //->with('farm'); 
       // return $this->belongsTo(Company::class,'farm_company','id'); 

   }
}

