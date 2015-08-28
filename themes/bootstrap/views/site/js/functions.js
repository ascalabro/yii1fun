function refreshNewsFeed(searchQuery) {
    var newsContainer = $(".news-container section");
//    if (scrollTo) {
//        $(window).scrollTop($(".news-container").offset().top);
//    }
    newsContainer.parent().find(".loading-img-container").slideDown(1000);
    newsContainer.slideUp();
    $("#containerDiv").animate({ scrollTop: 0 }, "fast");
    var searchQuery = $("#searchForm").serialize();
    $.ajax({
        url: 'index.php/site/renderRefreshNewsFeed',
        data: searchQuery,
        error: function (msg) {
            console.log("the error: %o", msg);
        },
        complete: function (jqXHR, textStatus) {
            $("#searchForm").submit(function() {
                refreshNewsFeed();
                return false;
            });
        },
        type: 'POST',
        success: function (data) {
            showArticleHtml(data);
        }
    });
}

function showArticleHtml(data) {
    $(".loading-img-container").slideUp(1000);
    $(".news-container section").html(data).slideDown(1000);
}