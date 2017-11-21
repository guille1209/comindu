 <div id="tabJueves" class="tab-pane fade">
    <br>
	<div class="form-group">
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.platos_frios') }}</label>
	    <div class="col-lg-5">	        
		    {!! Form::select('platoFrio4[]', $data['platosFrios'], isset($data['platoFrio4']) ? $data['platoFrio4'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'platoFrio4')) !!}
	    </div>

	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.desayunos') }}</label>
	    <div class="col-lg-5">            
		    {!! Form::select('desayuno4[]', $data['desayunos'], isset($data['desayuno4']) ? $data['desayuno4'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'desayuno4')) !!}

	    </div>
	</div>

	<div class="form-group">
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.almuerzos') }}</label>
	    <div class="col-lg-5">

		    {!! Form::select('almuerzo4[]', $data['almuerzos'], isset($data['almuerzo4']) ? $data['almuerzo4'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'almuerzo4')) !!}

	    </div>
	
	    <label  class="col-lg-1 col-sm-1 control-label">{{ trans('ui.menu.cenas') }}</label>
	    <div class="col-lg-5">

		    {!! Form::select('cena4[]', $data['cenas'], isset($data['cena4']) ? $data['cena4'] : null, array(
		    'multiple' => true, 'class' => 'multi-select', 'id' => 'cena4')) !!}

	    </div>
	</div>
</div>