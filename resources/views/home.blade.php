@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid p-5 bg-success text-white text-center">
        <h1>{{ Auth::user()->name }}</h1>
        <p>Making webapp in laravel and strict standard!</p> 
    </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-4">
                <h3><a  class="btn btn-primary" href="a/password"  >Update Password</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                <h3><a  class="btn btn-primary"  href="b/index" >Profile</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                <h3><a  class="btn btn-primary"  href="c/edit" >Add/Edit Profile</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-4">
                <h3><a  class="btn btn-primary" href="d/tickets"  >Tickets</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                <h3><a  class="btn btn-primary"  href="e/mail" >Mail</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                <h3><a  class="btn btn-primary"  href="f/post" >Post/Create</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-4">
                <h3><a  class="btn btn-primary" href="g/"  >View Posts</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                <h3><a  class="btn btn-primary"  href="e/mail" >Column 1</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                <h3><a  class="btn btn-primary"  href="f/post" >Column 2/Create</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
            </div>
        </div>
 </div>
@endsection
