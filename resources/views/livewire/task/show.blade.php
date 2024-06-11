@include('livewire.task.details')


@if ($show_id == $task->id)
    <div class="single-task-steps">
        <button class="btn btn-danger float-right" wire:click='hide' wire:key="{{ $task->id }}">X</button>

        @if ($editable)
            @include('livewire.task.edit')
        @else
            @include('livewire.task.details')
        @endif
        <span class="text text-secondary btn" wire:click='edit({{ $task->id }})'>
            {{ $this->editable ? 'End editing' : 'Edit' }}
        </span>
        <span class="text text-danger btn" wire:click='destroy({{ $task->id }})'>Del</span>

        @livewire('task.tag-manager', ['task' => $task], key('tags_for_' . $task->id))
        @livewire('task.step-manager', ['task' => $task], key($task->id))

    </div>
@else
@endif
