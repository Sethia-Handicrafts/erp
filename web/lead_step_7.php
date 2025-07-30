<div class="box box-default">
<div class="row">
     <div class="col-md-12">
        <div class="box-body">
            <?php 
            if($query[0]['lead_qualified']=='2')
            {
                echo "<div class='alert alert-danger'>This lead is already Disqualified. But it can be qualified and approve by MD</div>";
            }
            else
            {
                echo "<div class='alert alert-success'>Your are redrecting to next step..</div>";?>
                <span id="msgstep7"></span>
                <form name="step7" id="step7" action="<?php echo $base_url.'index.php?action=leads&query=step_change';?>" method="post">
                    <input type="hidden" name="lid" value="<?php echo $_GET['id'];?>">
                    <input type="hidden" name="step" value="8">
                </form>
                <script>
                    $(document).ready(function(){
                        form_submit('step7');
                    })
                </script>
            <?php }?>
        </div>
      </div>
     
    </div>
  </div>
