@extends('layouts.app')
@section('content')
<div class="title">
    <h5>Take Survey</h5>
</div>
<div class="col-lg-12">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Survey Details</h3>
                </div>
                <div class="card-body p-0 py-2">
                    <div class="container-fluid">
                        
                        <p>Title: <b>{{ $model->title }}</b></p>
                        <p class="mb-0">Description: {{ $model->description }}</p>
                        <small></small>
                        <p>Start: <b>{{ $model->start }}</b></p>
                        <p>End: <b>{{ $model->end }}</b></p>
                    </div>
                    <hr class="border-primary">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Survey Questionaire</b></h3>
                </div>
                <form action="{{ route('landingpage.store') }}" method="POST" id="jawaban_user">
                    @csrf
                    @foreach($kuis as $k => $value)
                    <input type="hidden" name="tipe_soal_id" value="{{ $model->id }}">
                    <div class="card-body ui-sortable">        
                        <div class="callout callout-info">
                            <div class="col-md-12 card p-5 border border-primary shadow mb-4">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12" >
                                        <div class="soal">
                                            
                                            <input type="hidden" name="kuis_id[{{ $k }}]" value="{{ $value->id }}">
                                            <h5>{{ $k + 1 }}. {{ $value->soal }}</h5>
                                            @if ( in_array(pathinfo($value->name_file, PATHINFO_EXTENSION), ['png', 'jpg', 'JPEG']) )
                                                    <img src="{{asset('files')}}/{{$value->name_file}}" style="height: 200px; width: 200px">
                                                    
                                                    @elseif ( in_array(pathinfo($value->name_file, PATHINFO_EXTENSION), ['mp4', 'mkv', 'avi', 'MP4']) )
                                                    <video controls>
                                                        <source src="{{asset('files')}}/{{$value->name_file}}" type="video/webm" style="height: 200px; width: auto"/>
                                                    </video>
                                                        
                                                    @elseif ( in_array(pathinfo($value->name_file, PATHINFO_EXTENSION), ['mp3', 'wav', 'ogg', 'MP3']) )
                                                    <audio controls>
                                                        <source src="{{asset('files')}}/{{$value->name_file}}" type="audio/mpeg" style="height: 200px; width: auto">
                                                    </audio>
                                                    @endif           
                                                </div>
                                            </div>

                                        </div>

                                        @foreach($value->jawabans as $j)

                                        @if($j->tipe_jawaban_id == 1)
                                        <div class="icheck-primary">
                                            <input type="radio" id="j{{ $j->id }}" name="answer[{{ $value->id }}]" value="{{ $j->id }}" required>

                                            
                                            <label for="j{{ $j->id }}">{{ $j->jawaban }}</label>
                                        </div>
                                        @elseif($j->tipe_jawaban_id == 2)
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="j{{ $j->id }}" name="answer[{{ $value->id }}]" value="{{ $j->id }}" required>
                                        
                                            <label for="j{{ $j->id }}">{{ $j->jawaban }}</label>
                                        </div>
                                        @else
                                        <div class="icheck-primary">
                                            <input type="text-area" id="j{{ $j->id }}" name="answer[{{ $value->id }}]" value="{{ $j->id }}" required>
                                            <label for="j{{ $j->id }}">{{ $j->jawaban }}</label>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        
                    @endforeach	
                    <div class="modal-footer" id="modal-footer">
                        <button type="button"  class="btn btn-default" data-dismiss="modal"><a href="{{ route('home') }}">Close</a></button></a>
                        {{-- <button >Save changes</button> --}}
                        <button type="submit" class="btn btn-primary" id="modal-btn-save1"> Save changes </button>
                    </div>  
                </form>
            </div>
        </div>
    </div>    
</div>

@endsection
{{-- @push('scripts')
    <script>
        $(() => {
		$("#modal-btn-save1").click(() => {

			const form = $("form#jawaban_user"),
				url = form.attr('action'),
				method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT',
				data = new FormData($("form#jawaban_user")[0]);

			// Jika Error dan sudah diisi
			form.find('.help-block').remove();
			form.find('.form-group').removeClass('has-error');

			console.log({
				url: url,
				method: method,
				enctype: enctype,
				data: data,});

			$.ajax({
				url: url,
				method: method,
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				success: function(response) {
					form.trigger('reset');

					swal({
						type: 'success',
						title: 'success',
						text: 'Data Has been saved!'
					}).then(() => {
                                window.location.reload();
                                
                            });
				},
				error: function(xhr) {
					var res = xhr.responseJSON;
					if ($.isEmptyObject(res) == false) {
						$.each(res.errors, function(key, value) {
							$('#' + key)
								.closest('.form-group')
								.addClass('has-error')
								.append('<span class="help-block"><strong>' + value + '</strong></span>')
						});
					}
				}
			})
		});
	});
    </script>
@endpush --}}

