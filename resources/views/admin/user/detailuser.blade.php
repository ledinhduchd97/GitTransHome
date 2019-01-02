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
                    <h2 class="view-detail__title">View detail</h2>
                </div>
                <div class="view-detail__top--right fleft col-50">
                    <div class="text-right"><span class="dashboard">Dashboard</span></div>
                </div>
                <div class="clear-fix"></div>
            </div>
            <div class="view-detail__content">
                <div class="view-detail__content--title text-center">
                    <h3>Overview</h3>
                </div>
                <form action="">
                    <div class="view-detail__content--row">
                        <div class="text"><span>Full name :</span></div>
                        <div class="content"><span class="acc-name">{{$user->fullname}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Email :</span></div>
                        <div class="content"><span class="acc-email">{{$user->email}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Username :</span></div>
                        <div class="content"><span class="acc-username">{{$user->username}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Gender :</span></div>
                        <div class="content"><span class="acc-gender">@if($user->gender == 1)
                                    Male
                                @else
                                    Female
                                @endif
            </span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Phone :</span></div>
                        <div class="content"><span class="acc-phone">{{$user->phone}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Date of birth :</span></div>
                        <div class="content"><span class="acc-date">{{$user->birthday}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Address :</span></div>
                        <div class="content"><span class="acc-address">{{$user->address}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Position :</span></div>
                        <div class="content"><span class="acc-position">
                                @if($user->position == 1)
                                    Admin
                                @else
                                    Member
                                @endif</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row text-center">
                        <a class="btn-edit btn--primary padding--base"
                           href="{{route('admin.user.get_edit',['id'=>$user->id])}}">Edit</a>
                        <a class="btn-delete btn--primary padding--base" href="" data-toggle="modal"
                           data-target="#exampleModal">Delete</a>
                        <a class="btn-cancel btn--primary padding--base" href="{{route('admin.user.index')}}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!--.view-detail-wrap-->
    </div>
    <!-- Modal recycle -->
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure about this?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>Temporary Delete</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a id="form-recycle" href="{{route('admin.user.get_delete_recycle',['id'=>$user->id])}}">
                        <button type="submit" class="btn btn-primary">Sure</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
@endsection
