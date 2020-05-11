<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TEST PLAY pretraga</title>
    <meta name="description" content="Svet Kompjutera TEST PLAY (pretraga recenzija)">
    <meta name="keywords" content="Svet Kompjutera, SK, sk, TEST PLAY, igre">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#006BAD">
    <link rel="stylesheet" href="/public/css/stylesSk.css?v=0.1">
    <link rel="shortcut icon" href="/public/images/sk.ico" type="image/x-icon">
    <script src="/public/js/skgameindex.js?v=0.1" defer></script>
</head>

<body>
    <div class="loader"></div>
    <form action="#" method="GET">
        <p><a href="https://www.sk.rs/arhiva/rubrika/test-play">
                <span id="sk">Svet Kompjutera</span></a></p>
        <fieldset>
            <legend>TEST PLAY(<span id="links"></span>)</legend>
            <label for="title">Naslov</label><br>
            <input type="text" id="title" placeholder="The Witcher 3: Wild Hunt"><br>
            <label for="author">Autor</label><br>
            <input type="text" id="author" placeholder="Miodrag KUZMANOVIĆ"><br>
            <label for="score">Ocjena</label><br>
            <input type="number" id="score" min="1" max="99" placeholder="90"><br>
            <label for="platform">Platforma</label><br>
            <input type="text" id="platform" placeholder="PC, PlayStation 4, Xbox One">
            <input type="reset" class="button" id="reset" value="">
            <input type="submit" class="button" id="search" value="Pretraga">
        </fieldset>
    </form>
    <table>
        <thead>
            <tr class="row">
                <th>Datum</th>
                <th>Naslov</th>
                <th>Autor</th>
                <th>Ocjena</th>
                <th class="hidden">Platforma</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</body>