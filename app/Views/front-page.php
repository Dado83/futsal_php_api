<h3>Liga Budućih Šampiona 2019/2020</h3>
<article class="front-page">
    <section>
        <?php foreach ($lastResults as $result): ?>
        <table>
            <thead>
                <tr>
                    <th></th>
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
    <section>iduce kolo</section>
</article>