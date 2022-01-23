<?php $settings = mycrypt::settings(); ?>
<aside class="control-sidebar control-sidebar-light">
    <div class="p-3 row justify-content-center">
        <label class="settinglbl"><h5><?= lang('admsetting'); ?></h5><hr></label>
        <div class="col-sm-10 col-offset-2">
            <label>Reloading</label>
            <div class="form-group">
                <select class="custom-select noradious" onchange="refreshstn($(this).val())">
                    <option value="0" <?= $settings->refresh == '0' ? 'selected' : ''; ?>>OFF</option>
                    <option value="60" <?= $settings->refresh == '60' ? 'selected' : ''; ?>>01 MIN</option>
                    <option value="300" <?= $settings->refresh == '300' ? 'selected' : ''; ?>>05 MIN</option>
                    <option value="600" <?= $settings->refresh == '600' ? 'selected' : ''; ?>>10 MIN</option>
                    <option value="900" <?= $settings->refresh == '900' ? 'selected' : ''; ?>>15 MIN</option>
                </select>
            </div>
        </div>
        <div class="col-sm-10 col-offset-2">
            <label>Maps ON/OFF</label>
            <div class="form-group">
                <select class="custom-select noradious" onchange="maponoff($(this).val())">
                    <option value="1" <?= $settings->maps == '1' ? 'selected' : ''; ?>>ON</option>
                    <option value="0" <?= $settings->maps == '0' ? 'selected' : ''; ?>>OFF</option>
                </select>
            </div>
        </div>
        <div class="col-sm-10 col-offset-2">
            <label>Chat-Com ON/OFF</label>
            <div class="form-group">
                <select class="custom-select noradious" onchange="chatonoff($(this).val())">
                    <option value="1" <?= $settings->chatting == '1' ? 'selected' : ''; ?>>ON</option>
                    <option value="0" <?= $settings->chatting == '0' ? 'selected' : ''; ?>>OFF</option>
                </select>
            </div>
        </div>
    </div>
</aside>