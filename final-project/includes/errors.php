<?php
if (array_key_exists("dataError", $form_status["errorMsg"])  && ($_SERVER["REQUEST_METHOD"] === 'POST')) : ?>
    <div class="error-list">
        <ul>
            <?php foreach ($form_status["errorMsg"]["dataError"] as $key => $value) :  ?>
                <li class="error-list-li"><?= $value ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>