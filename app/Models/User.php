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
        'company_id',
        'blocked'
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

       public function company()
    {
        return $this->belongsTo(Company::class,'company_id','id'); 
    }


      // protected $with = ['roles'];


    // public function all_permissions()
    // {
    //     return $this->getPermissionNames();
    // }

    //   public function roles()
    // {
    //     return Auth::user() ->roles ->pluck('name') ->toArray() 
    // }
    //  protected $guard_name = 'api';
    
  

    //      public function role()
    // {
    //     // return $this->hasMany(Role::class); 
    //     return Auth::user()->role()
    // }

    //      public function permissions()
    // {
    //     return $this->hasMany(Permission::class,'id'); 
    // }

 // $permissionNames = $user->getPermissionNames();
 // $roles = $user->getRoleNames();

     protected $appends = ['all_permissions'];
    
    public function getAllPermissionsAttribute() {
        $permissions = []; 
          foreach (Permission::all() as $permission) {
            if (Auth::user()->can($permission->name)) {
              $permissions[] = $permission->name;
            }
          }
          return $permissions;
      }

}
