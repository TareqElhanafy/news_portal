@extends('layouts.app')
@section('content')
@php
    $firstSectionbigthumbnail = DB::table('posts')->where('first_section_thumbnail', 1)->first();
    $firstsections = DB::table('posts')->where('first_section', 1)->orderBy('id', 'desc')->limit(3)->get();
@endphp
	<!-- 1st-news-section-start -->
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-8">
					<div class="row">
						<div class="col-md-1 col-sm-1 col-lg-1"></div>
						<div class="col-md-10 col-sm-10">
							<div class="lead-news">
	 <div class="service-img"><a href="{{ route('singlePost',$firstSectionbigthumbnail->id) }}"><img src="{{ asset('storage/'.$firstSectionbigthumbnail->image) }}" width="800px" alt="Notebook"></a></div>
								<div class="content">
		 <h4 class="lead-heading-01"><a href="{{ route('singlePost',$firstSectionbigthumbnail->id) }}">
             @if (session()->get('lang')==='english')
                 {{ $firstSectionbigthumbnail->title_en }}
             @else
             {{ $firstSectionbigthumbnail->title_ar }}
             @endif
            </a> </h4>
								</div>
							</div>
						</div>

					</div>
                    @php
                    @endphp
						<div class="row">
                            @foreach ($firstsections as $firstsection)
								<div class="col-md-3 col-sm-3">
									<div class="top-news">
										<a href="{{ route('singlePost',$firstsection->id) }}"><img src="{{ asset('storage/'.$firstsection->image) }}" alt="Notebook"></a>
										<h4 class="heading-02"><a href="{{ route('singlePost',$firstsection->id) }}">
                                            @if (session()->get('lang')==='english')
                                                {{ $firstsection->title_en }}
                                                @else
                                                {{ $firstsection->title_ar }}
                                            @endif
                                        </a> </h4>
									</div>
								</div>
                                @endforeach
							</div>

					<!-- add-start -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="add"><img src="assets/img/top-ad.jpg" alt="" /></div>
						</div>
					</div><!-- /.add-close -->

					<!-- news-start -->
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
                                @php
                                    $first_cat = DB::table('categories')->first();
                                    $first_cat_top_post = DB::table('posts')->where('category_id', $first_cat->id)->where('bigthumbnail', 1)->first();
                                     $first_cat_top_posts = DB::table('posts')->where('category_id', $first_cat->id)->where('bigthumbnail', null)->limit(2)->get();
                                @endphp
								<div class="cetagory-title"><a href="{{ route('category.posts', $first_cat->id) }}">
                                    @if (session()->get('lang')==='english')
                                    {{ $first_cat->name_en }}
                                    @else
                                    {{ $first_cat->name_ar }}
                                @endif
                                     <span>More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											<a href="{{ route('singlePost',$first_cat_top_post->id) }}"><img src="{{ asset('storage/'.$first_cat_top_post->image) }}" alt="Notebook"></a>
											<h4 class="heading-02"><a href="{{ route('singlePost',$first_cat_top_post->id) }}">
                                                @if (session()->get('lang')==='english')
                                                {{ $first_cat_top_post->title_en }}
                                                @else
                                                {{ $first_cat_top_post->title_ar }}
                                                @endif
                                            </a> </h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
                                        @foreach ($first_cat_top_posts as $first_cat_top_post)
										<div class="image-title">
											<a href="{{ route('singlePost',$first_cat_top_post->id) }}"><img src="{{ asset('storage/'.$first_cat_top_post->image) }}" alt="Notebook"></a>
											<h4 class="heading-03"><a href="{{ route('singlePost',$first_cat_top_post->id) }}">
                                                @if (session()->get('lang')==='english')
                                                {{ $first_cat_top_post->title_en }}
                                                @else
                                                {{ $first_cat_top_post->title_ar }}
                                                @endif
                                        </a> </h4>
										</div>
                                        @endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
                                @php
                                $second_cat = DB::table('categories')->skip(1)->first();
                                $second_cat_top_post = DB::table('posts')->where('category_id', $second_cat->id)->where('bigthumbnail', 1)->first();
                                $second_cat_top_posts = DB::table('posts')->where('category_id', $second_cat->id)->where('bigthumbnail', null)->limit(2)->get();
                            @endphp
								<div class="cetagory-title"><a href="{{ route('category.posts', $second_cat->id) }}">
                                    @if (session()->get('lang')==='english')
                                    {{ $second_cat->name_en }}
                                    @else
                                    {{ $second_cat->name_ar }}
                                @endif
                                    <span>More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											<a href="{{ route('singlePost',$second_cat_top_post->id) }}"><img src="{{ asset('storage/'.$second_cat_top_post->image) }}" alt="Notebook"></a>
											<h4 class="heading-02"><a href="{{ route('singlePost',$second_cat_top_post->id) }}">
                                                @if (session()->get('lang')==='english')
                                                {{ $second_cat_top_post->title_en }}
                                                @else
                                                {{ $second_cat_top_post->title_ar }}
                                                @endif
                                            </a> </h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
                                        @foreach ($second_cat_top_posts as $second_cat_top_post)
										<div class="image-title">
											<a href="{{ route('singlePost',$second_cat_top_post->id) }}"><img src="{{ asset('storage/'.$second_cat_top_post->image) }}" alt="Notebook"></a>
											<h4 class="heading-03"><a href="{{ route('singlePost',$second_cat_top_post->id) }}">
                                                @if (session()->get('lang')==='english')
                                                {{ $second_cat_top_post->title_en }}
                                                @else
                                                {{ $second_cat_top_post->title_ar }}
                                                @endif
                                        </a> </h4>
										</div>
                                        @endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<!-- add-start -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="assets/img/add_01.jpg" alt="" /></div>
						</div>
					</div><!-- /.add-close -->
