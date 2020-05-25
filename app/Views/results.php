<article class="results">
    <nav>
        <ul>
            <li id="results6">2006</li>
            <li id="results7">2007</li>
            <li id="results8">2008</li>
            <li id="results9">2009</li>
            <li id="results10">2010</li>
        </ul>
    </nav>
    <section class="results-section hidden" id="res2006">
        <?php foreach ($results as $result): ?>
        <table>
            <thead>
                <tr>
                    <th><?=$result[0]->m_day?>. kolo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $r): ?>
                <tr>
                    <td><?=$r->home_name?></td>
                    <td><img src=<?="/public/images/logos/$r->home_id.png"?> alt="grb"></td>
                    <td><?=$r->goals_home6?></td>
                    <td>:</td>
                    <td><?=$r->goals_away6?></td>
                    <td><img src=<?="/public/images/logos/$r->away_id.png"?> alt="grb"></td>
                    <td><?=$r->away_name?></td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
        <?php endforeach?>
    </section>
    <section class="results-section hidden" id="res2007">
        <?php foreach ($results as $result): ?>
        <table>
            <thead>
                <tr>
                    <th><?=$result[0]->m_day?>. kolo</th>
                </tr>
            </thead>
            <tbody>
                <?php
foreach ($result as $r):
    if ($r->goals_home7 != -1): ?>
                <tr>
                    <td><?=$r->home_name?></td>
                    <td><img src=<?="/public/images/logos/$r->home_id.png"?> alt="grb"></td>
                    <td><?=$r->goals_home7?></td>
                    <td>:</td>
                    <td><?=$r->goals_away7?></td>
                    <td><img src=<?="/public/images/logos/$r->away_id.png"?> alt="grb"></td>
                    <td><?=$r->away_name?></td>
                </tr>
                <?php
endif;
endforeach?>
            </tbody>
        </table>
        <?php endforeach?>
    </section>
    <section class="results-section hidden" id="res2008">
        <?php foreach ($results as $result): ?>
        <table>
            <thead>
                <tr>
                    <th><?=$result[0]->m_day?>. kolo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $r): ?>
                <tr>
                    <td><?=$r->home_name?></td>
                    <td><img src=<?="/public/images/logos/$r->home_id.png"?> alt="grb"></td>
                    <td><?=$r->goals_home8?></td>
                    <td>:</td>
                    <td><?=$r->goals_away8?></td>
                    <td><img src=<?="/public/images/logos/$r->away_id.png"?> alt="grb"></td>
                    <td><?=$r->away_name?></td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
        <?php endforeach?>
    </section>
    <section class="results-section hidden" id="res2009">
        <?php foreach ($results as $result): ?>
        <table>
            <thead>
                <tr>
                    <th><?=$result[0]->m_day?>. kolo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $r): ?>
                <tr>
                    <td><?=$r->home_name?></td>
                    <td><img src=<?="/public/images/logos/$r->home_id.png"?> alt="grb"></td>
                    <td><?=$r->goals_home9?></td>
                    <td>:</td>
                    <td><?=$r->goals_away9?></td>
                    <td><img src=<?="/public/images/logos/$r->away_id.png"?> alt="grb"></td>
                    <td><?=$r->away_name?></td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
        <?php endforeach?>
    </section>
    <section class="results-section hidden" id="res2010">
        <?php foreach ($results as $result): ?>
        <table>
            <thead>
                <tr>
                    <th><?=$result[0]->m_day?>. kolo</th>
                </tr>
            </thead>
            <tbody>
                <?php
foreach ($result as $r):
    if ($r->goals_home10 != -1): ?>
                <tr>
                    <td><?=$r->home_name?></td>
                    <td><img src=<?="/public/images/logos/$r->home_id.png"?> alt="grb"></td>
                    <td><?=$r->goals_home10?></td>
                    <td>:</td>
                    <td><?=$r->goals_away10?></td>
                    <td><img src=<?="/public/images/logos/$r->away_id.png"?> alt="grb"></td>
                    <td><?=$r->away_name?></td>
                </tr>
                <?php
endif;
endforeach?>
            </tbody>
        </table>
        <?php endforeach?>

        <script>
        let nav = document.querySelectorAll('.results li')
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
            let results = document.querySelectorAll('section')

            for (let i = 0; i < results.length; i++) {
                results[i].style.display = 'none'
            }

            document.querySelector('#res' + id).style.display = 'block'
            document.querySelector('#res' + id).style.width = '340px'
            document.querySelector('#res' + id).style.margin = 'auto'
        }
        </script>