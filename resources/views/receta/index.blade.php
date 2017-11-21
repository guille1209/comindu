@extends('layouts.masterIndex')

@section('style')
    <link href="{{ asset('js/advanced-datatable/css/demo_page.css') }}" rel="stylesheet" />
    <link href="{{ asset('js/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('js/data-tables/DT_bootstrap.css') }}" />
    @stop

@section('content')

    <!--body wrapper start-->
    <div class="wrapper">
        @include('layouts.message')
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{ trans('ui.receta.names') }}
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                           
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>{{ trans('ui.receta.plato') }}</th>
                                    <th>{{ trans('ui.receta.receta') }}</th>                           
                                    @if(Auth::user()->can('create-recetas'))
                                        <th>{{ trans('ui.receta.operation_create') }}</th>
                                    @endif
                                    
                                    @if(Auth::user()->can('update-recetas'))
                                        <th>{{ trans('ui.receta.operation_update') }}</th>
                                    @endif
                                    @if(Auth::user()->can('delete-recetas'))
                                        <th>{{ trans('ui.receta.operation_delete') }}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($platos as $plato)
                                    <tr class="gradeX">
                                        <td>{{ $plato->descripcion }}</td>
                                        <td><ul>                                             
                                                @foreach($plato->receta as $receta)
                                                <li>
                                                    {{ $receta->pivot->cantidad }}  
                                                    {{ "  " }}                  
                                                    {{ $plato->unidad($receta->pivot->unidad_id) }}
                                                    {{ " de " }}
                                                    {{ $receta->name }} 
                                                    {{ "  " }}   
                                                    {{ $receta->pivot->descripcion }}       
                                                </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        
                                        @if(Auth::user()->can('create-recetas'))
                                            <td align="center">
                                            @if ($plato->receta->count()==0)
                            <a href="{{ url('receta/'.$plato->id.'/list') }}"><button class="btn btn-primary" type="button" title="{{ trans("ui.receta.button_add") }}"><i class="fa fa-plus-circle"></i> </button></a>
                            @endif
                             </td>
                                        @endif
                                        @if(Auth::user()->can('update-recetas'))
                                            <td align="center">
                                            @if ($plato->receta->count()>0)
                                            <a href="{{ url('receta/' . $plato->id . '/list') }}">
                                                <button class="btn btn-info" title="{{ trans('ui.receta.button_update') }}" type="button"><i class="fa fa-refresh"></i> </button>
                                            </a>
                                            @endif
                                            </td>
                                        @endif

                                        @if(Auth::user()->can('delete-recetas'))
                                            <td align="center">
                                            {!! Form::open(['url' => 'receta/'. $plato->id.'/delete', 'method' => 'delete', 'id'=>'delete']) !!}
                                            <button class="btn btn-danger" title="{{ trans('ui.receta.button_delete') }}" type="submit"><i class="fa fa-times-circle"></i> </button>
                                            {!! Form::close() !!}
                                            </td>
                                        @endif 
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>{{ trans('ui.receta.plato') }}</th>
                                    <th>{{ trans('ui.receta.receta') }}</th>                  
                                     @if(Auth::user()->can('create-recetas'))
                                        <th>{{ trans('ui.receta.operation_create') }}</th>
                                    @endif
                                    @if(Auth::user()->can('update-recetas'))
                                        <th>{{ trans('ui.receta.operation_update') }}</th>
                                    @endif
                                    @if(Auth::user()->can('delete-recetas'))
                                        <th>{{ trans('ui.receta.operation_delete') }}</th>
                                    @endif
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop

@section('script')
            <!--dynamic table-->
    <script type="text/javascript" language="javascript" src="{{ asset('js/advanced-datatable/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/data-tables/DT_bootstrap.js') }}"></script>
    <!--dynamic table initialization -->
    <script src="{{ asset('js/dynamic_table_init.js') }}"></script>
@stop