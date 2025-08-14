<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Request For Quotation (Approved / Denied)</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Sales</li>
								<li class="breadcrumb-item" >Request For Quotation</li>
                                <li class="breadcrumb-item active" aria-current="page">Apprval</li>
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
        <th>Current Step</th>
        <th>Status</th>
        <th>Utility</th>
    </tr>
    <?php 
    $counter=1;
    $req_price_list=$sales->get_rfq_approval($_SESSION['uid']);


    if($req_price_list)
    {
        foreach($req_price_list as $row=>$v)
        {
            $uname = $admin->getone_user($req_price_list[$row]['created_by']);
            echo "<tr>";
                echo "<th>".$counter."</th>";
                echo "<td>RFQ".$req_price_list[$row]['id']."</td>";
                echo "<td>".$uname[0]['person_name']."</td>";
                echo "<td>".date("d-m-Y h:i:s", strtotime($req_price_list[$row]['created_date']))."</td>";
                echo "<td>".$req_price_list[$row]['step']."</td>";
                echo "<td>";
                        if($req_price_list[$row]['approval_status']=='2'){echo "Send For Approval";}
                        if($req_price_list[$row]['approval_status']=='0'){echo "Request For Approval";}
                        if($req_price_list[$row]['approval_status']=='1'){echo "Approved";}
                        if($req_price_list[$row]['approval_status']=='3'){echo "Rejected";}
                echo "</td>";
                echo "<td>";
                if($req_price_list[$row]['step']=='3.0'){?>

                <a href='<?php echo $base_url;?>index.php?action=dashboard&page=sales_rfq_3-0_approval&id=<?php echo $req_price_list[$row]['id'];?>' class='btn btn-info btn-sm'><i class='fa fa-arrow-right'></i></a>
                <?php } if($req_price_list[$row]['step']=='7.0'){?>
                <a href='<?php echo $base_url;?>index.php?action=dashboard&page=sales_rfq_7-0_approval&id=<?php echo $req_price_list[$row]['id'];?>' class='btn btn-warning btn-sm'><i class='fa fa-arrow-right'></i></a>
                <?php     
                } echo "</td>";
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
