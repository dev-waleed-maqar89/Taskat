<div>
    <span @class(['h4', 'completed' => $step->completed])>{{ $step->name }}</span>
    <span class="text text-secondary btn" wire:click='edit({{ $step->id }})'>Edit</span>
    <span wire:click='complete({{ $step->id }})' wire:key={{ $step->id }}
        @class(['complete-check', 'uncompleted' => !$step->completed])>{{ $step->completed ? '✅' : '' }}</span>
    <span class="btn text text-danger" wire:click="destroy({{ $step->id }})">x</span>
</div>
