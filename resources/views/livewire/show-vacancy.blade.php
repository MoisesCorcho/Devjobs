<div class="p-10 text-white">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-200 my-3">
            {{ $vacancy->title }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-800 p-4 rounded shadow-lg border border-gray-900 my-10">
            <p class="font-bold text-sm uppercase text-gray-200 my-3">
                Company:
                <span class="normal-case font-normal">{{ $vacancy->company }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-200 my-3">
                Last Day to Apply:
                <span class="normal-case font-normal">{{ $vacancy->last_day->toFormattedDateString() }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-200 my-3">
                Category:
                <span class="normal-case font-normal">{{ $vacancy->category->category }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-200 my-3">
                Category:
                <span class="normal-case font-normal">{{ $vacancy->salary->salary }}</span>
            </p>
        </div>

        <div class="md:grid md:grid-cols-6 gap-4">
            <div class="md:col-span-2">
                <img
                    src="{{ asset('storage/vacancies/' . $vacancy->image) }}" '
                    alt="{{'vacancy image' . $vacancy->title}}">
            </div>
            <div class="md:col-span-4">
                <h2 class="text-2xl font-bold mb-5">Description</h2>
                <p>{{ $vacancy->description }}</p>
            </div>
        </div>

        @guest
            <div class="mt-5 bg-gray-900 border border-dashed p-5 text-center">
                <p>
                    Do you want to apply for this position? <a class="font-bold text-indigo-500" href="{{ route('register') }}">Get an account and apply to this and other vacancies</a>
                </p>
            </div>
        @endguest
    </div>
</div>
