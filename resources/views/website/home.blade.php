@extends('website.layouts.master')

@section('content')
<div id="hero" class="hero-section">

        <div id="hero-carousel" class="hero-carousel carousel carousel-fade slide" data-ride="carousel" data-interval="10000">

            <div class="figure-holder-wrapper">
        		<div class="container">
            		<div class="row justify-content-end">
                		<div class="figure-holder">
                	        <img class="figure-image img-fluid" src="{{asset('website/assets/images/imac.png')}}" alt="image" />
                        </div><!--//figure-holder-->
            		</div><!--//row-->
        		</div><!--//container-->
    		</div><!--//figure-holder-wrapper-->

			{{-- <!-- Indicators -->
			<ol class="carousel-indicators">
				<li class="active" data-slide-to="0" data-target="#hero-carousel"></li>
				<li data-slide-to="1" data-target="#hero-carousel"></li>
				<li data-slide-to="2" data-target="#hero-carousel"></li>
			</ol> --}}

			<!-- Wrapper for slides -->
			<div class="carousel-inner">

				<div class="carousel-item item-1 active">
					<div class="item-content container">
    					<div class="item-content-inner">

				            <h2 class="heading">ان مشروع جامعة بنها للخدمات الإلكترونية  <br class="d-none d-md-block">يستهدف تغيير نمط سير العمل التقليدى بحلول أكثر سهولة وذكاء </h2>
				            <p class="intro">وذلك من خلال ادارة الخدمات بطريقة إلكترونية سهلة وأكثر فاعلية عبر موقعنا الإلكترونى المتميز</p>
				            <a class="btn btn-primary btn-cta" href="https://gma.bu.edu.eg/" target="_blank">التسجيل لطلب الخدمة</a>

    					</div><!--//item-content-inner-->
					</div><!--//item-content-->
				</div><!--//item-->

				<div class="carousel-item item-2">
					<div class="item-content container">
						<div class="item-content-inner">

				            <h2 class="heading">Bootstrap Lover?</h2>
				            <p class="intro">AppKit Landing is built on Bootstrap 4 and SASS so it's quick and easy to customise!</p>
				            <a class="btn btn-primary btn-cta" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/appkit-landing-free-bootstrap-theme-for-developers-and-startups/" target="_blank">Find out more</a>

    					</div><!--//item-content-inner-->
					</div>
				</div><!--//item-->

				<div class="carousel-item item-3">
					<div class="item-content container">
						<div class="item-content-inner">

				            <h2 class="heading">Ready to build outstanding product?</h2>
				            <p class="intro">Get AppKit Landing today and it will help you promote your product effectively!</p>
				            <a class="btn btn-primary btn-cta" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/appkit-landing-free-bootstrap-theme-for-developers-and-startups/" target="_blank">Get Started</a>

    					</div><!--//item-content-inner-->
					</div>
				</div><!--//item-->
			</div><!--//carousel-inner-->

		</div><!--//carousel-->
    </div><!--//hero-->

    <div id="about" class="about-section">
        <div class="container text-center">
            <h2 class="section-title">عن النظام</h2>
            <p class="intro">يستخدم برنامج الخدمات الإدارية تقنيات حديثة للواجهة الأمامية ومليء بمكونات وأدوات مفيدة لتسريع عملية التطوير</p>
            <!--ul class="technologies list-inline">
                <li class="list-inline-item"><img src="{{asset('website/assets/images/logo-html5.svg')}}" alt="HTML5"></li>
                <li class="list-inline-item"><img src="{{asset('website/assets/images/logo-css3.svg')}}" alt="CSS3"></li>
                <li class="list-inline-item"><img src="{{asset('website/assets/images/logo-bootstrap.svg')}}" alt="Bootstrap"></li>
                <li class="list-inline-item"><img src="{{asset('website/assets/images/logo-sass.svg')}}" alt="Sass"></li>
                <li class="list-inline-item"><img src="{{asset('website/assets/images/laravel.min.svg')}}" alt="Laravel"></li>
                <li class="list-inline-item"><img src="{{asset('website/assets/images/logo-jquery.svg')}}" alt="jQuery"></li>
            </ul-->

            <div class="items-wrapper row">
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="figure-holder">
                            <img class="figure-image" src="{{asset('website/assets/images/figure-1.png')}}" alt="image">
                        </div><!--//figure-holder-->
                        <h3 class="item-title">طلب الخدمة</h3>
                        <div class="item-desc">
                            بإمكانكم طلب الخدمات من الإدارة العامة للشئون الإدارية عن طريق الدخول على النظام إذا كان لديك صلاحية وكنتم من المعنيين بطلب الخدمة.
                        </div><!--//item-desc-->
                    </div><!--//item-inner-->
                </div><!--//item-->
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="figure-holder">
                            <img class="figure-image" src="{{asset('website/assets/images/figure-2.png')}}" alt="image">
                        </div><!--//figure-holder-->
                        <h3 class="item-title">متابعة الخدمة</h3>
                        <div class="item-desc">
                            يمكنكم متابعة الخدمة لمعرفة ما إذا تم قبول أو رفض أو تأجيل تنفيذ الخدمة، أو أنها مازالت قيد الإنتظار. </div><!--//item-desc-->
                    </div><!--//item-inner-->
                </div><!--//item-->
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="figure-holder">
                            <img class="figure-image" src="{{asset('website/assets/images/figure-3.png')}}" alt="image">
                        </div><!--//figure-holder-->
                        <h3 class="item-title">حالة الخدمة</h3>
                        <div class="item-desc">
                            يتم تغيير حالة الخدمة من قبل مدير النظام. </div><!--//item-desc-->
                    </div><!--//item-inner-->
                </div><!--//item-->
            </div><!--//items-wrapper-->
        </div><!--//container-->
    </div><!--//about-section-->

    <div id="testimonials" class="testimonials-section">
        <div class="container">
            <h2 class="section-title text-center">أراء الإدارات</h2>
            <div class="item mx-auto">
                <div class="profile-holder">
                    <img class="profile-image" src="{{asset('website/assets/images/profile-1.png')}}" alt="profile">
                </div>
                <div class="quote-holder">
                    <blockquote class="quote">
                        <p>إدارة المخازن تشكر الشئون العامه على حسن تعاونها بفريق  العمل المتعاون معنا.</p>
                        <div class="quote-source">
                            <span class="name">@JohnK,</span>
                            <span class="meta">مدير اداره المخازن بالجامعه</span>
                        </div><!--//quote-source-->
                    </blockquote>
                </div><!--//quote-holder-->
            </div><!--//item-->
            <div class="item item-reversed mx-auto">
                <div class="profile-holder">
                    <img class="profile-image" src="{{asset('website/assets/images/profile-2.png')}}" alt="profile">
                </div>
                <div class="quote-holder">
                    <blockquote class="quote">
                        <p>خدمه ممتازه وسرعة في الأداء. </p>
                        <div class="quote-source">
                            <span class="name">@LisaWhite,</span>
                            <span class="meta">مسؤل قاعه الاحتفالات</span>
                        </div><!--//quote-source-->
                    </blockquote>
                </div><!--//quote-holder-->
            </div><!--//item-->
            <div class="item mx-auto">
                <div class="profile-holder">
                    <img class="profile-image" src="{{asset('website/assets/images/profile-3.png')}}" alt="profile">
                </div>
                <div class="quote-holder">
                    <blockquote class="quote">
                        <p>كل الشكر والتحية لفريق الشئون العامة وقيادات ادارة الشئون العامة علي الاستجابة لطلباتنا بتوفير العمالة اللازمة للمركز في اوقات الاختبارات.</p>
                        <div class="quote-source">
                            <span class="name">@MattH,</span>
                            <span class="meta">مسؤل مركز الاختبارات الالكترونيه</span>
                        </div><!--//quote-source-->
                    </blockquote>
                </div><!--//quote-holder-->
            </div><!--//item-->
            {{-- <div class="item item-reversed mx-auto">
                <div class="profile-holder">
                    <img class="profile-image" src="{{asset('website/assets/images/profile-4.png')}}" alt="profile">
                </div>
                <div class="quote-holder">
                    <blockquote class="quote">
                        <p>Testimonial goes here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis</p>
                         <div class="quote-source">
                            <span class="name">@RyanW,</span>
                            <span class="meta">Paris</span>
                        </div><!--//quote-source-->
                    </blockquote>

                </div><!--//quote-holder-->
            </div><!--//item--> --}}
        </div><!--//container-->
    </div><!--//testimonials-->

    <div id="features" class="features-section">
        <div class="container text-center">
            <h2 class="section-title">خصائص النظام</h2>
            <p class="intro">يتميز نظام الخدمات الإدارية بالعديد من المميزات التى تجعله اختيارا أفضل لمتابعة الخدمات اليومية بطريقة ألكترونيةأكثر سهولة وأكثر راحة.<a href="https://gma.bu.edu.eg" target="_blank">نظام الخدمات الإدارية</a></p>

            <div class="tabbed-area row">

                <!-- Nav tabs -->
                <div class="feature-nav nav nav-pill flex-column col-lg-4 col-md-6 col-12 order-0 order-md-1" role="tablist" aria-orientation="vertical">
                     <a class="nav-link active mb-lg-3" href="#feature-1" aria-controls="feature-1" data-toggle="pill" role="tab" aria-selected="true"><i class="fas fa-magic mr-2"></i>طلب خدمة جديدة</a>
                     <a class="nav-link mb-lg-3" href="#feature-2" aria-controls="feature-2" data-toggle="pill" role="tab" aria-selected="false"><i class="fas fa-cubes mr-2"></i>تعديل وحذف الخدمات</a>
                     <a class="nav-link mb-lg-3" href="#feature-3" aria-controls="feature-3" data-toggle="pill" role="tab" aria-selected="false"><i class="fas fa-chart-bar mr-2"></i>متابعة الخدمة واستقبال الإشعارات</a>
                     <a class="nav-link mb-lg-3" href="#feature-4" aria-controls="feature-4" data-toggle="pill" role="tab" aria-selected="false"><i class="fas fa-code mr-2"></i>تقييم الخدمة</a>
                     <a class="nav-link mb-lg-3" href="#feature-5" aria-controls="feature-5" data-toggle="pill" role="tab" aria-selected="false"><i class="fas fa-rocket mr-2"></i>إمكانية الدخول إلى النظام عن طريق الإيميل الجامعى</a>
                     <a class="nav-link mb-lg-3" href="#feature-6" aria-controls="feature-6" data-toggle="pill" role="tab" aria-selected="false"><i class="fas fa-mobile-alt mr-2"></i>متجاوب مع جميع الشاشات</a>
                     <a class="nav-link mb-lg-3" href="#feature-7" aria-controls="feature-7" data-toggle="pill" role="tab" aria-selected="false"><i class="fas fa-star mr-2"></i>واجهة عصرية</a>
                     <a class="nav-link mb-lg-3" href="#feature-8" aria-controls="feature-8" data-toggle="pill" role="tab" aria-selected="false"><i class="fas fa-heart mr-2"></i>دعم وتطوير النظام</a>
                </div>

                <!-- Tab panes -->
                <div class="feature-content tab-content col-lg-8 col-md-6 col-12 order-1 order-md-0">
                    <div role="tabpanel" class="tab-pane fade show active" id="feature-1">
                        <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/appkit-landing-free-bootstrap-theme-for-developers-and-startups/" target="_blank"><img class="img-fluid" src="{{asset('website/assets/images/imac.png')}}" alt="screenshot" ></a>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="feature-2">
                        <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/appkit-landing-free-bootstrap-theme-for-developers-and-startups/" target="_blank"><img class="img-fluid" src="{{asset('website/assets/images/feature-2.png')}}" alt="screenshot" ></a>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="feature-3">
                        <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/appkit-landing-free-bootstrap-theme-for-developers-and-startups/" target="_blank"><img class="img-fluid" src="{{asset('website/assets/images/feature-3.png')}}" alt="screenshot" ></a>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="feature-4">
                        <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/appkit-landing-free-bootstrap-theme-for-developers-and-startups/" target="_blank"><img class="img-fluid" src="{{asset('website/assets/images/feature-4.png')}}" alt="screenshot" ></a>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="feature-5">
                        <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/appkit-landing-free-bootstrap-theme-for-developers-and-startups/" target="_blank"><img class="img-fluid" src="{{asset('website/assets/images/feature-5.png')}}" alt="screenshot" ></a>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="feature-6">
                        <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/appkit-landing-free-bootstrap-theme-for-developers-and-startups/" target="_blank"><img class="img-fluid" src="{{asset('website/assets/images/feature-6.png')}}" alt="screenshot" ></a>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="feature-7">
                        <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/appkit-landing-free-bootstrap-theme-for-developers-and-startups/" target="_blank"><img class="img-fluid" src="{{asset('website/assets/images/feature-7.png')}}" alt="screenshot" ></a>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="feature-8">
                        <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/appkit-landing-free-bootstrap-theme-for-developers-and-startups/" target="_blank"><img class="img-fluid" src="{{asset('website/assets/images/feature-8.png')}}" alt="screenshot" ></a>
                    </div>

                </div><!--//feature-content-->


            </div><!--//tabbed-area-->

        </div><!--//container-->
    </div><!--//features-->

    <div class="team-section" id="team">
        <div class="container text-center">
            <h2 class="section-title">فريق العمل</h2>
            <div class="members-wrapper row">
                <div class="item col-md-3 col-12">
                    <div class="item-inner">
                        <div class="profile mb-2">
                            <img class="profile-image" src="{{asset('website/assets/images/team-1.png')}}" alt="Xiaoying Riley" />
                        </div>

                        <div class="member-content">
                            <h3 class="member-name">د نرمين ابوالخير</h3>
                            <div class="member-title">مدير عام الاداره العامه للشئون الاداريه</div>
                        </div><!--//member-content-->
                    </div><!--//item-inner-->
                </div><!--//item-->
                <div class="item col-md-3 col-12">
                    <div class="item-inner">
                        <div class="profile mb-2">
                            <img class="profile-image" src="{{asset('website/assets/images/team-2.png')}}" alt="Tom Najdek" />
                        </div>

                        <div class="member-content">
                            <h3 class="member-name">ا سراج عبدالعزيز</h3>
                            <div class="member-title">مدير اداره الشئون العامه</div>
                        </div><!--//member-content-->
                    </div><!--//item-inner-->
                </div><!--//item-->
                <div class="item col-md-3 col-12">
                    <div class="item-inner">
                        <div class="profile mb-2">
                            <img class="profile-image" src="{{asset('website/assets/images/team-3.png')}}" alt="Xiaoying Riley" />
                        </div>

                        <div class="member-content">
                            <h3 class="member-name">ا ياسين جوده</h3>
                            <div class="member-title">مشرف الفريق
اداره الشئون العامه</div>
                        </div><!--//member-content-->
                    </div><!--//item-inner-->
                </div><!--//item-->
                <div class="item col-md-3 col-12">
                    <div class="item-inner">
                        <div class="profile mb-2">
                            <img class="profile-image" src="{{asset('website/assets/images/team-4.png')}}" alt="Tom Najdek" />
                        </div>

                        <div class="member-content">
                            <h3 class="member-name">ا عصام عبدالمنعم</h3>
                            <div class="member-title">مشرف الفريق
اداره الشئون العامه</div>
                        </div><!--//member-content-->
                    </div><!--//item-inner-->
                </div><!--//item-->
            </div><!--//members-wrapper-->
        </div>
    </div><!--//team-section-->

    <div id="pricing" class="pricing-section">
        <div class="container text-center">
            <h2 class="section-title">إحصائيات</h2>
            <div class="pricing-wrapper row">
                <div class="item item-1 col-md-4 col-12">
                    <div class="item-inner">
                        <h3 class="item-heading">عدد الإدارات<br></h3>
                        <div class="price-figure">
                            <span class="currency"></span><span class="number count">{{$clients->count()}}</span>
                        </div><!--//price-figure-->
                    </div><!--//item-inner-->
                </div><!--//item-->
                <div class="item item-2 col-md-4 col-12">
                    <div class="item-inner">
                        <h3 class="item-heading">عدد الخدمات<br></h3>

                        <div class="price-figure">
                            <span class="currency"></span><span class="number count">{{$services->count()}}</span>
                        </div><!--//price-figure-->
                    </div><!--//item-inner-->
                </div><!--//item-->

                <div class="item item-3 col-md-4 col-12">
                    <div class="item-inner">
                        <h3 class="item-heading">عدد العمال<br></h3>
                        <div class="price-figure">
                            <span class="currency"></span><span class="number count">{{$workers->count()}}</span>
                        </div><!--//price-figure-->

                    </div><!--//item-inner-->
                </div><!--//item-->
            </div><!--//pricing-wrapper-->

        </div><!--//container-->
    </div><!--//pricing-section-->
    <div id="contact" class="contact-section">
        <div class="container text-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3438.757596123603!2d31.186569612762096!3d30.471303309506897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7df50637da39b%3A0xfcf504d1b4fd19b3!2z2KzYp9mF2LnYqSDYqNmG2YfYpw!5e0!3m2!1sar!2seg!4v1687105397489!5m2!1sar!2seg" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <!--div class="contact-content">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis.</p>

            </div-->
            <!--a class="btn btn-cta btn-primary" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/appkit-landing-free-bootstrap-theme-for-developers-and-startups/">Get in Touch</a-->

        </div><!--//container-->
    </div><!--//contact-section-->
@endsection
@section('script')
<script>
$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
</script>
@endsection
