<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{ 
    use HasFactory;

    protected $fillable = [ 
        'id',
         'is_company',
         'name',
         'company_name',
         'nif',
         'email',
         'email_notifications',     ];
    
    public function users()
    {
        return $this->hasMany(User::class)->get();
    }
    // public function address()
    // {
    //     return $this->belongsToMany('App\Address','company_addresses','company_id','address_id');
    // }
}

