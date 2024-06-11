<?php

namespace App\Livewire\Task;

use App\Models\Step;
use App\Models\Tag;
use App\Models\Task;
use App\Models\TaskTag;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TaskManager extends Component
{
    use WithPagination;
    public $show_id;
    public $name;
    public $updatedName;
    public $tag;
    public $editable;
    #[On('completed')]
    public function render(Request $request)
    {
        $tasks = auth()->user()->tasks()->orderBy('created_at', 'desc')->paginate(5);

        if ($request->tag) {
            $this->tag = $request->tag;
        }
        if ($this->tag) {
            $tasks = auth()->user()->tasks()->whereHas('tags', function ($query) {
                $query->where('slug', $this->tag);
            })->orderBy('created_at', 'desc')->paginate(5);
        }
        return view('livewire.task.index', compact('tasks'));
    }

    public function store()
    {
        $this->validate([
            'name' => ['required', 'max:80', 'min:4'],
        ]);
        Task::create([
            'name' => $this->name,
            'user_id' => auth()->user()->id
        ]);
        $this->reset(['name']);
    }

    public function edit($id)
    {
        $task = Task::find($id);
        $this->updatedName = $task->name;
        $this->editable = !$this->editable;
    }
    public function update($id)
    {
        $this->validate(
            [
                'updatedName' => ['required', 'max:80', 'min:4'],
            ],
            [
                'updatedName.required' => 'You must enter a task name',
            ]
        );
        $task = Task::find($id);
        $task->name = $this->updatedName;
        $task->save();
        $this->reset(['updatedName', 'editable']);
    }

    public function complete($id)
    {
        $task = Task::find($id);
        $steps = $task->steps;
        if ($task->completed != 0) {
            $task->completed = 0;
            $task->save();
            foreach ($steps as $step) {
                $step->completed = 0;
                $step->save();
            }
        } else {
            $task->completed = 1;
            $task->save();
            foreach ($steps as $step) {
                $step->completed = 1;
                $step->save();
            }
        }
        $this->dispatch('completed');
    }

    public function show($id)
    {
        $this->reset(['show_id', 'editable']);
        $this->show_id = $id;
    }

    public function hide()
    {
        $this->reset(['show_id', 'editable']);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        $this->reset(['show_id']);
    }
}
