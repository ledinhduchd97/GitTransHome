@extends('admin.layouts.app')
@section('title','Edit')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"/>
    <link rel="stylesheet" href="{{asset('frontend-admin/libs/datepicker/jquery-ui.theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend-admin/libs/datepicker/jquery-ui.min.css')}}"/>
@endsection
@section('content')
    <div class="customer_edit content-wrap content-wrap2" id="customer_edit">
        <div class="add-customer add-customer-wrap">
            <div class="add-customer__top">
                <h2 class="add-customer__top--title">Edit Task</h2>
            </div>

            <div class="add-customer__main">
                <div class="add-customer--left fleft">
                    <div class="add-customer--padding">
                        <div class="add-customer--left__content">

                            <form id="house_infor" action="{{ route('admin.partnerTasks.update', ['id' => $task->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="add-customer--left__title">
                                    <h3>Edit Task</h3>
                                </div>
                                <div class="message-adduser" style="text-align: center;">
                                    <p class="text-success">
                                        {{--{{ dd(session()->all()) }}--}}
                                        {{ session()->has('success') ? session('success') : "" }}
                                    </p>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Title task:</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="text" name="title" value="{{ $task->title }}" required="required" />
                                        @if($errors->has('title'))
                                            <p class="text-danger">{{ $errors->first('title') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Age :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="number" name="age" value="{{ $task->age }}" required="required" patter="^[0-9]*$"/>
                                        @if($errors->has('age'))
                                            <p class="text-danger">{{ $errors->first('age') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Update :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="number" value="{{ $task->update }}" name="update" required="required" patter="^[0-9]*$"/>
                                        @if($errors->has('update'))
                                            <p class="text-danger">{{ $errors->first('update') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>To do type :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="text" name="type"  value="{{ $task->type }}" required="required" />
                                        @if($errors->has('type'))
                                            <p class="text-danger">{{ $errors->first('type') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Date :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="date" name="created_at" value="{{ getDateFromDateTime($task->created_at) }}" required="required" readonly/>
                                        @if($errors->has('created_at'))
                                            <p class="text-danger">{{ $errors->first('created_at') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Deadline :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="date" name="deadline" value="{{ getDateFromDateTime($task->deadline) }}" required="required"/>
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Ranking :</span></div>
                                    <div class="content">
                                        <select class="border--base padding--base" name="ranking" id="ranking">
                                            <option value="0" {{ $task->ranking=="Low" ? "selected": ""}}>Low</option>
                                            <option value="1" {{ $task->ranking=="High" ? "selected" : ""}}>High</option>
                                        </select>
                                        @if($errors->has('ranking'))
                                            <p class="text-danger">{{ $errors->first('ranking') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Invest :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="number" name="invest" value="{{ $task->invest }}" required="required"/>
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Status :</span></div>
                                    <div class="content">
                                        
                                        <select class="border--base padding--base" name="status" id="status">
                                            <option value="1" {{ $task->status=="Done" ? "selected": ""}}>Done</option>
                                            <option value="0" {{ $task->status=="Waiting" ? "selected" : ""}}>Waiting</option>
                                        </select>
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Contract :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="number" name="contract" value="{{ $task->contract }}" required="required"/>
                                        @if($errors->has('status'))
                                            <p class="text-danger">{{ $errors->first('status') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item text-center">
                                    <button class="btn--primary padding--base btn--submit" type="submit">Save</button>
                                    <a class="btn--primary padding--base btn--cancel" href="{{route('admin.partner.index')}}">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clear-fix"></div>
            </div>
        </div>
        <!--.add-customer-wrap-->
        
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        
    </script>
@endsection