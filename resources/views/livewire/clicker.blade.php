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
            <input type="file"  class="form-control" wire:model='photo'>
            @error('photo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        @if ($photo)
            <div class="py-2">
                <img width="150"  src="{{ $photo->temporaryUrl() }}" alt="">
            </div>
        @endif


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Serial</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Photo</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($user_data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td><img width="50" src="{{ asset('uploads/user_image/') }}/{{ $item->photos }}">
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $user_data->links() }}
    </div>
</div>
