@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                       <!-- Session Status -->
                       <x-auth-session-status class="mb-4" :status="session('status')" />

                      <!-- Validation Errors -->
                       <x-auth-validation-errors class="mb-4" :errors="$errors" />

                       <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email Address -->
                        <div class="row mb-3">
                            <x-label for="email" :value="__('Email')" />
                            <div class="col-md-6">
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="row mb-3">
                            <x-label for="password" :value="__('Password')" />
                            <div class="col-md-6">
                            <x-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                                    {{ __('Register ?') }}
                                </a>
                            <x-button class="ml-3">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
