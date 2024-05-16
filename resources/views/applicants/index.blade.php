<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vacancy Applicants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-2xl font-bold text-center mb-10 my-10">{{ __('Vacancy Applicants') }}: {{ $vacancy->title }}</h1>

                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 w-full">
                            @forelse ($vacancy->applicants as $applicant)
                                <li class="p-3 flex items-center border-b">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-200"> {{ $applicant->user->name }} </p>
                                        <p class="text-sm font-medium text-gray-400"> {{ $applicant->user->email }} </p>
                                        <p class="text-sm font-medium text-gray-400">
                                            {{ __('Applied') }}: {{ $applicant->created_at->diffForHumans() }}
                                        </p>
                                    </div>

                                    <div>
                                        <a
                                            class="inline-flex items-center shadow-sm px-2 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"
                                            href="{{ asset('storage/cv/' . $applicant->cv) }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            >
                                            {{ __('See CV') }}

                                        </a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-gray-300">
                                    {{ __('There are no new applicants.') }}
                                </p>
                            @endforelse
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
