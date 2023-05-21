<?php session_start(); ?>
<!doctype html>
<html lang="en">
   <head>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
      <title>Register - Aplicatie web pentru gestiunea cheltuielilor</title>
      <link rel="shortcut icon" type="image/png" href="img/favicon.png">
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="stil.css" >
   </head>
   <body>
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
         <a href="#" class="navbar-brand mb-0 h2"> <img class="d-inline-block" src="img/main.png" /> Bine ati venit! </a>     
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item active">
                  <a href="index.php" class="nav-link  active">
                  Pagina principala
                  </a>
               </li>
               <li class="nav-item active">
                  <a href="user.php" class="nav-link">
                  Scoate un raport
                  </a>
               </li>
            </ul>
            <ul class="navbar-nav mx-auto">
               <li>
                  <?php
                     if (isset($_SESSION['user_id'])) {
                       echo '<a href="logout.php" class="nav-link">Deconectare</a>';
                     } else {
                       echo '<a href="login.php" class="nav-link">Conectare/Inregistrare</a>';
                     }
                     ?>
               </li>
            </ul>
         </div>
      </nav>
      <section class="login_content">
         <div class="overlay">
            <div class="container">
               <div class="row">
                  <div class="box form-box">
                     <?php 
                        include("includes/config.php");
                        if(isset($_POST['submit'])){
                           $username = $_POST['username'];
                           $email = $_POST['email'];
                           $age = $_POST['age'];
                           $password = $_POST['password'];
                           $pusername=$username;
                           $pemail=$email;
                           $page=$age;
                           $ppassword=$password;
                        
                        //verifying the unique email
                        
                        $verify_query = mysqli_query($con,"SELECT email FROM users WHERE email='$email'");
                        if(mysqli_num_rows($verify_query) !=0 ){
                        echo "
                        <div class='message'>
                        <p>Acest email este deja inregistrat, va rugam sa incercati altul!</p>
                        </div>
                        ";
                           
                        }
                        else{
                           $pass=sha1($password);
                           mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$pass')") or die("Error Occured");
                           unset($_POST);
                           unset($pusername);
                           unset($page);
                           unset($pemail);
                           unset($ppassword);
                           echo "<div class='message'>
                                     <p>Inregistrarea s-a produs cu succes!</p>
                                 </div> ";
                           echo "<a href='login.php'><button class='btn'>Conectare</button></a>";
                        
                        
                        }
                        
                        }
                        
                        ?>
                     <header>Inscrie-te</header>
                     <form action="" method="post">
                        <div class="field input">
                           <label for="username">Numele utilizatorului</label>
                           <input type="text" name="username" id="username" value="<?php if(isset($pusername)){echo $pusername;} ?>" required>
                        </div>
                        <div class="field input">
                           <label for="email">Email</label>
                           <input type="text" name="email" id="email" value="<?php if(isset($pemail)){echo $pemail;} ?>" required>
                        </div>
                        <div class="field input">
                           <label for="age">Varsta</label>
                           <input type="number" name="age" id="age" value="<?php if(isset($page)){echo $page;} ?>" required>
                        </div>
                        <div class="field input">
                           <label for="password">Parola</label>
                           <input type="password" name="password" id="password" value="<?php if(isset($ppassword)){echo $ppassword;} ?>" required>
                        </div>
                        <div class="field">
                           <input type="submit" class="btn" name="submit" value="Inregistrati-va">
                        </div>
                        <div class="links">
                           Deja un membru? <a href="login.php">Conectare</a>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script src="
         https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js
         "></script>
      <script src="js/main.js"></script>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
         integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" 
         integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" 
         integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
</html>