<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer-Money</title>
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




	if(isset($_GET['search']))
	{
$search=$_GET['searches'];
		$search=preg_replace("#[^0-9a-z]#i","",$search);

	}
else{
	$search="%";
}


require('connection.php');

$sql="select * from user_info WHERE name Like'%$search%'";

$rows=mysqli_query($con,$sql);
$i=0;


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
                        <li class="nav-item btn">
                            <a href="index.php" class="nav-link text-light">
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
                            <h5>
                                
                            </h5>
                        </a>
                    </li>
                </ul>
            </div>
            </section>
        </div>
        </Section>
        <!-- top section ends here -->
        
        <div class="w-75 mx-auto mt-5">
        <div class=" mx-auto my-5 text-center"> 
        <h1>
            Hello <em><?php $name=mysqli_query($con,"select name from user_info where id=".$_GET['id']);
            $user=mysqli_fetch_assoc($name);
            echo $user['name'];
            session_start();
            session_regenerate_id(true);

$_SESSION['senderid'] = $_GET['id'];  

            ?></em>!!
        </h1>
    </div>
        <div class="search-box" style="margin-left: 25%; margin-bottom: 25px;">
									<form action="" method="get">
										<input type="text" placeholder="Search..." required="" name="searches">	
										<input type="submit" value="" name="search">					
									</form>
								</div> 

            <table class="table table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Current Balance</th>
                        <th> Transfer to</th>
                    </tr>
                </thead>

                <tbody>
                <?php
	  
	  while($row=mysqli_fetch_array($rows)){$i++;
	  ?>
                    <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?>/td>
                        <td> <?php echo $row['balance'];?></td>
                        <td>
                            <button class="btn btn-primary text-center" >
                                <a class="nav-link text-light" href="transferback.php?id=<?php echo $row['id'];?>">
                                    <em class="	fas fa-user-alt" aria-hidden="true"></em>
                                    Select
                                </a>
                            </button>
                        </td>
                    </tr>
                    <?php
	  }
	  ?>
                 
                </tbody>
            </table>
        </div>
    
</body>
</html>