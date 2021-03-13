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

    <form action="backend/addition.php" method="post" class="form form--small">
        <legend class="title--form">Addition</legend>
        <div class="form__field">
            <label for="addition" class="label"><span class="obligatory">addition</span></label>
            <select name="addition" id="addition" class="field">
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
            <label for="game" class="label"><span class="obligatory">for</span></label>
            <select name="game" id="game" class="field">
END;
if(count($identifiers) == count($titles)) {
    for ($i = 0; $i<count($identifiers); $i++) {
        echo "<option value='$identifiers[$i]'>$titles[$i]</option>";
    }
}
ECHO<<<END
                </select>
        </div>
        <input type="submit" value="Put data into database" class="submit">
    </form>



END;