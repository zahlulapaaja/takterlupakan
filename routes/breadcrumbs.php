<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

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


// Home > POK
Breadcrumbs::for('pok', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('POK', route('pok'));
});

// Home > POK > Impor
Breadcrumbs::for('pok.impor', function (BreadcrumbTrail $trail) {
    $trail->parent('pok');
    $trail->push('Impor', route('pok.impor'));
});

// Home > No Surat
Breadcrumbs::for('no-surat.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('No Surat', route('no-surat.index'));
});

// Home > No Surat
Breadcrumbs::for('master.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Master', route('master.index'));
});

// Home > Kegiatan
Breadcrumbs::resource('home', 'kegiatan', 'Kegiatan');

// Home > No Surat > XXX
Breadcrumbs::resource('no-surat.index', 'no-surat.fp', 'Form Permintaan');
Breadcrumbs::resource('no-surat.index', 'no-surat.masuk-keluar', 'Masuk Keluar');
Breadcrumbs::resource('no-surat.index', 'no-surat.tim', 'Tim Kerja');

// Home > Kegiatan > XXX
Breadcrumbs::resource('kegiatan.index', 'kegiatan.sk', 'SK');
Breadcrumbs::resource('kegiatan.index', 'kegiatan.spj', 'SPJ');

// Home > Master > XXX
Breadcrumbs::resource('master.index', 'master.referensi', 'Referensi');
Breadcrumbs::resource('master.index', 'master.tim', 'Tim Kerja');
Breadcrumbs::resource('master.index', 'master.pegawai', 'Pegawai');
Breadcrumbs::resource('master.index', 'master.mitra', 'Mitra');

// Home > Master > Tim > 202X
Breadcrumbs::for("master.tim.list", function (BreadcrumbTrail $trail, $tahun) {
    $trail->parent("master.tim.index");
    $trail->push($tahun, route("master.tim.list", $tahun));
});

// Home > Master > Mitra > 202X
Breadcrumbs::for("master.mitra.list", function (BreadcrumbTrail $trail, $tahun) {
    $trail->parent("master.mitra.index");
    $trail->push($tahun, route("master.mitra.list", $tahun));
});

// Home > Master > Mitra > Impor
Breadcrumbs::for("master.mitra.impor", function (BreadcrumbTrail $trail) {
    $trail->parent("master.mitra.index");
    $trail->push('Impor', route("master.mitra.impor"));
});





// Home > No Surat > Form Permintaan
// Breadcrumbs::for('no-surat.fp.index', function (BreadcrumbTrail $trail) {
//     $trail->parent('no-surat.index');
//     $trail->push('Form Permintaan', route('no-surat.fp.index'));
// });
