<div>
    <div wire:poll.visible >
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
