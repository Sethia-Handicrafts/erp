<?php 
if(isset($_GET['status']))
{
    if($_GET['status']=='1')
    {
        echo "<div class='alert alert-success'>Added Successfully !!!</div>";
    }

    if($_GET['status']=='2')
    {
        echo "<div class='alert alert-danger'>Something Went Wrong, Please Try Again !!!</div>";
    }

    if($_GET['status']=='3')
    {
        echo "<div class='alert alert-info'>Updated Successfully !!!</div>";
    }

    if($_GET['status']=='4')
    {
        echo "<div class='alert alert-primary'>Deleted Successfully !!!</div>";
    }

    if($_GET['status']=='5')
    {
        echo "<div class='alert alert-secondary'>Record(s) Found !!!</div>";
    }

    if($_GET['status']=='6')
    {
        echo "<div class='alert alert-secondary'>This Item Has Been Already Added</div>";
    }
    
    if($_GET['status']=='7')
    {
        echo "<div class='alert alert-secondary'>Details has been send for approval</div>";
    }

    if($_GET['status']=='8')
    {
        echo "<div class='alert alert-secondary'>Closed Successfully</div>";
    }
}
?>

