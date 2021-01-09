<form action="/Home/passwordChange" method="post">
    <fieldset>
        <legend>Promjena šifre</legend>
        <table>
            <tr>
                <td><label for="newPassword">New password</label></td>
                <td><input type="password" name="newPassword"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>
            <tr>
                <td><label for="repeatPassword">Repeat...</label></td>
                <td><input type="password" name="repeatPassword"></td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </fieldset>
</form>
<?php echo '<br>' . session()->info ?>