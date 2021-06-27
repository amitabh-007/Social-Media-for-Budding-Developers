<?php
    session_start();
    $localhost = "localhost"; 
    $dbusername = "root"; 
    $dbpassword = "";  
    $dbname = "test2"; 
    $conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname); 
    $un=$_SESSION['user_name'];
    $sql = "SELECT * FROM user where uname='$un'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    $sql2="SELECT * FROM con where n2='$un'";
    $result2 = mysqli_query($conn, $sql2);
    $row2=mysqli_fetch_array($result2);
    
   
?>
<!DOCTYPE html>

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Profile</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="styles5.css" type="text/css"/>
    <style>
        textarea.full-width {
         width: 800px;
         height:150px
        }
        textarea.cap {
         width: 400px;
         height:150px
        }
        </style>
  </head>

<body>
         <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ADS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="post.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.php">Profile</a>
                    </li>
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo  $_SESSION['user_name'];?>
                          
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="add.php">Add Project</a></li>
                            <li><a class="dropdown-item" href="myproj.php">View Project</a></li>
                            <li><a class="dropdown-item" href="friendlist.php">Friend List</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Do you want to logout?');">Logout</a></li>
                        </ul>
                    </li>
                   
                   
                </ul>
              
                <form class="d-flex " method="POST" action="search.php">
                <input class="form-control me-2" name="srch" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" name="search" type="submit">Search</button>
                </form>
            </div>
        </div>
        </nav>

  <!--Main container. Everything must be contained within a top-level container.-->
  <div class="container-fluid">

    <!--First row (only row)-->
    <div class="row extra_margin">

      <!-- First column (smaller of the two). Will appear on the left on desktop and on the top on mobile. -->
      <div class="col-md-4 col-sm-12 col-xs-12">

          <!-- Div to center the header image/name/social buttons -->
          <div class="text-center">

              <!-- Placeholder image using Placeholder.com -->
              <img src="<?php echo $row['pp']?>" height="150px" width="200px" class="img-rounded"/>

              <!-- Header text (Person's name) -->
              <h2><?php echo $row['uname'];?></h2>
              Bio
              <br>  <textarea readonly class="cap"><?php echo $row['des']; ?></textarea><br><br>
              <!-- Social buttons using anchor elements and btn-primary class to style -->
              <p>
                <a class="btn btn-primary btn-xs" href="<?php echo $row['fb']; ?>" role="button">Facebook</a>
                <a class="btn btn-info btn-xs" href="<?php echo $row['tw']; ?>" role="button">Twitter</a>
                <a class="btn btn-warning btn-xs" href="<?php echo $row['ins']; ?>" role="button">Instagram</a>
                <a class="btn btn-danger btn-xs" href="<?php echo $row['g']; ?>" role="button">Google</a>
                <a class="btn btn-dark btn-xs" href="<?php echo $row['w']; ?>" role="button">Website</a>

              </p>

          </div>

      </div> <!-- End Col 1 -->

      <!-- Second column - for small and extra-small screens, will use whatever # cols is available -->
      <div class="col-md-8 col-sm-* col-xs-* my-5">

        <!-- "Lead" text at top of column. -->
        <p class="lead"><?php echo $row['fname'];?> </p>

        <!-- Horizontal rule to add some spacing between the "lead" and body text -->
        <hr />


        <!-- Body text (paragraph 1) -->
        <p>
        Connection:<?php echo mysqli_num_rows($result2)?>
        </p>
        <p>
          Branch: <?php echo $row['branch'];?>
        </p>
        <p>
          email: <?php echo $row['email'];?>
        </p>

        <!-- Body text (paragraph 2) -->
        <p>
        Year:
        <?php echo $row['year'];?></p>
        <br>
        <p>
        skills:<br>
        <textarea readonly class="full-width"><?php echo $row['skills']; ?></textarea><br><br>

        <a class="btn btn-primary btn-xs" href="editprofile.php" role="button">Edit Profile</a>
        <!-- Body text (paragraph 3) -->
        <p>
        
        </p>

        <!-- Body text (paragraph 4) -->
        <p>
       </p>


      </div> <!-- End column 2 -->

    </div> <!-- End row 1 -->

  </div> <!-- End main container -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>