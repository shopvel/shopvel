<!doctype html>
<html>
    <head>
        <title>@yield('head_title')</title>
        <meta name="robots" content="noindex">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
        <link href="{{ Theme::url('css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ Theme::url('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="s-container">
            <div id="s-aside">
                <div id="logo">
                    <img src="{{ Theme::url('img/shopvel-icon.png') }}" alt="Shopvel Icon">
                </div>
                <ul>
                    <li>
                       <a href="#" title="{{ trans('general.dashboard') }}">
                           <i class="fa fa-dashboard"></i>
                           {{ trans('admin/general.dashboard') }}
                       </a>
                    </li>
                    <li>
                        <a href="#" title="{{ trans('general.customers') }}">
                            <i class="fa fa-male"></i>
                            {{ trans('admin/general.customers') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" title="{{ trans('general.products') }}">
                            <i class="fa fa-cube"></i>
                            {{ trans('admin/general.products') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" title="{{ trans('general.settings') }}">
                            <i class="fa fa-cog"></i>
                            {{ trans('admin/general.settings') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div id="s-aside-toggle">
                <div id="s-aside-toggle-close"><a href="#"><i class="fa fa-close"></i></a></div>
            </div>
            <div id="s-content">
                <header>
                    <h1>@yield('title')</h1>
                    <div id="s-header-links">
                        <ul>
                            <li>
                                <a href="{{ URL::to('admin/logout') }}" title="{{ trans('admin/auth.logout') }}">
                                    <i class="fa fa-sign-out"></i>
                                    {{ trans('admin/auth.logout') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </header>
                @if(empty($disableBreadcrumb))
                    <div id="s-breadcrumb">
                        <ul>
                            <li><i class="fa fa-home"></i></li>
                            @if(isset($breadcrumb) && count($breadcrumb) > 0)
                                @foreach($breadcrumb as $breadcrumbItem)
                                    @if(isset($breadcrumbItem['href']))
                                        <li>
                                            <a href="{{ $breadcrumbItem['href'] }}" title="{{ $breadcrumbItem['title'] }}">
                                                {{ $breadcrumbItem['title'] }}
                                            </a>
                                        </li>
                                    @else
                                        <li>{{ $breadcrumbItem['title'] }}</li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                @endif
                <div id="s-content-inner">
                    @yield('content')
                </div>
            </div>
        </div>
        <script src="{{ Theme::url('jquery/1.12.4/jquery.min.js') }}"></script>
        <script src="{{ Theme::url('js/admin.js') }}"></script>
    </body>
</html>