

<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget">


            <h2 class="widget-title">Search</h2>
                <div class="box">
                    <form id="searchForm" method="get" action="/search">
                        <input type="checkbox" id="check">
                            <div class="search-box">
                                <input type="text" name="search" placeholder="Type here..." value="{{ isset($search) ? $search : '' }}">
                                    <label for="check" class="icon" id="searchButton" style="cursor: pointer">
                                        <button class="fa fa-search hover:shadow-lg hover:border-opacity-0 duration-200 hover:-translate-y-0.5" style="outline: none;"></button>
                                    </label>
                            </div>
                    </form>
                </div>
{{--            <form class="form-inline search-form">--}}
{{--                <div class="form-group">--}}
{{--                    <input type="text" class="form-control" placeholder="Search on the site">--}}
{{--                </div>--}}
{{--                <button type="submit" class="btn btn-primary hover:shadow-lg hover:border-opacity-0 duration-200 hover:-translate-y-0.5"><i class="fa fa-search"></i></button>--}}
{{--            </form>--}}
            </div><!-- end widget -->


        <div class="widget">
            <h2 class="widget-title">Recent Posts</h2>
            <div class="blog-list-widget">

                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="user/upload/garden_sq_09.jpg" alt="" class="img-fluid float-left">
                            <h5 class="mb-1">5 Beautiful buildings you need to before dying</h5>
                            <small>12 Jan, 2016</small>
                        </div>
                    </a>

                    <a href="" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="user/upload/garden_sq_06.jpg" alt="" class="img-fluid float-left">
                            <h5 class="mb-1">Let's make an introduction for creative life</h5>
                            <small>11 Jan, 2016</small>
                        </div>
                    </a>

                    <a href="" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 last-item justify-content-between">
                            <img src="user/upload/garden_sq_02.jpg" alt="" class="img-fluid float-left">
                            <h5 class="mb-1">Did you see the most beautiful sea in the world?</h5>
                            <small>07 Jan, 2016</small>
                        </div>
                    </a>
                </div>

            </div><!-- end blog-list -->
        </div><!-- end widget -->

        <div class="widget">
            <h2 class="widget-title">Banner</h2>

            <div class="banner-spot clearfix">
                <div class="banner-img">
                    <img src="user/upload/banner_04.jpg" alt="" class="img-fluid">
                </div>
            </div>

            <!-- end banner -->
        </div><!-- end widget -->

        <div class="widget">
            <h2 class="widget-title">Instagram Feed</h2>
            <div class="instagram-wrapper clearfix">

                <a href="#"><img src="user/upload/garden_sq_01.jpg" alt="" class="img-fluid"></a>
                <a href="#"><img src="user/upload/garden_sq_02.jpg" alt="" class="img-fluid"></a>
                <a href="#"><img src="user/upload/garden_sq_03.jpg" alt="" class="img-fluid"></a>
                <a href="#"><img src="user/upload/garden_sq_04.jpg" alt="" class="img-fluid"></a>
                <a href="#"><img src="user/upload/garden_sq_05.jpg" alt="" class="img-fluid"></a>
                <a href="#"><img src="user/upload/garden_sq_06.jpg" alt="" class="img-fluid"></a>
                <a href="#"><img src="user/upload/garden_sq_07.jpg" alt="" class="img-fluid"></a>
                <a href="#"><img src="user/upload/garden_sq_08.jpg" alt="" class="img-fluid"></a>
                <a href="#"><img src="user/upload/garden_sq_09.jpg" alt="" class="img-fluid"></a>

            </div><!-- end Instagram wrapper -->
        </div><!-- end widget -->

{{--        <di class="widget">--}}
{{--            <h2 class="widget-title">Popular Categories</h2>--}}
{{--            <div class="link-widget">--}}
{{--                <ul>--}}
{{--                    <li><a href="#">Gardening <span>(21)</span></a></li>--}}
{{--                    <li><a href="#">Outdoor Living <span>(15)</span></a></li>--}}
{{--                    <li><a href="#">Indoor Living <span>(31)</span></a></li>--}}
{{--                    <li><a href="#">Shopping Guides <span>(22)</span></a></li>--}}
{{--                    <li><a href="#">Pool Design <span>(66)</span></a></li>--}}
{{--                </ul>--}}
{{--            </div> <!-- end link-widget -->--}}
{{--        </div><!-- end widget -->--}}


    </div><!-- end sidebar -->
</div><!-- end col -->
