<div id="step3">

  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#step3-0">
        <b>Step</b> #3-0 (Initiate Sample release for Production)
      </a>
    </div>
    <div id="step3-0" class="collapse show" data-parent="#step3">
      <div class="card-body">
        <div class="container mt-5">
  <h4>Form #5 - Additional Details</h4>
  <form>

    <div class="row mb-3">
      <div class="col-md-3">
        <label for="timestamp" class="form-label">Timestamp</label>
        <input type="date" class="form-control" id="timestamp" readonly>
      </div>
      <div class="col-md-3">
        <label for="sampleRequestNo" class="form-label">Sample Request No.</label>
        <input type="date" class="form-control" id="sampleRequestNo" readonly>
      </div>
      <div class="col-md-3">
        <label for="customerCode" class="form-label">Customer Code (if any)</label>
        <input type="date" class="form-control" id="customerCode" readonly>
      </div>
      <div class="col-md-3">
        <label for="custProductRef" class="form-label">Cust. Product / Ref Name</label>
        <input type="date" class="form-control" id="custProductRef" readonly>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-3">
        <label for="shplProduct" class="form-label">SHPL - Product Name</label>
        <input type="date" class="form-control" id="shplProduct" readonly>
      </div>
      <div class="col-md-3">
        <label for="qty" class="form-label">Qty</label>
        <input type="number" class="form-control" id="qty">
      </div>
      <div class="col-md-3">
        <label for="uom" class="form-label">UOM</label>
        <select class="form-select" id="uom" readonly>
          <option value="">Select</option>
          <option value="pcs">PCS</option>
          <option value="kg">KG</option>
          <option value="litre">Litre</option>
          <!-- Add more UOMs if needed -->
        </select>
      </div>
      <div class="col-md-3">
        <label for="drawingFile" class="form-label">Scan Copy of Drawing</label>
        <input type="file" class="form-control" id="drawingFile">
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-3">
        <label for="bomFile" class="form-label">Scan Copy of BOM</label>
        <input type="file" class="form-control" id="bomFile">
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

      </div>
    </div>
  </div>

   <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-1">
        <b>Step</b> #3-1 (Obtain confirmation of wood having been issued for rough cut and carpentry as per Sample BoM and drawings			)
      </a>
    </div>
    <div id="step3-1" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-2">
        <b>Step</b> #3-2 (Get Purchase Order issued for Metal fabrication, Hardware etc as per Sample BoM and drawings (for fabricated parts))
      </a>
    </div>
    <div id="step3-2" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-3">
        <b>Step</b> #3-3 (Get Handicrafts WO issued as per Sample BoM and drawings)
      </a>
    </div>
    <div id="step3-3" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-4">
        <b>Step</b> #3-4 (Obtain confirmation for panel making and wood rough cut completion and facilitate handover to sampling carpenter)
      </a>
    </div>
    <div id="step3-4" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-5">
        <b>Step</b> #3-5 (Assigned Work Of Carpenter)
      </a>
    </div>
    <div id="step3-5" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-6">
        <b>Step</b> #3-6 (Completing a given Carpentry job)
      </a>
    </div>
    <div id="step3-6" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-7">
        <b>Step</b> #3-7 (Coordinated Review of all finishes involved in the sample and action points for finishing of actual sample)
      </a>
    </div>
    <div id="step3-7" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-8">
        <b>Step</b> #3-8 (Obtain confirmation for receipt of ordered sample metal fabrication, if any	)
      </a>
    </div>
    <div id="step3-3" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-9">
        <b>Step</b> #3-9 (Obtain QC Approval? for Metal Fabrication)
      </a>
    </div>
    <div id="step3-9" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-10">
        <b>Step</b> #3-10 (White Wood Completion and Review including integration or fit with metal fabrication)
      </a>
    </div>
    <div id="step3-10" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-11">
        <b>Step</b> #3-11 (Review of white wood and metal including tipping, distributed load and Impact testing)
      </a>
    </div>
    <div id="step3-11" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-12">
        <b>Step</b> #3-12 (Obtain confirmation for completion of Handicraft work)
      </a>
    </div>
    <div id="step3-12" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-13">
        <b>Step</b> #3-13 (Obtain confirmation of Finish of Wood, Metal and Handicraft Parts)
      </a>
    </div>
    <div id="step3-13" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-14">
        <b>Step</b> #3-14 (Get all Carpentry fitting, repairs and touch up done)
      </a>
    </div>
    <div id="step3-14" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-15">
        <b>Step</b> #3-15 (Review of Finished Sample)
      </a>
    </div>
    <div id="step3-15" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-16">
        <b>Step</b> #3-16 (Improvisation if required)
      </a>
    </div>
    <div id="step3-16" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-17">
        <b>Step</b> #3-17 (Review for Improvisation)
      </a>
    </div>
    <div id="step3-17" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-18">
        <b>Step</b> #3-18 (Approval for Improvisation)
      </a>
    </div>
    <div id="step3-18" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-19">
        <b>Step</b> #3-19 (List of points for technical and commercial deviations and tolerances required)
      </a>
    </div>
    <div id="step3-19" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step3-20">
        <b>Step</b> #3-20 (Prepare Material precruitment for Packing (OPTIONAL))
      </a>
    </div>
    <div id="step3-20" class="collapse" data-parent="#step3">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>

</div> 