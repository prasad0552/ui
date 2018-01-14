<?php

date_default_timezone_set('UTC');

require '../vendor/autoload.php';

if (file_exists('coverage.php')) {
    include 'coverage.php';
}

$app = new \atk4\ui\App();

$app->title = 'Agile UI - Demo Suite';

if (file_exists('../public/atk4JS.min.js')) {
    $app->cdn['atk'] = '../public';
}

$app->initLayout($app->stickyGET('layout') ?: 'Admin');

$layout = $app->layout;

if (isset($layout->leftMenu)) {
    $layout->leftMenu->addItem(['Welcome Page', 'icon' => 'gift'], ['index']);
    $layout->leftMenu->addItem(['Layouts', 'icon' => 'object group'], ['layouts']);

    $form = $layout->leftMenu->addGroup(['Form', 'icon' => 'edit']);
    $form->addItem('Basics and Layouting', ['form']);
    $form->addItem('Input Field Decoration', ['field']);
    $form->addItem('Data Integration', ['form2']);
    $form->addItem('Form Multi-column layout', ['form3']);
    $form->addItem('AutoComplete Field', ['autocomplete']);

    $form = $layout->leftMenu->addGroup(['Grid and Table', 'icon' => 'table']);
    $form->addItem('Data table with formatted columns', ['table']);
    $form->addItem('Table interractions', ['multitable']);
    $form->addItem('Grid - Table+Bar+Search+Paginator', ['grid']);
    //$form->addItem('Interactivity - Modals and Expanders', ['expander']);
    $form->addItem('CRUD - Full editing solution', ['crud']);

    $basic = $layout->leftMenu->addGroup(['Basics', 'icon' => 'cubes']);
    $basic->addItem('View', ['view']);
    $basic->addItem('Lister', ['lister']);
    $basic->addItem('Button', ['button']);
    $basic->addItem('Header', ['header']);
    $basic->addItem('Message', ['message']);
    $basic->addItem('Labels', ['label']);
    $basic->addItem('Menu', ['menu']);
    $basic->addItem('Tabs', ['tabs']);
    $basic->addItem('Paginator', ['paginator']);

    $basic = $layout->leftMenu->addGroup(['Interactivity', 'icon' => 'talk']);
    $basic->addItem('JavaScript Events', ['button2']);
    $basic->addItem('Element Reloading', ['reloading']);
    $basic->addItem('PHP Jobs (SSE)', ['sse']);
    $basic->addItem('Loader', ['loader']);
    $basic->addItem('Console', ['console']);
    $basic->addItem('Noifyer', ['notify']);
    $basic->addItem('Modal View', ['modal2']);
    $basic->addItem('Dynamic jsModal', ['modal']);
    $basic->addItem('Sticky GET', ['sticky']);
    $basic->addItem('Recursive Views', ['recursive']);
    //$basic->addItem('Virtual Page', ['virtual']);

    $f = basename($_SERVER['PHP_SELF']);

    //$url = 'https://github.com/atk4/ui/blob/feature/grid-part2/demos/';
    $url = 'https://github.com/atk4/ui/blob/develop/demos/';

    // Would be nice if this would be a link.
    $layout->menu->addItem()->add(['Button', 'View Source', 'teal', 'icon' => 'github'])
        ->setAttr('target', '_blank')->on('click', new \atk4\ui\jsExpression('document.location=[];', [$url.$f]));

    $img = 'https://raw.githubusercontent.com/atk4/ui/07208a0af84109f0d6e3553e242720d8aeedb784/public/logo.png';
}

require_once 'somedatadef.php';
