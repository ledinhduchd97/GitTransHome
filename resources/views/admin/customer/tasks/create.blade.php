@extends('admin.layouts.app')
@section('title','ADD NEW TASK')
@section('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"/>
    <link rel="stylesheet" href="{{asset('frontend-admin/libs/datepicker/jquery-ui.theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend-admin/libs/datepicker/jquery-ui.min.css')}}"/>
@endsection
@section('content')
    <div class="tk-add content-wrap content-wrap2" id="tk-add">
        <div class="edit-tk edit-tk-wrap">
            <div class="edit-tk__top">
                <div class="edit-tk__top--left fleft col-50">
                    <h2 class="edit-tk__title">ADD NEW TASK</h2>
                </div>
                <div class="edit-tk__top--right fleft col-50">
                    <div class="text-right"><span class="dashboard">Dashboard</span></div>
                </div>
                <div class="clear-fix"></div>
            </div>
            <div class="edit-tk__content">
                <div class="edit-tk__content--title text-center">
                    <h3>ADD NEW TASK</h3>
                </div>
                <div class="message-adduser" style="text-align: center;">
                   
                    @if(session()->has('success'))
                        <div class="text-center">
                            <p class="text-success">
                                {{ session('success') }}
                            </p>
                        </div>
                    @endif
                </div>
                <form class="form-adduser" action="{{route('admin.customerTasks.store')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="customer_id" value="{{ request()->customer_id }}">
                    <div class="edit-tk__content--row">
                        <div class="text"> <span>
                     Title task :</span></div>
                        <div class="content">
                            <input class="border--base padding--base" id="title" type="text" value="{{old('title')}}" name="title" required />
                            <div class="error-fullname">
                                @if(sizeof($errors) != 0)
                                    @if($errors)
                                        <p style="color:red; font-size: 10px;">{{$errors->first('title')}}</p>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="clear-fix"></div>
                    </div>

                    <!-- <div class="edit-tk__content--row">
                        <div class="text"><span>
                     Age (<span class="required">*</span>):</span></div>
                        <div class="content">
                            <input class="border--base padding--base" id="age" type="text" value="" name="age"/>
                            <div class="error-email">
                                @if(sizeof($errors) != 0)
                                    @if($errors)
                                        <p style="color:red; font-size: 10px;">{{$errors->first('age')}}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                    </div> -->
                    <!-- <div class="edit-tk__content--row">
                        <div class="text"><span>
                     Update (<span class="required">*</span>):</span></div>
                        <div class="content">
                            <input class="border--base padding--base" id="update" type="text" value="" name="update"/>
                            <div class="error-username">
                                @if(sizeof($errors) != 0)
                                    @if($errors)
                                        <p style="color:red; font-size: 10px;">{{$errors->first('update')}}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                    </div> -->
                    <div class="edit-tk__content--row">
                        <div class="text"><span>
                     Type :</span></div>
                        <div class="content">
                            <input class="border--base padding--base" id="type" type="text" value="{{old('type')}}" name="type" required/>
                            <div class="error-username">
                                @if(sizeof($errors) != 0)
                                    @if($errors)
                                        <p style="color:red; font-size: 10px;">{{$errors->first('type')}}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="edit-tk__content--row">
                        <div class="text"><span>
                     Date :</span></div>
                        <div class="content">
                            <input class="border--base padding--base" id="created_at" type="date" value="{{old('created_at')}}"
                                   name="created_at" required/>
                            <div class="error-username">
                                @if(sizeof($errors) != 0)
                                    @if($errors)
                                        <p style="color:red; font-size: 10px;">{{$errors->first('created_at')}}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="edit-tk__content--row">
                        <div class="text"><span>
                     Deadline :</span></div>
                        <div class="content">
                            <input class="border--base padding--base" name="deadline" value="{{old('deadline')}}" id="date" type="date" required/>
                            <div class="error-sex">
                                @if(sizeof($errors) != 0)
                                    @if($errors)
                                        <p style="color:red; font-size: 10px;">{{$errors->first('deadline')}}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="edit-tk__content--row">
                        <div class="text"><span>
                     Ranking :</span></div>
                        <div class="content">
                            <select class="account-position border--base padding--base" id="ranking" name="ranking" required>
                                <option value="">--- Ranking ---</option>
                                <option value="0" {{old('ranking') == '0' ? 'selected' : ''}}>Normal</option>
                                <option value="1" {{old('ranking') == '1' ? 'selected' : ''}}>Low</option>
                            </select>
                            <div class="error-sex">
                                @if(sizeof($errors) != 0)
                                    @if($errors)
                                        <p style="color:red; font-size: 10px;">{{$errors->first('ranking')}}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="edit-tk__content--row">
                        <div class="text"><span>
                     Note :</span></div>
                        <div class="content">
                            <textarea class="border--base padding--base" id="note" type="text" name="note" style="width: 100%;">{{old('note')}}</textarea>
                            <div class="error-username">
                                @if(sizeof($errors) != 0)
                                    @if($errors)
                                        <p style="color:red; font-size: 10px;">{{$errors->first('note')}}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="edit-tk__content--row">
                        <div class="text"><span>
                     Status :</span></div>
                        <div class="content">
                            <select class="account-position border--base padding--base" id="status" name="status" required>
                                <option value="">--- Status ---</option>
                                <option value="0" {{old('status') == '0' ? 'selected' : ''}}>Done</option>
                                <option value="1" {{old('status') == '1' ? 'selected' : ''}}>Waiting</option>
                            </select>
                            <div class="error-sex">
                                @if(sizeof($errors) != 0)
                                    @if($errors)
                                        <p style="color:red; font-size: 10px;">{{$errors->first('status')}}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="edit-tk__content--row text-center">
                        <button class="btn-submit btn--primary padding--base" type="submit" id="btn-adduser">Submit</button>
                        <a class="btn-cancel btn--primary padding--base" href="{{route('admin.customers.show',['customers' => request()->customer_id ])}}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!--.edit-tk-wrap-->
    </div>
@endsection

