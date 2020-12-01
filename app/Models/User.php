<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Passport\HasApiTokens;
use Illuminate\Auth\Passwords\CanResetPassword;

use Spatie\Permission\Traits\HasRoles;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     protected $appends = ['all_permissions'];

    
     public function Company()
    {
        return $this->belongsTo(Company::class,'company_id','id'); 
    }

    public function getAllPermissionsAttribute() {
        $permissions = []; 
          foreach (Permission::all() as $permission) {
            if (Auth::user()->can($permission->name)) {
              $permissions[] = $permission->name;
            }
          }
          return $permissions;
      }

      // public function getCanAttribute()
      // {
      //     $permissions = [];
      //     foreach (Permission::all() as $permission) {
      //         if (Auth::user()->can($permission->name)) {
      //             $permissions[$permission->name] = true;
      //         } else {
      //             $permissions[$permission->name] = false;
      //         }
      //     }
      //     return $permissions;
      // }

}
