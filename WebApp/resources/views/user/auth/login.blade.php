@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-center">
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
            <h3 class="text-2xl font-bold text-center">Log In</h3>
            <form action="{{ route('login.submit') }}" method="POST">
                <div class="mt-4">

                    @if (!empty($message))
                        <div class="notification {{ $message['colour'] }}">
                            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                                <div>
                                    <span class="icon"><i class="mdi mdi-{{ $message['icon'] }}"></i></span>
                                    <b>{{ $message['text'] }}</b>
                                </div>
                            </div>
                        </div>
                    @endif

                    @include('components/form/input', [
                        'label' => 'Account ID',
                        'name' => 'ACCOUNTID',
                    ])

                    @include('components/form/input', [
                        'label' => 'Password',
                        'name' => 'password',
                        'type' => 'password',
                    ])

                    <div class="flex">
                        @csrf
                        <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                            Login
                        </button>
                    </div>

                    <div class="mt-6 text-grey-dark">
                        Don't have an account yet?
                        <a class="text-blue-600 hover:underline" href="{{ route('register') }}">
                            Register Now
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
