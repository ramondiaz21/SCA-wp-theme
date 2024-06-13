jQuery(document).ready(function() {
    jQuery('.replace-br .box-desc').each(function() {
        var html = jQuery(this).html();
        var newHtml = html.replace(/\|/g, '<br>');
        jQuery(this).html(newHtml);
    });
});
