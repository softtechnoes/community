<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addmember extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'member_name',
        'member_relation',
        'member_contact',
        'member_image',
        'member_address',
        // 'member_city',
        'member_pincode',
        'member_gender',
    ];

    public function Users() {
        return $this->hasMany(User::class);
    }
}
