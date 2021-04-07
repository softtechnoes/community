<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenceProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'area',
        'address',
        'city',
        'pincode',
        'primary_phone',
        'secondary_phone',
        'country',
    ];


    public function Users() {
        return $this->hasMany(User::class);
    }

}
