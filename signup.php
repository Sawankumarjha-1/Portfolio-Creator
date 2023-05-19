<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('DB/conn.php'); ?>
    <?php include('partials/head.php'); ?>

</head>

<body>
    <?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $tag_name=$_POST['tag_name'];
    $email=strtolower($_POST['email']);
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $facebook=$_POST['facebook'];
    $profile=$_POST['profile'];
    $password=$_POST['password'];

    $check="Select * from personal_details where email_id='$email'";
    $personal=mysqli_query($conn,$check);
//     $personalData = mysqli_fetch_assoc($personal); 
// //    echo $personalData['email_id']!=$email;
    if(mysqli_num_rows($personal)==0){


                $file=$_FILES['image'];
                $filename=$file['name'];
                $filepath=$file['tmp_name'];
                move_uploaded_file($filepath,'upload/'.$filename);

                $sql="INSERT INTO `personal_details`(`name`, `tag_name`, `email_id`, `facebook_link`, `password`, `address`,
                `profile`, `phone`,`image`) VALUES
                ('$name','$tag_name','$email','$facebook','$password','$address','$profile','$phone','$filename')";
                $result=mysqli_query($conn,$sql);
                if($result){
                $_SESSION["email"] = $email;
                ?>
    <script>
    location.href = 'education.php';
    </script>
    <?php
                }

}else{
        ?>
    echo "<script>
    alert("This email is already exit......");
    location.href = "signup.php";
    </script>"
    <?php
    }
}   
?>

    <nav class="navigationBar">
        <a href="index.php"><img src="Images/Portfolio-Creator.jpg"
                 alt="Not Found"
                 srcset=""></a>
        <div class="contactUs">
            <a href="index.php">HOME</a>
        </div>
    </nav>
    <!-- Header -->
    <div class="viewHeader">
        <div>
            <h1>Create Portfolio</h1>
            <p>Please fill below form to create an account !</p>
        </div>
    </div>

    <!-- Signup Form -->


    <form action=""
          method="post"
          class="signupForm"
          enctype="multipart/form-data">
        <h1 class="heading">Personal Details</h1>
        <hr class="line">

        <div class="educationForm">
            <input type="text"
                   name="name"
                   id=""
                   placeholder="*Enter your full name......"
                   required
                   autocomplete="off">
            <input type="text"
                   name="tag_name"
                   id=""
                   placeholder="*Enter your tag name (like developer, Engineer)......"
                   required
                   autocomplete="off">

            <input type="email"
                   name="email"
                   id=""
                   placeholder="*Enter your email id/username......"
                   required
                   autocomplete="off">
            <input type="text"
                   name="phone"
                   id=""
                   placeholder="*Enter your phone no......"
                   required
                   autocomplete="off"
                   maxlength="10">

            <input type="text"
                   name="facebook"
                   id=""
                   placeholder="*Enter facebook link  ......"
                   required
                   autocomplete="off">

            <input type="password"
                   name="password"
                   id=""
                   placeholder="Enter you password......"
                   required
                   autocomplete="off">
            <input type="file"
                   name="image"
                   id=""
                   required>

            <textarea name="address"
                      id=""
                      placeholder="*Enter your Address......"
                      required
                      autocomplete="off"></textarea>

            <textarea name="profile"
                      id=""
                      placeholder="*Enter your brief profile......"
                      required
                      autocomplete="off"
                      maxlength="500"></textarea>

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