@extends('layouts.dashboard')
@section('content')
@include('components/title-section', ['category' => 'Management', 'section' => 'Accounts'])
@include('components/hero-bar', ['title' => 'Create'])



<section class="section main-section">

  <div class="w-1/2 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
    <form action="{{route('accounts.store')}}" method="POST">
      @include('components/form/input', [
      'label' => 'Account ID',
      'name' => 'account_id'
      ])
      @include('components/form/input', [
      'label' => 'Password',
      'name' => 'password',
      'type' => 'password'
      ])
      @include('components/form/input', [
      'label' => 'Confirm Password',
      'name' => 'password_confirmation',
      'type' => 'password'
      ])

      <div class="flex items-center justify-between">
        @csrf
        <input type="submit" class="bg-blue-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="button" value="Create" />
        <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
          Forgot Password?
        </a>
      </div>
    </form>
  </div>
</section>
@stop