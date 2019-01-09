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
	   <div class="tk-add content-wrap content-wrap2" id="tk-add">
        <div class="edit-tk edit-tk-wrap">
          <div class="edit-tk__top">
            <div class="edit-tk__top--left fleft col-50">
              <h2 class="edit-tk__title">Edit account</h2>
            </div>
            <div class="edit-tk__top--right fleft col-50">
              <div class="text-right"><span class="dashboard">Dashboard</span></div>
            </div>
            <div class="clear-fix"></div>
          </div>
          <div class="edit-tk__content">
            <div class="edit-tk__content--title text-center">
              <h3>Edit account</h3>
            </div>
            <div class="message-user" style="text-align: center;">
                @if(session()->has('success'))
                    <div class="text-center">
                        <p class="text-success">
                            {{ session('success') }}
                            {{ session()->forget("success") }}
                        </p>
                    </div>
                @endif  
            </div>
            <form class="" action="{{route('admin.user.post_edit',['id'=>$user->id])}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="edit-tk__content--row">
                <div class="text"> <span>
                     Full name (<span class="required">*</span>):</span></div>
                <div class="content">
                  <input class="border--base padding--base" id="fullname" type="text" value="{{$user->fullname}}" name="fullname"/>
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
                  <input class="border--base padding--base" id="email" type="text" value="{{$user->email}}" name="email" pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})"/>
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
                  <input class="border--base padding--base" id="username" type="text" value="{{$user->username}}" name="username"/>
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
                  <input class="border--base padding--base" id="password" type="text" name="password" value="" />
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
                  <input class="border--base padding--base" id="confirm" type="text" name="confirm"/>
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
                @if($user->gender == 1)
                <div class="content">
                  <label for="sex-male">Male</label>
                </div>
                @else
                <div class="content">
                  <label for="sex-male">Male</label>
                </div>
                @endif
                <div class="clear-fix"></div>
              </div>
              <div class="edit-tk__content--row">
                <div class="text"><span>
                     Phone (<span class="required">*</span>):</span></div>
                <div class="content">
                  <input class="border--base padding--base" id="phone" type="text" value="{{$user->phone}}" name="phone"/>
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
                  <input class="myDatePicker border--base padding--base" id="birthday" type="text" value="{{$user->birthday}}" name="birthday"/>
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
                  <input class="account-address border--base padding--base" id="address" type="text" name="address" value="{{$user->address}}" />
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
                     Status (<span class="required">*</span>):</span></div>
                <div class="content">
                  <select class="account-position border--base padding--base" id="status" name="status">
                    <option <?php if($user->status == 2) echo('selected') ?> value="2">Not Actived</option>
                    <option <?php if($user->status == 1) echo('selected') ?> value="1">Display</option>
                    <option <?php if($user->status == 0) echo('selected') ?> value="0">Hidden</option>
                  </select>
                  <div class="error-position">
                    @if(sizeof($errors) != 0)
                      @if($errors)
                        <p style="color:red; font-size: 10px;">{{$errors->first('status')}}</p>
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
                  <select class="account-position border--base padding--base" id="position" name="position">
                  @if($user->position == 1)
                    <option value="1">Admin</option>
                    <option value="2">Member</option>
                  @else
                    <option value="2">Member</option>
                    <option value="1">Admin</option>
                  @endif
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
                  <button class="btn-submit btn--primary padding--base" id="btn-adduser" type="submit">Save</button>
                  <button class="btn-cancel btn--primary padding--base" data-url="{{route('admin.user.index')}}" type="reset" onclick="window.location = this.dataset.url;">Cancel</button>
                </div>
              </form>
              
          </div>
        </div>
      </div>        
        <!--.edit-tk-wrap-->
      </div>
@endsection