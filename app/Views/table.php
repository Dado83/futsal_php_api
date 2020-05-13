<nav class="table-nav">
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
<table class="table hidden" id=<?="tab$k"?>>
    <thead>
        <tr>
            <th colspan="2"><?=$k?>. god</th>
            <th>ut</th>
            <th>pob</th>
            <th>ner</th>
            <th>por</th>
            <th>gol</th>
            <th>+/-</th>
            <th>bod</th>
        </tr>
    </thead>
    <tbody>
        <?php
foreach ($table as $i => $row): ?>
        <tr>
            <td><?=++$i?></td>
            <td><?=$row->team?></td>
            <td><?=$row->games_played?></td>
            <td><?=$row->games_won?></td>
            <td><?=$row->games_drew?></td>
            <td><?=$row->games_lost?></td>
            <td><?=$row->goals?></td>
            <td><?=$row->g_diff?></td>
            <td><?=$row->points?></td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>
<?php
endforeach?>
<script>
let nav = document.querySelectorAll('.table-nav li')
document.querySelector('#tab2006').style.display = 'block'
console.log(nav)
for (let i = 0; i < nav.length; i++) {
    nav[i].addEventListener('mouseup', navigation)
}

function navigation() {
    let id = this.textContent
    let tables = document.querySelectorAll('.table')
    for (let i = 0; i < tables.length; i++) {
        tables[i].style.display = 'none'
    }
    document.querySelector('#tab' + id).style.display = 'block'
}
</script>