@extends('layouts.frontend')

@section('content')
<!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common inner-page-top-margin" data-bg-image="{{asset('frontend_assets/img/figure/figure1.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>Standard Grid News</h1>
                            <ul>
                                <li>
                                    <a href="https://iconmedicalbd.com/">Home</a>
                                </li>
                                <li>News</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
        <!-- Blog Grid Area Start Here -->
        <section class="blog-wrap-layout2 bg-light-primary100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-12">
                        <div class="row">
                            @foreach($all_news as $news)
                            <div class="single-item col-md-6 col-sm-12 col-12">
                                <div class="blog-box-layout4">
                                    <div class="item-img">
                                        <a href="single-news.html">
                                            <img src="{{asset('uploads/blog/')}}/{{$news->blog_photo?? ''}}" class="img-fluid" alt="blog">
                                        </a>
                                        <div class="post-date">22
                                            <span>June</span>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">
                                            <a href="{{url('latest_news')}}/{{$news->id}}">{{$news->blog_title?? ''}}</a>
                                        </h3>
                                        <p>
                                        </p>
                                        <div class="post-actions-wrapper">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="flaticon-people"></i>by
                                                        <span>admin</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="flaticon-interface"></i>{{App\Blogcomment::where('blog_id',$news->id?? '')->count()}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <ul class="pagination-layout1 margin-t-20">
                            <li>
                                <a href="#">Previous</a>
                            </li>
                            <li class="active">
                                <a href="#">1</a>
                            </li>
                            <li>
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#">Next</a>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-widget-area sidebar-break-md col-xl-3 col-lg-4 col-12">
                        <div class="widget widget-search">
                            <h3 class="section-title title-bar-primary">Search Keywords</h3>
                            <div class="input-group stylish-input-group">
                                <input type="text" class="form-control" placeholder="Search Here . . .">
                                <span class="input-group-addon">
                                    <button type="submit">
                                        <span class="flaticon-search" aria-hidden="true"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="widget widget-categories">
                            <h3 class="section-title title-bar-primary">Departments</h3>
                            <ul>
                                @foreach($department as $dept)
                                <li>
                                    <a href="{{url('single_department')}}/{{$dept->id}}">{{$dept->department_name}}
                                        <span>{{App\Doctor::where('department',$dept->id)->count()}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                       
                        <div class="widget widget-tag">
                            <h3 class="section-title title-bar-primary">Tags</h3>
                            <ul>
                                <li>
                                    <a href="#">Dental</a>
                                </li>
                                <li>
                                    <a href="#">Eye Care</a>
                                </li>
                                <li>
                                    <a href="#">Labrotary</a>
                                </li>
                                <li>
                                    <a href="#">Care</a>
                                </li>
                                <li>
                                    <a href="#">Health</a>
                                </li>
                                <li>
                                    <a href="#">Modern Clinic</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Grid Area End Here -->
@endsection