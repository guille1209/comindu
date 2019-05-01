<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('ui.alimento.name') }}</label>
    <div class="col-lg-8">

        {!! Form::text('name', null, ['class' => 'form-control']) !!}

    </div>
</div>
<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('ui.alimento.grupo_alimento_id') }}</label>
    <div class="col-lg-8">
        {!! Form::select('grupo_alimento_id',$grupo_alimentos, null, ['class' => 'form-control']) !!}
      
    </div>
</div>
<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('ui.alimento.unidad_id') }}</label>
    <div class="col-lg-8">
        {!! Form::select('unidad_id',$unidades, null, ['class' => 'form-control']) !!}
      
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}

    </div>
</div>