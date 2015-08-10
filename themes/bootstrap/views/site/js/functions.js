function refreshNewsFeed() {
    $.ajax({
        url: 'index.php?r=site/renderRefreshNewsFeed',
        error: function() {
            alert('<p>An error has occurred</p>');
        },
        complete: function(jqXHR, textStatus) {
            alert();
        },
        success: function(data) {
            alert(data);
        },
        type: 'GET'
    });
}