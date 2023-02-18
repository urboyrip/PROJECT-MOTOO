@extends('layouts.main')
@section('container')
<div id="box-utama">
    <div class="container">
        <div class="row">
            {{-- tes --}}
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
                    <form method="POST" action="{{ Route('updatePassword', $user->id) }}">
                        @csrf
                        <input style="display:none;border:1px solid silver"type="text" name="id" value="{{ $user->id }}">                        
                        <div class="profile-content" style="margin-bottom:25px;">
                            Old password : <br> <input style="border-radius:5px;border:1px solid silver"type="password" name="old_password">
                        </div>
                        <div class="profile-content" style="margin-bottom:25px;">
                            New password : <br> <input style="border-radius:5px;border:1px solid silver"type="password" name="new_password">
                        </div>
                        <div class="profile-content" style="margin-bottom:25px;">
                            Re-type new password : <br> <input style="border-radius:5px;border:1px solid silver"type="password" name="re_new_password">
                        </div>
                        <div class="button-profile" style="border:1px solid #BF2C45;margin-top:-15px;margin-right:-5px;float:right;color:#BF2C45;width:170px">
                            <button type="submit" style="border:none;background-color:white">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection