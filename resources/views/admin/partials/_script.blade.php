<script src="{{asset('frontend-admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{asset('frontend-admin/assets/js/plugins.js')}}"></script>
<script src="{{asset('frontend-admin/assets/js/main.js')}}"></script>


<script src="{{asset('frontend-admin/assets/js/lib/chart-js/Chart.bundle.js')}}"></script>
<script src="{{asset('frontend-admin/assets/js/dashboard.js')}}"></script>
<script src="{{asset('frontend-admin/assets/js/widgets.js')}}"></script>
<script src="{{asset('frontend-admin/assets/js/lib/vector-map/jquery.vmap.js')}}"></script>
<script src="{{asset('frontend-admin/assets/js/lib/vector-map/jquery.vmap.min.js')}}"></script>
<script src="{{asset('frontend-admin/assets/js/lib/vector-map/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('frontend-admin/assets/js/lib/vector-map/country/jquery.vmap.world.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{asset('frontend-admin/libs/datepicker/jquery-ui.js')}}"></script>
<!-- <script src="{{asset('frontend-admin/libs/validation/validation.js')}}"></script> -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{asset('frontend-admin/js/core.js')}}"></script>

<script>
    ( function ( $ ) {
        "use strict";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>
<script>
    $('#change-pass-form').submit(function (e) { 
        e.preventDefault();
        
        // get data from form
        const data = $(this).serializeArray();

        // convert data to json
        const postData = {};
        data.forEach(item => {
            postData[item.name] = item.value;
        });

        const url = "{{ route('admin.change_password', ['id' => Auth::user()->id]) }}";

        axios.post(url, postData)
        .then(res => {
            window.location.reload();
        })
        .catch(err => {
            var error = err.response.data.error;
            $.each($(this).serializeArray(), (index, field) => {
                if(field.name in error) {
                    if($("#" + field.name).next(".alert")){
                        $("#" + field.name).next(".alert").remove();
                        $(`<div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            ${error[field.name][0]}</div>
                        `).insertAfter("#" + field.name);
                    }
                } else {
                    $("#" + field.name).next(".alert").remove();
                }
            })
        })
    });


</script>
@yield('script')