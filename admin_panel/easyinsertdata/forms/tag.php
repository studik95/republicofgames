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

    <form action="../backend/tag.php" method="post" class="form form--small">
        <legend class="title--form">Tag</legend>
        <div class="form__field">
            <label for="game_tag" class="label"><span class="obligatory">game</span></label>
            <select name="game_tag" id="game_tag" class="field">
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
            <label for="tag" class="label"><span class="obligatory">tag</span></label><input name="tag" id="tag" type="text" placeholder="url address" class="field">
        </div>
        <input type="submit" value="Put data into database" class="submit">
    </form>



END;
