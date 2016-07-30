var Gallery = function () {
    return {

        // =========================================================================
        // CONSTRUCTOR APP
        // =========================================================================
        init: function () {
            Gallery.fancyBox();
        },

        fancyBox: function () {
            $(".fancybox-button").fancybox({
                prevEffect      : 'none',
                nextEffect      : 'none',
                closeBtn        : false,
                helpers     : {
                    title   : { type : 'inside' },
                    buttons : {}
                }
            });
        },
    };

}();

// Call main app init
Gallery.init();
