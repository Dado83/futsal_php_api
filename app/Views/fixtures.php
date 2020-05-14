<article class="fixtures">
    <?php foreach ($fixtures as $i => $fixture): ?>
    <table>
        <thead>
            <tr>
                <th><?=$i?>. kolo</th>
                <th colspan="4"><?=$fixture[0]->game_date?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fixture as $f): ?>
            <tr>
                <td><?=$f->home_club?></td>
                <td><img src=<?="/public/images/logos/" . $f->home_team . ".png"?> alt="grb"></td>
                <td>-:-</td>
                <td><img src=<?="/public/images/logos/" . $f->away_team . ".png"?> alt="grb"></td>
                <td><?=$f->away_club?></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
    <?php endforeach?>
</article>