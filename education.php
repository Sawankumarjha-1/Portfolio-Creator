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
    $class=$_POST['class'];
    $school=$_POST['school'];
    $start=$_POST['fromdate'];
    $end=$_POST['enddate'];
    $percentage=$_POST['percentage'];
    $address=$_POST['address'];
   $email=$_SESSION['email'];
    $sql="INSERT INTO `education`(`class`, `school`, `session_start`, `session_end`, `percentage`,`email`,`address`) VALUES ('$class','$school','$start','$end','$percentage','$email','$address')";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?>

    <div class="popup">
        <p>Do you want to add more education details ?</p>
        <div class="popupBtn">
            <button onclick="popup('yes','education.php')">Yes</button>
            <button onclick="popup('no','project.php')">No</button>
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
    <!-- Education Form -->

    <form action=""
          method="post"
          class="signupForm">
        <h1 class="heading">Education Details</h1>
        <hr class="line">

        <div class="educationForm">
            <input type="text"
                   name="class"
                   id=""
                   placeholder="*Class/Steam"
                   required
                   autocomplete="off">
            <input type="text"
                   name="school"
                   id=""
                   placeholder="*School/University/College"
                   required
                   autocomplete="off">

            <input type="text"
                   name="fromdate"
                   id=""
                   placeholder="*Session Start Year"
                   required
                   autocomplete="off"
                   title="Session Start">
            <input type="text"
                   name="enddate"
                   id=""
                   placeholder="*Session End Year"
                   required
                   autocomplete="off"
                   title="Session End">

            <input type="
                   text"
                   name="percentage"
                   id=""
                   placeholder="*%/CGPA with symbol"
                   required
                   autocomplete="off">
            <textarea name="address"
                      id=""
                      placeholder="*Enter your School/University/College Address......"
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


<?php
}else{
    ?>
<script>
location.href = "not.php";
</script>
<?php
}
?>