

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
        </div><!-- end widget -->


        <div class="widget">
            <h2 class="widget-title">Recent Posts</h2>
            <div class="blog-list-widget">



                <div class="list-group">
                    @foreach ($recentblogs as $posts)
                    <a href="" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="/uploads/post/{{$posts->image}}"/>
                            <h5 class="mb-1">{{$posts->name}}</h5>
                            <small>{{ $posts['created_at']->format('Y-m-d') }}</small>
                        </div>
                    </a>
                    @endforeach

                </div>

            </div><!-- end blog-list -->
        </div><!-- end widget -->



        <div class="widget">
            <h2 class="widget-title">Instagram Feed</h2>
            <div class="instagram-wrapper clearfix">
                <a href="#">image<img src="upload/garden_sq_01.jpg" alt="" class="img-fluid"></a>
                <a href="#">image<img src="upload/garden_sq_02.jpg" alt="" class="img-fluid"></a>
                <a href="#">image<img src="upload/garden_sq_03.jpg" alt="" class="img-fluid"></a>
                <a href="#">image<img src="upload/garden_sq_04.jpg" alt="" class="img-fluid"></a>
                <a href="#">image<img src="upload/garden_sq_05.jpg" alt="" class="img-fluid"></a>
                <a href="#">image<img src="upload/garden_sq_06.jpg" alt="" class="img-fluid"></a>
                <a href="#">image<img src="upload/garden_sq_07.jpg" alt="" class="img-fluid"></a>
                <a href="#">image<img src="upload/garden_sq_08.jpg" alt="" class="img-fluid"></a>
                <a href="#">image<img src="upload/garden_sq_09.jpg" alt="" class="img-fluid"></a>
            </div><!-- end Instagram wrapper -->
        </div><!-- end widget -->



    </div><!-- end sidebar -->
</div><!-- end col -->
