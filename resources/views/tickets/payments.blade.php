@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid p-5 bg-success text-white text-center">
        <h1><a href="/home" style="color: white; text-decoration:none;" >{{ Auth::user()->name }}</a></h1>
        <p>Making webapp in laravel and strict standard!</p> 
    </div>


    <div class="row">

        <div class="col-sm-6">
            <form action="/checkout" enctype="multipart/form-data"  method="POST">
                    @csrf


                <h2>New Order to <strong>{{ $destination }}</strong></h2>
                    <p></p>            
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Destination</th>
                        <th>Total Amount to Pay in {{ $currSign }} </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><strong>{{ $destination }}</strong></td>
                        <td><strong>{{ $currSign }}{{ $nAmt }}</strong></td>
                        <input type="hidden" name="destination" value="{{ $destination }}" />
                        <input type="hidden" name="amount" value="{{ $nAmt }}" />
                        <input type="hidden" name="curr" value="{ '$' }" />
                        <input type="hidden" name="currSign" value="{{ $currSign }}" />
                        <input type="hidden" name="nAmt" value="{{ $nAmt }}" />
                    </tr>
                    </tbody>
                </table>
                <div> <button class="btn btn-primary"> PAY {{ $currSign }}{{ $nAmt }}   </button> </div>
                </form>

        </div>

        

    </div>
</div>
@endsection
