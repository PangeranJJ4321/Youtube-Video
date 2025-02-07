@extends('welcome')

@section('content')
<h3 class="text-center text-3xl mb-5 text-gray-600 font-bold">Login</h3>
<form class="max-w-sm mx-auto bg-gray-50 rounded-lg shadow dark:bg-gray-800 p-5" action="{{route('login.store')}}" method="POST">
    @csrf
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@gmail.com"/>
        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
        @error('password')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-5">
        @if (Session::has('fail'))
        <span class="text-red-500 text-xs mt-1 font-bold">{{Session::get('fail')}}</span>
    @endif
    </div>
    <div class="flex items-center h-5 justify-between">
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">Don't have an account? <a href="/register" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign up</a></p>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
    </div>
</form>
  
@endsection