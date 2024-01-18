@extends('layouts.app')

@section('content')
<div class="container">
    <div><h1>Add Post</h1></div>
    <form method="POST" action="/f" enctype="multipart/form-data" method="post">
        @csrf
        
        
           

                        <div class="row mb-3">
                            <label for="caption" class="col-md-4 col-form-label text-md-end">{{ __('Caption') }}</label>

                            <div class="col-md-6">
                                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption">

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Avater') }}</label>

                            <div class="col-md-6">
                            <input type="file", class="form-control-file" id="image" name="image">

                                @error('image')
                                        <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>



                                    <div class="row pt-5"> 
                                        <button class="btn btn-primary text-center">Add Post</button>
                                    </div>
                </div>

            </div>
    </form>

</div>
@endsection
