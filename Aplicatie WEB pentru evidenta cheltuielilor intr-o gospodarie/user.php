<?php session_start(); 
   if (!isset($_SESSION['user_id'])) {
   
       header("Location: login.php");
       exit();
   }
   ?>
<!doctype html>
<html lang="en">
   <head>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
      <title>User Records - Aplicatie web pentru gestiunea cheltuielilor</title>
      <link rel="shortcut icon" type="image/png" href="img/favicon.png">
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="stil.css" >
      <link rel="stylesheet" href="datatable/css/dataTables.bootstrap4.min.css">
      <Style>
         .dataTables_wrapper.dt-bootstrap4{
         color:black;
         }
         .page-item.active .page-link{
         background-color: darkgrey;
         }
      </style>
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
                     <header>Detalii despre utilizator</header>
                     <?php 
                        include("includes/config.php");
                        $user_id=$_SESSION['user_id'];
                        
                          $result = mysqli_query($con,"SELECT * FROM users WHERE id=$user_id") or die("Select Error");
                          $row = mysqli_fetch_assoc($result);
                          
                          if(is_array($row) && !empty($row)){
                              ?>
                     <table class="usertable">
                        <tr>
                           <th>Numele utilizatorului</th>
                           <td><?= $row['username'] ?></td>
                        </tr>
                        <tr>
                           <th>Email</th>
                           <td><?= $row['email'] ?></td>
                        </tr>
                        <tr>
                           <th>Varsta</th>
                           <td><?= $row['age'] ?></td>
                        </tr>
                     </table>
                     <br> 
                     <?php
                        }
                        
                        
                        $user_id = $_SESSION['user_id'];
                        $sql = "SELECT * FROM registration WHERE user_id = $user_id";
                        $result = mysqli_query($con, $sql);
                        
                        
                        ?>
                     <div class="card">
                        <div class="card-header">
                           <h2 class="text-dark">Inregistrari ale utilizatorului</h2>
                        </div>
                        <div class="card-body">
                           <div class="table-responsice">
                              <table class="table table-stripped w-100" id="datatable">
                                 <thead>
                                    <tr style="font-size: 12px;">
                                       <th>Totalul cheltuielilor</th>
                                       <th>Economii</th>
                                       <th>Produse alimentare</th>
                                       <th>Intretinere si nevoi personale</th>
                                       <th>Educatie si sanatate</th>
                                       <th>Distractie si timp liber</th>
                                       <th>Alte cheltuieli</th>
                                       <th>Data adaugarii</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr style="font-size: 12px;">
                                       <td><?php echo $row['cheltuieli']; ?></td>
                                       <td><?php echo $row['economii']; ?></td>
                                       <td><?php echo $row['alimente']; ?></td>
                                       <td><?php echo $row['intretinere']; ?></td>
                                       <td><?php echo $row['educatie']; ?></td>
                                       <td><?php echo $row['distractie']; ?></td>
                                       <td><?php echo $row['altele']; ?></td>
                                       <td><?php echo $row['dataadaugarii']; ?></td>
                                    </tr>
                                    <?php endwhile; ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
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
      <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" 
         integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" 
         integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.dataTables.min.js" integrity="sha512-fQmyZE5e3plaa6ADOXBM17WshoZzDIvo7sR4GC1VsmSKqm13Ed8cO2kPwFPAOoeF0RcdhuQQlPq46X/HnPmllg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
      <script src="datatable/js/jquery.dataTables.min.js"></script>
      <script src="datatable/js/dataTables.bootstrap4.min.js"></script>
      <script>
         $(document).ready(function() {
            $("#datatable").dataTable();
         } );
      </script>
   </body>
</html>