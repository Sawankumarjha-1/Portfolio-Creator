<?php session_start();
if($_SESSION['email']){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('partials/head.php'); ?>
    <?php include('DB/conn.php'); ?>


</head>

<body>
    <?php
if(isset($_POST['submit'])){
    $experience=$_POST['experience'];
    $email=$_SESSION['email'];
   
    $sql="INSERT INTO `experience`(`email`, `experience`) VALUES ('$email','$experience')";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?>
    <div class="popup">
        <p>Do you want to add more experience ?</p>
        <div class="popupBtn">
            <button onclick="popup('yes','experience.php')">Yes</button>
            <button onclick="popup('no','skill.php')">No</button>
        </div>
    </div>
    <script>
    function popup(answer, loc) {
        $ans = answer.toLowerCase();
        // console.log($ans);
        if ($ans == 'yes') {
            location.href = loc;
        } else {
            location.href = loc;
        }
    }
    </script>

    <?php
    }
}   
?>

    <!-- Experience Form -->


    <form action=""
          method="post"
          class="signupForm">
        <h1 class="heading">Experience Details</h1>
        <hr class="line">

        <div class="educationForm">
            <textarea name="experience"
                      id=""
                      placeholder="*First Experience point"
                      required
                      autocomplete="off"></textarea>

            <button type="submit"
                    name="submit"
                    class="mainBtn">NEXT</button>

        </div>



    </form>

    <!-- footer -->
    <?php include('Partials/footer.php');?>

    <script src="
                 https://unpkg.com/aos@2.3.1/dist/aos.js">
    </script>



    <script>
    AOS.init({
        offset: 300,
        duration: 1000,

    });
    $('#close').click(function() {
        $('#viewer').css("display", "none");
    })


    function view() {
        $('#viewer').css("display", "flex");

    }
    $.alerts.okButton = ' Yes ';
    $.alerts.cancelButton = ' No ';
    </script>



</body>


</html>
<?php
}else{
    ?>
<script>
location.href = "not.php";
</script>
<?php
}
?>