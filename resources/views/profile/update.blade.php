@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid p-5 bg-success text-white text-center">
        <h1><a href="/home" style="color: white; text-decoration:none;" >{{ Auth::user()->name }}</a></h1>
        <p>Making webapp in laravel and strict standard!</p> 
    </div>

    <form method="POST" action="/i" enctype="multipart/form-data" method="post">
            @csrf
            {{-- Use a PUT/PATCH @method --}}
            @method('PATCH')

            

            <div class="container">
        <h2>Update User Profile</h2>
        <p>The .table-hover class enables a hover state on table rows:</p>            
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Details</th>
                <th>-blank-</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Title</td>
                <td><input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? Auth::user()->profile->title ?? ''}}" required autocomplete="title">

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror</td>
            </tr>

            <tr>
                <td>Description</td>
                <td><input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ Auth::user()->profile->description ?? ''}}" required autocomplete="description">

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror</td>
            </tr>

            <tr>
                <td>Address</td>
                <td><input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->profile->address  ?? ''}}" required autocomplete="address">

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror</td>
            </tr>
            <tr>
                <td>State</td>
                <td><input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ Auth::user()->profile->state  ?? ''}}" required autocomplete="state">

                @error('state')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror</td>
            </tr>
            <tr>
                <td>City</td>
                <td><input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ Auth::user()->profile->city  ?? ''}}" required autocomplete="city">

                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror</td>
            </tr>
            <tr>
                <td>Post Code</td>
                <td><input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ Auth::user()->profile->zipcode  ?? ''}}" required autocomplete="zipcode">

                @error('zipcode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror</td>
            </tr>

            <tr>
                <td>Profile Pic</td>
                <td><input type="file", class="form-control-file" id="image" name="image">

                @error('image')
                        <strong>{{ $message }}</strong>
                @enderror</td>
            </tr>

            </tbody>

        </table>
        </div>
        <div class="row pt-5"> 
             <button class="btn btn-primary text-center">Update Profile</button>
        </div>
    </form>

 </div>
@endsection
