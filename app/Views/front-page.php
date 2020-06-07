<article class="front-page">
    <?php if ($lastMday != $maxMday): ?>
    <section class="next-fixture">
        <table>
            <tr>
                <th colspan="2"><?=$lastResults[0]->m_day + 1?>. kolo</th>
                <th><?=$nextFixture[0]->game_date?></th>
            </tr>
            <?php foreach ($nextFixture as $fixture): ?>
            <tr>
                <td>
                    <a href=<?="/ekipa/$fixture->home_team"?>>
                        <img src=<?="/public/images/logos/$fixture->home_team.png"?> alt="grb">
                        <?=$fixture->home?>
                    </a>
                </td>
                <td>-:-</td>
                <td>
                    <a href=<?="/ekipa/$fixture->away_team"?>>
                        <img src=<?="/public/images/logos/$fixture->away_team.png"?> alt="grb">
                        <?=$fixture->away?>
                    </a>
                </td>
            </tr>
            <?php endforeach?>
        </table>
    </section>
    <?php else: ?>
    <section class=final-four>
        <a>
            <h1>Završni turnir</h1>
        </a>
        <p>Subota, 7. mart 2020. g. - Žepče<br>(2007, 2008, 2010)</p>
        <p>Nedjelja, 8. mart 2020. g. - Maglaj<br>(2006, 2009)</p>
    </section>
    <?php endif?>
    <section class="last-mday">
        <?php foreach ($lastResults as $result): ?>
        <table>
            <thead>
                <tr>
                    <th><?=$lastResults[0]->m_day?>. kolo</th>
                    <th>2006</th>
                    <th>2007</th>
                    <th>2008</th>
                    <th>2009</th>
                    <th>2010</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href=<?="/ekipa/$result->home_id"?>><img src=<?="/public/images/logos/$result->home_id.png"?>><?=$result->home_name?></a></td>
                    <td><?=$result->goals_home6?></td>
                    <td><?=($result->goals_home7 != -1) ?: ''?></td>
                    <td><?=$result->goals_home8?></td>
                    <td><?=$result->goals_home9?></td>
                    <td><?=($result->goals_home10 != -1) ?: ''?></td>
                </tr>
                <tr>
                    <td><a href=<?="/ekipa/$result->away_id"?>><img src=<?="/public/images/logos/$result->away_id.png"?>><?=$result->away_name?></a></td>
                    <td><?=$result->goals_away6?></td>
                    <td><?=($result->goals_away7 != -1) ?: ''?></td>
                    <td><?=$result->goals_away8?></td>
                    <td><?=$result->goals_away9?></td>
                    <td><?=($result->goals_away10 != -1) ?: ''?></td>
                </tr>
            </tbody>
        </table>
        <?php endforeach?>
    </section>
</article>