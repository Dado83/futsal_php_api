<head>
    <link rel="stylesheet" href="/public/css/styles.css">
    <style>
    body {
        margin: 40px 0 100px 30px;
        background: white;
    }

    .resultsNL {
        margin: 0 0 20px 40px;
    }

    .resultsNL p {
        font-weight: bold;
    }

    .tableNL {
        margin: 0 20px 40px 20px;
    }

    .tableNL table {
        width: 500px;
        border: 1px solid black;
        border-collapse: collapse;
    }

    .tableNL table td,
    .tableNL table th {
        border-bottom: 1px solid black;
    }

    .tableNL td:nth-of-type(-2n+9) {
        text-align: center;
        padding: 0 15px;
    }

    .tableNL th:nth-of-type(2) {
        text-align: left;
    }

    .tableNL td:nth-of-type(2) {
        border-left: 1px solid black;
    }

    .nextGameNL {
        margin: 20px;
    }
    </style>
</head>
<img style="width:15%; position:absolute; top:10px" src="/public/images/grb.png" alt="grb" />
<h1 style="text-align:center">FAIR PLAY Liga Budućih Šampiona</h1>
<h2 style="text-align:center">takmičarska sezona 2020/21</h2>
<h3 style="text-align:center">Bilten br. <?php echo $lastMday ?></h3>
<br />
<p>1. Registracija utakmica <?=$lastMday?>. kola</p>
<?php if ($isLeagueOver): ?>
<?php else: ?>
<p>2. Raspored utakmica <?=$nextMday?>. kola</p>
<?php endif?>
<br>
<p>ad 1)</p>
<!-- <p><?=$notPlayingLastMday->team?> pauzira</p> -->
<div class="resultsNL">
    <p>2011. godište</p>
    <table>
        <?php foreach ($results as $r):
    if ($r->goals_home11 == -1): ?>
        <?php else: ?>
        <tr>
            <td><?=$r->home_name?></td>
            <td><?=$r->goals_home11?></td>
            <td> - </td>
            <td><?=$r->goals_away11?></td>
            <td><?=$r->away_name?></td>
        </tr>
        <?php endif;
endforeach?>
    </table>
</div>
<div class="tableNL">
    <table>
        <tr>
            <th>#</th>
            <th>2011. godište</th>
            <th>Ut</th>
            <th>P</th>
            <th>N</th>
            <th>I</th>
            <th>GOL</th>
            <th>+/-</th>
            <th>BOD</th>
        </tr>
        <?php
$i = 1;
foreach ($table11 as $row): ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$row->team?></td>
            <td><?=$row->games_played?></td>
            <td><?=$row->games_won?></td>
            <td><?=$row->games_drew?></td>
            <td><?=$row->games_lost?></td>
            <td><?=$row->goals?></td>
            <td><?php if ($row->g_diff > 0): ?>
                <?="+$row->g_diff"?>
                <?php else: ?>
                <?=$row->g_diff?>
                <?php endif?></td>
            <td><?=$row->points?></td>
        </tr>
        <?php
$i++;
endforeach?>
    </table>
</div>
<div class="resultsNL">
    <p>2010. godište</p>
    <table>
        <?php foreach ($results as $r):
    if ($r->goals_home10 == -1): ?>
        <?php else: ?>
        <tr>
            <td><?=$r->home_name?></td>
            <td><?=$r->goals_home10?></td>
            <td> - </td>
            <td><?=$r->goals_away10?></td>
            <td><?=$r->away_name?></td>
        </tr>
        <?php endif;
endforeach?>
    </table>
</div>
<div class="tableNL">
    <table>
        <tr>
            <th>#</th>
            <th>2010. godište</th>
            <th>Ut</th>
            <th>P</th>
            <th>N</th>
            <th>I</th>
            <th>GOL</th>
            <th>+/-</th>
            <th>BOD</th>
        </tr>
        <?php
$i = 1;
foreach ($table10 as $row): ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$row->team?></td>
            <td><?=$row->games_played?></td>
            <td><?=$row->games_won?></td>
            <td><?=$row->games_drew?></td>
            <td><?=$row->games_lost?></td>
            <td><?=$row->goals?></td>
            <td><?php if ($row->g_diff > 0): ?>
                <?="+$row->g_diff"?>
                <?php else: ?>
                <?=$row->g_diff?>
                <?php endif?></td>
            <td><?=$row->points?></td>
        </tr>
        <?php
$i++;
endforeach?>
    </table>
