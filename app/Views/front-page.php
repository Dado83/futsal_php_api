<article class="front-page">
    <?php if ($lastMday != $maxMday): ?>
    <section class="next-fixture">
        <table class="table">
            <tr>
                <th class="text-align__left"><?=$lastResults[0]->m_day + 1?>. kolo</th>
                <th class="text-align__right" colspan="2"><?=$nextFixture[0]->game_date?></th>
            </tr>
            <?php foreach ($nextFixture as $fixture): ?>
            <tr>
                <td class="text-align__right standings-club__width">
                    <a href=<?="/ekipa/$fixture->home_team"?>>
                        <?=$fixture->home?>
                        <img class="club-logo__small" src=<?="/public/images/logos/$fixture->home_team.png"?> alt="grb">
                    </a>
                </td>
                <td class="text-align__center">-</td>
                <td class="standings-club__width">
                    <a href=<?="/ekipa/$fixture->away_team"?>>
                        <img class=" club-logo__small" src=<?="/public/images/logos/$fixture->away_team.png"?> alt="grb">
                        <?=$fixture->away?>
                    </a>
                </td>
            </tr>
            <?php endforeach?>
        </table>
    </section>
    <?php else: ?>
    <section class=final-four>
        <a href="/zavrsnica">
            <h1>Završni turnir</h1>
        </a>
        <p>Subota, 7. mart 2020. g. - Žepče<br>(2007, 2008, 2010)</p>
        <p>Nedjelja, 8. mart 2020. g. - Maglaj<br>(2006, 2009)</p>
    </section>
    <?php endif?>
    <section class="last-mday">
        <?php foreach ($lastResults as $result): ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-align__left"><?=$lastResults[0]->m_day?>. kolo</th>
                    <th>2006</th>
                    <th>2007</th>
                    <th>2008</th>
                    <th>2009</th>
                    <th>2010</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="standings-club__width">
                        <a href=<?="/ekipa/$result->home_id"?>>
                            <img class="club-logo__small" src=<?="/public/images/logos/$result->home_id.png"?>>
                            <?=$result->home_name?>
                        </a>
                    </td>
                    <td class="text-align__right"><?=$result->goals_home6?></td>
                    <td class="text-align__right"><?=($result->goals_home7 != -1) ?: ''?></td>
                    <td class="text-align__right"><?=$result->goals_home8?></td>
                    <td class="text-align__right"><?=$result->goals_home9?></td>
                    <td class="text-align__right"><?=($result->goals_home10 != -1) ?: ''?></td>
                </tr>
                <tr>
                    <td class="standings-club__width"><a href=<?="/ekipa/$result->away_id"?>>
                            <img class="club-logo__small" src=<?="/public/images/logos/$result->away_id.png"?>>
                            <?=$result->away_name?>
                        </a>
                    </td>
                    <td class="text-align__right"><?=$result->goals_away6?></td>
                    <td class="text-align__right"><?=($result->goals_away7 != -1) ?: ''?></td>
                    <td class="text-align__right"><?=$result->goals_away8?></td>
                    <td class="text-align__right"><?=$result->goals_away9?></td>
                    <td class="text-align__right"><?=($result->goals_away10 != -1) ?: ''?></td>
                </tr>
            </tbody>
        </table>
        <?php endforeach?>
    </section>
</article>