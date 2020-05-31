<form action="/Home/setUser" method="post">
    <fieldset>
        <legend>Prijava</legend>
        <table>
            <tr>
                <td><label for="userRole">Role</label></td>
                <td><input type="text" name="userRole"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>
            <tr>
                <td><label for="userPassword">Password</label></td>
                <td><input type="password" name="userPassword"></td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </fieldset>
</form>
<?php
echo '<br>' . session()->info;
?>