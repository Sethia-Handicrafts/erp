<div id="step2">

  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#step2-1">
        <b>Step</b> #2-1 (Initiate required Finish Swatch Development)
      </a>
    </div>
    <div id="step2-1" class="collapse show" data-parent="#step2">
      <div class="card-body">
        <form>

      <div class="row mb-3">
        <div class="col-md-3">
          <label for="timestamp" class="form-label">Timestamp</label>
          <input type="datetime-local" class="form-control" id="timestamp" readonly>
        </div>
        <div class="col-md-3">
          <label for="sampleRequestNo" class="form-label">Sample Request No.</label>
          <input type="text" class="form-control" id="sampleRequestNo" readonly>
        </div>
        <div class="col-md-3">
          <label for="typeOfFinish" class="form-label">Type of Finish</label>
          <select class="form-control" id="typeOfFinish" required>
            <option value="">Select</option>
            <!-- Add options here -->
          </select>
        </div>
        <div class="col-md-3">
          <label for="finishName" class="form-label">Finish Name</label>
          <select class="form-control" id="finishName" required>
            <option value="">Select</option>
            <!-- Add options here -->
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-3">
          <label for="toDevelop" class="form-label">To Develop?</label>
          <select class="form-control" id="toDevelop" required>
            <option value="">Select</option>
            <!-- Add options here -->
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Client Swatch?</label>
          <div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="clientSwatch" value="Yes" required>
              <label class="form-check-label">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="clientSwatch" value="No">
              <label class="form-check-label">No</label>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <label for="swatchQty" class="form-label">Swatch Qty</label>
          <input type="number" class="form-control" id="swatchQty" required>
        </div>
        <div class="col-md-3">
          <label class="form-label">Required Finish Type</label>
          <div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="requiredFinishType" value="Wood Finish" required>
              <label class="form-check-label">Wood Finish</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="requiredFinishType" value="Metal Finish">
              <label class="form-check-label">Metal Finish</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="requiredFinishType" value="Handicraft Swatch + Finish">
              <label class="form-check-label">Handicraft Swatch + Finish</label>
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-3">
          <label class="form-label">Finish Development Required</label>
          <div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="finishDev" value="Yes" required>
              <label class="form-check-label">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="finishDev" value="No">
              <label class="form-check-label">No</label>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <label for="finishRef" class="form-label">Finish Name / Reference</label>
          <input type="text" class="form-control" id="finishRef" required>
        </div>
        <div class="col-md-3">
          <label class="form-label">Reference Swatch Expected From Customer?</label>
          <div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="refSwatch" value="Yes" required>
              <label class="form-check-label">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="refSwatch" value="No">
              <label class="form-check-label">No</label>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <label for="surfaceDetail" class="form-label">Finish involves Sandblasting / Wire brushing / Distressing</label>
          <select class="form-control" id="surfaceDetail" required>
            <option value="">Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-3">
          <label for="gloss" class="form-label">Gloss Requirement</label>
          <input type="number" class="form-control" id="gloss" required>
        </div>
        <div class="col-md-3">
          <label class="form-label">Final Surface Requirement</label>
          <div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="surfaceRequirement" value="Distressed" required>
              <label class="form-check-label">Distressed</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="surfaceRequirement" value="Open Grain">
              <label class="form-check-label">Open Grain</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="surfaceRequirement" value="Filled Grain">
              <label class="form-check-label">Filled Grain</label>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <label for="substrate" class="form-label">Mention Substrate</label>
          <input type="text" class="form-control" id="substrate" required>
        </div>
        <div class="col-md-3">
          <label for="swatchSize" class="form-label">Swatch Size</label>
          <select class="form-control" id="swatchSize" required>
            <option value="">Select</option>
            <option value="Standard">Standard</option>
            <option value="2x12">2"x12"</option>
            <option value="Customized">Customized</option>
          </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step2-2">
        <b>Step</b> #2-2 (Confirm if Kamlesh has provide requested wood / MDF / Ply swatches)
      </a>
    </div>
    <div id="step2-2" class="collapse" data-parent="#step2">
      <div class="card-body">
         <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step2-3">
        <b>Step</b> #2-3 (Confirm requisition for Finish Material, Metal Substrate, Job Work,  (obtain similar finish swatches) have been made)
      </a>
    </div>
    <div id="step2-3" class="collapse" data-parent="#step2">
      <div class="card-body">
         <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


   <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step2-4">
        <b>Step</b> #2-4 (Confirm procurement of Finish Materials, Metal Substrate Requisitioned OR Issue of Job Order has been done)
      </a>
    </div>
    <div id="step2-4" class="collapse" data-parent="#step2">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>



   <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step2-5">
        <b>Step</b> #2-5 (Finish Swatch Reproduction (incl. trial and error time))
      </a>
    </div>
    <div id="step2-5" class="collapse" data-parent="#step2">
      <div class="card-body">
        <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>


   <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step2-6">
        <b>Step</b> #2-6 (Critical Review and Approval of Finish Swatch)
      </a>
    </div>
    <div id="step2-6" class="collapse" data-parent="#step2">
      <div class="card-body">
         <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>

</div> 