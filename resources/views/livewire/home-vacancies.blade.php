<div>
    <livewire:filter-vacancies />

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-200 mb-12">
                {{ __('Our available vacancies') }}
            </h3>

            <div class="bg-gray-800 shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacancies as $vacancy)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a href="{{ route('vacancies.show', $vacancy) }}" class="text-3xl font-extrabold text-gray-200">
                                {{ $vacancy->title }}
                                <p class="text-base text-gray-400 mb-1">{{ $vacancy->company }}</p>
                                <p class="text-xs font-bold text-gray-400 mb-1">{{ $vacancy->category->category }}</p>
                                <p class="text-base text-gray-400 mb-1">{{ $vacancy->salary->salary }}</p>
                                <p class="font-bold text-xs text-gray-400">
                                {{ __('Last day to apply') }}
                                <span class="font-normal">{{$vacancy->last_day->format('d/m/Y')}} </span>
                            </p>
                            </a>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a href="{{ route('vacancies.show', $vacancy) }}" class="bg-indigo-500 p-3 text-sm font-bold text-white rounded-lg">
                                {{ __('View Vacancy') }}
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="P-3 text-center text-sm text-gray-300">
                        {{ __('There are no new vacancies available.') }}
                    </p>
                @endforelse
            </div>

            <div class="mt-5 max-w-7xl mx-auto">
                {{ $vacancies->links() }}
            </div>
        </div>
    </div>
</div>


