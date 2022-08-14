@extends('dashboard.layouts.main')
@section('container')
<div class="recentCustomer">
    <div class="container">
        <div class="card-slash">
            <div class="card-cover cover1">
                
                <h3>{{ $jawaban->user->name }}</h3>
            </div>
            <div class="card-content">
                
                <p>Date Submit</p>
                <p>{{ $date }}</p>
            </div>
        </div>
    </div>
    <div class="cardHeader">
        <h2>Report</h2>
    </div>
    <table>
        @foreach ($jawaban as $item => $jawab)
        <tr>
            <td width="60px"><div class="imgBx"><img src="{{ asset ('assets/img/checked1.png') }}" alt=""></div></td>
            <td><h4>{{ $jawab->tipe_soal->title }}<br><span>{{ $jawaban->jawaban->jawaban }}</span></h4></td>
        </tr>     
        @endforeach
               
        {{-- @foreach ($tipesoal->kuis as $item => $soal)   
          
        @endforeach --}}
        
</table>
</div>
@endsection