<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NativeProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'native_address',
        'native_pincode',
        'committe_member',
        'committe_role',
        'committe_order',
    ];

    public function Users() {
        return $this->hasMany(User::class);
    }
}
