<x-app-layout>
    <div class="mt-4 mx-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
        @livewire('user.create-ticket')
        @livewire('user.ticket-summary')
    </div>

    <div class="my-4 mx-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
        @livewire('user.recent-tickets')
    </div>
</x-app-layout>