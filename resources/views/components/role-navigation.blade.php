@php
    $userRole = Auth::user()->getRoleAsString(); // Récupérer le rôle de l'utilisateur connecté
@endphp

<div class="space-x-8 sm:-my-px sm:ms-10 sm:flex">
    @if ($userRole === 'admin')
        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" wire:navigate>
            {{ __('Admin Dashboard') }}
        </x-nav-link>
    @elseif ($userRole === 'owner')

        <x-nav-link :href="route('owner.dashboard')" :active="request()->routeIs('owner.dashboard')" wire:navigate>
            {{ __('Owner Dashboard') }}
        </x-nav-link>

        <x-nav-link :href="route('halls.index')" :active="request()->routeIs('halls.index')" wire:navigate>
            {{ __('Salles') }}
        </x-nav-link>

    @elseif ($userRole === 'client')
        <x-nav-link :href="route('client.dashboard')" :active="request()->routeIs('client.dashboard')" wire:navigate>
            {{ __('Client Dashboard') }}
        </x-nav-link>
    @else
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
            {{ __('Dashboard') }}
        </x-nav-link>
    @endif
</div>
