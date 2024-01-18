@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid p-5 bg-success text-white text-center">
        <h1><a href="/home" style="color: white; text-decoration:none;" >{{ Auth::user()->name }}</a></h1>
        <p>Making webapp in laravel and strict standard!</p> 
    </div>


    <div class="row">

        <div class="col-sm-6">
            <h2>Tickets</h2>
                <p></p>            
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Destination</th>
                    <th>Cost $</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ Auth::user()->profile->id ?? 'N/A'}}</td>
                    <td>{{ Auth::user()->profile->title ?? 'N/A'}}</td>
                    <td>{{ Auth::user()->profile->state ?? 'N/A'}}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="col-sm-6">
                    <h2>New Order</h2>
                    <p></p>  <br><br>          
                        
                <form action="/buy" enctype="multipart/form-data"  method="post">
                @csrf

                    <div class="row">
                            <div class="col-sm-2">
                            <button class="btn btn-primary"> Buy Ticket </button>
                            </div>

                            <div class="col-sm-4">
                            <div class="row sm-2">
                            <label for="destination" class="col-md-4 col-form-label text-md-end">{{ __('Destination') }}</label>

                            <div class="col-sm-15">
                                <input id="destination" type="text" class="form-control @error('destination') is-invalid @enderror" name="destination" required autocomplete="destination">

                                @error('destination')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row sm-2">
                            <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Charge/Amount') }}</label>

                            <div class="col-md-15">
                                <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" required autocomplete="amount">

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row sm-2">
                            <label for="curr" class="col-md-4 col-form-label text-md-end">{{ __('Currency') }}</label>

                            <div class="col-md-15">
                                 <select name="curr" id="curr">
                                <option value="">--- Choose Currency ---</option>
                                <option value="usd" >USD $</option>
                                <option value="eur">EUR €</option>
                                <option value="gbp">GBP £</option>

                                @error('curr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>

                                @error('curr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        </div>

                    </div>
</form>

            
        </div>

    </div>
</div>
@endsection
