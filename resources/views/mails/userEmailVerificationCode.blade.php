@extends('layouts.mail_wrapper')

@section('content')

    <br/>

    <h3>Hi, <strong>{{$user->username}}</strong></h3>

    <p>
        You registered an account on shortit, before you will be able to use your account; you need to verify that this is your email.
    </p>
    <p style="padding:10px 0px;">
        Use this code to Verify your email address and activate your account
        <br/>
            <h1 style="font-size: 2.5em; text-align: center; letter-spacing: .25em;">{{$verification_code}}</h1>
    </p>


@endsection('content')