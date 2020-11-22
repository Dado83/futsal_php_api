<article class="front-page">
    <?php if (!isset($lastResults)): ?>
    <table class="table">
        <tr class="background-row">
            <th class="text-align__left">1. kolo</th>
            <th class="text-align__right" colspan="2"><?=$nextFixture[0]->game_date?></th>
        </tr>
        <?php foreach ($nextFixture as $fixture): ?>
        <tr>
            <td class="text-align__right standings-club__width">
                <a href=<?="/ekipa/$fixture->home_team"?>>
                    <?=$fixture->home?>
                    <img class="club-logo__small" src=<?="/public/images/logos/$fixture->home_team.png?v=0.1"?> alt="grb">
                </a>
            </td>
            <td class="text-align__center">-</td>
            <td class="standings-club__width">
                <a href=<?="/ekipa/$fixture->away_team"?>>
                    <img class=" club-logo__small" src=<?="/public/images/logos/$fixture->away_team.png?v=0.1"?> alt="grb">
                    <?=$fixture->away?>
                </a>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="venue"><?=$fixture->venue?></td>
        </tr>
        <?php endforeach?>
    </table>
    <?php else: ?>
    <?php if ($lastMday != $maxMday): ?>
    <section class="next-fixture">
        <table class="table">
            <tr class="background-row">
                <th class="text-align__left"><?=$lastResults[0]->m_day + 1?>. kolo</th>
                <th class="text-align__right" colspan="2"><?=$nextFixture[0]->game_date?></th>
            </tr>
            <?php foreach ($nextFixture as $fixture): ?>
            <tr>
                <td class="text-align__right standings-club__width">
                    <a href=<?="/ekipa/$fixture->home_team"?>>
                        <?=$fixture->home?>
                        <img class="club-logo__small" src=<?="/public/images/logos/$fixture->home_team.png?v=0.1"?> alt="grb">
                    </a>
                </td>
                <td class="text-align__center">-</td>
                <td class="standings-club__width">
                    <a href=<?="/ekipa/$fixture->away_team"?>>
                        <img class=" club-logo__small" src=<?="/public/images/logos/$fixture->away_team.png?v=0.1"?> alt="grb">
                        <?=$fixture->away?>
                    </a>
                </td>
            </tr>
            <?php endforeach?>
        </table>
    </section>
    <?php else: ?>
    <section class=next-fixture>
        <a class="text-align__center" href="/zavrsnica">
            <h1>Završni turnir 2020/21</h1>
        </a>
        <p class="text-align__center">?Subota, 7. mart 2020. g. - Žepče<br>(2007, 2008, 2010)</p>
        <p class="text-align__center">?Nedjelja, 8. mart 2020. g. - Maglaj<br>(2006, 2009)</p>
    </section>
    <?php endif?>
    <hr>
    <section class="last-mday">
        <?php foreach ($lastResults as $result): ?>
        <table class="table">
            <thead class="background-row">
                <tr>
                    <td class="text-align__left"><?=$lastResults[0]->m_day?>. kolo</th>
                    <td>2007</td>
                    <td>2008</td>
                    <td>2009</td>
                    <td>2010</td>
                    <td>2011</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="standings-club__width">
                        <a href=<?="/ekipa/$result->home_id"?>>
                            <img class="club-logo__small" src=<?="/public/images/logos/$result->home_id.png?v=0.1"?>>
                            <?=$result->home_name?>
                        </a>
                    </td>
                    <td class="text-align__center text-bold"><?=$result->goals_home7 != -1 ? $result->goals_home7 : '*'?></td>
                    <td class="text-align__center text-bold"><?=$result->goals_home8?></td>
                    <td class="text-align__center text-bold"><?=$result->goals_home9?></td>
                    <td class="text-align__center text-bold"><?=$result->goals_home10 != -1 ? $result->goals_home10 : '*'?></td>
                    <td class="text-align__center text-bold"><?=$result->goals_home11 != -1 ? $result->goals_home11 : '*'?></td>
                </tr>
                <tr>
                    <td class="standings-club__width"><a href=<?="/ekipa/$result->away_id"?>>
                            <img class="club-logo__small" src=<?="/public/images/logos/$result->away_id.png?v=0.1"?>>
                            <?=$result->away_name?>
                        </a>
                    </td>
                    <td class="text-align__center text-bold"><?=$result->goals_away7 != -1 ? $result->goals_away7 : '*'?></td>
                    <td class="text-align__center text-bold"><?=$result->goals_away8?></td>
                    <td class="text-align__center text-bold"><?=$result->goals_away9?></td>
                    <td class="text-align__center text-bold"><?=$result->goals_away10 != -1 ? $result->goals_away10 : '*'?></td>
                    <td class="text-align__center text-bold"><?=$result->goals_away11 != -1 ? $result->goals_away11 : '*'?></td>
                </tr>
            </tbody>
        </table>
        <?php endforeach?>
        <p class="tooltip">* godište ne nastupa</p>
    </section>
    <?php endif?>
</article>