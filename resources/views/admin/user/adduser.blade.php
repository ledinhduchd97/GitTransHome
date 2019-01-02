@extends('admin.layouts.app')
@section('title','ADD NEW ACCOUNT')
@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
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
              <h2 class="edit-tk__title">Add new account</h2>
            </div>
            <div class="edit-tk__top--right fleft col-50">
              <div class="text-right"><span class="dashboard">Dashboard</span></div>
            </div>
            <div class="clear-fix"></div>
          </div>
          <div class="edit-tk__content">
            <div class="edit-tk__content--title text-center">
              <h3>Add new account</h3>
            </div>
            <div class="message-adduser" style="text-align: center;">
                @if(session()->has('success'))
                    <div class="text-center">
                        <p class="text-success">
                            {{ session('success') }}
                            {{ session()->forget("success") }}
                        </p>
                    </div>
                @endif 
            </div>
            <form class="form-adduser" action="{{route('admin.user.post_create')}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="edit-tk__content--row">
                <div class="text"> <span>
                     Full name (<span class="required">*</span>):</span></div>
                <div class="content">
                  <input class="border--base padding--base" required id="fullname" type="text" value="" name="fullname"/>
                    <div class="error-fullname">
                      @if(sizeof($errors) != 0)
                        @if($errors)
                          <p style="color:red; font-size: 10px;">{{$errors->first('fullname')}}</p>
                        @endif
                      @endif
                    </div>
                  </div>
                </div>
                <div class="clear-fix"></div>
                <div class="edit-tk__content--row">
                <div class="text"><span>
                     Email (<span class="required">*</span>):</span></div>
                <div class="content">
                  <input class="border--base padding--base" id="email" type="email" required value="" name="email"/>
                  <div class="error-email">
                    @if(sizeof($errors) != 0)
                      @if($errors)
                        <p style="color:red; font-size: 10px;">{{$errors->first('email')}}</p>
                      @endif
                    @endif
                  </div>
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="edit-tk__content--row">
                <div class="text"><span>
                     Username (<span class="required">*</span>):</span></div>
                <div class="content">
                  <input class="border--base padding--base" id="username" required type="text" value="" name="username"/>
                  <div class="error-username">
                    @if(sizeof($errors) != 0)
                      @if($errors)
                        <p style="color:red; font-size: 10px;">{{$errors->first('username')}}</p>
                      @endif
                    @endif
                  </div>
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="edit-tk__content--row">
                <div class="text"><span>
                      Password (<span class="required">*</span>):</span></div>
                <div class="content">
                  <input class="border--base padding--base" id="password" type="password" required name="password"/>
                  <div class="error-password">
                    @if(sizeof($errors) != 0)
                      @if($errors)
                        <p style="color:red; font-size: 10px;">{{$errors->first('password')}}</p>
                      @endif
                    @endif
                  </div>
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="edit-tk__content--row">
                <div class="text"><span>
                     Confirm password(<span class="required">*</span>):</span></div>
                <div class="content">
                  <input class="border--base padding--base" id="confirm" required type="password" name="confirm"/>
                  <div class="error-confirm">
                    @if(sizeof($errors) != 0)
                      @if($errors)
                        <p style="color:red; font-size: 10px;">{{$errors->first('confirm')}}</p>
                      @endif
                    @endif
                  </div>
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="edit-tk__content--row">
                <div class="text"><span>
                     Gender (<span class="required">*</span>):</span></div>
                <div class="content">
                  <input class="sex-male" id="sex-male" required type="radio" name="sex" value="1" />
                  <label for="sex-male">Male</label>
                  <input class="sex-female" id="sex-female" required type="radio" name="sex" value="0"/>
                  <label for="sex-female">Female</label>
                  <div class="error-sex">
                    @if(sizeof($errors) != 0)
                      @if($errors)
                        <p style="color:red; font-size: 10px;">{{$errors->first('sex')}}</p>
                      @endif
                    @endif
                  </div>
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="edit-tk__content--row">
                <div class="text"><span>
                     Phone (<span class="required">*</span>):</span></div>
                <div class="content">
                  <input class="border--base padding--base" id="phone" required type="text" value="" name="phone"/>
                  <div class="error-phone">
                    @if(sizeof($errors) != 0)
                      @if($errors)
                        <p style="color:red; font-size: 10px;">{{$errors->first('phone')}}</p>
                      @endif
                    @endif
                  </div>
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="edit-tk__content--row">
                <div class="text"><span>
                     Date of birth (<span class="required">*</span>):</span></div>
                <div class="content date--wrap myDate"><i class="far fa-calendar-alt"></i>
                  <input class="myDatePicker border--base padding--base" required id="birthday" type="text" value="" name="birthday" autocomplete="off"/>
                  <div class="error-birthday">
                    @if(sizeof($errors) != 0)
                      @if($errors)
                        <p style="color:red; font-size: 10px;">{{$errors->first('birthday')}}</p>
                      @endif
                    @endif
                  </div>
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="edit-tk__content--row">
                <div class="text"><span>
                     Address (<span class="required">*</span>):</span></div>
                <div class="content">
                  <input class="account-address border--base padding--base" required id="address" type="text" name="address"/>
                  <div class="error-address">
                    @if(sizeof($errors) != 0)
                      @if($errors)
                        <p style="color:red; font-size: 10px;">{{$errors->first('address')}}</p>
                      @endif
                    @endif
                  </div>
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="edit-tk__content--row">
                <div class="text"><span>
                     Position (<span class="required">*</span>):</span></div>
                <div class="content">
                  <select class="account-position border--base padding--base" id="position" required name="position">
                    <option value="">--- Position ---</option>
                    <option value="2">Member</option>
                    <option value="1">Admin</option>
                  </select>
                  <div class="error-position">
                    @if(sizeof($errors) != 0)
                      @if($errors)
                        <p style="color:red; font-size: 10px;">{{$errors->first('position')}}</p>
                      @endif
                    @endif
                  </div>
                </div>
                <div class="clear-fix"></div>
              </div>
                <div class="edit-tk__content--row text-center">
                  <button class="btn-submit btn--primary padding--base" id="btn-adduser">Submit</button>
                  <a class="btn-cancel btn--primary padding--base" href="{{route('admin.user.index')}}" >Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
              </div>
              
        <!--.edit-tk-wrap-->
      </div>
@endsection

