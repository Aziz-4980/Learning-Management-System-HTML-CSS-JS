<!DOCTYPE html>
<html lang="en">

<head>
    <style class="vjs-styles-defaults">
        .video-js {
            width: 300px;
            height: 150px;
        }

        .vjs-fluid {
            padding-top: 56.25%
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <title>QLMS</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/carousel/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./CSS/styles.css">
</head>

<body cz-shortcut-listen="true">


    <?php include "./components/Header.html" ?>

    <!-- *******************view Lecture****************************-->
    <div id="viewLectureModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ">view Lectures</h4>
                    <button type="button" class="close" data-dismiss="modal" id="modal-button">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row row-content ">
                        <div class="col-12 col-md-10 offset-1">
                            <div>
                                <h3>Lectures</h3>
                            </div>
                        </div>

                        <div class=" container">
                            <div class="row">
                                <?php
                                // $title = 'Web Develop';
                                
                                if (isset($_GET["data"])) {
                                    $data = $_GET["data"];
                                }else{

                                }
                                
                                $con =  new mysqli("localhost", "root", "", "learning_management_system");
                                $query = " SELECT * FROM lecture where CourseCode = $data";
                                $result = mysqli_query($con, $query);

                                

                                // $quariy = $mysqli->query("select * from course ");
                                while ($row = mysqli_fetch_array($result)) :

                                ?>

                                    <div class=" col-12 col-md-6" style="margin-top:4px ;">
                                        <div class="card">
                                            <h4 class="card-header">

                                            </h4>
                                            <div class="card-body" style="color: black;">
                                                <ul>
                                                    <li><?php echo $row['CourseCode'] ?>

                                                    </li>
                                                    <li>
                                                        <?php echo $row['LectureTopic'] ?>
                                                    </li>

                                                    <li>
                                                        <a href="./downloadLecture.php?id = <?php echo $row['CourseCode']?> "><button class="button btn-bg btn-dark">Click here to download</button></a>

                                                    </li>
                                                </ul>

                                            </div>

                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                ?>
                            </div>

                        </div>






                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ******************* view Assignment ****************************-->
    <div id="viewAssignmentModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ">View Assignments</h4>
                    <button type="button" class="close" data-dismiss="modal" id="modal-button">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row row-content ">
                        <div class="col-12 col-md-10 offset-1">
                            <div>
                                <h3>Assignments</h3>
                            </div>



                            <!-- <form method="POST" action="addUser.php"> -->
                            <div class=" container">
                                <div class="row">
                                    <?php
                                    // $title = 'Web Develop';
                                    $con =  new mysqli("localhost", "root", "", "learning_management_system");
                                    $query = " SELECT * FROM course ";
                                    $result = mysqli_query($con, $query);

                                    // $quariy = $mysqli->query("select * from course ");
                                    while ($row = mysqli_fetch_array($result)) :

                                    ?>

                                        <div class=" col-12 col-md-6" style="margin-top:4px ;">
                                            <div class="card">
                                                <h4 class="card-header">

                                                </h4>
                                                <div class="card-body" style="color: black;">
                                                    <ul>
                                                        <li><?php echo $row['CourseCode'] ?>

                                                        </li>
                                                        <li>
                                                            <?php echo $row['CourseName'] ?>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="card-footer"><?php echo $row['CourseName'] ?></div>
                                            </div>
                                        </div>
                                    <?php
                                    endwhile;
                                    ?>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ******************* Add Student ****************************-->
    <div id="addCourseModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ">Add Course</h4>
                    <button type="button" class="close" data-dismiss="modal" id="modal-button">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row row-content ">
                        <div class="col-12 col-md-10 offset-1">
                            <div>
                                <h3>Add a Course record</h3>
                            </div>
                            <!-- <form method="POST" action="addUser.php"> -->
                            <form>
                                <div class="row form-group">
                                    <label for="forEmail" class="clo-12 col-md-4">
                                        <b>Course Code</b>
                                    </label>
                                    <div class="col-12 col-md-8">
                                        <input type="ID" class="form-control " id="teachID" name="teachID" placeholder="Course Code" required>
                                    </div>
                                    <label for="tName" class="clo-12 col-md-4">
                                        <b>Course Name</b>
                                    </label>
                                    <div class="col-12 col-md-8">
                                        <input type="text" class="form-control " id="search" name="fname" placeholder="Course Name" required>
                                    </div>
                                    <!-- <label for="lname" class="clo-12 col-md-4">
                                                <b>Student's Degree Program</b>
                                            </label>
                                    <div class="col-12 col-md-8">
                                        <input type="text" class="form-control " id="search" name="lname" placeholder="Student's Degree Program" required>
                                    </div>
                                    <label for="lname" class="clo-12 col-md-4">
                                        <b>Student's Semester</b>
                                    </label>
                                    <div class="col-12 col-md-8">
                                        <input type="text" class="form-control " id="search" name="lname" placeholder="Student's Semester" required>
                                    </div> -->
                                    <div class="col-12 col-md-11">
                                        <div>
                                            <br>
                                            <button type="submit" id="addUser" value="submit" name="adduser" class="btn btn-info">Click here to add Course! </button>
                                            <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="form-row">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main role="main">
        <!-- Marketing messaging and featurettes ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
        <!-- Three columns of text below the carousel -->
        <div class="about-header">
            <div class="col-lg-12 text-center">
                <h1>Student View</h1>


                <?php
                if (isset($_GET["data"])) {
                    $data = $_GET["data"];

                    echo $data;
                    // $data2 = $_GET["data2"];
                } else {
                    echo "nothing";
                }
                ?>


                <hr style="background-color: #eee;
            border: 0 none;
            color: #eee;
            height: 1px;
            margin-bottom: 10px;">
                </hr>
            </div>
        </div>
        <div class="container">
            <div class="row row-content ">
                <div class="col-12 col-md-5 offset-2">
                    <div>
                        <h3>View Lectures</h3>
                    </div>
                    <form>
                        <div class="row form-group">
                            <div class="col-12 col-md-10">
                                <button type="button" id="viewLecture" style="height: 150px; width: 100%;" class="btn btn-success ">Click Here To View <br>Lecture</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-5 ">
                    <div>
                        <h3>View Assignments</h3>
                    </div>
                    <form>
                        <div class="row form-group">
                            <div class="col-12 col-md-10">
                                <button type="button" id="viewAssignment" style="height: 150px; width: 100%;" class="btn btn-twitter">Click
                                    here to View <br> Assignments </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="col-12 col-md-4 ">
                    <div>
                        <h3>Manage Courses Lists</h3>
                    </div>
                    <form>
                        <div class="row form-group">
                            <div class="col-12 col-md-10">
                                <button type="button" id="addCourse" style="height: 150px; width: 100%;" class="btn btn-warning">Click
                                    here Manage <br> Courses Lists </button>
                            </div>
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
        <!-- ******************************************************** next row -->
    </main>
    <!-- ******************* Model Manage teacher ****************************-->
    <div id="manageTeacher" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ">Manage Teacher</h4>
                    <button type="button" class="close" data-dismiss="modal" id="modal-button">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row row-content ">
                            <div class="col-12 col-md-4">
                                <div>
                                    <h3>Add Teacher Data</h3>
                                </div>
                                <form>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-10">
                                            <button type="button" id="addTeacher" data-dismiss="modal" data-toggle="modal" href="#addTechModal" style="height: 150px; width: 100%;" class="btn btn-success ">Click Here </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-4 ">
                                <div>
                                    <h3>View All Teacher Data</h3>
                                </div>
                                <form>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-10">
                                            <button type="submit" style="height: 150px; width: 100%;" class="btn btn-twitter">Click
                                                here </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-4 ">
                                <div>
                                    <h3>View Specific Teacher Data</h3>
                                </div>
                                <form>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-10">
                                            <button type="submit" style="height: 150px; width: 100%;" class="btn btn-warning">Click
                                                here </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ******************* Model Manage Student ****************************-->
    <div id="manageStudent" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ">Manage Student</h4>
                    <button type="button" class="close" data-dismiss="modal" id="modal-button">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row row-content ">
                            <div class="col-12 col-md-4">
                                <div>
                                    <h3>Add Student's Data</h3>
                                </div>
                                <form>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-10">
                                            <button type="button" id="addTeacher" data-dismiss="modal" data-toggle="modal" href="#addStuModal" style="height: 150px; width: 100%;" class="btn btn-success ">Click Here </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-4 ">
                                <div>
                                    <h3>View All Student's Data</h3>
                                </div>
                                <form>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-10">
                                            <button type="submit" style="height: 150px; width: 100%;" class="btn btn-twitter">Click
                                                here </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-4 ">
                                <div>
                                    <h3>View Specific Student's Data</h3>
                                </div>
                                <form>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-10">
                                            <button type="submit" style="height: 150px; width: 100%;" class="btn btn-warning">Click
                                                here </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ******************* Model Manage  Course's ****************************-->
    <div id="manageCourse" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ">Manage Student</h4>
                    <button type="button" class="close" data-dismiss="modal" id="modal-button">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row row-content ">
                            <div class="col-12 col-md-4">
                                <div>
                                    <h3>Add Course's Data</h3>
                                </div>
                                <form>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-10">
                                            <button type="button" id="addTeacher" data-dismiss="modal" data-toggle="modal" href="#addCourseModal" style="height: 150px; width: 100%;" class="btn btn-success ">Click Here </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-4 ">
                                <div>
                                    <h3>View All Course's Data</h3>
                                </div>
                                <form>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-10">
                                            <button type="submit" style="height: 150px; width: 100%;" class="btn btn-twitter">Click
                                                here </button>
                                        </div>
                                    </div>
                                </form>




                            </div>
                            <div class="col-12 col-md-4 ">
                                <div>
                                    <h3>View Specific Course's Data</h3>
                                </div>
                                <form>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-10">
                                            <button type="submit" style="height: 150px; width: 100%;" class="btn btn-warning">Click
                                                here </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./components/Footer.html" ?>
</body>
<!-- Bootstrap core JavaScript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
<script>
    window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js "><\/script>')
</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js "></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js "></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js "></script> <svg xmlns="http://www.w3.org/2000/svg " width="500 " height="500 " viewBox="0 0 500 500 " preserveAspectRatio="none " style="display: none; visibility: hidden;
                                position: absolute; top: -100%; left: -100%; ">
    <defs>
        <style type="text/css "></style>
    </defs><text x="0 " y="25 " style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif ">500x500</text>
</svg>
<script src="./JS/scripts.js"></script>

</html>