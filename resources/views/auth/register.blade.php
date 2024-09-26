@extends('layouts.auth')
@section('titlePage', 'Create an account')
@section('content')
    <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm" x-data="{ submitting: false }">
        <form class="space-y-3" action="{{ route('register') }}" method="POST" @submit="submitting = true; $el.submit()">
            @csrf
            <div>
                <label for="name" class="label-1">Name</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" autocomplete="name" required
                        class="input-1 @error('name') border-red-500 @enderror" value="{{ old('name') }}"
                        placeholder="Input Name">
                </div>
                @error('name')
                    <p class="err-msg-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="username" class="label-1">Username</label>
                <div class="mt-2">
                    <input id="username" name="username" type="text" autocomplete="username" required
                        class="input-1 @error('username') border-red-500 @enderror" value="{{ old('username') }}"
                        placeholder="Input Username">
                </div>
                @error('username')
                    <p class="err-msg-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="label-1">Email
                    address</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="input-1 @error('email') border-red-500 @enderror" value="{{ old('email') }}"
                        placeholder="Input Email">
                </div>
                @error('email')
                    <p class="err-msg-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="label-1">Password</label>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="input-1" placeholder="Input Password">
                </div>
                @error('password')
                    <p class="err-msg-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <div class="flex items-center justify-between">
                    <label for="password_confirmation" class="label-1">Confirm
                        Password</label>
                </div>
                <div class="mt-2">
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="input-1"
                        placeholder="Confirm Password">
                </div>
            </div>
            <div>
                <button type="submit" class="btn-1" :class="!submitting || 'cursor-wait'" :disabled="submitting"
                    x-text="submitting ? 'Submitting...' : 'Sign Up'"></button>
            </div>
        </form>

        <p class="mt-5 text-center text-sm text-gray-500">
            Already have an account?
            <a href="/login" class="font-semibold leading-6 text-primary hover:text-primary/70">Login here</a>
        </p>
    </div>
@endsection
