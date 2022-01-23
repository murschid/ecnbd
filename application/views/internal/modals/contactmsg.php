<h6 class="float-right">Date: <?= date('d-m-Y H:i', $message->time); ?></h6>
<h4><?= $message->subject; ?></h4>
<h6>Name: <?= $message->name; ?></h6>
<h6>Email: <?= $message->email; ?></h6>
<h6>Mobile: <?= $message->mobile; ?></h6>
<div class="card-body">
    <p class="card-text"><?= $message->message; ?></p>
</div>