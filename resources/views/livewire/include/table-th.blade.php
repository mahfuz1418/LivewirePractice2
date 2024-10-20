<th scope="col" class="px-4 py-3" wire:click="setSortBy('{{ $name }}')">
    <button class="flex items-center">
        {{ $displayName }}
        @if ($sortBy !== $name)
            <svg class="ml-2 w-4 h-4 text-gray-800 dark:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2"
                    d="M8 20V7m0 13-4-4m4 4 4-4m4-12v13m0-13 4 4m-4-4-4 4" />
            </svg>
        @elseif ($sortDirection == 'DESC')
            <svg class="ml-2 w-4 h-4 text-gray-800 dark:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
            </svg>
        @else
            <svg class="ml-2 w-4 h-4 text-gray-800 dark:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
            </svg>
        @endif
    </button>
</th>
