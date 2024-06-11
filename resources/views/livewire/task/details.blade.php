<div>
    <span @class(['h4 single-task-name', 'completed' => $task->completed]) wire:click="show({{ $task->id }})">{{ $task->name }}</span>
    <span wire:click='complete({{ $task->id }})' wire:key={{ $task->id }}
        @class(['complete-check', 'uncompleted' => !$task->completed])>{{ $task->completed ? '✅' : '' }}</span>
</div>
