@extends('layouts.app')
@section('content')
    	<!-- single-page-start -->

	<section class="single-page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
					   <li><a href="{{ route('frontPage') }}"><i class="fa fa-home"></i></a></li>
						<li><a href="#">
                            @if (session()->get('lang')==='english')
                            {{ $post->category->name_en }}
                            @else
                            {{ $post->category->name_ar }}
                            @endif
                        </a></li>
						<li><a href="#">
                            @if (session()->get('lang')==='english')
                            {{ $post->district->name_en }}
                            @else
                            {{ $post->district->name_ar }}
                            @endif
                        </a></li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<header class="headline-header margin-bottom-10">
						<h1 class="headline">
                            @if (session()->get('lang')==='english')
                            {{ $post->title_en }}
                            @else
                            {{ $post->title_ar }}
                            @endif
                        </h1>
					</header>


				 <div class="article-info margin-bottom-20">
				  <div class="row">
						<div class="col-md-6 col-sm-6">
						 <ul class="list-inline">


						 <li> Published AT </li><li><i class="fa fa-clock-o"></i> {{Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</li>
						 </ul>

						</div>
						<div class="col-md-6 col-sm-6 pull-right">

                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox_cqnx"></div>

						</div>
					</div>
				 </div>
			</div>
		  </div>
		  <!-- ******** -->
		  <div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="single-news">
					<img src="{{ asset('storage/'.$post->image) }}" alt="" />
					<h4 class="caption">
                        @if (session()->get('lang')==='english')
                        {{ $post->title_en }}
                        @else
                        {{ $post->title_ar }}
                        @endif
                    </h4>
					<p>
                        @if (session()->get('lang')==='english')
                        {!! $post->details_en !!}
                        @else
                        {!! $post->details_ar !!}
                        @endif
                    </p>
				</div>
				<!-- ********* -->

                @php
                    $first_related_posts = DB::table('posts')->where('category_id', $post->category_id)->limit(3)->get();
                    $second_related_posts = DB::table('posts')->where('category_id', $post->category_id)->skip(3)->limit(3)->get();
                @endphp
				<div class="row">
					<div class="col-md-12"><h2 class="heading">Related News</h2></div>
                    @foreach ($first_related_posts as $post)
					<div class="col-md-4 col-sm-4">
						<div class="top-news sng-border-btm">
							<a href="{{ route('singlePost', $post->id) }}"><img src="{{ asset('storage/'.$post->image) }}" alt="Notebook"></a>
							<h4 class="heading-02"><a href="{{ route('singlePost', $post->id) }}">
                                @if (session()->get('lang')==='english')
                                {{ $post->title_en }}
                                @else
                                {{ $post->title_ar }}
                                @endif
                            </a> </h4>
						</div>
					</div>
                    @endforeach
				</div>


				<div class="row">
                    @foreach ($second_related_posts as $post)
					<div class="col-md-4 col-sm-4">
						<div class="top-news">
							<a href="{{ route('singlePost', $post->id) }}"><img src="{{ asset('storage/'.$post->image) }}" alt="Notebook"></a>
							<h4 class="heading-02"><a href="#">
                                @if (session()->get('lang')==='english')
                                {{ $post->title_en }}
                                @else
                                {{ $post->title_ar }}
                                @endif
                            </a> </h4>
						</div>
					</div>
                    @endforeach
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
                @php
                $firstVerticalAd = DB::table('ads')->where('type', 2)->first();
                $secondVerticalAd = DB::table('ads')->where('type', 2)->skip(1)->first();

            @endphp
            @if ($firstVerticalAd)
            <!-- add-start -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="sidebar-add"><a href="http://{{ $firstVerticalAd->link }}"><img src="{{ asset('storage/'.$firstVerticalAd->image) }}" alt="" /></a></div>
                </div>
            </div><!-- /.add-close -->
            @else
            @endif
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
<!-- add-start -->
@if ($secondVerticalAd)
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="sidebar-add">
            <a href="http://{{ $secondVerticalAd->link }}"><img src="{{ asset('storage/'.$secondVerticalAd->image) }}" alt="" /></a>
        </div>
    </div>
</div><!-- /.add-close -->
@else
@endif
			</div>
		  </div>
		</div>
	</section>
@endsection
@section('scripts')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-604a2d0713d96432"></script>
@endsection
