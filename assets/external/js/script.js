$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('.successtoast').toast({delay: 5000});
    $('.successtoast').toast('show');
    $('.errorstoast').toast({delay: 5000});
    $('.errorstoast').toast('show');

    $('.carousel').carousel({interval: 7000});

    /*$('.bongabdo').bongabdo();*/

    $(window).on('load', function () {
        $('.logpreloader').fadeOut('slow');
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 60) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });

    $('#back-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 400);
        return false;
    });

    $('.facebook').click(function () {
        var postidfb = $(this).attr('for');
        shared(postidfb);
        window.open('https://facebook.com/sharer/sharer.php?u='+baseurl+'article/details/'+postidfb+'.html');
    });
    $('.whatsapp').click(function () {
        var postidwa = $(this).attr('for');
        shared(postidwa);
        window.open('https://api.whatsapp.com/send?&text='+baseurl+'article/details/'+postidwa+'.html');
    });
    $('.twitter').click(function () {
        var postidtw = $(this).attr('for');
        shared(postidtw);
        window.open('https://twitter.com/intent/tweet?text='+baseurl+'article/details/'+postidtw+'.html');
    });
    $('.doprint').click(function () {
        var postidpr = $(this).attr('for');
        shared(postidpr);
        window.open(baseurl+'article/printhis/'+postidpr+'.html');
    });

});

function shared(data) {
    $.ajax({
        url: baseurl + 'article/ajaxshare',
        method: 'POST',
        type: 'html',
        data: {'postid': data, 'field': 'share'},
        success: function (result) {
            console.log(result);
        }
    });
}

function dolike(data) {
    $('.animate__animated').addClass('text-primary animate__bounce');
    $.ajax({
        url: baseurl + 'article/ajaxshare',
        method: 'POST',
        type: 'html',
        data: {'postid': data, 'field': 'likes'},
        success: function (result) {
            console.log(result);
        }
    });
}

function ajaxsearch(data) {
    if (data != ''){
        $.ajax({
            url: baseurl + 'article/ajaxsearch',
            method: 'POST',
            type: 'html',
            data: {'searchr': data},
            success: function (result) {
                if (result != ''){
                    console.log(result);
                    $('.searchresult').fadeIn();
                    $('.ajaxsearched').html(result);
                }else {
                    $('.searchresult').fadeOut();
                }
            }
        });
    }else{
        $('.searchresult').fadeOut();
    }
}

function generatePDF() {
    $('.logpreloader').fadeIn();
    var element = document.getElementById('printme');
    var options = {
        margin: 0,
        filename: 'News.pdf',
        html2canvas: {scale: 2},
        jsPDF: {unit: 'in', format: 'A4', orientation: 'portrait'}
    };
    html2pdf().from(element).set(options).save();
    $('.logpreloader').fadeOut(3500);
}
