<!-- Desktop Header -->
<header class="w-full items-center bg-primary py-2 px-6 hidden md:flex">
    <div class="w-1/2">
        <h1 class="text-xl text-white font-medium">{{ $slot }}</h1>
    </div>
    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <button @click="isOpen = !isOpen"
            class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80">
        </button>
        <div x-show="isOpen" class="absolute z-50 w-52 bg-white rounded-lg shadow-lg py-2 mt-16">
            <a href="/" class="block px-4 py-2 cursor-pointer hover:bg-gray-100">
                <i class="fas fa-home mr-3"></i>Back to Home</a>
            <hr>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="block w-full text-start px-4 py-2 cursor-pointer hover:bg-gray-100">
                    <i class="fas fa-sign-out-alt ms-1 mr-3"></i>Sign Out</button>
            </form>
        </div>
    </div>
</header>

<!-- Mobile Header & Nav -->
<header x-data="{ isOpen: false }" class="w-full bg-primary py-5 md:hidden">
    <div class="flex items-center px-6">
        <a href="/" class="text-white text-start text-3xl font-semibold uppercase hover:text-gray-300 ">
            <x-logo></x-logo>
        </a>
        <button @click="isOpen = !isOpen" class="text-white ms-auto focus:outline-none">
            <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4 w-full">
        <a href="/dashboard"
            class="flex items-center {{ request()->is('dashboard*') ? 'bg-secondary text-black' : ' text-white' }} py-2 pl-4 nav-item">
            <i class="fas fa-tachometer-alt mr-3 ms-6"></i>
            Dashboard
        </a>
        <a href="/mypost"
            class="flex items-center {{ request()->is('mypost*') ? 'bg-secondary text-black' : ' text-white' }} py-2 pl-4 nav-item">
            <i class="fas fa-sticky-note mr-3 ms-6"></i>
            My Posts
        </a>
        <a href="#" class="flex items-center text-white py-2 pl-4 nav-item">
            <i class="fas fa-sign-out-alt mr-3 ms-6"></i>
            Sign Out
        </a>
    </nav>
    <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
      <i class="fas fa-plus mr-3"></i> New Report
  </button> -->
</header>
