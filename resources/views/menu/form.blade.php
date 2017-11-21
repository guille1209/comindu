<div class="form-group">
    <label class="control-label col-lg-2 col-sm-2">{{ trans('ui.menu.registration_label') }}</label>
    <div class="col-lg-4">
        <div class="input-group input-large custom-date-range">

            {!! Form::text('inicio', null, ['class' => 'form-control datepicker']) !!}

            <span class="input-group-addon">{{ trans('ui.menu.to_label') }}</span>

            {!! Form::text('fin', null, ['class' => 'form-control datepicker']) !!}

        </div>
    </div>
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('ui.menu.descripcion') }}</label>
    <div class="col-lg-4">
        {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-12">         

          <ul class="nav nav-tabs ">
            <li class="active"><a data-toggle="tab" href="#tabLunes">Lunes</a></li>            
            <li><a data-toggle="tab" href="#tabMartes">Martes</a></li>
            <li><a data-toggle="tab" href="#tabMiercoles">Miercoles</a></li>
            <li><a data-toggle="tab" href="#tabJueves">Jueves</a></li>
            <li><a data-toggle="tab" href="#tabViernes">Viernes</a></li>
            <li><a data-toggle="tab" href="#tabSabado">Sabado</a></li>
            <li><a data-toggle="tab" href="#tabDomingo">Domingo</a></li>
          </ul>

          <div class="tab-content">
                @include('menu.tab1', compact('data'))
                @include('menu.tab2', compact('data'))
                @include('menu.tab3', compact('data'))
                @include('menu.tab4', compact('data'))
                @include('menu.tab5', compact('data'))
                @include('menu.tab6', compact('data'))
                @include('menu.tab7', compact('data'))         
          </div>       
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
    </div>
</div>

