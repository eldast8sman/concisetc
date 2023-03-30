<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'problem',
        'solution',
        'conclusion',
        'work_url',
        'tags'
    ];
}
