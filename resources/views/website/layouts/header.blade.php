<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>إدارة الشئون الإدارية</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap 4 landing page template for developers and startups">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet"> 
    <!-- FontAwesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Global CSS -->
    <link rel="stylesheet" href="{{URL::asset('website/assets/plugins/bootstrap/css/bootstrap.rtl.min.css')}}">   
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{URL::asset('website/assets/css/styles.css')}}">
    @yield('css')
</head> 

<body>
    <!-- ******HEADER****** --> 
    <header id="header" class="header">  
        <nav class="main-nav navbar-expand-md" role="navigation">  
	       
	        <div class="container-fluid position-relative">
            
                <a class="logo navbar-brand scrollto" href="#hero">
                    <span class="logo-icon-wrapper"><img class="logo-icon" src="{{asset('website/assets/images/brand/logo.png')}}" alt="icon"></span>
                    <span class="text"><span class="highlight">إدارة الشئون الإدارية</a>
                </a>
                <!--//logo-->
            
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><!--//nav-toggle-->
                
                <div id="navbar-collapse" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav ms-md-auto">
                        <li class="nav-item"><a class="active nav-link scrollto" href="{{url('/')}}#about">الرئيسية</a></li>
                        <li class="nav-item"><a class="nav-link scrollto" href="{{url('/')}}#about">أراء الإدارات</a></li>
                        <li class="nav-item"><a class="nav-link scrollto" href="#features">خصائص النظام</a></li>                        
                        <li class="nav-item"><a class="nav-link scrollto" href="#team">فريق العمل</a></li>
                        <li class="nav-item"><a class="nav-link scrollto" href="#pricing">إحصائيات</a></li>
                        <li class="nav-item"><a class="nav-link scrollto" href="#contact">اتصل بنا</a></li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </div><!--//container-->
            
        </nav><!--//main-nav-->                     
    </header>  