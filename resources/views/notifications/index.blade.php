<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <h1 class="text-2xl font-bold text-center my-5">{{__('My notifications')}}</h1>
                    <div class="divide-y divide-gray-200 ">
                        @forelse ($notifications as $notification)
                        <div class="p-5 md:flex md:justify-between md:items-center">
                            <div>
                                <p>{{__('You have a new candidate for the vacancy: ')}}
                                    <span class="font-bold">{{$notification->data['vacancy_title']}}</span>
                                </p>
                                <p class="text-gray-400">{{$notification->created_at->diffForHumans()}}</p>
                            </div>
                            <div class="mt-5 md:mt-0">
                                <a href="{{route('candidate.index',$notification->data['vacancy_id'])}}" 
                                    target="_blank"
                                    class="bg-slate-800 p-3 text-sm font-bold text-white rounded-lg"
                                    >
                                    {{__('View candidates')}}
                                </a>
                            </div>
                        </div>
                        @empty
                            <p class="text-center text-gray-600">{{__('No notifications')}}</p>
                        @endforelse
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
