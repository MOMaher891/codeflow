<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'category',
        'thumbnail',
        'description',
        'tech_stack',
        'live_demo',
        'github',
        'plans',
        'images',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tech_stack' => 'array',
            'plans' => 'array',
            'images' => 'array',
        ];
    }
}
