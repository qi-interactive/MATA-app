<?php

use mata\form\clients\FormClient;
use frontend\controllers\SiteController;

$this->title = 'My Yii Application';
$formClient = new FormClient();


?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Contact</h1>
    </div>

    <div class="body-content">
        <div class="row">
            <?php
                echo $formClient->renderForm(SiteController::getModel(), 'processForm', [], ['submitButtonText' => 'Send']);
            ?>
        </div>
    </div>
