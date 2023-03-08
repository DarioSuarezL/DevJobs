<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ($vacancies as $vacancy)
        <div class="p-6 text-gray-900 border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="leading-10">
                <a href="{{route('vacancy.show', $vacancy)}}" class="text-xl font-bold">
                    {{$vacancy->title}}
                </a>
                <p class="text-sm text-gray-400 font-bold"> {{$vacancy->company}}</p>
                <p class="text-sm text-gray-400 font-bold">Apply until: {{$vacancy->last_day->format('d/m/Y')}}</p>
            </div>

            <div class="flex flex-col md:flex-row gap-3 items-stretch mt-5 md:mt-0">
                <a
                    href=""
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                >Job applicants</a>

                <a
                    href="{{route('vacancy.edit',$vacancy->id)}}"
                    class="bg-indigo-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                >Edit</a>

                <button
                    wire:click="$emit('deleteVacancyAlert', {{$vacancy->id}})"
                    class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                >Delete</button>
            </div>
        </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">{{__('You have not published any vacancy, click on "Create vacancy" to start.')}}</p>
        @endforelse

    </div>

    <div class="mt-10">
        {{ $vacancies->links() }}
    </div>
</div>

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('deleteVacancyAlert', vacancyId => {
            Swal.fire({
                title: 'Delete vacancy?',
                text: "Are you sure? You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3730A3',
                cancelButtonColor: '#991B1B',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteVacancy', vacancyId);
                    Swal.fire(
                    'Deleted!',
                    'The vacancy has been deleted.',
                    'success'
                    )
                }
            })
        })
    </script>

@endpush
