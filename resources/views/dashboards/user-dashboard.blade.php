<x-app-layout>

<div class="mt-4 ml-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
    <div class="col-span-12 lg:col-span-8 xl:col-span-9">
        <div class="card col-span-12 mt-12 mr-4 bg-gradient-to-r from-slate-700 to-slate-600 p-5 sm:col-span-8 sm:mt-0 sm:flex-row rounded-lg">
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
                    class="btn mt-6 border border-white/10 bg-white/20 text-white hover:bg-white/30 focus:bg-white/30">
                    <i class="fa fa-envelope mr-1"></i>
                    Support
                </button>
            </div>
        </div>

    </div>

    <div class="col-span-12 lg:col-span-4 xl:col-span-3">
        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:grid-cols-1 lg:gap-6 mr-4">
            <div class="rounded-lg bg-slate-300 px-4 pb-2 sm:px-5">   
                <div class="space-y-4 py-3">
                    <div class="space-y-3 text-xs+ pt-2">
                        <p class="font-bold text-slate-700">
                            Your Ticket Summary:
                        </p>
                        <div class="flex justify-between">
                            <p class="font-semibold text-slate-700">
                                Open Tickets
                            </p>
                            <p class="text-right">2</p>
                        </div>
                        <div class="my-4 h-px  bg-slate-200"></div>
                        <div class="flex justify-between">
                            <p class="font-semibold text-slate-700">
                                Closed Tickets
                            </p>
                            <p class="text-right">4</p>
                        </div>
                        <div class="my-4 h-px  bg-slate-200"></div>
                        <div class="flex justify-between">
                            <p class="font-semibold text-slate-700">
                                Total
                            </p>
                            <p class="text-right">4</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="my-4 mx-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
    <div class="col-span-12">
        <div class="card p-4">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold">Recent Tickets</h2>
                <button
                    class="btn border border-info/30 bg-info/10 font-medium text-info  hover:bg-info/20 focus:bg-info/20 active:bg-info/25"
                >
                    <i class="fa-solid fa-list mr-1"></i>
                    View All Tickets
                </button>
            </div>

            <div class="mt-4 is-scrollbar-hidden min-w-full overflow-x-auto">
                <table class="is-zebra w-full pb-4 text-left">
                <thead>
                    <tr>
                    <th
                        class="whitespace-nowrap rounded-l-lg bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 lg:px-5"
                    >
                        #
                    </th>
                    <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 lg:px-5"
                    >
                        Subject
                    </th>
                    <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 lg:px-5"
                    >
                        Content
                    </th>
                    <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 lg:px-5"
                    >
                        Categories
                    </th>
                    <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 lg:px-5"
                    >
                        Status
                    </th>
                    <th
                        class="whitespace-nowrap rounded-r-lg bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 lg:px-5"
                    >
                        Action
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5">1</td>
                        <td class="px-4 py-3 sm:px-5">Help needed</td>
                        <td class="px-4 py-3 sm:px-5">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere nisi libero, ut congue risus auctor at. Proin id cursus libero. Cras porta lobortis magna, ut aliquet ipsum accumsan sed
                        </td>
                        <td class="px-4 py-3 sm:px-5">Tech, Biz</td>
                        <td class="px-4 py-3 sm:px-5">Open</td>
                        <td class="rounded-r-lg px-4 py-3 sm:px-5">View</td>
                    </tr>
                    <tr>
                        <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5">2</td>
                        <td class="px-4 py-3 sm:px-5">Help needed</td>
                        <td class="px-4 py-3 sm:px-5">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere nisi libero, ut congue risus auctor at. Proin id cursus libero. Cras porta lobortis magna, ut aliquet ipsum accumsan sed
                        </td>
                        <td class="px-4 py-3 sm:px-5">Tech, Biz</td>
                        <td class="px-4 py-3 sm:px-5">Open</td>
                        <td class="rounded-r-lg px-4 py-3 sm:px-5">View</td>
                    </tr>
                    <tr>
                        <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5">3</td>
                        <td class="px-4 py-3 sm:px-5">Help needed</td>
                        <td class="px-4 py-3 sm:px-5">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere nisi libero, ut congue risus auctor at. Proin id cursus libero. Cras porta lobortis magna, ut aliquet ipsum accumsan sed
                        </td>
                        <td class="px-4 py-3 sm:px-5">Tech, Biz</td>
                        <td class="px-4 py-3 sm:px-5">Open</td>
                        <td class="rounded-r-lg px-4 py-3 sm:px-5">View</td>
                    </tr>
                    <tr>
                        <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5">4</td>
                        <td class="px-4 py-3 sm:px-5">Help needed</td>
                        <td class="px-4 py-3 sm:px-5">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere nisi libero, ut congue risus auctor at. Proin id cursus libero. Cras porta lobortis magna, ut aliquet ipsum accumsan sed
                        </td>
                        <td class="px-4 py-3 sm:px-5">Tech, Biz</td>
                        <td class="px-4 py-3 sm:px-5">Open</td>
                        <td class="rounded-r-lg px-4 py-3 sm:px-5">View</td>
                    </tr>
                    <tr>
                        <td class="whitespace-nowrap rounded-l-lg px-4 py-3 sm:px-5">5</td>
                        <td class="px-4 py-3 sm:px-5">Help needed</td>
                        <td class="px-4 py-3 sm:px-5">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris posuere nisi libero, ut congue risus auctor at. Proin id cursus libero. Cras porta lobortis magna, ut aliquet ipsum accumsan sed
                        </td>
                        <td class="px-4 py-3 sm:px-5">Tech, Biz</td>
                        <td class="px-4 py-3 sm:px-5">Open</td>
                        <td class="rounded-r-lg px-4 py-3 sm:px-5">View</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</x-app-layout>