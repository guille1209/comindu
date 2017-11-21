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
                        {{ trans('ui.plato.names') }}
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            @if(Auth::user()->can('create-platos'))
                            <a href="{{ url('plato/create') }}"><button class="btn btn-primary" type="button"><i class="fa fa-plus-circle"></i> {{ trans("ui.plato.button_add") }}</button></a>
                            @endif
                            @if(Auth::user()->can('print-platos'))
                            <a href="{{ url('plato/show') }}" target="_blank"><button class="btn btn-primary"  type="button"><i class="fa fa-plus-circle"></i> {{ trans("ui.plato.button_print") }}</button></a>
                            @endif
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>{{ trans('ui.plato.descripcion') }}</th>
                                    <th>{{ trans('ui.plato.grupo_plato_id') }}</th>                          
                                    @if(Auth::user()->can('update-platos'))
                                    <th>{{ trans('ui.plato.button_update') }}</th>
                                    @endif
                                    @if(Auth::user()->can('delete-platos'))
                                    <th>{{ trans('ui.plato.button_delete') }}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($platos as $plato)
                                    <tr class="gradeX">
                                        <td>{{ $plato->descripcion }}</td>
                                        <td>{{ $plato->grupo_plato()->first()->name }}</td>
                                        @if(Auth::user()->can('update-platos'))
                                        <td align="center">
                                            <a href="{{ url('plato/' . $plato->id . '/edit') }}">
                                                <button class="btn btn-info " title="{{ trans('ui.plato.button_update') }}" type="button"><i class="fa fa-refresh"></i> </button>
                                            </a>
                                        </td>
                                        @endif
                                        @if(Auth::user()->can('delete-platos'))
                                        <td align="center">
                                            {!! Form::open(['url' => 'plato/'. $plato->id, 'method' => 'delete', 'id'=>'delete']) !!}
                                            <button class="btn btn-danger " title="{{ trans('ui.plato.button_delete') }}" type="submit"><i class="fa fa-times-circle"></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>{{ trans('ui.plato.descripcion') }}</th>
                                    <th>{{ trans('ui.plato.grupo_plato_id') }}</th>
                                    @if(Auth::user()->can('update-platos'))
                                    <th>{{ trans('ui.plato.button_update') }}</th>
                                    @endif
                                    @if(Auth::user()->can('delete-platos'))
                                    <th>{{ trans('ui.plato.button_delete') }}</th>
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