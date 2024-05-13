<form class="md:w-1/2 space-y-5" wire:submit.prevent="createVacancy">

    {{-- Title --}}
    <div>
        <x-input-label for="title" :value="__('Vacancy Title')" />
        <x-text-input
            id="title"
            class="block mt-1 w-full"
            type="text"
            wire:model="title"
            :value="old('title')"
        />
        @error('title')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>

    {{-- salary --}}
    <div>
        <x-input-label
            for="salary"
            :value="__('Vacancy Salary')"
        />
        <x-select-input
            id="salary"
            wire:model="salary"
            class="block mt-1 w-full"
            :value="old('salary')"
        >
            <option value="">-- {{ __('Select') }} --</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach
        </x-select-input>
        @error('salary')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>

    {{-- Category --}}
    <div>
        <x-input-label for="category" :value="__('Vacancy Category')" />

        <x-select-input
            id="category"
            wire:model="category"
            class="block mt-1 w-full"
            :value="old('category')"
        >
            <option value="">-- {{ __('Select') }} --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </x-select-input>
        @error('category')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>

    {{-- Company --}}
    <div>
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input
            id="company"
            class="block mt-1 w-full"
            type="text"
            wire:model="company"
            :value="old('company')"
        />
        @error('company')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>

    {{-- Last Day --}}
    <div>
        <x-input-label for="last_day" :value="__('Last day to apply')" />
        <x-text-input
            id="last_day"
            class="block mt-1 w-full"
            type="date"
            wire:model="last_day"
            :value="old('last_day')"
        />
        @error('last_day')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>

    {{-- Description --}}
    <div>
        <x-input-label for="description" :value="__('Description of the vacancy')" />

        <x-textarea-input
            wire:model="description"
            id="description"
            class="block mt-1 w-full h-72"
        />
        @error('description')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>

    <div class="my-5 w-96">
        <x-input-label for="image" :value="__('Current Image')" />

        <img src="{{ asset('storage/vacancies/' . $image) }}" alt="{{ 'Vacancy Image' . $title }}">
    </div>

    {{-- Image --}}
    {{-- <div>
        <x-input-label for="image" :value="__('Image')" />

        <x-text-input
            id="image"
            class="block mt-1 w-full"
            type="file"
            wire:model="image"
            accept="image/*"
        />

        <div class="my-5 w-96">
            @if( $image )
                <img src="{{ $image->temporaryUrl() }}" alt="image">
            @endif
        </div>

        @error('image')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div> --}}

    <x-primary-button class="w-full justify-center">
        save Changes
    </x-primary-button>
</form>
