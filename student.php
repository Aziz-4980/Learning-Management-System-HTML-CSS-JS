<?php

session_start();

?>
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
    <main role="main">
        <!-- Marketing messaging and featurettes ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
        <!-- Three columns of text below the carousel -->
        <div class="about-header">
            <div class="col-lg-12 text-center">
                <h1>Your Courses</h1>
                <hr style="background-color: #eee;
            border: 0 none;
            color: #eee;
            height: 1px;
            margin-bottom: 10px;">
                </hr>
            </div>
        </div>

        <div class=" container">
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
        </div>
    </main>
    <br>
    <?php include "./components/Footer.html" ?>
</body>
<!-- Bootstrap core JavaScript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script> <svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;">
    <defs>
        <style type="text/css"></style>
    </defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text>
</svg>


<script src="./JS/scripts.js"></script>

</html>