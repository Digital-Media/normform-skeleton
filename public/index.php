<?php

require "../vendor/autoload.php";

use NormFormSkeleton\NormFormDemo;
use Fhooe\NormForm\View\View;
use Fhooe\NormForm\Core\AbstractNormForm;

/**
 * This constants will be found in settings.php in Slim
 */
define ("TEMPLATES", "../templates");
define ("TEMPLATES_C", "../templates_c");
define ("DEBUG", true);

/*
 * Activate debugging to display HTML errors in browser
 * Only true in Development Environment
 * false in Production
 */
if (DEBUG) {
    error_reporting(E_ALL);
    ini_set("html_errors", "1");
    ini_set("display_errors", "1");
    ini_set("display_startup_errors", "1");
}

/**
 * This part will be found in routing.php in Slim
 * In Slim routing will be done with an automatic redirect according to a path regex
 */
$route = AbstractNormForm::getRoute();

/**
 * Set template name and given route
 */
if ($route['method'] = "POST" and $route['route'] = "normform") {
    $form = new NormFormDemo("normFormDemo.html.twig");
    $form->normForm();
} elseif ($route['method'] = "GET" and $route['route'] = "normform") {
    $form = new NormFormDemo("normFormDemo.html.twig");
    $form->show();
} else {
    $form = new NormFormDemo("normFormDemo.html.twig");
    $form->show();
}

/**
 * We implemented no middleware in normform. Validation is done via isValid().
 * We implemented no dependencies in normform. We use use statements and autoloader directly.
 */
