<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded = ['id'];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'images' => 'array',
    ];
    protected $translatable = ['name', 'description'];
}
