<article class="fixtures">
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
                <td>
                    <a href=<?="/ekipa/$f->home_team"?>>
                        <?=$f->home_club?><img src=<?="/public/images/logos/$f->home_team.png"?> alt="grb">
                    </a>
                </td>
                <td>-:-</td>
                <td>
                    <a href=<?="/ekipa/$f->away_team"?>>
                        <img src=<?="/public/images/logos/$f->away_team.png"?> alt="grb"><?=$f->away_club?>
                    </a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
    <?php endforeach?>
</article>