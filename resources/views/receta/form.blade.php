{!! Form::hidden('id', $plato->id, ['class' => 'form-control']) !!}

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('ui.receta.cantidad') }}</label>
    <div class="col-lg-8">

        {!! Form::text('cantidad', isset($ingrediente->pivot->cantidad) ? $ingrediente->pivot->cantidad : null, ['class' => 'form-control']) !!}

    </div>
</div>


<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('ui.receta.unidad_id') }}</label>
    <div class="col-lg-8">
        {!! Form::select('unidad_id',$unidades,  isset($ingrediente->pivot->unidad_id) ? $ingrediente->pivot->unidad_id : null, ['class' => 'form-control']) !!}
      
    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('ui.receta.alimento_id') }}</label>
    <div class="col-lg-8">
        {!! Form::select('alimento_id',$alimentos, isset($ingrediente->pivot->alimento_id) ? $ingrediente->pivot->alimento_id : null, ['class' => 'form-control']) !!}      
    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('ui.receta.descripcion') }}</label>
    <div class="col-lg-8">

        {!! Form::text('descripcion', isset($ingrediente->pivot->descripcion) ? $ingrediente->pivot->descripcion : null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
        
         <a href="{{ url('receta/' . $plato->id .'/list') }}">
         <button class="btn btn-primary" type="button">{{ trans('ui.receta.button_cancel') }} </button>
        </a>
    </div>
</div>