<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-end z-10">
    @auth
        @if (auth()->user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">Admin
                Dashboard</a>
        @elseif (auth()->user()->isOwner())
            <a href="{{ route('owner.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">Propriétaire
                Dashboard</a>
        @elseif (auth()->user()->isClient())
            <a href="{{ url('/dashboard') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                wire:navigate>Dashboard</a>
        @endif
        {{-- <a href="{{ url('/dashboard') }}"
            class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            wire:navigate>Dashboard</a> --}}
    @else
        <a href="{{ route('login') }}"
            class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            wire:navigate>Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ms-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                wire:navigate>Register</a>
        @endif
    @endauth
</div>
