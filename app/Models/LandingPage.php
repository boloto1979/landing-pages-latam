<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'primary_color',
        'secondary_color',
        'logo',
        'tags',
        'content',
        'meta_title',
        'meta_description',
        'meta_tags',
    ];

    protected $casts = [
        'content' => 'json',
        'tags' => 'array',
        // 'meta_tags' => 'array',
    ];
}
