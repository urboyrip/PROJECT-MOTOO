@extends('layouts.main')
@section('container')

<div id="box-utama">


    <div class="category">
        <input type="checkbox" name="category[]" id="cat1" value="1" style="display: none;">
        <label for="cat1" class='cat-check'>Category-1</label>
    </div>
    <div class="category">
        <input type="checkbox" name="category[]" id="cat2" value="2" style="display: none;">
        <label for="cat2" class='cat-check'>Category-2</label>
    </div>
    <div class="category">
        <input type="checkbox" name="category[]" id="cat3" value="3" style="display: none;">
        <label for="cat3" class='cat-check'>Category-3</label>
    </div>
    
    {{-- <h4> daftar teknisi beserta kerjaannya</h4> <Br>
    
    <form method='post'>
            <input type="radio" id='Ada' name="tipe" value='1'>
            <label for='Ada'>Admin</label><br>
            <input type="radio" id='Tidak_Ada' name="tipe" value='0'>
            <label for='Tidak_Ada'>Pelanggan</label><br>    
            <button type="submit">
                Submit
            </button>
        </form>
    
    
        @foreach($user as $user)
    <h5>
        {{ $user->Username }}
    </h5>
    kerjaannya:
    @foreach($user->applications as $kerjaan)
    @if($kerjaan->Nama_Aplikasi == ' ' )
    skip
    @else
    {{ $kerjaan->Nama_Aplikasi }} 
    @endif
    @endforeach
    <br>
    <br>
    @endforeach

    <hr>
    <h4>
        daftar aplikasi beserta teknisinya
    </h4>
    @foreach($application as $app)
    <br>
    <h5>
        {{ $app->Nama_Aplikasi }}
    </h5>
    teknisinya:
    @foreach($app->users as $teknisi)
    {{ $teknisi->Username }} 
    @endforeach
    <br>
    @endforeach

    <hr>
    <h4>
        daftar tiket/kerjaan
    </h4>
    @foreach($ticket as $ticket)
    {{ $ticket->Subject }}<br>
    yang ngerjain: {{ $ticket->user->Username }}
    <br><br>
    @endforeach

    <hr>
    <h4>
        daftar teknisi beserta banyaknya kerjaan
    </h4>
    @foreach($ticket2 as $user)
    si {{ $user->user->Username }} : {{ App\Http\Controllers\UserController::countTicket($user->user->id)}}
    <br>
    @endforeach
    
    <br>
    
 --}}

</div>
@endsection