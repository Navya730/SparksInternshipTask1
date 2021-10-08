<head>
    <link href='https://fonts.googleapis.com/css?family=Charm' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Charm;
            padding: 10px;
            background-color: grey;


        }


        .header h1 {
            font-size: 50px;
        }
        .header p{
            font-size: 30px;
        }

        .leftcolumn {   
            align-content: center;
            width: 100%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }


        table {
            padding-left: 350px;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: center;
        }
        #button{
            color: green;
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
        #heading{
            font-size:20px;
            color: #f2f2f2;
            position: absolute;
            width: 100%;
            text-align: center;
            border:  #f1f1f1;
            color: #ff99ff;
            font-weight: bold;
        }
        input[type=submit]:hover {
            opacity: 0.8;
        }
        tr:nth-child(even) {
            width:100%; 
            background-color: #f2f2f2;}
        tr:first-child{
            text-decoration: underline;
            background-color: lightblue;
            font-style: normal;
            font-weight: bold;
        }
    </style>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "2234";
    $database = "bank";

    $con = mysqli_connect($servername, $username, $password, $database);
    $quer = "select * from users";
    $rq = mysqli_query($con, $quer);
    $total = 0;
    $holder = $_POST['holder'];
    echo "<div class='row'>
  <div class='leftcolumn'>
    <div class='card'>
      <div id='heading' style='height:500px; color:white;'><h1 style=''>Choose to transfer money! </h1><hr width='500px' style='margin-left:550px;'><br><br>
 <div id='heading' style=' background-color:blue;'><h1 style=''></h1><br><br>

<table>
  <tr>
  <th>Name</th>
  <th>Email</th>
  <th>action</th>
  </tr>";
    $run_q = mysqli_query($con, $quer);

    while ($arr = mysqli_fetch_array($run_q)) {
        echo "  <form action='transfer.php' method='post'>";
        echo "
    
    <tr>
  <th><div><input type='hidden' name='name' value='$arr[name]'>$arr[name]</div><br> </th>
  <th><div><input type='hidden' name='email' value='$arr[email]'>$arr[email]</div><br></th>
  <th><input type='hidden' name='holder' value='$holder'><input type='submit' name='ViewUser' value='Choose'></th>
  </tr>";
        echo "</form>";
    }

    echo "</table>";
    ?>

