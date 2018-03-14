@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('navs.general.home'))

@section('content')

    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Home
                    <small>All Post</small>
                </h1>

                @foreach($posts as $post)
                    <!-- Blog Post -->
                        <div class="card mb-4">
                            <img class="card-img-top" src="{{URL::asset($post->ava_path)}}" alt="Card image cap">
                            <div class="card-body">
                                <h2 class="card-title">{{$post->title}}</h2>
                                <p class="card-text">
                                    {!!  $post->content !!}
                                </p>
                                <a href="#" class="btn btn-primary">Read More &rarr;</a>
                            </div>
                            <div class="card-footer text-muted">
                                Posted on {{$post->created_at->format('H:i:s d-m-Y')}} by
                                <a href="#">{{$post->user->name}}</a>
                            </div>
                        </div>
                @endforeach


                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    {!! $posts->render() !!}
                </ul>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                {{--<div class="card my-4">--}}
                    {{--<h5 class="card-header">Search</h5>--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="input-group">--}}
                            {{--<input type="text" class="form-control" placeholder="Search for...">--}}
                            {{--<span class="input-group-btn">--}}
                  {{--<button class="btn btn-secondary" type="button">Go!</button>--}}
                {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    @foreach($categoris as $key => $category)
                                    <li>
                                        <a href="#">{{$category->title}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                {{--<div class="card my-4">--}}
                    {{--<h5 class="card-header">Side Widget</h5>--}}
                    {{--<div class="card-body">--}}
                        {{--You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>

        </div>
        <!-- /.row -->
    </div>
@endsection
