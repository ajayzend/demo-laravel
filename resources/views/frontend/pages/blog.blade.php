@extends('frontend.layouts.app5')

@section('content')
        <!-- Content -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="blog">
            <h1 style="text-align: center"><strong>{{$h1}}</strong></h1>
            <hr>

            <div class="row">
                <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                    <h2 style="text-align: left"><strong>Latest Post</strong></h2>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <h2><strong>Popular Post</strong></h2>
                </div>
            </div>

            <?php
            $blogs->each(function($blog) {
                if($blog->status == 'Published'){
            ?>
            <div class="row">
                <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                    <hr>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <img class="tick"
                         src="{{ URL::asset('storage/img/blog/'.$blog->featured_image)}}" height="150px" width="100%" alt="E-visa India ">
                    </div>
                    <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                    <a href="blog/{{$blog->slug}}">{{$blog->name}}</a>
                      <?php echo substr($blog->content,0,250).'<b>...</b>'; ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <hr>
                    <a href="blog/{{$blog->slug}}">{{$blog->name}}...</a> <br>
                    Posted on {{date("M-d-Y", strtotime($blog->created_at))}}

                </div>
            </div>
            <?php } }); ?>
<br>
        </div>
    </div>
</div>
@endsection