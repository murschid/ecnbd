<?= form_open('action/breakingupdate'); ?>
<div class="form-row">
    <div class="col">
        <input type="hidden" name="breakid" value="<?=$breaking->id; ?>">
        <div class="form-group">
            <label>Title <span class="text-red">*</span></label>
            <input type="text" name="brtitle" value="<?=$breaking->title; ?>" class="form-control p-2" required minlength="3">
        </div>
        <div class="form-group">
            <label>Content <span class="text-red">*</span></label>
            <textarea name="breaking" class="form-control p-2" required minlength="3" rows="5"><?=$breaking->breaking; ?></textarea>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary btn-sm float-right">Submit</button>
<?= form_close();?>
