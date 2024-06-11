<?php

namespace App\Livewire\Task;

use App\Models\Tag;
use App\Models\Task;
use App\Models\TaskTag;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class TagManager extends Component
{
    public $task;
    public $name;
    public $tag;
    #[On('completed')]
    public function render()
    {
        $tags = Auth::user()->tags;
        return view('livewire.tag.index', compact('tags'));
    }

    public function addTag($id)
    {
        $this->validate(
            [
                'name' => ['required', 'max:24', 'min:4'],
            ],
            [
                'name.required' => 'Tag name is required',
                'name.max' => 'Tag name can not be more than 24 characters',
                'name.min' => 'Tag name can not be less than 4 characters',
            ]
        );
        $tag = Tag::firstOrCreate([
            'name' => $this->name,
            'slug' => str_replace(' ', '_', $this->name),
            'user_id' => auth()->user()->id
        ]);
        $task = Task::find($id);
        TaskTag::firstOrCreate([
            'tag_id' => $tag->id,
            'task_id' => $task->id
        ]);
        $this->reset(['name']);
    }

    public function removeTag($task_id, $tag_id)
    {
        $task = Task::find($task_id);
        $task->tags()->detach($tag_id);
        // $this->dispatch('completed');
    }
}