<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('partials/head.php'); ?>
    <?php include('DB/conn.php'); ?>

</head>

<body>

    <?php 
    if(isset($_GET['login'])){
        $email=strtoLower($_GET['email']);
        $password=$_GET['password'];

        $check="Select * from personal_details where email_id='$email' AND password='$password'";
        $personal=mysqli_query($conn,$check);
        // $personalData = mysqli_fetch_assoc($personal); 
        if(mysqli_num_rows($personal)>0){
            $_SESSION["email"] = $email;
            ?>
    <script>
    location.href = 'dashboard.php';
    </script>
    <?php

        }else{
?>
    <script>
    alert("Invalid Username and Password......");
    </script>
    <?php
        }

    }

?>
    <nav class="navigationBar">
        <a href="index.php"><img src="Images/Portfolio-Creator.jpg"
                 alt="Not Found"
                 srcset=""></a>
    </nav>
    <!-- Login Form -->
    <div class="loginForm">
        <form action=""
              method="get">

            <div class="loginHeader">
                <i class="fa fa-smile-o fa-5x"></i>
                <h1>Welcome Back to <img src="Images/Portfolio-Creator.jpg"
                         alt="Not Found"
                         srcset=""></h1>
            </div>
            <div class="inputFields">
                <input type="text"
                       name="email"
                       id=""
                       placeholder="Enter your username......">
                <input type="password"
                       name="password"
                       id=""
                       placeholder="Enter your password......">
                <div class="formBtn">
                    <!-- <small>Forget Password ?</small> -->
                    <button type="submit"
                            name="login">Login</button>
                </div>
            </div>

        </form>
    </div>
    <!-- footer -->
    <?php include('Partials/footer.php');?>

    <script src="
                 https://unpkg.com/aos@2.3.1/dist/aos.js">
    </script>
    <script>
    AOS.init({
        offset: 300,
        duration: 1000
    });
    $('#close').click(function() {
        $('#viewer').css("display", "none");
    })

    function view() {
        $('#viewer').css("display", "flex");

    }
    </script>

</body>


</html>