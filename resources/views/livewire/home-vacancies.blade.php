<div>

    <livewire:vacancy-finder/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 mb-12 ml-5">
                Our available vacancies
            </h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacancies as $vacancy)
                    <div class="md:flex md:justify-between md:items-center py-5 mt-5 md:mt-0">
                        <div class="md:flex-1 py-3">
                            <a class="text-3xl font-extrabold text-gray-600"
                                href="{{ route('vacancy.show', $vacancy) }}"
                            >
                                {{$vacancy->title}}
                            </a>
                            <p class="text-base text-gray-400 font-bold">{{$vacancy->company}}</p>
                            <p class="text-gray-400 text-xs font-bold">{{$vacancy->category->category}}</p>
                            <p class="text-gray-400 text-xs font-bold">{{$vacancy->payment->payment}}</p>
                            <p class="font-bold text-xs text-gray-600">
                                {{__('Last day to apply: ')}}
                                <span class="font-normal">
                                    {{$vacancy->last_day->format('d/m/Y');}}
                                </span>
                            </p>
                        </div>
                        <div class="mt-3">
                            <a class="bg-slate-800 p-3 text-sm font-bold text-white rounded-lg" 
                                href="{{ route('vacancy.show', $vacancy) }}"
                            >
                                {{__('Show vacancy')}}
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No vacancies yet</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
