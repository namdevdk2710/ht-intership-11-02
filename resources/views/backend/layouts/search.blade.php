{{ Form::open(['method' => 'GET',$route]) }}
<label>
    Search:
    {{ Form::search('key', null, ['class'=>'form-control form-control-sm',
    'aria-controls'=>'sampleTable']) }}
</label>
{{ Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) }}
{{ Form::close() }}
