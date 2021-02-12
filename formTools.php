<?php
function getparameters($field)
{
    return isset($_POST[$field]) ? $_POST[$field] : "";
};
function checkNumeric($value, $config)
{
    if (array_key_exists("isnumeric", $config)) {
        return $config["isnumeric"] ? !is_numeric($value) : false;
    }
    return false;
}

function isEmpty($key, $val)
{
    return !empty($val);
}

function isPhoneNumber($key, $val)
{
    return preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $val);
}

function checkFieldsStatus($form_config)
{
    $form_status = array("errorMsg" => array(), "isReady" => true);
    foreach ($form_config as $key => $config) {
        $formVal = getparameters($key);
        $validateFN = null;
        if (is_array($config["msg"])) {
            $validateFN = $config["msg"];
        } else {
            $validateFN = array("isEmpty" => $config["msg"]);
        }
        foreach ($validateFN as $fnName => $errorMessage) {
            if (!$fnName($key, $formVal)) {
                $form_status["isReady"] = false;
                $form_status["errorMsg"][$key] = $errorMessage;
                break;
            }
        }
        $form_status[$key] = $formVal;
    }
    return $form_status;
}


function generateInputFiled($field, $form_status, $config)
{
    global $isStick;
    $htmlType = $config["htmlType"];
    $placeholder = array_key_exists("placeholder", $config) ? $config["placeholder"] : "";
    $value = $form_status[$field];
?>
    <input type="<?= $htmlType ?>" name="<?= $field ?>" id="<?= $field ?>" placeholder="<?= $placeholder ?>" value="<?= $isStick ? $value : "" ?>">
<?php
}

function generateSelectField($field, $form_status, $config)
{
    global $isStick;
    $value = $form_status[$field];
    $options = $config["options"];
?>
    <select name="<?= $field ?>" id="<?= $field ?>">
        <?php foreach ($options as $key => $val) {
        ?>
            <option value="<?= $val ?>" <?= $isStick ? ($value == $val ? "selected" : "") : "" ?>><?= $key ?></option>
        <?php
        } ?>
    </select>
<?php
}

function generateTextareaField($field, $form_status, $config)
{
    global $isStick;
?>
    <textarea name="<?= $field ?>" id="<?= $field ?>" cols="50" rows="5"><?= $isStick ? $form_status[$field] : "" ?></textarea>
<?php
}

function generateRadioCheckboxField($field, $form_status, $config)
{
    global $isStick;
    $htmlType = $config["htmlType"];
    $htmlName = $htmlType == "radio" ? $field : $field . "[]";
?>
    <ul>
        <?php foreach ($config["options"] as $key => $value) {
            $formValue = $form_status[$field];
            $checked = empty($formValue) ? false : ($htmlType == "radio" ? ($value == $formValue) : (in_array($value, $formValue)));
        ?>
            <li><input <?= $isStick ? ($checked ? "checked" : "") : "" ?> type="<?= $htmlType ?>" name="<?= $htmlName ?>" value="<?= $value ?>"><?= $key ?></li>
        <?php
        } ?>
    </ul>
    <?php
}

function generateErrorMsg($field, $form_status)
{
    global $showError;
    if ($showError && array_key_exists($field, $form_status["errorMsg"])) {
    ?>
        <span class="error-msg"><?= $form_status["errorMsg"][$field] ?></span>
    <?php
    }
}

function generateFormFileds($form_config, $form_status)
{
    foreach ($form_config as $field => $config) {
        $display = array_key_exists("display", $config) ? $config["display"] : ucfirst($field);
    ?>
        <label><?= $display ?></label>
<?php
        switch ($config["htmlType"]) {
            case "text":
            case "email":
                generateInputFiled($field, $form_status, $config);
                break;
            case "select":
                generateSelectField($field, $form_status, $config);
                break;
            case "textarea":
                generateTextareaField($field, $form_status, $config);
                break;
            case "radio":
            case "checkbox":
                generateRadioCheckboxField($field, $form_status, $config);
                break;
        }
        generateErrorMsg($field, $form_status);
    }
}
