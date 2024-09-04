<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'header',
        'desc',
        'title_card_one',
        'title_card_two',
        'image_card_one',
        'image_card_two',
        'desc_card_one',
        'desc_card_two',
    ];
}
