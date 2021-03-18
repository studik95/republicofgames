<?php

ECHO<<<END

<form action="backend/user.php" method="post" class="form">
    <legend class="title--form">User</legend>
    <div class="form__field">
        <label for="first_name" class="label"><span class="obligatory">first name</span></label><input name="first_name" type="text" id="first_name" class="field">
    </div>
    <div class="form__field">
        <label for="last_name" class="label"><span class="obligatory">last_name</span></label><input name="last_name" type="text" id="last_name" class="field">
    </div>
    <div class="form__field">
        <label for="email" class="label"><span class="obligatory">email</span></label><input name="email" type="text" id="email" class="field">
    </div>
    <div class="form__field">
        <label for="login" class="label"><span class="obligatory">login</span></label><input name="login" type="text" id="login" class="field">
    </div>
        <div class="form__field">
        <label for="password" class="label"><span class="obligatory">password</span></label><input name="password" type="password" id="password" class="field">
    </div>
    <div class="form__field">
        <label for="status" class="label"><span class="obligatory">status</span></label>
        <select name="status" id="status" class="field">
            <option name="user">user</option>
            <option name="editor">editor</option>
            <option name="admin">admin</option>
        </select>
    </div>
    
    <input type="submit" value="Put data into database" class="submit">
</form>

END;
