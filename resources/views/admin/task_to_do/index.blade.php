@extends('admin.layouts.app')
@section('title','Tasks to do')
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
    <div class="danhsachtk content-wrap content-wrap2" id="danhsachtk">
        <div class="tk-top tk-top-wrap">
            <div class="tk-top__top">
                <div class="tk-top__top--left fleft col-50">
                    <h2 class="tk-top__title">Tasks to do</h2>
                    <a class="add-new" href="{{route('admin.tasks.create')}}">Add new</a>
                </div>
                <div class="tk-top__top--right fleft col-50">
                    <div class="text-right"><span class="dashboard">Dashboard</span></div>
                </div>
                <div class="clear-fix"></div>
            </div>
            <div class="tk-top__content">
                <div class="tk-top__content--row">
                    <div class="tk-top__links">
                        <ul class="list-inline">
                            <li><a href="{{route('admin.tasks.index')}}"><span class="link-text">View </span><span
                                        class="link-number">({{ $view }})</span></a></li>
                            <li><a href="{{route('admin.tasks.recycle')}}"><span class="link-text">Recycle Bin </span><span
                                            class="link-number">({{ $recycle }})</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="tk-top__content--row">
                    <div class="tk-top__options">
                        <form action="" method="get">
                            <div class="col2 fleft">
                                <input class="tk-position padding--base border--base" type="text" name="keyword"
                                       placeholder="Search keywords" value="{{ request()->keyword }}">
                            </div>
                            <div class="col2 fleft">
                                <select class="tk-status padding--base border--base" id="tk-status" name="status">
                                    <option value="">--- Status ---</option>
                                    <option value="0">Waiting</option>
                                    <option value="1">Done</option>
                                </select>
                            </div>
                            <!-- <div class="col-25 fleft">
                                <div class="tk-top__from-date date--wrap"><span>Start day</span>
                                    <div class="fromDate date--wrap2 myDate"><i class="far fa-calendar-alt"></i>
                                        <input class="myDatePicker padding--base border--base" type="text"
                                               name="date_from" style="max-width: 95%;" autocomplete="off" data-date-format="mm-dd-yyyy" value="{{ request()->date_from }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-25 fleft">
                                <div class="tk-top__to-date date--wrap"><span>Finish day</span>
                                    <div class="toDate date--wrap2 myDate"><i class="far fa-calendar-alt"></i>
                                        <input class="myDatePicker padding--base border--base" type="text"
                                               name="date_to" style="max-width: 95%;" autocomplete="off" data-date-format="mm-dd-yyyy" value="{{ request()->date_to }}"/>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-25 fleft">
                                <div class="tk-top__from-date date--wrap"><span>Start day</span>
                                    <div class="fromDate date--wrap2 myDate"><i class="far fa-calendar-alt"></i>
                                        <input class="padding--base border--base" type="date"
                                               name="date_from" style="max-width: 95%;" autocomplete="off" data-date-format="mm-dd-yyyy" value="{{ request()->date_from }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-25 fleft">
                                <div class="tk-top__to-date date--wrap"><span>Finish day</span>
                                    <div class="toDate date--wrap2 myDate"><i class="far fa-calendar-alt"></i>
                                        <input class="padding--base border--base" type="date"
                                               name="date_to" style="max-width: 95%;" autocomplete="off" data-date-format="mm-dd-yyyy" value="{{ request()->date_to }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col1 fleft">
                                <button class="btn-filter btn--base padding--base border--base" type="submit">Filter
                                </button>
                            </div>
                            <div class="clear-fix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(session()->has('success'))
        <br/>
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
            {{session()->forget('success')}}
        @endif
        <!--.tk-top-wrap-->
        <div class="danhsachtk__table table--base">
            <div class="fright total">
                <p>Total : 
                    <span>{{$view}}</span>
                </p>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Age</th>
                    <th>Tittle task</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birthday</th>
                    <th>Client Type</th>
                    <th>To do Type</th>
                    <th>Start task</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
                @if(isset($tasks))
                    @foreach($tasks as $key => $task)
                        <tr>
                            <td>
                                <p>{{(($tasks->currentPage()-1)* $tasks->perPage()) + ($key+1)}}</p>
                            </td>
                            <td>
                                <p class="name">{{ $task->age }} days</p>
                            </td>
                            <td>
                                <p class="name">{{ $task->title }}</p>
                            </td>            
                            <td>
                                <p>{{ $task->customer->first_name }}</p>
                            </td>
                            <td>
                                <p>{{ $task->customer->last_name }}</p>
                            </td>
                            <td>
                                <p>{{ $task->customer->birthday }}</p>
                            </td>
                            <td>
                                <p>{{ $task->customer->type }}</p>
                            </td>
                            <td>
                                <p>{{ $task->to_do_type }}</p>
                            </td>
                            <td>
                                <p>{{ $task->start_task }}</p>
                            </td>
                            <td>
                                <p>{{ $task->deadline }}</p>
                            </td>
                            <td>
                                <p>{{ $task->status }}</p>
                            </td>
                            <td>
                                <div class="table-icon"><a href="{{ route('admin.tasks.show', ['id' => $task->id]) }}"><i
                                                class="far fa-eye" title="Detail"></i></a>
                                    <a class="recycle" data-url="{{ route('admin.tasks.destroy', ['id' => $task->id]) }}"
                                       data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-trash-alt" title="Recycle"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
        <div class="danhsachtk__bottom table-bot">

            <div class="fleft col-50">
                <p class="text"><span>Showing </span><span
                            class="from-row">{{(($tasks->currentPage() - 1 ) * $tasks->perPage())+1}} </span><span>to </span><span
                            class="to-row">{{(($tasks->currentPage() - 1 ) * $tasks->perPage())+sizeof($tasks)}} </span><span>of </span><span
                            class="title-row">{{$tasks->total()}} </span><span>entries</span></p>
            </div>
            <div class="fleft col-30" style="float: right;">
                <div class="paging text-right">
                    {{ $tasks->links('vendor.pagination.bootstrap-4', ['paginator' => $tasks]) }}
                </div>
            </div>
            <div class="clear-fix"></div>
        </div>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.recycle').click(function (event) {
                var link_recycle = $(this).data('url');
                var modalID = $(this).data('target');
                $("#delete-form").attr('action', link_recycle);
            });

        });
    </script>
@endsection
