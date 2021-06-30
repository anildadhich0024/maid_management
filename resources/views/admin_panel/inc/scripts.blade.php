<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard/dash_1.js')}}"></script>
<script src="{{asset('plugins/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('plugins/bootstrap-maxlength/custom-bs-maxlength.js')}}"></script>
<script src="{{asset('assets/js/form-validation.min.js')}}"></script>
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('plugins/select2/custom-select2.js')}}"></script>
<script src="{{asset('plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{asset('plugins/editors/markdown/simplemde.min.js')}}"></script>
<script src="{{asset('plugins/editors/markdown/custom-markdown.js')}}"></script>
<script>
    checkall('todoAll', 'todochkbox');
    $('[data-toggle="tooltip"]').tooltip()
    $('selector').maxlength();
    new SimpleMDE({
        element: document.getElementById("ck_editor"),
        spellChecker: false,
    });
    $(".tagging").select2({
        tags: true
    });

    $('.delete-user').click(function(e){
        if (confirm('Are you sure to delete ?')) {
            $(e.target).closest('form').submit()
        }
    });
</script>
<script>
$(document).ready(function (){
    var input = document.getElementById('full_address');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("No details available for input: '" + place.name + "'");
            return;
        }
        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');

        }
        ;

        var lat= place.geometry.location.lat();
        var lng= place.geometry.location.lng();
        $('#address_lat').val(lat);
        $('#address_long').val(lng);
    });
});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCU4syOOvy3vyUZf7n1eg8C1l28zX0v1h4&libraries=places" async></script>
