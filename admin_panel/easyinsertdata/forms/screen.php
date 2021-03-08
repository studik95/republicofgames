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

    <form action="../backend/screen.php" method="post" class="form form--small">
        <legend class="title--form">Screen</legend>
        <div class="form__field">
            <label for="game_screen" class="label"><span class="obligatory">game</span></label>
            <select name="game_screen" id="game_screen" class="field">
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
            <label for="screen" class="label"><span class="obligatory">screen</span></label><input name="screen" id="screen" type="text" placeholder="url address" class="field">
        </div>
        <input type="submit" value="Put data into database" class="submit">
    </form>



END;