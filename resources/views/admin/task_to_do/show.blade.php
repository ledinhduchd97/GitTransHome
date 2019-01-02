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
                    <h2 class="view-detail__title">Details task to do</h2>
                </div>
                <div class="view-detail__top--right fleft col-50">
                    <div class="text-right"><span class="dashboard">Dashboard</span></div>
                </div>
                <div class="clear-fix"></div>
            </div>
            <div class="view-detail__content">
                <div class="view-detail__content--title text-center">
                    <!-- <h3>Details task to do</h3> -->
                </div>
                <form action="">
                    <div class="view-detail__content--row">
                        <div class="text"><span>Age :</span></div>
                        <div class="content"><span class="acc-phone">{{$task->age}} days</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Title task :</span></div>
                        <div class="content"><span class="acc-name">{{$task->title}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>First Name :</span></div>
                        <div class="content"><span class="acc-email">{{$task->customer->first_name}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Last Name :</span></div>
                        <div class="content"><span class="acc-email">{{$task->customer->last_name}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Birthday :</span></div>
                        <div class="content"><span class="acc-email">{{$task->customer->birthday}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Client Type :</span></div>
                        <div class="content"><span class="acc-email">{{$task->customer->type}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>To do Type :</span></div>
                        <div class="content"><span class="acc-username">{{$task->to_do_type}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text">
                            <span>Start task on</span>
                        </div>
                        <div class="content">
                            <span>
                                {{ $task->start_task }}
                            </span>
                        </div>
                        <div class="clear-fix"></div>
                    </div>
                    
                    
                    <div class="view-detail__content--row">
                        <div class="text"><span>Time :</span></div>
                        <div class="content"><span class="acc-date">{{ $task->deadline }}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Note :</span></div>
                        <div class="content"><span class="acc-address">{!!$task->note!!}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Ranking :</span></div>
                        <div class="content"><span class="acc-address">{{$task->ranking}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Status :</span></div>
                        <div class="content"><span class="acc-address">{{$task->status}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row">
                        <div class="text"><span>Assigned to :</span></div>
                        <div class="content"><span class="acc-address">{{$task->assigned}}</span></div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="view-detail__content--row text-center">
                        <a class="btn-edit btn--primary padding--base"
                           href="{{route('admin.tasks.edit',['id'=>$task->id])}}">Edit</a>
                        <a class="btn-delete btn--primary padding--base" class="recycle" data-url="{{ route('admin.tasks.destroy', ['id' => $task->id]) }}" data-toggle="modal"
                           data-target="#exampleModal">Delete</a>
                        <a class="btn-cancel btn--primary padding--base" href="{{route('admin.tasks.index')}}">Cancel</a>
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
                    <h3>Are you sure want to delete ?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form id="delete-form" action="" method="POST">
                        {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <button type="submit" class="btn btn-primary">Sure</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script>
        $('.recycle').click(function (event) {
            var link_recycle = $(this).data('url');
            var modalID = $(this).data('target');
            $("#delete-form").attr('action', link_recycle);
        });
    </script>
@endsection
