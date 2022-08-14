@extends('dashboard.layouts.main')
@section('container')
<style>
.recentCustomer button{
    width: 100%;
    padding: 8px 10px;
  font-size: 15px; 
  border: 1px solid gray;
  background-color:  white;
  color: black;
  cursor: pointer;
  border-radius: 10px;
}
.recentCustomer tr td button:hover{
    background-color: white;
    color: gray;
}


 
</style>
<div class="recentCustomer">
    <div class="cardHeader">
        <h2>All User</h2>
    </div>
    <table>
                
        @foreach ($user->reverse() as $usr)
        
        <tr>
            @if ($usr->role !== 'admin' && $usr->role !== 'warga')
                
            <td width="60px"><div class="imgBx"><img src="{{ asset ('assets/img/group-2517459_640.png') }}" alt=""></div></td>
                
            <td><h4>{{ $usr->name }} <br><a href="{{ route('user.show',$usr->id) }}" title="Edit" style="text-decoration: none; color:darkgrey; "><p class="m-2">Add Answer Kinerja</p></a></h4></td>
            <td>
                <a href="{{ route('print-user',$usr->id) }}"><button type="submit">Print</button></a>
            </td>
            
                
            @endif
            
        </tr>
             
        @endforeach
    </table>
</div>

@endsection