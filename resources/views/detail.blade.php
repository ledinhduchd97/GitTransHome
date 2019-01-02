@extends('layouts.app')
@section('title','Detail')
@section('content')
<section class="detail" id="detail">
  <div class="container">
    @if(isset($house))
    <div class="direction"><a href="#"><span>Home</span></a><span class="angle_right"><i class="fas fa-angle-right"></i></span><a href="#"><span>Feartured Listings</span></a><span class="angle_right"><i class="fas fa-angle-right"></i></span><a class="active" href="#"><span>{{$house->name}}</span></a></div>
    <div class="detail__content">   
      <div class="row">
        
        <div class="col-md-12">
          <div class="information__house">
            <div class="row">
              <!--FE update code HTML 26/10-->
              <div class="col-12 col-md-4">
                <div class="information__house--desc">
                  <div class="information__house--desc2">
                    <h3 class="information__house--time link-base">{{$house->note}}</h3>
                    <h1 class="information__house--title">{{$house->name}}</h1>
                    <p class="information__house--address">{{$house->address}}</p>
                  </div>
                </div>
              </div>
              <div class="col-8 col-md-5">
                <ul class="list-inline text-center information__house--parameter">
                  <li class="text-left">
                    <p><span class="number">{{$house->number_bedroom}}</span></p>
                    <p class="name-room">bedrooms</p>
                  </li>
                  <li class="text-left">
                    <p><span class="number">{{$house->number_bathroom}}</span></p>
                    <p class="name-room">bathrooms</p>
                  </li>
                  <li class="text-left">
                    <p><span class="number">{{$house->site_area}} </span>Sqft</p>
                    <p class="name-room">lot</p>
                  </li>
                  <li class="text-left">
                    <p><span class="number">{{$house->area_gross_floor}} </span>Sqft</p>
                    <p class="name-room">living room</p>
                  </li>
                </ul>
              </div>
              <div class="col-4 col-md-3 text-center">
                <div class="information__house--price">
                  <h4>{{ $house->unit }} {{ $house->price }}</h4>
                </div>
              </div>
              <!--FE end update HTML 26/10-->
            </div>
          </div>
          <div class="detail__main">
            <div class="row">
              <div class="col-md-9">
                <div class="detail__slide">     
                  <div class="detail__slides owl-carousel owl-theme">
                    @foreach($house->images as $images)
                      @if($images->level == 2)
                        <div class="items" data-hash="item{{$images->id}}"><img src="{{asset($images->link)}}" alt="anh"/></div>
                      @endif
                    @endforeach
                    
                  </div>
                  <div class="detail__small-slider owl-carousel owl-theme myslider">
                    @foreach($house->images as $images)
                      @if($images->level == 2)
                        <a class="small-item" href="#item{{$images->id}}"><img src="{{asset($images->link)}}" alt=""/></a>
                      @endif
                    @endforeach
            
                  </div>
                  <div class="detail__small-slider--nav">
                    <div class="detail__small-slider--pre nav--previous"><img src="{{asset('frontend/images/icon-pre.png')}}" alt=""/></div>
                    <div class="detail__small-slider--next nav--next"><img src="{{asset('frontend/images/icon-next.png')}}" alt=""/></div>
                  </div>
                </div>
                <div class="property_desc">
                  <h3 class="property_desc--title">Property Description</h3>
                  <p class="property_desc--content">{!!$house->description!!}</p>
                </div>
                <div class="general_table">
                  <table class="general_infor">
                    <tr>
                      <th colspan="2">General Information</th>
                      <th> </th>
                    </tr>
                    <tr>
                      <td>Broker's Name</td>
                      <td>{{$house->brokerage}}</td>
                    </tr>
                    <!--FE update html 24/10-->
                    <tr>
                      <td>Agent</td>
                      <td>{{$house->agent}}</td>
                    </tr>
                    <tr>
                      <td>License</td>
                      <td>{{$house->license}}</td>
                    </tr>
                    <tr>
                      <td>MLS Number</td>
                      <td>{{$house->mls}}</td>
                    </tr>
                    <tr>
                      <td>Country</td>
                      <td>{{$house->area}}</td>
                    </tr>
                    <!--FE end update 24/10-->
                    <tr>
                      <td>City</td>
                      <td>{{$house->address}}</td>
                    </tr>
                    <tr>
                      <td>Zip</td>
                      <td>{{$house->zipcode}}</td>
                    </tr>
                    <tr>
                      <td>Year Build</td>
                      <td>{{$house->builded_year}}</td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="col-md-3">
                <div class="other_house"><a class="btn btn-base btn-primary btn-phone" href="#"><img src="{{asset('frontend/images/icon-phone2.png')}}" alt=""/><span>{{$house->phone}}</span></a>
                  <div class="other_house__wrap">
                    <h3 class="other_house--title">Other Apartments</h3>
                    @if(isset($house_list))
                      @foreach($house_list as $hl)
                        <div class="other_house--item">
                          <!--FE update html 24/10-->
                          <div class="other_house--content text-center">
                            <a class="other_house--item__content2" href="{{route('get.detail',['id'=>$hl->id])}}">
                              @foreach($hl->images as $images)
                                @if($images->level == 3)
                                  <img src="{{asset($images->link)}}" alt="#"/>
                                @endif
                              @endforeach
                              <div class="other_house--overlay-black"></div>
                              <div class="other_house--item__desc text-left">
                                <p class="name_house">{{$hl->name}}</p>
                                <p class="price highlight2">{{ $hl->unit }} {{ $hl->price }}</p>
                              </div>
                            </a>
                          </div>
                          <!--FE end update html 24/10-->

                          <!-- <div class="other_house--item__desc">
                            <p class="name_house">{{$hl->area}}</p>
                            <p class="price highlight">$ {{$hl->price}}</p>
                          </div> -->
                        </div>
                      @endforeach
                    @endif
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       @endif 
      </div>
    </div>
  </div>
</section>
@endsection