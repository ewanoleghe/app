<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        p {
            font-size: 12px;
        }

        .signature {
            font-style: italic;
        }
    </style>
</head>
<body>
    <div>
<h3># Introduction</h3>

<p>Welcome, {{ Auth::user()->name }}!</p>

<p>Thanks for getting to us. We’re thrilled to have you on board. To get the most out of [Product Name], do this primary next step:.</p>

</p>For reference, here's your message information:</br>
Subject: -{{ $data['subject'] }}-</br>
Name: -{{ Auth::user()->name }}-</br>
eMail Page: -{{ Auth::user()->email }}-</br>
Message: -{{ $data['zmessage'] }}-</p>

<p>You've started a -trial_length- day trial. You can upgrade to a paying account or cancel any time.</br>
Trial Start Date: -trial_start_date-</br>
Trial End Date: -trial_end_date-</p>

<p>If you have any questions, feel free to email our customer success team. (We're lightning quick at replying.) We also offer live chat during business hours.</p>

</p>Thanks,</br>
[Sender Name] and the [Product Name] Team</p>

</p><button type="btn" class="btn btn-danger" >Button Text</button></p>

Thanks,<br>
{{ config('app.name') }}

</div>
</body>
</html>