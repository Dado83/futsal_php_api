<div id="adminCards">
    <div class="adminCards"><a href="/Home/newsLetter"><img class="club-logo__fixed" src="/public/images/icons/newsletter.svg" style="width: 100%" />Bilten</a>
    </div>
    <div class="adminCards"><a href="/Home/metrics"><img class="club-logo__fixed" src="/public/images/icons/charts.svg" style="width: 100%" />Metrics</a>
    </div>
    <div class="adminCards"><a href="/Home/passwordUpdate"><img class="club-logo__fixed" src="/public/images/icons/pass.svg" style="width: 100%" />Password</a>
    </div>
</div>
<table class="admin">
    <p>Odigrane utakmice:</p>
    <tr>
        <th>kolo</th>
        <th>domacin</th>
        <th>gost</th>
        <th>termin</th>
    </tr>
    <?php foreach ($results as $row): ?>
    <tr class="row--highlight">
        <td class="oddResRow"><?=$row->m_day?></td>
        <td><?=$row->home_name?></td>
        <td><?=$row->away_name?></td>
        <td>
            <a class='button' href='/Home/deleteGame/<?=$row->id?>' onclick="return confirm('Brišem zadnje kolo?')">Briši</a>
        </td>
    </tr>
    <?php endforeach?>
</table>
<table class="admin">
    <p>Raspored:</p>
    <tr>
        <th>kolo</th>
        <th>domacin</th>
        <th>gost</th>
        <th>termin</th>
    </tr>
    <?php foreach ($matchPairs as $row): ?>
    <tr class="row--highlight">
        <td class="oddResRow"><?=$row->m_day?></td>
        <td><?=$row->home_team?></td>
        <td><?=$row->away_team?></td>
        <td><a class='button' href='/Home/formIn/<?=$row->id?>'>Unos</a></td>
    </tr>
    <?php endforeach?>
</table>
<script>
let oddRow = document.querySelectorAll('.oddResRow')
for (el of oddRow) {
    if (el.innerText % 2 != 0) {
        el.style.background = 'gray'
    }
}
</script>