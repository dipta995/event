<script src="{{ ENV('ASSET_LINK').'/vendors/perfect-scrollbar/perfect-scrollbar.min.js' }}"></script>
<script src="{{ ENV('ASSET_LINK').'/js/bootstrap.bundle.min.js' }}"></script>

<script src="{{ ENV('ASSET_LINK').'/vendors/apexcharts/apexcharts.js' }}"></script>
<script src="{{ ENV('ASSET_LINK').'/js/pages/dashboard.js' }}"></script>


<script src="{{ ENV('ASSET_LINK').'/vendors/jquery/jquery.min.js' }}"></script>
<script src="{{ ENV('ASSET_LINK').'/vendors/jquery-datatables/jquery.dataTables.min.js' }}"></script>

<script src="{{ ENV('ASSET_LINK').'/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js' }}"></script>
<script src="{{ ENV('ASSET_LINK').'/vendors/fontawesome/all.min.js' }}"></script>

<script src="{{ ENV('ASSET_LINK').'/vendors/choices.js/choices.min.js' }}"></script>
<script src="{{ ENV('ASSET_LINK').'/js/pages/form-element-select.js' }}"></script>
<script src="{{ ENV('ASSET_LINK').'/js/mazer.js' }}"></script>
<script>
    // Jquery Datatable
    $(document).ready(function() {
        let jquery_datatable = $("#table1").DataTable();
               jQuery('#track_id').change(function(){
                   let track_id = jQuery(this).val();
                   jQuery.ajax({
                       url:"{{ url('training_days/') }}/"+track_id,
                       type:'get',
                       data:'country_id='+track_id+'&_token={{ csrf_token() }}',
                       success:function(result){
                           jQuery('#training_day').html(result)
                       }
                   });
               });
            });
</script>

