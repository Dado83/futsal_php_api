<div id="mForm" class="modalForm">
    <form action="/liga/passwordChange" method="post">
        <fieldset>
            <label for="user">Korisnik</label>
            <input type="text" name="user"><br>
            <label for="oldPassword">Šifra</label>
            <input type="password" name="password"><br>
            <label for="newPassword">Nova šifra</label>
            <input type="password" name="newPassword"><br>
            <input type="submit" value="Promijeni šifru">
        </fieldset>
    </form>
</div>
<div id="adminCards">
    <div class="adminCards"><a href="/Home/newsLetter"><img class="club-logo__fixed" src="/public/images/icons/newsletter.svg" style="width: 100%" />Bilten</a>
    </div>
    <div class="adminCards"><a href="/Home/metrics"><img class="club-logo__fixed" src="/public/images/icons/charts.svg" style="width: 100%" />Metrics</a>
    </div>
    <div id="passwordChange" class="adminCards"><img class="club-logo__fixed" src="/public/images/icons/pass.svg" style="width: 100%" />Password
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
    <tr>
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
    <tr>
        <td class="oddResRow"><?=$row->m_day?></td>
        <td><?=$row->home_team?></td>
        <td><?=$row->away_team?></td>
        <td><a class='button' href='/Home/formIn/<?=$row->id?>'>Unos</a></td>
    </tr>
    <?php endforeach?>
</table>
<script>
document.querySelector('#passwordChange').addEventListener('mouseup', passwordChange)

let modalForm = document.querySelector('#mForm')

function passwordChange() {
    modalForm.style.display = 'block'
}

window.addEventListener("click", function(e) {
    if (e.target.id == modalForm.id) {
        modalForm.style.display = 'none'
    }
})

let oddRow = document.querySelectorAll('.oddResRow')
for (el of oddRow) {
    if (el.innerText % 2 != 0) {
        el.style.background = 'gray'
    }
}
</script>