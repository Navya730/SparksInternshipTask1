<html>
    <style>
        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 30%;
            height:500px;
            padding-top: 50px;
            background-color:blueviolet;
        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        /* Add some padding inside the card container */
        .container {
            padding: 2px 16px;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            border-radius: 5px; /* 5px rounded corners */
        }

        /* Add rounded corners to the top left and the top right corner of the image */
        img {
            border-radius: 5px 5px 0 0;
        }
        input[type=submit]{
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
        }
        body{
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-image: url("https://jooinn.com/images/money-background-3.png");
        }
    </style>

</html>
<?php
$servername = "localhost";
$username = "root";
$password = "2234";
$database = "bank";
$holder = $_POST['name'];

$con = mysqli_connect($servername, $username, $password, $database);
$quer = "select * from users where name='$holder'";
$rq = mysqli_query($con, $quer);

echo "  <form action='choosetotransfer.php' method='post'>";
if ($arr = mysqli_fetch_array($rq)) {
    echo "<center>
    
    <div class='card'>
  <img src='https://tse1.mm.bing.net/th?id=OIP.QGwaRzdk1QZp_RVkZdqg6AHaHa&pid=Api&rs=1&c=1&qlt=95&w=118&h=118' alt='Avatar'>
  <div class='container'>
  <p>id: $arr[id]</p>
    <h4><b>$arr[name]</b></h4>
        <p>Email: $arr[email]</p>
    <p>Account balance: $arr[balance]</p>
     <input type='hidden' name='holder' value='$holder'><input type='submit' name='ViewUser' value='TRANSFER MONEY'>
       
  </div>
    </div>
    </center>
  ";
}
echo "</form>";
?>
