<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{$vacancy->title}}	
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10 rounded-lg">
            <p class="font-bold text-sm uppercase text-gray-700 my-3">{{__('Company: ')}}
                <span class="normal-case font-normal">{{$vacancy->company}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-700 my-3">{{__('Last day to apply: ')}}
                <span class="normal-case font-normal">{{$vacancy->last_day->toFormattedDateString()}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-700 my-3">{{__('Category: ')}}
                <span class="normal-case font-normal">{{$vacancy->category->category}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-700 my-3">{{__('Payment: ')}}
                <span class="normal-case font-normal">{{$vacancy->payment->payment}}</span>
            </p>

        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacancies/'.$vacancy->image) }}" alt="{{'Vacancy image'.$vacancy->title}}">
        </div>

        <div class="md:col-span-4 bg-gray-50 p-3 rounded-lg">
            <h2 class="text-2xl font-bold mb-5">{{__('Vacancy description')}}</h2>
            <p> {{$vacancy->description}} </p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center rounded-md">
            <p>{{__('Would you like to apply for this vacancy?')}}
                <a class="font-bold text-indigo-600" href="{{route('register')}}">{{__(' Create an account now to apply for these and other vacancies now!')}}</a>
            </p>
        </div>
    @endguest

</div>
