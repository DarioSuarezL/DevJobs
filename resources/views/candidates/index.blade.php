<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($vacancy->candidates->count().' Candidates for the vacancy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <h1 class="text-2xl font-bold text-center my-5">{{__('Candidates for the vacancy: ').$vacancy->title}}</h1>
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 w-full">
                            @forelse ($vacancy->candidates as $candidate)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-800">{{ $candidate->user->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $candidate->user->email }}</p>
                                        <p class="text-sm text-gray-600">{{ $candidate->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div>
                                        <a 
                                            class="inline-flex items-center shadow-sm px-3 py-1.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"
                                            href="{{asset('storage/cv/'.$candidate->cv)}}"
                                            target="_blank"
                                            rel="noreferrer noopener"
                                        >
                                            {{__('View CV')}}
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-gray-600">{{__('There are no candidates yet.')}}</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
