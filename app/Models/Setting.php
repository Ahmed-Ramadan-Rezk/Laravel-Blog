<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use  HasFactory;


    protected $fillable = [
        'site_name',
        'site_logo',
        'facebook',
        'twitter',
        'github',
        'phone',
        'address',
        'about_title',
        'about_content'
    ];
}
