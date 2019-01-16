@extends('admin.layouts.app')
@section('title','Edit Task To Do')
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
                <h2 class="add-customer__top--title">Edit Task To Do</h2>
            </div>

            <div class="add-customer__main">
                <div class="add-customer--left">
                    <div class="add-customer--padding">
                        <div class="add-customer--left__content">

                            <form id="house_infor" action="{{ route('admin.partnerTasks.update', ['id' => $task->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="add-customer--left__title">
                                    <h3>Edit Task to do</h3>
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
                                        <input class="border--base padding--base" type="text" name="title" value="{{ $errors->has('title') ? old('title') : $task->title }}" required="required" />
                                        @if($errors->has('title'))
                                            <p class="text-danger">{{ $errors->first('title') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Age :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="number" name="age" value="{{ $errors->has('age') ? old('age') : $task->age }}" required="required" patter="^[0-9]*$" min="0" />
                                        @if($errors->has('age'))
                                            <p class="text-danger">{{ $errors->first('age') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Update :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="number" value="{{ $errors->has('update') ? old('update') : $task->update }}" name="update" required="required" patter="^[0-9]*$" min="0"/>
                                        @if($errors->has('update'))
                                            <p class="text-danger">{{ $errors->first('update') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>To do type :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="text" name="type"  value="{{ $errors->has('type') ? old('type') : $task->type }}" required="required" />
                                        @if($errors->has('type'))
                                            <p class="text-danger">{{ $errors->first('type') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Date :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="date" name="created_at" value="{{ $errors->has('created_at') ? old('created_at') : $task->created_at_day($task->created_at) }}" required="required" readonly/>
                                        @if($errors->has('created_at'))
                                            <p class="text-danger">{{ $errors->first('created_at') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Deadline :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="date" name="deadline" value="{{ $errors->has('deadline') ? old('deadline') : $task->deadline_day($task->deadline) }}" required="required"/>
                                        @if($errors->has('deadline'))
                                            <p class="text-danger">{{ $errors->first('deadline') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Ranking :</span></div>
                                    <div class="content">
                                        <select class="border--base padding--base" name="ranking" id="ranking">
                                            @if(old('ranking'))
                                                <option value="0" {{ old('ranking')=="0" ? "selected": ""}}>Low</option>
                                                <option value="1" {{ old('ranking')=="1" ? "selected" : ""}}>High</option>
                                            @else
                                                <option value="0" {{ $task->ranking=="Low" ? "selected": ""}}>Low</option>
                                                <option value="1" {{ $task->ranking=="High" ? "selected" : ""}}>High</option>
                                            @endif
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
                                        <input class="border--base padding--base" type="number" name="invest" value="{{ $errors->has('invest') ? old('invest') : $task->invest }}" required="required" min="0"/>
                                        @if($errors->has('invest'))
                                            <p class="text-danger">{{ $errors->first('invest') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Status :</span></div>
                                    <div class="content">                                
                                        <select class="border--base padding--base" name="status" id="status">
                                            @if(old('status'))
                                                <option value="1" {{ old('status')=="1" ? "selected": ""}}>Done</option>
                                                <option value="0" {{ old('status')=="0" ? "selected" : ""}}>Waiting</option>
                                            @else
                                                <option value="1" {{ $task->status=="Done" ? "selected": ""}}>Done</option>
                                                <option value="0" {{ $task->status=="Waiting" ? "selected" : ""}}>Waiting</option>
                                            @endif
                                        </select>
                                        @if($errors->has('status'))
                                            <p class="text-danger">{{ $errors->first('status') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Contract :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="text" name="contract" value="{{ $errors->has('contract') ? old('contract') : $task->contract }}" required="required" maxlength="191" />
                                        @if($errors->has('contract'))
                                            <p class="text-danger">{{ $errors->first('contract') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="edit-tk__content--row">
                                    <div class="text"><span>
                                 Note :</span></div>
                                    <div class="content">
                                        <textarea class="border--base padding--base" id="note" type="text"  name="note" style="width: 100%; height: 150px;">{!! $errors->has('note') ? old('note') : $task->note !!}</textarea>
                                        <div class="error-sex">
                                            @if(sizeof($errors) != 0)
                                                @if($errors)
                                                    <p style="color:red; font-size: 10px;">{{$errors->first('note')}}</p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item text-center">
                                    <button class="btn--primary padding--base btn--submit" type="submit">Save</button>
                                    <a class="btn--primary padding--base btn--cancel" href="{{route('admin.partner.show',['partner'=> $task->partner->id])}}">Cancel</a>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#note' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection