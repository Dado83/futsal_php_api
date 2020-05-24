<div class="form">
    <form action="/home/unosKola" method="POST">
        <fieldset>
            <legend>Unos rezultata <?=$game->m_day?>. kola</legend>
            <table>
                <tr>
                    <th>
                        godište
                        <input type="hidden" name="mday" value="<?=$game->m_day?>">
                        <input type="hidden" name="id" value="<?=$game->id?>">
                    </th>
                    <th>
                        domaćin
                    </th>
                    <th>
                        gost
                    </th>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td>
                        <?=$game->home?>
                        <input type="hidden" name="homeID" value="<?=$game->home_team?>">
                        <input type="hidden" name="home" value="<?=$game->home?>">
                    </td>
                    <td>
                        <?=$game->away?>
                        <input type="hidden" name="awayID" value="<?=$game->away_team?>">
                        <input type="hidden" name="away" value="<?=$game->away?>">
                    </td>
                </tr>
                <?php if (($game->home_team == 1 or $game->away_team == 1) or ($game->home_team == 7 or $game->away_team == 7)): ?>
                <tr>
                    <td>
                        2010
                    </td>
                    <td>
                        <input type="number" name="home10" value="-1">
                    </td>
                    <td>
                        <input type="number" name="away10" value="-1">
                    </td>
                </tr>
                <?php else: ?>
                <tr>
                    <td>
                        2010
                    </td>
                    <td>
                        <input type="number" name="home10" value="0">
                    </td>
                    <td>
                        <input type="number" name="away10" value="0">
                    </td>
                </tr>
                <?php endif?>
                <tr>
                    <td>
                        2009
                    </td>
                    <td>
                        <input type="number" name="home9" value="0">
                    </td>
                    <td>
                        <input type="number" name="away9" value="0">
                    </td>
                </tr>
                <tr>
                    <td>
                        2008
                    </td>
                    <td>
                        <input type="number" name="home8" value="0">
                    </td>
                    <td>
                        <input type="number" name="away8" value="0">
                    </td>
                </tr>
                <?php if ($game->home_team == 8 or $game->away_team == 8): ?>
                <tr>
                    <td>
                        2007
                    </td>
                    <td>
                        <input type="number" name="home7" value="-1">
                    </td>
                    <td>
                        <input type="number" name="away7" value="-1">
                    </td>
                </tr>
                <?php else: ?>
                <tr>
                    <td>
                        2007
                    </td>
                    <td>
                        <input type="number" name="home7" value="0">
                    </td>
                    <td>
                        <input type="number" name="away7" value="0">
                    </td>
                </tr>
                <?php endif?>
                <tr>
                    <td>
                        2006
                    </td>
                    <td>
                        <input type="number" name="home6" value="0">
                    </td>
                    <td>
                        <input type="number" name="away6" value="0">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="Snimi u bazu">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>