<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'is_street', 
        'is_avenue',
        'city', 
        'postal_code', 
        'country', 
        'is_billing_address',
   ];


      public function user()
   {
       return $this->belongsToMany('App\User','user_addresses','address_id','user_id');
   }

    public function company()
   {
       return $this->belongsToMany('App\Address','company_addresses','address_id','company_id');
   }
}
 