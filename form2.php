<?php
if(isset($_POST['next'])){
    $name = $_POST['name'];
    $sname = $_POST['sname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];
    $country = $_POST['country'];
    $adress = $_POST['adress'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "db.sui";


    

    if(empty($name) || empty($sname) || empty($email) || empty($quantity) || empty($size) || empty($country) || empty($adress)){
        header("Location: form.php?signup=empty");
        exit();

    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: form.php?signup=invalidEmail");
            exit();
        }

        if(!preg_match('/^[0-9]{10}+$/', $tel)){
            header("Location: form.php?signup=invalidTel");
            exit();
        }

            $conn = new mysqli($servername, $username, $password, $db_name);


        if($conn->connect_error){
            die("connection failed: " . $conn->connect_error);
        }else{
            $sql = "INSERT INTO orders(name, sname, email, tel, quantity, size, country, adress) VALUES($name, $sname, $email, $tel, $quantity, $size, $country, $adress)";
            if($conn->query($sql) === FALSE){
                echo'<script type="text/javascript">';
                echo'alert("data base error")';
                echo'</script>';
            }
        }
    }

}else{
    header("Location: form.php?signup=error");
}
?>
<html>
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sui</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body class="body2">
    <?php
    
    
    
    ?>
        <header>
            <nav>
                <img src="LOGO.png" id="logo">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <img src="Search.png">
                </div>

                <ul>
                    <li>
                        <a href="ura.php">Home</a></li>
                    <li>
                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Videos</a></li>
                    <li>
                        <a href="https://shop.realmadrid.com/collections/home-kit-22-23">Gifts</a></li>
                    <li>
                        <a href="AboutUs.html">About us</a> </li>
                </ul>
                <img src="moon.png" id="icon">
            </nav>
        </header>


        <div class="container">

            <div class="card-container">

                <div class="front">
                    <div class="image">
                        <img src="image/chip.png" alt="">
                        <img src="image/visa.png" alt="">
                    </div>
                    <div class="card-number-box">################</div>
                    <div class="flexbox">
                        <div class="box">
                            <span>card holder</span>
                            <div class="card-holder-name">full name</div>
                        </div>
                        <div class="box">
                            <span>expires</span>
                            <div class="expiration">
                                <span class="exp-month">mm</span>
                                <span class="exp-year">yy</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="back">
                    <div class="stripe"></div>
                    <div class="box">
                        <span>cvv</span>
                        <div class="cvv-box"></div>
                        <img src="image/visa.png" alt="">
                    </div>
                </div>

            </div>

            <form action="confirmation.php" method="POST">
                <div class="inputBox">
                    <span>card number</span>
                    <input type="text" maxlength="16" class="card-number-input">
                </div>
                <div class="inputBox">
                    <span>card holder</span>
                    <input type="text" class="card-holder-input">
                </div>
                <div class="flexbox">
                    <div class="inputBox">
                        <span>expiration mm</span>
                        <select name="" id="" class="month-input">
                <option value="month" selected disabled>month</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
                    </div>
                    <div class="inputBox">
                        <span>expiration yy</span>
                        <select name="" id="" class="year-input">
                <option value="year" selected disabled>year</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
            </select>
                    </div>
                    <div class="inputBox">
                        <span>cvv</span>
                        <input type="text" maxlength="4" class="cvv-input">
                    </div>
                </div>
                <input type="submit" value="submit" class="submit-btn">
            </form>

        </div>



        <footer>
            <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
        </footer>

        <script src="dark-mode.js"></script>

</body>

</html>


