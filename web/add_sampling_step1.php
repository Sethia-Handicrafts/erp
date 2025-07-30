<div id="step1">

  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#step1-1">
        <b>Step</b> #1-1 (Record Request for Sample received from customer / prospective customer)
      </a>
    </div>
    <div id="step1-1" class="collapse" data-parent="#step1">
      <div class="card-body">
        <span id="msgstep1-1"></span>
        <form action="<?php echo $base_url.'index.php?action=sampling&query=add_sampling';?>" method="post" name="step1-1" id="step1-1">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="sampleRequestNo">Sample Request No.</label>
                <input type="number" class="form-control" id="sampleRequestNo" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="customerCode">Customer / Prospect</label>
                <select class="form-control" name="cid">
                  <option disabled="disabled" selected="selected">-Select-</option>
                    <?php $viewall=$sales->view_all_beneficiery(0);
                      foreach($viewall as $r=>$v){?>
                      <option value="<?php echo $viewall[$r]['id'];?>"><?php echo $viewall[$r]['fname'].' '.$viewall[$r]['lname'].' ('.$viewall[$r]['cname'].')';?></option>
                    <?php }?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="custProductRefName">Cust. Product / Ref Name</label><br>
                <select class="form-control select2" name="pid" id="sku" style="width: 100%;">
                  <option disabled="disabled" selected="selected">-Select-</option>
                  <?php 
                  $sku=$product->getall();
                    foreach($sku as $s=>$v){
                    ?>
                      <option value="<?php echo $sku[$s]['id'];?>"><?php echo $sku[$s]['sku'];?></option>
                    <?php }?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="uom">UOM</label>
                <select class="form-control" id="uom" required>
                  <option disabled="disabled" selected="selected">-Select-</option>
                  <?php $unit=$store->get_unit();
                  foreach($unit as $u=>$v){?>
                  <option value="<?php echo $unit[$u]['id'];?>"><?php echo $unit[$u]['unit'];?></option>  
                 <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="totalQty">Total Qty (Sample+Counter)</label>
                <input type="number" class="form-control" id="totalQty" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="expectedByDate">Expected by date (EXW), if any</label>
                <input type="date" class="form-control" id="expectedByDate">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="drawingFile">Drawing file</label>
                <input type="file" class="form-control" id="drawingFile" required>
              </div>
            </div>
            <div class="col-md-3">
              <!-- empty column -->
            </div>
          </div>
        <input type="button" onclick="form_submit('step1-1')" class="btn btn-primary" value="Submit">
        </form>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#step1-2">
        <b>Step</b> #1-2 (Review request for sample - in case of gaps in information provided and required then obtain gap info from client and update G-form)
      </a>
    </div>
    <div id="step1-2" class="collapse" data-parent="#step1">
      <div class="card-body">
       <?php include('add_sampling_step_com.php');?>
      </div>
    </div>
  </div>

  <div class="card">
        <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#step1-3">
            <b>Step</b> #1-3 (Prepare shop drawings for required product, customised parts drawings, BoM, identify part-wise requirement to make or buy)
        </a>
        </div>
        <div id="step1-3" class="collapse" data-parent="#step1">
        <div class="card-body">
         <?php include('add_sampling_step_com.php');?>
        </div>
        </div>
  </div>

  <div class="card">
        <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#step1-4">
            <b>Step</b> #1-4 (If work is to be done on CNC machine, prepare Mastercam drawing, Pitagora program, Test templates and Plan for Jigs.In other cases and if design involves shaped components or new element, Test template / concept - may or maynot involve carpenter.)
        </a>
        </div>
        <div id="step1-4" class="collapse" data-parent="#step1">
        <div class="card-body">
         <?php include('add_sampling_step_com.php');?>
        </div>
        </div>
  </div>

  

  <div class="card">
        <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#step1-5">
            <b>Step</b> #1-5 (Prepare material procurement plan)
        </a>
        </div>
        <div id="step1-5" class="collapse" data-parent="#step1">
        <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="timestamp">Time stamp</label>
                        <input type="date" class="form-control" id="timestamp" readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="sampleReqNo">Sample Req. No.</label>
                        <input type="text" class="form-control" id="sampleReqNo" readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="productName">Product Name</label>
                        <select class="form-control" id="productName" required>
                          <!-- options will be populated here -->
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="materialClass">Material Class</label>
                        <select class="form-control" id="materialClass" required>
                          <!-- options will be populated here -->
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="purchaseLeadTime">Purchase Lead Time</label>
                        <input type="date" class="form-control" id="purchaseLeadTime" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="releaseDate">Release Date</label>
                        <input type="date" class="form-control" id="releaseDate" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="plannedDate">Planned Date</label>
                        <input type="date" class="form-control" id="plannedDate" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="whenReceived">When Received</label>
                        <input type="date" class="form-control" id="whenReceived" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="actualDateWhenReceived">Actual Date When Received</label>
                        <input type="date" class="form-control" id="actualDateWhenReceived" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <!-- empty column -->
                    </div>
                    <div class="col-md-3">
                      <!-- empty column -->
                    </div>
                    <div class="col-md-3">
                      <!-- empty column -->
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>      
        </div>
        </div>
  </div>

  <div class="card">
        <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#step1-6">
            <b>Step</b> #1-6 (Sourcing of New Material)
        </a>
        </div>
        <div id="step1-6" class="collapse" data-parent="#step1">
        <div class="card-body">
         <?php include('add_sampling_step_com.php');?>
        </div>
        </div>
  </div>

  <div class="card">
        <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#step1-7">
            <b>Step</b> #1-7 (Approval of drawings made, BoM, Make-Buy etc.)
        </a>
        </div>
        <div id="step1-7" class="collapse" data-parent="#step1">
        <div class="card-body">
            <form>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="sampleReqNo">Sample Req. No.</label>
                    <input type="text" class="form-control" id="sampleReqNo" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" id="productName" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="planned">Planned</label>
                    <input type="date" class="form-control" id="planned" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="actual">Actual</label>
                    <input type="date" class="form-control" id="actual" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="approved">Approved?</label>
                    <select class="form-control" id="approved" required>
                      <!-- options will be populated here -->
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="delay">Delay</label>
                    <input type="date" class="form-control" id="delay" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="remark">Remark</label>
                    <textarea class="form-control" id="remark" rows="3"></textarea>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
  </div>

  <div class="card">
        <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#step1-8">
            <b>Step</b> #1-8 (Team Meeting to release Time and Action Plan for Sample Sample Production)
        </a>
        </div>
        <div id="step1-8" class="collapse" data-parent="#step1">
        <div class="card-body">
         <?php include('add_sampling_step_com.php');?>
        </div>
        </div>
  </div>

</div> 