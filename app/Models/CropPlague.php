<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropPlague extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'crop_id',  
        'plague_id',
        'user_id'
   ];

   public function crop()
   {
       return $this->belongsTo(Crop::class,'crop_id'); 
   }
   public function plague()
   {
       return $this->belongsTo(Plague::class,'plague_id');
   }

    public function user()
   {
       return $this->belongsTo(User::class,'user_id');
   }
}
  