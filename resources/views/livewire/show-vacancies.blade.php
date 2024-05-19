<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg dark:divide-y dark:divide-gray-100">

        @forelse ($vacancies as $vacancie)
            <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center">
                <div class="leading-10 space-y-3">
                    <a href="{{ route('vacancies.show', $vacancie) }}" class="text-xl font-bold">
                        {{ $vacancie->title }}
                    </a>
                    <p>{{ $vacancie->description }}</p>

                    <p class="text-sm text-gray">{{ __('Last Day') }}: {{ $vacancie->last_day->format('d/m/Y') }}</p>
                </div>
                <div class="flex gap-3 flex-col items-stretch text-center mt-5 md:mt-0 md:flex-row">
                    {{-- Candidates --}}
                    <a
                        href="{{ route('applicants.index', $vacancie) }}"
                        class="bg-gray-200 py-2 px-4 rounded-lg text-black text-xs font-bold uppercase">
                        <div id="applicants-pusher-{{ $vacancie->id }}" class="inline">{{ $vacancie->applicants->count() }}</div> | {{ __('Candidates') }}
                    </a>
                    {{-- Edit --}}
                    <a href="{{ route('vacancies.edit', $vacancie) }}" class="bg-blue-500 py-2 px-4 rounded-lg text-black text-xs font-bold uppercase">
                        {{ __('Edit') }}
                    </a>
                    {{-- Delete --}}
                    <button
                        wire:click="$dispatch('showDeleteAlert', { id: {{ $vacancie->id }} })"
                        class="bg-red-500 py-2 px-4 rounded-lg text-black text-xs font-bold uppercase">
                        {{ __('Delete') }}
                    </button>
                </div>
            </div>
        @empty
            <p class="text-white p-3 text-center">{{ __('No vacancies found') }}</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $vacancies->links() }}
    </div>
</div>

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <script>
        Livewire.on('showDeleteAlert', (vacancie) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {

                    // Delete vacancie
                    Livewire.dispatch('deleteVacancie', vacancie);

                    Swal.fire({
                        title: "Deleted!",
                        text: "Your vacancie has been deleted.",
                        icon: "success"
                    });
                }
            });
        });
    </script>

    <script>
        var pusher = new Pusher('6cd53ece0e138a43f2e4', {
            cluster: 'us2'
        });

        var channel = pusher.subscribe('see-applicants');
        channel.bind('see-applicants-event', function(data) {

            var element = document.getElementById('applicants-pusher-' + data.vacancy.id);
            if (element) {
                element.innerText = data.applicants;
            }
        });
    </script>

@endpush
