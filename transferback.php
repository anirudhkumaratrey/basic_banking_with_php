<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay!!</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="index.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- font-awesome -->
<script src='https://kit.fontawesome.com/a076d05399.js'></script>


</head>
<body>
<?php
include("connection.php");
session_start();
$_SESSION['senderid'];
$_GET['id'];
?>
<Section class="bg-primary container-fluid">
<div class=" bg-primary jumbotron ">
    <h1 class="text-center text-light">Basic Banking Website</h1>
</div>
<div class="row">
     <div class="col-md-8"></div>
    <section class="col-md-4">
        <div class="navbar " >
            <ul class="nav">
                <li class="nav-item btn ">
                    <a href="" class="nav-link text-light">
                        <h5>
                            Home
                        </h5>
                    </a>
                </li>
                <li class="nav-item btn">
                <a href="" class="nav-link text-light">
                    <h5>
                        Contact-Us
                    </h5>
                </a>
            </li>
            <li class="nav-item btn">
                <a href="" class="nav-link text-light">
                    <h5>
                        About
                    </h5>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link text-light">
                    <h4>
                        
                    </h4>
                </a>
            </li>
        </ul>
    </div>
    </section>
</div>
</Section>
<!-- top section ends here -->


<section>
    <div class="text-center justify-center border mt-5 mx-auto rounded-sm w-75">
        <div class="row mt-4">
                <div class="col-md-1"></div>
            <div class="col-md-12  text-center">
                <h1>
                <?php $name1=mysqli_query($con,"select name from user_info where id=".$_SESSION['senderid']);
            $sendername=mysqli_fetch_assoc($name1);
            $name2=mysqli_query($con,"select name from user_info where id=".$_GET['id']);
            $recievername=mysqli_fetch_assoc($name2);
     


            ?>
                   
               <?php echo"Dear ".$sendername['name'].", Do you Want to Pay to ".$recievername['name']."?";
?>
                </h1>
              
                <form class="form-group mt-5" method="post" action="back.php" >
                
                    <input type="text" name="amount" class="form-control w-50 mx-auto" placeholder="Enter Amount here??">
                    <input type="hidden" name="reciever" value="<?php echo $_GET['id']?>">
                    
                    <input   class="btn btn-primary my-5" type="submit" value="Click here to Pay!!">
                       
                    
                </form>
            </div>
           
        </div>
    </div>
</section>
<!--main section ends here-->
    
</body>
</html>



