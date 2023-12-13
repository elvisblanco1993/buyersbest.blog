<div>
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-5xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Articles') }}
            </h2>

            <div class="flex items-center space-x-6">
                <x-input type="search" wire:model="search" wire:keydown.enter="resetPagination" placeholder="Find by title"/>
                <a href="{{ route('article.create') }}" class="-my-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 dark:text-white">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </header>
    <div class="max-w-5xl mx-auto py-6 px-4 sm:px-6 lg:px-8 prose dark:prose-invert">
        <table>
            <thead>
                <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="sr-only px-4 py-2">actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                    <tr wire:key="article-{{$article->id}}" class="hover:bg-slate-100 dark:hover:bg-slate-800">
                        <td class="px-4 py-2">{{ $article->title }}</td>
                        <td class="px-4 py-2">
                            @if ($article->published_at)
                                <span class="text-xs font-medium tracking-widest uppercase bg-green-100 text-green-800 px-2 py-0.5 rounded-full">Live</span>
                            @else
                                <span class="text-xs font-medium tracking-widest uppercase bg-red-100 text-red-800 px-2 py-0.5 rounded-full">Draft</span>
                            @endif
                        </td>
                        <td class="h-full flex items-center justify-end gap-4 px-4 py-2">
                            <a href="{{ route('article.edit', ['article' => $article]) }}">Edit</a>
                            <livewire:article.delete :$article :key="$article->id" />
                        </td>
                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>

        <div class="mt-6">
            {{ $articles->links() }}
        </div>
    </div>
</div>
