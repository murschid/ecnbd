<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Status</th>
            <th>Time</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($users) <= 0): ?>
            <tr><td colspan="7"><h4 class="text-danger font-weight-bold text-center">No Users Are Available</h4></td></tr>
        <?php endif; ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><img class="img-bordered-sm" src="<?= base_url('assets/external/img/users/' . $user->photo); ?>" alt="Mod" height="28"></td>
                <td><?= $user->name; ?></td>
                <td><?= $user->email; ?></td>
                <td><?= $user->address; ?></td>
                <td><?= ($user->active == 1) ? '<span class="badge badgef badge-success">Active</span>' : '<span class="badge badgef badge-danger">Inactive</span>'; ?></td>
                <td><?= date('d-m-Y h:i a', $user->time); ?></td>
                <td>
                    <a href="<?= base_url('eshow/user/' . $user->id); ?>.html" class="btn-sm btn-info" data-toggle="tooltip" title="View"><i class="fa fa-edit faw"></i></a>
                    <?php if ($user->active == 1) : ?>
                        <a href="<?= base_url('update/user/' . $user->id); ?>.html?key=de" class="btn-sm btn-danger" data-toggle="tooltip" title="Deactivate"><i class="fa fa-close faw"></i></a>
                    <?php else: ?>
                        <a href="<?= base_url('update/user/' . $user->id); ?>.html?key=ac" class="btn-sm btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-check faw"></i></a>
                    <?php endif; ?>
                    <a href="<?= base_url('delete/user/' . $user->id); ?>.html" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash faw"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>