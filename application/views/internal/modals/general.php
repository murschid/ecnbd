<?= form_open('action/generalupdate'); ?>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <label>Content <span class="text-red">*</span></label>
            <textarea name="gencontent" class="form-control generalmod p-2" required minlength="3" rows="5"><?= $general->content; ?></textarea>
        </div>
    </div>
</div>
<input type="hidden" name="generalid" value="<?= $general->id; ?>">
<button type="submit" class="btn btn-primary btn-sm float-right">Submit</button>
<?= form_close(); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('.generalmod').summernote({height: 200});
    });
</script>
