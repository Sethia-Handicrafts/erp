<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Request For Quotation (Price Request)</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Sales</li>
								<li class="breadcrumb-item" >Request For Quotation</li>
                                <li class="breadcrumb-item active" aria-current="page">Price Request</li>
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
        <th>Created By</th>
        <th>Created Date</th>
        <th>Submitted Date</th>
        <th>Alloted To</th>
        <th>Sent For Approval</th>
        <th>Utility</th>
    </tr>
    <?php 
    $counter=1;
    
    if($_SESSION['utype']=='11')
    {$req_price_list=$sales->get_price_request_list($_SESSION['uid']);}
    else
    {$req_price_list=$sales->get_price_request_list_bystatus('2');}


    if($req_price_list)
    {
        foreach($req_price_list as $row=>$v)
        {
            $designer = $admin->getone_user($req_price_list[$row]['designer']);
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
                echo "<td>".$designer[0]['person_name']."</td>";
                echo "<td>";
                        if($req_price_list[$row]['designer_pass']=='2'){echo "Send For Approval";}
                        if($req_price_list[$row]['designer_pass']=='0'){echo "Request For Approval";}
                        if($req_price_list[$row]['designer_pass']=='1'){echo "Approved";}
                        if($req_price_list[$row]['designer_pass']=='3'){echo "Rejected";}
                echo "</td>";
                echo "<td><a href='".$base_url."index.php?action=dashboard&page=sales_rfq_2-0_engineer&id=".$req_price_list[$row]['id']."'><i class='btn btn-info fa fa-arrow-right'></i></td>";
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
