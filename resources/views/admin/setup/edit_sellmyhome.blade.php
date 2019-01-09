@extends('admin.layouts.app')
@section('title','Sell my home')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"/>
    <link rel="stylesheet" href="{{asset('frontend-admin/libs/datepicker/jquery-ui.theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend-admin/libs/datepicker/jquery-ui.min.css')}}"/>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
    <style>
        a {
            text-decoration: none !important;
        }
    </style>
@endsection
@section('content')
	<div class="setup__freecash content-wrap content-wrap2" id="setup__freecash">
        <div class="setup-freecash setup-freecash-wrap">
          <div class="setup-freecash__top">
            <h2 class="setup-freecash__top--title">Set up Sell my house</h2>
            @if(session()->has('success'))
              <br/>
              <div class="alert alert-success text-center">
                  {{ session('success') }}
              </div>
              {{session()->forget('success')}}
            @endif
          </div>
          <div class="setup-freecash__main">
            <div class="setup-freecash--padding">
              <div class="setup-freecash__wrap">
                <form id="setup_freecash" action="{{route('admin.sellmyhome.update',['sellmyhome'=> 1])}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field("PUT") }}
                  <div class="setup-freecash__item">
                    <div class="text"><span>Note : </span></div>
                    <div class="content">
                      <input class="border--base padding--base" type="text" name="note" id="setup_note" required="required" maxlength="100" @if(isset($sellmyhome->note)) value="{{$sellmyhome->note}}" @endif />
                    </div>
                    <div class="clear-fix"></div>
                  </div>
                  <div class="setup-freecash__item">
                    <div class="text"><span>Title 1 : </span></div>
                    <div class="content">
                      <input class="border--base padding--base" type="text" name="title_1" id="setup_title1" required="required" maxlength="64" @if(isset($sellmyhome->title_1)) value="{{$sellmyhome->title_1}}" @endif/>
                    </div>
                    <div class="clear-fix"></div>
                  </div>
                  <div class="setup-freecash__item">
                    <div class="text"><span>Description 1 :</span></div>
                    <div class="content">
                      <input class="border--base padding--base" type="text" name="description_1" id="setup_description" required="required" maxlength="100" @if(isset($sellmyhome->description_1)) value="{{$sellmyhome->description_1}}" @endif/>
                    </div>
                    <div class="clear-fix"></div>
                  </div>
                  <div class="setup-freecash__item">
                    <div class="text"><span>Step : </span></div>
                    <div class="content">
                    	<!-- image 1 -->
                      <div class="setup-freecash--lv2">
                        <div class="text"><span>Image 1 : </span></div>
                        <div class="position-relative images">
                            @if(isset($sellmyhome->image_1))
                            <img class="image" id="image_1" src="{{asset($sellmyhome->image_1)}}" alt="">
                             @endif
                            <button type="button" class="position-absolute close text-black" style="top: 10px; right: 10px;">&times;</button>
                        </div>
                        <div class="content">
                          <input class="setup_image" type="file" id="setup_image1" name="image_1" onchange="loadFile_1(event)"/>
                        </div>
                        <div class="clear-fix"></div>
                      </div>
                      <div class="setup-freecash--lv2">
                        <div class="text"><span>Title image 1 : </span></div>
                        <div class="content">
                          <input class="border--base padding--base setup_step--title" type="text" id="setup_step--title" name="title_image_1" required="required" maxlength="64" @if(isset($sellmyhome->title_image_1)) value="{{$sellmyhome->title_image_1}}" @endif />
                        </div>
                        <div class="clear-fix"></div>
                      </div>
                      <div class="setup-freecash--lv2">
                        <div class="text"><span>Description image 1 : </span></div>
                        <div class="content">
                          <input class="border--base padding--base setup_step--description" type="text" id="setup_step--description" name="description_image_1" required="required" maxlength="100" @if(isset($sellmyhome->description_image_1)) value="{{$sellmyhome->description_image_1}}" @endif/>
                        </div>
                        <div class="clear-fix"></div>
                      </div>
                      <!-- image 2 -->
                      <div class="setup-freecash--lv2">
                        <div class="text"><span>Image 2 : </span></div>
                        <div class="position-relative images">
                            @if(isset($sellmyhome->image_2))
                              <img  class="image" id="image_2"  src="{{asset($sellmyhome->image_2)}}" alt="">
                            @endif
                            <button type="button" class="position-absolute close text-black" style="top: 10px; right: 10px;">&times;</button>
                        </div>
                        <div class="content">
                          <input class="setup_image" type="file" id="setup_image2" name="image_2" onchange="loadFile_2(event)"/>
                        </div>
                        <div class="clear-fix"></div>
                      </div>
                      <div class="setup-freecash--lv2">
                        <div class="text"><span>Title image 2 : </span></div>
                        <div class="content">
                          <input class="border--base padding--base setup_step--title" type="text" id="setup_step--title" name="title_image_2" required="required" maxlength="64" @if(isset($sellmyhome->title_image_2)) value="{{$sellmyhome->title_image_2}}" @endif />
                        </div>
                        <div class="clear-fix"></div>
                      </div>
                      <div class="setup-freecash--lv2">
                        <div class="text"><span>Description image 2 : </span></div>
                        <div class="content">
                          <input class="border--base padding--base setup_step--description" type="text" id="setup_step--description" name="description_image_2" required="required" maxlength="100" @if(isset($sellmyhome->description_image_2)) value="{{$sellmyhome->description_image_2}}" @endif/>
                        </div>
                        <div class="clear-fix"></div>
                      </div>
                      <!-- image 3 -->
                      <div class="setup-freecash--lv2">
                        <div class="text"><span>Image 3 : </span></div>
                        <div class="position-relative images">
                            @if(isset($sellmyhome->image_3))
                            <img class="image"  id="image_3" src="{{asset($sellmyhome->image_3)}}" alt="">
                            @endif
                            <button type="button" class="position-absolute close text-black" style="top: 10px; right: 10px;">&times;</button>
                        </div>
                        <div class="content">
                          <input class="setup_image" type="file" id="setup_image3" name="image_3" onchange="loadFile_3(event)"/>
                        </div>
                        <div class="clear-fix"></div>
                      </div>
                      <div class="setup-freecash--lv2">
                        <div class="text"><span>Title image 3 : </span></div>
                        <div class="content">
                          <input class="border--base padding--base setup_step--title" type="text" id="setup_step--title" name="title_image_3" required="required" maxlength="64" @if(isset($sellmyhome->title_image_3)) value="{{$sellmyhome->title_image_3}}" @endif/>
                        </div>
                        <div class="clear-fix"></div>
                      </div>
                      <div class="setup-freecash--lv2">
                        <div class="text"><span>Description image 3 : </span></div>
                        <div class="content">
                          <input class="border--base padding--base setup_step--description" type="text" id="setup_step--description" name="description_image_3" maxlength="100" @if(isset($sellmyhome->description_image_3)) value="{{$sellmyhome->description_image_3}}" @endif/>
                        </div>
                        <div class="clear-fix"></div>
                      </div>
                    </div>
                    <div class="clear-fix"></div>
                  </div>
                  <div class="setup-freecash__item">
                    <div class="text"><span>Title 2 : </span></div>
                    <div class="content">
                      <input class="border--base padding--base" type="text" name="title_2" id="setup_title2" required="required" maxlength="100" @if(isset($sellmyhome->title_2)) value="{{$sellmyhome->title_2}}" @endif/>
                    </div>
                    <div class="clear-fix"></div>
                  </div>
                  <div class="setup-freecash__item">
                    <div class="text"><span>Description 2 :</span></div>
                    <div class="content">
                    	<textarea class="description_2" name="description_2" rows="10" required maxlength="250">@if(isset($sellmyhome->description_2)){{$sellmyhome->description_2}}@endif</textarea>
                    </div>
                    <div class="clear-fix"></div>
                  </div>
                  <div class="setup-freecash__item">
                    <div class="text"><span>Table info :</span></div>
                    <table class="table--base setup-freecash__table">
                      @if(isset($table_infos))
                        @for($i = 0 ; $i < count($table_infos) ; $i++)
                          @if($i == 0)
                          <tr>
                            <td>
                              <input class="border--base padding--base" name="column_1[]" type="text" value="{{$table_infos[$i]->column_1}}" maxlength="50" />
                            </td>
                            <td>
                              <input class="border--base padding--base" name="column_2[]" type="text" value="{{$table_infos[$i]->column_2}}" maxlength="50"/>
                            </td>
                            <td>
                              <input class="border--base padding--base" name="column_3[]" type="text" value="{{$table_infos[$i]->column_3}}" maxlength="50"/>
                            </td>
                            <td>
                              <!-- <i class="fas fa-trash-alt"></i> -->
                            </td>
                          </tr>
                          @else
                          <tr>
                            <td>
                              <input class="border--base padding--base" name="column_1[]" type="text" value="{{$table_infos[$i]->column_1}}" maxlength="50" />
                            </td>
                            <td>
                              <input class="border--base padding--base" name="column_2[]" type="text" value="{{$table_infos[$i]->column_2}}" maxlength="50"/>
                            </td>
                            <td>
                              <input class="border--base padding--base" name="column_3[]" type="text" value="{{$table_infos[$i]->column_3}}" maxlength="50"/>
                            </td>
                            <td>
                              <i class="fas fa-trash-alt"></i>
                            </td>
                          </tr>
                          @endif
                        @endfor
                      @endif
                    </table>
                    <i class="fas fa-plus-square"></i>
                    <div class="clear-fix"></div>
                  </div>
                  <div class="setup-freecash__item text-center">
                    <div class="setup-freecash__button">
                      <input class="btn--primary border--base padding--base btn-setup--save" type="submit" value="Save"/>
                      <a href="{{route('admin.tasks.index')}}"><input class="btn--primary border--base padding--base" type="button" value="Cancel"/></a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--.setup-freecash-wrap-->
      </div>
