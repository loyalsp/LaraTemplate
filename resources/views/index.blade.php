@extends('layouts.master')
@section('style')

@endsection
@section('title')
    Lara Template
    @endsection


@section('content')
    Login
<form method="post" action="{{route('post-user-login')}}">
    Email<input name="email" type="email">
    <br>
    Pwd<input name="password" type="password">
    <input type="hidden" name="_token" value="{{Session::token()}}">
<input type="submit" value="Login">
</form>
    @endsection

@section('script')

    @endsection
