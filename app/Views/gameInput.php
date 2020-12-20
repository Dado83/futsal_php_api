<div class="game-input">
    <form action="/Home/inputGame" method="post">
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
                <?php if ($game->home_team == 4 or $game->away_team == 4): ?>
                <tr class="game-input__row">
                    <td>
                        2011
                    </td>
                    <td>
                        <input type="number" name="home11" value="-1">
                    </td>
                    <td>
                        <input type="number" name="away11" value="-1">
                    </td>
                </tr>
                <?php else: ?>
                <tr class="game-input__row">
                    <td class="game-input__sel">
                        2011
                    </td>
                    <td>
                        <input type="number" name="home11" value="0">
                    </td>
                    <td>
                        <input type="number" name="away11" value="0">
                    </td>
                </tr>
                <?php endif?>
                <?php if ($game->home_team == 11 or $game->away_team == 11): ?>
                <tr class="game-input__row">
                    <td class="game-input__sel">
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
                <tr class="game-input__row">
                    <td class="game-input__sel">
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
                <tr class="game-input__row">
                    <td class="game-input__sel">
                        2009
                    </td>
                    <td>
                        <input type="number" name="home9" value="0">
                    </td>
                    <td>
                        <input type="number" name="away9" value="0">
                    </td>
                </tr>
                <tr class="game-input__row">
                    <td class="game-input__sel">
                        2008
                    </td>
                    <td>
                        <input type="number" name="home8" value="0">
                    </td>
                    <td>
                        <input type="number" name="away8" value="0">
                    </td>
                </tr>
                <?php if (($game->home_team == 5 or $game->away_team == 5)
    or ($game->home_team == 8 or $game->away_team == 8)
    or ($game->home_team == 9 or $game->away_team == 9)
    or ($game->home_team == 10 or $game->away_team == 10)): ?>
                <tr class="game-input__row">
                    <td class="game-input__sel">
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
                <tr class="game-input__row">
                    <td class="game-input__sel">
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
                    <td colspan="3">
                        <input type="submit" value="Snimi u bazu">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>