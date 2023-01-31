<div class="col-span-12">
    <div class="card p-4">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold">Recent Tickets</h2>
            <button
                class="btn border border-view/30 bg-view/10 font-medium text-view  hover:bg-view/20 focus:bg-view/20 active:bg-view/25"
            >
                <i class="fa-solid fa-list mr-1"></i>
                View All Tickets
            </button>
        </div>

        <div class="mt-4 is-scrollbar-hidden min-w-full overflow-x-auto">
            <table class="is-zebra w-full pb-4 text-left">
            <thead>
                <tr>
                <th class="whitespace-nowrap rounded-l-lg bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800">
                    #
                </th>
                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800">
                    Subject
                </th>
                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800">
                    Content
                </th>
                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800">
                    Categories
                </th>
                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800">
                    Status
                </th>
                <th class="whitespace-nowrap rounded-r-lg bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800">
                    Action
                </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentTickets as $index => $ticket)
                <tr>
                    <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5">
                        {{ $index + 1 }}
                    </td>
                    <td class="px-4 py-3 sm:px-5">{{ $ticket->subject }}</td>
                    <td class="px-4 py-3 sm:px-5">{{ $ticket->content }}</td>
                    <td class="px-4 py-3 sm:px-5">
                        @forelse ($ticket->categories as $category)
                            {{ $category->name }}
                        @empty
                            Uncategorized
                        @endforelse
                    </td>
                    <td class="px-4 py-3 sm:px-5">{{ $ticket->status }}</td>
                    <td class="rounded-r-lg px-4 py-3 sm:px-5">View</td>
                </tr>
                @empty
                    <td colspan="7" class="rounded-l-lg rounded-r-lg px-4 py-3 sm:px-5 text-xl text-center">
                        No tickets opened yet
                    </td>
                @endforelse
                
            </tbody>
            </table>
        </div>
    </div>
</div>