<div class="card my-4 mx-4 p-1">
    <div class="my-4 mx-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
        <div class="col-span-12">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-semibold">All Registered Users</h3>
    
                <label class="block">
                    <input
                    class="form-input w-full h-8 rounded-full border border-slate-300 bg-transparent px-4 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                    placeholder="Search users here..."
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
                        <th wire:click="sortBy('created_at')"
                            class="whitespace-nowrap rounded-tl-lg hover:underline cursor-pointer bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5">
                            Date Created
                            @if ($this->sortField === 'created_at' && $sortDirection === 'asc')
                                <i class="text-sm fa fa-chevron-up"></i>
                            @elseif ($this->sortField === 'created_at' && $sortDirection === 'desc')
                                <i class="text-sm fa fa-chevron-down"></i>
                            @endif
                        </th>
                        <th wire:click="sortBy('name')"
                            class="whitespace-nowrap hover:underline cursor-pointer bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5">
                            Name
                            @if ($this->sortField === 'name' && $sortDirection === 'asc')
                                <i class="text-sm fa fa-chevron-up"></i>
                            @elseif ($this->sortField === 'name' && $sortDirection === 'desc')
                                <i class="text-sm fa fa-chevron-down"></i>
                            @endif
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5">
                            Email
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $index => $user)
                        <tr wire:loading.class.delay="opacity-50" wire:key="{{ $user->id }}"
                            class="border-y border-transparent border-b-slate-200"
                        >
                            <td class="px-4 py-3 sm:px-5">
                                {{ $user->created_at }}
                            </td>
                            <td class="px-4 py-3 sm:px-5">
                                {{ $user->name }}
                            </td>
                            <td class="px-3 py-3 text-sm text-slate-700 lg:px-5">
                                {{ $user->email }}
                            </td>
                            <td class="px-4 py-3 sm:px-5">
                                <a wire:click="openModal({{ $user }})"
                                    class="btn border border-info/30 bg-info/10 text-sm text-info  hover:bg-info/20 focus:bg-info/20 active:bg-info/25"
                                >
                                Edit User
                                </a>
                            </td>
                    </tr>
                    @empty
                    <td colspan="6" class="text-center text-lg px-4 py-3 sm:px-5">
                    No users Found
                    </td>
                    @endforelse
                    </tbody>
                </table>
                </div>
    
                <div class="space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                    {!! $users->links() !!}
                </div>
            </div
        </div>
    </div>

    <!-- Edit User Modal -->
    <x-dialog-modal wire:model="showEditUserModal">
        <x-slot name="title">
            Edit User Details
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="updateUser">
                @csrf
            <div class="flex flex-col gap-4 mb-2">
                <div>
                    <x-input-label for="name" value="Name" required="true"/>
                    <x-text-input
                        wire:model="userDetails.name" 
                        id="name" name="name" 
                        type="text" class="mt-1 block w-full" 
                    />
                    <x-input-error :messages="$errors->first('userDetails.name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="email" value="Email" required="true"/>
                    <x-text-input
                        wire:model="userDetails.email" 
                        id="email" name="email" 
                        type="email" class="mt-1 block w-full" 
                    />
                    <x-input-error :messages="$errors->first('userDetails.email')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password" value="Password" required="true"/>
                    <x-text-input
                        wire:model="userDetails.password" 
                        id="password" name="password" 
                        type="password" class="mt-1 block w-full" 
                    />
                    <x-input-error :messages="$errors->first('userDetails.password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" value="Confirm Password" required="true"/>
                    <x-text-input
                        wire:model="userDetails.password_confirmation" 
                        id="password_confirmation" name="password_confirmation" 
                        type="password" class="mt-1 block w-full" 
                    />
                    <x-input-error :messages="$errors->first('userDetails.password_confirmation')" class="mt-2" />
                </div>
                
            </div>

                
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>

            <x-primary-button class="ml-2" type="submit" wire:loading.attr="disabled">
                Update User
            </x-primary-button>
            </form>
        </x-slot>
    </x-dialog-modal>
</div>