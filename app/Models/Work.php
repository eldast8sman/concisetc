<?php

namespace App\Models;

use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;

class Work extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'slug',
        'title',
        'summary',
        'problem',
        'solution',
        'conclusion',
        'work_url',
        'tags',
        'service1',
        'service2',
        'service3',
        'service4'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->usingSeparator('_');
    }
}
