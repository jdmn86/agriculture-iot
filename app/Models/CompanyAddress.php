<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    use HasFactory;

    protected $fillable = [
     'id',
     'company_id',
     'address_id', 
     ];

      public function company()
	{
	    return $this->belongsTo(Company::class,'company_id');
	    // return $this->belongsTo(Plant::class,'id','plants_id');
	}
	public function address()
	{
	    return $this->belongsTo(Address::class,'address_id');
	    // return $this->belongsTo(Praga::class,'id','pragas_id');
	}
}
 