<div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form wire:submit='createUser'>
        <div class="mb-3">
            <label for="name" class="form-label">Name </label>
            <input type="text" class="form-control" wire:model='name' placeholder="Enter Name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" wire:model='email' placeholder="Enter Email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" wire:model='password' placeholder="Enter Password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" wire:model='photo'>
            @error('photo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        @if ($photo)
            <div class="py-2">
                <img width="150" src="{{ $photo->temporaryUrl() }}" alt="">
            </div>
        @endif
        <div wire:loading wire:target='photo'><i class="fas fa-spinner"></i>Uploading</div>
        <div class="text-success" wire:loading wire:target='createUser'><i class="fas fa-spinner"></i>Sending</div>

        <br>

        <button wire:loading.class.remove='btn-primary'   type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>
    <hr>

</div>
