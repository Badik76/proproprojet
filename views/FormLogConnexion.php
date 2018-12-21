<!-- form connex-->
<div id="modal2" class="modal">
    <div class="modal-content">
        <form id="connexion" method="post" action="index.php">
            <fieldset>
                <legend>Connexion</legend>

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
                </div>
                <div class="modal-footer">
                    <label for="remember">Se souvenir de moi ? </label>
                <input type="checkbox" checked="checked" name="remember" id="remember" class="filled-in" />
                <input type="submit" class="btn" name="butSendForm" /> <!--ng disabled permet de cacher le bouton si champ pas rempli-->
                </div>
            </fieldset>
        </form>
    </div>
</div>