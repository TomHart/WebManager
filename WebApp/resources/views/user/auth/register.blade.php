@extends('layouts.app')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
        <h3 class="text-2xl font-bold text-center">Join us</h3>
        <form action="{{ route('register.submit') }}" method="POST">
            <div class="mt-4">

                @include('components/form/input', [
                    'label' => 'Account ID',
                    'name' => 'account_id',
                ])

                @include('components/form/input', [
                    'label' => 'Email Address',
                    'name' => 'email_address',
                    'type'  => 'email'
                ])

                @include('components/form/input', [
                    'label' => 'Password',
                    'name' => 'password',
                    'type' => 'password',
                ])

                @include('components/form/input', [
                    'label' => 'Confirm Password',
                    'name' => 'password_confirmation',
                    'type' => 'password',
                ])

                <div class="flex">
                    @csrf
                    <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                        Create Account
                    </button>
                </div>

                <div class="mt-6 text-grey-dark">
                    Already have an account?
                    <a class="text-blue-600 hover:underline" href="{{route('login')}}">
                        Log in
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
