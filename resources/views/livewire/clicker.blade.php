<div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div>
        <a href="{{ url('/todo') }}" class="btn btn-success">Todo</a>
        <a href="{{ url('/data-table') }}" class="btn btn-warning">Data Table</a>
    </div>
    <form wire:submit='createUser'>
        <div class="mb-3">
            <label for="name" class="form-label">Name </label>
            <input type="text" class="form-control" wire:model='userForm.name' placeholder="Enter Name">
            @error('userForm.name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" wire:model='userForm.email' placeholder="Enter Email">
            @error('userForm.email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" wire:model='userForm.password' placeholder="Enter Password">
            @error('userForm.password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" wire:model='userForm.photo'>
            @error('userForm.photo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        @if ($userForm->photo)
            <div class="py-2">
                <img width="150" src="{{ $userForm->photo->temporaryUrl() }}" alt="">
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
