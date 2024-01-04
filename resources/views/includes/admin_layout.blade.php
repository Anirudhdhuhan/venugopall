<!DOCTYPE html>
<html>
    <head>
        <title>Preetham Nagarigari | Dashboard</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{!! STATIC_BASE_URL.'/admin_theam/bootstrap/css/bootstrap.min.css' !!}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{!! STATIC_BASE_URL.'/admin_theam/dist/css/AdminLTE.min.css' !!}">
        <link rel="stylesheet" href="{!! STATIC_BASE_URL.'/admin_theam/dist/css/skins/_all-skins.min.css' !!}">
        <link rel="stylesheet" href="{!! STATIC_BASE_URL.'/admin_theam/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' !!}">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="{!! STATIC_BASE_URL.'/plugins/jqwidgets/styles/jqx.base.css'  !!}" rel="stylesheet">
        <link href="{!! STATIC_BASE_URL.'/plugins/jqwidgets/styles/jqx.metro.css'  !!}" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{!! STATIC_BASE_URL.'/css/bootstrap-datetimepicker.css' !!}"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script  type="text/javascript" src="{!! STATIC_BASE_URL.'/plugins/jqwidgets/jqx-all.js' !!}"></script> 
        <script type="text/javascript" src="{!! STATIC_BASE_URL.'/plugins/jqwidgets/function.js' !!}"></script>
        <script src="{!! STATIC_BASE_URL.'/js/admin_grid.js?v=2' !!}"></script> 
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="#" class="logo">
                    <span class="logo-mini"><b>P</b>DN</span>
                    <span class="logo-lg"><b>Preetham Nagarigari</b></span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu" style="margin-top:10px;"><span style="margin-right:20px;color:#FFF">{!! Session::get('admin_name')!!}</span>
                        <a href="{!!STATIC_BASE_URL.'/admin/logout'!!}" title="Sign out"  style="color:aliceblue; margin-right: 10px;marg"><i class="fa fa-sign-out"></i></a>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <!-- <div class="user-panel" style="padding:50px;">
                        <div class="pull-left info">
                            <p>@if(Session::has('admin')) {!! Session::get('admin_name')!!}@endif</p>
                            <p>@if(Session::has('admin_title')) {!!Session::get('admin_title') !!} @endif</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div> -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active treeview">
                            <a href="{!!STATIC_BASE_URL.'/admin/home'!!}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{!! STATIC_BASE_URL.'/admin/video' !!}"><i class="fa fa-user"></i> <span>Video URL</span></a>
                        </li>

                        <li>
                            <a href="{!! STATIC_BASE_URL.'/admin/issues' !!}"><i class="fa fa-user"></i> <span>Issues</span></a>
                        </li>

                        <li>
                            <a href="{!! STATIC_BASE_URL.'/admin/join-us' !!}"><i class="fa fa-user"></i> <span>Join Us</span></a>
                        </li>
                        <li>
                            <a href="{!! STATIC_BASE_URL.'/admin/subscribe' !!}"><i class="fa fa-user"></i> <span>Subscriber List</span></a>
                        </li>
                        <li>
                            <a href="{!! STATIC_BASE_URL.'/admin/graduate_list' !!}"><i class="fa fa-user"></i> <span>Graduate Voter List</span></a>
                        </li>
                        <li>
                            <a href="{!! STATIC_BASE_URL.'/admin/gallery' !!}"><i class="fa fa-user"></i> <span>Photo Gallery</span></a>
                        </li>
                    </ul>
                </section>
            </aside>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>Dashboard<small>Control panel</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                <section class="content">
                    @yield('page_content')
                </section>
            </div>

            <footer class="main-footer">
                    <!-- <div class="pull-right hidden-xs"><b>Version</b> 2.3.3</div><strong>Copyright &copy; 2016-2017 <a href="http://molitics.net">Molitics</a>.</strong> All rights reserved. -->
            </footer>
            <div class="control-sidebar-bg"></div>
        </div>
    </body>
    @yield('page_script')
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>$.widget.bridge('uibutton', $.ui.button);</script>
    <script src="{!! STATIC_BASE_URL.'/admin_theam/bootstrap/js/bootstrap.min.js'!!}"></script>
    <script src="{!! STATIC_BASE_URL.'/admin_theam/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js' !!}"></script>
    <script src="{!! STATIC_BASE_URL.'/admin_theam/plugins/slimScroll/jquery.slimscroll.min.js' !!}"></script>
    <script src="{!! STATIC_BASE_URL.'/admin_theam/dist/js/app.min.js' !!}"></script>
    <script src="{!! STATIC_BASE_URL.'/admin_theam/dist/js/pages/dashboard.js' !!}"></script>
    <script src="{!! STATIC_BASE_URL.'/admin_theam/dist/js/demo.js' !!}"></script>

</html>