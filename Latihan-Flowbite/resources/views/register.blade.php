@extends('welcome')

@section('content')
    
<h3 class="text-center text-3xl mb-5 text-gray-600 font-bold">Register</h3>
<form action="{{route('register.store')}}" method="POST" class="max-w-sm mx-auto">
  @csrf
    <div class="mb-5">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full name</label>
      <input type="name" name="name" id="name" value="{{old('name')}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="full name" />
      @error('name')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-5">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
      <input type="email" name="email" id="email" value="{{old('email')}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" />
      @error('email')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-5">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
      <input type="password" name="password" id="password" value="{{old('password')}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" />
      @error('password')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="flex items-center h-5 justify-between">
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">Already have an account? <a href="/login" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign in</a></p>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
    </div>
</form>
  
    
@endsection