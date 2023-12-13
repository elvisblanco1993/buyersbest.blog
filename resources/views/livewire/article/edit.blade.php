<div x-data="{preview: false}">
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-5xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <x-input wire:model="title" type="text" class="text-xl py-1.5 font-bold w-2/3" aria-placeholder="Title" placeholder="Title" />
            <div class="flex items-center space-x-4">
                @livewire('tag.attach', ['article' => $article])

                <button x-on:click="preview = !preview" class="border dark:border-slate-700 dark:text-white p-1.5 rounded-md">
                    <svg x-cloak x-show="!preview" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                        <path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 010-1.186A10.004 10.004 0 0110 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0110 17c-4.257 0-7.893-2.66-9.336-6.41zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                    </svg>
                    <svg x-cloak x-show="preview" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M3.28 2.22a.75.75 0 00-1.06 1.06l14.5 14.5a.75.75 0 101.06-1.06l-1.745-1.745a10.029 10.029 0 003.3-4.38 1.651 1.651 0 000-1.185A10.004 10.004 0 009.999 3a9.956 9.956 0 00-4.744 1.194L3.28 2.22zM7.752 6.69l1.092 1.092a2.5 2.5 0 013.374 3.373l1.091 1.092a4 4 0 00-5.557-5.557z" clip-rule="evenodd" />
                        <path d="M10.748 13.93l2.523 2.523a9.987 9.987 0 01-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 010-1.186A10.007 10.007 0 012.839 6.02L6.07 9.252a4 4 0 004.678 4.678z" />
                    </svg>
                </button>

                @livewire('article.publish', ['article' => $article])
                <x-button wire:click="save">Save</x-button>
            </div>
        </div>
    </header>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="mt-4" x-cloak x-show="!preview">
            <textarea wire:model.live="content" cols="30" rows="25" placeholder="Write what you will..."
                class="block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            ></textarea>

            <div class="mt-6">
                <x-label for="meta_desccriptio" value="Meta description" />
                <textarea wire:model="meta_description" cols="30" rows="4" placeholder=""
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                ></textarea>
            </div>

            <div class="mt-6">
                <x-label for="meta_tags" value="Meta tags" />
                <x-input wire:model="meta_tags" class="w-full mt-1"/>
            </div>

            <x-input type="file" wire:model="artwork" accept="image/webp" class="mt-6"/>
        </div>
        <div x-cloak x-show="preview" class="mt-4 max-w-full prose dark:prose-invert">
            {!! str($content)->markdown() ?? "## Nothing here yet!" !!}
        </div>
    </div>
</div>
