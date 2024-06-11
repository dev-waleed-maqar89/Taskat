<form wire:submit.prevent='update({{ $task->id }})' style="width: 80%">
    <div class="form-group">
        <input type="text" name="name" placeholder="Enter task name" value="Test" class="form-control"
            wire:model='updatedName'>
        @error('updatedName')
            <div class="text text-danger">
                * {{ $message }}
            </div>
        @enderror
    </div>
</form>
