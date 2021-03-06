@extends($theme_layout)

@section('content')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Blog</a></li>
            <li class="active">Blog Item</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>{{ucwords($item->title)}}</h1>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->
                <div class="col-md-9 col-sm-9 blog-item">
                  <div class="blog-item-img">
                    <!-- BEGIN CAROUSEL -->
                    <div class="front-carousel">
                      <div id="myCarousel" class="carousel slide">
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                          <div class="item">
                            <img src="/themes/bootstrap/assets/frontend/pages/img/posts/img1.jpg" alt="">
                          </div>
                          <div class="item">
                            <!-- BEGIN VIDEO -->
                            <iframe src="http://player.vimeo.com/video/56974716?portrait=0" style="width:100%; border:0" allowfullscreen="" height="259"></iframe>
                            <!-- END VIDEO -->
                          </div>
                          <div class="item active">
                            <img src="/themes/bootstrap/assets/frontend/pages/img/posts/img3.jpg" alt="">
                          </div>
                        </div>
                        <!-- Carousel nav -->
                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                          <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control right" href="#myCarousel" data-slide="next">
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </div>
                    <!-- END CAROUSEL -->
                  </div>
                  <h2>{{ucfirst($item->subtitle)}}</h2>
                  <p><strong>{{ucfirst($item->intro)}}</strong></p>
                  <blockquote>
                    <p>{{ucfirst($item->quote)}}</p>
                    <small>{{ucwords($item->quote_author)}}</small>
                  </blockquote>
                  <p>{{ucfirst($item->description)}}</p>
                  <ul class="blog-info">
                    <li><i class="fa fa-user"></i> {{$item->user->name}}</li>
                    <li><i class="fa fa-clock-o"></i> {{$item->created_at->diffForHumans()}}</li>
                    <li><i class="fa fa-calendar"></i> {{$item->created_at->toDayDateTimeString()}}</li>
                    <li><i class="fa fa-comments"></i> {{count($item->comments_count)}}</li>
                    <li><i class="fa fa-tags"></i>
                    	<?php $i = 0; ?>
                        @foreach($item->tags as $tag)
                        	<?php $i++; ?>
                        	{{ucwords($tag->tag)}}@if($i < count($item->tags)){{","}}@endif
                        @endforeach
                    </li>
                  </ul>

                  @if(count($item->comments) > 0)
                  <h2>{{ucfirst(Lang::get('site.comments'))}}</h2>
                  <div class="comments">
                  	@foreach($item->comments as $comment)
                    <div class="media">
                      <a href="#" class="pull-left">
                      <img src="/themes/bootstrap/assets/frontend/pages/img/people/img1-small.jpg" alt="" class="media-object">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">{{$comment->user->name}} <span><i class="fa fa-clock-o"></i> {{$comment->created_at->diffForHumans()}} <i class="fa fa-calendar"></i> {{$comment->created_at->toDayDateTimeString()}} / <a href="#"><strong>{{ucfirst(Lang::get('site.reply'))}}</strong></a></span></h4>
                        <p> {{$comment->description}} </p>
                        @foreach($comment->replies as $reply)
                        <!-- Nested media object -->
                        <div class="media">
                          <a href="#" class="pull-left">
                          <img src="/themes/bootstrap/assets/frontend/pages/img/people/img2-small.jpg" alt="" class="media-object">
                          </a>
                          <div class="media-body">
                            <h4 class="media-heading">{{$reply->user->name}} <span><i class="fa fa-clock-o"></i> {{$reply->created_at->diffForHumans()}} <i class="fa fa-calendar"></i> {{$reply->created_at->toDayDateTimeString()}}</span></h4>
                            <p> {{$reply->description}}</p>
                          </div>
                        </div>
                        <!--end media-->
                        @endforeach
                      </div>
                    </div>
                    @endforeach
                  </div>
                  @endif

                  <div class="post-comment padding-top-40">
                    <h3>Leave a Comment</h3>
                    <form role="form">
                      <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text">
                      </div>

                      <div class="form-group">
                        <label>Email <span class="color-red">*</span></label>
                        <input class="form-control" type="text">
                      </div>

                      <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" rows="8"></textarea>
                      </div>
                      <p><button class="btn btn-primary" type="submit">Post a Comment</button></p>
                    </form>
                  </div>
                </div>
                <!-- END LEFT SIDEBAR -->

                <!-- BEGIN RIGHT SIDEBAR -->
                <div class="col-md-3 col-sm-3 blog-sidebar">
                  <!-- CATEGORIES START -->
                  <h2 class="no-top-space">Categories</h2>
                  <ul class="nav sidebar-categories margin-bottom-40">
                    <li><a href="#">London (18)</a></li>
                    <li><a href="#">Moscow (5)</a></li>
                    <li class="active"><a href="#">Paris (12)</a></li>
                    <li><a href="#">Berlin (7)</a></li>
                    <li><a href="#">Istanbul (3)</a></li>
                  </ul>
                  <!-- CATEGORIES END -->

                  <!-- BEGIN RECENT NEWS -->
                  <h2>Recent News</h2>
                  <div class="recent-news margin-bottom-10">
                    <div class="row margin-bottom-10">
                      <div class="col-md-3">
                        <img class="img-responsive" alt="" src="/themes/bootstrap/assets/frontend/pages/img/people/img2-large.jpg">
                      </div>
                      <div class="col-md-9 recent-news-inner">
                        <h3><a href="#">Letiusto gnissimos</a></h3>
                        <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
                      </div>
                    </div>
                    <div class="row margin-bottom-10">
                      <div class="col-md-3">
                        <img class="img-responsive" alt="" src="/themes/bootstrap/assets/frontend/pages/img/people/img1-large.jpg">
                      </div>
                      <div class="col-md-9 recent-news-inner">
                        <h3><a href="#">Deiusto anissimos</a></h3>
                        <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
                      </div>
                    </div>
                    <div class="row margin-bottom-10">
                      <div class="col-md-3">
                        <img class="img-responsive" alt="" src="/themes/bootstrap/assets/frontend/pages/img/people/img3-large.jpg">
                      </div>
                      <div class="col-md-9 recent-news-inner">
                        <h3><a href="#">Tesiusto baissimos</a></h3>
                        <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
                      </div>
                    </div>
                  </div>
                  <!-- END RECENT NEWS -->

                  <!-- BEGIN BLOG TALKS -->
                  <div class="blog-talks margin-bottom-30">
                    <h2>Popular Talks</h2>
                    <div class="tab-style-1">
                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1">Multipurpose</a></li>
                        <li><a data-toggle="tab" href="#tab-2">Documented</a></li>
                      </ul>
                      <div class="tab-content">
                        <div id="tab-1" class="tab-pane row-fluid fade in active">
                          <p class="margin-bottom-10">Raw denim you probably haven't heard of them jean shorts Austin. eu banh mi, qui irure terry richardson ex squid Aliquip placeat salvia cillum iphone.</p>
                          <p><a class="more" href="#">Read more</a></p>
                        </div>
                        <div id="tab-2" class="tab-pane fade">
                          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. aliquip jean shorts ullamco ad vinyl aesthetic magna delectus mollit. Keytar helvetica VHS salvia..</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- END BLOG TALKS -->

                  <!-- BEGIN BLOG PHOTOS STREAM -->
                  <div class="blog-photo-stream margin-bottom-20">
                    <h2>Photos Stream</h2>
                    <ul class="list-unstyled">
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/people/img5-small.jpg"></a></li>
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img1.jpg"></a></li>
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/people/img4-large.jpg"></a></li>
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img6.jpg"></a></li>
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/pics/img1-large.jpg"></a></li>
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/pics/img2-large.jpg"></a></li>
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img3.jpg"></a></li>
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/people/img2-large.jpg"></a></li>
                    </ul>
                  </div>
                  <!-- END BLOG PHOTOS STREAM -->

                  <!-- BEGIN BLOG TAGS -->
                  <div class="blog-tags margin-bottom-20">
                    <h2>Tags</h2>
                    <ul>
                      <li><a href="#"><i class="fa fa-tags"></i>OS</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Metronic</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Dell</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Conquer</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>MS</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Google</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Keenthemes</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Twitter</a></li>
                    </ul>
                  </div>
                  <!-- END BLOG TAGS -->
                </div>
                <!-- END RIGHT SIDEBAR -->
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
@endsection

@section('headerPlugins')
<link href="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
@endsection

@section('footerPlugins')
<script src="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->

<script src="/themes/bootstrap/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initTwitter();
    });
</script>
@endsection