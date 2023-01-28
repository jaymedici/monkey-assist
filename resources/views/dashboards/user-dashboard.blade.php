<x-app-layout>
    <div class="mt-4 mx-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
        <x-user.greeting />
        <x-user.ticket-summary />
    </div>

    <div class="my-4 mx-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
        <x-user.recent-tickets />
    </div>
</x-app-layout>