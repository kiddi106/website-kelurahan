@extends('dashboard.layouts.main')

@section('container')

    <div class="cardBox">
        <div class="card">
            <div>
                <div class="numbers">{{ $model->count() }}</div>
                <div class="cardName">Survey</div>
            </div>
            <div class="iconBx">
                <ion-icon name="eye-outline"></ion-icon>
            </div>
        </div>
        <div class="card">
            <div>
                <div class="numbers">{{ $kuis->count() }}</div>
                <div class="cardName">Quest</div>
            </div>
            <div class="iconBx">
                <ion-icon name="chatbubbles-outline"></ion-icon>
            </div>
        </div>
        <div class="card">
            <div>
                <div class="numbers">{{ count($total) }}</div>
                <div class="cardName">Quest Taken</div>
            </div>
            <div class="iconBx">
                <ion-icon name="clipboard-outline"></ion-icon>
            </div>
        </div>
        <div class="card">
            <div>
                <div class="numbers">{{ $user->count() }}</div>
                <div class="cardName">Users</div>
            </div>
            <div class="iconBx">
                <ion-icon name="person-outline"></ion-icon>
            </div>
        </div>
    </div>
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Recent Take Survey</h2>
                {{-- <a href="#" class="btn">View All</a> --}}
            </div>
            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Survey</td>
                        <td>Date</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jawaban->reverse() as $jwb => $item)
                    <tr @if ($loop->first) class="bg-info"  @endif>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->tipe_soal->title }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td><span class="status delivered">Success</span></td>
                    </tr>
                    @if ($loop->index == 4)@break @endif
                        
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="recentCustomer">
            <div class="cardHeader">
                <h2>Recent New User</h2>
            </div>
            <table>
               
                    @foreach ($user->reverse() as $usr)
                     
                    <tr @if ($loop->first) class="bg-info" @endif>
                        <td width="60px"><div class="imgBx"><img src="{{ asset ('assets/img/group-2517459_640.png') }}" alt=""></div></td>
                        <td><h4>{{ $usr->name }} <br><span>New User!</span></h4></td>
                    </tr>
                    @if ($loop->index == 4)@break @endif       
                    @endforeach
            </table>
        </div>
    </div>

@endsection
@push('scripts')

@endpush