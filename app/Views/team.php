<article>
    <img src="/public/images/logos-big/<?=$team->id?>.png" alt="grb-klub">
    <section>
        <h1>Klub</h1>
        <p><?=$team->team_name?></p>
        <h1>grad</h1>
        <p><?=$team->team_city?></p>
        <h1>boja dresa</h1>
        <p><?=$team->kit_color?></p>
        <h1>dvorana</h1>
        <p><?=$team->venue?></p>
        <h1>termin</h1>
        <p><?=$team->game_time?></p>
    </section>
</article>
<article>
    <?php
$results = [2006 => $results6, $results7, $results8, $results9, $results10];
foreach ($results as $key => $result):
    if (!$result):
    else: ?>
    <table>
        <thead>
            <th>kolo</th>
            <th><?=$key?>. godiste</th>
        </thead>
        <tbody>
            <?php foreach ($result as $r): ?>
            <tr>
                <td><?=$r->m_day?></td>
                <td><?=$r->home_team?></td>
                <td><?=$r->goals_home?>:<?=$r->goals_away?></td>
                <td><?=$r->away_team?></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
    <?php
endif;
endforeach?>
</article>