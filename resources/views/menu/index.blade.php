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
                        {{ trans('ui.menu.names') }}
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            @if(Auth::user()->can('create-menus'))
                            <a href="{{ url('menu/create') }}"><button class="btn btn-primary" type="button"><i class="fa fa-plus-circle"></i> {{ trans("ui.menu.button_add") }}</button></a>
                            @endif
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>{{ trans('ui.menu.id') }}</th>
                                    <th>{{ trans('ui.menu.inicio') }}</th>
                                    <th>{{ trans('ui.menu.fin') }}</th> 
                                    <th>{{ trans('ui.menu.descripcion') }}</th>                            
                                    @if(Auth::user()->can('update-menus'))
                                        <th>{{ trans('ui.menu.operation_update') }}</th>
                                    @endif
                                    @if(Auth::user()->can('delete-menus'))
                                        <th>{{ trans('ui.menu.operation_delete') }}</th>
                                    @endif
                                    @if(Auth::user()->can('copy-menus'))
                                        <th>{{ trans('ui.menu.operation_copy') }}</th>
                                    @endif
                                    @if(Auth::user()->can('print-menus'))
                                        <th>{{ trans('ui.menu.operation_pdf') }}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menus as $menu)
                                    <tr class="gradeX">
                                        <td>{{ $menu->id }}</td>
                                        <td>{{ $menu->inicio }}</td>
                                        <td>{{ $menu->fin }}</td>
                                        <td>{{ $menu->descripcion }}</td>                                           
                                        @if(Auth::user()->can('update-menus'))
                                        <td align="center">
                                            <a href="{{ url('menu/' . $menu->id . '/edit') }}">
                                                <button class="btn btn-info " title=" {{ trans('ui.menu.button_update') }}" type="button"><i class="fa fa-refresh"></i></button>
                                            </a>
                                         </td>    
                                        @endif

                                        @if(Auth::user()->can('delete-menus'))
                                        <td align="center">
                                            {!! Form::open(['url' => 'menu/'. $menu->id, 'method' => 'delete', 'id'=>'delete']) !!}
                                            <button class="btn btn-danger " title="{{ trans('ui.plato.button_delete') }}" type="submit"><i class="fa fa-times-circle"></i> </button>
                                            {!! Form::close() !!}
                                        </td>
                                        @endif
                                        @if(Auth::user()->can('copy-menus'))
                                        <td align="center">
                                            <a href="{{ url('menu/' . $menu->id . '/copy') }}">
                                                <button class="btn btn-success " title=" {{ trans('ui.menu.button_copy') }}" type="button"><i class="fa fa-files-o"></i></button>
                                            </a>
                                         </td>    
                                        @endif
                                        @if(Auth::user()->can('print-menus'))
                                        <td align="center">
                                           <a href="{{ url('menu/' . $menu->id . '/pdf') }}" target="_blank">
                                                            <button class="btn btn-default" title="{{ trans('ui.menu.button_pdf') }}" type="button" ><i class="fa fa-download"></i> </button>
                                             </a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>{{ trans('ui.menu.id') }}</th>
                                    <th>{{ trans('ui.menu.inicio') }}</th>
                                    <th>{{ trans('ui.menu.fin') }}</th>   
                                    <th>{{ trans('ui.menu.descripcion') }}</th>                           
                                    @if(Auth::user()->can('update-menus'))
                                    <th>{{ trans('ui.menu.operation_update') }}</th>
                                    @endif
                                    @if(Auth::user()->can('delete-menus'))
                                    <th>{{ trans('ui.menu.operation_delete') }}</th>
                                    @endif
                                    @if(Auth::user()->can('copy-menus'))
                                    <th>{{ trans('ui.menu.operation_copy') }}</th>
                                    @endif
                                    @if(Auth::user()->can('print-menus'))
                                        <th>{{ trans('ui.menu.operation_pdf') }}</th>
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