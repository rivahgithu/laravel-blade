
@extends('blog.base')


@section('title', 'Contact')

@section('content')

<div class="p-4">
     @if (session('success'))
         <div class="bg-green-100 text-green-500 p-3">
          <p>Message envoyé</p>
          <p>{{session('success')}}</p>
      </div>
    @endif

    <form action="{{route('contact.send')}}" class="mt-4" method="POST">
      @csrf

      <div class="max-w-lg mx-auto mb-4">
        <label for="name" class="blok text-sm font-medium text-gray-700">Nom :</label>
        <input type="text" id="name" name="name" value="{{old('name')}}" class="w-full block
          mt-1 p-3 border border-gray-300 rounded-md shadow-sm">
          @error('name')
            <p class="bg-red-100 text-red-500 text-sm p-2">{{$message}}</p>
          @enderror
      </div>

      <div class="max-w-lg mx-auto mb-4">
        <label for="email" class="blok text-sm font-medium text-gray-700">Email :</label>
        <input type="email" id="email" name="email" value="{{old('email')}}" class="w-full block
          mt-1 p-3 border border-gray-300 rounded-md shadow-sm">
          @error('email')
            <p class="bg-red-100 text-red-500 text-sm p-2">{{$message}}</p>
          @enderror
      </div>

      <div class="max-w-lg mx-auto mb-4">
        <label for="message" class="blok text-sm font-medium text-gray-700">Message :</label>
        <textarea  id="message" name="message" value="{{old('message')}}" class="w-full block
          mt-1 p-3 border border-gray-300 rounded-md shadow-sm"></textarea>
          @error('message')
            <p class="bg-red-100 text-red-500 text-sm p-2">{{$message}}</p>
          @enderror
      </div>
       <div class="max-w-lg mx-auto mb-4">
        <button type="submit" class="w-full py-2 px-4 bg-gray-800 hover:bg-gray-900 rounded-md text-white cursor-pointer">
            Envoyer
        </button>
        </div>

    </form>
</div>
    
@endsection