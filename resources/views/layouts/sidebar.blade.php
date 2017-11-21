<!-- left side start-->
<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <a><img src="{{ asset('images/logo.png')  }}" alt=""></a>
    </div>

    <div class="left-side-inner">

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            @if(Auth::check())
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-cutlery"></i> <span>{{ trans('ui.sidebar.dashboard') }}</span></a></li>
            @endif

                @if(Auth::check() && Auth::user()->hasRole('empleado'))
            <li class="menu-list"><a href=""><i class="fa  fa-th-large"></i> <span>{{ trans('ui.sidebar.label_datos') }}</span></a>
                <ul class="sub-menu-list">
                        @if(Auth::check() && Auth::user()->can(['create-alimentos', 'read-alimentos', 'update-alimentos', 'delete-alimentos']))
                        <li><a href="{{ url('alimento') }}"> <i class="fa fa-dashboard"></i><span>{{ trans('ui.sidebar.alimentos') }}</span></a></li>
                        @endif

                        @if(Auth::check() && Auth::user()->can(['create-platos', 'read-platos', 'update-platos', 'delete-platos']))
                        <li><a href="{{ url('plato') }}"> <i class="fa fa-road"></i><span>{{ trans('ui.sidebar.platos') }}</span></a></li>
                        @endif
                 
                        @if(Auth::check() && Auth::user()->can(['create-recetas', 'read-recetas', 'update-recetas', 'delete-recetas']))
                    <li><a href="{{ url('receta') }}"> <i class="fa fa-bookmark"></i><span>{{ trans('ui.sidebar.recetas') }}</span></a></li>
                        @endif

                        @if(Auth::check() && Auth::user()->can(['create-menus', 'read-menus', 'update-menus', 'delete-menus']))
                    <li><a href="{{ url('menu') }}"> <i class="fa fa-list-alt"></i><span>{{ trans('ui.sidebar.menus') }}</span></a></li>
                        @endif

                        @if(Auth::check() && Auth::user()->can(['create-conditions', 'read-conditions', 'update-conditions', 'delete-conditions']))
                    <li><a href="{{ url('car/condition') }}"> <i class="fa fa-flag"></i><span>{{ trans('ui.sidebar.conditions') }}</span></a></li>
                        @endif

                </ul>
            </li>
                @endif

            @if(Auth::check() && Auth::user()->can(['create-clients', 'read-clients', 'update-clients', 'delete-clients']))
                <li><a href="{{ url('client') }}"><i class="fa fa-users"></i> <span>{{ trans('ui.sidebar.clients') }}</span></a></li>
            @endif

            @if(Auth::check() && Auth::user()->can(['create-countries', 'read-countries', 'update-countries', 'delete-countries']))
            <li><a href="{{ url('client/country') }}"><i class="fa fa-globe"></i> <span>{{ trans('ui.sidebar.countries') }}</span></a></li>
            @endif

            @if(Auth::check() && Auth::user()->can(['create-agreements', 'read-agreements', 'update-agreements', 'delete-agreements']))
            <li><a href="{{ url('agreement') }}"><i class="fa fa-pencil-square-o"></i> <span>{{ trans('ui.sidebar.agreements') }}</span></a></li>
            @endif

            @if(Auth::check() && Auth::user()->can(['create-status', 'read-status', 'update-status', 'delete-status']))
            <li><a href="{{ url('agreement/status') }}"><i class="fa fa-file-text-o"></i> <span>{{ trans('ui.sidebar.status') }}</span></a></li>
            @endif

            @if(Auth::check() && Auth::user()->hasRole('admin'))
                <li class="menu-list"><a href=""><i class="fa fa-user"></i> <span>{{ trans('ui.sidebar.admin_users') }}</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{ url('auth/user') }}"> <i class="fa fa-male"></i><span>{{ trans('ui.sidebar.users') }}</span></a></li>
                        <li><a href="{{ url('auth/role') }}"> <i class="fa fa-legal"></i><span>{{ trans('ui.sidebar.roles') }}</span></a></li>
                        <li><a href="{{ url('auth/permission') }}"><i class="fa fa-key"></i> <span>{{ trans('ui.sidebar.permissions') }}</span></a></li>
                    </ul>
                </li>
            @endif


        </ul>
        <!--sidebar nav end-->

    </div>
</div>