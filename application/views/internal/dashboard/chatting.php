<div class="col-md-5">
    <div class="card direct-chat direct-chat-warning">
        <div class="card-header">
            <h3 class="card-title">Live Chat</h3>
            <div class="card-tools">
                <span data-toggle="tooltip" title="<?= $chtmsg = mycrypt::totalcount('tb_chatting', array('sender' => 'u', 'seen' => 0)) ?> New Messages" class="badge badge-warning chatCount"><?= $chtmsg; ?></span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div id="chatreload">
            <div class="card-body">
                <div class="direct-chat-messages" id="chatMessages">
                    <?php foreach ($messages as $message): ?>
                        <?php if ($message->sender == 'u'): ?>
                            <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left"><?= $message->name; ?></span>
                                    <span class="direct-chat-timestamp float-right"><?= date('Y-m-d H:i', $message->time); ?></span>
                                </div>
                                <img class="direct-chat-img" src="<?= base_url('assets/external/img/users/' . $message->photo); ?>" alt="User">
                                <div class="direct-chat-text"><?= $message->text; ?></div>
                            </div>
                        <?php elseif ($message->sender == 'm'): ?>
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-right"><?= $message->adname; ?></span>
                                    <span class="direct-chat-timestamp float-left"><?= date('Y-m-d H:i', $message->time); ?></span>
                                </div>
                                <img class="direct-chat-img" src="<?= base_url('assets/internal/img/admin/' . $message->adphoto); ?>" alt="Mod">
                                <div class="direct-chat-text"><?= $message->text; ?></div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <!-- New Chat -->
                <div class="direct-chat-contacts">
                    <ul class="contacts-list">
                        <?php foreach ($chats as $chat): ?>
                            <li>
                                <a href="<?= base_url('admin/dashboard?msg=' . $chat->user); ?>">
                                    <img class="contacts-list-img <?= ($chat->seen == 0) ? 'contacts-listimg' : ''; ?>" src="<?= base_url('assets/external/img/users/' . $chat->photo); ?>">
                                    <div class="contacts-list-info">
                                        <span class="contacts-list-name"><?= $chat->name; ?> &nbsp;<?= ($chat->seen == 0) ? '<i class="fa fa-circle text-success"></i>' : ''; ?><small class="contacts-list-date float-right"><?= date('Y-m-d h:i a', $chat->time); ?></small></span>
                                        <span class="contacts-list-msg"><?= $chat->text; ?></span>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="input-group">
                <input type="text" id="chatmsgtxt" for="" class="form-control" placeholder="Type Message..." minlength="1">
            </div>
        </div>
    </div>
</div>