@endsection
@section('script')
<script>
	$(".setup_image").css('display', 'none');
    var loadFile_1 = function(event) {
    	var output = document.getElementById('image_1');
    	output.src = URL.createObjectURL(event.target.files[0]);
  	};
  	var loadFile_2 = function(event) {
    	var output = document.getElementById('image_2');
    	output.src = URL.createObjectURL(event.target.files[0]);
  	};
  	var loadFile_3 = function(event) {
    	var output = document.getElementById('image_3');
    	output.src = URL.createObjectURL(event.target.files[0]);
  	};
  	$(".close").click(function(event) {
  		$(this).closest('.setup-freecash--lv2').find(".setup_image").css('display', 'block');
  		$(this).closest('.setup-freecash--lv2').find(".image").attr('src', '');
  		$(this).remove();
  	});
    $(".fa-plus-square").click(function(event) {
      $(".setup-freecash__table").append(`
            <tr>
              <td>
                <input class="border--base padding--base" name="column_1[]" type="text"/>
              </td>
              <td>
                <input class="border--base padding--base" name="column_2[]" type="text"/>
              </td>
              <td>
                <input class="border--base padding--base" name="column_3[]" type="text"/>
              </td>
              <td>
                <i class="fas fa-trash-alt"></i>
              </td>
            </tr>
        `);
      $(".fa-trash-alt").click(function(event) {
        $(this).closest('tr').remove();
      });
    });
    $(".fa-trash-alt").click(function(event) {
      $(this).closest('tr').remove();
    });
</script>
@endsection
