<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ($vacancies as $vacancie)
            <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center dark:border-b dark:border-gray-100">
                <div class="leading-10 space-y-3">
                    <a href="#" class="text-xl font-bold">
                        {{ $vacancie->title }}
                    </a>
                    <p>{{ $vacancie->description }}</p>

                    <p class="text-sm text-gray">Last Day: {{ $vacancie->last_day->format('d/m/Y') }}</p>
                </div>
                <div class="flex gap-3 flex-col items-stretch text-center mt-5 md:mt-0 md:flex-row">
                    {{-- Candidates --}}
                    <a href="#" class="bg-gray-200 py-2 px-4 rounded-lg text-black text-xs font-bold uppercase">
                        {{ __('Candidates') }}
                    </a>
                    {{-- Edit --}}
                    <a href="#" class="bg-blue-500 py-2 px-4 rounded-lg text-black text-xs font-bold uppercase">
                        {{ __('Edit') }}
                    </a>
                    {{-- Delete --}}
                    <a href="#" class="bg-red-500 py-2 px-4 rounded-lg text-black text-xs font-bold uppercase">
                        {{ __('Delete') }}
                    </a>
                </div>
            </div>
        @empty
            <p class="text-white p-3 text-center">{{ __('No vacancies found') }}</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $vacancies->links() }}
    </div>
</div>
