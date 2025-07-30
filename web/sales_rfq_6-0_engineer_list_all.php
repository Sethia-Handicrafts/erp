<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Drawing Request For Quotation (Price Request)</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Sales</li>
								<li class="breadcrumb-item" >Request For Quotation</li>
                                <li class="breadcrumb-item active" aria-current="page">Drawing Request</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

        <div class="col-sm-12">
        <?php include('alert.php');?>
			  <div class="box box-default">
				
				<!-- /.box-header -->
				<div class="box-body">
<table class="table table-bordered">
    <tr>
        <th>S.No.</th>
        <th>Image</th>
        <th>RFP #</th>
        <th>Request By</th>
        <th>Created Date</th>
        <th>Submitted Date</th>
        <th>Engineer</th>
        <th>Estimator</th>
        <th>Sent For Approval</th>
        <th>Utility</th>
    </tr>
    <?php 
    $counter=1;
    $utype = $admin->get_metaname_byvalue2('user_type',$_SESSION['utype']);
    $req_price_list=$sales->get_price_request_drawing($_SESSION['uid'],$utype[0]['value1']);
    

    if($req_price_list)
    {
        foreach($req_price_list as $row=>$v)
        {
            $engineer = $admin->getone_user($req_price_list[$row]['engineer']);
            $estimator = $admin->getone_user($req_price_list[$row]['estimator']);
            $rfq=$sales->get_rfq_one($req_price_list[$row]['sid']);
            $created_by = $admin->getone_user($rfq[0]['created_by']);
            echo "<tr>";
                echo "<th>".$counter."</th>";
                echo "<td>";
                     if($req_price_list[$row]['file'] != '0' && $req_price_list[$row]['file'] != '' ){?>
                        <img src="<?php echo $base_url.'images/'.$req_price_list[$row]['file']; ?>" height="auto" width="80">
                    <?php }
                echo "</td>";
                echo "<td>RFQ".$req_price_list[$row]['sid']."</td>";
                echo "<td>".$created_by[0]['person_name']."</td>";
                echo "<td>".$rfq[0]['created_date']."</td>";
                echo "<td>".$req_price_list[$row]['submitted_date']."</td>";
                echo "<td>".$engineer[0]['person_name']."</td>";
                echo "<td>".$estimator[0]['person_name']."</td>";
                echo "<td>";
                if($_SESSION['utype']=='12')
                {$etype='engineer_pass';}
                if($_SESSION['utype']=='13')
                {$etype='estimator_pass';}

                        if($req_price_list[$row][$etype]=='2'){echo "Send For Approval";}
                        if($req_price_list[$row][$etype]=='0'){echo "Request For Approval";}
                        if($req_price_list[$row][$etype]=='1'){echo "Approved";}
                        if($req_price_list[$row][$etype]=='3'){echo "Rejected";}
                echo "</td>";

                if($_SESSION['utype']=='12')
                { echo "<td><a href='".$base_url."index.php?action=dashboard&page=sales_rfq_6-0_engineer_list&id=".$req_price_list[$row]['id']."'><i class='btn btn-info fa fa-arrow-right'></i></td>"; }

                if($_SESSION['utype']=='13')
                { echo "<td><a href='".$base_url."index.php?action=dashboard&page=sales_rfq_6-0_estimator_list&id=".$req_price_list[$row]['id']."'><i class='btn btn-danger fa fa-arrow-right'></i></td>"; }

            echo "</tr>";
            $counter++;
        }
    }
    else
    {
        echo "<tr>";
        echo "<td colspan='10' class='text-danger'>No Pending Request</td>";
        echo "</tr>";
    }    
    ?>
</table>
                </div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>
</div>
