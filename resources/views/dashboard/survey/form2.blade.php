{!! Form::model($kuis, [
    'route'=> $kuis->exist ? ['suvey.update', $kuis->id] : 'suvey.store',
    'method'=> $kuis->exist ? 'PUT' : 'POST',
    'enctype'=>'multipart/form-data'
]) !!}
<div class="form-group">
    <label for="" class="control-label">Soal</label>
    {!! Form::text('soal',null, ['class'=> 'form-control', 'id' => 'soal', 'name' => 'soal']) !!}
</div>
<div class="form-group">
    <label for="" class="control-label">File</label>
    {!! Form::files('name_file',null, ['class'=> 'form-control', 'id' => 'name_file', 'name' => 'name_file' ]) !!}
    {!! Form::hidden('format',null, ['class'=> 'form-control', 'id' => 'format', 'name' => 'format' ]) !!}
</div>
<div class="form-group">
    <label for="" class="control-label">Description</label>
    {!! Form::text('description',null, ['class'=> 'form-control', 'id' => 'description']) !!}
</div>
<div class="form-group">
    <label for="" class="control-label">Start</label>
    {!! Form::date('start',null, ['class'=> 'form-control', 'id' => 'start']) !!}
</div>
<div class="form-group">
    <label for="" class="control-label">End</label>
    {!! Form::date('end',null, ['class'=> 'form-control', 'id' => 'end']) !!}
</div>
{!! Form::close() !!}
