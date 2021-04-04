@extends('layouts.app')
@section('content')
	<!-- archive_page-start -->
	<section class="single_page">
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="single_info">
					<span>
						<a href="{{ route('frontPage') }}"><i class="fa fa-home" aria-hidden="true"></i> /
						</a>
                         @if (session()->get('lang')==='english')
                        {{ $category->name_en }}
                        @else
                        {{ $category->name_ar }}
                        @endif
					</span>
				</div>
			</div>
			<div class="col-md-9 col-sm-8">
				<div class="archive_post_sec_again">
                    @foreach ($posts as $post)
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="archive_img_again">
								<a href="#"><img src="{{ asset('storage/'.$post->image) }}" alt="Notebook"></a>
							</div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="archive_padding_again">
								<div class="archive_heading_01">
                                    <a href="{{ route('singlePost', $post->id) }}">
                                        @if (session()->get('lang')==='english')
                                        {{ $post->title_en }}
                                        @else
                                        {{ $post->title_ar }}
                                        @endif
                                    </a>
								</div>
								<div class="archive_dtails">
                                    @if (session()->get('lang')==='english')
                                    {!! str_limit($post->details_en, 200) !!}
                                    @else
                                    {{ str_limit($post->details_ar, 200) }}
                                    @endif
								</div>
								<div class="dtails_btn"><a href="{{ route('singlePost', $post->id) }}">Read More...</a>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
                <div class="row">
                    {{ $posts->links() }}
				</div>
			</div>
			<div class="col-md-3 col-sm-4">
				<!-- add-start -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="{{ asset('front/assets/img/add_01.jpg') }}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->
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
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="{{ asset('front/assets/img/add_01.jpg') }}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->
			</div>
		</div>
	</div>
</section>
@endsection
