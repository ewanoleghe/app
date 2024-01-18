@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid p-5 bg-success text-white text-center">
        <h1><a href="/home" style="color: white; text-decoration:none;" >{{ Auth::user()->name }}</a></h1>
        <p>Making webapp in laravel and strict standard!</p> 
    </div>


    <div class="row">

        <div class="col-sm-6 pt-5">
            <form action="/stripe" enctype="multipart/form-data"  method="post">
                    @csrf


                <h2>Payment for New Order to <strong>{{ $destination }}</strong></h2>
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
                    </tr>
                    </tbody>
                </table>

                <div class='form-row row'>
                           <div class='col-xs-12 col-md-6 form-group required'>
                              <label class='control-label'>Name on Card</label> 
                              <input class='form-control' size='4' type='text'>
                           </div>
                           <div class='col-xs-12 col-md-6 form-group required'>
                              <label class='control-label'>Card Number</label> 
                              <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                           </div>                           
                        </div>                        
                        <div class='form-row row'>
                           <div class='col-xs-12 col-md-4 form-group cvc required'>
                              <label class='control-label'>CVC</label> 
                              <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Month</label> 
                              <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Year</label> 
                              <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                           </div>
                        </div>
                      {{-- <div class='form-row row'>
                         <div class='col-md-12 error form-group hide'>
                            <div class='alert-danger alert'>Please correct the errors and try
                               again.
                            </div>
                         </div>
                      </div> --}}
                        <div class="container pt-5">
                            <div class="row"> <button class="btn btn-primary" type="submit"> PAY {{ $currSign }}{{ $nAmt }}   </button> </div>
                      </div>
                </form>

        </div>

        

    </div>
</div>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
$(function() {
  var $form = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
    $inputs = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid = true;
    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
    });
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }
});
</script>
@endsection
