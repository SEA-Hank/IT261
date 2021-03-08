<?php
if (count($form_status["errorMsg"]) > 0 && ($_SERVER["REQUEST_METHOD"] === 'POST')) : ?>
    <div class="error-list">
        <ul>
            <?php foreach ($form_status["errorMsg"] as $key => $value) :  ?>
                <li class="error-list-li"><?= $value ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>