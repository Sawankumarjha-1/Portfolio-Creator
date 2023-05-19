<?php
 include('DB/conn.php');

 $searchEmail = $_GET['search'];

 $sql="SELECT * FROM `personal_details` WHERE email_id='$searchEmail'";
 $personal=mysqli_query($conn,$sql);
 $personalData = mysqli_fetch_assoc($personal);

if(mysqli_num_rows($personal)>0){
   

?>
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
            <a href="<?php echo $personalData['facebook_link'];?>"
               target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="tel:<?php echo $personalData['phone'];?>"><i class="fa fa-phone"></i></a>
            <a href="mailto:<?php echo $personalData['email_id'];?>"><i class="fa fa-envelope-o"></i></a>
        </div>

    </nav>
    <div class="viewHeader">
        <div>
            <h1><?php echo $personalData['name'];?></h1>
            <p><?php echo $personalData['tag_name'];?></p>
        </div>
    </div>
    <!-- PROFILE -->
    <div class="profile">
        <p><?php echo $personalData['profile'];?></p>
        <div>
            <img src="upload/<?php echo $personalData['image'];?>"
                 alt="Not FOund"
                 srcset="">

        </div>

    </div>
    <!-- EDUCATION -->
    <?php 
    
    $sqlEducation="SELECT * FROM `education` WHERE email='$searchEmail'";
    $education=mysqli_query($conn,$sqlEducation);
    // echo mysqli_num_rows($education);
    if (mysqli_num_rows($education) > 0) {?>
    <h1 class="heading">EDUCATION</h1>
    <hr class="line">
    <div class="education  ">

        <?php 
    while($educationData = mysqli_fetch_assoc($education)) {
          ?>
        <div class="individualEducation">


            <h2 class="degree"><?php echo $educationData['class'];?></h2>
            <h2 class="schoolName">
                <?php echo $educationData['school'];?><small><?php echo $educationData['percentage'];?></small></h2>
            <ul>
                <li><img src="Images/calendar.png"
                         alt=" Not Found"
                         srcset=""><?php echo $educationData['session_start'];?>-<?php echo $educationData['session_end'];?>
                </li>
                <li><img src="Images/location.png"
                         alt=" Not Found"
                         srcset=""><?php echo $educationData['address'];?></li>
            </ul>

        </div>
        <?php
        }
    
    ?>



    </div><?php
        
      } 
      

?>


    <!-- Our Projects -->
    <?php 
      $sqlProject="SELECT * FROM `project` WHERE email='$searchEmail'";
      $project=mysqli_query($conn,$sqlProject);
      if (mysqli_num_rows($project) > 0) {?>
    <h1 class="heading">Our Projects</h1>
    <hr class="line">
    <div class="projects">

        <?php 
    while($projectData = mysqli_fetch_assoc($project)) {
       
        $img=explode(',',$projectData['images']);
        
        
          ?>
        <div class="individualProject">
            <div class="projectImg"
                 style="background-image:linear-gradient(#f9f8b991,#f9f8b991),url('upload/<?php echo $img[0];?>'); background-size:100% 100%;">
                <h2><?php echo $projectData['project_name']?></h2>
                <a
                   onclick="view('<?php echo $projectData['project_name'];?>','<?php echo $projectData['categroy'];?>','<?php echo $projectData['client'];?>','<?php echo $projectData['tools'];?>','<?php echo $projectData['link'];?>','<?php echo $projectData['brief'];?>','<?php echo $projectData['images']?>')">View
                    Details</a>
            </div>
        </div>
        <?php }?>

    </div>
    <?php }?>
    <!-- Experience -->
    <?php
      $sqlExperience="SELECT * FROM `experience` WHERE email='$searchEmail'";
      $experience=mysqli_query($conn,$sqlExperience);
      if (mysqli_num_rows($experience) > 0) {?>

    <div class="experience">
        <div class="experienceImg">
            <img src="Images/experience.jpg"
                 alt="Not Found"
                 srcset="">
        </div>
        <div class="experienceContent">
            <h1 class="">Experience</h1>

            <ul>
                <?php 
    while($experienceData = mysqli_fetch_assoc($experience)) {
        
          ?>
                <li><?php echo $experienceData['experience'];?></li>
                <?php }?>
            </ul>

        </div>
    </div>
    <?php
        
    } 
    

?>


    <!-- Skills -->
    <?php
      $sqlSkill="SELECT * FROM `skill` WHERE email='$searchEmail'";
      $skill=mysqli_query($conn,$sqlSkill);
      if (mysqli_num_rows($skill) > 0) {?>
    <h1 class="heading">Skills</h1>
    <hr class="line">
    <div class="skills">
        <?php 
        while($skillData = mysqli_fetch_assoc($skill)) {
        
            ?>
        <div class="individualSkill">
            <img src="upload/<?php echo $skillData['image'];?>"
                 alt="Not Found"
                 srcset="">
            <h2><?php echo $skillData['skill_name'];?></h2>
            <p><?php echo $skillData['about_skill'];?></p>
        </div>

        <?php
        }
        ?>
    </div>

    <?php 
}
?>

    <!-- Project Viewer -->
    <div class="projectViewer"
         id="viewer">
        <i class="fa fa-close"
           id="close"></i>
        <h1 id="project_name"> </h1>
        <div class="projectContent">
            <div class="briefDiscusion">
                <h2>Project Brief :</h2>
                <p id="project_brief">
                </P>
            </div>
            <ul>
                <h2>Project Info :</h2>


                <li><b>Client : </b>
                    <small id="project_client"></small>
                </li>
                <li><b>Tools : </b>
                    <small id="project_tool"></small>
                </li>
                <li id="project_link"></li>

            </ul>

        </div>
        <div class="projectImages"
             id="project_img">


        </div>
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

    function view(name, category, client, tools, link, brief, image) {
        $('.project_inner_images').remove();
        document.getElementById('project_name').innerHTML = `${name} ( ${category} )`;
        document.getElementById('project_brief').innerText = brief;

        document.getElementById('project_client').innerText = client;
        document.getElementById('project_tool').innerText = tools;
        if (link != 'none') {
            document.getElementById('project_link').innerHTML = `<b>Link : </b> <a href="${link}"
                       >${link}</a>`;
        }
        let img = image.split(',');
        for (var i = 0; i < img.length; i++) {
            document.getElementById('project_img').innerHTML +=
                `<img src='upload/${img[i]}' alt="Not Found" class="project_inner_images">`;
        }
        $('#viewer').css("display", "flex");


    }

    // Close
    $('#close').click(() => {
        $('#viewer').css("display", "none");
        $('.project_inner_images').remove();
    });
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