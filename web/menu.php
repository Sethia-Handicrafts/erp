<header class="main-header">
	<div class="d-flex align-items-center logo-box pl-20">		
		<a href="#" class="waves-effect waves-light nav-link rounded d-none d-md-inline-block" data-toggle="push-menu" role="button">
			<i class="nav-link-icon mdi mdi-menu text-dark"></i>
		</a>
		<!-- Logo -->
		<a href="<?php echo $base_url.'index.php?action=dashboard&page=dashboard'?>" class="logo">
		  <!-- logo-->
		  <div class="logo-lg">
			  <span class="light-logo"><img src="<?php echo $base_url.'images/'.$_SESSION['logo'];?>" alt="logo" style="height:50px; width:auto;"></span>
			  <span class="dark-logo"><img src="<?php echo $base_url.'images/'.$_SESSION['logo'];?>" alt="logo" style="height:50px; width:auto;"></span>
		  </div>
		</a>
	</div>  
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-10">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<!-- <li class="btn-group nav-item d-md-none">
				<a href="#" class="waves-effect waves-light nav-link rounded" data-toggle="push-menu" role="button">
					<i class="nav-link-icon mdi mdi-menu text-dark"></i>
			    </a>
			</li> -->
			<li class="btn-group nav-item">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded" title="Full Screen">
					<i class="nav-link-icon mdi mdi-crop-free text-dark"></i>
			    </a>
			</li>
			<li class="dropdown nav-item d-xl-inline-flex d-none">
				<a href="#" aria-haspopup="true"  data-toggle="dropdown" class="waves-effect waves-light nav-link rounded" aria-expanded="false">
					<i class="nav-link-icon mdi mdi-apps text-dark mx-5 mx-lg-0"></i>
					<span class="d-xl-inline-block d-none">Help & Support
					<i class="fa fa-angle-down ml-2"></i></span>
				</a>

				<div class="dropdown-menu overflow-hidden">
					<div class="dropdown-menu-header-inner bg-img" style="background-image: url('https/lotus-admin-templatesmultipurposethemescom/images/gallery/landscape1_7340154.jpg');" data-overlay="5">
						<div class="p-30 text-left w-250">
							<h5 class="text-white">Overview</h5>
							<div class="menu-header-btn-pane">
								<a href="<?php echo $base_url.'index.php?action=dashboard&page=support_tickets';?>" class="mr-2 btn btn-success btn-sm">Support Ticket</a>
								<button class="btn-icon btn-icon-only btn btn-info btn-sm">
									<i class="fa fa-cog"></i>
								</button>
							</div>
						</div>
					</div>
					<!-- <div class="p-10">
						<button type="button" class="waves-effect waves-light btn btn-flat btn-light no-shadow w-p100 text-left"><i class="mdi mdi-file-multiple mr-10"> </i>Graphic Design</button>
						<button type="button" class="waves-effect waves-light btn btn-flat btn-light no-shadow w-p100 text-left"><i class="mdi mdi-file-multiple mr-10"> </i>App Development</button>
						<button type="button" class="waves-effect waves-light btn btn-flat btn-light no-shadow w-p100 text-left"><i class="mdi mdi-file-multiple mr-10"> </i>Icon Design</button>
						<div tabindex="-1" class="dropdown-divider"></div>
						<button type="button" class="waves-effect waves-light btn btn-flat btn-light no-shadow w-p100 text-left"><i class="mdi mdi-file-multiple mr-10"> </i>Miscellaneous</button>
						<button type="button" class="waves-effect waves-light btn btn-flat btn-light no-shadow w-p100 text-left"><i class="mdi mdi-file-multiple mr-10"> </i>Frontend Dev</button>
					</div> -->
				</div>

			</li>
		</ul> 
	  </div>
		
	  <style>
		.blink{
		background-color: magenta;
		animation: blink 3s linear infinite;
	}

		@keyframes blink{
0%{opacity: 0;}
50%{opacity: .5;}
100%{opacity: 1;}
}
	  </style>
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
		  <!-- full Screen -->
	      <!-- <li class="search-bar">		  
			  <div class="lookup lookup-circle lookup-right">
			     <input type="text" name="s">
			  </div>
		  </li>			 -->
		  <!-- Notifications -->
		  <li class="dropdown notifications-menu">
			<a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="Notifications">
				<?php $latest_alert=$admin->latest_alerts($_SESSION['uid']); 
				if($latest_alert){?>
				<span class="blink badge badge-pill badge-danger badge-xs text-xs"><?php echo count($latest_alert);?></span>
				<?php } else {?>
				<i class="mdi mdi-bell">0</i>
				<?php }?>
			</a>
			<ul class="dropdown-menu animated bounceIn">

			  <li class="header">
				<div class="p-20">
					<div class="flexbox">
						<div>
							<h4 class="mb-0 mt-0">Notifications</h4>
						</div>
						<div>
							<a href="#" class="text-danger">Mark Read All</a>
						</div>
					</div>
				</div>
			  </li>

			  <li>
				<!-- inner menu: contains the actual data -->
				 <?php if($latest_alert){?>
				<ul class="menu sm-scrol">
				<?php 
				
				foreach($latest_alert as $lr=>$v){
				?> 
				<li>
					<a href="#">
					  <i class="fa fa-users text-info"></i> <?php echo $latest_alert[$lr]['msg'];?><br>
					  <small>From : <?php $uname=$admin->getone_user($latest_alert[$lr]['from_uid']); echo $uname[0]['person_name'];?></small><br>
					  <small><?php echo date('d-m-Y H:i:s', strtotime($latest_alert[$lr]['date_time']));?></small>
					</a>
				  </li>
				 <?php } ?>
				</ul>
			  </li>


			  <li class="footer">
				  <a href="<?php echo $base_url.'index.php?action=dashboard&page=notifications';?>">View all</a>
			  </li>

			  
			</ul>
			<?php }?>
		  </li>	
		  
	      <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="waves-effect waves-light dropdown-toggle p-5 " data-toggle="dropdown" title="User">
				<img src="<?php echo $base_url.'images/user.jpg'?>" class="rounded" alt="" />
            </a>
            <ul class="dropdown-menu animated flipInX">
              <!-- User image -->
              <li class="user-header bg-img" style="background:#000" data-overlay="3">
				  <div class="flexbox align-self-center">					  
				  	<img src="<?php echo $base_url.'images/user.jpg'?>" class="float-left rounded-circle" alt="User Image">					  
					<h4 class="user-name align-self-center">
					  <span><?php echo $_SESSION['uname'];?></span><br>
					  <small><?php echo $_SESSION['utype'];?></small>
					</h4>
				  </div>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
				    <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-person"></i> My Profile</a>
					<a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-email-unread"></i> Inbox</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-settings"></i> Account Setting</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?php echo $base_url.'logout.php'?>"><i class="ion-log-out"></i> Logout</a>
					<div class="dropdown-divider"></div>
					
              </li>
            </ul>
          </li>	
		  
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light"><i class="fa fa-cog fa-spin"></i></a>
          </li>
			 -->
        </ul>
      </div>
    </nav>
  </header>



  <!--------------------=====================MAIN MENU=================-------------->
  
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
		
		    <li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=dashboard';?>">
            <i class="mdi mdi-minus-network"></i>
            <span>Dashboard</span>
          </a>
        </li>    
		
		<!------- product ----->
		<?php if($_SESSION['utype']=='1'){?>
		<li class="header">Product(s)</li>
		  
        <li class="treeview">
          <a href="#">
            <i class="mdi mdi-arrow-right"></i> <span>Add / Edit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-add-group';?>"><i class="ti-more"></i>Add New Group</a></li>   			
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-category';?>"><i class="ti-more"></i>Add New Category</a></li> 
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-add';?>"><i class="ti-more"></i>Add Product</a></li>	
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-viewall';?>"><i class="ti-more"></i>View All Product</a></li>  			
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-arrow-right"></i> <span>Master(s)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-material';?>"><i class="ti-more"></i>Material</a></li>   			
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-finish';?>"><i class="ti-more"></i>Finish</a></li> 
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-logistics';?>"><i class="ti-more"></i>Logistics</a></li>	
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-packing';?>"><i class="ti-more"></i>Packing</a></li>	
          </ul>
        </li>

		
        </li>
      	

		<li class="header">Store & Hardware</li>
		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-arrow-right"></i> <span>Store(s)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		 	<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=add-store-category';?>">Add / View Category</a>
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=add-sub-category';?>">Add / View Sub-Category</a>
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=add-unit';?>">Unit Master</a></li>
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=add-item';?>">Add Item</a></li>	
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=view-item';?>">View / Update Item</a></li>		
          </ul>
        </li>
		<!----- leads ---->
		<?php }if($_SESSION['utype']=='1'  || $_SESSION['utype']=='6' || $_SESSION['utype']=='8'){?>
        <li class="header">Leads</li>
		  
        <li class="treeview">
          <a href="#">
            <i class="mdi mdi-check-all"></i> <span>Add Leads</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=lead_addnew';?>"><i class="ti-more"></i>Add New (Single)</a></li>
            <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=lead_bulkupload';?>"><i class="ti-more"></i>Bulk Upload</a></li>
            <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=lead_viewall';?>"><i class="ti-more"></i>View All</a></li>
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=lead_reports';?>"><i class="ti-more"></i>Report(s)</a></li>
          </ul>
        </li>
		<?php } ?>
		

		<!----- sales ---->
		<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='8'){?>
       
        
		<li class="header">Leads / Sales</li>
		<li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=leads_approval_steps';?>">
            <i class="mdi mdi-alert"></i> <span>Leads Approval</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		<li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_lead_viewall';?>">
		  <i class="mdi mdi-database"></i> <span>Leads</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-more"></i> <span>Prospect</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_addprospect';?>"><i class="ti-more"></i>Registration</a></li>
            <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_prospect-viewall';?>"><i class="ti-more"></i>View All</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="ti-comments"></i> <span>RFQ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_rfq';?>"><i class="ti-more"></i>Create</a></li>
            <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_rfq-viewall';?>"><i class="ti-more"></i>View All</a></li>
          </ul>
        </li>
		
		

		<?php } ?>


		<!----- hr ---->
		<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='3'){?>
        <li class="header">HR</li>
		  
        <li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=hr_add_emp';?>">
		  <i class="mdi mdi-account-check"></i> <span>Add Employee</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		<?php } ?>


		<!------- admin -------->
		<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='7'){?>
			
		<li class="header">Admin</li>
		<li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=admin_meta';?>">
            <i class="mdi mdi-alert"></i> <span>Meta</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>

		
		  
		  <li class="treeview">
			<a href="#">
			  <i class="mdi mdi-check-all"></i> <span>Leads Master</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			  </span>
			</a>
			<ul class="treeview-menu">
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=module_tuto&module=lead';?>"><i class="ti-more"></i>What-Who-How-When</a></li>	
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=lead_addgroup';?>"><i class="ti-more"></i>Create Group</a></li>
				<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=lead_add_company_info';?>"><i class="ti-more"></i>Create Company<br>Research Flow</a></li>
				<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=lead_customertype';?>"><i class="ti-more"></i>Create Customer & Steps</a></li>
			</ul>
		  </li>


		  <li class="treeview">
			<a href="#">
			  <i class="mdi mdi-currency-inr"></i> <span>Sales Master</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			  </span>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_addstages';?>"><i class="ti-more"></i>Create Sales <br>Status / Stage(s)</a></li>
				<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_addstatus';?>"><i class="ti-more"></i>Create Query Status</a></li>
				
			</ul>
		  </li>


		  <li class="treeview">
			<a href="#">
			  <i class="mdi mdi-help"></i> <span>Help and Alerts</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			  </span>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=dev_announcment';?>"><i class="ti-more"></i>Make Announcment</a></li>
				<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=dev_support';?>"><i class="ti-more"></i>Help Tickets</a></li>
			</ul>
		  </li>

		
<!--------- MD------------->
		<?php }if($_SESSION['utype']=='9'){?>
			<li class="header">Prospect & RFQ</li>
			<li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_prospect_approval';?>">
            <i class="fa fa-user text-danger"></i> <span>Prospect Approval</span>
          </a>
        </li>
		<li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_rfq_3-0_approval_list';?>">
            <i class="fa fa-inr text-warning"></i> <span>Item Request(s)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		<!-- <li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_rfq_2-0_engineer_list_all';?>">
            <i class="fa fa-inr text-success"></i> <span>All Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li> -->

			
		
		<li class="header">Leads</li>
		<li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=leads_disqualified&qualify=2';?>">
            <i class="mdi mdi-cancel"></i> <span>Disqualified</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		<li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=leads_disqualified&qualify=1';?>">
            <i class="mdi mdi-check"></i> <span>Qualified</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		<li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=leads_disqualified&approve=1';?>">
            <i class="mdi mdi-cancel"></i> <span>Approved</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		<li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=leads_disqualified&approve=2';?>">
            <i class="mdi mdi-check"></i> <span>Dis-Approved</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>

		<li class="header">Prospect & RFQ</li>
		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-more"></i> <span>Prospect</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_addprospect';?>"><i class="ti-more"></i>Registration</a></li>
            <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_prospect-viewall';?>"><i class="ti-more"></i>View All</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="ti-comments"></i> <span>RFQ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_rfq';?>"><i class="ti-more"></i>Create</a></li>
            <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_rfq-viewall';?>"><i class="ti-more"></i>View All</a></li>
          </ul>
        </li>




		<?php }if($_SESSION['utype']=='11'){?>
      <li class="header">Product(s)</li>
		  
        <li class="treeview">
          <a href="#">
            <i class="mdi mdi-arrow-right"></i> <span>Add / Edit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-add-group';?>"><i class="ti-more"></i>Add New Group</a></li>   			
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-category';?>"><i class="ti-more"></i>Add New Category</a></li> 
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-add';?>"><i class="ti-more"></i>Add Product</a></li>	
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-viewall';?>"><i class="ti-more"></i>View All Product</a></li>
      <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-catalog';?>"><i class="ti-more"></i>Create Catalogue</a></li>  			
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-arrow-right"></i> <span>Master(s)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-material';?>"><i class="ti-more"></i>Material</a></li>   			
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-finish';?>"><i class="ti-more"></i>Finish</a></li> 
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-logistics';?>"><i class="ti-more"></i>Logistics</a></li>	
			<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=products-packing';?>"><i class="ti-more"></i>Packing</a></li>	
          </ul>
        </li>

		
        </li>
      	
        
		<li class="header">Leads</li>
		<li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=leads_approval_steps_graphic';?>">
            <i class="mdi mdi-cancel"></i> <span>For Graphic Requirment(s)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		
		<li class="header">RFQ</li>
		<li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_rfq_2-0_engineer_list';?>">
            <i class="fa fa-inr text-warning"></i> <span>Pending Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		<li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_rfq_2-0_engineer_list_all';?>">
            <i class="fa fa-inr text-success"></i> <span>All Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		   

		



		<?php }if($_SESSION['utype']=='12'){?>


			<!------- engineer -------->
		<li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_rfq_6-0_engineer_list_all';?>">
            <i class="fa fa-inr text-warning"></i> <span>Pending Request (RFQ)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		<?php }if($_SESSION['utype']=='13'){?>
		<!------- estimator -------->
		<li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_rfq_6-0_engineer_list_all';?>">
            <i class="fa fa-inr text-warning"></i> <span>Pending Request (RFQ)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		<?php }if($_SESSION['utype']=='14'){?>
		<!------- estimator -------->
		    <li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=add_sampling';?>">
            <i class="fa fa-archive text-warning"></i> <span>Add Sampling</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=view_all_sample';?>">
            <i class="fa fa-list text-info"></i> <span>View All Sampling</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=reports_sample';?>">
            <i class="fa fa-inr text-success"></i> <span>Report(s)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		<?php }?>
      </ul>
    </section>
  </aside>