@extends('layouts.master2')
@section('title')
تسجيل دخول - برنامج الشئون الإدارية
@stop

@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <!-- The content half -->
            <div class="col-md-4 col-lg-4 col-xl-4 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <h1 style="text-align:center; color: #0c3f77;">برنامج الخدمات الإدارية</h1>
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <img src="{{URL::asset('assets/img/photos/BU.png')}}"  alt="logo">
                                    <!--div class="mb-5 d-flex"> <a href="{{ url('/' . $page='Home') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">جامعة بنها</h1></div-->
                                    <br /><br />
                                    <div class="card-sigin">
                                        <div class="main-signup-header">

                                                <!--a href="{{ route('login.microsoft') }}" class="btn btn-danger btn-block">Login with Microsoft</a-->
                                                <!--a href="{{ route('login.google') }}" class="btn btn-danger btn-block">Sign in with Google</a>
                                                <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-block">Sign in with Facebook</a>
                                                <a href="{{ route('login.github') }}" class="btn btn-dark btn-block">Sign in with Github</a>
                                                <p style text-align="center">OR</p-->
                                                <br/>
                                            <form method="POST" action="{{ route('login') }}">                                           
                                            <h2 style="color: #0c3f77;">تسجيل الدخول</h2><br />
                                                @csrf

                                                <!--div class="form-group row">
                                                    <div class="col-md-6 offset-md-3">
                                                        <a href="{{ route('login.microsoft') }}" class="btn btn-danger btn-block">Login with Microsoft</a>
                                                    </div>
                                                </div-->

                                                <div class="form-group">
                                                    <label> اسم المستخدم</label>
                                                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                                    @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                     </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>كلمة المرور</label>

                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                  </span>
                                                    @enderror
                                                    <!--div class="form-group row">
                                                        <div class="col-md-6 offset-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <label class="form-check-label" for="remember">
                                                                    {{ __('تذكرني') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div-->
                                                </div>                                             
                                                

                                                <!--div class="form-group row mb-0">
                                                    <div class="col-md-8 offset-md-4">                                                 
                                                        @if (Route::has('password.request'))
                                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                {{ __('Forgot Your Password?') }}
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div--><br />

                                                <button type="submit" class="btn btn-main-primary btn-block">
                                                    {{ __('تسجيل الدخول') }}
                                                </button>

                                                <a href="{{ route('login.microsoft') }}" class="btn btn-warning btn-block">التسجيل عن طريق الايميل الجامعى</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->

            <div class="col-md-8 col-lg-8 col-xl-8 d-none d-md-flex bg-primary-transparent">
                
            </div>

        </div>
    </div>
@endsection
@section('js')
@endsection
