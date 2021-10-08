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
            background-image: url("https://treasurytoday.com/-/media/images/insight-and-analysis/short-reads/2019-01-24-ti-01__financial-graph-on-technology-abstract-background-755847970__1920x1080.jpg");
        }
    </style>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "2234";
    $database = "bank";
    $name = $_POST['name'];
    $holder = $_POST['holder'];
    $amount = $_POST['amount'];
    $con = mysqli_connect($servername, $username, $password, $database);
    $quer1 = "select * from users where name='$holder'";
    $quer2 = "select * from users where name='$name'";

    $rq1 = mysqli_query($con, $quer1);
    $rq2 = mysqli_query($con, $quer2);

    $a = mysqli_fetch_array($rq2);

    echo "  <form action='' method='post'>";
    if ($arr = mysqli_fetch_array($rq1)) {
        if ($arr['balance'] < $amount) {
            echo '<script type="text/javascript">';
            echo ' alert("You do not have enough balance...")';  //not showing an alert box.
            echo '</script>';
        } else {
            $holderbal = $arr['balance'] - $amount;
            $creditbal = $a['balance'] + $amount;

            $q1 = "update users set balance='$holderbal' where name='$holder'";
            $query1 = mysqli_query($con, $q1);
            $q2 = "update users set balance='$creditbal' where name='$name'";
            $query2 = mysqli_query($con, $q2);
            echo '<html><center><div class="card">
    <div class="container">
    <b style="font-size:35px;">Your payment was Successful!</b><br><br><br>
    We wish our Banking system helped you :)<br>
    Wishing you all the best for your life<br>
    Finally,<b>Treat People With Kindness</b>
    <pre>
    



</pre>
Making Lives Better<br>
-Navya Y R.
-TSF
    
    </div>
</div>
</center>
</html>';
            echo '<script type="text/javascript">';
            echo ' alert("Your transfer was successful!")';  //not showing an alert box.
            echo '</script>';
        }
    }
    ?>
</html>



