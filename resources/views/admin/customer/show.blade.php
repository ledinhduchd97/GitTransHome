@extends('admin.layouts.app')
@section('title','Detail')
@section('css')
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
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
    <div class="customer_detail content-wrap content-wrap2" id="customer_detail">
        <div class="add-customer add-customer-wrap">
            <div class="add-customer__top">
                <h2 class="add-customer__top--title"></h2>
            </div>
            <div class="add-customer__main">
                <div class="add-customer--left fleft">
                    <div class="add-customer--padding">
                        <div class="add-customer--left__content">
                            <form id="house_infor" action="#">
                                <div class="add-customer--left__title">
                                    <ul class="list-inline">
                                        <li class="customer_detail__tablinks btn-details active" onclick="messageSearch(event,'detail')">Customer details</li>
                                        <li class="customer_detail__tablinks btn-note-customer" onclick="messageSearch(event,'note')">Note</li>
                                        <li class="customer_detail__tablinks btn-tasktodo" onclick="messageSearch(event,'task')">Task to do</li>
                                    </ul>
                                </div>
                                <div class="customer_detail__contents">
                                    <div class="customer_detail__content" id="detail">
                                        <p style="display: none;" id="customer-id-hidden">{{ $customer->id }}</p>
                                        <div class="add-customer--left__item">
                                            <div class="text"><span>First name :</span></div>
                                            <div class="content"><span>{{ $customer->first_name }}</span></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="add-customer--left__item">
                                            <div class="text"><span>Last name :</span></div>
                                            <div class="content"><span>{{ $customer->last_name }}</span></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="add-customer--left__item">
                                            <div class="text"><span>Date of birth :</span></div>
                                            <div class="content"><span>{{ $customer->birthday }}</span></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="add-customer--left__item">
                                            <div class="text"><span>Email :</span></div>
                                            <div class="content"><span>{{ $customer->email }}</span></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="add-customer--left__item">
                                            <div class="text"><span>Phone :</span></div>
                                            <div class="content"><span>{{ $customer->phone }}</span></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="add-customer--left__item">
                                            <div class="text"><span>Address :</span></div>
                                            <div class="content"><span>{{ $customer->address }}</span></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="add-customer--left__item">
                                            <div class="text"><span>Client Type :</span></div>
                                            <div class="content"><span class="type2">{{ $customer->type }}</span></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="add-customer--left__item text-center">
                                            <a class="btn--edit btn--primary padding--base" href="{{ route('admin.customers.edit', ['customer' => $customer->id]) }}">Edit</a>
                                            <a class="btn--primary padding--base btn--cancel" href="{{ route('admin.customers.index') }}">Cancel</a>
                                            <div class="clear-fix"></div>
                                        </div>
                                    </div>
                                    <div class="disable customer_detail__content" id="note" style="display: none;">
                                        <div class="note__top">
                                            <div class="tk-top tk-top-wrap">
                                                <div class="tk-top__top">
                                                    <div class="tk-top__top--left fleft col-50">
                                                        <h2 class="tk-top__title add-new-btn"></h2><a class="add-new add-note" style="color: #fff; cursor: pointer;">Add new</a>
                                                    </div>
                                                    <div class="tk-top__top--right fleft col-50">
                                                        <div class="text-right disabled"><span class="dashboard">Dashboard</span></div>
                                                    </div>
                                                    <div class="clear-fix"></div>
                                                </div>
                                                <div class="tk-top__content">
                                                    <div class="tk-top__content--row">
                                                        <div class="tk-top__options">
                                                            <form action="">
                                                                <div class="col2 fleft">
                                                                    <input class="customer_search padding--base border--base" id="ct_search" type="search" name="customer_search" placeholder="Search keywords ..."/>
                                                                </div>
                                                                <div class="col-25 fleft">
                                                                    <div class="tk-top__from-date date--wrap"><span>Start day</span>
                                                                        <div class="fromDate date--wrap2 myDate"><i class="far fa-calendar-alt"></i>
                                                                            <input class="padding--base border--base padding--date" id="startDay_customer" type="date" date="from"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-25 fleft">
                                                                    <div class="tk-top__to-date date--wrap"><span>Finish day</span>
                                                                        <div class="toDate date--wrap2 myDate"><i class="far fa-calendar-alt"></i>
                                                                            <input class="padding--base border--base padding--date" id="endDay_customer" type="date" date="to"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col1 fleft">
                                                                    <button class="btn-filter btn--base padding--base border--base" type="button" id="filter_search">Filter</button>
                                                                </div>
                                                                <div class="clear-fix"></div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <!--.tk-top-wrap-->
                                        </div>
                                        <div class="note__content">
                                            <h4>New Note</h4>
                                            <div class="textbox__note" style="margin-bottom: 30px;">
                                                <textarea id="new-note" name="new-note" cols="30" rows="10" maxlength="250"></textarea>
                                            </div>
                                            <div class="textbox__note" style="border: 1px solid #000">
                                                <div id="partner-notifi" cols="30" rows="10" style="padding: 20px 20px;">
                                                    @if(isset($customer->customer_note))
                                                        @foreach($customer->customer_note as $note)
                                                            <div class="detail-note">
                                                                <span>{{$note->created_at}} - {!!$note->content!!}   </span><i class="fas fa-trash-alt trash" id_note="{{$note->id}}"></i>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="disable customer_detail__content" id="task" style="display: none">
                                        <div class="task_todo__top">
                                            <div class="tk-top tk-top-wrap">
                                                <div class="tk-top__top">
                                                    <div class="tk-top__top--left fleft col-50">
                                                        <h2 class="tk-top__title"></h2><a class="add-new" href="{{ route('admin.customerTasks.create', ['customer_id' => $customer->id]) }}">Add new</a>
                                                    </div>
                                                    <div class="tk-top__top--right fleft col-50">
                                                        <div class="text-right disabled"><span class="dashboard">Dashboard</span></div>
                                                    </div>
                                                    <div class="clear-fix"></div>
                                                </div>
                                                <div class="tk-top__content">
                                                    <div class="tk-top__content--row">
                                                        <div class="tk-top__options">
                                                            <form action="{{ route('admin.customers.show', ['id' => $customer->id]) }}">
                                                                <div class="col2 fleft">
                                                                    <input class="customer_search padding--base border--base keyword-search-task" id="customer_search" type="search" name="customer_search" placeholder="Search keywords ..." value="{{request()->customer_search}}" />
                                                                </div>
                                                                <div class="col2 fleft">
                                                                    <select class="customer-status padding--base border--base status-search-task" id="customer-status" name="status">
                                                                        <option value="">--- Status ---</option>
                                                                        <option {{ request()->status == '0' ? 'selected' : '' }}  value="0">Done</option>
                                                                        <option {{ request()->status == '1' ? 'selected' : '' }} value="1">Waiting</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-25 fleft">
                                                                    <div class="tk-top__from-date date--wrap"><span>Start day</span>
                                                                        <div class="fromDate date--wrap2 myDate"><i class="far fa-calendar-alt"></i>
                                                                            <input class="padding--base border--base padding--date start-search-task" id="startDay" type="date" name="date_from" value="{{request()->date_from}}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-25 fleft">
                                                                    <div class="tk-top__to-date date--wrap"><span>Finish day</span>
                                                                        <div class="toDate date--wrap2 myDate"><i class="far fa-calendar-alt"></i>
                                                                            <input class="padding--base border--base padding--date end-search-task" id="endDay" type="date" name="date_to" value="{{request()->date_to}}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col1 fleft">
                                                                    <button class="btn-filter btn--base padding--base border--base" id="btn-search-task" type="submit">Filter</button>
                                                                </div>
                                                                <div class="clear-fix"></div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    @if(session()->has('success'))
                                                    <div class="alert alert-success text-center">
                                                        {{ session('success')}}
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--.tk-top-wrap-->
                                        </div>
                                        <div class="task_todo__content table--base">
                                            <div class="fright total">
                                                <p>Total : <span>{{ $count }} entries</span></p>
                                            </div>
                                            <table>
                                                <tr>
                                                    <th>Title task</th>
                                                    <th>To do Type</th>
                                                    <th>Deadline</th>
                                                    <th>Ranking</th>
                                                    <th>Note</th>
                                                    <th>Status</th>
                                                    <th>Options</th>
                                                </tr>
                                                @foreach($tasks as $task)
                                                <tr>
                                                    <td>
                                                        <input type="text" class="inputonly" readonly value="{{$task->title}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputonly" readonly value="{{$task->type}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputonly" readonly value="{{$task->deadline}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputonly" readonly value="{{$task->ranking}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputonly" readonly value="{{$task->note}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputonly" readonly value="{{$task->status}}">
                                                    </td>
                                                    <td>
                                                        <div class="table-icon">
                                                            <a href="{{ route('admin.customerTasks.show', ['id' => $task->id]) }}"><i class="far fa-eye"></i></a>
                                                            <a class="recycle" href="#" data-url="{{ route('admin.customerTasks.destroy', ['id' => $task->id]) }}" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash-alt"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
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
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clear-fix"></div>
            </div>
        </div>
    </div>
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content popup--content">
                <div class="modal-header popup--header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Are you sure about this?</h5> -->
                    <button type="button" class="close btn--close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body popup--body text-center">
                    <h3>Are you sure to delete this row?</h3>
                </div>
                <div class="modal-footer popup--footer text-center">
                    <button type="button" class="btn btn-secondary btn--no" data-dismiss="modal">No</button>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
    <script type="text/javascript">
        let theEditor;
        ClassicEditor
          .create(document.querySelector('#new-note'))
          .then(editor => {
            theEditor = editor;

          })
          .catch(error => {
            console.error(error);
          });
        function getDataFromTheEditor() {
          return theEditor.getData();
        }
        var url = window.location.href;
        var count = url.split("?").length;
        console.log(count);
        if(count > 1)
        {
          $(".list-inline li").removeClass('active');
          $(".btn-tasktodo").addClass('active');
          $("#detail").css('display', 'none');
          $("#task").css('display', 'block');
        }
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Xóa note
        $(".trash").click(function(event) {
            var data = $(this).attr('id_note');
            $(this).closest('.detail-note').remove();
            console.log(data);
            $.ajax({
                url: '{{route('admin.customernote.delete')}}',
                type: 'POST',
                dataType: 'JSON',
                data: {id: data},
            });
            
        });
        // Hàm callback
        var trash = function() {
            $(".trash").click(function(event) {
                var data = $(this).attr('id_note');
                $(this).closest('.detail-note').remove();
                console.log(data);
                $.ajax({
                    url: '{{route('admin.customernote.delete')}}',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {id: data},
                });   
            });
        }
        // search note
        $("#filter_search").click(function(event) {
            event.preventDefault();
            var keyword = $("#ct_search").val();
            var  start_day = $("#startDay_customer").val();
            var end_day = $("#endDay_customer").val();
            var id_param = $("#customer-id-hidden").text();
            $.ajax({
                url: '{{route('admin.customernote.search')}}',
                type: 'POST',
                dataType: 'JSON',
                data: 
                { 
                    keyword : keyword ,
                    start_day : start_day,
                    end_day : end_day,
                    customer_id : id_param
                },
                success: function (data){
                    if(typeof data != "object"){
                        data = JSON.parse(data);
                    }
                    $("#partner-notifi").html("");
                    $.each(data, function(index, val) {
                        $("#partner-notifi").append(`
                            <!-- item -->
                               <div class="detail-note">
                                    <span>${data[index].created_at} - ${data[index].content}    </span><i class="fas fa-trash-alt trash" id_note="${data[index].id}"></i>
                                </div>
                            <!-- enditem -->
                        `)
                    }); 
                    trash();
                },
            }); 

        });
        // ajax thêm note 
        $(".add-note").click(function(event) {
            var data = getDataFromTheEditor();
            var id_param = $("#customer-id-hidden").text();
            console.log(id_param);
            $.ajax({
                url: '{{route('admin.customernote.store')}}',
                type: 'POST',
                dataType: 'JSON',
                data: 
                { 
                    content: data ,
                    customer_id: id_param
                },
                success: function (data){
                    if(typeof data != "object"){
                        data = JSON.parse(data);
                    }
                    $("#partner-notifi").html("");
                    $.each(data, function(index, val) {
                        $("#partner-notifi").append(`
                            <!-- item -->
                               <div class="detail-note">
                                    <span>${data[index].created_at} : </span> <span> ${data[index].content}    </span><span><i class="fas fa-trash-alt trash" id_note="${data[index].id}"></span></i>
                                </div>
                            <!-- enditem -->
                        `)
                    }); 
                    trash();
                },
            });        
        });

        $('.recycle').click(function (event) {
            var link_recycle = $(this).data('url');
            $("#delete-form").attr('action', link_recycle);
        });
    </script>
@endsection
