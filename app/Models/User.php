<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\CompanyProfile;
use App\Models\NativeProfile;
use App\models\Addmember;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public  function Roles() {
        return $this->belongsTo(Role::class);
    }

    public function CompanyProfile()
    {
        return $this->belongsTo(CompanyProfile::class, 'id', 'user_id');
    }

    public function ResidenceProfile() {
        return $this->belongsTo(ResidenceProfile::class, 'id', 'user_id');
    }

    public function Categories() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function Native() {
        return $this->belongsTo(NativeProfile::class, 'id', 'user_id');
    }

    public function Addmembers() {
        return $this->belongsTo(Addmember::class, 'id', 'user_id');
    }
}
