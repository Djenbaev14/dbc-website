<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CompanyStat extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded = ['id'];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'experience_years' => 'integer',
        'specialists_count' => 'integer',
        'clients_count' => 'integer',
        'projects_count' => 'integer',
    ];
    
    public $translatable=['title', 'description'];
}
