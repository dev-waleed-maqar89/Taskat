<form action="" class="mt-4" wire:submit.prevent='update({{ $step->id }})' style="width: 80%;">
    <div class="form-group">
        <input type="text" name="step" placeholder="Enter new step" value="{{ $step->name }}" class="form-control"
            wire:model="updatedName">
        <span class="text text-secondary btn" wire:click='edit({{ $step->id }})'>End edit</span>

        @error('updatedName')
            <div class="text text-danger">
                * {{ $message }}
            </div>
        @enderror
    </div>
</form>
