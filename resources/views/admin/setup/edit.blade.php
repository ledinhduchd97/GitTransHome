@extends('admin.layouts.app')
@section('title','Setup')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
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
    <div class="content-wrap">
        <div class="container">
        <div class="set-up__top">
            @if(session()->has('success'))
                <br/>
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
                {{session()->forget('success')}}
            @endif
            <div class="set-up__top--title">
                <h2>Set up</h2>
            </div>
            <form class="form-horizontal" action="{{ route('admin.setups.update', ['setup' => $setup->id]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field("PUT") }}
                <h3 class="text-center font-weight-bold set-up__content--title">
                    Set up overview
                </h3>
                <div class="form-group form--base set-up-form--item">
                    <label class="control-label col-sm-2 text" for="website_name">Website name:</label>    
                    <div class="col-sm-10 content">
                        <input type="text" class="form-control border--base padding--base" id="website_name" value="{{ $setup->website_name }}" name="website_name" required maxlength="25">
                        @if ($errors)
                            <p class="text-danger">{{ $errors->first('website_name') }}</p>
                        @endif
                    </div>
                    <div class="clear-fix"></div>
                </div>
                <div class="form-group form--base set-up-form--item">
                    <label class="control-label col-sm-2 text" for="description">Description:</label>
                    <div class="col-sm-10 content">
                        <textarea class="form-control" name="description" required maxlength="250">{{ $setup->description }}</textarea>
                        @if ($errors)
                            <p class="text-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                    <div class="clear-fix"></div>
                </div>
                <div class="form-group form--base set-up-form--item">
                    <label class="control-label col-sm-2 text" for="image">Logo header:</label>
                    <div class="col-sm-10 content">
                        <div class="position-relative images">
                            <img src="{{ asset($setup->logo_header) }}" alt="">
                            <button type="button" class="position-absolute close text-black" style="top: 10px; right: 10px;">&times;</button>
                        </div>
                        <input type="file" id="image" name="logo_header">
                        <!-- <input type="hidden" name="logo_header"> -->
                        @if ($errors)
                            <p class="text-danger">{{ $errors->first('logo_header') }}</p>
                        @endif
                    </div>
                    <div class="clear-fix"></div>
                </div>
                <div class="form-group form--base set-up-form--item">
                    <label class="control-label col-sm-2 text" for="image">Logo footer:</label>
                    <div class="col-sm-10 content">
                        <div class="position-relative images">
                            <img src="{{ asset($setup->logo_footer) }}" alt="">
                            <button type="button" class="position-absolute close text-black" style="top: 10px; right: 10px;">&times;</button>
                        </div>
                        <input type="file" id="image" name="logo_footer">
                        <!-- <input type="hidden" name="logo_footer"> -->
                        @if ($errors)
                            <p class="text-danger">{{ $errors->first('logo_footer') }}</p>
                        @endif
                    </div>
                    <div class="clear-fix"></div>
                </div>
                <div class="form-group form--base set-up-form--item">
                    <label class="control-label col-sm-2 text">Thank you:</label>
                    <div class="col-sm-10 content">
                        <textarea name="thank_you" id="news" cols="30" rows="10">{{$setup->thank_you}}</textarea>
                        @if ($errors)
                            <p class="text-danger">{{ $errors->first('thank_you') }}</p>
                        @endif
                    </div>
                    <div class="clear-fix"></div>
                </div>
                <div class="form-group form--base set-up-form--item">
                    <label class="control-label col-sm-2 text">Description sell my home:</label>
                    <div class="col-sm-10 content">
                        <textarea name="sell_my_home"  cols="30" rows="10">{{$setup->sell_my_home}}</textarea>
                        @if ($errors)
                            <p class="text-danger">{{ $errors->first('sell_my_home') }}</p>
                        @endif
                    </div>
                    <div class="clear-fix"></div>
                </div>
                <h3 class="text-center font-weight-bold set-up__content--title">
                    Information company
                </h3>
                <div class="form-group form--base set-up-form--item">
                    <label for="phone" class="control-label col-sm-2 text">Phone number</label>
                    <div class="col-sm-10 content">
                        <input type="text" class="form-control border--base padding--base" value="{{ $setup->phone }}" id="phone" name="phone">
                        @if ($errors)
                            <p class="text-danger">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>
                    <div class="clear-fix"></div>
                </div>
                <div class="form-group form--base set-up-form--item">
                    <label for="email" class="control-label col-sm-2 text">Email</label>
                    <div class="col-sm-10 content">
                        <input type="text" class="form-control border--base padding--base" value="{{ $setup->email }}" id="email" name="email" required maxlength="100">
                        @if ($errors)
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="clear-fix"></div>
                </div>
                <div class="form-group form--base set-up-form--item">
                    <label for="address" class="control-label col-sm-2 text">Address</label>
                    <div class="col-sm-10 content">
                        <input type="text" class="form-control border--base padding--base" value="{{ $setup->address }}" id="address" name="address" required maxlength="250">
                        @if ($errors)
                            <p class="text-danger">{{ $errors->first('address') }}</p>
                        @endif
                    </div>
                    <div class="clear-fix"></div>
                </div>
                <div class="form-group form--base set-up-form--item">
                    <label for="address" class="control-label col-sm-2 text">License</label>
                    <div class="col-sm-10 content">
                        <input type="text" class="form-control border--base padding--base" value="{{ $setup->lisence }}" id="lisence" name="lisence" required maxlength="250">
                        @if ($errors)
                            <p class="text-danger">{{ $errors->first('lisence') }}</p>
                        @endif
                    </div>
                    <div class="clear-fix"></div>
                </div>

                <h3 class="text-center font-weight-bold set-up__content--title">
                    Link
                </h3>
                <div class="form-group form--base set-up-form--item">
                    <label for="facebook" class="control-label col-sm-2 text">Facebook</label>
                    <div class="col-sm-10 content">
                        <input type="text" class="form-control border--base padding--base" value="{{ $setup->facebook }}" id="facebook" name="facebook" required>
                        @if ($errors)
                            <p class="text-danger">{{ $errors->first('facebook') }}</p>
                        @endif
                    </div>
                    <div class="clear-fix"></div>
                </div>
                <div class="form-group form--base set-up-form--item">
                    <label for="instagram" class="control-label col-sm-2 text">Instagram</label>
                    <div class="col-sm-10 content">
                        <input type="text" class="form-control border--base padding--base" value="{{ $setup->instagram }}" id="instagram" name="instagram" required>
                        @if ($errors)
                            <p class="text-danger">{{ $errors->first('instagram') }}</p>
                        @endif
                    </div>
                    <div class="clear-fix"></div>
                </div>
                <div class="form-group form--base set-up-form--item">
                    <label for="twitter" class="control-label col-sm-2 text">Twitter</label>
                    <div class="col-sm-10 content">
                        <input type="text" class="form-control border--base padding--base" value="{{ $setup->twitter }}" id="twitter" name="twitter" required>
                        @if ($errors)
                            <p class="text-danger">{{ $errors->first('twitter') }}</p>
                        @endif
                    </div>
                    <div class="clear-fix"></div>
                </div>
                <div class="form-group form--base set-up-form--item text-center">
                    <button class="btn btn-primary border--base padding--base" type="submit">Save</button>
                    <button class="btn btn-secondary border--base padding--base">Cancel</button>
                </div>
            </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script>
    ClassicEditor
            .create( document.querySelector( '#news' ) )
            .catch( error => {
                console.error( error );
            } );
</script>
<script>
    ClassicEditor
            .create( document.querySelector( '#sell' ) )
            .catch( error => {
                console.error( error );
            } );
</script>
<script>
    
    (function previewImage(){
        $("input[type='file']").change(function(){

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = (e) => {
                    $(this).prev(".images").find("img").attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    })();

    $(".close").click(function(){
        $(this).parents(".images").find("img").attr('src', "");
    });
</script>
@endsection
