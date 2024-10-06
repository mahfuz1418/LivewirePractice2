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

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Serial</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($user_data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $user_data->links() }}
    </div>


</div>
