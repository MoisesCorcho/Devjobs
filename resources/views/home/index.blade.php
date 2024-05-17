<x-app-layout>
    <div class="py-16 bg-gray-900 overflow-hidden lg:py-24">
        <div class=" max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
            <div class="relative">
                <h2 class="text-center text-3xl leading-8 font-extrabold tracking-tight text-indigo-600 sm:text-6xl">
                    {{ __('Find a job in Tech remotely') }}
                </h2>
                <p class="mt-4 max-w-3xl mx-auto text-center text-xl text-gray-400">
                    {{ __('Find your dream job in an international company; We have vacancies for Frontend Developer, Backend, Devops, Mobile and much more!') }}
                </p>
            </div>
        </div>
    </div>
    <livewire:home-vacancies />
</x-app-layout>
