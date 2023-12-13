<div>
    <button wire:click="$toggle('modal')" class="border dark:border-slate-700 dark:text-white p-1.5 rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd" d="M5.5 3A2.5 2.5 0 003 5.5v2.879a2.5 2.5 0 00.732 1.767l6.5 6.5a2.5 2.5 0 003.536 0l2.878-2.878a2.5 2.5 0 000-3.536l-6.5-6.5A2.5 2.5 0 008.38 3H5.5zM6 7a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
        </svg>
    </button>

    <x-dialog-modal wire:model="modal">
        <x-slot name="title">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-slate-600">
                    <path fill-rule="evenodd" d="M5.25 2.25a3 3 0 00-3 3v4.318a3 3 0 00.879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 005.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 00-2.122-.879H5.25zM6.375 7.5a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z" clip-rule="evenodd" />
                </svg>
                <span class="text-lg font-medium">Tags</span>
            </div>
        </x-slot>
        <x-slot name="content">
            <x-input type="search" wire:model.live="search" class="w-full" placeholder="Filter by name"/>
            @forelse ($tags as $tag)
                <label for="tag-{{$tag->id}}" class="block mt-2">
                    <x-input id="tag-{{$tag->id}}" type="checkbox" value="{{ $tag->id }}" wire:model.live="selected_tags" />
                    <span>{{ $tag->name }}</span>
                </label>
            @empty

            @endforelse
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modal')">Cancel</x-secondary-button>
            <x-button class="ml-4" wire:click="save">Attach Selected Tags</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
