@extends('layouts.main')
@section('container')
<div id="box-utama">
    <div class="container">
        <div class="row">
            <div id="profile-box">
                <div class="col-md-4" style="margin-right:20px;">
                    <img src="{{ asset('img/teknisi/maudy.jpg') }}" width="100%" border-radius=>
                    <div class="button-profile">
                        Change Password
                    </div>
                    <div class="button-profile">
                        Log Out
                    </div>
                </div>
                <div class="col-md-7" id="profile-content-box">
                    <form method="POST" action="{{ Route('updateData', $user->id) }}">
                        @csrf
                        <input style="display:none;border:1px solid silver"type="text" name="id" value="{{ $user->id }}">                        
                        <h3>
                            <input style="border:1px solid silver"type="text" name="nama_user" value="{{ $user->Nama_User }}">
                        </h3>
                        <span style="color:#D10024">
                            {{ $user->Role }}
                        </span>
                        <br><br>
                        <div class="profile-content" style="margin-bottom:25px;">
                            Username : <input style="border:1px solid silver"type="text" name="username" value="{{ $user->username }}">
                        </div>
                        <div class="profile-content" style="margin-bottom:25px;">
                            Nomor HP : <input style="border:1px solid silver"type="text" name="nomor_hp" value="{{ $user->Nomor_HP }}">
                        </div>
                        <div class="profile-content">
                            Email : <input style="border:1px solid silver"type="text" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="button-profile" style="border:1px solid #BF2C45;margin-top:-15px;margin-right:-5px;float:right;color:#BF2C45;width:150px">
                            <button type="submit" style="border:none;background-color:white">Update Profile </button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection