<div>
    <article class="block max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <h1 class="text-x4l md:text-6xl font-bold">{{ $article->title }}</h1>
        <img src="{{ asset($article->artwork) }}" alt="{{ $article->title }}"
            class="my-12 block w-full aspect-video object-cover object-center rounded-lg"
        >
        <div class="max-w-full prose dark:prose-invert prose-lg">
            {!! str($article->content)->markdown() !!}
        </div>
    </article>
</div>
