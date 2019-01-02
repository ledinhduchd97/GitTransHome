@extends('admin.layouts.app')
@section('title','Recycle')
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
    <div class="house-list content-wrap content-wrap2" id="house-list">
        <div class="house-top house-top-wrap">
            <div class="house-top__top">
                <div class="house-top__top--left fleft col-50">
                    <h2 class="house-top__title">House in Recycle</h2><a class="add-new"
                                                                         href="{{route('admin.house.create')}}">Add
                        New</a>
                </div>
                <div class="house-top__top--right fleft col-50">
                    <div class="text-right"><span class="dashboard">Dashboard</span></div>
                </div>
                <div class="clear-fix"></div>
            </div>
            <div class="house-top__content">
                <div class="house-top__content--row">
                    <div class="house-top__links">
                        <ul class="list-inline">
                            <li><a href="{{route('admin.house.index')}}"><span class="link-text">View </span><span
                                            class="link-number">({{$view}})</span></a></li>
                            <li><a href="{{route('admin.house.recycle')}}"><span
                                            class="link-text">Recycle Bin </span><span class="link-number">({{$recycle}}
                                        )</span></a></li>
                        </ul>
                    </div>
                </div>
                <form action="">
                    <div class="house-top__content--row">
                        <div class="col-25 fleft">
                            <input class="house-search padding--base border--base" type="search"
                                   placeholder="Search . . ." value="{{ request()->name }}" name="name"/>
                        </div>
                        <div class="col-25 fleft">
                            <select class="house-position padding--base border--base" id="house-position"
                                    name="site_area">
                                <option value="">---Living Area---</option>
                                <option value="500" {{ request()->site_area==500 ? "selected" : ""}}> < 500 sqft</option>
                                <option value="1000" {{ request()->site_area==1000 ? "selected" : ""}}> 500 - 1000 sqft</option>
                                <option value="5000" {{ request()->site_area==5000 ? "selected" : ""}}> 1000 - 5000 sqft</option>
                                <option value="5001" {{ request()->site_area==5001 ? "selected" : ""}}> > 5000 sqft</option>
                            </select>
                        </div>
                        <div class="col-25 fleft">
                            <select class="house-status padding--base border--base" id="house-status"
                                    name="area_gross_floor">
                                <option value="">--- Lot Size ---</option>
                                <option value="500" {{ request()->area_gross_floor==500 ? "selected" : ""}}> < 500 sqft</option>
                                <option value="1000" {{ request()->area_gross_floor==1000 ? "selected" : ""}}> 500 - 1000 sqft</option>
                                <option value="5000" {{ request()->area_gross_floor==5000 ? "selected" : ""}}> 1000 - 5000 sqft</option>
                                <option value="5001" {{ request()->area_gross_floor==5001 ? "selected" : ""}}> > 5000 sqft</option>
                            </select>
                        </div>
                        <div class="col-25 fleft">
                            <select class="house-status padding--base border--base" id="house-status" name="price">
                                <option value="">--- Price ---</option>
                                <option value="500" {{ request()->price==500 ? "selected" : ""}}> < $ 500,000</option>
                                <option value="1000" {{ request()->price==1000 ? "selected" : ""}}> $ 500,000 - $ 1,000,000</option>
                                <option value="5000" {{ request()->price==5000 ? "selected" : ""}}> $ 1,000,000 - $ 5,000,000</option>
                                <option value="5001" {{ request()->price==5001 ? "selected" : ""}}> > $ 5,000,000</option>
                            </select>
                        </div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="house-top__content--row">
                        <div class="col-25 fleft">
                            <select class="house-status padding--base border--base" id="house-status" name="status">
                                <option value="">--- Status ---</option>
                                <option value="1" {{ request()->status===1 ? "selected" : ""}}>Bought</option>
                                <option value="0" {{ request()->status===0 ? "selected" : ""}}>New</option>
                            </select>
                        </div>
                        <div class="col-25 fleft">
                            <div class="house-top__from-date date--wrap"><span>Start day</span>
                                <div class="fromDate date--wrap2 myDate"><i class="far fa-calendar-alt"></i>
                                    <input class=" padding--date border--base" id="startDay" type="date"
                                           name="start_day" value="{{ request()->start_day }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-25 fleft">
                            <div class="house-top__to-date date--wrap"><span>Finish day</span>
                                <div class="toDate date--wrap2 myDate"><i class="far fa-calendar-alt"></i>
                                    <input class=" padding--date border--base" id="endDay" type="date" name="end_day" value="{{ request()->end_day }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-25 fleft" style="text-align: center;">
                            <button type="submit" class="btn-filter btn--base padding--base border--base" type="button">
                                Filter
                            </button>
                        </div>
                        <div class="clear-fix"></div>
                    </div>
                </form>
            </div>
        </div>
        @if(session()->has('success'))
            <br/>
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        {{session()->forget('success')}}
    @endif
    <!--.house-top-wrap-->
        <div class="danhsachtk__table table--base">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Home name</th>
                    <th>Address</th>
                    <th>Living Area</th>
                    <th>Lot Size</th>
                    <th>Price</th>
                    <th>Bedroom</th>
                    <th>Bathroom</th>
                    <th>Date Submited</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
                @if(isset($houses))
                    @foreach($houses as $house)
                        <tr>
                            <td>{{$house->id}}</td>
                            <td>{{$house->name}}</td>
                            <td>{{$house->address}}</td>
                            <td>{{$house->site_area}}</td>
                            <td>{{$house->area_gross_floor}}</td>
                            <td>{{ $house->unit }} {{ $house->price }}</td>
                            <td>{{$house->number_bedroom}}</td>
                            <td>{{$house->number_bathroom}}</td>
                            <td>{{$house->created_at}}</td>
                            <td>@if($house->status == 1)
                                    Bought
                                @else
                                    New
                                @endif
                            </td>
                            <td>
                                <div class="table-icon"><a class="undo" href="#"
                                                           undo="{{route('admin.house.undo',['id'=>$house->id])}}"
                                                           data-toggle="modal" data-target="#exampleModal"><i
                                                class="fas fa-undo"></i></a>
                                    <a class="delete" delete="{{route('admin.house.destroy',$house)}}"
                                       data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-trash-alt"
                                                                                           title="Recycle"></i></a>
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
                            class="from-row">{{(($houses->currentPage() - 1 ) * $houses->perPage())+1}} </span><span>to </span><span
                            class="to-row">{{(($houses->currentPage() - 1 ) * $houses->perPage())+sizeof($houses)}} </span><span>of </span><span
                            class="title-row">{{$houses->total()}} </span><span>entries</span></p>
            </div>
            <div class="fleft col-50">
                <div class="paging text-right" style="float:right;">
                    {{$houses->links('vendor.pagination.bootstrap-4', ['paginator' => $houses])}}
                </div>
            </div>
            <div class="clear-fix"></div>
        </div>
    </div>
    <!-- Modal Undo -->
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
                    <h3>Recover house</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a id="form-undo" href="">
                        <button id="btn-undo" type="submit" class="btn btn-primary">Sure</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete -->
    <div class="modal" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-delete" action="" method="post">
                    {{ method_field('DELETE') }}
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure about this?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Delete house</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="btn-delete" type="submit" class="btn btn-primary">Sure</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".undo").click(function (event) {
                var link_undo = $(this).attr('undo');
                console.log(link_undo);
                $("#form-undo").attr('href', link_undo);
            });
            $(".delete").click(function (event) {
                var link_delete = $(this).attr('delete');
                console.log(link_delete);
                $("#form-delete").attr('action', link_delete);
            });
        });
    </script>
@endsection