<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">{{ __('Apply for this vacancy') }}</h3>
    <form wire:submit.prevent='submit' class="w-96 mt-5">
        <div class="mb-4">
            <x-input-label for="cv" :value="__('CV (Curriculum vitae in PDF format)')" />
            <x-text-input id="cv" type="file" accept=".pdf" class="block mt-1 w-full" wire:model="cv"/>
        </div>
        @error('cv')
            <livewire:show-alert :message="$message" />
        @enderror

        <x-primary-button class="my-5">
            {{ __('Apply') }}
        </x-primary-button>
    </form>
</div>
