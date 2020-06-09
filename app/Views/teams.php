<h3>Liga Budućih Šampiona 2019/2020</h3>
<article class="teams">
    <?php foreach ($teams as $team): ?>
    <p class="teams__list">
        <a href=<?="/ekipa/$team->id"?>>
            <img class="club-logo__medium" src="/public/images/logos/<?=$team->id?>.png" alt="grb">
            <?="$team->team_name $team->team_city"?>
        </a>
    </p>
    <?php endforeach?>
</article>