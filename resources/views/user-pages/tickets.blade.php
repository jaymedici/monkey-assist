<x-app-layout>
    <div class="my-4 mx-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
        <div class="col-span-12">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-semibold">Your Support Tickets</h3>

                <label class="block">
                    <input
                    class="form-input w-full h-8 rounded-full border border-slate-300 bg-transparent px-4 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                    placeholder="Search here..."
                    type="text"
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
                      <th
                        class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                      >
                        #
                      </th>
                      <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                      >
                        Avatar
                      </th>
                      <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                      >
                        Name
                      </th>
                      <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                      >
                        Age
                      </th>
                      <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                      >
                        Phone
                      </th>
                      <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                      >
                        Role
                      </th>
                      <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                      >
                        Status
                      </th>
                      <th
                        class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                      >
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr
                        class="border-y border-transparent border-b-slate-200"
                      >
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5"> 
                            1
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <div class="avatar flex h-10 w-10">
                            <img
                              class="mask is-squircle" src="https://i.pravatar.cc/150?img=1" alt="avatar"
                            />
                          </div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-3 font-medium text-slate-700 lg:px-5">
                            John Doe
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5"> 
                            18
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                            0654 123 456
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <div class="badge rounded-full">
                            Secondary
                          </div>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <label class="inline-flex items-center">
                            <input class="form-switch h-5 w-10 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:bg-primary checked:before:bg-white"
                              type="checkbox"/>
                          </label>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <div
                            x-data="usePopper({placement:'bottom-end',offset:4})"
                            @click.outside="if(isShowPopper) isShowPopper = false"
                            class="inline-flex"
                          >
                            <button
                              x-ref="popperRef"
                              @click="isShowPopper = !isShowPopper"
                              class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25"
                            >
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewbox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                              >
                                <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                                />
                              </svg>
                            </button>

                            <div
                              x-ref="popperRoot"
                              class="popper-root"
                              :class="isShowPopper && 'show'"
                            >
                              <div
                                class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter"
                              >
                                <ul>
                                  <li>
                                    <a
                                      href="#"
                                      class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800"
                                      >Action</a
                                    >
                                  </li>
                                  <li>
                                    <a
                                      href="#"
                                      class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800"
                                      >Another Action</a
                                    >
                                  </li>
                                  <li>
                                    <a
                                      href="#"
                                      class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800"
                                      >Something else</a
                                    >
                                  </li>
                                </ul>
                                <div
                                  class="my-1 h-px bg-slate-150"
                                ></div>
                                <ul>
                                  <li>
                                    <a
                                      href="#"
                                      class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800"
                                      >Separated Link</a
                                    >
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                  </tbody>
                </table>
              </div>

                <div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                    Footer
                </div>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>