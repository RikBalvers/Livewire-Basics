@extends('layouts.app')

@section('content')
    <div>
        <div class="h-96">Scroll down...</div>
        <div class="h-96"></div>
    </div>

    <h2 class="text-lg font-semibold">Standard Contact Form</h2>

    <livewire:contact-form />

    <hr>

    <h2 class="mt-4 text-lg font-semibold">Livewire Search Dropdown</h2>

    <div class="my-8">
        <nav class="bg-white shadow">
            <div class="px-2 mx-auto max-w-7xl sm:px-4 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex px-2 lg:px-0">
                        <div class="flex items-center flex-shrink-0">
                            <img class="block w-auto h-8 lg:hidden"
                                src="https://tailwindui.com/img/logos/workflow-mark-on-white.svg" alt="Workflow logo">
                            <img class="hidden w-auto h-8 lg:block"
                                src="https://tailwindui.com/img/logos/workflow-logo-on-white.svg" alt="Workflow logo">
                        </div>
                        <div class="hidden lg:ml-6 lg:flex">
                            <a href="#"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900 transition duration-150 ease-in-out border-b-2 border-indigo-500 focus:outline-none focus:border-indigo-700">
                                Dashboard
                            </a>
                            <a href="#"
                                class="inline-flex items-center px-1 pt-1 ml-8 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                                Team
                            </a>
                            <a href="#"
                                class="inline-flex items-center px-1 pt-1 ml-8 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                                Projects
                            </a>
                            <a href="#"
                                class="inline-flex items-center px-1 pt-1 ml-8 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                                Calendar
                            </a>
                        </div>
                    </div>
                    <livewire:search-dropdown />
                    <div class="flex items-center lg:hidden">
                        <!-- Mobile menu button -->
                        <button
                            class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500"
                            aria-label="Main menu" aria-expanded="false">
                            <!-- Icon when menu is closed. -->
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <!-- Icon when menu is open. -->
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="hidden lg:ml-4 lg:flex lg:items-center">
                        <button
                            class="flex-shrink-0 p-1 text-gray-400 transition duration-150 ease-in-out border-2 border-transparent rounded-full hover:text-gray-500 focus:outline-none focus:text-gray-500 focus:bg-gray-100"
                            aria-label="Notifications">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="relative flex-shrink-0 ml-4">
                            <div>
                                <button
                                    class="flex text-sm transition duration-150 ease-in-out border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300"
                                    id="user-menu" aria-label="User menu" aria-haspopup="true">
                                    <img class="w-8 h-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="h-96"></div>
    <div class="h-96"></div>

    <hr>

    <div class="my-8">
        <h2 class="mt-4 text-lg font-semibold">Livewire Data Tables</h2>

        <livewire:data-tables />
    </div>

    <hr>

    <div class="my-8">
        <h2 class="mt-4 text-lg font-semibold">Livewire Blog Posts w/ Comments</h2>

        <ul class="mt-4 list-disc">
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('post.show', $post) }}" class="text-blue-600">{{ $post->title }}</a>
                    <a href="{{ route('post.edit', $post) }}" class="text-blue-600"> (Edit)</a>
                </li>
            @endforeach
        </ul>
    </div>

    <hr>

    <div class="my-8">
        <h2 class="mt-4 text-lg font-semibold">Polling Example</h2>

        <div class="mt-4">
            <livewire:poll-example />
        </div>
    </div>

    <hr>

    <div class="my-8">
        <h2 class="mt-4 text-lg font-semibold">Events Example with Tags</h2>

        <div class="mt-4">
            <livewire:tags-component />
            <div class="h-96"></div>
        </div>
    </div>
@endsection
