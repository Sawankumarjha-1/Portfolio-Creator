<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('partials/head.php'); ?>


</head>

<body>

    <div class="starter">

        <h1>Create Your Portfolio With <img src="Images/Portfolio-Creator.jpg"
                 alt=""
                 srcset=""></h1>
        <form action="view.php"> <input type="text"
                   name="search"
                   id=""
                   placeholder="Enter portfolio id which you want to search....."> <button type="submit">SEARCH</button>
        </form>
        <div><a href="signup.php">SIGNUP</a>
            <a href="login.php">LOGIN</a>
        </div>

        <?php 
        if(isset($_SESSION['email'])){?>
        <a href="dashboard.php">Go To dashboard</a>
        <?php 
        }
        
        ?>


    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init({
        offset: 300,
        duration: 1000
    });
    </script>

</body>

</html>