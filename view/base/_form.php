<form method="post" role="form" action="<?=$action?>">
    <fieldset>


            <div class="form-group">
                <input class="form-control" placeholder="Назва бази" name="name" type="text" value="<?= $model->name?>" required>
            </div>

            <div class="form-group">
                <input class="form-control" placeholder="Адрес" name="address" type="tel" value="<?=$model->address?>" >
            </div>

            <div class="form-group">
                <input class="form-control" placeholder="Контактний телефон" name="contact_phone" type="tel" value="<?=$model->contact_phone?>" required>
            </div>

            <div class="form-group">
                <input class="form-control" placeholder="Телефон деректора" name="directory_phone" type="number " value="<?=$model->directory_phone?>">
            </div>

        <!-- Change this to a button or input when using this as a form -->
        <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="<?=$batonValue?>">
    </fieldset>
</form>