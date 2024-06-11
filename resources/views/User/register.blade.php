<form wire:submit.prevent="register">
    <div class="form-group">
        <input type="text" name="name" placeholder="Your name" class="form-control" wire:model="name">
        @error('name')
            <div class="text text-danger">
                * {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <input type="email" name="email" placeholder="Your E-mail" class="form-control" wire:model="email">
        @error('email')
            <div class="text text-danger">
                * {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Enter Password" class="form-control" wire:model="password">
        @error('password')
            <div class="text text-danger">
                * {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" name="password_confirmation" placeholder="Re-enter password" class="form-control"
            wire:model="password_confirmation">
    </div>
    <div class="form-group">
        <input type="file" name="image" class="form-control">
        @error('image')
            <div class="text text-danger">
                * {{ $message }}
            </div>
        @enderror
    </div>
    <div class="alert">
        Already have account?
        <a wire:click.prevent="loginForm" href="">Login</a>
    </div>
    <div class="form-group">
        <input type="submit" value="Register" class="form-control btn btn-success">
    </div>
</form>
