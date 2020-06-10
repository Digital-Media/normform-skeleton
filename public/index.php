<?php

require "../vendor/autoload.php";

use NormFormSkeleton\NormFormDemo;
use Fhooe\NormForm\View\View;

/*
 * Activate debugging to display HTML errors in browser
 */
if (true) {
    error_reporting(E_ALL);
    ini_set("html_errors", "1");
    ini_set("display_errors", "1");
    ini_set("display_startup_errors", "1");
}

$view = new View(
    # "normFormDemoSimple.html.twig",
    "normFormDemo.html.twig",
    "../templates",
    "../templates_c"
);

$form = new NormFormDemo($view);
$form->normForm();
