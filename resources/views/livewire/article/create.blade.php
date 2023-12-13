<div x-data="{preview: false}">
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-5xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <x-input wire:model="title" type="text" class="text-xl py-1.5 font-bold w-2/3" aria-placeholder="Title" placeholder="Title" />
            <div class="flex items-center space-x-4">
                <button x-on:click="preview = !preview" class="border dark:border-slate-700 dark:text-white p-2 rounded-md">
                    <svg x-cloak x-show="!preview" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <svg x-cloak x-show="preview" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                </button>

                <x-button wire:click="save">Save</x-button>
            </div>
        </div>
    </header>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="mt-4" x-cloak x-show="!preview">
            <textarea wire:model.live="content" cols="30" rows="10" placeholder="Write what you will..."
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
