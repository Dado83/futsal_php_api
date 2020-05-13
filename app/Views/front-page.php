<article class="front-page">
    <?php foreach ($teams as $team): ?>
    <div>
        <img src="/public/images/logos/<?=$team->id?>.png" alt="grb">
        <p><?=$team->team_name?><br><?=$team->team_city?></p>
    </div>
    <?php endforeach?>
</article>
<?php if (false): ?>
<article>
    <h1>iduce kolo???</h1>
    <section>

    </section>
</article>
<?php endif?>