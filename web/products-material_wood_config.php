<form>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="specified">Specified</label>
        <select class="form-control" id="specified" required>
          <option value="">Select an option</option>
          <!-- Add options here -->
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="length">Length (ft)</label>
        <input type="number" class="form-control" id="length" step="0.1" required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="width">Width (mm)</label>
        <input type="number" class="form-control" id="width" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="height">Height (mm)</label>
        <input type="number" class="form-control" id="height" required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="paycft">Pay CFT</label>
        <input type="number" class="form-control" id="paycft" step="0.1" required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="actcft">Act CFT</label>
        <input type="number" class="form-control" id="actcft" step="0.1" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="weight">Weight</label>
        <input type="number" class="form-control" id="weight" step="0.1" required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="specificGravity">Specific Gravity</label>
        <input type="number" class="form-control" id="specificGravity" required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="thicknessDifference">Thickness Difference</label>
        <input type="number" class="form-control" id="thicknessDifference" step="0.1" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="rateGroup">Rate Group</label>
        <select class="form-control" id="rateGroup" required>
          <option value="">Select an option</option>
          <!-- Add options here -->
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="rateAddon">Rate Addon</label>
        <select class="form-control" id="rateAddon" required>
          <option value="">Select an option</option>
          <!-- Add options here -->
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="latest">Latest</label>
        <select class="form-control" id="latest" required>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="extra">Extra</label>
        <input type="number" class="form-control" id="extra" step="0.1" required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="workEffectiveFrom">Work Effective From</label>
        <input type="date" class="form-control" id="workEffectiveFrom" required>
      </div>
    </div>
    
  </div>

  <div class="row">
    <div class="col-md-12">
            <table class="table table-bordered">
            <tr>
                <td>Type</td>
                <td>Maximum mm</td>
                <td>Minimum mm</td>
                <td>Thickness</td>
                <td>Thickness Stack</td>
                <td>Yield Min</td>
                <td>Yield Max</td>
            </tr>
            <tr>
                <td><input type="hidden" class='form-control' id="type" readonly>Length</td>
                <td><input type="number" class='form-control' id="maximummm"></td>
                <td><input type="number" class='form-control' id="minimumMm"></td>
                <td><input type="number" class='form-control' id="thickness"></td>
                <td><input type="number" class='form-control' id="thicknessStack"></td>
                <td><input type="number" class='form-control' id="yieldMin"></td>
                <td><input type="number" class='form-control' id="yieldMax"></td>
            </tr>
            <tr>
                <td><input type="hidden" id="type" readonly>Width</td>
                <td><input type="number" class='form-control' id="maximummm"></td>
                <td><input type="number" class='form-control' id="minimumMm"></td>
                <td><input type="number" class='form-control' id="thickness"></td>
                <td><input type="number" class='form-control' id="thicknessStack"></td>
                <td><input type="number" class='form-control' id="yieldMin"></td>
                <td><input type="number" class='form-control' id="yieldMax"></td>
            </tr>
            <tr>
                <td><input type="hidden" id="type" readonly>Height</td>
                <td><input type="number" class='form-control' id="maximummm"></td>
                <td><input type="number" class='form-control' id="minimumMm"></td>
                <td><input type="number" class='form-control' id="thickness"></td>
                <td><input type="number" class='form-control' id="thicknessStack"></td>
                <td><input type="number" class='form-control' id="yieldMin"></td>
                <td><input type="number" class='form-control' id="yieldMax"></td>
            </tr>

            </table>
    </div>
  </div>

  <div class="row">
  <div class="col-md-4">
      <button type="button" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>