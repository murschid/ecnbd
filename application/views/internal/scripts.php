<?php $countries =  $this->admin_model->country('tb_visitors', 'country');?>
<?php $categories =  $this->admin_model->country('tb_posts', 'category'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('.successtoast').toast({delay: 5000});
        $('.successtoast').toast('show');
        $('.errorstoast').toast({delay: 5000});
        $('.errorstoast').toast('show');
        $('.textarealg').summernote({
            height: 300,
            fontNames: ['SolaimanLipi', 'Arial', 'Helvetica', 'sans-serif'],
        });
        $('#chatMessages').scrollTop(1e4);
    });
    
    //var messageBody = document.querySelector('#chatMessages');
    //messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;

    function contactmsg(id) {
        var notific = parseInt($('.notification').text());
        var notificsec = parseInt($('.notificsecondi').text());
        console.log(notificsec);
        $.ajax({
            url: baseurl + 'eshow/contactmsg',
            method: 'POST',
            type: 'html',
            data: {'id': id},
            success: function (result) {
                $('#contactmsg').modal('show');
                $('.contactmsg').html(result);
                $('.msghide_'+id).fadeOut();
                $('.notification').text(notific - 1);
                $('.newnotification').text(notific - 1);
                $('.notificsecondi').text(notificsec - 1);
                $('.notificsecond').text(notificsec - 1);
            }
        });
    }

    function commenttxt(id) {
        var notific = $('.commentsno').text();
        $.ajax({
            url: baseurl + 'eshow/comment',
            method: 'POST',
            type: 'html',
            data: {'id': id},
            success: function (result) {
                $('#commentztxt').modal('show');
                $('.commentztxt').html(result);
                $('.cmnthide_'+id).fadeOut();
                $('.commentsno').text(notific - 1);
            }
        });
    }

    function generalupdate(id){
        $.ajax({
            url: baseurl + 'eshow/general',
            method: 'POST',
            type: 'html',
            data: {'id': id},
            success: function (result) {
                $('#generalbdy').modal('show');
                $('.generalbdy').html(result);
            }
        });
    }

    function breakingUpdate(id){
        $.ajax({
            url: baseurl + 'eshow/breaking',
            method: 'POST',
            type: 'html',
            data: {'id': id},
            success: function (result) {
                console.log(result);
                $('#breakingbody').modal('show');
                $('.breakingbody').html(result);
            }
        });
    }

    setInterval(function () {
        $.ajax({
            url: baseurl + 'eshow/notification',
            method: 'POST',
            type: 'html',
            data: {'table': 'tb_contacts', 'whrfst': 'seen', 'whrlst': '0'},
            success: function (result) {
                $('.notificheight').html(result);
                $('.notification').text($('.msgcountcls').length);
                var totalnot = parseInt($('.msgcountcls').length) + parseInt($('.newcomment').text());
                $('.notificsecondi').text(totalnot);
                $('.notificsecond').text(totalnot);
            }
        });
        $('.chatCount').text($('.contacts-listimg').length);
    }, 150000);
    
    $('#chatmsgtxt').on('keyup', function(e){
        if (e.keyCode === 13) {
            var data = $(this).val();
            if(data != ''){
                $.ajax({
                    url: baseurl + 'action/chatmsg',
                    method: 'POST',
                    type: 'html',
                    data: {'data' : data},
                    success: function (result) {
                        console.log(result);
                        $('#chatmsgtxt').val('');
                        $('#chatreload').load(' #chatreload');
                    }
                });
            }
        }
    });
    
    function refreshstn(value) {
        $.ajax({
            url: baseurl + 'update/refresh',
            method: 'POST',
            type: 'html',
            data: {'duration': value},
            success: function (result) {
                console.log(result);
                window.location.reload();
            }
        });
    }

    function maponoff(value) {
        $.ajax({
            url: baseurl + 'update/maponoff',
            method: 'POST',
            type: 'html',
            data: {'maps': value},
            success: function (result) {
                console.log(result);
                window.location.reload();
            }
        });
    }

    function chatonoff(value) {
        $.ajax({
            url: baseurl + 'update/chatonoff',
            method: 'POST',
            type: 'html',
            data: {'chatting': value},
            success: function (result) {
                console.log(result);
                window.location.reload();
            }
        });
    }
    
    function searchUser(user) {
        $.ajax({
            url: baseurl + 'eshow/searchuser',
            method: 'POST',
            type: 'html',
            data: {'user': user},
            success: function (result) {
                $('#ajaxdata').html(result);
            }
        });
    }
    
    
    /* ---- HighChart ---- */
    $(function () {
        Highcharts.chart('areaChart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Worldwide visitors'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: false
                }
            },
            series: [{
                    name: 'Total',
                    colorByPoint: true,
                    data: [
                        <?php foreach ($countries as $country) : ?>
                            {name: '<?= $country->country; ?>', y: <?= $country->total; ?>, sliced: true, selected: true},
                        <?php endforeach; ?>
                    ]
                }]
        });
    });
    var chart = Highcharts.chart('lineChart', {
        title: {
            text: 'Category wise posts'
        },
        subtitle: {
            text: 'Plain'
        },
        xAxis: {
            categories: [
                <?php foreach ($categories as $category) : ?>
                    '<?= ucfirst($category->category); ?>',
                <?php endforeach; ?>
            ]
        },
        series: [{
                name: 'Total',
                type: 'column',
                colorByPoint: true,
                data: [
                    <?php foreach ($categories as $category) : ?>
                        <?= $category->total.','; ?>
                    <?php endforeach; ?>
                ],
                showInLegend: false
            }]
    });

    $('#plain').click(function () {
        chart.update({
            chart: {
                inverted: false,
                polar: false
            },
            subtitle: {
                text: 'Plain'
            }
        });
    });
    $('#inverted').click(function () {
        chart.update({
            chart: {
                inverted: true,
                polar: false
            },
            subtitle: {
                text: 'Inverted'
            }
        });
    });
    $('#polar').click(function () {
        chart.update({
            chart: {
                inverted: false,
                polar: true
            },
            subtitle: {
                text: 'Polar'
            }
        });
    });

</script>
