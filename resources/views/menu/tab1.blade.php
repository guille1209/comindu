<div id="tabLunes" class="tab-pane fade in active">	
	<br>
	<div class="form-group">
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.platos_frios') }}</label>
	    <div class="col-lg-5">	        
		    {!! Form::select('platoFrio1[]', $data['platosFrios'], isset($data['platoFrio1']) ? $data['platoFrio1'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'platoFrio1')) !!}
	    </div>

	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.desayunos') }}</label>
	    <div class="col-lg-5">            
		    {!! Form::select('desayuno1[]', $data['desayunos'], isset($data['desayuno1']) ? $data['desayuno1'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'desayuno1')) !!}

	    </div>
	</div>

	<div class="form-group">
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.almuerzos') }}</label>
	    <div class="col-lg-5">

		    {!! Form::select('almuerzo1[]', $data['almuerzos'], isset($data['almuerzo1']) ? $data['almuerzo1'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'almuerzo1')) !!}

	    </div>
	
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.cenas') }}</label>
	    <div class="col-lg-5">

		    {!! Form::select('cena1[]', $data['cenas'], isset($data['cena1']) ? $data['cena1'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'cena1')) !!}

	    </div>
	</div>
</div>