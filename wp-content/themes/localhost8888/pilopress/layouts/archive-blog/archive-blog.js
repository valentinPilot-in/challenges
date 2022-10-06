var imgs_articles = $('.archive-articles img');
imgs_articles.addClass('inset-0 w-full h-full object-cover');

$('.form-post-categories').submit(function(e) {
    e.preventDefault();

    const ajaxurl = $(this).attr('action');
    const data = {
        action: $(this).find('input[name=action]').val(),
        nonce: $(this).find('input[name=nonce]').val(),
        categorie_slug: $(this).find('select[name=categorie_slug]').val(),
    }

    fetch(ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Cache-Control': 'no-cache',
            },
            body: new URLSearchParams(data),
        })
        .then(response => response.json())
        .then(response => {
            // error
            if (!response.success) {
                alert(response.data);
                return;
            }
            // success
            $('.list-articles').html(response.data);
            var imgs_articles = $('.archive-articles img');
            imgs_articles.addClass('inset-0 w-full h-full object-cover');
        });
});
$('.form-post-categories select').on('change', function() {
    $(this).closest('form').submit();
});