<div>
    <button type="button"
        wire:click="delete"
        wire:confirm="Are you sure you want to delete: {{ $article->title }}?"
        class="font-medium underline dark:text-white hover:text-red-600"
    >Delete</button>
</div>
