@extends('frontend.layouts.app5')

@section('content')
        <!-- Content -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div>
            <br>
            <div class="row">
                    <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                        <h2 style="text-align: left"><strong>{{$blog->name}}</strong></h2>
                        <img class="tick"
                             src="{{ URL::asset('storage/img/blog/'.$blog->featured_image)}}" height="250px" width="100%" alt="E-visa India ">

                        <br>
                        <br>
                        <?php echo $blog->content; ?>
                    </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <h2 style="text-align: left"><strong>Popular Post</strong></h2>
                    <hr>
                    <a href="{{$blog->slug}}">{{$blog->name}} ...</a> <br>
                    Posted on {{date("M-d-Y", strtotime($blog->created_at))}}
                    <hr>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection