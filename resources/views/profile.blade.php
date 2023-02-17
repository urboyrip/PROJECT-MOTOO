@extends('layouts.main')
@section('container')
<div id="box-utama">
    <div class="container">
        <div class="row">
            <div id="profile-box">
                <div class="col-md-4" style="margin-right:20px;">
                    <img src="{{ asset('img/teknisi/maudy.jpg') }}" width="100%" border-radius=>
                    <div class="button-profile">
                        <a style="font-weight:bold;" href="/profile/editpassword/{{ $user->id }}"> Change Password </a>
                    </div>
                    <form method="POST" action="{{ Route('logout') }}">
                        @csrf
                        <div class="button-profile">
                            <button style="border:none;background-color:white;"> Log Out </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7" id="profile-content-box">
                    <div class="button-profile" style="border:1px solid #BF2C45;margin-top:-15px;margin-right:-15px;float:right;color:#BF2C45;width:110px">
                        <a href="/profile/{{ $user->id }}/edit">Edit Profile </a>
                    </div>
                    <h3>
                        {{ $user->Nama_User }}
                    </h3>
                    <span style="color:#D10024">
                        {{ $user->Role }}
                    </span>
                    <br><br>
                    <div class="profile-content" style="margin-bottom:25px;">
                        Username : {{ $user->username }}
                    </div>
                    <div class="profile-content" style="margin-bottom:25px;">
                        Nomor HP : {{ $user->Nomor_HP }}
                    </div>
                    <div class="profile-content">
                        Email : {{ $user->email }}
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection