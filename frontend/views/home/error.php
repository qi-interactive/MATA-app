<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */


$this->title = Yii::$app->name.' - Error';

?>

<style>

  #site-error {
    text-align: center;
  }

  #site-error h2, #site-error a {
    color: red;
  }

</style>

<div class="site-error" id="site-error">

  <h2>
    Sorry we can't locate that page <br/>

    Please visit our <a href="\"> HOMEPAGE </a> </h2>

  </div>
