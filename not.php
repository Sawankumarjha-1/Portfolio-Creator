<!DOCTYPE html>
<html lang="en">


<head>
    <?php include('partials/head.php'); ?>

</head>

<body>
    <nav class="navigationBar">
        <a href="index.php"><img src="Images/Portfolio-Creator.jpg"
                 alt="Not Found"
                 srcset=""></a>
        <div class="contactUs">
            <a href="index.php">GO TO HOME</a>
        </div>

    </nav>

    <div class="notFound">
        <h1>Page Not Found !</h1>
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