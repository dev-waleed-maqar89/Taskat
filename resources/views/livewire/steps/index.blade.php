<div class="">
    <form action="" class="mt-4" wire:submit.prevent='store({{ $task->id }})'>
        <div class="form-group">
            <input type="text" name="step" placeholder="Enter new step" class="form-control" wire:model="name">
            @error('name')
                <div class="text text-danger">
                    * {{ $message }}
                </div>
            @enderror
        </div>
    </form>
    @forelse ($task->steps as $step)
        @if ($id == $step->id)
            @include('livewire.steps.edit')
        @else
            @include('livewire.steps.show')
        @endif
    @empty
    @endforelse

</div>
