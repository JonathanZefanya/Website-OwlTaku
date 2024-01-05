$(function() {
    'use strict';

    // Default
    $('.repeater-default').repeater();

    // Custom Show / Hide Configurations
    $('.file-repeater, .email-repeater').repeater({
        show: function() {
            $(this).slideDown();
        },
        hide: function(remove) {
            if (confirm('Apakah ingin menghapus item ini?')) {
                $(this).slideUp(remove);
            }
        }
    });


});