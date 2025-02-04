<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Enums\RoleEnum;

new #[Layout('layouts.guest')] class extends Component {
    public string $name = '';
    public string $lastname = '';
    public string $firstname = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public bool $acceptTerms = false;
    public bool $registerCompany = false;

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'acceptTerms' => ['required', 'accepted'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if ($this->registerCompany) {
            $validated['role'] = RoleEnum::OWNER->value;
        }else {
            $validated['role'] = RoleEnum::CLIENT->value;
        }

        // // Générer un code de vérification unique et l'envoyer dans la session
        // $verificationCode = Str::random(6);

        // // Stocker temporairement le code dans la session
        // Session::put('verification_code', $verificationCode);

        // // Envoyer l'email de vérification
        // Mail::to($user->email)->send(new VerificationCodeMail($verificationCode));

        // $this->redirect(route('verify.code'));

        event(new Registered(($user = User::create($validated))));



        if ($user->isOwner()) {
            Auth::login($user);
            // Rediriger vers la route de création de société
            $this->redirect(route('company'));
        }

        if ($user->isClient()) {
            $this->redirect(route('login'));
        }


        // $this->redirectIntended(default: RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div class="lg:w-2/4   my-6 p-10  bg-white shadow-md overflow-hidden sm:rounded-lg">
     <p class="text-center text-3xl text-bold text-capitalize my-5 "> Inscription</p>
    <form wire:submit="register">
        <!-- firtname -->
        <div class="lg:grid grid-cols-2 gap-6">
            <div class="mt-1">
                <x-input-label for="first_name" :value="__('First Name *')" />
                <x-text-input wire:model="firstname" id="firstname" class="block mt-1 w-full" type="text"
                    name="first_name" required autofocus autocomplete="firstname" :placeholder="__('Votre prenom')" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="mt-1">
                <x-input-label for="last_name" :value="__('Last Name *')" />
                <x-text-input wire:model="lastname" id="lastname" class="block mt-1 w-full" type="text"
                    name="last_name" required autofocus autocomplete="lastname" :placeholder="__('Votre nom')" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
            <!-- Name -->
            <div class="mt-1">
                <x-input-label for="name" :value="__('Name *')" />
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"
                    required autofocus autocomplete="name" :placeholder="__('Votre username')" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-1">
                <x-input-label for="email" :value="__('Email*')" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                    required autocomplete="email" :placeholder="__('example@gmail.com')" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="mt-1">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password"
                    name="password" :placeholder="__('••••••••')" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- Confirm Password -->
            <div class="mt-2">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                    type="password" name="password_confirmation" required autocomplete="new-password"
                    :placeholder="__('••••••••')" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="my-6 flex items-center justify-between bg-primary text-lg p-4 rounded-lg text-lg">

            <label class="text-white"> <i class="fas fa-building text-white px-2"></i> Souhaitez-vous inscrire une société ?</label>
            <x-text-input type="checkbox" wire:model="registerCompany" class="w-5 h-5" />

        </div>

        <div class="mb-4">
            <div class="flex items-center space-x-2">
                <x-text-input type="checkbox" wire:model="acceptTerms" class="w-4 h-4" />
                <label class="text-gray-500 text-lg">
                    <span>J'accepte les <a href="#" class="text-primary">conditions générales</a></span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('acceptTerms')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-8 mb-5">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 ">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
