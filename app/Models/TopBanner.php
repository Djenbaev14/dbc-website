<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TopBanner extends Model
{
    use HasFactory,HasTranslations;
    
    protected $guarded = ['id'];

    protected $casts =[
        'title' => 'array',
        'description' => 'array',
        'button_text' => 'array',
    ];
    public $translatable=['title','description','button_text'];

}
