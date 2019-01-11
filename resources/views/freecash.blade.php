@extends('layouts.app')
@section('title','Sell my home')
@section('css')
@endsection
@section('content')
      <div class="free-cash free-cash-wrap">
        <div class="free-cash__title">
          @if(isset($sellmyhome->note))
          <h2 class="text-center">{{$sellmyhome->note}}</h2>
          @endif
        </div>
        <div class="free-cash__search">
          <div class="container">             
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <form id="form_search" action="#">
                	<!-- modal -->
                  <!-- <label>Address</label> -->
                  <input id="how_we__search" type="text" name="how_we__search" placeholder="Enter your address" value="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your address'" /><a class="btn btn-primary btn-base btn_search" id="btn-map" data-toggle="" data-target=".modal_map" maxlength="255"><span>Submit</span></a>
                </form>
                <div class="message-address" style="display: none; margin: 7px auto; max-width: 1030px;">
                	<p style="color:red; font-size: 12px;">Address must be filled out</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="free-cash__how-we-buy">
          <div class="container">
            <div class="modal-header">
              @if(isset($sellmyhome->title_1))
                <h3 class="modal-title form_information__title" id="form_information__title">{{$sellmyhome->title_1}}</h3>
              @endif
              @if(isset($sellmyhome->description_1))
                <h4>{{$sellmyhome->description_1}}</h4>
              @endif
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-4 col-sm-4">
                  <div class="how_we--item">@if(isset($sellmyhome->image_1))<img class="how_we--item__img" src="{{asset($sellmyhome->image_1)}}" alt="anh"/>@endif
                    @if(isset($sellmyhome->title_image_1))
                    <h4 class="how_we--item__title">{{$sellmyhome->title_image_1}}</h4>
                    @endif
                    @if(isset($sellmyhome->description_image_1))
                    <p class="how_we--item__desc">{{$sellmyhome->description_image_1}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                  <div class="how_we--item">@if(isset($sellmyhome->image_2))<img class="how_we--item__img" src="{{asset($sellmyhome->image_2)}}" alt="anh"/>@endif
                    @if(isset($sellmyhome->title_image_2))
                    <h4 class="how_we--item__title">{{$sellmyhome->title_image_2}}</h4>
                    @endif
                    @if(isset($sellmyhome->description_image_2))
                    <p class="how_we--item__desc">{{$sellmyhome->description_image_2}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                  <div class="how_we--item">@if(isset($sellmyhome->image_3))<img class="how_we--item__img" src="{{asset($sellmyhome->image_3)}}" alt="anh"/>@endif
                    @if(isset($sellmyhome->title_image_3))
                      <h4 class="how_we--item__title">{{$sellmyhome->title_image_3}}</h4>
                    @endif
                    @if(isset($sellmyhome->description_image_3))
                    <p class="how_we--item__desc">{{$sellmyhome->description_image_3}}</p>
                    @endif
                  </div>
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
                  @if(isset($sellmyhome->title_2))
                    <h3 class="how_we__table-title">{{$sellmyhome->title_2}}</h3>
                  @endif
                  @if(isset($sellmyhome->description_2))
                  <p class="how_we__table-desc">{{$sellmyhome->description_2}}</p>
                  @endif 
                  <table class="how_we__table-infor col-md-12">
                    @if(isset($tables))
                      @foreach($tables as $table)
                      <tr>
                        <th class="col-md-4">{{$table->column_1}}</th>
                        <th class="col-md-4">{{$table->column_2}}</th>
                        <th class="col-md-4">{{$table->column_3}}</th>
                      </tr>
                      @endforeach
                    @endif
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
                                  <input id="email" type="text" value="{{ request()->email }}" name="email" placeholder="Email *"/>
                                  <label id="error-email" class="error" for="email"></label>
                                  <label id="check-email" style="font-size: 9px; color: red !important; position: absolute; z-index: 9; width: 100%; text-align: left; left: 0; bottom: -20px;" for="email"></label>
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
                            <div id="map" style="width:100%;height:100%" class="map_free">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14894.996624771036!2d105.74365575!3d21.0427206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1547023904313" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal_thanks modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modal_thanks__title" aria-hidden="true" id="model_thanks">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content modal-thanks"><a id="close_thank" class="close btn btn-base" aria-label="Close" href="{{ route('get.index') }}"><span aria-hidden="true">&times;</span></a>
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
    var get_price = $(".btn-get_price");
    var modal_map = $(".modal_map");
    $('#form__infor').validate({
    rules: {
      first_name: {
        required: true,
        maxlength: 10,
        minlength: 1
        // regex: /G[a-b].*/i
      },
      email: {
        required: true,
        regex: /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      },
      phone: {
        required: true,
        minlength: 10,
        maxlength: 15,
        regex: /^[0-9-+s()]*$/
      } 
    },
    messages: {
      first_name: {
        required: 'First name must be filled out',
        maxlength: jQuery.validator.format('First name must be not over 10 characters'),
        minlength: jQuery.validator.format('First name must be at least 1 characters'),
        regex: 'The first name must be in the correct format' 
      },
      email: {
        required: 'Email must be filled out',
        regex: 'The email must be in the correct format' 
      },
      phone: {
        required: 'The phone must be filled out',
        minlength: jQuery.validator.format('The phone must be at least 10 characters'),
        maxlength: jQuery.validator.format('The phone must be not over 15 characters'),
        regex: 'The phone format is invalid'
      } 
    } 
  });
    $("#email").keyup(function(event) {
      var data = $(this).val();
      $.ajax({
        url: '{{route('post.email.customers')}}',
        type: 'POST',
        dataType: 'JSON',
        data: {email: data},
        success: function (data){
          $("#check-email").text('');
        },
        error: function (error){
          $("#check-email").text(error.responseJSON.message);
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
      $.ajax({
        type:'POST',
          url: '{{route('post.addcustomer')}}', 
          dataType: 'json',
          data:data,
          success: function(data){
          },
        });
        if ($('#form__infor').valid() == true) {// here you check if validation returned true or false
          // if()
          let name = $("#error-first_name").text();
          let email = $("#error-email").text();
          let phone = $("#error-phone").text();
          let check = $("#check-email").text();
          if(name == '' && email == '' && phone == '' && check=='')
          {
            modal_map.modal('hide');
            get_price.attr('data-target', '.modal_thanks');
          }
        }
      });
      $('#model_thanks').on('hidden.bs.modal', function () {
        get_price.attr('data-target', '');
      });
	</script>
@endsection