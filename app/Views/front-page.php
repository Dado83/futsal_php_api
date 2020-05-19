<p>stranica u fazi nadogradnje &#9917 &#127942</p>

<article class="front-page">
    <?php foreach ($teams as $team): ?>
    <div>
        <a href=<?="ekipa/" . $team->id?>>
            <img src="/public/images/logos/<?=$team->id?>.png" alt="grb">
        </a>
        <p>
            <a href=<?="ekipa/" . $team->id?>>
                <?=$team->team_name?>
                <br>
                <?=$team->team_city?>
            </a>
        </p>
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