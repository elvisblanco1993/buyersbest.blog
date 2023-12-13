<div>
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-5xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tags') }}
            </h2>

            <div class="flex items-center space-x-6">
                @livewire('tag.create')
            </div>
        </div>
    </header>
    <div class="max-w-5xl mx-auto py-6 px-4 sm:px-6 lg:px-8 prose dark:prose-invert">
        <table>
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="sr-only">actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tags as $tag)
                    <tr wire:key="{{ $tag->id }}" class="hover:bg-slate-100 dark:hover:bg-slate-800">
                        <td class="px-4 py-2">{{ $tag->name }}</td>
                        <td class="h-full flex items-center justify-end px-4 py-2">
                            @livewire('tag.delete', ['tag' => $tag])
                        </td>
                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</div>
