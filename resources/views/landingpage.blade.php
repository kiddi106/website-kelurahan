@extends('layouts.app')

@section('content')
@auth
@if (auth()->user())
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total User</span>
          <span class="info-box-number">
          
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-poll-h"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Survey</span>
           <span class="info-box-number">
            {{-- {{ $model->count }} --}}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>    
@else    
<div class="col-12">
    <div class="card">
        <div class="card-body">
            Welcome! 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-poll-h"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Surveys</span>
          <span class="info-box-number">
            {{ $model->count() }}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
@endif    

    
    <div class="col-lg-12">
      <div class="row">
        @foreach ($model as $item)
        
        <div class="col-md-3 py-1 px-1 survey-item" style="display:flex">
          <div class="card card-outline card-primary m2" >
                  <div class="card-header" >
                    <h5 class="card-title">{{ $item->title }}</h5>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body d-flex flex-column justify-content-between" style="display: block; height: 200px">
                    <div class="overflow-auto" style="height: 100px">
                      {{ $item->description }}
                      <hr class="border-primary">
                    </div>
                    <div class="row">
                      <div class="d-flex justify-content-center w-100 text-center">
                        {{-- <?php if(!isset($ans[$row['id']])): ?> --}}
                        
                          <a href="land-page/{{ $item->slug }}" class="btn btn-sm bg-gradient-primary" style="buttom"><i class="fa fa-pen-square"></i> Take Survey</a>
                        {{-- <?php else: ?> --}}
                          {{-- <p class="text-primary border-top border-primary">Done</p> --}}
                        {{-- <?php endif; ?> --}}
                      </div>
                    </div>
                  </div>
          </div>
        </div>
        @endforeach
        </div>
    </div>  
    
        <h5>You Have Been Take It all Survey </h5>
    


    @endauth
@endsection