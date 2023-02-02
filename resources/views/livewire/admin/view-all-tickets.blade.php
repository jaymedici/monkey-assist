<div class="card my-4 mx-4 p-1">
    <div class="my-4 mx-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
        <div class="col-span-12">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-semibold">All Submitted Tickets</h3>
    
                <label class="block">
                    <input
                    class="form-input w-full h-8 rounded-full border border-slate-300 bg-transparent px-4 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                    placeholder="Search here..."
                    type="text"
                    wire:model="search"
                    />
                </label>
            </div>
    
            <div class="card mt-3">
                <div
                class="is-scrollbar-hidden min-w-full overflow-x-auto"
                >
                <table class="is-hoverable w-full text-left">
                    <thead>
                    <tr>
                        <th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5">
                            #
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5">
                            Subject
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5">
                            Content
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5">
                            Categories
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5">
                            Status
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($tickets as $index => $ticket)
                        <tr wire:loading.class.delay="opacity-50" wire:key="{{ $ticket->id }}"
                            class="border-y border-transparent border-b-slate-200"
                        >
                            <td class="px-4 py-3 sm:px-5">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-4 py-3 sm:px-5">
                                {{ $ticket->subject }}
                            </td>
                            <td class="px-3 py-3 text-sm font-medium text-slate-700 lg:px-5">
                                {{ $ticket->content }}
                            </td>
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
                            <td class="px-4 py-3 sm:px-5">
                                <a href="#"
                                    class="btn border border-info/30 bg-info/10 text-sm text-info  hover:bg-info/20 focus:bg-info/20 active:bg-info/25"
                                >
                                View
                                </a>
                            </td>
                    </tr>
                    @empty
                    <td colspan="6" class="text-center text-lg px-4 py-3 sm:px-5">
                    No Tickets Found
                    </td>
                    @endforelse
                    </tbody>
                </table>
                </div>
    
                <div class="space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                    {!! $tickets->links() !!}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>