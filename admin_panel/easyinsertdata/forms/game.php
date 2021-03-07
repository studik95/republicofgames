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

<form action="backend/game.php" method="post" class="form">
        <div class="wrapper">
            <fieldset>
                <legend class="title--form">Information about game</legend>    
                <div class="form__field">
                    <label for="title" class="label"><span class="obligatory">title</span></label><input name="title" type="text" id="title" class="field">
                </div>
                <div class="form__field">
                    <label for="title_pl" class="label">title_pl</label><input name="title_pl" type="text" id="title_pl" class="field">
                </div>
                <div class="form__field">
                    <label for="producer" class="label"><span class="obligatory">producer</span></label><input name="producer" type="text" id="producer" class="field">
                </div>
                <div class="form__field">
                    <label for="publisher" class="label"><span class="obligatory">publisher</span></label><input name="publisher" type="text" id="publisher" class="field">
                </div>
                <div class="form__field">
                    <label for="genre" class="label">genre</label><input name="genre" type="text" id="genre" class="field">
                </div>
                <div class="form__field">
                    <label for="cover" class="label">cover</label><input name="cover" type="text" id="cover" placeholder="url address" class="field">
                </div>
                <div class="form__field">
                    <label for="continuation" class="label">continuation</label>
                    <select name="continuation" id="continuation" class="field">
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
                    <label for="addition" class="label">addition</label>
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
                <div class="form__field--textarea">
                    <label for="short_description" class="label--textarea" >short description</label>
                    <textarea name="short_description" id="short_description" cols="30" rows="10"></textarea>
                </div>
                <div class="form__field--textarea">
                    <label for="description" class="label--textarea" >description</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                </div>
            </fieldset>
    
            <fieldset>
                <legend class="title--form">Requirements</legend>
                <div class="form__field">
                    <label for="os" class="label"><span class="obligatory">os</span></label><input name="os" type="text" id="os" class="field">
                </div>
                <div class="form__field">
                    <label for="minimum_processor" class="label"><span class="obligatory">minimum_processor</span></label><input name="minimum_processor" type="text" id="minimum_processor" class="field">
                </div>
                <div class="form__field">
                    <label for="minimum_graphics" class="label"><span class="obligatory">minimum_graphics</span></label><input name="minimum_graphics" type="text" id="minimum_graphics" class="field">
                </div>
                <div class="form__field">
                    <label for="minimum_memory" class="label"><span class="obligatory">minimum_memory</span></label><input name="minimum_memory" type="text" id="minimum_memory class="field"">
                </div>
                <div class="form__field">
                    <label for="recommended_processor" class="label">recommended_processor</label><input name="recommended_processor" type="text" id="recommended_processor" class="field">
                </div>
                <div class="form__field">
                    <label for="recommended_graphics" class="label">recommended_graphics</label><input name="recommended_graphics" type="text" id="recommended_graphics" class="field">
                </div>
                <div class="form__field">
                    <label for="recommended_memory" class="label">recommended_memory</label><input name="recommended_memory" type="text" id="recommended_memory" class="field">
                </div>
                <div class="form__field">
                    <label for="storage" class="label">storage</label><input name="storage" type="text" id="storage" class="field">
                </div>
                <div class="form__field--textarea">
                    <label for="notes" class="label--textarea">additional notes</label>
                    <textarea name="notes" id="description" cols="30" rows="10"></textarea>
                </div>
            </fieldset>
        </div>

        <input type="submit" value="Put data into database" class="submit">
    </form>

END;

?>