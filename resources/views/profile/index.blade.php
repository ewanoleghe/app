@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid p-5 bg-success text-white text-center">
        <h1><a href="/home" style="color: white; text-decoration:none;" >{{ Auth::user()->name }}</a></h1>
        <p>Making webapp in laravel and strict standard!</p> 
    </div>

    <div class="container"><p></p>
        <div> <img src="{{ Auth::user()->profile->profileImage() }}" class="rounded-circle w-20"> </div>
  <h2>User Profile</h2>
  <p>{{--The .table-hover class enables a hover state on table rows:--}}</p>            
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
        <td>{{ Auth::user()->profile->title ?? 'N/A'}}</td>
      </tr>
      <tr>
        <td>Address</td>
        <td>{{ Auth::user()->profile->address  ?? 'N/A'}}</td>
      </tr>
      <tr>
        <td>State</td>
        <td>{{ Auth::user()->profile->state  ?? 'N/A'}}</td>
      </tr>
      <tr>
        <td>City</td>
        <td>{{ Auth::user()->profile->city  ?? 'N/A'}}</td>
      </tr>
      <tr>
        <td>Post Code</td>
        <td>{{ Auth::user()->profile->zipcode  ?? 'N/A'}}</td>
      </tr>
    </tbody>
  </table>
</div>
 </div>
@endsection
