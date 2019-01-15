<!-- form inscription-->
<div id="modal3" class="modal">
    <div class="modal-content">
        <form id="inscription" method="post" action="userPage.php">
            <fieldset>
                <legend>Inscription</legend>
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
                    <label for="email">Email : </label>
                    <input name="email" type="email" id="email" required class="validate" value="<?= isset($_POST['email']) ? $email : ''; ?>" />
                    <div>
                        <span class="error"><?= isset($errorArray['email']) ? $errorArray['email'] : ''; ?></span>
                    </div>                        
                </div>
                <div>
                    <label for="password">Mot de Passe : </label>
                    <input name="password" type="password" id="password" required class="validate" value="<?= isset($_POST['password']) ? $password : ''; ?>" />
                    <div>
                        <span class="error"><?= isset($errorArray['password']) ? $errorArray['password'] : ''; ?></span>
                    </div>  
                    <label for="confirm_password">Confirmer Mot de Passe : </label>
                    <input name="confirm_password" type="password" id="confirm_password" required class="validate" value="<?= isset($_POST['confirm_password']) ? $confirm_password : ''; ?>" />
                    <div>
                        <span class="error"><?= isset($errorArray['confirm_password']) ? $errorArray['confirm_password'] : ''; ?></span>
                    </div>                        
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn " name="butSendForm" /> <!--ng disabled permet de cacher le bouton si champ pas rempli-->
                </div>
            </fieldset>
        </form>
    </div>
</div>
<!-- fin formulaire inscription-->