@php
    $livetv = DB::table('livetvs')->first();

@endphp
@if ($livetv->status == 1)
					<!-- youtube-live-start -->
					<div class="cetagory-title-03">Live TV</div>
					<div class="photo">
					<div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">

				<iframe width="729" height="410" src="{{ $livetv->embed_link  }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                     </div>
					</div><!-- /.youtube-live-close -->
@endif

					<!-- facebook-page-start -->
					<div class="cetagory-title-03">Facebook </div>
					<div class="fb-root">
						facebook page here
					</div><!-- /.facebook-page-close -->
					<!-- add-start -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								<img src="assets/img/add_01.jpg" alt="" />
							</div>
						</div>
					</div><!-- /.add-close -->
				</div>
			</div>
		</div>
	</section><!-- /.1st-news-section-close -->

	<!-- 2nd-news-section-start -->
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        @php
                            $third_cat = DB::table('categories')->skip(2)->first();
                            $third_cat_top_post = DB::table('posts')->where('category_id', $third_cat->id)->where('bigthumbnail', 1)->first();
                            $third_cat_top_posts = DB::table('posts')->where('category_id', $third_cat->id)->where('bigthumbnail', null)->limit(2)->get();
                        @endphp
                        <div class="cetagory-title"><a href="{{ route('category.posts', $third_cat->id) }}">
                            @if (session()->get('lang')==='english')
                            {{ $third_cat->name_en }}
                            @else
                            {{ $third_cat->name_ar }}
                        @endif
                             <span>More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    <a href="{{ route('singlePost',$third_cat_top_post->id) }}"><img src="{{ asset('storage/'.$third_cat_top_post->image) }}" alt="Notebook"></a>
                                    <h4 class="heading-02"><a href="{{ route('singlePost',$third_cat_top_post->id) }}">
                                        @if (session()->get('lang')==='english')
                                        {{ $third_cat_top_post->title_en }}
                                        @else
                                        {{ $third_cat_top_post->title_ar }}
                                        @endif
                                    </a> </h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                @foreach ($third_cat_top_posts as $third_cat_top_post)
                                <div class="image-title">
                                    <a href="{{ route('singlePost',$third_cat_top_post->id) }}"><img src="{{ asset('storage/'.$third_cat_top_post->image) }}" alt="Notebook"></a>
                                    <h4 class="heading-03"><a href="{{ route('singlePost',$third_cat_top_post->id) }}">
                                        @if (session()->get('lang')==='english')
                                        {{ $third_cat_top_post->title_en }}
                                        @else
                                        {{ $third_cat_top_post->title_ar }}
                                        @endif
                                </a> </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
				</div>
				<div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        @php
                            $fourth_cat = DB::table('categories')->skip(3)->first();
                            $fourth_cat_top_post = DB::table('posts')->where('category_id', $fourth_cat->id)->where('bigthumbnail', 1)->first();
                            $fourth_cat_top_posts = DB::table('posts')->where('category_id', $fourth_cat->id)->where('bigthumbnail', null)->limit(2)->get();
                        @endphp
                        <div class="cetagory-title"><a href="{{ route('category.posts', $fourth_cat->id) }}">
                            @if (session()->get('lang')==='english')
                            {{ $fourth_cat->name_en }}
                            @else
                            {{ $fourth_cat->name_ar }}
                        @endif
                             <span>More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    <a href="{{ route('singlePost',$fourth_cat_top_post->id) }}"><img src="{{ asset('storage/'.$fourth_cat_top_post->image) }}" alt="Notebook"></a>
                                    <h4 class="heading-02"><a href="{{ route('singlePost',$fourth_cat_top_post->id) }}">
                                        @if (session()->get('lang')==='english')
                                        {{ $fourth_cat_top_post->title_en }}
                                        @else
                                        {{ $fourth_cat_top_post->title_ar }}
                                        @endif
                                    </a> </h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                @foreach ($fourth_cat_top_posts as $fourth_cat_top_post)
                                <div class="image-title">
                                    <a href="{{ route('singlePost',$fourth_cat_top_post->id) }}"><img src="{{ asset('storage/'.$fourth_cat_top_post->image) }}" alt="Notebook"></a>
                                    <h4 class="heading-03"><a href="{{ route('singlePost',$fourth_cat_top_post->id) }}">
                                        @if (session()->get('lang')==='english')
                                        {{ $fourth_cat_top_post->title_en }}
                                        @else
                                        {{ $fourth_cat_top_post->title_ar }}
                                        @endif
                                </a> </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
				</div>
			</div>
			<!-- ******* -->
			<div class="row">
				<div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        @php
                            $fifth_cat = DB::table('categories')->skip(4)->first();
                            $fifth_cat_top_post = DB::table('posts')->where('category_id', $fifth_cat->id)->where('bigthumbnail', 1)->first();
                            $fifth_cat_top_posts = DB::table('posts')->where('category_id', $fifth_cat->id)->where('bigthumbnail', null)->limit(2)->get();
                        @endphp
                        <div class="cetagory-title"><a href="{{ route('category.posts', $fifth_cat->id) }}">
                            @if (session()->get('lang')==='english')
                            {{ $fifth_cat->name_en }}
                            @else
                            {{ $fifth_cat->name_ar }}
                        @endif
                             <span>More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    <a href="{{ route('singlePost',$fifth_cat_top_post->id) }}"><img src="{{ asset('storage/'.$fifth_cat_top_post->image) }}" alt="Notebook"></a>
                                    <h4 class="heading-02"><a href="{{ route('singlePost',$fifth_cat_top_post->id) }}">
                                        @if (session()->get('lang')==='english')
                                        {{ $fifth_cat_top_post->title_en }}
                                        @else
                                        {{ $fifth_cat_top_post->title_ar }}
                                        @endif
                                    </a> </h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                @foreach ($fifth_cat_top_posts as $fifth_cat_top_post)
                                <div class="image-title">
                                    <a href="{{ route('singlePost',$fifth_cat_top_post->id) }}"><img src="{{ asset('storage/'.$fifth_cat_top_post->image) }}" alt="Notebook"></a>
                                    <h4 class="heading-03"><a href="{{ route('singlePost',$fifth_cat_top_post->id) }}">
                                        @if (session()->get('lang')==='english')
                                        {{ $fifth_cat_top_post->title_en }}
                                        @else
                                        {{ $fifth_cat_top_post->title_ar }}
                                        @endif
                                </a> </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
				</div>
				<div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        @php
                            $sixth_cat = DB::table('categories')->skip(5)->first();
                            $sixth_cat_top_post = DB::table('posts')->where('category_id', $sixth_cat->id)->where('bigthumbnail', 1)->first();
                            $sixth_cat_top_posts = DB::table('posts')->where('category_id', $sixth_cat->id)->where('bigthumbnail', null)->limit(2)->get();
                        @endphp
                        <div class="cetagory-title"><a href="{{ route('category.posts', $sixth_cat->id) }}">
                            @if (session()->get('lang')==='english')
                            {{ $sixth_cat->name_en }}
                            @else
                            {{ $sixth_cat->name_ar }}
                        @endif
                             <span>More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    <a href="{{ route('singlePost',$sixth_cat_top_post->id) }}"><img src="{{ asset('storage/'.$sixth_cat_top_post->image) }}" alt="Notebook"></a>
                                    <h4 class="heading-02"><a href="{{ route('singlePost',$sixth_cat_top_post->id) }}">
                                        @if (session()->get('lang')==='english')
                                        {{ $sixth_cat_top_post->title_en }}
                                        @else
                                        {{ $sixth_cat_top_post->title_ar }}
                                        @endif
                                    </a> </h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                @foreach ($sixth_cat_top_posts as $sixth_cat_top_post)
                                <div class="image-title">
                                    <a href="{{ route('singlePost',$sixth_cat_top_post->id) }}"><img src="{{ asset('storage/'.$sixth_cat_top_post->image) }}" alt="Notebook"></a>
                                    <h4 class="heading-03"><a href="{{ route('singlePost',$sixth_cat_top_post->id) }}">
                                        @if (session()->get('lang')==='english')
                                        {{ $sixth_cat_top_post->title_en }}
                                        @else
                                        {{ $sixth_cat_top_post->title_ar }}
                                        @endif
                                </a> </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
				</div>
			</div>
			<!-- add-start -->
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="add"><img src="assets/img/top-ad.jpg" alt="" /></div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="add"><img src="assets/img/top-ad.jpg" alt="" /></div>
				</div>
			</div><!-- /.add-close -->

		</div>
	</section><!-- /.2nd-news-section-close -->

	<!-- 3rd-news-section-start -->
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
                @php
                    $district = DB::table('districts')->first();
                    $district_top_post = DB::table('posts')->where('district_id', $district->id)->where('bigthumbnail', 1)->first();
                    $district_posts = DB::table('posts')->where('district_id', $district->id)->limit(3)->get();
                @endphp
				<div class="col-md-9 col-sm-9">
					<div class="cetagory-title-02"><a href="">
                        @if (session()->get('lang')==='english')
                        {{ $district->name_en }}
                        @else
                        {{ $district->name_ar }}
                        @endif
                        <i class="fa fa-angle-right" aria-hidden="true"></i> all district news tab here <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>

					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="top-news">
								<a href="{{ route('singlePost',$district_top_post->id) }}"><img src="{{ asset('storage/'.$district_top_post->image) }}" alt="Notebook"></a>
								<h4 class="heading-02"><a href="{{ route('singlePost',$district_top_post->id) }}">
                                    @if (session()->get('lang')==='english')
                                    {{ $district_top_post->title_en }}
                                    @else
                                    {{ $district_top_post->title_ar }}
                                    @endif
                                </a> </h4>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
                            @foreach ($district_posts as $district_post)
							<div class="image-title">
								<a href="{{ route('singlePost',$district_top_post->id) }}"><img src="{{ asset('storage/'.$district_post->image) }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="{{ route('singlePost',$district_top_post->id) }}">
                                    @if (session()->get('lang')==='english')
                                    {{ $district_post->title_en }}
                                    @else
                                    {{ $district_post->title_ar }}
                                    @endif
                                 </a> </h4>
							</div>
                            @endforeach
						</div>
					</div>
					<!-- ******* -->
					<br />
					<div class="row">
                        @php
                        $seventh_cat = DB::table('categories')->skip(6)->first();
                        $seventh_cat_top_post = DB::table('posts')->where('category_id', $seventh_cat->id)->where('bigthumbnail', 1)->first();
                        $seventh_cat_top_posts = DB::table('posts')->where('category_id', $seventh_cat->id)->where('bigthumbnail', null)->get();
                    @endphp
						<div class="col-md-12 col-sm-12">
							<div class="cetagory-title-02"><a href="{{ route('category.posts', $seventh_cat->id) }}">
                                @if (session()->get('lang')==='english')
                                {{ $seventh_cat->name_en }}
                                @else
                                {{ $seventh_cat->name_ar }}
                            @endif
                                <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> More  </span></a></div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="bg-gray">
								<div class="top-news">
									<a href="{{ route('singlePost',$seventh_cat_top_post->id) }}"><img src="{{ asset('storage/'.$seventh_cat_top_post->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{ route('singlePost',$seventh_cat_top_post->id) }}">
                                        @if (session()->get('lang')==='english')
                                        {{ $seventh_cat_top_post->title_en }}
                                        @else
                                        {{ $seventh_cat_top_post->title_ar }}
                                        @endif
                                         </a> </h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
                            @foreach ($seventh_cat_top_posts as $seventh_cat_top_post)
							<div class="news-title">
								<a href="{{ route('singlePost',$seventh_cat_top_post->id) }}">
                                    @if (session()->get('lang')==='english')
                                    {{ $seventh_cat_top_post->title_en }}
                                    @else
                                    {{ $seventh_cat_top_post->title_ar }}
                                    @endif
                                 </a>
							</div>
                            @endforeach
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								<img src="assets/img/top-ad.jpg" alt="" />
							</div>
						</div>
					</div><!-- /.add-close -->


				</div>
				<div class="col-md-3 col-sm-3">
					<div class="tab-header">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">Latest</a></li>
							<li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">Popular</a></li>
						</ul>

					<!-- Tab panes -->
					<div class="tab-content ">
						<div role="tabpanel" class="tab-pane in active" id="tab21">
                            @php
                                $latestposts = DB::table('posts')->orderBy('id', 'desc')->limit(5)->get();
                                $popularposts = DB::table('posts')->orderBy('views', 'desc')->limit(5)->get();
                            @endphp
							<div class="news-titletab">
                                @foreach ($latestposts as $post)
								<div class="news-title-02">
									<h4 class="heading-03"><a href="{{ route('singlePost', $post->id) }}">
                                    @if (session()->get('lang')==='english')
                                    {{ $post->title_en }}
                                    @else
                                    {{ $post->title_ar }}
                                    @endif
                                    </a> </h4>
								</div>
                                @endforeach

							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab22">
							<div class="news-titletab">
                                @foreach ($popularposts as $post)
								<div class="news-title-02">
									<h4 class="heading-03"><a href="{{ route('singlePost', $post->id) }}">
                                    @if (session()->get('lang')==='english')
                                    {{ $post->title_en }}
                                    @else
                                    {{ $post->title_ar }}
                                    @endif
                                    </a> </h4>
								</div>
                                @endforeach
							</div>
						</div>
					</div>
					</div>
                    @php
                        $prayer=DB::table('prayers')->first();
                    @endphp
					<!-- Namaj Times -->
					<div class="cetagory-title-03">Prayer Time </div>
                    <div>
                        <table class="table">
                            <tr>
                                <th>Fajr</th>
                                <th>{{ $prayer->fajr }}</th>
                            </tr>
                            <tr>
                                <th>Duhr</th>
                                <th>{{ $prayer->duhr }}</th>
                            </tr>
                            <tr>
                                <th>Asor</th>
                                <th>{{ $prayer->asr }}</th>
                            </tr>
                            <tr>
                                <th>Magrib</th>
                                <th>{{ $prayer->magrib }}</th>
                            </tr>
                            <tr>
                                <th>Asha</th>
                                <th>{{ $prayer->esha }}</th>
                            </tr>
                            </table>
                    </div>
					<!-- Namaj Times -->
					<div class="cetagory-title-03">Old News  </div>
					<form action="" method="post">
						<div class="old-news-date">
						   <input type="text" name="from" placeholder="From Date" required="">
						   <input type="text" name="" placeholder="To Date">
						</div>
						<div class="old-date-button">
							<input type="submit" value="search ">
						</div>
				   </form>
                   @php
                       $websites = DB::table('websites')->orderBy('id', 'desc')->limit(5)->get()
                   @endphp
				   <!-- news -->
				   <br><br><br><br><br>
				   <div class="cetagory-title-04"> Important Websites</div>
				   <div class="">
                       @foreach ($websites as $website)
				   	<div class="news-title-02">
				   		<h4 class="heading-03"><a href="{{ $website->link }}"><i class="fa fa-check" aria-hidden="true"></i> {{ $website->name }} </a> </h4>
				   	</div>
                       @endforeach
				   </div>

				</div>
			</div>
		</div>
	</section><!-- /.3rd-news-section-close -->







