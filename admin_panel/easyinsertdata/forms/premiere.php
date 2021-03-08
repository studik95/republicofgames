<?php

$games = $_SESSION['list_of_games'];

$identifiers = array();
$titles = array();
array_push($identifiers,0);
array_push($titles,"-----");

foreach ($games as $game) {
    array_push($identifiers,$game['id_game']);
    array_push($titles,$game['title']);
}

ECHO<<<END

    <form action="../backend/premiere.php" method="post" class="form form--small">
        <legend class="title--form">Premiere</legend>
        <div class="form__field">
            <label for="game_premiere" class="label"><span class="obligatory">game</span></label>
            <select name="game_premiere" id="game_premiere" class="field">
END;
if(count($identifiers) == count($titles)) {
    for ($i = 0; $i<count($identifiers); $i++) {
        echo "<option value='$identifiers[$i]'>$titles[$i]</option>";
    }
}
ECHO<<<END
                </select>
        </div>
        <div class="form__field">
            <label for="platform" class="label"><span class="obligatory">platform</span></label><input name="platform" id="platform" type="text" class="field">
        </div>
        <div class="form__field">
            <label for="date" class="label"><span class="obligatory">date</span></label><input name="date" id="date" type="text" class="field">
        </div>
        <input type="submit" value="Put data into database" class="submit">
    </form>



END;

