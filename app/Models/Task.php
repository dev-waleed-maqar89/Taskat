<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'completed',
        'user_id'
    ];

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function getTotallyCompletedAttribute()
    {
        $stepCount = $this->steps->count();
        $Completedcount = $this->steps->where('completed', 0)->count();

        if ($stepCount == 0 || $Completedcount != 0) {
            return false;
        }
        return true;
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'task_tags', 'task_id', 'tag_id');
    }
}