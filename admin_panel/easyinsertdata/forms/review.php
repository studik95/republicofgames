<?php

$dsn = "pgsql:host=localhost;port=5432;dbname=republicofgames;user=michal;password=michal";

try {
    //dsn variable comes from ../../database/connector.php  file
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $sql = "SELECT id_account, login FROM account;";
    $sth = $pdo->query($sql);
    $accounts = $sth->fetchAll(PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
    echo $e->getMessage();
}

ECHO<<<END

<form action="backend/review.php" method="post" class="form">
    <legend class="title--form">Review</legend>
    <div class="form__field">
        <label for="account" class="label"><span class="obligatory">account</span></label>
        <select name="account" id="account">
END;
foreach ($accounts as $element) {
    echo '<option value="'.$element['id_account'].'">'.$element['login'].'</option>';
}
ECHO<<<END
        </select>
    </div>
    <div class="form__field">
        <label for="game" class="label"><span class="obligatory">game</span></label>
        <select name="game" id="game">
END;

try {
    $sql = "SELECT id_game, title FROM game;";
    $sth = $pdo->query($sql);
    $games = $sth->fetchAll(PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
    echo $e->getMessage();
}

foreach ($games as $element) {
    echo '<option value="'.$element['id_game'].'">'.$element['title'].'</option>';
}
ECHO<<<END
        </select>
    </div>
    <div class="form__field">
        <label for="review" class="label"><span class="obligatory">review</span></label>
        <textarea name="review" id="review" cols="30" rows="10" class="field"></textarea>
    </div>
    <input type="submit" value="Put data into database" class="submit">
</form>

END;