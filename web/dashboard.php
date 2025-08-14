<?php include('header.php') ;?>

    <!-- partial:partials/_navbar.html -->

<?php //include('menu.php') ;?>

<?php 
if($_SESSION['utype']=='1')
{ include('dashboard_admin.php') ; }
if($_SESSION['utype']=='2')
{ include('dashboard_accounts.php') ; }
if($_SESSION['utype']=='3')
{ include('dashboard_hr.php') ; }
if($_SESSION['utype']=='4')
{ include('dashboard_office_asst.php') ; }
if($_SESSION['utype']=='5')
{ include('dashboard_store.php') ; }
if($_SESSION['utype']=='6')
{ include('dashboard_lead.php') ; }
if($_SESSION['utype']=='7')
{ include('dashboard_developer.php') ; }
if($_SESSION['utype']=='8')
{ include('dashboard_merchent.php') ; }
if($_SESSION['utype']=='9')
{ include('dashboard_md.php') ; }
if($_SESSION['utype']=='11')
{ include('dashboard_graphic.php') ; }

?>

<?php //include('footer.php') ;?>



