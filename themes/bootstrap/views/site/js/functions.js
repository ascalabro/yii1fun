function refreshNewsFeed(scrollTo) {
    var newsContainer = $(".news-container section");
//    if (scrollTo) {
//        $(window).scrollTop($(".news-container").offset().top);
//    }
    newsContainer.parent().find(".loading-img-container").slideDown(1000);
    newsContainer.slideUp();
    $("#containerDiv").animate({ scrollTop: 0 }, "fast");
    $.ajax({
        url: 'index.php?r=site/renderRefreshNewsFeed',
        data: $("#searchForm").serialize(),
        error: function (msg) {
            console.log("my object: %o", msg);
        },
        complete: function (jqXHR, textStatus) {
//            alert("Done");
        },
        type: 'POST',
        success: function (data) {
            $(".loading-img-container").slideUp(1000);
            newsContainer.html(data).slideDown(1000);
        },
    });
}