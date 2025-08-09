<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory,HasTranslations;
    
    protected $guarded=['id'];
    protected $casts =[
        'photo' => 'string',
        'name' => 'array',
    ];
    public $translatable=['name'];
}
