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
                        {{ trans('ui.user.names') }}
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            @if(Auth::user()->can('create-users'))
                            <a href="{{ url('auth/user/create') }}"><button class="btn btn-primary" type="button"><i class="fa fa-plus-circle"></i> {{ trans("ui.user.button_add") }}</button></a>
                            @endif
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>{{ trans('ui.user.firstname') }}</th>
                                    <th>{{ trans('ui.user.lastname') }}</th>
                                    <th>{{ trans('ui.user.username') }}</th>
                                    <th>{{ trans('ui.user.email') }}</th>
                                    <th>{{ trans('ui.role.names') }}</th>
                                    @if(Auth::user()->can(['update-users', 'delete-users']))
                                    <th>{{ trans('ui.user.operation_label') }}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                    <tr class="gradeX">
                                        <td>{{ $user->firstname }}</td>
                                        <td>{{ $user->lastname }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><ul>
                                                @foreach($user->roles as $role)
                                                <li>
                                                    {{ $role->display_name }} 
                                                </li>
                                                @endforeach
                                            </ul></td>
                                        @if(Auth::user()->can(['update-users', 'delete-users']))
                                        <td>
                                           <p>
                                                @if(Auth::user()->can('update-users'))
                                            <a href="{{ url('auth/user/' . $user->id . '/edit') }}">
                                                <button class="btn btn-info" title="{{ trans('ui.user.button_update') }}" type="button"><i class="fa fa-refresh"></i> </button>
                                            </a>
                                                @endif

                                                @if(Auth::user()->can('delete-users'))
                                            {!! Form::open(['url' => 'auth/user/'. $user->id, 'method' => 'delete']) !!}
                                            <button class="btn btn-danger" title="{{ trans('ui.user.button_delete') }}" type="submit"><i class="fa fa-times-circle"></i> </button>
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
                                    <th>{{ trans('ui.user.firstname') }}</th>
                                    <th>{{ trans('ui.user.lastname') }}</th>
                                    <th>{{ trans('ui.user.username') }}</th>
                                    <th>{{ trans('ui.user.email') }}</th>
                                    <th>{{ trans('ui.role.names') }}</th>
                                    @if(Auth::user()->can(['update-users', 'delete-users']))
                                        <th>{{ trans('ui.user.operation_label') }}</th>
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