<?php session_start(); ?>
<!doctype html>
<html lang="en">
   <head>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
      <title>Aplicatie web pentru gestiunea cheltuielilor</title>
      <link rel="shortcut icon" type="image/png" href="img/favicon.png">
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css" >
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
      <section class="pie_chart_content">
         <div class="overlay">
            <div class="container">
               <div class="row">
                  <div class="col-md-4">
                     <div class="calculator_box">
                        <div class="app">
                           <div class="calculator">
                              <div class="display">
                                 <div class="content">
                                    <div class="input"></div>
                                    <div class="output"></div>
                                 </div>
                              </div>
                              <div class="keys">
                                 <div data-key="clear" class="key action">
                                    <span>AC</span>
                                 </div>
                                 <div data-key="brackets" class="key action">
                                    <span>()</span>
                                 </div>
                                 <div data-key="%" class="key action">
                                    <span>%</span>
                                 </div>
                                 <div data-key="/" class="key operator">
                                    <span>÷</span>
                                 </div>
                                 <div data-key="7" class="key">
                                    <span>7</span>
                                 </div>
                                 <div data-key="8" class="key">
                                    <span>8</span>
                                 </div>
                                 <div data-key="9" class="key">
                                    <span>9</span>
                                 </div>
                                 <div data-key="*" class="key operator">
                                    <span>x</span>
                                 </div>
                                 <div data-key="4" class="key">
                                    <span>4</span>
                                 </div>
                                 <div data-key="5" class="key">
                                    <span>5</span>
                                 </div>
                                 <div data-key="6" class="key">
                                    <span>6</span>
                                 </div>
                                 <div data-key="-" class="key operator">
                                    <span>-</span>
                                 </div>
                                 <div data-key="1" class="key">
                                    <span>1</span>
                                 </div>
                                 <div data-key="2" class="key">
                                    <span>2</span>
                                 </div>
                                 <div data-key="3" class="key">
                                    <span>3</span>
                                 </div>
                                 <div data-key="+" class="key operator">
                                    <span>+</span>
                                 </div>
                                 <div data-key="backspace" class="key action">
                                    <span>&lt;</span>
                                 </div>
                                 <div data-key="0" class="key">
                                    <span>0</span>
                                 </div>
                                 <div data-key="." class="key">
                                    <span>.</span>
                                 </div>
                                 <div data-key="=" class="key operator">
                                    <span>=</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="main_box">
                        <h1>Vizualizeaza cheltuielile</h1>
                        <canvas id="mychart"></canvas>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="count_box">
                        <form action="connect.php" id="calform" method="post" <?php if (!isset($_SESSION['user_id'])) echo 'onsubmit="return false;"'; ?>>
                           <div class="form_group">
                              <label for="cheltuieli-input">Totalul cheltuielilor</label>
                              <input type="number"  name="cheltuieliinput" class="cheltuieli-input form-control" id="nrsuma" readonly >
                           </div>
                           <div class="form_group">
                              <label for="economii-input">Economii</label>
                              <input type="number" name="economiiinput" data-toggle="tooltip" data-placement="right"
                                 title="Pentru a calcula economiile scadeti din totalul incasarilor dumneavoastra de aceasta luna totalul cheltuielilor care va fi calculat automat mai sus dupa ce completati toate categoriile de cheltuieli" class="economii-input form-control">
                           </div>
                           <div class="form_group">
                              <label for="alimente-input">Produse alimentare</label>
                              <input type="number" name="alimenteinput" data-toggle="tooltip" data-placement="right"
                                 title="Cheltuieli pentru alimente, bauturi nealcoolice, food delivery in totalitate pe aceasta luna" id="nr1" onkeyup="sum();" class="alimente-input form-control">
                           </div>
                           <div class="form_group">
                              <label for="intretinere-input">Intretinere si nevoi personale</label>
                              <input type="number" name="intretinereinput" data-toggle="tooltip" data-placement="right"
                                 title="Cheltuielile cu intretinerea locuintei (ex. energie electrica, gaze, apa), asigurari pentru locuinta dar si combustibil, abonamente la internet/telefonie" id="nr2" onkeyup="sum();" class="intretinere-input form-control" >
                           </div>
                           <div class="form_group">
                              <label for="educatie-input">Educatie si sanatate</label>
                              <input type="number" name="educatieinput" data-toggle="tooltip" data-placement="right"
                                 title="Asigurarile de sanatate, vizite la dentist precum si costurile pentru cursuri de pregatire, carti, scolarizare" id="nr3" onkeyup="sum();" class="educatie-input form-control" >
                           </div>
                           <div class="form_group">
                              <label for="distractie-input">Distractie si timp liber</label>
                              <input type="number" name="distractieinput" data-toggle="tooltip" data-placement="right"
                                 title="Costuri cu vacantele, petreceri, iesiri cu prietenii sau la restaurant dar si viciile precum  fumatul sau alcoolul" id="nr4" onkeyup="sum();" class="distractie-input form-control" >
                           </div>
                           <div class="form_group">
                              <label for="altele-input">Alte cheltuieli</label>
                              <input type="number" name="alteleinput" data-toggle="tooltip" data-placement="right"
                                 title="Tot ce nu este cuprins in categoriile de mai sus (ex. investiile sau cheltuielile neprevazute) " id="nr5" onkeyup="sum();" class="altele-input form-control" >
                           </div>
                           </select>
                           <input type="submit" class="mt-4 btn btn-primary">
                        </form>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>
         $(document).ready(function(){
             $('#calform').on('submit', function(e){
                 e.preventDefault();
         
                 $.ajax({
                     url: 'connect.php',
                     type: 'post',
                     data: $(this).serialize(),
                     success: function(){
                         swal({
                             title: "Succes",
                             text: "Datele dumneavoastra au fost inregistrate cu succes",
                             icon: "success",
                             button: "OK",
                         });
                         $('#calform')[0].reset();
         
                     },
                     error: function(){
                         swal({
                             title: "Eroare",
                             text: "A aparut o problema la inregistrarea datelor. Va rugam sa incercati din nou.",
                             icon: "error",
                             button: "OK",
                         });
                     }
                 });
             });
         });
      </script>
   </body>
</html>