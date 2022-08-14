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
                        <h3 class="card-title">Kuis Details</h3>
                    </div>
                    <div class="card-body p-0 py-2">
                        <div class="container-fluid">
                            <form action="{{ route('editSoal') }}" method="POST">
                            @csrf
                            <input type="hidden" name="kuis_id" value="{{ $model->id }}">
                            <label for="">Soal</label>
                            <input type="text" name="soal" value="{{ $model->soal }}" class="form-control mb-4">
                            <label for="">Tipe Jawaban</label>
                            <select name="tipe_jwb" id="" class="form-select mb-4">
                                <option value="1" {{ $model->jawabans[0]->tipe_jawaban_id == 1 ? "selected" : "" }}>Radio</option>
                                <option value="2" {{ $model->jawabans[0]->tipe_jawaban_id == 2 ? "selected" : "" }}>Checkbox</option>
                            </select>
                            <button type="submit" class="btn btn-success w-100">Save</button>
                        </form>

                        </div>
                        <hr class="border-primary">
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Jawaban</h3>
                    </div>
                    <div class="card-body p-4 py-2 ">
                        <form action="{{ route('addJwb') }}" method="POST">
                            @csrf
                            <input type="hidden" name="kuis_id" value="{{ $model->id }}">
                            <div class="d-flex">
                                <input name="newJawaban" type="text" placeholder="jawaban baru.." class="form-control w-25">
                                {{-- <label for="">Benar</label> --}}
                                {{-- <input type="checkbox" name="benar" value="1"> --}}
                                <p class="text-white">--</p>
                                <button type="submit" class="btn btn-success ml-1">Add</button>
                            </div>

                        </form>
                        <table class="table table-border-less">
                            <thead>
                                <tr>
                                    <th>Soal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($model->jawabans as $jwb)
                                <tr>
                                    
                                    <td>
                                        <input type="{{ $model->tipe_jawaban_id == 1 ? "radio" : "checkbox" }}" name="answers[]" value="{{ $jwb->id }}" {{ ($jwb->benar == 1)? "checked" : "" }} disabled>
                                        <label for="">{{ $jwb->jawaban }}</label>
                                    </td>
                                    <td>
                                        <a href="{{ route('deleteJwb',['id'=>$jwb->id]) }}" class="btn btn-danger">delete</a>
                                    </td>
                                </tr>

                                
                            @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    
@endsection
