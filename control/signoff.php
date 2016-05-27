<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 18/05/2016
 * Time: 19:25
 */
    session_start();
    session_destroy();
    header('Location: ../view/index.php?result=signoff');