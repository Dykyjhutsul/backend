$(".edit_style").on('click',function () {
    document.location.href='/web/admin/default/style';
});

$('.body-style').css('background-color', localStorage.getItem('background-color'));