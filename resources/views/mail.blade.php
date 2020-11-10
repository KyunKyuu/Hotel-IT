@extends('layouts/auth')
@section('title', 'Reset Password')
@section('content')
<div class="main"> 

<h2>Hello Admin</h2> <br><br>

You have got an email from : {{ $name }} <br><br>

User details: <br><br>

Name: {{ $name }} <br>
Email: {{ $email }} <br>
Subject: {{ $subject }} <br>
Message: {{ $user_query }} <br><br>

Thanks
@endsection