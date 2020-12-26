<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <meta name="description" content="Fair Play LBŠ website">
    <meta name="keywords" content="Fair Play, Liga Budućih Šampiona, LBŠ, Liga">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fcc914">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/styles.css?v=2.8">
    <link rel="shortcut icon" href="/public/images/fp.ico" type="image/x-icon">
    <script src="/public/js/scripts.js?v=0.1" defer></script>
    <script src="/public/js/Chart.bundle.min.js" defer></script>
</head>
<body>
    <header class="header-main">
        <a class="home-logo" href="/"></a>
        <h3>Liga Budućih Šampiona
            <?php
$views12hrs = session()->last12hrsViews->vis;
$visitors12hrs = session()->last12hrsVisitors->vis;
$views6hrs = session()->last6hrsViews->vis;
$visitors6hrs = session()->last6hrsVisitors->vis;
$views2hrs = session()->last2hrsViews->vis;
$visitors2hrs = session()->last2hrsVisitors->vis;

if (session()->role == 'admin'): ?>
            <?="$views12hrs:$visitors12hrs/$views6hrs:$visitors6hrs/$views2hrs:$visitors2hrs"?>
            <?php endif?>
        </h3>
        <nav class="menu">
            <div class="menu-container">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <ul class="nav-bar">
                <li><a href="/rezultati">rezultati</a></li>
                <li><a href="/tabela">tabela</a></li>
                <li><a href="/raspored">raspored</a></li>
                <li><a href="/zavrsnica">završnica</a></li>
                <li><a href="/ucesnici">učesnici</a></li>
                <li><a href="/turnir">turnir mejk</a></li>
                <li><a href="/o-nama">o nama</a></li>
                <li><a href="/admin">admin</a></li>
            </ul>
        </nav>
    </header>