<?php
// Start the session
session_start();
require 'views/header.php';
?>

<div class="container-fluid row center">
    <h2><i class="material-icons">spa</i> Gestion des RDV's <i class="material-icons">spa</i></h2>
    <div class="card col m12 l6">
        <button class="datepicker">calendar</button>
        <button class="timepicker">heure</button>
    </div>               



    <ul class="collapsible col m12 l6">
        <li> FOREACH
            <div class="collapsible-header">
                <i class="material-icons">filter_drama</i>
                Prestations.Prestaname
                <span class="new badge">if Resa.id +1 = count!= Resa.id.length echo Resa</span></div>
            <div class="collapsible-body"><p>Users.name users.firstname users.phone dateRDV.dateRDV TimeRDV.time.RDV</p>
                <button class="btn red darken-1" type="submit" name="action">Annuler
                    <i class="material-icons right">cancel</i>
                </button>
                <button class="btn" type="submit" name="action">Valider
                    <i class="material-icons right">done</i>
                </button>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <i class="material-icons">place</i>
                Prestations.Prestaname
                <span class="badge">1</span></div>
            <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons">whatshot</i>
                Prestations.Prestaname
            </div>
            <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
    </ul>

</div>

<!--coryright-->
<div class="container-fluid rem10">
    2018 - Made by Badik 🖕 with <i class="fas fa-heart red-text rem10"></i>
</div>
<!--end coryright-->
<!--Scripts-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
<script src="assets/import/Materialize/js/materialize.min.js"></script>
<script src="assets/import/SweetAlert/sweetalert.min.js"></script>
<script src="assets/js/test.js"></script>
</body>
</html>