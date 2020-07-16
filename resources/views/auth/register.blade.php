@extends('layouts.app')

@section('content')
    <div class="container mx-auto flex justify-center">
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                         focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        placeholder="Name">
                    @error('name')
                    <p class="text-red-500 text-xs italic" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                         focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        placeholder="Email">
                    @error('email')
                    <p class="text-red-500 text-xs italic" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3
                     leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                           id="password"
                           type="password"
                           name="password"
                           autocomplete="current-password"
                           placeholder="******************">
                    @error('password')
                    <p class="text-red-500 text-xs italic" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password-confirm">
                       Confirm Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3
                     leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                           id="password-confirm"
                           type="password"
                           name="password_confirmation"
                           autocomplete="new-password"
                           placeholder="******************">
                </div>
                <div class="md:flex md:items-center mb-6">
                    @foreach($roles as $role)
                    <div class="md:w-1/3"></div>
                    <label class="md:w-2/3 block text-gray-500 font-bold">
                        <input class="mr-2 leading-tight" type="radio" name="role_id" id="remember" value="{{ $role->id }}">
                        <span class="text-sm">
                            {{$role->name }}
                        </span>
                    </label>
                    @endforeach
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Register
                    </button>
                    @if (Route::has('password.request'))
                        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
