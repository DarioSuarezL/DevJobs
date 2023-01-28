<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='createVacancy'>
    <div>
        <x-input-label for="title" :value="__('Vacancy title')" />
        <x-text-input
            id="title"
            class="block mt-1 w-full"
            type="text"
            wire:model="title"
            :value="old('title')"
            placeholder="Vacancy title"
        />

        @error('title')
            <livewire:show-alert :message="$message"/>
        @enderror

    </div>

    <div>
        <x-input-label for="payment" :value="__('Monthly payment')" />
        <select
            wire:model="payment"
            id="payment"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
            <option disabled selected hidden>{{__('-- Select payment --')}}</option>
                @foreach ($payments as $payment)
                    <option value="{{ $payment->id }}">{{$payment->payment}}</option>
                @endforeach
        </select>

        @error('payment')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="category" :value="__('Category')" />
        <select
            wire:model="category"
            id="category"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
            <option disabled selected hidden>{{__('-- Select category --')}}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{__($category->category)}}</option>
                @endforeach
        </select>

        @error('category')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="company" :value="__('Company name')" />
        <x-text-input
            id="company"
            class="block mt-1 w-full"
            type="text"
            wire:model="company"
            :value="old('company')"
            placeholder="Company name, e.g. Meta, Netflix, Uber"
        />

        @error('company')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>

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

    <div>
        <x-input-label for="description" :value="__('Job Description')" />
        <textarea
            wire:model="description" 
            id="description"
            placeholder="General job description..."
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72"
        >

        </textarea>
        @error('description')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="image" :value="__('Image')" />
        <x-text-input
            id="image"
            class="block mt-1 w-full"
            type="file"
            wire:model="image"
        />
        @error('image')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>

    <x-primary-button class="justify-center">
        {{__('Post vacancy')}}
    </x-primary-button>
</form>
