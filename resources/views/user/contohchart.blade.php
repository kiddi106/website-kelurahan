@extends('user.layout.main')
@section('container')
    <style>
      .graph-box {
        display: flex;
        width: auto;
        height: auto;
        border: 1px solid grey;
        border-radius: 10px;
        margin: 10px;
        padding: 10px
      }
      .data-profile{
        margin: 10px;
        padding: 10px
      }
      .box {
        justify-content: space-around;
        margin-left:10px;
      }
    </style>
  <div class="data-profile">
    <h5>Name : {{ Auth::user()->name }}</h5>

  </div>
  <div class="graph-box">

    <div class="box">
      
      <h5>Monitor Kinerja</h5>
        <canvas id="myChart"></canvas>
        {{-- <button type="button" class="btn btn-success btn-lg">Print!</button> --}}
      
     </div>
    <div class="box">
      <h5>Result Kinerja</h5>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Report</th>
            <th scope="col">Value</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>@foreach ($soal as $item)
              <p>{{ $item->soal }}</p>
              @endforeach</td>
            <td>@foreach ($user as $item)
              <p>{{ $item->nilai }}</p>
              @endforeach</td>
          </tr>
        </tbody>
      
    </div>
    
  </div>
  
    
  <script>
    const data = {
    labels: [
      '{{ $soal[0]->soal }}',
      '{{ $soal[1]->soal }}',
      '{{ $soal[2]->soal }}'
    ],
      datasets: [{
      label: 'My First Dataset',
      data: [ '{{ $user[0]->nilai }}', '{{ $user[1]->nilai }}', '{{ $user[2]->nilai }}'],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      hoverOffset: 4
    }]    
    };
  
      const config = {
      type: 'pie',
      data: data,
      };
      const myChart = new Chart(
      document.getElementById('myChart'),
      config
      );
  </script>
  @endsection