
</div>
<!-- ./wrapper -->	 

<!----modals---->
	<!--======== FILL====--->
	  <div class="modal modal-fill fade" data-backdrop="false" id="modal-fill" tabindex="-1" style="z-index:9999px;">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="modal-fill-body">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body" id="modal-fill-body">
			
		  </div>
		  <div class="modal-footer">
			<a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
		  </div>
		</div>
	  </div>
	</div>
	

	<!--====BIG===-->
  <div class="modal fade bd-example-modal-xl" tabindex="-1" id="exampleModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg " >
    <div class="modal-content">
	<div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body" id="modal-body">
        
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
        
      </div>
    </div>
    </div>
  </div>
</div>

  <!-- <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->


<!-- js -->
 
<!-- Vendor JS -->
<script src="<?php echo $base_url.'theme/js/vendors.min.js';?>"></script>
	

	<script src="<?php echo $base_url.'theme/js/irregular-data-series.js';?>"></script>
	<script src="<?php echo $base_url.'theme/js/apexcharts.js';?>"></script>	
	<script src="<?php echo $base_url.'theme/js/progressbar.js';?>"></script>
	<script src="<?php echo $base_url.'theme/js/Chart.min.js';?>"></script>
	<script src="<?php echo $base_url.'theme/js/zingchart.min.js';?>"></script>	
	<script src="<?php echo $base_url.'theme/js/pages/widget-charts2.js';?>"></script>	
	
	<!-- Lotus Admin App -->
	<script src="<?php echo $base_url.'theme/js/template.js';?>"></script>
	<script src="<?php echo $base_url.'theme/js/pages/dashboard.js';?>"></script>
	<script src="<?php echo $base_url.'theme/js/demo.js';?>"></script>
	<!-- data table-->
	<script src="<?php echo $base_url.'theme/js/data-table.js';?>"></script>
	<script src="<?php echo $base_url.'theme/js/datatables.min.js';?>"></script>
	<!------- custom js -->
	<script src="<?php echo $base_url.'theme/js/';?>function.js?ver=<?php echo rand(0,100);?>';?>"></script>
	<script src="<?php echo $base_url.'theme/js/chart_custom_fn.js';?>"></script>
	<!-- steps -->
	<script src="<?php echo $base_url.'theme/js/';?>jquery.steps.js"></script>
    <script src="<?php echo $base_url.'theme/js/';?>jquery.validate.min.js"></script>
	<!-- select2 -->
	<script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
	<script src="<?php echo $base_url.'theme/js/';?>select2.js"></script>
	<script src="<?php echo $base_url.'theme/js/';?>boostrap-select.js"></script>
	
</body>

</html>