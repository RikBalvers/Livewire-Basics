<form wire:submit.prevent="submitForm" action="#" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div>
        <div>
            <div>
                <a href="/" class="text-blue-600">Back to main page</a>
                <h3 class="mt-2 text-lg font-medium leading-6 text-gray-900">
                    Edit Post
                </h3>
                <p class="max-w-2xl mt-1 text-sm leading-5 text-gray-500">
                    You can edit your post here.
                </p>
                @if ($successMessage)
                <div class="p-4 mt-8 rounded-md bg-green-50">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium leading-5 text-green-800">
                                {{ $successMessage }}
                            </p>
                        </div>
                        <div class="pl-3 ml-auto">
                            <div class="-mx-1.5 -my-1.5">
                                <button type="button" wire:click="$set('successMessage', null)"
                                    class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150"
                                    aria-label="Dismiss">
                                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="mt-6 sm:mt-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="title" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Title
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs">
                            <input wire:model="title" id="title" name="title"
                                class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5"
                                value="{{ $post->title }}">
                            @error('title')
                            <p class="mt-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div
                    class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="content" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Content
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="flex max-w-lg rounded-md shadow-sm">
                            <textarea wire:model="content" id="content" name="content" rows="5"
                                class="block w-full transition duration-150 ease-in-out form-textarea sm:text-sm sm:leading-5">{{ $post->content }}</textarea>
                        </div>
                        @error('content')
                        <p class="mt-1 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div
                    class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="photo" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Cover Photo
                    </label>
                    <div
                        class="mt-2 sm:mt-0 sm:col-span-2"
                        x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <input wire:model="photo" type="file" name="photo">
                        @error('photo')
                            <p class="mt-1 text-red-500">{{ $message }}</p>
                        @enderror

                        <!-- Progress Bar -->
                        <div class="mt-4" x-show="isUploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>

                        <div>
                            <svg wire:loading wire:target="photo" class="w-5 h-5 mr-3 -ml-1 text-gray-600 animate-spin"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </div>

                        <div class="mt-4">
                            @if ($photo)
                                <img src="{{ $tempUrl }}" alt="temp">
                            @elseif ($post->photo)
                                <img src="{{ Storage::url($post->photo) }}" alt="cover image">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-5 mt-8 border-t border-gray-200">
        <div class="flex justify-end">
            <span class="inline-flex ml-3 rounded-md shadow-sm">
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                    Update
                </button>
            </span>
        </div>
    </div>
</form>
