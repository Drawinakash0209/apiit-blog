<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Apiit Blog</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="user/images/favicon.ico" type="image/x-icon" />
<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="user/css/bootstrap.css" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="user/css/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="user/style.css" rel="stylesheet">

<link href="user/nav-bar.css" rel="stylesheet">


<!-- Responsive styles for this template -->
<link href="user/css/responsive.css" rel="stylesheet">

<!-- Colors for this template -->
<link href="user/css/colors.css" rel="stylesheet">

<!-- Version Garden CSS for this template -->
<link href="user/css/version/garden.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>




@include('user.navbar')




<section class="section first-section ">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">
            <div class="left-side">
                <div class="masonry-box post-media">
                    <img src="user/upload/garden_cat_01.jpg" alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-aqua"><a href="user/blog-category-01.html" title="">Gardening</a></span>
                                <h4><a href="user/garden-single.html" title="">How to choose high quality soil for your gardens</a></h4>
                                <small><a href="user/garden-single.html" title="">21 July, 2017</a></small>
                                <small><a href="#" title="">by Amanda</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end left-side -->

            <div class="center-side">
                <div class="masonry-box post-media">
                    <img src="user/upload/garden_cat_02.jpg" alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-aqua"><a href="user/blog-category-01.html" title="">Outdoor</a></span>
                                <h4><a href="user/garden-single.html" title="">You can create a garden with furniture in your home</a></h4>
                                <small><a href="user/garden-single.html" title="">19 July, 2017</a></small>
                                <small><a href="#" title="">by Amanda</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end left-side -->

            <div class="right-side hidden-md-down">
                <div class="masonry-box post-media">
                    <img src="user/upload/garden_cat_03.jpg" alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-aqua"><a href="user/blog-category-01.html" title="">Indoor</a></span>
                                <h4><a href="user/garden-single.html" title="">The success of the 10 companies in the vegetable sector</a></h4>
                                <small><a href="user/garden-single.html" title="">03 July, 2017</a></small>
                                <small><a href="#" title="">by Jessica</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end right-side -->
        </div><!-- end masonry -->
    </div>
</section>

<section class="section wb">
    <div class="container">
        <div class="row">

            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-list clearfix">

                        @foreach ($blog as $item)

                            <hr class="invis">

                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="" title="">
                                            <img src="/uploads/post/{{$item->image}}" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->


                                <div class="blog-meta big-meta col-md-8">
                                    <span class="bg-aqua"><a href="" title="">{{$item['category_id']}}</a></span>
                                    <h4><a href="" title="">{{$item['name']}}</a></h4>
                                    <p>{!! Str::limit(strip_tags($item->description), 250) !!}</p>
                                    <small><a href="" title=""><i class="fa fa-eye"></i> 4441</a></small>
                                    <small><a href="" title="">{{ $item['created_at']->format('Y-m-d') }}</a></small>

                                    <small><a href="#" title="">by Matilda</a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                        @endforeach

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div>
                </div>
            </div><!-- end col -->



            @include('user.sidebar')



            </div><!-- end row -->
        </div><!-- end container -->
</section>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="widget">
                    <div class="footer-text text-center">
                        <a href="user/index.html"><img src="user/images/version/garden-footer-logo.png" alt="" class="img-fluid"></a>
                        <p>Forest Time is a personal blog for handcrafted, cameramade photography content, fashion styles from independent creatives around the world.</p>
                        <div class="social">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                        </div>

                        <hr class="invis">

                        <div class="newsletter-widget text-center">
                            <form class="form-inline">
                                <input type="text" class="form-control" placeholder="Enter your email address">
                                <button type="submit" class="btn btn-primary">Subscribe <i class="fa fa-envelope-open-o"></i></button>
                            </form>
                        </div><!-- end newsletter -->
                    </div><!-- end footer-text -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <br>
                <div class="copyright">&copy; Forest Time. Design: <a href="http://html.design">HTML Design</a>.</div>
            </div>
        </div>
    </div><!-- end container -->
</footer><!-- end footer -->

<div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="user/js/jquery.min.js"></script>
<script src="user/js/tether.min.js"></script>
<script src="user/js/bootstrap.min.js"></script>
<script src="user/js/custom.js"></script>

</body>
</html>
