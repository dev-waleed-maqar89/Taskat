<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'user_id'
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_tags', 'tag_id', 'task_id');
    }
}