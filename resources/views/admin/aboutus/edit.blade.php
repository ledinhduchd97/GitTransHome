@extends('admin.layouts.app')
@section('title','Edit About Us')
@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"/>
@endsection
@section('content')
    <div class="about_us-edit content-wrap content-wrap2" id="about_us-edit">
        <h2 class="about_us-edit__title" style="margin-left: 15px;">About us</h2>
        @if(session()->has('success'))
            <div class="alert alert-success" style="margin-left: 15px;">
                {{ session()->has('success') ? session('success') : "" }}
                {{ session()->forget('success') }}
            </div>
        @endif
        <form action="{{route('admin.aboutus.update')}}" method="post" accept-charset="utf-8"
              enctype="multipart/form-data" id="form-edit-customer">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="about-us-view about-us-view-wrap">
                <div class="about_us-view__content">
                    <div class="col-7 fleft">
                        <div class="about_us-view__left">
                            <div class="about_us-view__row">
                                <p class="text">Title</p>
                                <input class="content padding--base border--base" name="title" type="text"
                                       value="{{$aboutus->title}}" placeholder="Enter the title here"
                                       required="required"/>
                                @if($errors->has('title'))
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                            <div class="about_us-view__row">
                                <p class="text">Short description</p>
                                <input class="content padding--base border--base" type="text"
                                       value="{{$aboutus->short_description}}" name="short_description"
                                       placeholder="Short description" required="required"/>
                                @if($errors->has('short_description'))
                                    <p class="text-danger">{{ $errors->first('short_description') }}</p>
                                @endif
                            </div>
                            <div class="about_us-view__row">
                                <p class="text">Detail description</p>
                                <textarea id="editor" class="content padding--base border--base" name="detail_description"
                                          cols="30" rows="4" placeholder="Short description"
                                          required="required">{{$aboutus->detail_description}}</textarea>
                                @if($errors->has('detail_description'))
                                    <p class="text-danger">{{ $errors->first('detail_description') }}</p>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-5 fleft">
                        <div class="about_us-view__right text-center">
                            <div class="parent-img fleft col-50">
                                <div class="img position-relative">
                                    <img class="img--add image-responsive" src="{{asset($aboutus->image_avatar)}}"/>
                                    <button type="button" class="position-absolute close text-black"
                                            style="top: 10px; right: 10px;">&times;
                                    </button>
                                </div>
                                <label for="img-file1" class="btn btn-primary btn-inputfile">Select the file</label>
                                <input id="img-file1" type="file" name="image_avatar" style="display:none;"/>
                                <label>Image Avatar</label>
                            </div>
                            <div class="parent-img fleft col-50">
                                <div class="img position-relative">
                                    <img class="img--add image-responsive" src="{{asset($aboutus->image_signature)}}"/>
                                    <button type="button" class="position-absolute close text-black"
                                            style="top: 10px; right: 10px;">&times;
                                    </button>
                                </div>
                                <label for="img-file2" class="btn btn-primary btn-inputfile">Select the file</label>
                                <input id="img-file2" type="file" name="image_signature" style="display:none;"/>
                                <label>Image Signature</label>
                            </div>
                            <div class="clear-fix"></div>
                        </div>
                    </div>
                    <div class="clear-fix"></div>
                </div>
            </div>
            <!--.about-us-view-wrap-->
            <div class="about_us-edit__link text-center">
                <input class="btn--primary padding--base btn-save" type="submit" value="Save"/><a
                        class="btn--primary padding--base btn-cancel" href=""><span>Cancel</span></a>
            </div>
        </form>
    </div>
@endsection
@section('script')

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        (function previewImage() {
            $("input[type='file']").change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = (e) => {
                        console.log(this);
                        console.log($(this).parent(".parent-img"));
                        $(this).parent(".parent-img").find("img").attr('src', e.target.result);
                        $(this).parent(".parent-img").find(".close").show();
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });
        })();
        $(".close").click(function () {
            $(this).prev("img").attr("src", "");
            $(this).hide();
        });
    </script>
@endsection