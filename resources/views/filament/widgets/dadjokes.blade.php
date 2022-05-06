<x-filament::widget>
    <x-filament::card>
        <div class="relative">
            <h2 class="mb-10 text-center text-xl font-bold tracking-tight sm:text-xl">{{ __('Random Joke') }}</h2>
            <blockquote class="mt-4">
                <svg
                    class="text-primary-600 absolute top-0 left-0 h-8 w-8 -translate-x-3 -translate-y-2 transform"
                    fill="currentColor"
                    viewBox="0 0 32 32"
                    aria-hidden="true"
                >
                    <path
                        d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z"
                    />
                </svg>
                <div class="mx-auto max-w-3xl text-center text-lg font-medium leading-9">
                    <p>{{ $joke ?? __('Failed to fetch joke, try again later') }}</p>
                </div>
                <footer class="mt-4">
                    <div class="md:flex md:items-center md:justify-center">

                        <div class="mt-3 text-right md:mt-0 md:ml-4 md:flex md:items-center">


                            <a
                                href="{{ $provider_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="hover:text-primary-500 dark:hover:text-primary-500 text-right text-sm text-gray-600 focus:underline focus:outline-none dark:text-gray-300"
                            >
                                {{ $provider }}
                            </a>

                        </div>
                    </div>
                </footer>
            </blockquote>
        </div>
    </x-filament::card>
</x-filament::widget>
