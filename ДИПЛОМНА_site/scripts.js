//get current page name
function getCurentFileName() {
    var pagePathName= window.location.pathname;
    return pagePathName.substring(pagePathName.lastIndexOf("/") + 1);
};
$('li.dropdown-toggle a:contains("Услуги")').addClass("active");
$(document).ready(function () {

    $("li.dropdown-toggle").click(function () {

        $(this).children("a").removeClass("active");
        $("ul.dropdown-menu li.firstSub ul.secondSub").hide();

    });
    $("li.firstSub").click(function (event) {
        // stop bootstrap.js to hide the parents
        event.stopPropagation();

        $(this).children("ul.secondSub").toggle();
        $(this).nextAll("li.firstSub").children("ul.secondSub").hide();
        $(this).prevAll("li.firstSub").children("ul.secondSub").hide();
    });

    //set class active
    
    if (getCurentFileName() == "foods.php") {
        $('ul.nav a:contains("Магазин")').addClass("active");
    }
    else if (getCurentFileName() == "health_goods.php") {
        $('ul.nav a:contains("Услуги")').addClass("active");
    }
    else {
        $("nav ul.nav li").find('a[href="./'+getCurentFileName()+'"]').addClass("active");
    }
    
    
    
  


});

