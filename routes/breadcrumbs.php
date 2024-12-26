<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

Breadcrumbs::macro('resource', function (string $parent, string $name, string $title) {
    // Home > Sesuatu
    Breadcrumbs::for("{$name}.index", function (BreadcrumbTrail $trail) use ($parent, $name, $title) {
        $trail->parent($parent);
        $trail->push($title, route("{$name}.index"));
    });

    // Home > Sesuatu > New
    Breadcrumbs::for("{$name}.create", function (BreadcrumbTrail $trail) use ($name) {
        $trail->parent("{$name}.index");
        $trail->push('New', route("{$name}.create"));
    });

    // Home > Sesuatu > Data 123
    Breadcrumbs::for("{$name}.show", function (BreadcrumbTrail $trail, $data) use ($name) {
        $trail->parent("{$name}.index");
        $trail->push('Detail', route("{$name}.show", $data));
    });

    // Home > Sesuatu > Edit
    Breadcrumbs::for("{$name}.edit", function (BreadcrumbTrail $trail, $data) use ($name) {
        $trail->parent("{$name}.index");
        $trail->push('Edit', route("{$name}.edit", $data));
    });
});


// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});


// Home > No Surat
Breadcrumbs::for('no-surat.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('No Surat', route('no-surat.index'));
});

Breadcrumbs::resource('no-surat.index', 'no-surat.fp', 'Form Permintaan');




// Home > No Surat > Form Permintaan
// Breadcrumbs::for('no-surat.fp.index', function (BreadcrumbTrail $trail) {
//     $trail->parent('no-surat.index');
//     $trail->push('Form Permintaan', route('no-surat.fp.index'));
// });
