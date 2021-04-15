<!DOCTYPE html>
<html lang="en">
    <head>
        @php
            $seo = DB::table('seos')->first();
            $settings=DB::table('website_settings')->first();
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
     <!-- toastr -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    </head>
    <body>
    <!-- header-start -->
	<section class="hdr_section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6 col-md-2 col-sm-4">
					<div class="header_logo">
						<a href="{{ route('frontPage') }}"><img src="{{ asset('front/assets/img/demofooter.png') }}"></a>
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
											<a href="{{ route('category.posts', $category->id) }}" class="dropdown-toggle" data-toggle="dropdown">
                                                @if (session()->get('lang')==='english')
                                                {{ $category->name_en }}
                                                @else
                                                {{ $category->name_ar }}
                                                @endif
                                                <b class="caret"></b></a>
                                            @if ($category->subcategories()->count() > 0)
                                            @foreach ($category->subcategories as $subcategory)
											<ul class="dropdown-menu">
												<li><a href="{{ route('subcategory.posts', $subcategory->id) }}">
                                                    @if (session()->get('lang')==='english')
                                                    {{ $subcategory->name_en }}
                                                    @else
                                                    {{ $subcategory->name_ar }}
                                                    @endif
                                                </a></li>
											</ul>
                                            @endforeach
                                            @endif
										</li>
                                        @endforeach
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
 @php
    $topHorizontalAd = DB::table('ads')->where('type', 1)->first();
@endphp
    <!-- top-add-start -->
    @if ($topHorizontalAd)
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
					<div class="top-add"><a href="http://{{ $topHorizontalAd->link }}"><img src="{{ asset('storage/'.$topHorizontalAd->image) }}" alt="" /></a></div>
				</div>
			</div>
		</div>
	</section> <!-- /.top-add-close -->
    @else

    @endif


	<!-- date-start -->
    <section>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12 col-sm-12">
					<div class="date">
						<ul>
							<li><i class="fa fa-map-marker" aria-hidden="true"></i>  Egypt </li>
							<li><i class="fa fa-calendar" aria-hidden="true"></i>  {{ Carbon\Carbon::now()->toDateString() }} </li>
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
							<img src="{{ asset('storage/'.$settings->logo) }}" style="height: 50px;" />
						</div>
					</div>
					<div class="col-md-6 col-sm-4">
						 <div class="social">
                            <ul>
                                <li><a href="http://{{ $social->facebook }}" target="_blank" class="facebook"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="http://{{ $social->twitter }}" target="_blank" class="twitter"> <i class="fa fa-twitter"></i></a></li>
                                <li><a href="http://{{ $social->instagram }}" target="_blank" class="instagram"> <i class="fa fa-instagram"></i></a></li>
                                <li><a href="http://{{ $social->linkedin }}" target="_blank" class="linkedin"> <i class="fa fa-linkedin"></i></a></li>
                                <li><a href="http://{{ $social->youtube }}" target="_blank" class="youtube"> <i class="fa fa-youtube"></i></a></li>
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
                        @if (session()->get('lang')==='english')
                        <label for="Address">Address :</label>
                             {!! $settings->address_en !!}
                             @else
                             <label for="Address">: العنوان</label>
                             {!! $settings->address_ar !!}
                        @endif
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-two">
                        @if (session()->get('lang')==='english')
                        <label for="Address">Phone :</label>
                        <br>
                             {{  $settings->phone  }}
                             @else
                             <label for="Address">: الهاتف</label>
                             <br>
                             {{  $settings->phone  }}
                        @endif
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-three">
                        @if (session()->get('lang')==='english')
                        <label for="Address">Email :</label>
                        <br>
                             {{  $settings->email  }}
                             @else
                             <label for="Address">: البريد الإلكتروني</label>
                             <br>
                             {{  $settings->email  }}
                        @endif
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
						All rights reserved © 2020
					</div>
				</div>
			</div>
		</div>
	</section>
		<script src="{{ asset('front/assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('front/assets/js/main.js') }}"></script>
		<script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
              <!-- toastr -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <!--  toaster -->
   <script>
      @if(Session::has('message'))
      var type = "{{ Session::get('alert-type') }}"
      switch (type) {
          case 'info':
              toastr.info("{{ Session::get('message') }}")
              break;
              case 'success':
              toastr.success("{{ Session::get('message') }}")
              break;
              case 'error':
              toastr.error("{{ Session::get('message') }}")
              break;
              case 'warning':
              toastr.info("{{ Session::get('message') }}")
              break;
          default:
              break;
      }
      @endif
  </script>
                  <!--Loading subdistricts with ajax -->
                  <script type="text/javascript">
                    $(document).ready(function(){
                   $('select[name="district_id"]').on('change',function(){
                        var district_id = $(this).val();
                        if (district_id) {
                          $.ajax({
                            url: "{{ url('/search/get/subdistricts/') }}/"+district_id,
                            type:"GET",
                            dataType:"json",
                            success:function(data) {
                            var d =$('select[name="subdistrict_id"]').empty();
                            $.each(data, function(key, value){
                            $('select[name="subdistrict_id"]').append('<option value="'+ value.id + '">' + value.name_en + '</option>');
                            });
                            },
                          });
                        }else{
                          alert('danger');
                        }
                          });
                    });
                </script>
                @yield('scripts')
	</body>
</html>




