<x-app-layout>

<div class="mt-4 ml-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
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
                <p class="mt-2 leading-relaxed">The monkeys are standing by</p>
                <p>ready to <span class="font-semibold">serve!</span></p>

                <button
                    class="btn mt-6 border border-white/10 bg-white/20 text-white hover:bg-white/30 focus:bg-white/30">
                    Request Support
                </button>
            </div>
        </div>
    </div>
</div>

</x-app-layout>