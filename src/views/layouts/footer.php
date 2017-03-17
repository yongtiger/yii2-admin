<?php

use yongtiger\timezone\TimeZone;

?>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= \Yii::$app->name ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= \Yii::powered() ?>
            <?= TimeZone::timezone_format(\Yii::$app->timeZone) ?>, <?= \Yii::$app->formatter->asDatetime(time()) ?>
        </p>
    </div>
</footer>
