<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="{!! STATIC_BASE_URL.'/admin_theam/bootstrap/css/bootstrap.min.css' !!}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{!! STATIC_BASE_URL.'/admin_theam/dist/css/AdminLTE.min.css' !!}">
    </head>
    <body>
        <div class="login-box">
            <div class="login-logo"><a href="#"><b>Preetham Nagarigari</b></a></div>
            <div class="login-box-body">
                @if(Session::has('error'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{{Session::get('error')}}</li>
                    </ul>
                </div>
                @endif
                <p class="login-box-msg">Sign in to start your session</p>
                <!-- {!! Form::open(array('url' => '/admin/login', 'method' => 'post')) !!} -->
                {!! Form::open(array('url' => secure_base_url('/admin/login'),'method' => 'post')) !!}
                {!! csrf_field() !!}
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" required placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck"><label></label></div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <center><div class="poewerd">Powered by Molitics</div></center>
        </div>
    </body>
</html>