</div>
<div class="resultsNL">
    <p>2009. godište</p>
    <table>
        <?php foreach ($results as $r): ?>
        <tr>
            <td><?=$r->home_name?></td>
            <td><?=$r->goals_home9?></td>
            <td> - </td>
            <td><?=$r->goals_away9?></td>
            <td><?=$r->away_name?></td>
        </tr>
        <?php endforeach?>
    </table>
</div>
<div class="tableNL">
    <table>
        <tr>
            <th>#</th>
            <th>2009. godište</th>
            <th>Ut</th>
            <th>P</th>
            <th>N</th>
            <th>I</th>
            <th>GOL</th>
            <th>+/-</th>
            <th>BOD</th>
        </tr>
        <?php
$i = 1;
foreach ($table9 as $row): ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$row->team?></td>
            <td><?=$row->games_played?></td>
            <td><?=$row->games_won?></td>
            <td><?=$row->games_drew?></td>
            <td><?=$row->games_lost?></td>
            <td><?=$row->goals?></td>
            <td><?php if ($row->g_diff > 0): ?>
                <?="+$row->g_diff"?>
                <?php else: ?>
                <?=$row->g_diff?>
                <?php endif?></td>
            <td><?=$row->points?></td>
        </tr>
        <?php
$i++;
endforeach?>
    </table>
</div>
<div class="resultsNL">
    <p>2008. godište</p>
    <table>
        <?php foreach ($results as $r): ?>
        <tr>
            <td><?=$r->home_name?></td>
            <td><?=$r->goals_home8?></td>
            <td> - </td>
            <td><?=$r->goals_away8?></td>
            <td><?=$r->away_name?></td>
        </tr>
        <?php endforeach?>
    </table>
</div>
<div class="tableNL">
    <table>
        <tr>
            <th>#</th>
            <th>2008. godište</th>
            <th>Ut</th>
            <th>P</th>
            <th>N</th>
            <th>I</th>
            <th>GOL</th>
            <th>+/-</th>
            <th>BOD</th>
        </tr>
        <?php
$i = 1;
foreach ($table8 as $row): ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$row->team?></td>
            <td><?=$row->games_played?></td>
            <td><?=$row->games_won?></td>
            <td><?=$row->games_drew?></td>
            <td><?=$row->games_lost?></td>
            <td><?=$row->goals?></td>
            <td><?php if ($row->g_diff > 0): ?>
                <?="+$row->g_diff"?>
                <?php else: ?>
                <?=$row->g_diff?>
                <?php endif?></td>
            <td><?=$row->points?></td>
        </tr>
        <?php
$i++;
endforeach?>
    </table>
</div>
<div class="resultsNL">
    <p>2007. godište</p>
    <table>
        <?php foreach ($results as $r):
    if ($r->goals_home7 == -1): ?>
        <?php else: ?>
        <tr>
            <td><?=$r->home_name?></td>
            <td><?=$r->goals_home7?></td>
            <td> - </td>
            <td><?=$r->goals_away7?></td>
            <td><?=$r->away_name?></td>
        </tr>
        <?php endif;
endforeach?>
    </table>
</div>
<div class="tableNL">
    <table>
        <tr>
            <th>#</th>
            <th>2007. godište</th>
            <th>Ut</th>
            <th>P</th>
            <th>N</th>
            <th>I</th>
            <th>GOL</th>
            <th>+/-</th>
            <th>BOD</th>
        </tr>
        <?php
$i = 1;
foreach ($table7 as $row): ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$row->team?></td>
            <td><?=$row->games_played?></td>
            <td><?=$row->games_won?></td>
            <td><?=$row->games_drew?></td>
            <td><?=$row->games_lost?></td>
            <td><?=$row->goals?></td>
            <td><?php if ($row->g_diff > 0): ?>
                <?="+$row->g_diff"?>
                <?php else: ?>
                <?=$row->g_diff?>
                <?php endif?></td>
            <td><?=$row->points?></td>
        </tr>
        <?php
$i++;
endforeach?>
    </table>
</div>
<p>ad 2)</p>
<table class="nextGameNL">
    <?php if ($isLeagueOver): else: ?>
    <tr>
        <td colspan='5' style='font-weight:bold;'><?=$nextMday?>. kolo (<?=$nextGameDate->game_date?>)</td>
    </tr>
    <?php foreach ($nextFixture as $nf): ?>
    <tr>
        <td><?=$nf->home?></td>
        <td> - </td>
        <td><?=$nf->away?></td>
        <td><?=$nf->venue?></td>
        <td><?=$nf->game_time?></td>
    </tr>
    <?php endforeach?>
    <tr>
        <td colspan='5' style='font-style:italic;'><?=$notPlaying->team?> pauzira</td>
    </tr>
    <?php endif?>
</table>