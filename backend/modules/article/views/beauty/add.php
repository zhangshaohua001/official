<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'file')->fileInput() ?>

        <tr>
            <td>
                <input class="form-control menu_source" value="" style="width:200px" type="name" name="name">
            </td>
        </tr>

    <button>Submit</button>

<?php ActiveForm::end() ?>