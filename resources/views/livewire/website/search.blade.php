<div>
    <div x-data="{show: false}" class="">
        <button x-on:click="show = !show">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </button>
        <div x-show="show" class="absolute min-h-screen inset-0 bg-white/80 dark:bg-slate-900/80 backdrop-blur z-50">
            <div @click.outside="show = !show" x-trap="show"  class="my-12 md:my-24 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <input type="search" wire:model="query" wire:keydown.enter="search" placeholder="Search..."
                    class="w-full py-5 text-lg bg-white dark:bg-slate-800 dark:text-white border-2 border-slate-200 dark:border-slate-700 rounded-lg ring-0 focus:ring-0 focus:border-rose-500"
                >

                <div class="block mt-12 max-h-[600px] overflow-y-scroll">
                    @if ($query)
                        @forelse ($articles as $article)
                            <a  class="block hover:bg-rose-500/90 hover:text-pink-50 px-4 py-3"
                                href="{{ route('article.show', ['slug' => $article->slug]) }}"
                            >{{ $article->title }}</a>
                        @empty
                            <p class="block text-center hover:bg-rose-500/90 hover:text-pink-50 px-4 py-3">{{ __("No articles matched your search. Please try again.") }}</p>
                        @endforelse
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
