<article class="results">
    <nav class="results-nav">
        <ul>
            <li id="results6">2006</li>
            <li id="results7">2007</li>
            <li id="results8">2008</li>
            <li id="results9">2009</li>
            <li id="results10">2010</li>
        </ul>
    </nav>
    <?php
$k = 2006;
$results = [$results6, $results7, $results8, $results9, $results10];
for ($j = 0; $j <= 4; $j++): ?>
    <section class="results-section hidden" id=<?="res$k"?>>
        <?php foreach ($results[$j] as $key => $result): ?>
        <table>
            <thead>
                <th><?="$key. kolo"?></th>
                <th colspan="3"><?=$dates[$key][0]->game_date?></th>
            </thead>
            <tbody>
                <?php foreach ($result as $res): ?>
                <tr>
                    <td>
                        <img src=<?="/public/images/logos/$res->home_teamid.png"?>>
                        <br><?=$res->home_team?>
                    </td>
                    <td><?=$res->goals_home?></td>
                    <td><?=$res->goals_away?></td>
                    <td>
                        <img src=<?="/public/images/logos/$res->away_teamid.png"?>>
                        <br><?=$res->away_team?>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
        <?php endforeach?>
    </section>
</article>
<?php
$k++;
endfor?>
<script>
let nav = document.querySelectorAll('.results-nav li')
nav[0].style.fontWeight = 'bold'
document.querySelector('#res2006').style.display = 'block'

for (let i = 0; i < nav.length; i++) {
    nav[i].addEventListener('mouseup', navigation)
}

function navigation() {
    for (n of nav) {
        n.style.fontWeight = 'normal'
    }

    let id = this.textContent
    this.style.fontWeight = 'bold'
    let results = document.querySelectorAll('section')

    for (let i = 0; i < results.length; i++) {
        results[i].style.display = 'none'
    }

    document.querySelector('#res' + id).style.display = 'block'
    document.querySelector('#res' + id).style.width = '340px'
    document.querySelector('#res' + id).style.margin = 'auto'
}
</script>