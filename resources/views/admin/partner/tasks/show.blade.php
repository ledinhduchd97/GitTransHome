@extends('admin.layouts.app')
@section('title','OVERVIEW')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"/>
    <link rel="stylesheet" href="{{asset('frontend-admin/libs/datepicker/jquery-ui.theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend-admin/libs/datepicker/jquery-ui.min.css')}}"/>
    <style>
        a {
            text-decoration: none !important;
        }
    </style>
@endsection
@section('content')
    <div class="acc-detail content-wrap content-wrap2" id="acc-detail">
        <div class="view-detail view-detail-wrap">
            <div class="view-detail__top">
                <div class="view-detail__top--left fleft col-50">
                    <h2 class="view-detail__title">View Detail Task to do</h2>
                </div>
                <div class="view-detail__top--right fleft col-50">
                    <div class="text-right"><span class="dashboard">Dashboard</span></div>
                </div>
                <div class="clear-fix"></div>
            </div>
            <div class="view-detail__content">
                <div class="view-detail__content--title text-center">
                    <h3>View Detail Task to do</h3>
                </div>
                <form action="">
                    <div class="view-detail__content--row">
                        <div class="text"><span>Title task :</span></div>
                        <div class="content"><span class="acc-name">{{$task->title}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Age :</span></div>
                        <div class="content"><span class="acc-email">{{$task->age}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Update :</span></div>
                        <div class="content"><span class="acc-username">{{$task->update}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>To do type :</span></div>
                        <div class="content">
                        <span class="acc-username">{{$task->type}}</span></div>
                        <div class="clear-fix"></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Date :</span></div>
                        <div class="content"><span class="acc-phone">{{$task->created_at}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Deadline :</span></div>
                        <div class="content"><span class="acc-date">{{$task->deadline}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Ranking :</span></div>
                        <div class="content"><span class="acc-address">{{$task->ranking}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Invest :</span></div>
                        <div class="content"><span class="acc-address">{{$task->invest}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Contract :</span></div>
                        <div class="content"><span class="acc-address">{{$task->contract}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Status :</span></div>
                        <div class="content"><span class="acc-address">{{$task->status}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row text-center">
                        <a class="btn-edit btn--primary padding--base"
                           href="{{route('admin.partnerTasks.edit',['id'=>$task->id])}}">Edit</a>
                        <a class="btn-cancel btn--primary padding--base" href="{{route('admin.partner.index')}}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!--.view-detail-wrap-->
    </div>
@endsection
@section('script')
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
@endsection
