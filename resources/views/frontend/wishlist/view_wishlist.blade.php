@extends('frontend.main_master')
@section('content')

@section('title')
    {{ trans('site.wishlistpage') }}
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">{{ trans('site.home') }}</a></li>
                <li class='active'>{{ trans('site.wishlist') }}</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="my-wishlist-page">
            <div class="row">
                <div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="4" class="heading-title">{{ trans('site.MyWishlist') }}</th>
                            </tr>
                            </thead>
                            <tbody id="wishlist">


                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->


        <br>
        @include('frontend.body.brands')
    </div>


@endsection
