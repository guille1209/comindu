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
                        {{ trans('ui.alimento.names') }}
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            @if(Auth::user()->can('create-alimentos'))
                            <a href="{{ url('alimento/create') }}"><button class="btn btn-primary" type="button"><i class="fa fa-plus-circle"></i> {{ trans("ui.alimento.button_add") }}</button></a>
                            @endif
                            @if(Auth::user()->can('print-alimentos'))
                            <a href="{{ url('alimento/show') }}" target="_blank"><button class="btn btn-primary" type="button"><i class="fa fa-plus-circle"></i> {{ trans("ui.alimento.button_print") }}</button></a>
                            @endif
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>{{ trans('ui.alimento.name') }}</th>
                                    <th>{{ trans('ui.alimento.grupo_alimento_id') }}</th>
                                    <th>{{ trans('ui.alimento.unidad_id') }}</th>                          
                                    @if(Auth::user()->can(['update-roles', 'delete-roles']))
                                    <th>{{ trans('ui.role.operation_label') }}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alimentos as $alimento)

                                    <tr class="gradeX">
                                        <td>{{ $alimento->name }}</td>
                                        <td>{{ $alimento->grupo_alimento()->first()->name }}</td>
                                        <td>{{ $alimento->unidad()->first()->desc_corta }}</td>
                                       
                                        @if(Auth::user()->can(['update-alimentos', 'delete-alimentos']))
                                        <td>
                                            <p>
                                                @if(Auth::user()->can('update-alimentos'))
                                            <a href="{{ url('alimento/' . $alimento->id . '/edit') }}">
                                                <button class="btn btn-info " type="button"><i class="fa fa-refresh"></i> {{ trans('ui.alimento.button_update') }}</button>
                                            </a>
                                                @endif

                                                    @if(Auth::user()->can('delete-alimentos'))
                                            {!! Form::open(['url' => 'alimento/'. $alimento->id, 'method' => 'delete', 'id'=>'delete']) !!}
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-times-circle"></i> {{ trans('ui.alimento.button_delete') }}</button>
                                            {!! Form::close() !!}
                                                    @endif
                                            </p>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>{{ trans('ui.alimento.name') }}</th>
                                    <th>{{ trans('ui.alimento.grupo_alimento_id') }}</th>
                                    <th>{{ trans('ui.alimento.unidad_id') }}</th>
                                    @if(Auth::user()->can(['update-alimentos', 'delete-alimentos']))
                                        <th>{{ trans('ui.alimento.operation_label') }}</th>
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