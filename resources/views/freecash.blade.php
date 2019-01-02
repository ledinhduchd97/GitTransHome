@extends('layouts.app')
@section('title','Sell my home')
@section('css')
@endsection
@section('content')
      <div class="free-cash free-cash-wrap">
        <div class="free-cash__how-we-buy">
          <div class="container">
            <div class="modal-header">
              <h3 class="modal-title form_information__title" id="form_information__title">{{$freecashes->form_information_title_h3}}</h3>
              <h4>{{$freecashes->form_information_title_h4}}</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-4 col-sm-4">
                  <div class="how_we--item"><img class="how_we--item__img" src="{{asset('frontend/images/free-cash-img1.png')}}" alt="anh"/>
                    <h4 class="how_we--item__title">{{$freecashes->how_we_item_title_1}}</h4>
                    <p class="how_we--item__desc">{{$freecashes->how_we_item_desc_1}}</p>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                  <div class="how_we--item"><img class="how_we--item__img" src="{{asset('frontend/images/free-cash-img2.png')}}" alt="anh"/>
                    <h4 class="how_we--item__title">{{$freecashes->how_we_item_title_2}}</h4>
                    <p class="how_we--item__desc">{{$freecashes->how_we_item_desc_2}}</p>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                  <div class="how_we--item"><img class="how_we--item__img" src="{{asset('frontend/images/free-cash-img3.png')}}" alt="anh"/>
                    <h4 class="how_we--item__title">{{$freecashes->how_we_item_title_3}}</h4>
                    <p class="how_we--item__desc">{{$freecashes->how_we_item_desc_3}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="free-cash__search">
          <div class="container">             
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <form id="form_search" action="#">
                	<!-- modal -->
                  <!-- <label>Address</label> -->
                  <input id="how_we__search" type="text" name="how_we__search" placeholder="Enter your address" value="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your address'" /><a class="btn btn-primary btn-base btn_search" id="btn-map" data-toggle="" data-target=".modal_map"><span>Submit</span></a>
                </form>
                <div class="message-address" style="display: none; margin: 7px auto;
    max-width: 1030px;">
                	<p style="color:red; font-size: 12px;">Address must be filled out</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="free-cash__sell">           
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="how_we__table">
                  <h3 class="how_we__table-title">Selling To On Faith Properties LLC vs. Listing With A Local California Agent</h3>
                  <p class="how_we__table-desc">{{$setup->sell_my_home}}</p>
                  <table class="how_we__table-infor col-md-12">
                    <tr>
                      <th class="col-md-4"></th>
                      <th class="col-md-4">Selling w/ An Agent</th>
                      <th class="col-md-4">SOLD To On Falth Properties LLC</th>
                    </tr>
                    <tr>
                      <td class="col-md-4"></td>
                      <td class="col-md-4"></td>
                      <td class="col-md-4"></td>
                    </tr>
                    <tr>
                      <td class="col-md-4"></td>
                      <td class="col-md-4"></td>
                      <td class="col-md-4"></td>
                    </tr>
                    <tr>
                      <td class="col-md-4"></td>
                      <td class="col-md-4"></td>
                      <td class="col-md-4"></td>
                    </tr>
                    <tr>
                      <td class="col-md-4"></td>
                      <td class="col-md-4"></td>
                      <td class="col-md-4"></td>
                    </tr>
                    <tr>
                      <td class="col-md-4"></td>
                      <td class="col-md-4"></td>
                      <td class="col-md-4"></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="modal_map modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modal_map__title" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content"><a class="close btn btn-base"  aria-label="Close" href="{{ route('get.index') }}"><span aria-hidden="true">&times;</span></a>
                    <div class="container">
                      <div class="row"> 
                        <div class="col-lg-5">
                          <div class="free-cash__form">
                            <div class="modal-header">
                              <h3 class="modal-title" id="modal_map__title">Got it!</h3>
                            </div>
                            <div class="modal-body">
                              <p class="modal_map__desc">Please fill in your information</p>
                              <form id="form__infor">
                                <div class="form__infor--item"><i class="fas fa-user"></i>
                                  <input id="first_name" value="{{ request()->first_name }}" type="text" name="first_name" placeholder="First name"/>
                                  <label id="error-first_name" class="error" for="first_name"></label>
                                </div>
                                <div class="form__infor--item"><i class="fas fa-envelope"></i>
                                  <input id="email" type="email" value="{{ request()->email }}" name="email" placeholder="Email *"/>
                                  <label id="error-email" class="error" for="email"></label>
                                </div>
                                <div class="form__infor--item"><i class="fas fa-phone"></i>
                                  <input id="phone" type="tel" value="{{ request()-> phone}}" name="phone" placeholder="Phone"/>
                                  <label id="error-phone" class="error" for="phone"></label>
                                </div>
                                <div class="form__infor--item">
                                  <input class="btn btn-primary btn-base btn-get_price" id="btn-add-customer" type="button" value="Get My Home Price" data-toggle="modal" data-target=".modal_thank"/>
                                </div>
                              </form>
                              <div class="clear-fix"></div>
                              <div class="message-error">    	
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-7">
                          <div class="free-cash__row" style="height:100%">
                            <div id="map" style="width:100%;height:100%">
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal_thanks modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modal_thanks__title" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content modal-thanks"><a class="close btn btn-base" aria-label="Close" href="{{ route('get.index') }}"><span aria-hidden="true">&times;</span></a>
                    <div class="container">
                      <div class="modal-header">
                        <h3 id="modal_thanks__title">Thank You For Your Request!</h3>
                      </div>
                      <div class="modal-body">
                        <p class="modal_thanks__desc "><span>{!!$setup->thank_you!!} </span><span style="color: #ea723d">{{ $setup->phone }}</span></p>
                        <div class="fright modal_map_address"></div>
                        <div class="clear-fix"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('scripts')
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkUOdZ5y7hMm0yrcCQoCvLwzdM6M8s5qk&callback=initMap">
  </script>
	<script type="text/javascript">
    function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: {lat: -34.397, lng: 150.644}
    });
    var geocoder = new google.maps.Geocoder();
    geocodeAddress(geocoder, map);
    document.getElementById('btn-map').addEventListener('click', function() {
      geocodeAddress(geocoder, map);
    });
  }

  function geocodeAddress(geocoder, resultsMap) {
    var address = document.getElementById('how_we__search').value;
    geocoder.geocode({'address': address}, function(results, status) {
      if (status === 'OK') {
        resultsMap.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
          map: resultsMap,
          position: results[0].geometry.location
        });
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
  }
	$(document).ready(function($) {
		setInterval(function(){
   			var address = $("#how_we__search").val();
			if(address == "")
			{
				$('#btn-map').attr('data-toggle', '');
			}
			else
			{
				$('#btn-map').attr('data-toggle','modal');
			} 
		}, 100);			
		$('#btn-map').click(function(event) {
			var address = $("#how_we__search").val();
			if(address == "")
			{
				$('.message-address').css('display', 'block');
			}
			else
			{
				$('.message-address').css('display', 'none');
			}
		});
	});
  </script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script type="text/javascript">
		$.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      	});
    $("#email").keyup(function(event) {
      var data = $(this).val();
      console.log(data);
      $.ajax({
        url: '{{route('post.email.customers')}}',
        type: 'POST',
        dataType: 'JSON',
        data: {email: data},
        success: function (data){
          $("#error-email").text('');
        },
        error: function (error){
          $("#error-email").text(error.responseJSON.message);
        },
      })
    });
		$("#btn-add-customer").click(function(event) {
      var _address = $("#how_we__search").val();
			var _first_name = $("#first_name").val();
			var _email = $("#email").val();
      var _phone = $("#phone").val();
      var data  = {
        address : _address,
        first_name : _first_name,
        email : _email,
        phone : _phone 
      };
      $(".message-error").html("");
      axios.post("{{route('post.addcustomer')}}", data)
      .then(res => {
        $('.modal_thanks').modal('show'); 
        $('.modal_map').modal('hide');
      })
      .catch(err => {
        var errArr = err.response.data.message;
        if("email" in errArr) {
          $("#error-email").text(errArr["email"][0]);
        }

        if("phone" in errArr) {
          $("#error-phone").text(errArr["phone"][0]);
        }
        if("first_name" in errArr) {
          $("#error-first_name").text(errArr["first_name"][0]);
        } 
      });
    });
        
	</script>
@endsection