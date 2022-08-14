{!! Form::model($model, [
    'route'=> $model->exists ? ['suvey.update', $model->id] : 'suvey.store',
    'method'=> $model->exists ? 'PUT' : 'POST',
    'enctype'=>'multipart/form-data'
]) !!}

<div class="form-group">
    <label for="" class="control-label">Title</label>
    {!! Form::text('title',null, ['class'=> 'form-control', 'id' => 'title', 'name' => 'title']) !!}
</div>
<div class="form-group">
    {!! Form::hidden('title',null, ['class'=> 'form-control', 'id' => 'slug', 'name' => 'slug' ]) !!}
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
