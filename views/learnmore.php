<?php
// Start the session
session_start();
require_once '../controllers/AdminPageController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <?php include_once '../includes/header.php'; ?>
    <div class="container-fluid ">
        <h2 class="center">Votre Praticienne Reïki</h2>
        <div class="row">
            <div class="col s12 m12 l12 center">
                <div class="container-fluid">
                    <img class="circle prati responsive-img" src="../assets/img/Prati.jpg" alt="Thérapeuthe">
                    <p>Priscilla Minard <br />
                        Diplomée Deuxième dégré.</p>
                </div>
            </div>
        </div>
        <h2 class="center">Wellness Reiki vous propose</h2>
        <div class="row">
            <div class="col s12 m6 l6 center">
                <div class="container-fluid">
                    <img class="greyscale responsive-img" src="../assets/img/dom1.jpg" alt="Domicile">
                </div>
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header"><h4 class="backgroundcolor-text center"><i class="large material-icons backgroundcolor-text">domain</i>Description de la séance à domicile</h4></div>
                        <div class="collapsible-body"><span class="backgroundcolor-text">Pendant une séance de soin énergétique, vous êtes habillé et allongé sur une table de massage. <br />
                                Vous bénéficierez entre 45 min minutes et 1 heure des bienfaits de l’énergie qui vous sera transmise.<br /> 
                                En tant que praticien, je vais agir sur les différentes parties du corps, de la tête aux pieds, par apposition des mains, ceci pendant plusieurs minutes sur vos différents centres énergétiques pour les ré-harmoniser.<br />
                                Je diffuse l'énergie qui accroît les capacités de l'organisme à se soigner lui-même.<br />
                                Par ce fait cette énergie va renforcer tout traitement médical, mais en aucun cas ne se substituera à celui-ci.<br /> 
                                Les effets peuvent perdurer de 24 à 72 heures après la séance.<br /> 
                                Pendant votre séance, vous pouvez vous laisser aller, sereinement, tout au long du déroulement, généralement dans une ambiance musicale douce et relaxante. <br /> 
                                Après la séance, il est souhaitable de partager ce que l’on a vécu durant la séance et de donner ses impressions.<br />
                                Pensez à vous hydrater en buvant de l'eau pour faciliter le processus d’élimination durant la semaine qui suit.</span></div>
                    </li>
                </ul>              
            </div>
            <div class="col s12 m6 l6 center">
                <div class="container-fluid">
                    <img class="greyscale responsive-img" src="../assets/img/dista.jpg" alt="Distance">
                </div>
                <ul class="collapsible">
                    <li>   
                        <div class="collapsible-header"><h4 class="backgroundcolor-text center"><i class="large material-icons backgroundcolor-text">leak_add</i>Description de la séance à distance</h4></div>
                        <div class="collapsible-body"><p class="backgroundcolor-text">L'énergie de Reiki peut être orientée efficacement vers n'importe qui et n'importe où dans le monde. 
                                Une séance de Reiki à distance dure environ 30 minutes. Il est nécessaire de prendre rendez-vous et de choisir un horaire ensemble. <br />
                                La personne qui va recevoir la séance à distance pourra chez elle, trouver un endroit au calme, sur son lit ou dans un fauteuil, s’y installer confortablement et se relaxer. 
                                Un traitement de Reiki à distance libère et aide les personnes vivant un état de stress ou de fatigue profonde ou passagère. Il apporte, également, un bien-être sur le plan physique et le plan émotionnel. <br />
                                Ce travail à distance, très intense, peut rapidement apporter un état de bien-être et de sérénité. 
                                Le Reiki agit sur différents plans : Physique, Emotionnel et Spirituel.<br /> Par ce travail, il y a de grands allégements au niveau des douleurs physiques et des malaises psychiques mais il arrive, bien souvent, que l’état physique ne va s’améliorer que lorsque la personne aura libéré ses tristesses, ses peurs et ses souffrances anciennes. Il est, donc, important, d’accepter les transformations intérieures qui peuvent intervenir durant un traitement. <br />
                                Après la séance, il est souhaitable de partager ce que l’on a vécu durant la séance et de donner ses impressions. Chaque séance peut être différente dans le ressenti… Pour cela, il est possible de m'écrire par mail, vous serez toujours bienvenus...</p></div>
                    </li>                         
                </ul>

            </div>
        </div>
    </div>
    <?php include_once '../includes/footer.php'; ?>    
</body>
</html>