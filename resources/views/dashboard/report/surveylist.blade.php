@extends('dashboard.layouts.main')
@section('container')
<div class="col-lg-12 d-flex">
	
	
@foreach ($model as $item => $value)
    
  
		<div class="col-md-3 py-1 px-1 survey-item">
			<div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ $value->title }}</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" style="display: block;">
               {{ $value->description }}
               <div class="row">
               	<hr class="border-primary">
               	<div class="d-flex justify-content-center w-100 text-center">
               			<a href="{{ route('surveyreport.show',$value->id) }}" class="btn btn-sm bg-gradient-primary"><i class="fa fa-poll"></i> View Report</a>
               	</div>
               </div>
              </div>
            </div>
          </div>
    @endforeach
	</div>
  

@endsection