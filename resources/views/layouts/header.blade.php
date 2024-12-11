<header class="flex justify-between items-center py-3 px-6 header_branding">
    <div class="flex items-center">

        <div class="relative mx-4 lg:mx-0">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
            </span>
        </div>
    </div>

    <div class="flex items-center">    
        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = ! dropdownOpen"
                class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                <img class="h-full w-full object-cover"
                    src="/images/{{ auth()->user()->profile }}"
                    alt="Your avatar">
            </button>

            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
                style="display: none;"></div>

            <div x-show="dropdownOpen"
                class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                style="display: none;">
                <a href="{{ route('admin.profile') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profile</a>

                <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</a>
                </form>
            </div>
        </div>
    </div>
</header>
