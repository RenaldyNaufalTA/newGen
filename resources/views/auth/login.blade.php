@extends('layouts.auth')
@section('titlePage', 'Sign in to your account')
@section('content')
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-3" action="{{ route('login') }}" method="post">
            @csrf
            <div>
                <label for="email" class="label-1">Email
                    address</label>
                <div class="mt-2">
                    <input id="username" name="username" type="text" autocomplete="email" required class="input-1"
                        placeholder="Input Email" value="{{ old('username') }}">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="label-1">Password</label>
                    <div class="text-sm">
                        <a href="#" class="font-semibold text-primary hover:text-primary/80">Forgot
                            password?</a>
                    </div>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="input-1" placeholder="Input Password">
                </div>
            </div>

            <div>
                <button type="submit" class="btn-1">Sign
                    in</button>
            </div>
        </form>

        <p class="mt-5 text-center text-sm text-gray-500">
            Not a member?
            <a href="/register" class="font-semibold leading-6 text-primary hover:text-primary/70">Sign Up</a>
        </p>
    </div>
@endsection
