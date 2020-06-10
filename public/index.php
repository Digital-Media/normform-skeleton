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
 * Routing will be done with an automatic redirect with a regex on path
 */
$route = AbstractNormForm::getRoute();

/**
 * Set template name depending on routing
 */
switch ($route['route']) {
    case "normform";
        $template = "normFormDemo.html.twig";
        break;
    default;
        $template = "normFormDemo.html.twig";
        break;
}
/**
 * Initialize View and NormFormDemo.
 */
$view = new View($template);
$form = new NormFormDemo($view);

/**
 * Call normForm() in case of POST.
 * Call show() in case of GET or unsupported HTTP-method.
 */
switch ($route['method']) {
    case "POST";
        $form->normForm();
        break;
    case "GET";
        $form->show();
        break;
    default;
        $form->show();
        break;
}


/**
 * We implented no middleware in normform. Validation is done via isValid().
 * We implented no dependencies in normform. We use use statements and autoloader directly.
 */
