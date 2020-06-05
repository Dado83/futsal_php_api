<h3>Liga Budućih Šampiona 2019/2020</h3>
<article class="teams">
    <?php foreach ($teams as $team): ?>
    <a href=<?="/ekipa/$team->id"?>>
        <div>
            <img src="/public/images/logos/<?=$team->id?>.png" alt="grb">
            <p>
                <?=$team->team_name?>
                <br>
                <?=$team->team_city?>
            </p>
        </div>
    </a>
    <?php endforeach?>
</article>
<?php if (false): ?>
<article>
    <h1>iduce kolo???</h1>
    <section>

    </section>
</article>
<?php endif?>