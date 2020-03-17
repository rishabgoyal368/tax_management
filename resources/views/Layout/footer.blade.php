<!-- Inner Wrapper -->
<!--Delete The Modal -->
<div class="modal fade common_delete_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title mb-4">Are You Sure Want to Delete?</h4>
                
                <button type="button" class="btn btn-danger text-white text-center ctm-border-radius mb-2 mr-3" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-theme text-white text-center ctm-border-radius mb-2 button-1 deleteList" >Delete</button>
                <label for="error" class="deleteError"></label>
            </div>
        </div>
    </div>
</div>




<div class="sidebar-overlay" id="sidebar_overlay"></div>

<!-- jQuery -->
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

@if(Request::segment(1) == 'home' || (Request::segment(1) == '' || Request::segment(1) == null) )

<!-- Chart JS -->
<script src="{{asset('assets/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/chart.js')}}"></script>
@endif
<!-- Sticky sidebar JS -->
<script src="{{asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
<script src="{{asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>



<!-- Select2-->
<!-- <script src="{{asset('assets/plugins/plugins/select2/moment.min.js')}}"></script> -->
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<!--jquery validator-->

<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>

<script src="{{asset('assets/js/additional-methods.min.js')}}"></script>

<script src="{{asset('assets/js/validate.js')}}"></script>
<script src="{{asset('assets/js/validate1.js')}}"></script>

<!--sweetalert js-->
<script src="{{asset('assets/js/sweetalert.min.js')}}"></script>

<!--multipleselect-->
 <script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>



  <script>
$(document).ready(function() {
        $('#linkSelect').multiselect();
        $('#emailSelect').multiselect();
        $('#statusSelect').multiselect();
    });
</script>
<script type="text/javascript">
    $('select').selectpicker();

</script>>