<div x-data="{ isOpen: true }" class="relative md:block hidden">
    <button @click="isOpen = !isOpen" :class="isOpen ? 'left-64' : 'left-0'"
        class="fixed top-1/2 transform -translate-y-1/2 p-2 bg-primary/70 text-white z-50 transition-all duration-300 rounded-r-lg py-3">
        <i x-show="isOpen" class="fas fa-angle-double-left"></i>
        <i x-show="!isOpen" class="fas fa-angle-double-right"></i>
    </button>
    <aside x-show="isOpen" class="relative bg-secondary h-screen w-64 md:block shadow-xl" x-transition>
        <div class="p-3">
            <a href="/" class="text-white text-2xl font-semibold hover:text-gray-300">
                <x-logo></x-logo>
            </a>
        </div>
        <hr class="mb-4 border-t-2 border-primary">
        <nav class="text-white text-base font-semibold py-1">
            <a href="/dashboard"
                class="flex items-center {{ request()->is('dashboard*') ? 'bg-primary text-white' : 'hover:bg-primary/80 hover:text-white' }} text-black pl-3 py-3 ml-6 my-3 rounded-l-xl">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="/mypost"
                class="flex items-center {{ request()->is('mypost*') ? 'bg-primary text-white' : 'hover:bg-primary/80 hover:text-white' }} text-black pl-3 py-3 ml-6 my-3 rounded-l-xl">
                <i class="fas fa-sticky-note mr-3"></i>
                My Posts
            </a>
        </nav>
        <hr class="mt-4 border-t-2 border-primary">
    </aside>
</div>
