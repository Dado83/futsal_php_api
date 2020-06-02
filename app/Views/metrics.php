<p>Dashboard:</p>
<div class="chartContainer">
    <div><canvas id="visitorPercentage"></canvas></div>
    <div><canvas id="visitorPie"></canvas></div>
    <div><canvas id="visitorTimeline"></canvas></div>
</div>
<p>Requests za <?=date('Y', time())?>. godinu</p>
<div>
    <details>
        <summary> posjete</summary>
        <table class="visitorTable">
            <thead>
                <tr>
                    <th>role</th>
                    <th>revisit</th>
                    <th>ip</th>
                    <th>device</th>
                    <th>browser</th>
                    <th>br ver</th>
                    <th>mobile</th>
                    <th>platform</th>
                    <th>referral</th>
                    <th>agent</th>
                    <th>page</th>
                    <th>date</th>
                    <th>time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($visitors as $v): ?>
                <tr>
                    <td><?=$v->role?></td>
                    <td><?=$v->return_visitor?></td>
                    <td><?=$v->ip?></td>
                    <td><?=$v->device?></td>
                    <td><?=$v->browser?></td>
                    <td><?=$v->browser_ver?></td>
                    <td><?=$v->mobile?></td>
                    <td><?=$v->platform?></td>
                    <td><?=$v->referral?></td>
                    <td><?=$v->agent?></td>
                    <td><?=$v->page?></td>
                    <td><?=$v->date?></td>
                    <td><?=$v->time?></td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </details>
</div>