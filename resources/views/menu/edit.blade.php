@extends('layouts.masterIndex')

@section('style')
    <link href="{{ asset('js/jquery-multi-select/css/multi-select.css') }}" rel="stylesheet" />
@stop

@section('content')
    <section class="wrapper">
        @include('layouts.message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('ui.menu.edit_menu') }}</div>
                        <div class="panel-body">
                            @include('errors.form_error')

                            {!! Form::model($menu, ['method' => 'PUT', 'route' => ['menu.update', $menu->id], 'class' => 'cmxform form-horizontal', 'id' => 'nameForm']) !!}

                            @include('menu.form', compact('menu', 'data'), ['button' => trans('ui.plato.button_update')])

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation/validation-init.js') }}"></script>
    <script src="{{ asset('js/jquery-multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('js/multi-select-init.js') }}"></script>
@stop