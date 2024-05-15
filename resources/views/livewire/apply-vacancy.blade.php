<div class="p-5 mt-10 flex flex-col justify-center items-center bg-gray-700 rounded shadow-lg border border-gray-900">
    <h3 class="text-center text-2xl font-bold my-4"> {{ __('Apply to this position') }} </h3>

    @if (session()->has('message'))
        <p class="border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 w-96 text-sm rounded-lg">
            {{ session('message') }}
        </p>
    @else
        <form class="w-96 mt-5" wire:submit.prevent="applyVacancy">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Upload your CV')"></x-input-label>
                <x-text-input
                    wire:model="cv"
                    id="cv"
                    type="file"
                    accept=".pdf"
                    class="block mt-1 w-full"/>

                    @error('cv')
                        <livewire:show-alert :message="$message"/>
                    @enderror
            </div>

            <x-primary-button class="my-5 block w-full justify-center">
                {{ __('Apply') }}
            </x-primary-button>
        </form>
    @endif

</div>
