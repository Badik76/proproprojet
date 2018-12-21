<?php
// Start the session
session_start();
require 'views/header.php';
include('controllers/ControllerFormInscription.php');
?>
<!--carou-->
<section class="carousel carousel-slider center" >
    <ul class="slides">
        <div class="carousel-item" href="#one!">
            <li>
                <div class="carousel-fixed-item center">
                    <h2>Titre</h2>
                    <p>descriptif</p>
                    <a href="#offers" class="btn waves-effect white black-text darken-text-2">Renvoi 1</a>
                </div>
                <img src="./assets/img/carou1.jpeg" class="responsive-img" alt="xx" title="xx" id="slide1"/>
            </li>
        </div>
        <div class="carousel-item" href="#two!">
            <li>
                <div class="carousel-fixed-item center">
                    <h2>Titre</h2>
                    <p>descriptif 2</p>
                    <a href="#creations" class="btn waves-effect white black-text darken-text-2">Renvoi 2</a>
                </div>
                <img src="./assets/img/carou2.jpeg" class="responsive-img" alt="xx" title="xx" id="slide2"/>
            </li>
        </div>
        <div class="carousel-item" href="#three!">
            <li>
                <div class="carousel-fixed-item center">
                    <h2>Titre 3</h2>
                    <p>descriptif 3</p>
                    <a href="#contact" class="btn waves-effect white black-text darken-text-2">Renvoi 3</a>
                </div>
                <img src="./assets/img/carou3.jpeg" class="responsive-img" alt="xx" title="xx" id="slide3"/>
            </li>
        </div>
    </ul>
</section>
<!--end carou-->

<!-- prestation-->
<div class="container-fluid ">
    <h2 class="center">Mes Prestations</h2>
    <div class="row">
        <div class="col s12 m4 l4">
            <div class="card">
                <div class="card-image">
                    <img src="./assets/img/card1.jpeg">
                    <span class="card-title">Prestations 1</span>
                    <a class="btn-floating halfway-fab waves-effect waves-light backgroundcolor modal-trigger" href="#modal"><i class="material-icons">add</i></a>
                </div>
                <div class="card-content">
                    <p>descriptif prestation 1</p>
                </div>
            </div>
        </div>
        <div class="col s12 m4 l4">
            <div class="card">
                <div class="card-image">
                    <img src="./assets/img/card2.jpeg">
                    <span class="card-title">Prestations 2</span>
                    <a class="btn-floating halfway-fab waves-effect waves-light backgroundcolor modal-trigger" href="#modal"><i class="material-icons">add</i></a>
                </div>
                <div class="card-content">
                    <p>descriptif prestation 2</p>
                </div>
            </div>
        </div>
        <div class="col s12 m4 l4">
            <div class="card">
                <div class="card-image">
                    <img src="./assets/img/card3.jpeg">
                    <span class="card-title">Prestations 3</span>
                    <a class="btn-floating halfway-fab waves-effect waves-light backgroundcolor modal-trigger" href="#modal"><i class="material-icons">add</i></a>
                </div>
                <div class="card-content">
                    <p>descriptif prestation 3</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('views/CalendarReservation.php');
?>
<!--end  prestation-->

<!-- créer en dessus card avec les coms laissés -->
<div id="endCom" class="row">
      <h2 class="center">Vos Avis</h2>
    <div class="col s12 m4 l4">
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.</p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12 m4 l4">
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.</p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12 m4 l4">
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.</p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end avis -->
<?php
require 'views/footer.php';
?> 