<?php
// Start the session
session_start();
require 'views/header.php';
?>

<div class="container-fluid row center">
    <h2><i class="material-icons">spa</i> Gestion des RDV's <i class="material-icons">spa</i></h2>
    <div class="card col m12 l6">
        <div class="card-image calendar">
            <div date-picker
                 datepicker-title="Gérer les RDV's"
                 picktime="true"
                 pickdate="true"
                 pickpast="false"
                 mondayfirst="false"
                 custom-message="Vous avez sélectionné"
                 selecteddate="ctrl.seled_date"
                 updatefn="ctrl.updateDate(newdate)">
                <div class="datepicker"
                     ng-class="{
                                                        'am': timeframe == 'am',
                                                        'pm': timeframe == 'pm',
                                                        'compact': compact
                                                }">
                    <div class="datepicker-header row">
                        <div class="datepicker-title col s12" ng-if="datepicker_title">{{ datepickerTitle}}</div>
                    </div>
                    <div class="datepicker-calendar col s6">
                        <div class="calendar-header">
                            <div class="goback" ng-click="moveBack()" ng-if="pickdate">
                                <svg width="30" height="30">
                                <path fill="none" stroke="#0DAD83" stroke-width="3" d="M19,6 l-9,9 l9,9"/>
                                </svg>
                            </div>
                            <div class="current-month-container">{{ currentViewDate.getFullYear()}} {{ currentMonthName()}}</div>
                            <div class="goforward" ng-click="moveForward()" ng-if="pickdate">
                                <svg width="30" height="30">
                                <path fill="none" stroke="#0DAD83" stroke-width="3" d="M11,6 l9,9 l-9,9" />
                                </svg>
                            </div>
                        </div>
                        <div class="calendar-day-header">
                            <span ng-repeat="day in days" class="day-label">{{ day.short}}</span>
                        </div>
                        <div class="calendar-grid" ng-class="{false: 'no - hover'}[pickdate]">
                            <div
                                ng-class="{'no-hover': !day.showday}"
                                ng-repeat="day in month"
                                class="datecontainer"
                                ng-style="{'margin-left': calcOffset(day, $index)}"
                                track by $index>
                                <div class="datenumber" ng-class="{'day-selected': day.selected }" ng-click="selectDate(day)">
                                    {{day.daydate}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="timepicker" ng-if="picktime == 'true'">
                        <div ng-class="{'am': timeframe == 'am', 'pm': timeframe == 'pm' }">
                            <div class="timepicker-container-outer col s6" selectedtime="time" timetravel>
                                <div class="timepicker-container-inner">
                                    <div class="timeline-container" ng-mousedown="timeSelectStart($event)" sm-touchstart="timeSelectStart($event)">
                                        <div class="current-time">
                                            <div class="actual-time">{{time}}</div>
                                        </div>
                                        <div class="timeline">
                                        </div>
                                        <div class="hours-container">
                                            <div class="hour-mark" ng-repeat="hour in getHours() track by $index"></div>
                                        </div>
                                    </div>
                                    <div class="display-time col s6">
                                        <div class="decrement-time" ng-click="adjustTime('decrease')">
                                            <svg width="24" height="24">
                                            <path stroke="white" stroke-width="2" d="M8,12 h8"/>
                                            </svg>
                                        </div>
                                        <div class="time" ng-class="{'time-active': edittime.active}">
                                            <input type="text" class="time-input" ng-model="edittime.input" ng-keydown="changeInputTime($event)" ng-focus="edittime.active = true; edittime.digits = [];" ng-blur="edittime.active = false"/>
                                            <div class="formatted-time">{{ edittime.formatted}}</div>
                                        </div>
                                        <div class="increment-time" ng-click="adjustTime('increase')">
                                            <svg width="24" height="24">
                                            <path stroke="white" stroke-width="2" d="M12,7 v10 M7,12 h10"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="am-pm-container col s6">
                                        <div class="am-pm-button" ng-click="changetime('am');">Matin</div>
                                        <div class="am-pm-button" ng-click="changetime('pm');">Aprèm</div>
                                    </div>
                                </div>                                    
                                <div class="dateselect col s12"> {{ customMessage}} {{ selectedDay}} {{ monthNames[localdate.getMonth()]}} {{ localdate.getDate()}}, {{ localdate.getFullYear()}} {{ edittime.formatted}}</div>
                            </div>
                        </div>                            
                    </div>         
                    <form method="post" action="rdvok.php">
                        <?php
                        if (isset($_POST['selectDay'], $_POST['monthNames[localdate.getMonth()]'], $_POST['localdate.getDate()'], $_POST['localdate.getFullYear()'], $_POST['edittime.formatted']))
                            ;
                        ?>

                        <input name="day" class="none" value="{{ localdate.getDate()}}" />
                        <input name="month" class="none" value="{{ monthNames[localdate.getMonth()]}}" />
                        <input name="year" class="none" value="{{ localdate.getFullYear()}}" /> 
                        <input name="time" class="none" value="{{ edittime.formatted}}" />
                        <div id="buttons-container" class="buttons-container">                             
                            <input type="reset" class="cancel-button modal-close waves-effect waves-red-darken-1 red darken-1" value="DELETE " />
                            <input type="submit" class="save-button modal-close waves-effect waves-green" value="AJOUTER" />

                        </div>
                    </form>
                </div>
            </div>
        </div>               
    </div>


    <ul class="collapsible col m12 l6">
        <li> FOREACH
            <div class="collapsible-header">
                <i class="material-icons">filter_drama</i>
                First
                <span class="new badge">4</span></div>
            <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
        </li>
        <li>
            <div class="collapsible-header">
                <i class="material-icons">place</i>
                Second
                <span class="badge">1</span></div>
            <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
            <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
    </ul>

</div>

<div class="container-fluid row center">
    <h2><i class="material-icons">lightbulb_outline</i>Gestion des Produits<i class="material-icons">lightbulb_outline</i></h2>

    <div class="col m12 l6">
        <form name="insert" action="AdminPage.php" method="POST" >
            <fieldset>
                <legend>Ajouter Catégorie</legend>
                <div>
                    <label for="lastname">Nom : </label>
                    <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                    <div>
                        <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                    </div>
                </div>
                <input type="submit" class="btn " name="butSendForm" />
            </fieldset>
        </form>
        <form name="insertcategory" action="AdminPage.php" method="POST">
            <fieldset>
                <legend>Modifier/Supprimer</legend>
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">filter_drama</i>Catégorie</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">place</i>Produits</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                </ul>
                <button class="btn" type="submit" name="action">Upgrade
                        <i class="material-icons right">autorenew</i>
                    </button>
                <button class="btn red darken-1" type="submit" name="action">Delete
                        <i class="material-icons right">cancel</i>
                    </button>
            </fieldset>
        </form>
    </div>


    <form name="insertproduct" action="AdminPage.php" method="POST" class="col m12 l6">
        <fieldset>
            <legend>Ajouter produits</legend>
            <div>
                <label for="lastname">Nom : </label>
                <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                <div>
                    <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                </div>
            </div>
            <div>
                <label for="lastname">Image : </label>
                <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                <div>
                    <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                </div>
            </div>
            <div>
                <label for="lastname">Description : </label>
                <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                <div>
                    <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                </div>
            </div>
            <div>
                <label for="lastname">Prix : </label>
                <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                <div>
                    <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                </div>
            </div>
            <div>
                <label for="lastname">Catégorie : </label>
                <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                <div>
                    <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                </div>
            </div>
            <input type="submit" class="btn " name="butSendForm" />
        </fieldset>
    </form>


</div>
<div class="container-fluid center">
    <h2><i class="material-icons">group</i> Gestion des Clients <i class="material-icons">group</i></h2>
    <table class="centered highlight responsive-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Modif</th>
            </tr>
        </thead>

        <tbody>
            <!--            foreach-->
            <tr>
                <td>users.name</td>
                <td>users.firstname</td>
                <td>users.email</td>
                <td>users.phone</td>
                <td><button class="btn red darken-1" type="submit" name="action">Delete
                        <i class="large material-icons right">cancel</i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php
require 'views/footer.php';
?> 