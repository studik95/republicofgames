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

    <form action="../backend/trailer.php" method="post" class="form form--small">
        <legend class="title--form">Trailer</legend>
        <div class="form__field">
            <label for="game_trailer" class="label"><span class="obligatory">game</span></label>
            <select name="game_trailer" id="game_trailer" class="field">
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
            <label for="trailer" class="label"><span class="obligatory">trailer</span></label><input name="trailer" id="trailer" type="text" placeholder="url address" class="field">
        </div>
        <input type="submit" value="Put data into database" class="submit">
    </form>



END;