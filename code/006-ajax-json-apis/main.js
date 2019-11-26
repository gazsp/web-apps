// Initial post id
var id = 1;

function loadTemplate(id) {
    return $($('template#' + id).html());
}

// Load posts via AJAX
function loadData() {
    $.ajax({
        url: "api/posts.php"
    })
    .done(function(data) {
        if (data && data.length) {
            for (var i = 0; i < data.length; i++) {

                var template = loadTemplate("post");

                // Set template data
                $('.title', template).text(data[i].title);
                $('.content', template).text(data[i].content);

                // There's no database backing this example, so just generate
                // incremental ids as we go...
                $('.like-unlike', template).data('id', id++);

                // Append to posts
                $('.posts').append(template);
            }
        }
    })
};

// Run on page load
$(document).ready(function() {
    loadData();

    // Handle click events on like / unlike buttons
    $('body').on('click', '.like-unlike', function(event) {
        var liked = $(this).data('liked');
        liked = !liked;

        if (!liked) {
            $(this).text('Like');
        }
        else {
            $(this).text('Unlike');
        }

        // Set new liked status on button
        $(this).data('liked', liked);

        // Send like to API
        $.ajax({
            url: "api/like.php",
            method: "POST",
            dataType: "json",
            contentType: 'application/json; charset=utf-8',
            data: JSON.stringify({
                like: liked,
                id: $(this).data('id')
            })
        })
    });
});
