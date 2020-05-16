<article class="standings">
    <nav>
        <ul>
            <li id="table6">2006</li>
            <li id="table7">2007</li>
            <li id="table8">2008</li>
            <li id="table9">2009</li>
            <li id="table10">2010</li>
        </ul>
    </nav>
    <?php
$tables = [2006 => $table6, $table7, $table8, $table9, $table10];
foreach ($tables as $k => $table): ?>
    <table class="standings-table hidden" id=<?="tab$k"?>>
        <thead>
            <tr>
                <th colspan="2"><?=$k?>. god</th>
                <th>ut</th>
                <th>pob</th>
                <th>ner</th>
                <th>por</th>
                <th class="hidden">gol</th>
                <th>+/-</th>
                <th>bod</th>
            </tr>
        </thead>
        <tbody>
            <?php
foreach ($table as $i => $row): ?>
            <tr>
                <td><?=++$i?></td>
                <td><img src=<?="/public/images/logos/$row->id.png"?> alt="grb"><?=$row->team?></td>
                <td><?=$row->games_played?></td>
                <td><?=$row->games_won?></td>
                <td><?=$row->games_drew?></td>
                <td><?=$row->games_lost?></td>
                <td class="hidden"><?=$row->goals?></td>
                <td>
                    <?php if ($row->g_diff > 0): ?>
                    <?="+$row->g_diff"?>
                    <?php else: ?>
                    <?=$row->g_diff?>
                    <?php endif?>
                </td>
                <td><?=$row->points?></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</article>
<?php
endforeach?>
<script>
let nav = document.querySelectorAll('.standings li')
//nav[0].style.background = 'var(--color1)'
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
    let tables = document.querySelectorAll('.standings-table')
    for (let i = 0; i < tables.length; i++) {
        tables[i].style.display = 'none'
    }
    document.querySelector('#tab' + id).style.display = 'block'
}
</script>