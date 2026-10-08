
@extends('blog.base')


@section('title', 'Se connecter')

@section('content')

   <div class="max-w-lg mx-auto p-6 bg-white rounded-md shadow-md mt-6">
    <h1 class=" flex justify-center text-2xl font-bold ">CONNEXION</h1>
       @if ($errors->any())
           <div class="bg-red-100 text-red-500 border border-red-500 px-4 py-4 rounded-md relative mb-4">
         <strong class="font-bold">Errors !</strong>
         <p class="text-sm">{{$errors->first()}}</p>
       </div>
       @endif
      <form action="{{route('login.submit')}}" class="mt-4" method="POST">   
        @csrf

    <div class="mb-4">
       <label for="email" class="block text-sm font-medium text-gray-700">Email :</label>
       <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 p-3 block w-full border border-gray-300
        rounded-md shadow-md">
        @error('email')
            <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-4">
       <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe :</label>
       <input type="password" id="password" name="password" class="mt-1 p-3 block w-full border border-gray-300
        rounded-md shadow-md">
        @error('password')
            <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
        @enderror
    </div>

    <button type="submit" class="w-full py-2 px-4 bg-gray-800 hover:bg-gray-900 rounded-md text-white cursor-pointer">
        Se connecter
    </button>
    <p class="my-2 text-sm">Pas de compte ? <a href="{{route('register')}}" class="text-red-500">S'inscrire</a></p>

</form>
   </div>
    
@endsection