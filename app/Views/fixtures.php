<article class="fixtures">
    <?php foreach ($fixtures as $i => $fixture): ?>
    <table class="table table-shadow">
        <thead>
            <tr>
                <th class="text-align__left"><?=$i?>. kolo</th>
                <th class="text-align__right" colspan="2"><?=$fixture[0]->game_date?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fixture as $f): ?>
            <tr>
                <td class="text-align__right standings-club__width">
                    <a href=<?="/ekipa/$f->home_team"?>>
                        <?=$f->home_club?><img class="club-logo__small" src=<?="/public/images/logos/$f->home_team.png?v=0.1"?> alt="grb">
                    </a>
                </td>
                <td class="text-align__center">-</td>
                <td class="standings-club__width text-align__left">
                    <a href=<?="/ekipa/$f->away_team"?>>
                        <img class="club-logo__small" src=<?="/public/images/logos/$f->away_team.png?v=0.1"?> alt="grb"><?=$f->away_club?>
                    </a>
                </td>
            </tr>
            <?php endforeach?>
            <tr>
                <td class="info-italic"><?=$notPlaying[$i]->team?> pauzira</td>
            </tr>
        </tbody>
    </table>
    <?php endforeach?>
</article>