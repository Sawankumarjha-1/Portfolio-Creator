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
    $project_name=$_POST['project_name'];
    $category=$_POST['category'];
    $client=$_POST['client'];
    $tool=$_POST['tool'];
    $link=$_POST['link'];
    $brief=$_POST['brief'];
    $email=$_SESSION['email'];
    $file=$_FILES['photo'];

    $images= implode(',',$file['name']);
    
  foreach ($file['name'] as $key => $value) {
    move_uploaded_file($_FILES['photo']['tmp_name'][$key],'upload/'.$value);
  }
    $sql="INSERT INTO `project`(`email`, `project_name`, `categroy`, `client`, `tools`, `link`, `brief`, `images`) VALUES ('$email','$project_name','$category','$client','$tool','$link','$brief','$images')";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?>
    <div class="popup">
        <p>Do you want to add more projects ?</p>
        <div class="popupBtn">
            <button onclick="popup('yes','project.php')">Yes</button>
            <button onclick="popup('no','experience.php')">No</button>
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

    <!-- Project Form -->



    <form action=""
          method="post"
          class="signupForm"
          enctype="multipart/form-data">
        <h1 class="heading">Project Details</h1>
        <hr class="line">

        <div class="educationForm">
            <input type="text"
                   name="project_name"
                   id=""
                   placeholder="*Project Name"
                   required
                   autocomplete="off">
            <input type="text"
                   name="category"
                   id=""
                   placeholder="*Project Category"
                   required
                   autocomplete="off">

            <input type="text"
                   name="client"
                   id=""
                   placeholder="*Client ( None if personal project)"
                   required
                   autocomplete="off">
            <input type="text"
                   name="tool"
                   id=""
                   placeholder="*tools/Programming languages used (separated by commas)"
                   required
                   autocomplete="off">

            <input type="text"
                   name="link"
                   id=""
                   placeholder="*Enter link if hosted else enter none."
                   required
                   autocomplete="off">

            <textarea name="brief"
                      id=""
                      placeholder="*Brief details about project"
                      required
                      autocomplete="off"></textarea>

            <input type="file"
                   name="photo[]"
                   id=""
                   multiple="multiple"
                   required
                   autocomplete="off">


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