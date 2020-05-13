<nav class="results-nav">
    <ul class="nav-year">
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
    <p><?=$k?></p>
    <?php foreach ($results[$j] as $key => $result): ?>
    <table class="results">
        <thead>
            <th><?="$key. kolo"?></th>
        </thead>
        <tbody>
            <?php foreach ($result as $res): ?>
            <tr>
                <td><?=$res->home_team?></td>
                <td><?=$res->goals_home?></td>
                <td><?=$res->away_team?></td>
                <td><?=$res->goals_away?></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
    <?php endforeach?>
</section>
<?php
$k++;
endfor?>
<script>
let nav = document.querySelectorAll('.results-nav li')
document.querySelector('#res2006').style.display = 'block'
console.log(nav)
for (let i = 0; i < nav.length; i++) {
    nav[i].addEventListener('mouseup', navigation)
}

function navigation() {
    let id = this.textContent
    let results = document.querySelectorAll('section')
    for (let i = 0; i < results.length; i++) {
        results[i].style.display = 'none'
    }

    document.querySelector('#res' + id).style.display = 'block'
}
</script>