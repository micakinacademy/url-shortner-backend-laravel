@extends('layouts.mail_wrapper')

@section('content')

    <br/>

    <h3>Hello, <strong>{{$user->username}}</strong></h3>

    <p>We appreciate your interest for taking the bold step to try our platform. Its completely Free, start shorting your long URL
    </p>

    <p style="padding:10px 0px;">
        You can glance through some of the frequently asked questions
        <br/>
    </p>


@endsection('content')