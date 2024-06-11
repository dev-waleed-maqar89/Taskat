<?php

namespace App\Livewire\Task;

use App\Models\Step;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class StepManager extends Component
{
    public $name;
    public $task;
    public $id;
    public $updatedName;
    #[On('completed')]
    public function render()
    {

        return view('livewire.steps.index');
    }
    public function store($id)
    {
        $this->validate([
            'name' => ['required', 'max:40', 'min:4'],
        ]);
        $task = Task::find($id);
        Step::create([
            'name' => $this->name,
            'task_id' => $id
        ]);
        $task->completed = 0;
        $task->save();
        $this->reset(['name']);
        $this->dispatch('completed');
    }

    public function complete($id)
    {
        $step = Step::find($id);
        $task = $step->task;
        if ($step->completed != 0) {
            $step->completed = 0;
            $step->save();
            $task->completed = 0;
            $task->save();
        } else {
            $step->completed = 1;
            $step->save();
            if ($task->totally_completed) {
                $task->completed = 1;
                $task->save();
            }
        }
        $this->dispatch('completed');
    }
    public function edit($id)
    {
        if ($this->id != $id) {
            $this->id = $id;
            $step = Step::find($id);
            $this->updatedName = $step->name;
        } else {
            $this->reset(['updatedName', 'id']);
        }
    }

    public function update($id)
    {
        $this->validate([
            'updatedName' => ['required', 'max:40', 'min:4'],
        ]);
        $step = Step::find($id);
        $step->name = $this->updatedName;
        $step->save();
        $this->reset(['updatedName', 'id']);
    }
    public function destroy($id)
    {
        $step = Step::find($id);
        $task = $step->task;
        $step->delete();
        if ($task->totally_completed) {
            $task->completed = 1;
            $task->save();
            $this->dispatch('completed');
        }
    }
}