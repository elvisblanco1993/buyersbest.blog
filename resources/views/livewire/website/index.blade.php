<div>
    <main class="block max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-3 gap-8">
            @forelse ($articles as $article)
                <a href="{{ route('article.show', ['slug' => $article->slug]) }}"
                    @class([
                        "block col-span-3 md:col-span-1",
                        "md:col-span-3" => $loop->first
                    ])
                >
                    <article class="w-full text-black dark:text-white">
                        <img src="{{ asset($article->artwork) }}" alt="{{ $article->title }}"
                            class="w-full aspect-video object-cover rounded-lg"
                        >
                        <h2 class="mt-3 text-lg font-medium">{{ $article->title }}</h2>
                        <p class="text-slate-600 dark:text-slate-200">
                            {{ str($article->meta_description)->limit(200, '...') }}
                        </p>
                    </article>
                </a>
            @empty

            @endforelse
        </div>
        <div class="mt-12">
            {{ $articles->links() }}
        </div>
    </main>
</div>
