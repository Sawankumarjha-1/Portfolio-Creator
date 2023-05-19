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
    $skill_name=$_POST['skill_name'];
    $about_skill=$_POST['about_skill'];
    $email=$_SESSION['email'];

  

    $file=$_FILES['image'];
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    move_uploaded_file($filepath,'upload/'.$filename);

    
    $sql="INSERT INTO `skill`( `email`, `skill_name`, `about_skill`, `image`) VALUES
    ('$email','$skill_name','$about_skill','$filename');";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?>
    <div class="popup">
        <p>Do you want to add more skills ?</p>
        <div class="popupBtn">
            <button onclick="popup('yes','skill.php')">Yes</button>
            <button onclick="popup('no','dashboard.php')">No</button>
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

    <!-- Skills Form -->



    <form action=""
          method="post"
          class="signupForm"
          enctype="multipart/form-data">
        <h1 class="heading">Skills Details</h1>
        <hr class="line">

        <div class="educationForm">
            <input type="text"
                   name="skill_name"
                   id=""
                   placeholder="*Enter your skill......"
                   required
                   autocomplete="off">

            <textarea name="about_skill"
                      id=""
                      placeholder="*Enter something about skill"
                      required
                      autocomplete="off"
                      maxlength="200"></textarea>
            <input type="file"
                   name="image"
                   id=""
                   required>

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