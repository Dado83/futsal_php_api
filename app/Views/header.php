<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>LBS</title>
    <meta name="description" content="Fair Play LBŠ website">
    <meta name="keywords" content="Fair Play, Liga Budućih Šampiona, LBŠ, Liga">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fcc914">
    <link rel="stylesheet" href="/public/css/styles.css?v=0.3">
    <link rel="shortcut icon" href="/public/images/fp.ico" type="image/x-icon">
    <script src="/public/js/scripts.js?v=0.1" defer></script>
    <script src="/public/js/Chart.bundle.min.js" defer></script>
</head>
<body>
    <header>
        <span class="nav-toggle">&#9776</span>
        <nav>
            <ul class="nav-bar">
                <li><a href="/rezultati">rezultati</a></li>
                <li><a href="/tabela">tabela</a></li>
                <li><a href="/raspored">raspored</a></li>
                <li><a href="/turnir">turnir mejk</a></li>
                <li><a href="/o-nama">o nama</a></li>
                <li><a href="/admin">admin</a></li>
            </ul>
        </nav>
        <a class="home" href="/"></a>
        <button class="login">login</button>
    </header>
    <script>
    let toggle = document.querySelector('.nav-toggle')
    toggle.addEventListener('mouseup', navToggle)

    function navToggle(e) {
        e.stopPropagation()
        let navBar = document.querySelector('.nav-bar')
        if (navBar.style.display == '') {
            navBar.style.display = 'inline-block'
        } else {
            navBar.style.display = ''
        }
    }

    document.addEventListener('mouseup', (e) => {
        let navBar = document.querySelector('.nav-bar')
        if (navBar.style.display == 'inline-block') {
            navBar.style.display = ''
        }
    })
    </script>