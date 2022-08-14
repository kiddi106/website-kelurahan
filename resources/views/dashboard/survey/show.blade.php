{{-- <table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Start</th>
        <th>End</th>
        <th>Title</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>{{ $model->id }}</td>
        <td>{{ $model->start }}</td>
        <td>{{ $model->end }}</td>
        <td>{{ $model->title }}</td>
        <td>{{ $model->description }}</td>
    </tr>
</table> --}}
@extends('dashboard.layouts.main')
@section('container')

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
                        <div class="card-tools">
                            <a href="{{ route('managequestion.create',['id'=>$model->id]) }}" title="Manage Question" class="btn btn-block btn-sm btn-default btn-flat border-success new_question" type="button"><i class="fa fa-plus" ></i> Add New Question></a>
                        </div>
                    </div>
                    <form action="" id="manage-sort">
                    @csrf
                    @foreach($kuis as $k => $value)
                    <div class="card-body ui-sortable">
                        <div class="callout callout-info">
                            <div class="row">
                                <div class="col-md-12">	
                                    <span class="dropleft float-right">
                                        <a class="fa fa-ellipsis-v text-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item edit_question text-dark" href="javascript:void(0)" >Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item delete_question text-dark" href="javascript:void(0)" >Delete</a>
                                        </div>
                                    </span>	
                                </div>	
                            </div>
                            
                            
                            <div class="col-md-12 card p-4 border border-primary shadow mb-4">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12" >
                                        <input type="hidden" name="kuis_id[{{ $k }}]" value="{{ $value->id }}">
                                        <h6>{{ $k + 1 }}. {{ $value->soal }}</h6>
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
                                    <div class="col-md-6 d-flex justify-content-end" style="text-decoration: none; color-font:black" >
                                        <a href="{{ route('managequestion.edit',$value->id) }}" title="Edit {{ $value->soal }}" style="text-decoration: none; color:darkgrey; "><p class="m-2">Edit</p></a>
                                        <a href="{{ route('managequestion.destroy',$value->id) }}" title="{{ $value->soal }}" class="btn-delete"  style="text-decoration: none; color:darkgrey; "><p class="m-2">Hapus</p></a>
                                    </div>

                                </div>

                                @foreach($value->jawabans as $j)

                                @if($j->tipe_jawaban_id == 1)
                                <div class="icheck-primary">
                                    <input type="radio" id="j{{ $j->id }}" name="answer[{{ $value->id }}]]" value="{{ $j->id }}" {{ ($j->benar == 1)? "checked" : "" }}>
                                    <label for="j{{ $j->id }}">{{ $j->jawaban }}</label>
                                </div>
                                @elseif($j->tipe_jawaban_id == 2)
                                <div class="icheck-primary">
                                    <input type="checkbox" id="j{{ $j->id }}" name="answer[{{ $value->id }}]]" value="{{ $j->id }}" {{ ($j->benar == 1)? "checked" : "" }}>
                                    <label for="j{{ $j->id }}">{{ $j->jawaban }}</label>
                                </div>
                                @else
                                <div class="icheck-primary">
                                    <input type="text-area" id="j{{ $j->id }}" name="answer[{{ $value->id }}]]" value="" >
                                    <label for="j{{ $j->id }}">{{ $j->jawaban }}</label>
                                </div>
                                @endif
                                @endforeach
                                </div>
                            </div>
                            
                        </div>
                    </form>
                    @endforeach	
                </div>
            </div>
        </div>
    </div>

    
@endsection
@push('scripts')
    <script>
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('table.dashboardsuvey') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: '', name: 'title'},
                {data: 'description', name: 'description'},
                {data: 'start', name: 'start'},
                {data: 'end', name: 'end'},
                {data: 'action', name: 'action'}
            ]
        });
        $('body').on('click', '.new_question', function(event) {
            event.preventDefault();

            var me = $(this),
                url = me.attr('href'),
                title = me.attr('title');

            $('#modal-title').text(title);
            $('#modal-btn-save1').text(me.hasClass('edit') ? 'Update' : 'Create');

            $.ajax({
                url: url,
                dataType: 'html',
                success: function(response) {
                    $('#modal-body1').html(response);
                }
            });
            $('#newkuis').modal('show');
        });

        
        $('body').on('click', '.btn-delete', function(event) {
            event.preventDefault();

            var me = $(this),
                url = me.attr('href'),
                title = me.attr('title'),
                csrf_token = $('meta[name="csrf-token"]').attr('content');

            swal({
                title: 'Are you sure want to delete this data ?',
                text: 'You won\'t be able to revert this!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            '_method': 'DELETE',
                            '_token': csrf_token
                        },
                        success: function(response) {
                            swal({
                                type: 'success',
                                title: 'Success!',
                                text: 'Data has been deleted!'
                            }).then(() => {
                                window.location.reload();
                                
                            });

                        },
                        error: function(xhr) {
                            swal({
                                type: 'error',
                                title: 'Ooops...',
                                text: 'Something went wrong!'
                            });
                        }
                    })
                }
            });
        });

         
       
  
    </script>
@endpush 