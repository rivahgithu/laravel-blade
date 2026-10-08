
@extends('blog.base')


@section('title', 'Single')

@section('content')

<div class="p-4">
   <h1 class="mt-6 font-bold text-6xl uppercase mb-6">
      {{$article->title}}
   </h1>
    <img src="{{asset($article->image)}}" alt="{{$article->title}}" 
         class="w-full w-[50%]  h-[50%] mb-4">
     <p>{{$article->description}}</p>
     <p class="italic">Publié par : {{$article->author->name}}</p>
</div>
    
@endsection