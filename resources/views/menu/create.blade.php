@extends('layouts.masterIndex')

@section('style')
    <link href="{{ asset('js/jquery-multi-select/css/multi-select.css') }}" rel="stylesheet" />
    <link href="{{ asset('js/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@stop

@section('content')
    <section class="wrapper">
        @include('layouts.message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('ui.menu.new_menu') }}</div>
                        <div class="panel-body">
                            @include('errors.form_error')

                            {!! Form::open(array('url' => '/menu', 'class' => 'cmxform form-horizontal', 'id' => 'nameForm')) !!}
                           
                            @include('menu.form', compact('data'), ['button' => trans('ui.menu.button_add')])

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')


    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation/validation-init.js') }}"></script>
    <script src="{{ asset('js/jquery-multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('js/multi-select-init.js') }}"></script>
    <script src="{{ asset('js/pickers-init.js') }}"></script>
@stop
