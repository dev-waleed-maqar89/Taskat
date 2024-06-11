<div>
    <form wire:submit.prevent='store'>
        <div class="form-group">
            <input type="text" name="name" placeholder="Enter new task" class="form-control" wire:model='name'>
            @error('name')
            <div class="text text-danger">
                * {{ $message }}
            </div>
            @enderror
        </div>
    </form>
    {{$tasks->links('vendor.livewire.custom-pagination')}}

    @forelse ($tasks as $task)
@include('livewire.task.show')
    @empty
        <div class="alert alert-danger">
            No tasks yet.
        </div>
    @endforelse
</div>
