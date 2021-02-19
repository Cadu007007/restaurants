<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $table = 'restaurants';
    protected $fillable = [
        'owner_name', 'image', 'restaurant_name', 'type',
        'all_day', 'phone_number', 'whatsapp', 'instagram', 'website', 'description',
    ];

}
