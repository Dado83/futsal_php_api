<nav class="finals">
    <ul class="nav-tab">
        <li id="finals6">2006</li>
        <li id="finals7">2007</li>
        <li id="finals8">2008</li>
        <li id="finals9">2009</li>
        <li id="finals10">2010</li>
    </ul>
</nav>
<?php $finals = [2006 => $finals6, $finals7, $finals8, $finals9, $finals10];
foreach ($finals as $k => $final): ?>
<section>
    <table class="table hidden" id=<?="tab$k"?>>
        <tr class="semis">
            <td class="opponent opponent-border">
                <img class="club-logo__small" src=<?="/public/images/logos/{$final[1]->id}.png"?> alt="grb">
                <?=$final[1]->team?>
            </td>
            <td class="score"></td>
            <td class="bottom-border"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="semis">
            <td class="opponent">
                <img class="club-logo__small" src=<?="/public/images/logos/{$final[4]->id}.png"?> alt="grb">
                <?=$final[4]->team?>
            </td>
            <td class="score"></td>
            <td class="vertical-border"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="spacer">
            <td></td>
            <td></td>
            <td class="vertical-border"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="finals">
            <td></td>
            <td></td>
            <td class="vertical-border"></td>
            <td class="bottom-border"></td>
            <td class="opponent opponent-border">?</td>
            <td class="score"></td>
            <td></td>
        </tr>
        <tr class="finals">
            <td></td>
            <td></td>
            <td class="vertical-border"></td>
            <td></td>
            <td class="opponent">?</td>
            <td class="score"></td>
            <td></td>
        </tr>
        <tr class="spacer">
            <td></td>
            <td></td>
            <td class="vertical-border"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="semis">
            <td class="opponent opponent-border">
                <img class="club-logo__small" src=<?="/public/images/logos/{$final[2]->id}.png"?> alt="grb">
                <?=$final[2]->team?>
            </td>
            <td class="score"></td>
            <td class="bottom-border vertical-border"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="semis">
            <td class="opponent">
                <img class="club-logo__small" src=<?="/public/images/logos/{$final[3]->id}.png"?> alt="grb">
                <?=$final[3]->team?>
            </td>
            <td class="score"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="playoff">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="opponent opponent-border">?</td>
            <td class="score"></td>
            <td></td>
        </tr>
        <tr class="playoff">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="opponent">?</td>
            <td class="score"></td>
            <td></td>
        </tr>
    </table>
</section>
<?php endforeach?>
<section>
    <table class="standings">
        <thead class="background-row">
            <tr>
                <th colspan="2">kolektivna tabela</th>
                <th>ut</th>
                <th>pob</th>
                <th>ner</th>
                <th>por</th>
                <th class="goals">+</th>
                <th class="goals">-</th>
                <th>bod</th>
            </tr>
        </thead>
        <tbody>
            <?php
foreach ($combinedTable as $i => $row): ?>
            <tr>
                <td><?=++$i?></td>
                <td class="standings-club__width">
                    <a href=<?="/ekipa/$row->id"?>>
                        <img class="club-logo__small" src=<?="/public/images/logos/$row->id.png"?> alt="grb">
                        <?=$row->team_name?>
                    </a>
                </td>
                <td class="text-align__right"><?=$row->gamesAll?></td>
                <td class="text-align__right"><?=$row->gamesWon?></td>
                <td class="text-align__right"><?=$row->gamesDrew?></td>
                <td class="text-align__right"><?=$row->gamesLost?></td>
                <td class="goals text-align__right"><?=$row->goalsFor?></td>
                <td class="goals text-align__right"><?=$row->goalsAgg?></td>
                <td class="text-align__right text-bold"><?=$row->pointsAll?></td>
            </tr>
            <?php endforeach?>
        </tbody>
        <tfoot class="background-row">
            <tr>
                <th colspan="9">Fair Play Liga Budućih Šampiona</th>
            </tr>
        </tfoot>
    </table>
</section>
<script>
let nav = document.querySelectorAll('.finals li')
nav[0].className = 'nav-select'
document.querySelector('#tab2006').style.display = 'block'

for (let i = 0; i < nav.length; i++) {
    nav[i].addEventListener('mouseup', navigation)
}

function navigation() {
    for (n of nav) {
        n.classList.remove('nav-select')
    }
    this.className = 'nav-select'
    let id = this.textContent
    let tables = document.querySelectorAll('.table')
    for (let i = 0; i < tables.length; i++) {
        tables[i].style.display = 'none'
    }
    document.querySelector('#tab' + id).style.display = 'block'
}
</script>