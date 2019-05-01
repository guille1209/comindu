<div id="tabViernes" class="tab-pane fade">
    <br>
	<div class="form-group">
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.platos_frios') }}</label>
	    <div class="col-lg-5">	        
		    {!! Form::select('platoFrio5[]', $data['platosFrios'], isset($data['platoFrio5']) ? $data['platoFrio5'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'platoFrio5')) !!}
	    </div>

	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.desayunos') }}</label>
	    <div class="col-lg-5">            
		    {!! Form::select('desayuno5[]', $data['desayunos'], isset($data['desayuno5']) ? $data['desayuno5'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'desayuno5')) !!}

	    </div>
	</div>

	<div class="form-group">
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.almuerzos') }}</label>
	    <div class="col-lg-5">

		    {!! Form::select('almuerzo5[]', $data['almuerzos'], isset($data['almuerzo5']) ? $data['almuerzo5'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'almuerzo5')) !!}

	    </div>
	
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.cenas') }}</label>
	    <div class="col-lg-5">

		    {!! Form::select('cena5[]', $data['cenas'], isset($data['cena5']) ? $data['cena5'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'cena5')) !!}

	    </div>
	</div>
</div>