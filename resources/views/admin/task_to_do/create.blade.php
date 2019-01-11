@extends('admin.layouts.app')
@section('title','Tasks to do')
@section('css')
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"/>
    <link rel="stylesheet" href="{{asset('frontend-admin/libs/datepicker/jquery-ui.theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend-admin/libs/datepicker/jquery-ui.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend-admin/style.css')}}"/> 
    <link rel="stylesheet" href="{{asset('frontend-admin/picker.min.css')}}">
@endsection
@section('content')
      <div class="tasktodo-add content-wrap content-wrap2" id="tasktodo-add">
        <div class="tasktodo tasktodo-wrap">
          <div class="tasktodo-edit__top">
            <h2 class="tasktodo-edit__top--title">Add new task to do</h2>
            @if(session()->has('success'))
            <div class="alert alert-success">
                    {{ session()->has('success') ? session('success') : "" }}
                    {{ session()->forget('success') }}
            </div>
           @endif
          </div>
          <div class="tasktodo-edit__main">
            <form id="form--tasktodo-edit" action="{{route('admin.tasks.store')}}" method="post">
              {{ csrf_field() }}
              {{ method_field('POST') }}
              <div class="tasktodo-edit--item">
                <div class="text"><span>Title task :</span></div>
                <div class="content">
                  <input class="border--base padding--base" type="text" value="{{old('title')}}" name="title" required maxlength="250" pattern="^[A-Za-z0-9 ]*$" />
                   @if(sizeof($errors) != 0)
                    @if($errors)
                      <p style="color:red; font-size: 10px;">{{$errors->first('title')}}</p>
                    @endif
                  @endif
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="tasktodo-edit--item">
                <div class="text"><span>Customer Name :</span></div>
                <div class="content">
                  <select class="padding--base border--base customer_id"  name="customer_id" id="ex-search" required>
                    @if(isset($customers))
                      @if(old('customer_id'))
                          @foreach($customers as $customer)
                            <option value="{{$customer->id}}" {{$customer->id == old('customer_id') ? 'selected' : ''}}>{{$customer->first_name}} {{$customer->last_name}}</option>
                          @endforeach
                      @else
                          @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->first_name}} {{$customer->last_name}}</option>
                          @endforeach
                      @endif
                      
                    @endif
                  </select>
                  @if(sizeof($errors) != 0)
                    @if($errors)
                      <p style="color:red; font-size: 10px;">{{$errors->first('customer_id')}}</p>
                    @endif
                  @endif
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="tasktodo-edit--item">
                <div class="text"><span>To do type :</span></div>
                <div class="content">
                  <input class="border--base padding--base" type="text" value="{{old('to_do_type')}}" name="to_do_type" required pattern="^[A-Za-z0-9 ]*$" maxlength="250" />
                  @if(sizeof($errors) != 0)
                    @if($errors)
                      <p style="color:red; font-size: 10px;">{{$errors->first('to_do_type')}}</p>
                    @endif
                  @endif
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="tasktodo-edit--item">
                <div class="text"><span>Start task on :</span></div>
                <div class="content">
                  <input class="border--base padding--base" type="datetime-local" value="{{old('start_task')}}" name="start_task" required />
                  @if(sizeof($errors) != 0)
                    @if($errors)
                      <p style="color:red; font-size: 10px;">{{$errors->first('start_task')}}</p>
                    @endif
                  @endif
                </div>
                <div class="clear-fix"></div>
              </div>
             <!-- <div class="tasktodo-edit--item">
                <div class="text"><span>Age :</span></div>
                <div class="content">
                  <input class="border--base padding--base" type="text" value="" name="age"/>
                  @if(sizeof($errors) != 0)
                    @if($errors)
                      <p style="color:red; font-size: 10px;">{{$errors->first('age')}}</p>
                    @endif
                  @endif
                </div>
                <div class="clear-fix"></div>
              </div> -->
              <div class="tasktodo-edit--item">
                <div class="text"><span>Time :</span></div>
                <div class="content">
                  <input class="border--base padding--base" type="datetime-local" value="{{old('deadline')}}" name="deadline" required />
                  @if(sizeof($errors) != 0)
                    @if($errors)
                      <p style="color:red; font-size: 10px;">{{$errors->first('deadline')}}</p>
                    @endif
                  @endif
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="tasktodo-edit--item">
                <div class="text"><span>Note :</span></div>
                <div class="content">
                  <textarea id="editor" class="content padding--base border--base" name="note" cols="30" rows="6" placeholder="Short description" required maxlength="250">{{old('note')}}</textarea>
                  @if(sizeof($errors) != 0)
                    @if($errors)
                      <p style="color:red; font-size: 10px;">{{$errors->first('note')}}</p>
                    @endif
                  @endif
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="tasktodo-edit--item">
                <div class="text"><span>Ranking :</span></div>
                <div class="content">
                  <select class="padding--base border--base" id="tasktodo-add--rank" name="ranking" required>
                    <option {{ old('ranking')=='0' ? "selected" : ""}} value="0">Low</option>
                    <option {{ old('ranking')=='1' ? "selected" : ""}} value="1">High</option>
                    <option {{ old('ranking')=='2' ? "selected" : ""}} value="2">Normal</option>
                  </select>
                  @if(sizeof($errors) != 0)
                    @if($errors)
                      <p style="color:red; font-size: 10px;">{{$errors->first('ranking')}}</p>
                    @endif
                  @endif
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="tasktodo-edit--item">
                <div class="text"><span>Status :</span></div>
                <div class="content">
                  <select class="padding--base border--base" id="tasktodo-add--status" name="status" required>
                    <option {{ old('status')=='1' ? "selected" : ""}} value="1">Done</option>
                    <option {{ old('status')=='0' ? "selected" : ""}} value="0">Waiting</option>
                  </select>
                  @if(sizeof($errors) != 0)
                    @if($errors)
                      <p style="color:red; font-size: 10px;">{{$errors->first('status')}}</p>
                    @endif
                  @endif
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="tasktodo-edit--item">
                <div class="text"><span>Assigned to  :</span></div>
                <div class="content">
                  @if($errors->has('assigned'))
                    <input class="border--base padding--base" type="text"  value="{{ old('assigned') }}" name="assigned" required maxlength="190" />
                  @else
                    <input class="border--base padding--base" type="text"  value="Tranhomes" name="assigned"/>
                  @endif
                  @if(sizeof($errors) != 0)
                    @if($errors)
                      <p style="color:red; font-size: 10px;">{{$errors->first('assigned')}}</p>
                    @endif
                  @endif
                </div>
                <div class="clear-fix"></div>
              </div>
              <div class="tasktodo-edit--item text-center">
                <input class="btn--submit btn--primary padding--base" type="submit" value="Submit"/><a class="btn--primary padding--base btn--cancel" href="{{route('admin.tasks.index')}}">Cancel</a>
              </div>
            </form>
          </div>
        </div>
        <!--.tasktodo-wrap-->
      </div>
@endsection
@section('script')
      
      <script type="text/javascript" src="{{asset('frontend-admin/picker.min.js')}}"></script>
      <script>
        $('#ex-search').picker({search : true});
      </script>
      <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
      <script>
      ClassicEditor
              .create( document.querySelector( '#editor' ) )
              .catch( error => {
                  console.error( error );
              } );
      </script>
@endsection
