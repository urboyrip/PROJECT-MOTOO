@extends('layouts.welcome')
@section('container')
<div id="log_box">
    <center> 
        <img src="{{ asset('img/logo_SISI_sq.png') }}" width="85">
    </center>
<br>
    <span style="color:#BF2C45;font-weight:bold;font-size:20px;">
        <center> WELCOME </center>
    </span>

    <p style="text-align:center;font-size:14px;margin-bottom:30px;">
        Please login with your registered account
    </p>
    <form method="post" action="{{ Route('login') }}">
        @csrf
        <input type="text" name="username" class="input-box" placeholder="Username">
        <br><br>

        <input type="password" name="password" class="input-box" placeholder="Password">
        <br>
        <span style="color:#BF2C45;float:right;font-size:10px;margin-top:15px;">
            <a style="text-decoration:none;color:#BF2C45;"href="/resetpassword"> Lupa Password? </a>
        </span>
        <br><br>

        <button type="submit" id="sign-in-button">
            Sign In
        </button>
    </form>
    <br>
    <span style="font-size:12px;">
        <center>
            Belum punya akun? <a style="text-decoration:none;color:#BF2C45;"href="/register"> Daftar disini </a>
        </center>
    </span>
</div>
@endsection
