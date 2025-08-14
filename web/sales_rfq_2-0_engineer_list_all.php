<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Request For Quotation (Price Approved / Denied)</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Sales</li>
								<li class="breadcrumb-item" >Request For Quotation</li>
                                <li class="breadcrumb-item active" aria-current="page">Price Request List</li>
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
        <th>RFQ #</th>
        <th>Created By</th>
        <th>Created Date</th>
        <th>Request Date & Time</th>
        <th>Current Step</th>
        <th>Submitted Date</th>
        <th>Status</th>
        
    </tr>
    <?php 
    $counter=1;
    $req_price_list=$sales->get_price_request_list_all($_SESSION['uid']);


    if($req_price_list)
    {
        foreach($req_price_list as $row=>$v)
        {
            $rfq =$view=$sales->get_rfq_one($req_price_list[$row]['sid']);
            $uname = $admin->getone_user($rfq[0]['created_by']);
            echo "<tr>";
                echo "<th>".$counter."</th>";
                echo "<td>RFQ".$rfq[0]['id']."</td>";
                echo "<td>".$uname[0]['person_name']."</td>";
                echo "<td>".date("d-m-Y h:i:s", strtotime($rfq[0]['created_date']))."</td>";
                echo "<td>".$rfq[0]['eng_req_date']."</td>";
                echo "<td>".$rfq[0]['step']."</td>";
                echo "<td>". date("d-m-Y h:i:s", strtotime($req_price_list[$row]['submitted_date']))."</td>";
                echo "<td>";
                        if($req_price_list[$row]['designer_pass']=='2'){echo "Send For Approval";}
                        if($req_price_list[$row]['designer_pass']=='0'){echo "Request For Approval";}
                        if($req_price_list[$row]['designer_pass']=='1'){echo "Approved";}
                        if($req_price_list[$row]['designer_pass']=='3'){echo "Rejected";}
                echo "</td>";
                
            echo "</tr>";
            $counter++;
        }
    }
    else
    {
        echo "<tr>";
        echo "<td colspan='10' class='text-secondary'>No Request Found</td>";
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
