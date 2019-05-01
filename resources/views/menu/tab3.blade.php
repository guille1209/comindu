<div id="tabMiercoles" class="tab-pane fade">	
	<br>
	<div class="form-group">
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.platos_frios') }}</label>
	    <div class="col-lg-5">	        
		    {!! Form::select('platoFrio3[]', $data['platosFrios'], isset($data['platoFrio3']) ? $data['platoFrio3'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'platoFrio3')) !!}
	    </div>

	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.desayunos') }}</label>
	    <div class="col-lg-5">            
		    {!! Form::select('desayuno3[]', $data['desayunos'], isset($data['desayuno3']) ? $data['desayuno3'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'desayuno3')) !!}

	    </div>
	</div>

	<div class="form-group">
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.almuerzos') }}</label>
	    <div class="col-lg-5">

		    {!! Form::select('almuerzo3[]', $data['almuerzos'], isset($data['almuerzo3']) ? $data['almuerzo3'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'almuerzo3')) !!}

	    </div>
	
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.cenas') }}</label>
	    <div class="col-lg-5">

		    {!! Form::select('cena3[]', $data['cenas'], isset($data['cena3']) ? $data['cena3'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'cena3')) !!}

	    </div>
	</div>
</div>