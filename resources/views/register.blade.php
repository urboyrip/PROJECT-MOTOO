@extends('layouts.welcome')
@section('container')
<div id="reg_box">
    <center> 
        <img src="{{ asset('img/logo_SISI_sq.png') }}" width="85">
    </center>

    <span style="color:#BF2C45;font-weight:bold;font-size:20px;">
        <center> WELCOME </center>
    </span>

    <p style="text-align:center;font-size:14px;margin-bottom:15px;">
        Please login with your registered account
    </p>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <form method="post" action={{ Route('register') }} enctype="multipart/form-data">
                    @csrf
                    <h5>Nama Lengkap</h5>
                    <input type="text" name="nama" class="input-box-register" style="border-radius:5px;" placeholder="Nama Lengkap">
                    <br>

                    <h5>Username</h5>
                    <input type="text" name="username" class="input-box-register" style="border-radius:5px;" placeholder="Username">
                    <br>

                    <h5>Password</h5>
                    <input type="password" name="password" class="input-box-register" style="border-radius:5px;" placeholder="Password">
                    <br>
            </div>
            <div class="col-md-4">
                    <h5>Email</h5>
                    <input type="text" name="email" class="input-box-register" style="border-radius:5px;" placeholder="Jl. dummy number XX">
                    <br>

                    <h5>Nomor HP</h5>
                    <input type="text" name="nomor_hp" class="input-box-register" style="border-radius:5px;" placeholder="+62 89xxxxxxxxx">
                    <br><br>

                    <button type="submit" id="sign-up-button" >DAFTAR</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection