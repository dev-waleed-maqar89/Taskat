<form wire:submit.prevent="login">
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
    </div>
    <div class="form-group">
        <label for="remember">Remenber me</label>
        <input type="checkbox" name="remember" id="remember" wire:model="remember">
    </div>
    <div class="alert">
        Don't have account?
        <a href="/register">Register</a>
    </div>
    <div class="form-group">
        <input type="submit" value="login" class="form-control btn btn-success">
    </div>
</form>
