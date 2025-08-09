<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Advantage extends Model
{
    use HasFactory,HasTranslations;

    protected $guarded=['id'];
    protected $casts =[
        'icon' => 'string',
        'header' => 'array',
        'description' => 'array',
    ];
    public $translatable=['header', 'description'];
}
