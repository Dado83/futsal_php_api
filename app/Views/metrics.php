<p>Dashboard:</p>
<div class="chartContainer">
    <div><canvas id="visitorPercentage"></canvas></div>
    <div><canvas id="visitorPie"></canvas></div>
    <div><canvas id="visitorTimeline"></canvas></div>
</div>
<p>Requests za <?=date('Y', time())?>. godinu</p>
<div>
    <?php
$keys = array_keys($vis);
foreach ($keys as $k):
    $count = count($vis[$k])?>
    <details>
        <summary> <?=$k?> (<?=$count?>)</summary>
        <table class="visitorTable">
            <thead>
                <tr>
                    <th>role</th>
                    <th>return vis</th>
                    <th>ip</th>
                    <th>device</th>
                    <th>browser</th>
                    <th>browser ver</th>
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
                <?php
    for ($i = 0; $i < count($vis[$k]); $i++):
    ?>
                <tr>
                    <td><?=$vis[$k][$i]->role?></td>
                    <td><?=$vis[$k][$i]->returnVisitor?></td>
                    <td><?=$vis[$k][$i]->ip?></td>
                    <td><?=$vis[$k][$i]->device?></td>
                    <td><?=$vis[$k][$i]->browser?></td>
                    <td><?=$vis[$k][$i]->browserVersion?></td>
                    <td><?=$vis[$k][$i]->mobile?></td>
                    <td><?=$vis[$k][$i]->platform?></td>
                    <td><?=$vis[$k][$i]->referral?></td>
                    <td><?=$vis[$k][$i]->agent?></td>
                    <td><?=$vis[$k][$i]->page?></td>
                    <td><?=$vis[$k][$i]->date?></td>
                    <td><?=$vis[$k][$i]->time?></td>
                </tr>
                <?php endfor?>
            </tbody>
        </table>
    </details>
    <?php endforeach?>
</div>