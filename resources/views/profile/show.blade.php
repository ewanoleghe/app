@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid p-5 bg-success text-white text-center">
    <h1><a href="/home" style="color: white; text-decoration:none;" >{{ Auth::user()->name }}</a></h1>
        <p>Making webapp in laravel and strict standard!</p> 
    </div>

        <div class="container mt-5">
            <div class="row">
                @foreach(auth()->user()->posts as $post)

                <div class="col-sm-4 pb-4"> {{-- // pb-4 = Padding bottom// * this is a comment --}}
                <p>{{ $post->caption }} </P>
                <a href="/j/{{ $post->id }}"> {{-- Ancour single image ID enable single view n pass id for delete --}}
                <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
                </div>

                @endforeach
                
            </div>
        </div>

      
 </div>
@endsection
