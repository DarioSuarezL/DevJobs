<form action="" class="md:w-1/2 space-y-5">
    <div>
        <x-input-label for="title" :value="__('Vacancy title')" />
        <x-text-input
            id="title"
            class="block mt-1 w-full"
            type="text"
            name="title"
            :value="old('title')"
            placeholder="Vacancy title"
        />
    </div>

    <div>
        <x-input-label for="payment" :value="__('Monthly payment')" />
        <select
            name="payment"
            id="payment"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >

        </select>
    </div>

    <div>
        <x-input-label for="category" :value="__('Category')" />
        <select
            name="category"
            id="category"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >

        </select>
    </div>

    <div>
        <x-input-label for="company" :value="__('Company name')" />
        <x-text-input
            id="company"
            class="block mt-1 w-full"
            type="text"
            name="company"
            :value="old('company')"
            placeholder="Company name, e.g. Meta, Netflix, Uber"
        />
    </div>

    <div>
        <x-input-label for="last_day" :value="__('Last day to apply')" />
        <x-text-input
            id="last_day"
            class="block mt-1 w-full"
            type="date"
            name="last_day"
            :value="old('last_day')"
        />
    </div>

    <div>
        <x-input-label for="description" :value="__('Job Description')" />
        <textarea
            name="description" 
            id="description"
            placeholder="General job description..."
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72"
        >

        </textarea>
    </div>

    <div>
        <x-input-label for="image" :value="__('Image')" />
        <x-text-input
            id="image"
            class="block mt-1 w-full"
            type="file"
            name="image"
        />
    </div>

    <x-primary-button class="justify-center">
        {{__('Post vacancy')}}
    </x-primary-button>
</form>
