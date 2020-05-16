<head>
    <link rel="stylesheet" href="/css/styles.css">
    <style>
    body {
        margin: 40px 0 100px 30px;
        background: white;
    }
    </style>
</head>
<img style="width:15%; position:absolute; top:10px" src="/images/grb.png" alt="grb" />
<h1 style="text-align:center">FAIR PLAY Liga Budućih Šampiona</h1>
<h2 style="text-align:center">takmičarska sezona 2019/20</h2>
<h3 style="text-align:center">Bilten br. <?php echo $lastMday ?></h3>
<br />
<p>1. Registracija utakmica <?=$lastMday?>. kola</p>
<?php if ($isLeagueOver): ?>
<?php else: ?>
<p>2. Raspored utakmica <?=$nextMday?>. kola</p>
<?php endif?>
<br>
<p>ad 1)</p>
<p><?=$notPlayingLastMday->team?> pauzira</p>
<div class="resultsNL">
    <p>2010. godište</p>
    <table>
        <?php foreach ($results10 as $r): ?>
        <tr>
            <td><?=$r->home_team?></td>
            <td><?=$r->goals_home?></td>
            <td> - </td>
            <td><?=$r->goals_away?></td>
            <td><?=$r->away_team?></td>
        </tr>
        <?php endforeach?>
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
            <td><?=$row->g_diff?></td>
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
        <?php foreach ($results9 as $r): ?>
        <tr>
            <td><?=$r->home_team?></td>
            <td><?=$r->goals_home?></td>
            <td> - </td>
            <td><?=$r->goals_away?></td>
            <td><?=$r->away_team?></td>
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
            <td><?=$row->g_diff?></td>
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
        <?php foreach ($results8 as $r): ?>
        <tr>
            <td><?=$r->home_team?></td>
            <td><?=$r->goals_home?></td>
            <td> - </td>
            <td><?=$r->goals_away?></td>
            <td><?=$r->away_team?></td>
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
            <td><?=$row->g_diff?></td>
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
        <?php foreach ($results7 as $r): ?>
        <tr>
            <td><?=$r->home_team?></td>
            <td><?=$r->goals_home?></td>
            <td> - </td>
            <td><?=$r->goals_away?></td>
            <td><?=$r->away_team?></td>
        </tr>
        <?php endforeach?>
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
            <td><?=$row->g_diff?></td>
            <td><?=$row->points?></td>
        </tr>
        <?php
$i++;
endforeach?>
    </table>
</div>
<div class="resultsNL">
    <p>2006. godište</p>
    <table>
        <?php foreach ($results6 as $r): ?>
        <tr>
            <td><?=$r->home_team?></td>
            <td><?=$r->goals_home?></td>
            <td> - </td>
            <td><?=$r->goals_away?></td>
            <td><?=$r->away_team?></td>
        </tr>
        <?php endforeach?>
    </table>
</div>
<div class="tableNL">
    <table>
        <tr>
            <th>#</th>
            <th>2006. godište</th>
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
foreach ($table6 as $row): ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$row->team?></td>
            <td><?=$row->games_played?></td>
            <td><?=$row->games_won?></td>
            <td><?=$row->games_drew?></td>
            <td><?=$row->games_lost?></td>
            <td><?=$row->goals?></td>
            <td><?=$row->g_diff?></td>
            <td><?=$row->points?></td>
        </tr>
        <?php
$i++;
endforeach?>
    </table>
</div>
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