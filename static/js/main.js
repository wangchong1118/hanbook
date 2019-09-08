$(function(){

    // navbar acitve select
    $(".navbar-home ul.navbar-nav > li").click(function(){
        $(this).addClass('active').siblings('li').removeClass('active');
    })

})