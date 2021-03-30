<!DOCTYPE html>
<html lang="en">
    <head>
        @php
            $seo = DB::table('seos')->first();
        @endphp
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="{{ $seo->meta_title }}">
        <meta name="tag" content="{{ $seo->meta_tag }}">
        <meta name="description" content="{!! strip_tags($seo->meta_description) !!}">
        <meta name="google_analytics" content="{{ $seo->google_analytics }}">

        <title>360 News Site</title>

        <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/assets/css/menu.css') }}" rel="stylesheet">
        <link href="{{ asset('front/assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/assets/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('front/assets/css/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('front/assets/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/assets/style.css') }}" rel="stylesheet">

    </head>
    <body>
    <!-- header-start -->
	<section class="hdr_section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6 col-md-2 col-sm-4">
					<div class="header_logo">
						<a href=""><img src="{{ asset('front/assets/img/demo_logo.png') }}"></a>
					</div>
				</div>
				<div class="col-xs-6 col-md-8 col-sm-8">
					<div id="menu-area" class="menu_area">
						<div class="menu_bottom">
							<nav role="navigation" class="navbar navbar-default mainmenu">
						<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
                                @php
                                $categories = App\Category::all();
                                @endphp
								<!-- Collection of nav links and other content for toggling -->
								<div id="navbarCollapse" class="collapse navbar-collapse">
									<ul class="nav navbar-nav">
                                        @foreach ($categories as $category)
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                @if (session()->get('lang') === 'english')
                                                {{$category->name_en}}
                                                @else
                                                {{$category->name_ar}}
                                                 <b class="caret"></b></a>
                                                 @endif
                                           @if ($category->subcategories()->count() > 0)
                                         <ul class="dropdown-menu">
                                            @foreach ($category->subcategories as $subcategory)
                                            <li><a href="#">
                                                @if (session()->get('lang') === 'english')
                                                {{ $subcategory->name_en }}
                                                @else
                                                {{ $subcategory->name_ar }}
                                                @endif
                                            </a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        </li>
                                        @endforeach
                                    </ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-2 col-sm-12">
					<div class="header-icon">
						<ul>
							<!-- version-start -->
                            @if (session()->get('lang') ==='english')
							<li class="version"><a href="{{ route('setArabic') }}"><B>Arabic</B></a></li>&nbsp;&nbsp;&nbsp;
                            @else
							<li class="version"><a href="{{ route('setEnglish') }}"><B>English</B></a></li>&nbsp;&nbsp;&nbsp;
                            @endif
							<!-- login-start -->

							<!-- search-start -->
							<li><div class="search-large-divice">
								<div class="search-icon-holder"> <a href="#" class="search-icon" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-search" aria-hidden="true"></i></a>
									<div class="modal fade bd-example-modal-lg" action="" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-times-circle" aria-hidden="true"></i> </button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-md-12">
															<div class="custom-search-input">
																<form>
																	<div class="input-group">
																		<input class="search form-control input-lg" placeholder="search" value="Type Here.." type="text">
																		<span class="input-group-btn">
																		<button class="btn btn-lg" type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
																	</span> </div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div></li>
							<!-- social-start -->
                            @php
                                $social = DB::table('socials')->first()
                            @endphp
							<li>
								<div class="dropdown">
								  <button class="dropbtn-02"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
								  <div class="dropdown-content">
									<a href="https://{{ $social->facebook }}"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
									<a href="https://{{ $social->twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
									<a href="https://{{ $social->youtube }}"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a>
									<a href="https://{{ $social->instagram }}"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
								  </div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.header-close -->

    <!-- top-add-start -->
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
					<div class="top-add"><img src="{{ asset('front/assets/img/top-ad.jpg') }}" alt="" /></div>
				</div>
			</div>
		</div>
	</section> <!-- /.top-add-close -->

	<!-- date-start -->
    <section>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12 col-sm-12">
					<div class="date">
						<ul>
							<li><i class="fa fa-map-marker" aria-hidden="true"></i>  Dhaka </li>
							<li><i class="fa fa-calendar" aria-hidden="true"></i>  Monday, 19th October 2020 </li>
							<li><i class="fa fa-clock-o" aria-hidden="true"></i> Update 5 min ago </li>
						</ul>

					</div>
				</div>
    		</div>
    	</div>
    </section><!-- /.date-close -->

	<!-- notice-start -->
@php
    $headlines=DB::table('posts')->where('headline', 1)->limit(3)->get();
@endphp
    <section>
    	<div class="container-fluid">
			<div class="row scroll">
				<div class="col-md-2 col-sm-3 scroll_01 ">
					Breaking News :
				</div>
				<div class="col-md-10 col-sm-9 scroll_02">
                    @foreach ($headlines as $headline)
					<marquee>
                        @if (session()->get('lang')==='english')
                        {{ $headline->title_en }}
                        @else
                        {{ $headline->title_ar}}
                        @endif
                    </marquee>
                    @endforeach

				</div>
			</div>
    	</div>
    </section>
    @php
    $notice=DB::table('notices')->first()
    @endphp
@if ($notice->status == 1)
         <section>
    	<div class="container-fluid">
			<div class="row scroll">
				<div class="col-md-2 col-sm-3 scroll_01 ">
					Important Notice :
				</div>
				<div class="col-md-10 col-sm-9 scroll_02">
					<marquee>
                     {!! strip_tags($notice->notice_body) !!}
                    </marquee>

				</div>
			</div>
    	</div>
    </section>
@else
@endif
            @yield('content')

	<!-- top-footer-start -->
	<section>
		<div class="container-fluid">
			<div class="top-footer">
				<div class="row">
					<div class="col-md-3 col-sm-4">
						<div class="foot-logo">
							<img src="{{ asset('front/assets/img/demofooter.png') }}" style="height: 50px;" />
						</div>
					</div>
					<div class="col-md-6 col-sm-4">
						 <div class="social">
                            <ul>
                                <li><a href="" target="_blank" class="facebook"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="" target="_blank" class="twitter"> <i class="fa fa-twitter"></i></a></li>
                                <li><a href="" target="_blank" class="instagram"> <i class="fa fa-instagram"></i></a></li>
                                <li><a href="" target="_blank" class="android"> <i class="fa fa-android"></i></a></li>
                                <li><a href="" target="_blank" class="linkedin"> <i class="fa fa-linkedin"></i></a></li>
                                <li><a href="" target="_blank" class="youtube"> <i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
					</div>
					<div class="col-md-3 col-sm-4">
						<div class="apps-img">
							<ul>
								<li><a href="#"><img src="{{ asset('front/assets/img/apps-01.png') }}" alt="" /></a></li>
								<li><a href="#"><img src="{{ asset('front/assets/img/apps-02.png') }}" alt="" /></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.top-footer-close -->

	<!-- middle-footer-start -->
	<section class="middle-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="editor-one">
						Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-two">
					Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-three">
						Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.middle-footer-close -->

	<!-- bottom-footer-start -->
	<section class="bottom-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="copyright">
						All rights reserved © 2020 EasyLearning
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="btm-foot-menu">
						<ul>
							<li><a href="#">About US</a></li>
							<li><a href="#">Contact US</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

		<script src="{{ asset('front/assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('front/assets/js/main.js') }}"></script>
		<script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
	</body>
</html>




