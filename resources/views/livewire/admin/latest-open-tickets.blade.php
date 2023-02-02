<div class="card p-4">
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold">Latest Open Tickets</h2>
        <a class="btn border border-view/30 bg-view/10 font-medium text-view  hover:bg-view/20 focus:bg-view/20 active:bg-view/25"
            href="{{ route('admin.tickets') }}">
            <i class="fa-solid fa-list mr-1"></i>
            View All Tickets
        </a>
    </div>

    <div class="mt-4 is-scrollbar-hidden min-w-full overflow-x-auto">
        <table class="is-zebra w-full pb-4 text-left">
        <thead>
            <tr>
            <th
                class="whitespace-nowrap rounded-l-lg bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800"
            >
                Date
            </th>
            <th
                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800"
            >
                Subject
            </th>
            <th
                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800"
            >
                Content
            </th>
            <th
                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800"
            >
                Categories
            </th>
            <th
                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800"
            >
                Status
            </th>
            <th
                class="whitespace-nowrap rounded-r-lg bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800"
            >
                Action
            </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tickets as $index => $ticket)
                <tr>
                    <td class="rounded-l-lg px-4 py-3 sm:px-5">
                        {{ $ticket->created_at }}
                    </td>
                    <td class="px-4 py-3 sm:px-5">{{ $ticket->subject }}</td>
                    <td class="text-sm px-4 py-3 sm:px-5">{{ $ticket->content }}</td>
                    <td class="px-4 py-3 sm:px-5">
                        @forelse ($ticket->categories as $category)
                        <div class="badge mb-1 rounded-full border border-info text-info">
                            {{ $category->name }}
                        </div>
                        @empty
                            Uncategorized
                        @endforelse
                    </td>
                    <td class="px-4 py-3 sm:px-5">
                        @if ($ticket->status === \App\Enums\TicketStatus::OPEN)
                            <div class="badge rounded-full bg-success/10 text-success">
                                {{ $ticket->status }}
                            </div>
                        @elseif ($ticket->status === \App\Enums\TicketStatus::CLOSED)
                            <div class="badge rounded-full bg-secondary/10 text-secondary">
                                {{ $ticket->status }}
                            </div>
                        @endif
                    </td>
                    <td class="rounded-r-lg px-4 py-3 sm:px-5">
                        <a href="#"
                            class="btn border border-info/30 bg-info/10 text-sm text-info  hover:bg-info/20 focus:bg-info/20 active:bg-info/25"
                        >
                        View
                        </a>
                    </td>
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