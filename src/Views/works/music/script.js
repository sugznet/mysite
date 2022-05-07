$(function() {
    $('audio').each(function() {
    new MediaElementPlayer('#' + this.id);
    });
});