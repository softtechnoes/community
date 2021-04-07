<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'user_id',
        'company_name',
        'company_address',
        'office_area',
        'company_city',
        'company_state',
        'company_country',
        'office_phone',
        'company_email',
        'company_website',
        'company_image',
        'category_id',
        'subcategory_id',
    ];


    public function Users() {
        return $this->hasMany(User::class);
    }
}
