<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

class ChurchProfile extends Model
{
    protected $table = 'church_profile';

    protected $fillable = [
        'name',
        'logo',
        'address',
        'city',
        'country',
        'phone',
        'email',
        'website',
        'founded_year',
        'denomination',
        'timezone',
        'currency',
    ];
}