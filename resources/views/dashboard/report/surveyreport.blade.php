@extends('dashboard.layouts.main')
@section('container')
<style>
	.tfield-area{
		max-height: 30vh;
		overflow: auto;
	}
</style>
<div class="col-lg-12">
	<div class="row">
		<div class="col-md-4">
			<div class="card card-outline card-primary">
				<div class="card-header">
					<h3 class="card-title"><b>Survey Details</b></h3>
					
				</div>
				<div class="card-body p-0 py-2">
					<div class="container-fluid">
						<p>Title: <b>{{ $model->title }}</b></p>
						<p class="mb-0">Description:</p>
						<small>{{ $model->description }}</small>
						<p>Start: <b>{{ $model->start }}</b></p>
						<p>End: <b>{{ $model->end }}</b></p>
						<p>Have Taken: <b>{{ $jwbuser }}</b></p>


					</div>
					<hr class="border-primary">
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card card-outline card-success">
				<div class="card-header">
					<h3 class="card-title"><b>Survey Report</b></h3>
					{{-- <div class="card-tools">
						<button class="btn btn-flat btn-sm bg-gradient-success" type="button" id="print"><i class="fa fa-print"></i> Print</button>
					</div> --}}
				</div>
				<div class="card-body ui-sortable">
					
					<table class="table table-bordered">
						<thead>
						  <tr>
							<th scope="col">No</th>
							<th scope="col">A</th>
							<th scope="col">B</th>
							<th scope="col">C</th>
							<th scope="col">D</th>
							<th scope="col">E</th>
						  </tr>
						</thead>
						<tbody>
							@foreach ($model->kuis as $kuis =>$soal)
						  <tr>
							<input type="hidden" name="kuis_id[{{ $kuis }}]" value="{{ $soal->id }}">
							<th scope="row">{{ $kuis + 1 }}</th>
								@foreach ($soal->jawabans as $jwb=>$jawab)
								@if (count($jawab->jawaban_users) === 0)
								<td><span class=""></span></td>
								@else
								<td><span class="">{{ count($jawab->jawaban_users) }}</span></td>
								@endif
								@endforeach
						  </tr>
						  @endforeach
						  
						</tbody>
					  </table>

					  @foreach ($model->kuis as $kuis =>$soal)    
					<div class="callout callout-info card p-4 mb-4 shadow border border-top-0 border-bottom-0 border-right-0 border-success">
						<h5>{{ $soal->soal }}</h5>	
						<div class="col-md-12">	
							<ul>						
							@foreach ($soal->jawabans as $jwb=>$jawab)
									<li>
										<div class="d-block w-100">
											<b>{{ $jawab->jawaban }}</b>
										</div>
										<div class="d-flex w-100">
											
											
											{{-- @dd(count($jwbus)) --}}
											<span class="">{{ count($jawab->jawaban_users) }} Answer From {{ $jwbuser }} User</span>
											{{-- <h5>{{ $soal->count() / $jawabanuser->count('user_id')}}</h5> --}}
											
										
										
										

										{{-- <div class="mx-1 col-sm-8"">
										<div class="progress w-100" >
										<div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $prog ?>%">
											<span class="sr-only"></span>
										</div>
										</div>
										<span class="badge badge-info"></span>
										</div> --}}
									</li>
                                @endforeach
								</ul>
						</div>	
					</div>
                    @endforeach
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection

