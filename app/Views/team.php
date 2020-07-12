<article class="team container">
    <section>
        <img class="club-logo__big" src="/public/images/logos-big/<?=$team->id?>.png" alt="grb-klub">
        <p><?=$team->team_name?></p>
        <p><?=$team->team_city?></p>
        <p><?=$team->kit_color?></p>
        <p><?=$team->venue?></p>
        <p><?=$team->game_time?></p>
    </section>
    <section>
        <?php foreach ($results as $result): ?>
        <table class="team-results">
            <thead class="background-row">
                <tr>
                    <td><?=$result->m_day?>. kolo</td>
                    <td>2006</td>
                    <td>2007</td>
                    <td>2008</td>
                    <td>2009</td>
                    <td>2010</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="standings-club__width text-align__left">
                        <a href=<?="/ekipa/$result->home_id"?>>
                            <img class="club-logo__fixed" src=<?="/public/images/logos/$result->home_id.png"?>>
                            <?=$result->home_name?>
                        </a>
                    </td>
                    <td class="text-align__right text-bold"><?=$result->goals_home6?></td>
                    <td class="text-align__right text-bold"><?=($result->goals_home7 != -1) ?: ''?></td>
                    <td class="text-align__right text-bold"><?=$result->goals_home8?></td>
                    <td class="text-align__right text-bold"><?=$result->goals_home9?></td>
                    <td class="text-align__right text-bold"><?=($result->goals_home10 != -1) ?: ''?></td>
                </tr>
                <tr>
                    <td class="standings-club__width text-align__left">
                        <a href=<?="/ekipa/$result->away_id"?>>
                            <img class="club-logo__fixed" src=<?="/public/images/logos/$result->away_id.png"?>>
                            <?=$result->away_name?>
                        </a>
                    </td>
                    <td class="text-align__right text-bold"><?=$result->goals_away6?></td>
                    <td class="text-align__right text-bold"><?=($result->goals_away7 != -1) ?: ''?></td>
                    <td class="text-align__right text-bold"><?=$result->goals_away8?></td>
                    <td class="text-align__right text-bold"><?=$result->goals_away9?></td>
                    <td class="text-align__right text-bold"><?=($result->goals_away10 != -1) ?: ''?></td>
                </tr>
            </tbody>
        </table>
        <?php endforeach?>
    </section>
    <section>

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