@extends('admin.layouts.app')
@section('title','House')
@section('content')
<div class="house-detail content-wrap content-wrap2" id="house-detail">
    <div class="edit-house edit-house-wrap">
      <div class="edit-house__top">
        <h2 class="edit-house__top--title">View detail</h2>
      </div>
      <div class="edit-house__main">
        <div class="edit-house--left fleft">
          <div class="edit-house--padding">
            <div class="edit-house--left__content">
              <div class="edit-house--left__title">
                <h3>Overview</h3>
              </div>
              <form action="{{route('admin.house.delete.recycle',$house)}}" method="get" onsubmit="return smDestroy()">
                <div class="edit-house--left__item">
                  <div class="text"><span>House name :</span></div>
                  <div class="content"><span>{{$house->name}}</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>Note :</span></div>
                  <div class="content"><span>{{$house->note}}</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>Phone :</span></div>
                  <div class="content"><span>{{$house->phone}}</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>Address :</span></div>
                  <div class="content"><span>{{$house->address}}</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item edit-item--margintop">
                  <div class="text"><span>Area :</span></div>
                  <div class="content"><span>{{$house->area}}</span></div>
                  <div class="clear-fix"></div>
                </div>
              </form>
              <div class="edit-house--left__title">
                <h3>Facts and Futures</h3>
              </div>
              <form action="{{route('admin.house.delete.recycle',$house)}}" method="get" onsubmit="return smDestroy()">
		      	    {{ csrf_field() }}
                <div class="edit-house--left__item">
                  <div class="text"><span>Number_bedroom :</span></div>
                  <div class="content"><span>{{$house->number_bedroom}}</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>Number_bathroom :</span></div>
                  <div class="content"><span>{{$house->number_bathroom}}</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>Living Area :</span></div>
                  <div class="content"><span>{{$house->site_area}} sq ft</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>Lot Size :</span></div>
                  <div class="content"><span>{{$house->area_gross_floor}} sq ft</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>Price :</span></div>
                  <div class="content"><span>
                    {{ $house->unit }}
                    {{ $house->price }}
                  </span>
                </div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>Images :</span></div>
                  <div class="content">
                    <div class="select_image"><span>
                      @foreach($house->images as $image)
                        @if($image->level == 1)
                          <img src="{{asset($image->link)}}" alt="anh"/>
                        @endif
                      @endforeach
                    </span></div>
                  </div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>Video URL :</span></div>
                  <div class="content"><span>{{$house->video}}</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>Description :</span></div>
                  <div class="content"><span>{!!$house->description!!}</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__title">
                  <h3>General Information</h3>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>Brokerage Name :</span></div>
                  <div class="content"><span>{{$house->brokerage}}</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>Agent :</span></div>
                  <div class="content"><span>{{$house->agent}}</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>License :</span></div>
                  <div class="content"><span>{{$house->license}}</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>MLS Number :</span></div>
                  <div class="content"><span>{{$house->mls}}</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>Zipcode :</span></div>
                  <div class="content"><span>{{$house->zipcode}}</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item">
                  <div class="text"><span>Year Built :</span></div>
                  <div class="content"><span>{{$house->builded_year}}</span></div>
                  <div class="clear-fix"></div>
                </div>
                <div class="edit-house--left__item text-center">
                	<a href="{{route('admin.house.edit',$house)}}" class="btn--edit btn--primary padding--base">Edit</a>
            	  	<input type="submit" class="btn--edit btn--primary padding--base" value="Delete">
                	<a href="{{route('admin.house.index')}}" class="btn--edit btn--primary padding--base">Cancel</a>
                  <div class="clear-fix"></div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="edit-house--right fright">
          <div class="edit-house--padding">
            <div class="edit-house--right__content">
              <h4>Lưu thay đổi</h4>
              <p><i class="fas fa-calendar-alt"></i>Được đăng bởi:<span class="time-up"> {{$house->created_at}} </span><span class="admin-up">{{$house->user->fullname}}</span></p>
              @if(isset($house->user_updated->fullname))
              <p>Được chỉnh sửa lần cuối by <strong class="admin-edit"> {{$house->user_updated->fullname}} </strong><span class="time-edit">{{$house->updated_at}}</span></p>
              @endif
            </div>
          </div>
        </div>
        <div class="clear-fix"></div>
      </div>
    </div>
  </div>
@endsection