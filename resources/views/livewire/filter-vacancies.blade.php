<div class="bg-gray-800 py-10">
    <h2 class="text-2xl md:text-4xl text-gray-300 text-center font-extrabold my-5">{{ __('Search and Filter Vacancies') }}</h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent='readFormData'>
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label
                        class="block mb-1 text-sm text-gray-300 uppercase font-bold "
                        for="termino">{{ __('Search Term') }}
                    </label>
                    <input
                        id="concept"
                        type="text"
                        placeholder="Buscar por Término: ej. Laravel"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        wire:model="concept"
                    />
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-300 uppercase font-bold">{{ __('Category') }}</label>
                    <select
                        wire:model="category"
                        class="border-gray-300 p-2 w-full">
                        <option value="">-- {{ __('Select') }} --</option>

                        @foreach ($categories as $category )
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-300 uppercase font-bold">{{ __('Monthly salary') }}</label>
                    <select
                        wire:model="salary"
                        class="border-gray-300 p-2 w-full">
                        <option value="">-- {{ __('Select') }} --</option>
                        @foreach ($salaries as $salary)
                            <option value="{{ $salary->id }}">{{$salary->salary}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <input
                    type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                    value="Buscar"
                />
            </div>
        </form>
    </div>
</div>
