@extends('admin.layouts.app')
@section('title','Edit House')
@section('content')
    @if(isset($house))
        <div class="house-edit content-wrap content-wrap2" id="house-edit">
            <div class="edit-house edit-house-wrap">
                <div class="edit-house__top">
                    <h2 class="edit-house__top--title">Edit house</h2>
                </div>
                <div class="edit-house__main">
                    <div class="edit-house--left fleft">
                        <div class="edit-house--padding">
                            <div class="edit-house--left__content">
                                <form action="{{ route('admin.house.update', ['house' => $house->id]) }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field("PUT") }}
                                    <div class="edit-house--left__title">
                                        <h3>Overview</h3>
                                    </div>
                                    @if(session()->has('success'))
                                        <div class="text-center">
                                            <p class="text-success">
                                                {{ session('success') }}
                                            </p>
                                        </div>
                                    @endif
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>House name :</span></div>
                                        <input type="hidden" value="{{Auth::id()}}" name="user_update">
                                        <div class="content">
                                            <input class="border--base padding--base" type="text"
                                                   value="{{$house->name}}" name="name"/>
                                            @if($errors->has('name'))
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Code :</span></div>
                                        <div class="content">
                                            <input class="border--base padding--base" type="text"
                                                   value="{{$house->code}}" name="code"/>
                                            @if($errors->has('code'))
                                                <p class="text-danger">{{ $errors->first('code') }}</p>
                                            @endif
                                        </div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Note :</span></div>
                                        <div class="content">
                                            <input class="border--base padding--base" type="text"
                                                   value="{{$house->note}}" name="note"/>
                                            @if($errors->has('note'))
                                                <p class="text-danger">{{ $errors->first('note') }}</p>
                                            @endif
                                        </div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Phone :</span></div>
                                        <div class="content">
                                            <input class="border--base padding--base" type="text"
                                                   value="{{$house->phone}}" name="phone"/>
                                            @if($errors->has('phone'))
                                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                                            @endif
                                        </div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Address :</span></div>
                                        <div class="content">
                                            <input class="border--base padding--base" type="text"
                                                   value="{{$house->address}}" name="address"/>
                                            @if($errors->has('address'))
                                                <p class="text-danger">{{ $errors->first('address') }}</p>
                                            @endif
                                        </div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Area :</span></div>
                                        <div class="content">
                                            <input class="border--base padding--base" type="text"
                                                   value="{{$house->area}}" name="area"/>
                                            @if($errors->has('area'))
                                                <p class="text-danger">{{ $errors->first('area') }}</p>
                                            @endif
                                        </div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <div class="edit-house--left__title">
                                        <h3>Facts and Features</h3>
                                    </div>
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Number_bedroom :</span></div>
                                        <div class="content">
                                            <input class="border--base padding--base" type="text"
                                                   value="{{$house->number_bedroom}}" name="number_bedroom"/>
                                            @if($errors->has('number_bedroom'))
                                                <p class="text-danger">{{ $errors->first('number_bedroom') }}</p>
                                            @endif
                                        </div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Number_bathroom :</span></div>
                                        <div class="content">
                                            <input class="border--base padding--base" type="text"
                                                   value="{{$house->number_bathroom}}" name="number_bathroom"/>
                                            @if($errors->has('number_bathroom'))
                                                <p class="text-danger">{{ $errors->first('number_bathroom') }}</p>
                                            @endif
                                        </div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Living Area :</span></div>
                                        <div class="content">
                                            <input class="border--base padding--base" type="text"
                                                   value="{{$house->site_area}}" name="site_area"/>
                                            @if($errors->has('site_area'))
                                                <p class="text-danger">{{ $errors->first('site_area') }}</p>
                                            @endif
                                        </div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Lot Size :</span></div>
                                        <div class="content">
                                            <input class="border--base padding--base" type="text"
                                                   value="{{$house->area_gross_floor}}" name="area_gross_floor"/>
                                            @if($errors->has('area_gross_floor'))
                                                <p class="text-danger">{{ $errors->first('area_gross_floor') }}</p>
                                            @endif
                                        </div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Price :</span></div>
                                        <div class="content">
                                            <input class="border--base padding--base" id="price" type="text"
                                                   value="{{$house->price}}" name="price"/><span class="unit-text">Unit :</span>
                                            <select class="border--base padding--base" id="unit" name="unit">
                                                    <option value="0" {{$house->get_value_unit($house->unit) == 0?"selected":""}}>€</option>
                                                    <option value="1" {{$house->get_value_unit($house->unit) == 1?"selected":""}}>$</option>
                                                    <option value="2" {{$house->get_value_unit($house->unit) == 2?"selected":""}}>£</option>
                                            </select>
                                            @if($errors->has('unit'))
                                                <p class="text-danger">{{ $errors->first('unit') }}</p>
                                            @endif
                                        </div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <!-- image -->
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Images Slide Page Home :</span></div>
                                        <div class="content">
                                            <div class="image_slide_home" style="width: 91%;">
                                                @foreach($house->images as $image)
                                                    @if($image->level == 1)
                                                        <div class="position-relative images">
                                                            <img src="{{asset($image->link)}}" alt="">
                                                            <button type="button" class="position-absolute close text-black" style="top: 10px; right: 10px;">&times;</button>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <img src=""/>
                                                <input type="file" style="display:none;" name="image_home" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <!--  -->
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Images Slide Page Detail :</span></div>
                                        <div class="content" id="content_image">
                                            <div class="image_slide_detail" style="width: 91%;">
                                                @foreach($house->images as $image)
                                                    @if($image->level == 2)
                                                        <div class="position-relative images">
                                                            <img src="{{asset($image->link)}}" alt="">
                                                            <button type="button" class="position-absolute close text-black" style="top: 10px; right: 10px;">&times;</button>
                                                            <input type="hidden" value="{{ $image->id }}" name="images_slide[]">
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <input type="hidden" value="" name="images_slide[]">
                                                <img src=""/>
                                                <input type="file" name="image[]" accept="image/*">
                                            </div>
                                        </div>
                                        <span class="add_more_image" title="Add image"
                                              style="font-size: 25px; position: relative; top:-30px;left: 72%;"><i
                                                    class="fas fa-plus-square"></i></span>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <!--  -->

                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Images Thumb :</span></div>
                                        <div class="content">
                                            <div class="image_thumb_detail" style="width: 91%;">
                                                @foreach($house->images as $image)
                                                    @if($image->level == 3)
                                                        <div class="position-relative images">
                                                            <img src="{{asset($image->link)}}" alt="">
                                                            <button type="button" class="position-absolute close text-black" style="top: 10px; right: 10px;">&times;</button>
                                                            <input type="file" class="d-none">
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <img src=""/>
                                                <input type="file" style="display: none;" name="image_thumb" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <!-- /image -->
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Video URL :</span></div>
                                        <div class="content">
                                            <input class="border--base padding--base" id="file_youtube" type="url"
                                                   name="video" value="{{$house->video}}"/>
                                            @if($errors->has('video'))
                                                <p class="text-danger">{{ $errors->first('video') }}</p>
                                            @endif
                                        </div>
                                        <div class="clear-fix"></div>
                                    </div>
                                    <div class="edit-house--left__item">
                                        <div class="text"><span>Description :</span></div>
                                        <div class="content">
                                            <textarea class="border--base padding--base" id="desc" name="description"
                                                      cols="30" rows="10" value="">{{$house->description}}</textarea>
                                            @if($errors->has('description'))
                                                <p class="text-danger">{{ $errors->first('description') }}</p>
                                            @endif
                                        </div>
                                        <div class="clear-fix"></div>
                                        <div class="edit-house--left__title">
                                            <h3>General Information</h3>
                                        </div>
                                        <div class="edit-house--left__item">
                                            <div class="text"><span>Brokerage Name :</span></div>
                                            <div class="content">
                                                <input class="border--base padding--base" type="text"
                                                       value="{{$house->brokerage}}" name="brokerage"/>
                                                @if($errors->has('brokerage'))
                                                    <p class="text-danger">{{ $errors->first('brokerage') }}</p>
                                                @endif
                                            </div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="edit-house--left__item">
                                            <div class="text"><span>Agent :</span></div>
                                            <div class="content">
                                                <input class="border--base padding--base" type="text"
                                                       value="{{$house->agent}}" name="agent"/>
                                                @if($errors->has('agent'))
                                                    <p class="text-danger">{{ $errors->first('agent') }}</p>
                                                @endif
                                            </div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="edit-house--left__item">
                                            <div class="text"><span>License :</span></div>
                                            <div class="content">
                                                <input class="border--base padding--base" type="text"
                                                       value="{{$house->license}}" name="license"/>
                                                @if($errors->has('license'))
                                                    <p class="text-danger">{{ $errors->first('license') }}</p>
                                                @endif
                                            </div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="edit-house--left__item">
                                            <div class="text"><span>MLS Number :</span></div>
                                            <div class="content">
                                                <input class="border--base padding--base" type="text"
                                                       value="{{$house->mls}}" name="mls"/>
                                                @if($errors->has('mls'))
                                                    <p class="text-danger">{{ $errors->first('mls') }}</p>
                                                @endif
                                            </div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="edit-house--left__item">
                                            <div class="text"><span>Zipcode :</span></div>
                                            <div class="content">
                                                <input class="border--base padding--base" type="text"
                                                       value="{{$house->zipcode}}" name="zipcode"/>
                                                @if($errors->has('zipcode'))
                                                    <p class="text-danger">{{ $errors->first('zipcode') }}</p>
                                                @endif
                                            </div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="edit-house--left__item">
                                            <div class="text"><span>Year Built :</span></div>
                                            <div class="content">
                                                <input class="border--base padding--base" type="text"
                                                       value="{{$house->builded_year}}" name="builded_year"/>
                                                @if($errors->has('builded_year'))
                                                    <p class="text-danger">{{ $errors->first('builded_year') }}</p>
                                                @endif
                                            </div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="edit-house--left__item">
                                            <div class="text"><span>Status :</span></div>
                                            <div class="content">
                                                <select class="border--base padding--base" id="status" name="status">
                                                        <option value="0" {{ $house->status===0 ? "selected" : ""}}>New</option>
                                                        <option value="1" {{ $house->status===1 ? "selected" : ""}}>Bought</option>
                                                </select>
                                                @if($errors->has('status'))
                                                    <p class="text-danger">{{ $errors->first('status') }}</p>
                                                @endif
                                            </div>
                                            <div class="clear-fix"></div>
                                        </div>
                                        <div class="edit-house--left__item text-center">
                                            <button class="btn--save btn--primary padding--base" type="submit">Save
                                            </button>
                                            <a class="btn--primary padding--base btn--cancel"
                                               href="{{ route('admin.house.index') }}">Cancel</a>
                                            <div class="clear-fix"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--.edit-house-wrap-->
            <div class="edit-house--right fright">
                <div class="edit-house--padding">
                    <div class="edit-house--right__content">
                        <h4>Lưu thay đổi</h4>
                        <p><i class="fas fa-calendar-alt"></i>Được đăng bởi:<span
                                    class="time-up">{{ $house->created_at }} </span><span class="admin-up">{{ $house->user->fullname }}</span></p>
                        @if(isset($house->user_updated->fullname))
                        <p>Được chỉnh sửa lần cuối by <strong class="admin-edit">{{ $house->user_updated->fullname }} </strong><span
                                    class="time-edit">{{ $house->updated_at }}</span></p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="clear-fix"></div>
        </div>
    @endif
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#desc' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script type="text/javascript">
        function previewImage(){
            $("input[type='file']").change(function(){

                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = (e) => {
                        $(this).prev("img").attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });
        }

        previewImage();

        // click add image more
        var click = $(".add_more_image").click(function (event) {
            // $(this).remove();
            $(".image_slide_detail").append(`
                <img src/>
                <input type="file" name="image[]" accept="image/*">
            `);
            previewImage();
        });
        click;



        $(".close").click(function(){
            $(this).parents(".images").siblings("input[type='file']").show();
            $(this).parents(".images").remove();
        });
    </script>
@endsection