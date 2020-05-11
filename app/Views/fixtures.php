<article>
    <?php foreach ($fixtures as $i => $fixture): ?>
    <table>
        <thead>
            <tr>
                <th><?=$i?>. kolo</th>
                <th colspan="2"><?=$fixture[0]->game_date?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fixture as $f): ?>
            <tr>
                <td><?=$f->home_team?></td>
                <td>-</td>
                <td><?=$f->away_team?></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
    <?php endforeach?>
</article>