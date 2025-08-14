<div class="box box-default">
<div class="row">
     <div class="col-md-12">
        <div class="box-body">
            <?php 
            if($query[0]['lead_qualified']=='2')
            {
                echo "<div class='alert alert-danger'>This lead is already Disqualified.</div>";
            }
            else
            {
                echo "<div class='alert alert-info'>This lead is already Qualified.</div>";
                echo "<div class='alert alert-success'>Your are redrecting to next step..</div>";?>
                <span id="msgstep8"></span>
                <form name="step8" id="step8" action="<?php echo $base_url.'index.php?action=leads&query=step_change';?>" method="post">
                    <input type="hidden" name="lid" value="<?php echo $_GET['id'];?>">
                    <input type="hidden" name="step" value="9">
                </form>
                <script>
                    $(document).ready(function(){
                            setTimeout(function () {
                                form_submit_alert('step8');}, 4500);
                            });
                </script>
            <?php }?>
        </div>
      </div>
     
    </div>
  </div>
