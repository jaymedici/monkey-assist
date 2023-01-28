<x-app-layout>
    <div class="my-4 mx-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
        <div class="col-span-12 flex flex-col lg:flex-row gap-4">
            <div class="flex-1 relative flex flex-col overflow-hidden rounded-lg bg-gradient-to-br from-slate-700 to-slate-400 p-3.5">
                <p class="text-xs uppercase text-sky-100">Registered Users</p>
                <div class="flex items-end justify-between space-x-2">
                    <p class="mt-4 text-2xl font-medium text-white">4</p>
                </div>
                <div class="mask is-reuleaux-triangle absolute top-0 right-0 -m-3 h-16 w-16 bg-white/20"></div>
            </div>

            <div class="flex-1 relative flex flex-col overflow-hidden rounded-lg bg-gradient-to-br from-sky-600 to-cyan-400 p-3.5">
                <p class="text-xs uppercase text-amber-50">Open Tickets</p>
                <div class="flex items-end justify-between space-x-2">
                    <p class="mt-4 text-2xl font-medium text-white">10</p>
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

        <div class="col-span-12">
            <div class="card p-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold">Latest Open Tickets</h2>
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
                        <th
                            class="whitespace-nowrap rounded-l-lg bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800"
                        >
                            #
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