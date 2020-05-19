<article class="team">
    <div>
        <img src="/public/images/logos-big/<?=$team->id?>.png" alt="grb-klub">
        <p><?=$team->team_name?></p>
        <p><?=$team->team_city?></p>
        <p><?=$team->kit_color?></p>
        <p><?=$team->venue?></p>
        <p><?=$team->game_time?></p>
    </div>
    <section>
        <nav>
            <ul>
                <li id="team-results6">2006</li>
                <li id="team-results7">2007</li>
                <li id="team-results8">2008</li>
                <li id="team-results9">2009</li>
                <li id="team-results10">2010</li>
            </ul>
        </nav>
        <?php
$results = [2006 => $results6, $results7, $results8, $results9, $results10];
foreach ($results as $key => $result):
    if (!$result):
    else: ?>
        <table class="hidden" id=<?="res$key"?>>
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
    </section>
</article>
<script>
let nav = document.querySelectorAll('.team li')
nav[0].className = 'nav-select'
document.querySelector('#res2006').style.display = 'block'

for (let i = 0; i < nav.length; i++) {
    nav[i].addEventListener('mouseup', navigation)
}

function navigation() {
    for (n of nav) {
        n.classList.remove('nav-select')
    }

    let id = this.textContent
    this.className = 'nav-select'
    let results = document.querySelectorAll('table')

    for (let i = 0; i < results.length; i++) {
        results[i].style.display = 'none'
    }

    document.querySelector('#res' + id).style.display = 'block'
    document.querySelector('#res' + id).style.width = '340px'
    document.querySelector('#res' + id).style.margin = 'auto'
}
</script>