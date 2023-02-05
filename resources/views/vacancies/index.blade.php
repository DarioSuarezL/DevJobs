<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My vacancies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session()->has('message'))
                <div class="uppercase border border-green-400 bg-green-200 text-green-600 font-bold p-2 my-3 text-sm">
                    {{__(session('message'))}}
                </div>0
            @endif
            <livewire:show-vacancies />
        </div>
    </div>
</x-app-layout>
