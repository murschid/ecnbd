<div class="content-wrapper">
    <?php $this->load->view($header[0]);?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-user-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Users</span>
                            <span class="info-box-number"><?= mycrypt::totalcount('tb_users', array());?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-save"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Subscribers</span>
                            <span class="info-box-number"><?= mycrypt::totalcount('tb_subscribers', array());?></span>
                        </div>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa fa-server"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Online Now</span>
                            <span class="info-box-number"><?= mycrypt::totalcount('tb_online', array());?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Unique Visitors</span>
                            <span class="info-box-number"><?= mycrypt::totalcount('tb_visitors', array());?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $this->load->view('internal/dashboard/posts'); ?>
                <?php ($setting->chatting == 1) ? $this->load->view('internal/dashboard/chatting') : $this->load->view('internal/dashboard/comments'); ?>
            </div>
            <?php ($setting->maps == 1) ? $this->load->view('internal/dashboard/maps') : '';?>
        </div>
    </div>
</div>