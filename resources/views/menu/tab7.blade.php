<div id="tabDomingo" class="tab-pane fade">
     <br>
	<div class="form-group">
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.platos_frios') }}</label>
	    <div class="col-lg-5">	        
		    {!! Form::select('platoFrio7[]', $data['platosFrios'], isset($data['platoFrio7']) ? $data['platoFrio7'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'platoFrio7')) !!}
	    </div>

	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.desayunos') }}</label>
	    <div class="col-lg-5">            
		    {!! Form::select('desayuno7[]', $data['desayunos'], isset($data['desayuno7']) ? $data['desayuno7'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'desayuno7')) !!}

	    </div>
	</div>

	<div class="form-group">
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.almuerzos') }}</label>
	    <div class="col-lg-5">

		    {!! Form::select('almuerzo7[]', $data['almuerzos'], isset($data['almuerzo7']) ? $data['almuerzo7'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'almuerzo7')) !!}

	    </div>
	
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.cenas') }}</label>
	    <div class="col-lg-5">

		    {!! Form::select('cena7[]', $data['cenas'], isset($data['cena7']) ? $data['cena7'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'cena7')) !!}

	    </div>
	</div>
</div>