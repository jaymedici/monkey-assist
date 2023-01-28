<div class="col-span-12 lg:col-span-8 xl:col-span-9">
    <div class="card col-span-12 mt-12 bg-gradient-to-r from-slate-700 to-slate-600 p-5 sm:col-span-8 sm:mt-0 sm:flex-row rounded-lg">
        <div class="flex justify-center sm:order-last">
            <img class="-mt-16 h-40 sm:mt-0" src="{{ asset('images/monkeys-playing.png') }}"
                alt="image" />
        </div>
        <div class="mt-2 flex-1 pt-2 text-center text-white sm:mt-0 sm:text-left">
            <h3 class="text-xl">
                Welcome back, <span class="font-semibold">{{ Auth::user()->name }}</span>
            </h3>
            <p class="mt-2 leading-relaxed">How can we assist you today?</p>
            <p>Support monkeys are hanging by, ready to <span class="font-semibold">serve!</span></p>

            <button
                wire:click="openModal"
                class="btn mt-6 border border-white/10 bg-white/20 text-white hover:bg-white/30 focus:bg-white/30">
                <i class="fa fa-envelope mr-1"></i>
                Support
            </button>
        </div>
    </div>

    <!-- Create Ticket Modal -->
    <x-dialog-modal wire:model="showCreateTicketModal">
        <x-slot name="title">
            Open a Support Ticket
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-col gap-4 mb-4">
                <div>
                    <x-input-label for="subject" value="Subject" />
                    <x-text-input id="subject" name="subject" type="text" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->first('subject')" class="mt-2" />
                </div>
                <div>
                    <label class="block">
                        <x-input-label for="categories[]" value="Select categories corresponding to your issue" />
                        <select
                            x-init="$el._tom = new Tom($el)"
                            class="mt-1.5 w-full"
                            multiple
                            placeholder="Select a category..."
                            autocomplete="off"
                            name="categories[]"
                        >
                            <option value="">Select a state...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div>
                    <x-input-label for="content" value="Describe your issue" />
                    <x-text-area id="content" name="content" class="mt-1 block w-full" rows="7"/>
                    <x-input-error :messages="$errors->first('content')" class="mt-2" />
                </div>
                
            </div>

                
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showCreateTicketModal')" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>

            <x-primary-button class="ml-2" wire:click="createTicket" wire:loading.attr="disabled">
                Create Ticket
            </x-primary-button>
        </x-slot>
    </x-dialog-modal>
</div>