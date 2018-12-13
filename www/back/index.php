<?php require 'inc/init.inc.php';

?>

<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title style="font-size: 9vh;">Andrée Baptiste | Développeur & Intégrateur Web</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    

    <!-- Custom Fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="css/mystyle-admin.css">
    <link href="css/stylish-portfolio.min.css" rel="stylesheet">
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <a class="menu-toggle rounded" href="#">
      <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">

      <ul class="sidebar-nav">

        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#competences">Compétences</a>
        </li>

        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="admin/AndreeB_Int_Dev.pdf" target="_blank">CV</a>
        </li>

        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#experiences">Expériences pro</a>
        </li>
        
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#formations">Formations</a>
        </li>  

        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#loisirs">Loisirs</a>
        </li>

        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#contact">Contact</a> 
        </li>
        <!-- <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#admin">Admin</a>
        </li> -->
      </ul>
    </nav>

    <!-- Header -->
    <header class="masthead d-flex">
      <div class="container text-center my-auto">
        <h4 class="mb-1">Andrée Baptiste</h4>
        <h1 class="mb-2">Intégrateur Développeur Web</h1>
        <h5 class="mb-6"><em>en formation</em></h5>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#competences">Compétences</a>
      </div>
      <div class="overlay"></div>
    </header>


    <!-- Compétences -->
    <section class="content-section bg-light" id="competences">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h2>Compétences</h2>

              <div class="container">

                <?php
                  //requête pour compter et chercher plusieurs enregistrements, on ne peut compter que si on a un prepare
                  $resultat = $pdoCV->query("SELECT * FROM t_skills");
                  // debug($resultat);
                  $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);
                  //var_dump($_POST);
                  // debug($donnees);
                ?>

                <div class="row">
                  <div class="col-md-6"> 

                    <h3 class="progress-title"><?php echo $donnees[0]['skill'];?></h3>
                      <div class="progress">
                        <div class="progress1">
                          <div class="progress-bar" style="width: <?php echo $donnees[0]['level']?>%; background: #008080;">
                            <div class="progress-value"><?php echo $donnees[0]['level']?>%</div>
                          </div>
                        </div>          
                      </div>
              
                      <h3 class="progress-title"><?php echo $donnees[1]['skill'];?></h3>
                        <div class="progress">
                          <div class="progress1">
                            <div class="progress-bar" style="width: <?php echo $donnees[1]['level']?>%; background: #008080;">
                              <div class="progress-value"><?php echo $donnees[1]['level']?>%</div>
                            </div>
                          </div>            
                        </div>
                      
                      <h3 class="progress-title"><?php echo $donnees[2]['skill'];?></h3>
                      <div class="progress">
                        <div class="progress1">
                          <div class="progress-bar" style="width: <?php echo $donnees[2]['level']?>%; background: #008080;">
                            <div class="progress-value"><?php echo $donnees[2]['level']?>%</div>
                          </div>
                        </div>         
                      </div>

                      <h3 class="progress-title"><?php echo $donnees[3]['skill'];?></h3>
                      <div class="progress">
                        <div class="progress1">
                          <div class="progress-bar" style="width: <?php echo $donnees[3]['level']?>%; background: #008080;">
                            <div class="progress-value"><?php echo $donnees[3]['level']?>%</div>
                          </div>
                        </div>           
                      </div>

                      <h3 class="progress-title"><?php echo $donnees[4]['skill'];?></h3>
                      <div class="progress">
                        <div class="progress1">
                          <div class="progress-bar" style="width: <?php echo $donnees[4]['level']?>%; background: #008080;">
                            <div class="progress-value"><?php echo $donnees[4]['level']?>%</div>
                          </div>
                        </div>           
                      </div>

                      <h3 class="progress-title"><?php echo $donnees[5]['skill'];?></h3>
                      <div class="progress">
                        <div class="progress1">
                          <div class="progress-bar" style="width: <?php echo $donnees[5]['level']?>%; background: #008080;">
                            <div class="progress-value"><?php echo $donnees[5]['level']?>%</div>
                          </div>
                        </div>                          
                      </div>

                      <h3 class="progress-title"><?php echo $donnees[6]['skill'];?></h3>
                      <div class="progress">
                        <div class="progress1">
                          <div class="progress-bar" style="width: <?php echo $donnees[6]['level']?>%; background: #008080;">
                            <div class="progress-value"><?php echo $donnees[6]['level']?>%</div>
                          </div>
                        </div>                        
                      </div>

                  </div><!-- fin div class col-md-6-->
                  
                  <div class="col-md-6">      

                    <h3 class="progress-title"><?php echo $donnees[7]['skill'];?></h3>
                    <div class="progress">
                      <div class="progress1">
                        <div class="progress-bar" style="width: <?php echo $donnees[7]['level']?>%; background: #ff794a;">
                          <div class="progress-value"><?php echo $donnees[7]['level']?>%</div>
                        </div>
                      </div>         
                    </div>
            
                    <h3 class="progress-title"><?php echo $donnees[8]['skill'];?></h3>
                    <div class="progress">
                      <div class="progress1">
                        <div class="progress-bar" style="width: <?php echo $donnees[8]['level']?>%; background: #ff794a;">
                          <div class="progress-value"><?php echo $donnees[8]['level']?>%</div>
                        </div>
                      </div>           
                    </div>
                    
                    <h3 class="progress-title"><?php echo $donnees[9]['skill'];?></h3>
                    <div class="progress">
                      <div class="progress1">
                        <div class="progress-bar" style="width: <?php echo $donnees[9]['level']?>%; background: #ff794a;">
                          <div class="progress-value"><?php echo $donnees[9]['level']?>%</div>
                        </div>
                      </div>         
                    </div>

                    <h3 class="progress-title"><?php echo $donnees[10]['skill'];?></h3>
                    <div class="progress">
                      <div class="progress1">
                        <div class="progress-bar" style="width: <?php echo $donnees[10]['level']?>%; background: #ff794a;">
                          <div class="progress-value"><?php echo $donnees[10]['level']?>%</div>
                        </div>
                      </div>            
                    </div>

                    <h3 class="progress-title"><?php echo $donnees[11]['skill'];?></h3>
                    <div class="progress">
                      <div class="progress1">
                        <div class="progress-bar" style="width: <?php echo $donnees[11]['level']?>%; background: #ff794a;">
                          <div class="progress-value"><?php echo $donnees[11]['level']?>%</div>
                        </div>
                      </div>            
                    </div>

                    <h3 class="progress-title"><?php echo $donnees[12]['skill'];?></h3>
                    <div class="progress">
                      <div class="progress1">
                        <div class="progress-bar" style="width: <?php echo $donnees[12]['level']?>%; background: #ff794a;">
                          <div class="progress-value"><?php echo $donnees[12]['level']?>%</div>
                        </div>
                      </div>            
                    </div>

                    <h3 class="progress-title"><?php echo $donnees[13]['skill'];?></h3>
                    <div class="progress">
                      <div class="progress1">
                        <div class="progress-bar" style="width: <?php echo $donnees[13]['level']?>%; background: #ff794a;">
                          <div class="progress-value"><?php echo $donnees[13]['level']?>%</div>
                        </div>
                      </div>            
                    </div>
                  </div><!-- fin div class col-md-6-->
                </div><!-- fin div class -->
                </div><!-- fin div row -->
 
                <!-- http://bestjquery.com/tutorial/progress-bar/demo39/    -->

                <div class="row">         
                  <div class="col-md-12 col-md-offset-3">
                      <p class="lead mb-5">Forte d'expériences multiples et variées je suis l'atout manquant à votre équipe.</p> 
                      <a class="btn btn-dark btn-xl js-scroll-trigger" href="admin/IntegrateurDevWebJunior.pdf" target="_blank">CV téléchargeable</a>
                      <a class="btn btn-dark btn-xl js-scroll-trigger" href="#experiences">Expériences</a>
                  </div><!--fin div class col-md-12 -->
                </div><!--fin div class row -->

              </div><!-- fin div class container -->
            </div><!-- fin div col-lg-10 --> 
          </div><!-- fin div class row -->
    </section><!-- fin section -->


    <!-- Expériences -->
    <section class="content-section bg-light callout myexperties" id="experiences" >
      <div class="container text-center"> 

        <?php
        //requête pour compter et chercher plusieurs enregistrements, on ne peut compter que si on a un prepare
        $resultat = $pdoCV->query("SELECT * FROM t_experiences");
        // debug($resultat);
        $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($_POST);
        // debug($donnees);
        ?>

          <h2 class="mx-auto mb-5">Expériences pro</h2>

          <div class="container"></div>
        
          <div class="row media">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <div class="expertiesico"><?php echo $donnees[0]['dates_exp']?><br>.</div>
            </div>
          <div class="expertiesdesc col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <!-- <h4>UIzards</h4> -->
              <h5><?php echo $donnees[0]['function_exp']?></h5>
              <p> <?php echo $donnees[0]['description_exp']?></p>
            </div>
          </div>

          <div class="row media">

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <div class="expertiesico"><?php echo $donnees[1]['dates_exp']?><br>.</div>
            </div>
            <div class="expertiesdesc col-xs-12 col-sm-9 col-md-9 col-lg-9">
              <!-- <h4>Lexind</h4> -->
              <h5><?php echo $donnees[1]['function_exp']?></h5>
              <p><?php echo $donnees[1]['description_exp']?></p>
              </div>
          </div>

          <div class="row media">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <div class="expertiesico"><?php echo $donnees[2]['dates_exp']?><br>.</div>
            </div>
            <div class="expertiesdesc col-xs-12 col-sm-9 col-md-9 col-lg-9">
              <!-- <h4>Matrix Media</h4> -->
              <h5><?php echo $donnees[2]['function_exp']?></h5>
              <p><?php echo $donnees[2]['description_exp']?></p>
            </div>
          </div>

          <div class="row media">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <div class="expertiesico"><?php echo $donnees[3]['dates_exp']?><br>.</div>
            </div>
            <div class="expertiesdesc col-xs-12 col-sm-9 col-md-9 col-lg-9">
              <!-- <h4>Matrix Media</h4> -->
              <h5><?php echo $donnees[3]['function_exp']?></h5>
              <p><?php echo $donnees[3]['description_exp']?></p>
            </div>
          </div>

          <div class="row media">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <div class="expertiesico"><?php echo $donnees[4]['dates_exp']?><br>.</div>
            </div>
            <div class="expertiesdesc col-xs-12 col-sm-9 col-md-9 col-lg-9">
              <!-- <h4>Matrix Media</h4> -->
              <h5><?php echo $donnees[4]['function_exp']?></h5>
              <p><?php echo $donnees[4]['description_exp']?></p>
            </div>
          </div>

          <div class="row media">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <div class="expertiesico"><?php echo $donnees[5]['dates_exp']?><br>.</div>
            </div>
            <div class="expertiesdesc col-xs-12 col-sm-9 col-md-9 col-lg-9">
              <!-- <h4>Matrix Media</h4> -->
              <h5><?php echo $donnees[5]['function_exp']?></h5>
              <p><?php echo $donnees[5]['description_exp']?></p>
            </div>
          </div>

          <div class="row media">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <div class="expertiesico"><?php echo $donnees[6]['dates_exp']?><br>.</div>
            </div>
            <div class="expertiesdesc col-xs-12 col-sm-9 col-md-9 col-lg-9">
              <!-- <h4>Matrix Media</h4> -->
              <h5><?php echo $donnees[6]['function_exp']?></h5>
              <p><?php echo $donnees[6]['description_exp']?></p>
            </div>
          </div>

          <div class="row media">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <div class="expertiesico"><?php echo $donnees[7]['dates_exp']?><br>.</div>
            </div>
            <div class="expertiesdesc col-xs-12 col-sm-9 col-md-9 col-lg-9">
              <!-- <h4>Matrix Media</h4> -->
              <h5><?php echo $donnees[7]['function_exp']?></h5>
              <p><?php echo $donnees[7]['description_exp']?></p>
            </div>
          </div>

        </div><!-- fin div class container -->
        <!-- http://designstub.com/demos/folio/ -->

        <div class="row">
          <div class="col-md-12 col-md-offset-3">
            <p class="text-center"><a class="btn btn-primary btn-xl" href="#formations">Formations</a></p>
          </div>
        </div>   

    </section><!-- fin section --><!-- fin Expériences -->


    <!-- Formations-->
    <section class="content-section bg-light" id="formations">
      <div class="container text-center">

        <?php
        //requête pour compter et chercher plusieurs enregistrements, on ne peut compter que si on a un prepare
        $resultat = $pdoCV->query("SELECT * FROM t_trainings
        
        ");
        // debug($resultat);
        $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($_POST);
        // debug($donnees);
        ?>
          <div class="row">
            <div class="col-lg-10 mx-auto">
              <h2>Mes formations</h2>
           
                <div class="row media">
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="expertiesico"><?php echo $donnees[0]['dates_training']?><br>.</div>
                  </div>
                <div class="expertiesdesc col-xs-12 col-sm-9 col-md-9 col-lg-9">
                  <!-- <h4>UIzards</h4> -->
                  <h4><?php echo $donnees[0]['title_training']?></h4>
                  <h6><?php echo $donnees[0]['subtitle_training']?></h6>
                  <p> <?php echo $donnees[0]['training_establishment']?></p>
                </div>
                </div>

                <div class="row media">
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="expertiesico"><?php echo $donnees[1]['dates_training']?><br>.</div>
                </div>
                <div class="expertiesdesc col-xs-12 col-sm-9 col-md-9 col-lg-9">
                  <!-- <h4>UIzards</h4> -->
                  <h4><?php echo $donnees[1]['title_training']?></h4>
                  <h6><?php echo $donnees[1]['subtitle_training']?></h6>
                  <p> <?php echo $donnees[1]['training_establishment']?></p>
                </div>
                </div>

                <div class="row media">
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="expertiesico"><?php echo $donnees[2]['dates_training']?><br>.</div>
                </div>
                <div class="expertiesdesc col-xs-12 col-sm-9 col-md-9 col-lg-9">
                  <!-- <h4>UIzards</h4> -->
                  <h4><?php echo $donnees[2]['title_training']?></h4>
                  <h6><?php echo $donnees[2]['subtitle_training']?></h6>
                  <p> <?php echo $donnees[2]['training_establishment']?></p>
                </div>
                </div>

                <div class="row media">
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="expertiesico"><?php echo $donnees[3]['dates_training']?><br>.</div>
                </div>
                <div class="expertiesdesc col-xs-12 col-sm-9 col-md-9 col-lg-9">
                  <!-- <h4>UIzards</h4> -->
                  <h4><?php echo $donnees[3]['title_training']?></h4>
                  <h6><?php echo $donnees[3]['subtitle_training']?></h6>
                  <p> <?php echo $donnees[3]['training_establishment']?></p>
                </div>
                </div>

              </div> 
            </div> 
            
          <div class="row">
            <div class="col-md-12 col-md-offset-3">
              <p class="text-center"><a class="btn btn-primary btn-xl" href="#loisirs">Loisirs</a></p>
            </div>
          </div> 

          </div>  
          </div>  
         
      </div><!-- fin div class container -->
    </section><!-- fin section -->

    <!-- Mes loisirs -->
    <section class="callout" id="loisirs">
      <div class="container text-center">

      <?php
    //requête pour compter et chercher plusieurs enregistrements, on ne peut compter que si on a un prepare
    $resultat = $pdoCV->query("SELECT * FROM t_hobbies");
    // debug($resultat);
    $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($_POST);
    // debug($donnees);
    ?>
      
    <h2 class="mx-auto mb-5">Mes loisirs</h2>

      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="img/cuisiner.jpg" alt="First slide" width="400"><br>
            <h5 class="texte-dark text-center">Cuisiner</h5><br>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img/nager.jpg" alt="Second slide" width="400"><br>
            <h5 class="texte-dark text-center">Nager</h5><br>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img/voyager.jpeg" alt="Third slide" width="400"><br>
            <h5 class="texte-dark text-center">Voyager</h5><br>
          </div>
        </div>
      </div>

    <a class="btn btn-primary btn-xl" href="#contact">Contact</a>
        

  </div>
  </section>

  <!-- Contactez-moi -->
  <section class="content-section bg-primary text-white text-center" id="contact">
  <div class="container">
    <div class="content-section-heading">
      <!-- <h3 class="text-secondary mb-0">Services</h3> -->
        <p class="text-center w-responsive mx-auto mb-5">Andrée Baptiste</p>
        <p class="text-center w-responsive mx-auto mb-5"></p>

        <a class="btn btn-primary btn-xl" href="formulaire/index.php">Contactez-moi !</a>
    </div>
    <div class="row">
    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
    </div>
    </div>
  </section>   

      

<!-- </div> fin div container -->



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/stylish-portfolio.min.js"></script>

 <?php
require_once 'inc/bas.inc.php';
