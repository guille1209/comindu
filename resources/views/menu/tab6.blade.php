<div id="tabSabado" class="tab-pane fade">
    <br>
	<div class="form-group">
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.platos_frios') }}</label>
	    <div class="col-lg-5">	        
		    {!! Form::select('platoFrio6[]', $data['platosFrios'], isset($data['platoFrio6']) ? $data['platoFrio6'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'platoFrio6')) !!}
	    </div>

	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.desayunos') }}</label>
	    <div class="col-lg-5">            
		    {!! Form::select('desayuno6[]', $data['desayunos'], isset($data['desayuno6']) ? $data['desayuno6'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'desayuno6')) !!}

	    </div>
	</div>

	<div class="form-group">
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.almuerzos') }}</label>
	    <div class="col-lg-5">

		    {!! Form::select('almuerzo6[]', $data['almuerzos'], isset($data['almuerzo6']) ? $data['almuerzo6'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'almuerzo6')) !!}

	    </div>
	
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.cenas') }}</label>
	    <div class="col-lg-5">

		    {!! Form::select('cena6[]', $data['cenas'], isset($data['cena6']) ? $data['cena6'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'cena6')) !!}

	    </div>
	</div>
</div>