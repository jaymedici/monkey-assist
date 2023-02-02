<div class="col-span-12 flex flex-col lg:flex-row gap-4">
    <div class="flex-1 relative flex flex-col overflow-hidden rounded-lg bg-gradient-to-br from-slate-700 to-slate-400 p-3.5">
        <p class="text-xs uppercase text-sky-100">Registered Users</p>
        <div class="flex items-end justify-between space-x-2">
            <p class="mt-4 text-2xl font-medium text-white">{{ $usersCount }}</p>
        </div>
        <div class="mask is-reuleaux-triangle absolute top-0 right-0 -m-3 h-16 w-16 bg-white/20"></div>
    </div>

    <div class="flex-1 relative flex flex-col overflow-hidden rounded-lg bg-gradient-to-br from-sky-600 to-cyan-400 p-3.5">
        <p class="text-xs uppercase text-amber-50">Open Tickets</p>
        <div class="flex items-end justify-between space-x-2">
            <p class="mt-4 text-2xl font-medium text-white">{{ $openTicketsCount }}</p>
        </div>
        <div class="mask is-diamond absolute top-0 right-0 -m-3 h-16 w-16 bg-white/20"></div>
    </div>

    <div class="flex-1 relative flex flex-col overflow-hidden rounded-lg bg-gradient-to-br from-yellow-700 to-amber-500 p-3.5">
        <p class="text-xs uppercase text-pink-100">Avg. Time taken to close tickets</p>
        <div class="flex items-end justify-between space-x-2">
            <p class="mt-4 text-2xl font-medium text-white">3.5 Days</p>
        </div>
        <div class="mask is-hexagon-2 absolute top-0 right-0 -m-3 h-16 w-16 bg-white/20"></div>
    </div>
</div>