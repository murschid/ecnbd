<h6 class="float-right">Date: <?= date('d-m-Y H:i', $message->time); ?></h6>
<h6>Name: <?= $message->name; ?></h6>
<h6>Email: <?= $message->email; ?></h6>
<h6>Post ID: <?= $message->postid; ?> &nbsp; &nbsp; <?= ($message->active == 1) ? '<span class="badge badgef badge-success">Active</span>' : '<span class="badge badgef badge-danger">Inactive</span>'; ?></h6>
<div class="card-body">
    <p class="card-text"><?= $message->comment; ?></p>
</div>