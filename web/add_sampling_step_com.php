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
            <div class="col-md-3">
                <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" required>
                    <!-- options will be populated here -->
                </select>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                <label for="delay">Delay</label>
                <input type="date" class="form-control" id="delay" required>
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