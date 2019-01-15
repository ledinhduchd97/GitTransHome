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
                <h2 class="add-customer__top--title">Edit Partner</h2>
            </div>

            <div class="add-customer__main">
                <div class="add-customer--left fleft">
                    <div class="add-customer--padding">
                        <div class="add-customer--left__content">

                            <form id="house_infor" action="{{ route('admin.partner.update', ['partner' => $partner->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="add-customer--left__title">
                                    <h3>Edit Partner</h3>
                                </div>
                                <div class="message-adduser" style="text-align: center;">
                                    <p class="text-success">
                                        {{ session()->has('success') ? session('success') : "" }}
                                    </p>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Full name :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="text" name="fullname" value="{{ $errors->has('fullname') ? old('fullname') : $partner->fullname }}" required="required" maxlength="64"/>
                                        @if($errors->has('fullname'))
                                            <p class="text-danger">{{ $errors->first('fullname') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Email :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="text" name="email" value="{{ $errors->has('email') ? old('email') : $partner->email }}" required="required" maxlength="64" pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})"/>
                                        @if($errors->has('email'))
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Date of birth :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base dateofbirth" type="date" value="{{$errors->has('date_of_birth') ? old('date_of_birth') : $partner->date_of_birth}}" name="date_of_birth" required="required"/>
                                        @if($errors->has('date_of_birth'))
                                            <p class="text-danger">{{ $errors->first('date_of_birth') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Phone :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="phone" name="phone"  value="{{ $errors->has('phone') ? old('phone') : $partner->phone }}" minlength="10" maxlength="15" pattern="^[0-9-+() ]*$" required="required"/>
                                        @if($errors->has('phone'))
                                            <p class="text-danger">{{ $errors->first('phone') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Address :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="text" name="address" value="{{ $errors->has('address') ? old('address') : $partner->address }}" required="required" maxlength="250"/>
                                        @if($errors->has('address'))
                                            <p class="text-danger">{{ $errors->first('address') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Partner type :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="text" name="partner_type" value="{{ $errors->has('partner_type') ? old('partner_type') : $partner->partner_type }}" required="required" maxlength="250"/>
                                        @if($errors->has('partner_type'))
                                            <p class="text-danger">{{ $errors->first('partner_type') }}</p>
                                        @endif
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="add-customer--left__item">
                                    <div class="text"><span>Status :</span></div>
                                    <div class="content">
                                        <input class="border--base padding--base" type="text" name="status" value="{{ $errors->has('status') ? old('status') : $partner->status }}" required="required" maxlength="250"/>
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
                <div class="add-customer--right fright">
                <div class="add-customer--padding">
                    <div class="add-customer--right__content">
                    <h4>Lưu thay đổi</h4>
                    <!-- <p><i class="fas fa-calendar-alt"></i>Được đăng bởi:<span class="time-up">27/09/2018 </span><span class="admin-up">NhungNguyen</span></p> -->
                    @if(isset($partner->user_updated->fullname))
                    <p>Được chỉnh sửa lần cuối by <strong class="admin-edit">{{$partner->user_updated->fullname}} </strong><span class="time-edit">{{$partner->updated_at}}</span></p>
                    @endif
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
              .create( document.querySelector( '#editor' ) )
              .catch( error => {
                  console.error( error );
              } );
      </script>
@endsection