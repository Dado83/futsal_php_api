<p>Dashboard:</p>
<!-- <div class="chartContainer">
    <div><canvas id="visitorPercentage"></canvas></div>
    <div><canvas id="visitorPie"></canvas></div>
    <div><canvas id="visitorTimeline"></canvas></div>
</div> -->
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
                    <th class="hidden-metrics">return vis</th>
                    <th class="hidden-metrics">ip</th>
                    <th>device</th>
                    <th class="hidden-metrics">browser</th>
                    <th class="hidden-metrics">browser ver</th>
                    <th class="hidden-metrics">mobile</th>
                    <th class="hidden-metrics">platform</th>
                    <th class="hidden-metrics">referral</th>
                    <th class="hidden-metrics">agent</th>
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
                    <td class="hidden-metrics"><?=$vis[$k][$i]->returnVisitor?></td>
                    <td class="hidden-metrics"><?=$vis[$k][$i]->ip?></td>
                    <td><?=$vis[$k][$i]->device?></td>
                    <td class="hidden-metrics"><?=$vis[$k][$i]->browser?></td>
                    <td class="hidden-metrics"><?=$vis[$k][$i]->browserVersion?></td>
                    <td class="hidden-metrics" vis[$k][$i]->mobile?></td>
                    <td class="hidden-metrics"><?=$vis[$k][$i]->platform?></td>
                    <td class="hidden-metrics"><?=$vis[$k][$i]->referral?></td>
                    <td class="hidden-metrics"><?=$vis[$k][$i]->agent?></td>
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
<script>
let columns = document.querySelectorAll('.hidden-metrics')
if (window.innerWidth < 900) {
    for (col of columns) {
        col.style.display = 'none'
    }
}
</script>