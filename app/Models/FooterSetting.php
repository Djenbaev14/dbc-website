<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FooterSetting extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded = ['id'];

    protected $casts = [
        'copyright' => 'array',
    ];
    protected $translatable = ['copyright'];
}
