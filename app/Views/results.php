<article class="results">
    <nav>
        <ul class="nav-tab">
            <li id="results7">2007</li>
            <li id="results8">2008</li>
            <li id="results9">2009</li>
            <li id="results10">2010</li>
            <li id="results11">2011</li>
        </ul>
    </nav>
    <?php if (isset($results)): ?>
    <section class="results-section hidden" id="res2007">
        <?php foreach ($results as $key => $result): ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-align__left" colspan="4"><?=$result[0]->m_day?>. kolo</th>
                    <th class="text-align__right"><?=$dates[$key][0]->game_date?></th>
                </tr>
            </thead>
            <tbody>
                <?php
foreach ($result as $r):
    if ($r->goals_home7 != -1): ?>
                <tr>
                    <td class="text-align__right standings-club__width">
                        <a href=<?="/ekipa/$r->home_id"?>>
                            <?=$r->home_name?><img class="club-logo__small" src=<?="/public/images/logos/$r->home_id.png?v=0.1"?> alt="grb">
                        </a>
                    </td>
                    <td class="text-align__center"><?=$r->goals_home7?></td>
                    <td class="text-align__center">-</td>
                    <td class="text-align__center"><?=$r->goals_away7?></td>
                    <td class="standings-club__width text-align__left">
                        <a href=<?="/ekipa/$r->away_id"?>>
                            <img class="club-logo__small" src=<?="/public/images/logos/$r->away_id.png?v=0.1"?> alt="grb"><?=$r->away_name?>
                        </a>
                    </td>
                </tr>
                <?php
endif;
endforeach?>
            </tbody>
        </table>
        <?php endforeach?>
    </section>
    <section class="results-section hidden" id="res2008">
        <?php foreach ($results as $key => $result): ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-align__left" colspan="4"><?=$result[0]->m_day?>. kolo</th>
                    <th class="text-align__right"><?=$dates[$key][0]->game_date?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $r): ?>
                <tr>
                    <td class="text-align__right standings-club__width">
                        <a href=<?="/ekipa/$r->home_id"?>>
                            <?=$r->home_name?><img class="club-logo__small" src=<?="/public/images/logos/$r->home_id.png?v=0.1"?> alt="grb">
                        </a>
                    </td>
                    <td class="text-align__center"><?=$r->goals_home8?></td>
                    <td class="text-align__center">-</td>
                    <td class="text-align__center"><?=$r->goals_away8?></td>
                    <td class="standings-club__width text-align__left">
                        <a href=<?="/ekipa/$r->away_id"?>>
                            <img class="club-logo__small" src=<?="/public/images/logos/$r->away_id.png?v=0.1"?> alt="grb"><?=$r->away_name?>
                        </a>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
        <?php endforeach?>
    </section>
    <section class="results-section hidden" id="res2009">
        <?php foreach ($results as $key => $result): ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-align__left" colspan="4"><?=$result[0]->m_day?>. kolo</th>
                    <th class="text-align__right"><?=$dates[$key][0]->game_date?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $r): ?>
                <tr>
                    <td class="text-align__right standings-club__width">
                        <a href=<?="/ekipa/$r->home_id"?>>
                            <?=$r->home_name?><img class="club-logo__small" src=<?="/public/images/logos/$r->home_id.png?v=0.1"?> alt="grb">
                        </a>
                    </td>
                    <td class="text-align__center"><?=$r->goals_home9?></td>
                    <td class="text-align__center">-</td>
                    <td class="text-align__center"><?=$r->goals_away9?></td>
                    <td class="standings-club__width text-align__left">
                        <a href=<?="/ekipa/$r->away_id"?>>
                            <img class="club-logo__small" src=<?="/public/images/logos/$r->away_id.png?v=0.1"?> alt="grb"><?=$r->away_name?>
                        </a>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
        <?php endforeach?>
    </section>
    <section class="results-section hidden" id="res2010">
        <?php foreach ($results as $key => $result): ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-align__left" colspan="4"><?=$result[0]->m_day?>. kolo</th>
                    <th class="text-align__right"><?=$dates[$key][0]->game_date?></th>
                </tr>
            </thead>
            <tbody>
                <?php
foreach ($result as $r):
    if ($r->goals_home10 != -1): ?>
                <tr>
                    <td class="text-align__right standings-club__width">
                        <a href=<?="/ekipa/$r->home_id"?>>
                            <?=$r->home_name?><img class="club-logo__small" src=<?="/public/images/logos/$r->home_id.png?v=0.1"?> alt="grb">
                        </a>
                    </td>
                    <td class="text-align__center"><?=$r->goals_home10?></td>
                    <td class="text-align__center">-</td>
                    <td class="text-align__center"><?=$r->goals_away10?></td>
                    <td class="standings-club__width text-align__left">
                        <a href=<?="/ekipa/$r->away_id"?>>
                            <img class="club-logo__small" src=<?="/public/images/logos/$r->away_id.png?v=0.1"?> alt="grb"><?=$r->away_name?>
                        </a>
                    </td>
                </tr>
                <?php endif;
endforeach?>
            </tbody>
        </table>
        <?php endforeach?>
    </section>
    <section class="results-section hidden" id="res2011">
        <?php foreach ($results as $key => $result): ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-align__left" colspan="4"><?=$result[0]->m_day?>. kolo</th>
                    <th class="text-align__right"><?=$dates[$key][0]->game_date?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $r):
    if ($r->goals_home11 != -1): ?>
                <tr>
                    <td class="text-align__right standings-club__width">
                        <a href=<?="/ekipa/$r->home_id"?>>
                            <?=$r->home_name?><img class="club-logo__small" src=<?="/public/images/logos/$r->home_id.png?v=0.1"?> alt="grb">
                        </a>
                    </td>
                    <td class="text-align__center"><?=$r->goals_home11?></td>
                    <td class="text-align__center">-</td>
                    <td class="text-align__center"><?=$r->goals_away11?></td>
                    <td class="standings-club__width text-align__left">
                        <a href=<?="/ekipa/$r->away_id"?>>
                            <img class="club-logo__small" src=<?="/public/images/logos/$r->away_id.png?v=0.1"?> alt="grb"><?=$r->away_name?>
                        </a>
                    </td>
                </tr>

                <?php endif;
endforeach?>
            </tbody>
        </table>
        <?php endforeach?>
    </section>
    <?php
else:
    echo 'Nema odigranih utakmica';
endif?>
    <script>
    let nav = document.querySelectorAll('.results li')
    nav[0].className = 'nav-select'
    document.querySelector('#res2007').style.display = 'block'

    for (let i = 0; i < nav.length; i++) {
        nav[i].addEventListener('mouseup', navigation)
    }

    function navigation() {
        for (n of nav) {
            n.classList.remove('nav-select')
        }

        let id = this.textContent
        this.className = 'nav-select'
        let results = document.querySelectorAll('section')

        for (let i = 0; i < results.length; i++) {
            results[i].style.display = 'none'
        }

        document.querySelector('#res' + id).style.display = 'block'
    }
    </script>