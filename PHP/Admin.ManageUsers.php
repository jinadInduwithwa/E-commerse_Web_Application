<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "./Includes/dbh.inc.php";
include "./Admin.NavBar.php";

if($role != 'admin'){
    echo "<script>alert('Please login as Admin');</script>";
    echo "<script>window.open('./User.Loging.php','_self')</script>";
}

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="../Style/Admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    

</head>
<body>
    <div class="adminTitle">
            <p>register users</p>
    </div> 
    <div class="manageUserContainer">
        <table class="usersTable">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Active</th>
                    <th>Disactive</th>
                    <th>suspend</th>
                </tr>
            </thead>
            <tbody>

            <?php 
                    $selectRegisterUsers = "SELECT * FROM users";
                    $selectRegisterUsersResults = mysqli_query($conn,$selectRegisterUsers);
                    while($row = mysqli_fetch_assoc($selectRegisterUsersResults)){

                        $userId = $row['id'];
                        $usersFirstName = $row['usersFirstName'];
                        $usersEmail = $row['usersEmail'];
                        $usersPhoneNumber = $row['usersPhoneNumber'];
                        $usersCity = $row['usersCity'];
                        $usersCountry = $row['usersCountry'];
                        $role = $row['role'];
                        $status = $row['status'];

                        if($role == "admin"){
                            continue;
                        }
                        if($role == "contributor"){
                            continue;
                        }
     
            ?>

                <tr>
                    <td><?php echo $userId ?></td>
                    <td><?php echo $usersFirstName ?></td>
                    <td><?php echo $usersEmail ?></td>
                    <td><?php echo $usersPhoneNumber ?></td>
                    <td><?php echo $usersCity ?></td>
                    <td><?php echo $usersCountry ?></td>
                    <td><?php echo $role ?></td>
                    <td><?php if($status == 1){echo 'Active'; }else{echo 'Deactive';}?></td>
                    <td><a href='./Includes/Admin.ManageUsers.Active.php?usersId=<?php echo $userId ?>'><i class="fa-solid fa-person-circle-check"></i></a></td>
                    <td><a href='./Includes/Admin.ManageUsers.Deactive.php?usersId=<?php echo $userId ?>'><i class="fa-solid fa-circle-xmark"></i></a></td>
                    <td><a href='./Includes/Admin.ManageUsers.Suspend.php?usersId=<?php echo $userId ?>'><i class="fa-solid fa-trash"></i></a></td>

                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>


    <div class="adminTitle">
            <p>contributors</p>
    </div> 
    <div class="manageUserContainer">
        <table class="usersTable">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Active</th>
                    <th>Disactive</th>
                    <th>suspend</th>
                </tr>
            </thead>
            <tbody>

            <?php 
                    $selectRegisterUsers = "SELECT * FROM users";
                    $selectRegisterUsersResults = mysqli_query($conn,$selectRegisterUsers);
                    while($row = mysqli_fetch_assoc($selectRegisterUsersResults)){

                        $userId = $row['id'];
                        $usersFirstName = $row['usersFirstName'];
                        $usersEmail = $row['usersEmail'];
                        $usersPhoneNumber = $row['usersPhoneNumber'];
                        $usersCity = $row['usersCity'];
                        $usersCountry = $row['usersCountry'];
                        $role = $row['role'];
                        $status = $row['status'];

                        if($role == "admin"){
                            continue;
                        }
                        if($role == "user"){
                            continue;
                        }
     
            ?>

                <tr>
                    <td><?php echo $userId ?></td>
                    <td><?php echo $usersFirstName ?></td>
                    <td><?php echo $usersEmail ?></td>
                    <td><?php echo $usersPhoneNumber ?></td>
                    <td><?php echo $usersCity ?></td>
                    <td><?php echo $usersCountry ?></td>
                    <td><?php echo $role ?></td>
                    <td><?php if($status == 1){echo 'Active'; }else{echo 'Deactive';}?></td>
                    <td><a href='./Includes/Admin.ManageUsers.Active.php?usersId=<?php echo $userId ?>'><i class="fa-solid fa-person-circle-check"></i></a></td>
                    <td><a href='./Includes/Admin.ManageUsers.Deactive.php?usersId=<?php echo $userId ?>'><i class="fa-solid fa-circle-xmark"></i></a></td>
                    <td><a href='./Includes/Admin.ManageUsers.Suspend.php?usersId=<?php echo $userId ?>'><i class="fa-solid fa-trash"></i></a></td>

                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</body>
</html>
