<div>
    @include('livewire.layouts.header')
    <div id="content" class="mx-auto" style="max-width:500px;">
        @include('livewire.layouts.create-todo')
        @include('livewire.layouts.search-box')
        <div id="todos-list">
            @forelse ($todos as $todo)
                @include('livewire.layouts.todo-list')
            @empty

            @endforelse

            <div class="my-2">
                {{ $todos->links() }}
            </div>
        </div>
    </div>
</div>
