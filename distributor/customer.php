<?php
include("../config/connection.php");
if(isset($_GET['email'])){
    // Retrieve email value from query parameter
    $email = $_GET['email'];
    $sql = "SELECT * FROM shopowner WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    
    if(mysqli_num_rows($result) == 1){
        // User found, retrieve user information
        $user = mysqli_fetch_assoc($result);
        // You can access user information using $user array, for example:
        $name = $user['name'];
        // Display user information or perform further operations
    } else {
        // User not found with the provided email
        // Handle this case as needed, for example:
        echo "User not found";
    }
} else {
    // Handle case when email parameter is not provided in the URL
    echo "Email parameter is missing";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Distributor Dashboard | E-Ration </title>
    <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-right: 5px;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #0A2558;
        color: white;
    }

    .btn {
        width: 60px;
        text-decoration: none;
        line-height: 35px;
        display: inline-block;
        background-color: #0A2558;
        font-weight: medium;
        color: #ffffff;
        text-align: center;
        vertical-align: none;
        user-select: none;
        border: 1px solid transparent;
        font-size: 14px;
        opacity: 1;
        margin-left: 45%;
    }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="logo2.png" height="40px" weight="40px" style="margin-left: 10px">
            <img src="logo3.png" height="40px" weight="140px">
        </div>
        <ul class="nav-links">
           
            <li>
                <a href="avail_stock.php?name=<?php echo urlencode($name); ?>">
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Check Available Stock</span>
                </a>
            </li>
            <li>
            <a href="apply_stock.php?name=<?php echo urlencode($name); ?>">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Apply For Stock</span>
                </a>
            </li>
            <li>
                <a href="customer.php?email=<?php echo urlencode($email); ?>">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Customers</span>
                </a>
            </li>
           
            
            <li>
                <a href="edit_profile.php?name=<?php echo urlencode($name); ?>">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Edit Profile</span>
                </a>
            </li>
            <li class="log_out">
                <a href="../login/index.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Customers</span>
            </div>
            <div class="profile-details">
              
                <span class="distributor_name">Welcome <?php echo $name; ?></span>

            </div>
        </nav>
        <div class="home-content w3-responsive" style="margin-left: 2rem;margin-right:2rem">
            <table id="customers" class="w3-table-all">
                <thead>
                    <tr>
                        <th>SR No</th>
                        <th>Name</th>
                        <th>Ration Card No</th>
                        <th>Order No</th>
                        <th>Email-id</th>
                        <th>Phone No</th>
                        <th>Pincode</th>
                        <th>Address</th>
                        <th></th>
                    </tr>
                   
            </table>
            <div class="w3-center w3-margin">
                <a href="print_customers.php?pincode=" target="_blank"
                    class="w3-button w3-round-large w3-dark-blue" name="btnprint">Print</a>
            </div>
        </div>
    </section>
    <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else
            sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
    </script>

</body>

</html>
