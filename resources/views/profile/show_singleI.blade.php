@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid p-5 bg-success text-white text-center">
    <h1><a href="/home" style="color: white; text-decoration:none;" >{{ Auth::user()->name }}</a></h1>
        <p>Making webapp in laravel and strict standard!</p> 
    </div>

    <form action="/k/{{ $posts->id }}" method="POST">
    @csrf
    @method('DELETE')

        <div class="container mt-5">
            <div class="row">

                <div class="col-sm-4 pb-4"> {{-- // pb-4 = Padding bottom// * this is a comment --}}
                <p>{{ $posts->caption }} </P>
                <img src="/storage/{{ $posts->image }}" class="w-100">
                </div>

                
            </div>
        </div>
        <div> <button type="submit" class="btn btn-danger">DELETE IMAGE</button></div>

    </form>
      
 </div>
@endsection
