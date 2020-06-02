<?php

Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('Home', url('/'));
});


Breadcrumbs::register('team.services.index', function($breadcrumbs){
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Servicios', route('team.services.index'));
});

Breadcrumbs::register('team.services.create', function($breadcrumbs) {
    $breadcrumbs->parent('team.services.index');
    $breadcrumbs->push('Crear servicio');
});