@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid p-5 bg-success text-white text-center">
        <h1><a href="/home" style="color: white; text-decoration:none;" >{{ Auth::user()->name }}</a></h1>
        <p>Making webapp in laravel and strict standard!</p> 
</div>

    
    <div class="container-fluid">
        <div class="col-md-6 offset-3 pt-4">
            <h3 class="text-center">Contact Us</h3>
            
            <form class="form" action="/l" method="post">
            @csrf
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">New Message</label>
                    <textarea id="message" class="form-control" name="message" placeholder="Write something.." style="height:200px"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary text-center">Submit</button>
            </form>
        </div>
    </div>
@endsection
