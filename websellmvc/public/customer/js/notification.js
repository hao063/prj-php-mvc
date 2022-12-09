$(document).ready(function() {

    function tabsMenu(classNamePercent, numberI) {
        $(`.${classNamePercent} .tabs-menu-header>div`).click(function() {
            $(`.${classNamePercent} .tabs-menu-header>div`).removeClass('active');
            $(this).addClass('active');
            $(`.${classNamePercent} .tabs-menu-body>div`).removeClass('active');

            var dataNumber = $(this).attr('data');
            var classChildrenBody = '.item-tab-menu-'+dataNumber;
            $(classChildrenBody).addClass('active');
            $(`.${classNamePercent} .tabs-menu-indicator`).css('left', `calc(calc(100% / ${numberI}) * ${dataNumber})`);
        });
    }
    tabsMenu('container-manager-order',6)
    tabsMenu('container-natification',4)
   
});