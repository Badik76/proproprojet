<?php
// Start the session
session_start();
require 'views/header.php';
?>

<div class="container-fluid row center">


    <!--    FOREACH-->
    <div class="col m12 l6">
        <div class="card">         
            <div class="card-title groundcolor"><h2><i class="material-icons">spa</i> Mon prochain RDV <i class="material-icons">spa</i></h2></div>
            <div class="card-content">
                <table class="centered highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>DateRDV.date.RDV</td>
                            <td>TimeRDV.timeRDV</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-action">
                <button class="btn" type="submit" name="action">Upgrade
                    <i class="material-icons right">autorenew</i>
                </button>
                <button class="btn red darken-1" type="submit" name="action">Delete
                    <i class="material-icons right">cancel</i>
                </button>
            </div>
        </div>
        <div class="card">         
            <div class="card-title groundcolor"><h2><i class="material-icons">spa</i> Mes anciens RDV <i class="material-icons">spa</i></h2></div>
            <div class="card-content">
                <table class="centered highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                        </tr>
                    </thead>
                    FOREACH
                    <tbody>
                        <tr>
                            <td>DateRDV.date.RDV</td>
                            <td>TimeRDV.timeRDV</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card col m12 l6"> 
        <div class="card-title groundcolor"><h2><i class="material-icons">group</i> Mon Profil <i class="material-icons">group</i></h2></div>
        <div class="card-content">
            <form id="inscription" method="post" action="userPage.php">
                <fieldset>
                    <legend>Mise à Jour</legend>
                    <div>
                        <label for="lastname">Nom : </label>
                        <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                        <div>
                            <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                        </div>
                    </div>
                    <div>
                        <label for="firstname">Prénom : </label>
                        <input name="firstname" type="text" id="firstname" required class="validate" value="<?= isset($_POST['firstname']) ? $firstname : ''; ?>" />
                        <div>
                            <span class="error"><?= isset($errorArray['firstname']) ? $errorArray['firstname'] : ''; ?></span>
                        </div>
                    </div>
                    <div>
                        <label for="phone">Téléphone : </label>
                        <input name="phone" type="tel" id="phone" required class="validate" value="<?= isset($_POST['phone']) ? $phone : ''; ?>" />
                        <div>
                            <span class="error"><?= isset($errorArray['phone']) ? $errorArray['phone'] : ''; ?></span>
                        </div>                        
                    </div>
                    <div>
                        <label for="email">Email : </label>
                        <input name="email" type="email" id="email" required class="validate" value="<?= isset($_POST['email']) ? $email : ''; ?>" />
                        <div>
                            <span class="error"><?= isset($errorArray['email']) ? $errorArray['email'] : ''; ?></span>
                        </div>                        
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="card-action">
            <button class="btn" type="submit" name="actionup">Upgrade
                <i class="material-icons right">autorenew</i>
            </button>
            <button class="btn red darken-1" type="submit" name="actiondel">Delete
                <i class="material-icons right">cancel</i>
            </button>
            <p class="badge red-text text-darken-1">Cette action est irreversible.</p>
        </div>
    </div>
</div>
<?php
require 'views/footer.php';
?>