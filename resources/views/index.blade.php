@extends('layouts.app')
@section('title','Tran Homes')
@section('content')
<!--  -->
<section class="home" id="home">
        <section class="banner" id="banner">
          <div class="banner__slider owl-carousel owl-theme myslider">
            @if(isset($houses))
            @foreach($houses as $house)
            <div class="banner-item">
            @if($house->images)
              @foreach($house->images as $image)
              @if($image->level == 1)
              <div class="banner-item__img"><img src="{{asset($image->link)}}" alt=""/></div>
              @endif
              @endforeach
            @endif
              <div class="banner-item__wrap">
                <div class="banner-item__wrap2">
                  <div class="bg"></div>
                  <div class="banner-item__wrap3">
                    <p class="banner-item__wrap3--time link-base line-clame__base">{{$house->note}}</p>
                    <h3 class="banner-item__wrap3--title line-clame__base">{{$house->name}}</h3>
                    <p class="banner-item__wrap3--address line-clame__base">{{$house->address}}</p>
                    <div class="rooms"><span>
                        <p class="number">{{$house->number_bedroom}}</p>
                        <p class="name-room">Bedrooms</p></span><span>
                        <p class="number">{{$house->number_bathroom}}</p>
                        <p class="name-room">Bathrooms</p></span><span>
                        <!--start update html 24/10-->
                        <!-- <p class="number">{{$house->area_gross_floor}} sq</p> -->
                        <p><span class="number">{{$house->area_gross_floor}} </span><span>Sqft</span></p>
                        <p class="name-room">living</p></span><span>
                        <!-- <p class="number">{{$house->site_area}} sq</p> -->
                        <p><span class="number">{{$house->site_area}} </span><span>Sqft</span></p>
                        <p class="name-room">Lot</p></span></div>
                        <!--End update html 24/10-->
                    <p class="sale">For Sale</p>
                    <p class="price">{{ $house->unit }} {{ $house->price }}</p>
                    <a class="btn-view link-base" href="{{route('get.detail',['id'=>$house->id])}}"><span>view property &gt;</span></a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
           @endif
          </div>
          <div class="banner__slider-nav">
            <div class="banner-nav--previous nav--previous"><img src="{{asset('frontend/images/btn-prev.png')}}" alt="btn-prev"/></div>
            <div class="banner-nav--next nav--next"><img src="{{asset('frontend/images/btn-next.png')}}" alt="btn-next"/></div>
          </div>
        </section>
        <section class="feature" id="feature">
          <div class="container">
            <div class="row feature__wrap-slider">
              <div class="feature__slider owl-carousel owl-theme myslider">
              @if(isset($houses))
              @foreach($houses as $house)
                <div class="feature-item">
                  <div class="feature-item__wrap">
              @if($house->images)
                @foreach($house->images as $image)
                  @if($image->level == 3)
                    <img src="{{asset($image->link)}}" alt=""/>
                  @endif
                @endforeach
              @endif<i class="fas fa-heart"></i>
                    <div class="feature__rooms text-center">
                      <div class="row">
                        <div class="col-4 cross">
                          <p>{{$house->number_bedroom}} Beds</p>
                        </div>
                        <div class="col-4 cross">
                          <p>{{$house->number_bathroom}} Bathrooms</p>
                        </div>
                        <div class="col-4">
                          <p>{{$house->site_area}} Sqft</p>
                        </div>
                      </div>
                    </div>
                    <div class="feature__infor">
                      <p class="feature__infor--time highlight line-clame__base">{{$house->note}}</p>
                      <h3 class="feature__infor--title">{{$house->name}}</h3>
                      <p class="feature__infor--des">{!!$house->description!!}</p>
                      <p class="sale">For  Sale</p>
                      <p class="price">{{ $house->unit }} {{ $house->price }}</p><a class="btn-view link-base" href="{{route('get.detail',['id'=>$house->id])}}"><span>View Property &gt;</span></a>
                    </div>
                  </div>
                </div>        
                @endforeach
              @endif
              </div>
              <div class="feature__slider-nav myslider">
                <div class="feature-nav--previous nav--previous"><img src="{{asset('frontend/images/row-left.png')}}" alt=""/></div>
                <div class="feature-nav--next nav--next"><img src="{{asset('frontend/images/row-right.png')}}" alt=""/></div>
              </div>
              <div class="btn-show-all text-center" id="btn-show-all">
                <p>Show All</p>
              </div>
            </div>
            <div class="feature__all disabled">
              <div class="feature__wap2 row">
              @if(isset($houses))
                @foreach($houses as $house)
                <div class="col-12 col-md-6 col-xl-4">
                  <div class="feature-item feature-item__wrap feature__all--item">
                @if($house->images)
                @foreach($house->images as $image)
                  @if($image->level == 3)
                    <img src="{{asset($image->link)}}" alt=""/>
                    @endif
                  @endforeach
                @endif
                    <i class="fas fa-heart"></i>
                    <div class="feature__rooms text-center">
                      <div class="row">
                        <div class="col-4 cross">
                          <p>{{$house->number_bedroom}} Beds</p>
                        </div>
                        <div class="col-4 cross">
                          <p>{{$house->number_bathroom}} Bathrooms</p>
                        </div>
                        <div class="col-4">
                          <p>{{$house->site_area}} Sqft</p>
                        </div>
                      </div>
                    </div>
                    <div class="feature__infor">
                      <p class="feature__infor--time highlight line-clame__base">{{$house->note}}</p>
                      <h3 class="feature__infor--title">{{$house->name}}</h3>
                      <p class="feature__infor--des">{!!$house->description!!}</p>
                      <p class="sale">For  Sale</p>
                      <p class="price">{{ $house->unit }} {{ $house->price }}</p><a class="btn-view link-base" href="{{route('get.detail',['id'=>$house->id])}}"><span>View Property &gt;</span></a>
                    </div>
                  </div>
                </div>
              @endforeach
              @endif

            </div>
            <div class="btn-mini text-center" id="btn-mini">
                <p>Mini All</p>
              </div>
          </div>
        </section>
        <section class="sell" id="sell">
          <div class="bg_img"><img src="{{asset('frontend/images/sell_img.png')}}" alt="needtosell"/></div>
          <div class="sell__content">
            <div class="container">
              <div class="row">
                <div class="col-7">
                  <h1>{{$pageindexs->sell_content_question}}</h1>
                  <p>{{$pageindexs->sell_content_title}}</p>
                </div>
                <div class="col-5"><a class="btn btn-primary btn-base btn-getsell" href="{{route('get.freecash')}}"><span>{{$pageindexs->sell_content_btn}}</span></a></div>
              </div>
            </div>
          </div>
        </section>
        @if(isset($aboutus))
        <section class="about-us" id="about-us">
          <div class="container">
            <div class="row">
              <div class="col-6 col-xl-6">
                <div class="about-us__img"><img src="{{asset($aboutus->image_avatar)}}" alt="person-img"/></div>
              </div>
              <div class="col-6 col-xl-6">
                <div class="about-us__content">
                  <h3 class="about-us__content--title">{{$aboutus->title}}</h3>
                  <p class="about-us__content--subtitle">{{$aboutus->short_description}}</p>
                  <div class="about-us__content--description"> 
                    <p><span class="highlight2"><?php echo($aboutus->detail_description)?></p>
                  </div>
                  <div class="about-us__signature"><img src="{{asset($aboutus->image_signature)}}" alt=""/></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        @endif
        <section class="our-video" id="our-video">
          <div class="container">
            <div class="our-video__title">
              <h2>Our Videos</h2>
            </div>
            <div class="myslider">
              <div class="our-video__slider-nav">
                <div class="our-video--prev nav--previous"><img src="{{asset('frontend/images/btn-prev2.png')}}" alt="btn-prev"/></div>
                <div class="our-video--next nav--next"><img src="{{asset('frontend/images/btn-next2.png')}}" alt="btn-next"/></div>
              </div>
            </div>
            <div class="slider-video slider-video-wrap">
              <div class="video-owl-carousel owl-carousel owl-theme myslider">
              @if(isset($houses))
                @foreach($houses as $house)
                <div class="item">
                  <div class="row item-pc">
                    <div class="col-5 col-sm-6 col-xl-5">
                      <div class="item__detail">
                        <div class="item__detail--img">
                        @if($house->images)
                          @foreach($house->images as $image)
                            @if($image->level == 3)
                          <img src="{{asset($image->link)}}" alt="video-img"/>
                            @endif
                          @endforeach
                        @endif
                        </div>
                        <div class="item__detail--infor">
                          <h3 class="name line-clame__base">{{$house->name}}</h3>
                          <p class="address line-clame__base">{{$house->address}}</p>
                          <div class="rooms"><span>
                              <p class="number">{{$house->number_bedroom}}</p>
                              <p class="name-room">bedrooms</p></span><span>
                              <p class="number">{{$house->number_bathroom}}</p>
                              <p class="name-room">bathrooms</p></span><span>
                              <p class="number">{{$house->area_gross_floor}} Sqft</p>
                              <p class="name-room">living rooms</p></span></div>
                          <p class="price">{{ $house->unit }} {{ $house->price }}</p><a class="btn btn-primary btn-play btn-base" href=""><span>play</span></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-7 col-sm-6 col-xl-7">
                      <div class="item__video">
                        <iframe class="item__video--content" src="{{$house->video}}?showinfo=0&amp;rel=0" frameborder="0" allow="autoplay,enscrypted-media" allowfullscreen="allowfullscreen"></iframe>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="item-mobile disabled">
                      <div class="item__detail">
                        <div class="item__detail--img">
                          <iframe class="item__video--content" src="{{$house->video}}?showinfo=0&amp;rel=0" frameborder="0" allow="autoplay,enscrypted-media" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                        <div class="item__detail--infor">
                          <h3 class="name">{{$house->name}}</h3>
                          <p class="address">{{$house->address}}</p>
                          <div class="rooms"><span>
                              <p class="number">{{$house->number_bedroom}}</p>
                              <p class="name-room">bedrooms</p></span><span>
                              <p class="number">{{$house->number_bathroom}}</p>
                              <p class="name-room">bathrooms</p></span><span>
                              <p class="number">{{$house->area_gross_floor}} sq</p>
                              <p class="name-room">living rooms</p></span></div>
                          <p class="price">{{ $house->unit }} {{ $house->price }}</p><a class="btn btn-primary btn-play btn-base" href=""><span>play</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div> 
                @endforeach
              @endif 
              </div>
            </div>
            <!--.slider-video-wrap-->
          </div>
        </section>
        <section class="partner" id="partner">
          <div class="container">
            <div class="partner__wrap">
              <div class="row">
                <div class="col-6 col-xl-6">
                  <h2 class="partner__title">{{$partner->title}}</h2>
                  <p class="partner__subtitle .item__detail .item__detail--img img">{{$partner->short_desc}}</p>
                  <p class="partner__des line-clame__base2">{!!$partner->detail_desc!!}</p>
                  <div class="partner__contact"><a class="btn btn-primary btn-base" data-toggle="modal" data-target="#infor_patner"> <span>contact us</span></a>
                    <div class="infor-patner infor-patner-wrap">
                      <div class="modal fade" id="infor_patner" tabindex="-1" role="dialog" aria-labelledby="infor_patner__title" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="container">
                            <div class="row">
                              <div class="col-8">
                                <div class="modal-content">
                                  <div class="infor_patner__form text-center">
                                    
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" >&times;</button>
                                      <h1 id="infor_patner__title">Partner Of Tranhomes</h1>
                                      <h4 id="infor_patner__desc">Please fill in your information</h4>
                                    </div>
                                    <div class="modal-body">
                                      <form class="form-infor_patner" id="form-infor_patner" action="">
                                        <div class="form-infor_patner--item"><i class="fas fa-user"></i>
                                          <input id="patner_fullname" type="text" name="patner_fullname" placeholder="Full name"/>
                                        </div>
                                        <div class="form-infor_patner--item"><i class="fas fa-envelope"></i>
                                          <input id="patner_email" type="email" name="patner_email" placeholder="Email *"/>
                                        </div>
                                        <div class="form-infor_patner--item"><i class="fas fa-phone"></i>
                                          <input id="patner_phone" type="tel" name="patner_phone" placeholder="Phone"/>
                                        </div>
                                        <div class="form-infor_patner--item">
                                          <input class="btn btn-primary btn-base btn-send__patner" id="add-partner" type="button" value="Send" data-toggle="modal"/>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade bd-example-modal-lg" id="modal-partner-thank" tabindex="-1" role="dialog" aria-labelledby="thank_partner__title" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="container">
                            <div class="row">
                              <div class="col-12">
                                <div class="modal-content">
                                  <div class="partner_thank"> 
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" >&times;</button>
                                      <h3 id="thank_partner__title">Thank You For Your Request!</h3>
                                      <span>{!!$setup->thank_you!!}<span style="color: #ea723d">{{ $setup->phone }}</span></span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-2"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
                <div class="col-6 col-xl-6">
                  <div class="partner__img">
                    <div class="partner__img--wrap"><img src="{{asset($partner->image_avatar)}}" alt="partner_img"/></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>
@endsection
@section('scripts')
  <script type="text/javascript">
    $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
        });
    $("#add-partner").click(function(event) {
      var _fullname = $("#patner_fullname").val();
      var _email = $("#patner_email").val();
      var _phone = $("#patner_phone").val();
        $.ajax({
              type:'POST',
                url: '{{route('post.partner')}}', 
                dataType: 'json',
                data:{ patner_fullname : _fullname, patner_email : _email , patner_phone : _phone },
                success: function(data){
                    console.log(data.responseJSON.message);
                },
              });
        });
        
  </script>
@endsection