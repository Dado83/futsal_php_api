<article>
    <nav>
        <ul class="nav-tab">
            <li id="table7">2007</li>
            <li id="table8">2008</li>
            <li id="table9">2009</li>
            <li id="table10">2010</li>
            <li id="table11">2011</li>
        </ul>
    </nav>
    <?php
$tables = [2007 => $table7, $table8, $table9, $table10, $table11];
foreach ($tables as $k => $table): ?>
    <table class="standings hidden table--odd-row__dark" id=<?="tab$k"?>>
        <thead class="background-row">
            <tr class="table-th">
                <th colspan="2"><?=$k?>. god</th>
                <th>ut</th>
                <th>pob</th>
                <th>ner</th>
                <th>izg</th>
                <th class="goals">gol</th>
                <th>+/-</th>
                <th>bod</th>
            </tr>
        </thead>
        <tbody>
            <?php
foreach ($table as $i => $row): ?>
            <tr class="table-border">
                <td><?=++$i?></td>
                <td class="standings-club__width">
                    <a href=<?="/ekipa/$row->id"?>>
                        <img class="club-logo__small" src=<?="/public/images/logos/$row->id.png?v=0.1"?> alt="grb">
                        <?=$row->team?>
                    </a>
                </td>
                <td class="text-align__center standings-cell__width"><?=$row->games_played?></td>
                <td class="text-align__center standings-cell__width"><?=$row->games_won?></td>
                <td class="text-align__center standings-cell__width"><?=$row->games_drew?></td>
                <td class="text-align__center standings-cell__width"><?=$row->games_lost?></td>
                <td class="goals standings-cell__width"><?=$row->goals?></td>
                <td class="text-align__center standings-cell__width">
                    <?php if ($row->g_diff > 0): ?>
                    <?="+$row->g_diff"?>
                    <?php else: ?>
                    <?=$row->g_diff?>
                    <?php endif?>
                </td>
                <td class="text-align__center text-bold standings-cell__width"><?=$row->points?></td>
            </tr>
            <?php endforeach?>
        </tbody>
        <tfoot class="background-row">
            <tr class="table-th">
                <th colspan="9">Fair Play Liga Budućih Šampiona</th>
            </tr>
        </tfoot>
    </table>
</article>
<?php
endforeach?>
<script>
let nav = document.querySelectorAll('.nav-tab li')
nav[0].className = 'nav-select'
document.querySelector('#tab2007').style.display = 'block'

for (let i = 0; i < nav.length; i++) {
    nav[i].addEventListener('mouseup', navigation)
}

function navigation() {
    for (n of nav) {
        n.classList.remove('nav-select')
    }
    this.className = 'nav-select'
    let id = this.textContent
    let tables = document.querySelectorAll('.standings')
    for (let i = 0; i < tables.length; i++) {
        tables[i].style.display = 'none'
    }
    document.querySelector('#tab' + id).style.display = 'block'
}
</script>