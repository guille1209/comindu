<div id="tabMartes" class="tab-pane fade">	
	<br>
	<div class="form-group">
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.platos_frios') }}</label>
	    <div class="col-lg-5">	        
		    {!! Form::select('platoFrio2[]', $data['platosFrios'], isset($data['platoFrio2']) ? $data['platoFrio2'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'platoFrio2')) !!}
	    </div>

	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.desayunos') }}</label>
	    <div class="col-lg-5">            
		    {!! Form::select('desayuno2[]', $data['desayunos'], isset($data['desayuno2']) ? $data['desayuno2'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'desayuno2')) !!}

	    </div>
	</div>

	<div class="form-group">
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.almuerzos') }}</label>
	    <div class="col-lg-5">

		    {!! Form::select('almuerzo2[]', $data['almuerzos'], isset($data['almuerzo2']) ? $data['almuerzo2'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'almuerzo2')) !!}

	    </div>
	
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.cenas') }}</label>
	    <div class="col-lg-5">

		    {!! Form::select('cena2[]', $data['cenas'], isset($data['cena2']) ? $data['cena2'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'cena2')) !!}

	    </div>
	</div>
</div>