@php
    $big_photo = DB::table('photos')->where('type', 1)->first();
    $photos = DB::table('photos')->where('type', 0)->limit(5)->get();
@endphp

	<!-- gallery-section-start -->
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="gallery_cetagory-title"> Photo Gallery </div>

					<div class="row">
	                    <div class="col-md-8 col-sm-8">
	                        <div class="photo_screen">
	                            <div class="myPhotos" style="width:100%">
                                      <img src="{{ asset('storage/'.$big_photo->image) }}"  alt="Avatar">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4">
	                        <div class="photo_list_bg">
                                   @foreach ($photos as $photo)
	                            <div class="photo_img photo_border active">
	                                <img src="{{ asset('storage/'.$photo->image) }}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
                                          {{ $photo->title }}
	                                </div>
	                            </div>
                                @endforeach
	                        </div>
	                    </div>
	                </div>

	                <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

                            <script>
                                    var slideIndex = 1;
                                    showDivs(slideIndex);

                                    function plusDivs(n) {
                                      showDivs(slideIndex += n);
                                    }

                                    function currentDiv(n) {
                                      showDivs(slideIndex = n);
                                    }

                                    function showDivs(n) {
                                      var i;
                                      var x = document.getElementsByClassName("myPhotos");
                                      var dots = document.getElementsByClassName("demo");
                                      if (n > x.length) {slideIndex = 1}
                                      if (n < 1) {slideIndex = x.length}
                                      for (i = 0; i < x.length; i++) {
                                         x[i].style.display = "none";
                                      }
                                      for (i = 0; i < dots.length; i++) {
                                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                      }
                                      x[slideIndex-1].style.display = "block";
                                      dots[slideIndex-1].className += " w3-opacity-off";
                                    }
                                </script>

                <!--=======================================
                    Video Gallery clickable  jquary  close
                =========================================-->
             @php
                $big_video = DB::table('videos')->where('type', 1)->first();
                $videos = DB::table('videos')->where('type', 0)->limit(5)->get();
            @endphp
				</div>
				<div class="col-md-4 col-sm-5">
					<div class="gallery_cetagory-title"> Video Gallery </div>

					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    <iframe width="853" height="480" src="{{ $big_video->embed_link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="gallery_sec owl-carousel">
                                @foreach ($videos as $video)
                                <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    <iframe width="853" height="480" src="{{ $video->embed_link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <script>
                        var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                          showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                          showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                          var i;
                          var x = document.getElementsByClassName("myVideos");
                          var dots = document.getElementsByClassName("demo");
                          if (n > x.length) {slideIndex = 1}
                          if (n < 1) {slideIndex = x.length}
                          for (i = 0; i < x.length; i++) {
                             x[i].style.display = "none";
                          }
                          for (i = 0; i < dots.length; i++) {
                             dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                          }
                          x[slideIndex-1].style.display = "block";
                          dots[slideIndex-1].className += " w3-opacity-off";
                        }
                    </script>

				</div>
			</div>
		</div>
	</section><!-- /.gallery-section-close -->
@endsection
