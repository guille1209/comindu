@extends('layouts.masterIndex')

@section('content')
    <section class="wrapper">
        @include('layouts.message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('ui.permission.edit_permission') }}</div>
                        <div class="panel-body">
                            @include('errors.form_error')

                            {!! Form::model($permission, ['method' => 'PUT', 'route' => ['auth.permission.update', $permission->id], 'class' => 'cmxform form-horizontal', 'id' => 'nameForm']) !!}

                            @include('permission.form', ['button' => trans('ui.permission.button_update')])

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
@stop