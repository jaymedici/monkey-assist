<div>
    <div class="card my-4 mx-4 p-1">
        <div class="my-4 mx-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-semibold">Ticket Details</h3>
    
                    @if ($ticket->status ===  \App\Enums\TicketStatus::OPEN)
                    <button
                        onclick="confirm('Are you sure you want to close this ticket?') || event.stopImmediatePropagation()"
                        wire:click="closeTicket"
                        class="btn bg-secondary/10 font-medium text-secondary hover:bg-secondary/20 focus:bg-secondary/20 active:bg-secondary/25 dark:bg-secondary-light/10 dark:text-secondary-light dark:hover:bg-secondary-light/20 dark:focus:bg-secondary-light/20 dark:active:bg-secondary-light/25"
                    >
                        Close Ticket
                    </button>
                    @elseif ($ticket->status === \App\Enums\TicketStatus::CLOSED)
                    <button
                        onclick="confirm('Are you sure you want to reopen this ticket?') || event.stopImmediatePropagation()"
                        wire:click="reopenTicket"
                        class="btn bg-success/10 font-medium text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25 dark:bg-success-light/10 dark:text-success-light dark:hover:bg-success-light/20 dark:focus:bg-success-light/20 dark:active:bg-success-light/25"
                    >
                        Reopen Ticket
                    @endif
                    
                </div>
    
                <div class="card mt-3">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="font-medium text-gray-500">
                                Subject
                            </dt>
                            <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0">
                                {{ $ticket->subject }}
                            </dd>
                        </div>
    
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="font-medium text-gray-500">
                                Content
                            </dt>
                            <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0">
                                {{ $ticket->content }}
                            </dd>
                        </div>
    
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="font-medium text-gray-500">
                                Categories
                            </dt>
                            <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0">
                                @forelse ($ticket->categories as $category)
                                <div class="badge mb-1 rounded-full border border-info text-info">
                                    {{ $category->name }}
                                </div>
                                @empty
                                    Uncategorized
                                @endforelse
                            </dd>
                        </div>
    
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="font-medium text-gray-500">
                                Status
                            </dt>
                            <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0">
                                @if ($ticket->status === \App\Enums\TicketStatus::OPEN)
                                    <div class="badge rounded-full bg-success/10 text-success">
                                        {{ $ticket->status }}
                                    </div>
                                @elseif ($ticket->status === \App\Enums\TicketStatus::CLOSED)
                                    <div class="badge rounded-full bg-secondary/10 text-secondary">
                                        {{ $ticket->status }}
                                    </div>
                                @endif
                            </dd>
                        </div>
    
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="font-medium text-gray-500">
                                Submitted By
                            </dt>
                            <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0">
                                {{ $ticket->user->name }}
                            </dd>
                        </div>
    
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="font-medium text-gray-500">
                                Submitted Date
                            </dt>
                            <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0">
                                {{ $ticket->created_at }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="card my-4 mx-4 p-1">
        <div class="my-4 mx-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-semibold">Ticket Comments</h3>
                </div>
    
                <div class="card items-center text-center p-4 mt-3">
                    @if ($ticket->comments->count())
                            @foreach ($ticket->comments as $comment)
                                <div class="mb-4 w-full rounded shadow shadow-sm p-4">
                                    <div class="mb-1 italic">
                                        <p>"{{ $comment->content }}"</p>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $comment->user->name }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{ $comment->user->email }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    @else
                        <div class="text-center text-gray-500 mb-4">
                            No comments added yet.
                        </div>
                    @endif

                    <div class="w-3/4">
                        <form wire:submit.prevent="addComment">
                            <div class="">
                                <x-text-area
                                    wire:model="comment" 
                                    id="comment" name="comment" 
                                    class="mt-1 block w-full" rows="5"
                                />
                                <x-input-error :messages="$errors->first('comment')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-primary-button class="ml-2" type="submit" wire:loading.attr="disabled">
                                    Add Comment
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>