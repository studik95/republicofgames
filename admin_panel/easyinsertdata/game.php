<?php

ECHO<<<END

<form action="admin_panel/easyinsertdata/backend/game.php" method="post" class="form">
        <div class="wrapper">
            <fieldset>
                <legend class="title--form">Information about game</legend>    
                <div class="form__field">
                    <label for="title" class="label">title</label><input name="title" type="text" id="title" class="field">
                </div>
                <div class="form__field">
                    <label for="title_pl" class="label">title_pl</label><input name="title_pl" type="text" id="title_pl" class="field">
                </div>
                <div class="form__field">
                    <label for="producer" class="label">producer</label><input name="producer" type="text" id="producer" class="field">
                </div>
                <div class="form__field">
                    <label for="publisher" class="label">publisher</label><input name="publisher" type="text" id="publisher" class="field">
                </div>
                <div class="form__field">
                    <label for="genre" class="label">genre</label><input name="genre" type="text" id="genre" class="field">
                </div>
                <div class="form__field">
                    <label for="cover" class="label">cover</label><input name="cover" type="text" id="cover" placeholder="url address" class="field">
                </div>
                <div class="form__field">
                    <label for="continuation" class="label">continuation</label><input name="continuation" type="text" id="continuation" class="field">
                </div>
                <div class="form__field">
                    <label for="addition" class="label">addition</label><input name="addition" type="text" id="addition" class="field">
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
                    <label for="os" class="label">os</label><input name="os" type="text" id="os" class="field">
                </div>
                <div class="form__field">
                    <label for="minimum_processor" class="label">minimum_processor</label><input name="minimum_processor" type="text" id="minimum_processor" class="field">
                </div>
                <div class="form__field">
                    <label for="minimum_graphics" class="label">minimum_graphics</label><input name="minimum_graphics" type="text" id="minimum_graphics" class="field">
                </div>
                <div class="form__field">
                    <label for="minimum_memory" class="label">minimum_memory</label><input name="minimum_memory" type="text" id="minimum_memory class="field"">
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