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
                                        <li class="customer_detail__tablinks active" onclick="messageSearch(event,'detail')">Partner details</li>
                                        <li class="customer_detail__tablinks" onclick="messageSearch(event,'note')">Note</li>
                                        <li class="customer_detail__tablinks" onclick="messageSearch(event,'task')">Task to do</li>
                                    </ul>
                                </div>
                                <div class="customer_detail__contents">
                                    <div class="customer_detail__content" id="detail">
                                        <div class="add-customer--left__item">
                                            <div class="text"><span>Full name :</span></div>
                                            <div class="content"><span>{{ $partner->fullname }}</span></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="add-customer--left__item">
                                            <div class="text"><span>Date of birth :</span></div>
                                            <div class="content"><span>{{ $partner->date_of_birth }}</span></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="add-customer--left__item">
                                            <div class="text"><span>Email :</span></div>
                                            <div class="content"><span>{{ $partner->email }}</span></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="add-customer--left__item">
                                            <div class="text"><span>Phone :</span></div>
                                            <div class="content"><span>{{ $partner->phone }}</span></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="add-customer--left__item">
                                            <div class="text"><span>Address :</span></div>
                                            <div class="content"><span>{{ $partner->address }}</span></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="add-customer--left__item">
                                            <div class="text"><span>Date of foundation :</span></div>
                                            <div class="content"><span>{{ $partner->created_at }}</span></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="add-customer--left__item">
                                            <div class="text"><span>Partner type :</span></div>
                                            <div class="content"><span>{{ $partner->partner_type }}</span></div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        
                                        <div class="add-customer--left__item text-center">
                                            <a class="btn--edit btn--primary padding--base" href="{{ route('admin.partner.edit', ['partner' => $partner->id]) }}">Edit</a>
                                            <a class="btn--primary padding--base btn--cancel" href="{{ route('admin.partner.index') }}">Cancel</a>
                                            <div class="clear-fix"></div>
                                        </div>
                                    </div>
                                    <div class="disable customer_detail__content" id="note" style="display: none;">
                                        <div class="note__top">
                                            <div class="tk-top tk-top-wrap">
                                                <div class="tk-top__top">
                                                    <div class="tk-top__top--left fleft col-50">
                                                        <h2 class="tk-top__title"></h2><a class="add-new add-note" style="color: #fff;">Add new</a>
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
                                                                    <input class="customer_search padding--base border--base" id="partner_search" type="search" name="customer_search" placeholder="Search keywords ..."/>
                                                                </div>
                                                                <div class="col-25 fleft">
                                                                    <div class="tk-top__from-date date--wrap"><span>Start day</span>
                                                                        <div class="fromDate date--wrap2 myDate"><i class="far fa-calendar-alt"></i>
                                                                            <input class="padding--base border--base padding--date" id="startDay_partner" type="date"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-25 fleft">
                                                                    <div class="tk-top__to-date date--wrap"><span>Finish day</span>
                                                                        <div class="toDate date--wrap2 myDate"><i class="far fa-calendar-alt"></i>
                                                                            <input class="padding--base border--base padding--date" id="endDay_partner" type="date"/>
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
                                                    @if(isset($partner->partner_note))
                                                        @foreach($partner->partner_note as $note)
                                                            <div class="detail-note">
                                                                <span>{{$note->created_at}} - {!!$note->content!!}   </span><i class="fas fa-trash-alt trash" id_note="{{$note->id}}"></i>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="disable customer_detail__content" id="task" style="display: none;">
                                        <div class="task_todo__top">
                                            <div class="tk-top tk-top-wrap">
                                                <div class="tk-top__top">
                                                    <div class="tk-top__top--left fleft col-50">
                                                        <h2 class="tk-top__title"></h2><a class="add-new" href="{{ route('admin.partnerTasks.create', ['partner_id' => $partner->id]) }}">Add new</a>
                                                    </div>
                                                    <div class="tk-top__top--right fleft col-50">
                                                        <div class="text-right disabled"><span class="dashboard">Dashboard</span></div>
                                                    </div>
                                                    <div class="clear-fix"></div>
                                                </div>
                                                <div class="tk-top__content">
                                                    <div class="tk-top__content--row">
                                                        <div class="tk-top__links">
                                                            <ul class="list-inline">
                                                                <li><a href="#"><span class="link-text">View </span><span class="link-number">(10)</span></a></li>
                                                                <li><a href="#"><span class="link-text">Recycle Bin </span><span class="link-number">(2)</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="tk-top__content--row">
                                                        <div class="tk-top__options">
                                                            <form action="{{ route('admin.partner.show', ['partner' => $partner->id]) }}">
                                                                <div class="col2 fleft">
                                                                    <input class="customer_search padding--base border--base" id="customer_search" type="search" name="customer_search" placeholder="Search keywords ..."/>
                                                                </div>
                                                                <div class="col2 fleft">
                                                                    <select class="customer-status padding--base border--base" id="customer-status" name="status">
                                                                        <option value="">--- Status ---</option>
                                                                        <option value="1">Done</option>
                                                                        <option value="0">Waiting</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-25 fleft">
                                                                    <div class="tk-top__from-date date--wrap"><span>Start day</span>
                                                                        <div class="fromDate date--wrap2 myDate"><i class="far fa-calendar-alt"></i>
                                                                            <input class="padding--base border--base padding--date" id="startDay" type="date" name="date_from"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-25 fleft">
                                                                    <div class="tk-top__to-date date--wrap"><span>Finish day</span>
                                                                        <div class="toDate date--wrap2 myDate"><i class="far fa-calendar-alt"></i>
                                                                            <input class="padding--base border--base padding--date" id="endDay" type="date" name="date_to"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col1 fleft">
                                                                    <button class="btn-filter btn--base padding--base border--base" type="submit">Filter</button>
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
                                                <p>Total : <span>{{ $tasks->count() }} entries</span></p>
                                            </div>
                                            <table>
                                                <tr>
                                                    <th>Title task</th>
                                                    <th>Age</th>
                                                    <th>Update</th>
                                                    <th>To do Type</th>
                                                    <th>Deadline</th>
                                                    <th>Ranking</th>
                                                    <th>Status</th>
                                                    <th>Options</th>
                                                </tr>
                                                @foreach($tasks as $task)
                                                <tr>
                                                    <td>
                                                        <p>{{$task->title}}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $task->age }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $task->update }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $task->type }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $task->deadline }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $task->ranking}}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $task->status }}</p>
                                                    </td>
                                                    <td>
                                                        <div class="table-icon">
                                                            <a href="{{ route('admin.partnerTasks.show', ['id' => $task->id]) }}"><i class="far fa-eye"></i></a>
                                                            <a class="recycle" href="#" data-url="{{ route('admin.partnerTasks.destroy', ['id' => $task->id]) }}" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash-alt"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                        <div class="customer_list__bottom table-bot" style="float: right;">
                                            <div class="paging text-right">
                                                {{ $tasks->links('vendor.pagination.bootstrap-4', ['paginator' => $tasks]) }}
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
                        <button type="submit" class="btn btn-primary btn--yes">Sure</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
    <script>
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
                url: '{{route('admin.partnernote.delete')}}',
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
                    url: '{{route('admin.partnernote.delete')}}',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {id: data},
                });   
            });
        }
        // search note
        $("#filter_search").click(function(event) {
            event.preventDefault();
            var keyword = $("#partner_search").val();
            var  start_day = $("#startDay_partner").val();
            var end_day = $("#endDay_partner").val();
            var url = window.location.href;
            param = url.split("/");
            var id_param = param.slice(-1).pop();
            $.ajax({
                url: '{{route('admin.partnernote.search')}}',
                type: 'POST',
                dataType: 'JSON',
                data: 
                { 
                    keyword : keyword ,
                    start_day : start_day,
                    end_day : end_day,
                    partner_id : id_param
                },
                success: function (data){
                    if(typeof data != "object"){
                        data = JSON.parse(data);
                    }
                    $("#partner-notifi").html("");
                    /*console.log(data);*/
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
            // var data = $("#new-note").val();
            var data = getDataFromTheEditor();
            var param = [];
            var url = window.location.href;
            param = url.split("/");
            var id_param = param.slice(-1).pop();
            console.log(id_param);
            console.log(data);
            $.ajax({
                url: '{{route('admin.partnernote.store')}}',
                type: 'POST',
                dataType: 'JSON',
                data: 
                { 
                    content: data ,
                    partner_id: id_param
                },
                success: function (data){
                    if(typeof data != "object"){
                        data = JSON.parse(data);
                    }
                    $("#partner-notifi").html("");
                    /*console.log(data);*/
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

        $('.recycle').click(function (event) {
            var link_recycle = $(this).data('url');
            $("#delete-form").attr('action', link_recycle);
        });
    </script>
@endsection
