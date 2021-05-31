<?php
session_start();
include 'vendor/autoload.php';
use App\classes\Logout;

if($_SESSION['id'] == NULL){
    header('Location:/project/admin/pages/login.php');
}
if(isset($_GET['logout']))
{
    $logout= new Logout();
    $logout->logout();
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head><title>Admin Dashboard</title>
    <?php include'includes/head.php';?> 
</head>
<body > 
<?php include 'includes/loader.php';?>  
    <div id="main-wrapper">    
<?php include 'includes/header.php'; ?>    
<?php include 'includes/aside.php';?>
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Sales Report</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Reports</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid">



<div class="dropdown">
  <button type="button" class="btn border-info dropdown-toggle" data-toggle="dropdown">
    Check Report For
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" id="today" href="#todays">Today's</a>
    <a class="dropdown-item" id="7day" href="#7days">Last 7 Day's</a>
    <a class="dropdown-item" id="month" href="#thisMonth">This Month</a>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>            
<script type="text/javascript">
  $("#today").click(function(){
  $.ajax({url: "today.php", success: function(result){
    $("#div1").html(result);
  }});
});

    $("#7day").click(function(){
  $.ajax({url: "7day.php", success: function(result){
    $("#div1").html(result);
  }});
});

      $("#month").click(function(){
  $.ajax({url: "month.php", success: function(result){
    $("#div1").html(result);
  }});
});

      


</script>

<div id="div1">
  
</div>


    </div><?php include 'includes/footer.php';?> </div></div>

<?php include 'includes/js.php'?>
</body>
</html>