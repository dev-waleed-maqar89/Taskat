<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'task_id',
        'completed'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}