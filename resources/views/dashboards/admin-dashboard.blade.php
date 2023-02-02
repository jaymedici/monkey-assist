<x-app-layout>
    <div class="my-4 mx-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
        @livewire('admin.info-boxes')
        
        <div class="col-span-12">
            @livewire('admin.latest-open-tickets')
        </div>

    </div>
</x-app-layout>