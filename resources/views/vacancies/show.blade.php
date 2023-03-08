<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $vacancy->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:show-vacancy 
                    :vacancy="$vacancy" 
                />
            </div>
        </div>
    </div>
</x-app-layout>

{{-- <div class="p-6 text-gray-900">
    <h1 class="text-2xl font-bold text-center mt-5">{{__('Current vacancy: ')}} <span class="font-normal"> {{$vacancy->title}} </span> </h1>
    <p class="text-center text-gray-300 text-sm font-bold mb-5">ID: {{$vacancy->id}}</p>
    <div class="md:flex md:justify-center p-5">
        
    </div>
</div> --}}
