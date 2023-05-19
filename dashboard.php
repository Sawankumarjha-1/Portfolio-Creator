<?php 
session_start();
include('DB/conn.php');
if($_SESSION['email']){
    $getUser = $_SESSION['email'];

$sql="SELECT * FROM `personal_details` WHERE email_id='$getUser'";
$personal=mysqli_query($conn,$sql);
$personalData = mysqli_fetch_assoc($personal);
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <?php include('partials/head.php'); ?>
    <style>
    .educationForm textarea {
        width: 100%;
    }
    </style>

</head>

<body>

    <!-- ************Update Code For Profile****************** -->

    <?php
    if(isset($_POST['profileSubmit'])){
     
        $name=$_POST['name'];
        $tagname=$_POST['tag_name'];
        
        $facebook_link=$_POST['link'];
        $password=$_POST['password'];
       
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $profile=$_POST['profile'];
        
        $file=$_FILES['profileImage'];
        $filename=$file['name'];
        if($filename!=''){
             $filepath=$file['tmp_name'];
             move_uploaded_file($filepath,'upload/'.$filename);
            $updateProfileSql="UPDATE `personal_details` SET `name`='$name',`tag_name`='$tagname',`facebook_link`='facebook_link',`password`='$password',`address`='$address',`profile`='$profile',`phone`='$phone',`image`='$filename' WHERE email_id='$getUser'";
        }
        else{
            $updateProfileSql="UPDATE `personal_details` SET `name`='$name',`tag_name`='$tagname',`facebook_link`='facebook_link',`password`='$password',`address`='$address',`profile`='$profile',`phone`='$phone' WHERE email_id='$getUser'";
        }
        $updateProfileResult=mysqli_query($conn,$updateProfileSql);
        if($updateProfileResult){
            ?>
    echo "<script>
    alert('Update Successfully......');
    location.href = 'dashboard.php';
    </script>"
    <?php
        }

    }
    
    ?>

    <!-- ************Update Code For Education****************** -->
    <?php
    if(isset($_POST['educationSubmit'])){
     
        $id=$_POST['id'];
        $class=$_POST['class'];
        
        $school=$_POST['school'];
        $session_start=$_POST['session_start'];
        $session_end=$_POST['session_end'];
        $percentage=$_POST['percentage'];
        $address=$_POST['address'];
        
        $updateEducationSql="UPDATE `education` SET `class`='$class',`school`='$school',`session_start`='$session_start',`session_end`='$session_end',`percentage`='$percentage',`address`='$address' WHERE id='$id'";
        
        $updateEducationResult=mysqli_query($conn,$updateEducationSql);
        // if($updateProfileResult)
        if($updateEducationResult){
            ?>
    echo "<script>
    alert('Update Successfully......');
    location.href = 'dashboard.php';
    </script>"
    <?php
        }
    }
            
    ?>


    <!-- ************Update Code For Project****************** -->
    <?php if(isset($_POST['projectSubmit'])){
        $id=$_POST['id'];
        $project_name=$_POST['project_name'];
        $project_category=$_POST['project_category'];
        $project_client=$_POST['project_client'];
        $tool=$_POST['tools'];
        $link=$_POST['link'];
        $brief=$_POST['brief'];
        $email=$_SESSION['email'];
        $file=$_FILES['photo'];

        $images= implode(',',$file['name']);
    if($images!=''){
        foreach ($file['name'] as $key => $value) {
            move_uploaded_file($_FILES['photo']['tmp_name'][$key],'upload/'.$value);
        }
        $updateProjectSql="UPDATE `project` SET `project_name`='$project_name',`categroy`='$project_category',`client`='$project_client',`tools`='$tool',`link`='$link',`brief`='$brief',`images`='$images' WHERE id='$id'";
    }else{
        $updateProjectSql="UPDATE `project` SET `project_name`='$project_name',`categroy`='$project_category',`client`='$project_client',`tools`='$tool',`link`='$link',`brief`='$brief' WHERE id='$id'";
    }
    $updateProjectResult=mysqli_query($conn,$updateProjectSql);
    if($updateProjectResult){
?>
    echo "<script>
    alert('Update Successfully......');
    location.href = 'dashboard.php';
    </script>"
    <?php
    }}
  ?>

    <!-- ************Update Code For Experience****************** -->
    <?php if(isset($_POST['experienceSubmit'])){
        $id=$_POST['id'];
        $experience=$_POST['experience'];
  

       
        $updateExperienceSql="UPDATE `experience` SET `experience`='$experience' WHERE id='$id'";
   
        $updateExperienceResult=mysqli_query($conn,$updateExperienceSql);
    if($updateExperienceResult){
?>
    echo "<script>
    alert('Update Successfully......');
    location.href = 'dashboard.php';
    </script>"
    <?php
    }}
  ?>

    <!-- ************Update Code For Skill****************** -->
    <?php if(isset($_POST['skillSubmit'])){
        $id=$_POST['id'];
        $skill_name=$_POST['skill_name'];
        $about_skill=$_POST['about_skill'];
        
        $file=$_FILES['photo'];
        $filename=$file['name'];

        if($filename!=''){
             $filepath=$file['tmp_name'];
             move_uploaded_file($filepath,'upload/'.$filename);
             echo "hello";
            $updateSkillSql="UPDATE `skill` SET `skill_name`='$skill_name',`about_skill`='$about_skill',`image`='$filename' WHERE id='$id'";
        }
        else{
            $updateSkillSql="UPDATE `skill` SET `skill_name`='$skill_name',`about_skill`='$about_skill' WHERE id='$id'";
        }
   
        $updateSkillResult=mysqli_query($conn,$updateSkillSql);
    if($updateSkillResult){
?>
    echo "<script>
    alert('Update Successfully......');
    location.href = 'dashboard.php';
    </script>"
    <?php
    }}
  ?>
    <!-- ************Delete Code For Education****************** -->
    <?php
    if(isset($_POST['educationSubmitDelete'])){
     
        $id=$_POST['id'];
        
        $deleteEducationSql="DELETE FROM `education` WHERE id='$id'";
        
        $deleteEducationResult=mysqli_query($conn,$deleteEducationSql);
        // if($updateProfileResult)
        if($deleteEducationResult){
            ?>
    echo "<script>
    alert('Delete Successfully......');
    location.href = 'dashboard.php';
    </script>"
    <?php
        }
    }
            
    ?>


    <!-- ************Delete Code For Project****************** -->
    <?php
    if(isset($_POST['projectSubmitDelete'])){
     
        $id=$_POST['id'];
        
        $deleteProjectSql="DELETE FROM `project` WHERE id='$id'";
        
        $deleteProjectResult=mysqli_query($conn,$deleteProjectSql);
        // if($updateProfileResult)
        if($deleteProjectResult){
            ?>
    echo "<script>
    alert('Delete Successfully......');
    location.href = 'dashboard.php';
    </script>"
    <?php
        }
    }
            
    ?>
    <!-- ************Delete Code For Experience****************** -->
    <?php
    if(isset($_POST['experienceSubmitDelete'])){
     
        $id=$_POST['id'];
        
        $deleteExperienceSql="DELETE FROM `experience` WHERE id='$id'";
        
        $deleteExperienceResult=mysqli_query($conn,$deleteExperienceSql);
        // if($updateProfileResult)
        if($deleteExperienceResult){
            ?>
    echo "<script>
    alert('Delete Successfully......');
    location.href = 'dashboard.php';
    </script>"
    <?php
        }
    }
            
    ?>
    <!-- ************Delete Code For Skill****************** -->
    <?php
    if(isset($_POST['skillSubmitDelete'])){
     
        $id=$_POST['id'];
        
        $deleteSkillSql="DELETE FROM `skill` WHERE id='$id'";
        
        $deleteSkillResult=mysqli_query($conn,$deleteSkillSql);
        // if($updateProfileResult)
        if($deleteSkillResult){
            ?>
    echo "<script>
    alert('Delete Successfully......');
    location.href = 'dashboard.php';
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
            <a href="logout.php">LOGOUT</a>
        </div>
    </nav>
    <!-- Header -->
    <div class="viewHeader">
        <div>
            <h1 class="dashoboardHeading">Hi , Rohan<i class="fa fa-smile-o fa-2x"></i></h1>

        </div>
    </div>

    <div class="signupForm">

        <!-- ********************************************Personal Dashboard************************************ -->

        <h1 class="heading">Personal Details</h1>
        <hr class="line">

        <form class="educationForm"
              method="post"
              enctype="multipart/form-data">
            <input type="text"
                   name="name"
                   title="Name"
                   placeholder="Enter your name"
                   value="<?php echo $personalData['name'];?>">

            <input type="text"
                   title="Tag Name"
                   name="tag_name"
                   placeholder="Enter your tag name"
                   value="<?php echo $personalData['tag_name'];?>">

            <input type="text"
                   title="email"
                   value="<?php echo $personalData['email_id'];?>"
                   disabled>

            <input type="text"
                   name="link"
                   title="facebook link"
                   placeholder="Enter your facebook link"
                   value="<?php echo $personalData['facebook_link'];?>">

            <input type="text"
                   title="password"
                   name="password"
                   placeholder="Enter your password"
                   value="<?php echo $personalData['password'];?>">

            <input type="text"
                   title="Phone no"
                   name="phone"
                   placeholder="Enter your phone no"
                   value="<?php echo $personalData['phone'];?>">

            <textarea title="Address"
                      name="address"
                      placeholder="Enter your address"><?php echo $personalData['address'];?></textarea>

            <textarea title="Profile"
                      name="profile"
                      placeholder="Enter your profile"><?php echo $personalData['profile'];?></textarea>

            <div class="imageUpload">
                <label><?php echo $personalData['image'];?></label>
                <input type="file"
                       name="profileImage"
                       id="">
            </div>

            <button type="submit"
                    class="mainBtn"
                    name="profileSubmit"
                    title="update"><i class="fa fa-paper-plane"></i></button>

        </form>


        <!-- ********************************************Education Dashboard************************************ -->



        <?php   $sqlEducation="SELECT * FROM `education` WHERE email='$getUser'";
                        $education=mysqli_query($conn,$sqlEducation);
   
    if (mysqli_num_rows($education) > 0) {?>
        <h1 class="heading">Education Details <a href="addeducation.php"><i class="fa fa-plus"></i></a></h1>
        <hr class="line">
        <?php 
    while($educationData = mysqli_fetch_assoc($education)) {
          ?>
        <form class="educationForm"
              method="post"
              enctype="multipart/form-data">

            <input type="text"
                   name="id"
                   value="<?php echo $educationData['id'];?>"
                   style="display:none;">

            <input type="text"
                   title="Class/Steam"
                   name="class"
                   placeholder="Enter your Class/Steam"
                   value="<?php echo $educationData['class'];?>">

            <input type="text"
                   title="School/University/College"
                   name="school"
                   placeholder="Enter your School/University/College"
                   value="<?php echo $educationData['school'];?>">

            <input type="text"
                   title="Session Start"
                   name="session_start"
                   placeholder="Session start"
                   value="<?php echo $educationData['session_start'];?>">

            <input type="text"
                   title="Session End"
                   name="session_end"
                   placeholder="Session end"
                   value="<?php echo $educationData['session_end'];?>">

            <input type="text"
                   title="Percentage"
                   name="percentage"
                   placeholder="Percentage"
                   value="<?php echo $educationData['percentage'];?>">


            <textarea title="Address"
                      name="address"
                      placeholder="Address"><?php echo $educationData['address'];?></textarea>

            <button type="submit"
                    name="educationSubmit"
                    class="mainBtn"
                    title="update"><i class="fa fa-paper-plane"></i></button>
            <button type="submit"
                    name="educationSubmitDelete"
                    class="mainBtn"
                    title="delete"><i class="fa fa-trash"></i></button>

        </form>
        <?php
        }}
    
    ?>
        <!-- ********************************************Project Dashboard************************************ -->


        <?php   $sqlProject="SELECT * FROM `project` WHERE email='$getUser'";
                        $project=mysqli_query($conn,$sqlProject);
   
    if (mysqli_num_rows($project) > 0) {?>
        <h1 class="heading">Project Details <a href="addproject.php"><i class="fa fa-plus"></i></a></h1>
        <hr class="line">
        <?php 
    while($projectData = mysqli_fetch_assoc($project)) {
          ?>
        <form class="educationForm"
              method="post"
              enctype="multipart/form-data">

            <input type="text"
                   name="id"
                   value="<?php echo $projectData['id'];?>"
                   style="display:none;">

            <input type="text"
                   name="project_name"
                   title="Project Name"
                   placeholder="Project Name"
                   value="<?php echo $projectData['project_name'];?>">

            <input type="text"
                   title="Category"
                   name="project_category"
                   placeholder="Project Category"
                   value="<?php echo $projectData['categroy'];?>">

            <input type="text"
                   title="Client"
                   name="project_client"
                   placeholder="Project client"
                   value="<?php echo $projectData['client'];?>">

            <input type="text"
                   title="Tools"
                   name="tools"
                   placeholder="Tools"
                   value="<?php echo $projectData['tools'];?>">

            <input type="text"
                   title="Web Link"
                   name="link"
                   placeholder="Web Link if hosted other wise none"
                   value="<?php echo $projectData['link'];?>">
            <textarea title="Brief Details"
                      name="brief"
                      placeholder="Brief about project"><?php echo $projectData['brief'];?></textarea>
            <div class="imageUpload">
                <label><?php echo $projectData['images'];?></label>
                <input type="file"
                       title="photo"
                       name="photo[]"
                       value=""
                       multiple="multiple">
            </div>


            <button type="submit"
                    name="projectSubmit"
                    class="mainBtn"
                    title="update"><i class="fa fa-paper-plane"></i></button>
            <button type="submit"
                    name="projectSubmitDelete"
                    class="mainBtn"
                    title="delete"><i class="fa fa-trash"></i></button>

        </form>
        <?php
        }}
    
    ?>
        <!-- ********************************************Experience Dashboard************************************ -->



        <?php   $sqlExperience="SELECT * FROM `experience` WHERE email='$getUser'";
                        $experience=mysqli_query($conn,$sqlExperience);
   
    if (mysqli_num_rows($experience) > 0) {?>
        <h1 class="heading">Experience Details <a href="addexperience.php"><i class="fa fa-plus"></i></a></h1>
        <hr class="line">
        <?php 
    while($experienceData = mysqli_fetch_assoc($experience)) {
          ?>
        <form class="educationForm"
              method="post"
              enctype="multipart/form-data">

            <input type="text"
                   name="id"
                   value="<?php echo $experienceData['id'];?>"
                   style="display:none;">


            <textarea title="experience"
                      name="experience"
                      placeholder="Address"><?php echo $experienceData['experience'];?></textarea>

            <button type="submit"
                    name="experienceSubmit"
                    class="mainBtn"
                    title="update"><i class="fa fa-paper-plane"></i></button>
            <button type="submit"
                    name="experienceSubmitDelete"
                    class="mainBtn"
                    title="delete"><i class="fa fa-trash"></i></button>

        </form>
        <?php
        }}
    
    ?>
        <!-- ********************************************Skill Dashboard************************************ -->

        <?php   $sqlSkill="SELECT * FROM `skill` WHERE email='$getUser'";
                        $skill=mysqli_query($conn,$sqlSkill);
   
    if (mysqli_num_rows($skill) > 0) {?>
        <h1 class="heading">Skill Details <a href="addskill.php"><i class="fa fa-plus"></i></a></h1>
        <hr class="line">
        <?php 
    while($skillData = mysqli_fetch_assoc($skill)) {
          ?>
        <form class="educationForm"
              method="post"
              enctype="multipart/form-data">

            <input type="text"
                   name="id"
                   value="<?php echo $skillData['id'];?>"
                   style="display:none;">

            <input type="text"
                   name="skill_name"
                   placeholder="Skill Name"
                   value="<?php echo $skillData['skill_name'];?>">


            <textarea title="About Skill"
                      name="about_skill"
                      placeholder="About Skill"><?php echo $skillData['about_skill'];?></textarea>

            <div class="imageUpload">
                <label><?php echo $skillData['image'];?></label>
                <input type="file"
                       title="Images"
                       name="photo"
                       value="">
            </div>

            <button type="submit"
                    name="skillSubmit"
                    class="mainBtn"
                    title="update"><i class="fa fa-paper-plane"></i></button>
            <button type="submit"
                    name="skillSubmitDelete"
                    class="mainBtn"
                    title="delete"><i class="fa fa-trash"></i></button>

        </form>
        <?php
        }}
    
    ?>
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
<?php

}else{
    ?>
<script>
location.href = "not.php";
</script>
<?php
}


?>