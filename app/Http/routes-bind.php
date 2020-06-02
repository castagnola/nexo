<?php

$decodeid = function ($id) {
    return \Hashids::decode($id)[0];
};


Route::bind('teams', function ($id) use ($decodeid) { 
    $id = $decodeid($id);
    return \Nexo\Entities\Team::findOrFail($id);
});

Route::bind('products-categories', function ($id) {
    return \Nexo\Entities\ProductCategory::findOrFail($id);
});

Route::bind('assignments', function ($id) use ($decodeid) {
    $id = $decodeid($id);
    return \Nexo\Entities\Service::findOrFail($id);
});

Route::bind('services', function ($id) use ($decodeid) {
    $id = $decodeid($id);
    return \Nexo\Entities\Service::findOrFail($id);
});


Route::bind('customers', function ($id) use ($decodeid) {
    //  $id = $decodeid($id);
    return \Nexo\Entities\Customer::findOrFail($id);
});

Route::bind('customersAddresses', function ($id) use ($decodeid) {
    return \Nexo\Entities\CustomerAddress::findOrFail($id);
});

Route::bind('products', function ($id) use ($decodeid) {
    $id = $decodeid($id);
    return \Nexo\Entities\Product::findOrFail($id);
});

Route::bind('tools', function ($id) use ($decodeid) {
    $id = $decodeid($id);
    return \Nexo\Entities\Tool::findOrFail($id);
});

Route::bind('productsCategories', function ($id) {
    return \Nexo\Entities\ProductCategory::findOrFail($id);
});

Route::bind('users', function ($id) {
    return \Nexo\Entities\User::findOrFail($id);
});

Route::bind('services_types', function ($id) {
    return \Nexo\Entities\ServiceType::findOrFail($id);
});

Route::bind('polls', function ($id) {
    return \Nexo\Entities\Poll::findOrFail($id);
});

Route::bind('polls_answers', function ($id) {
    return \Nexo\Entities\PollAnswer::findOrFail($id);
});

Route::bind('cities', function ($id) {
    return \Nexo\Entities\LocationCity::findOrFail($id);
});
