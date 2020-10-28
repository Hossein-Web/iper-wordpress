function tabInit(tabIndex) {
    if (typeof tabIndex === "undefined" || tabIndex === null) {
        $('[data-tabindex]').each(function () {
            let ele = $(this),
                dataTabindex = ele.attr('data-tabindex'),
                dataEvent = ele.attr('data-event'),
                hasTrueTab = false;
            if(typeof dataEvent === "undefined" || dataEvent === null){
                dataEvent = 'click';
            }
            ele.find(' .tab-content [data-tabc][data-parent="' + dataTabindex + '"]').hide();
            ele.find(' .tab-title  [data-tab][data-parent="' + dataTabindex + '"]').each(function () {
                let i;
                if ($(this).hasClass('active')) {
                    i = $(this).attr('data-tab');
                    ele.find('.tab-content [data-tabc="' + i + '"][data-parent="' + dataTabindex + '"]').addClass('active').show();
                    hasTrueTab = true;
                }
                if (hasTrueTab !== true) {
                    ele.find('.tab-content [data-tabc="' + i + '"][data-parent="' + dataTabindex + '"]:first-of-type').show();
                    ele.find('.tab-title [data-tab="' + i + '"][data-parent="' + dataTabindex + '"]:first-of-type').addClass('active');
                }
            });
            ele.find(' .tab-title [data-tab][data-parent="' + dataTabindex + '"]').on(dataEvent,function () {
                if (!$(this).hasClass('active')) {
                    let t = $(this).attr('data-tab'),
                        oldActiveTab = ele.find(' .tab-title  [data-tab][data-parent="' + dataTabindex + '"].active').attr('data-tab');
                    ele.find(' .tab-title  [data-tab=' + oldActiveTab + '][data-parent="' + dataTabindex + '"]').removeClass('active');
                    ele.find(' .tab-content  [data-tabc=' + oldActiveTab + '][data-parent="' + dataTabindex + '"]').removeClass('active').hide();
                    $(this).addClass('active');
                    ele.find(' .tab-content  [data-tabc="' + t + '"][data-parent="' + dataTabindex + '"]').show();
                }
            });
        });
    } else {
        let dataTabindex = tabIndex;
        tabIndex = '[data-tabindex=' + tabIndex + ']';
        let dataEvent = tabIndex.attr('data-event');
        if(typeof dataEvent === "undefined" || dataEvent === null){
            dataEvent = 'click';
        }
        $(tabIndex).find(' .tab-content [data-tabc][data-parent="' + dataTabindex + '"]').hide();
        $(tabIndex).find(' .tab-title [data-tab][data-parent="' + dataTabindex + '"]').each(function () {
            var i;
            if ($(this).hasClass('active')) {
                i = $(this).attr('data-tab');
                $(tabIndex).find(' .tab-content  [data-tabc="' + i + '"][data-parent="' + dataTabindex + '"]').addClass('active').show();
            }
        });
        $(tabIndex).find(' .tab-title  [data-tab][data-parent="' + dataTabindex + '"]').on(dataEvent,function () {
            if (!$(this).hasClass('active')) {
                let t = $(this).attr('data-tab'),
                    oldActiveTab = $(tabIndex).find(' .tab-title  [data-tab][data-parent="' + dataTabindex + '"].active').attr('data-tab');
                $(tabIndex).find(' .tab-title  [data-tab=' + oldActiveTab + '][data-parent="' + dataTabindex + '"]').removeClass('active');
                $(tabIndex).find(' .tab-content  [data-tabc=' + oldActiveTab + '][data-parent="' + dataTabindex + '"]').removeClass('active').hide();
                $(this).addClass('active');
                $(tabIndex).find(' .tab-content  [data-tabc="' + t + '"][data-parent="' + dataTabindex + '"]').show();
            }
        });
    }
    $('body').on('click', '[data-tabindex-current]', function () {
        let dataTabindex = $(this).attr('data-tabindex-current'),
            ele = $('[data-tabindex="' + dataTabindex + '"]'),
            tabCurrent = $(this).attr('data-tab-current');
        ele.find('.tab-title  [data-tab][data-parent="' + dataTabindex + '"]').removeClass('active');
        ele.find('.tab-content  [data-tabc][data-parent="' + dataTabindex + '"]').hide();
        ele.find('.tab-title  [data-tab="' + tabCurrent + '"][data-parent="' + dataTabindex + '"]').addClass('active');
        ele.find('.tab-content  [data-tabc="' + tabCurrent + '"][data-parent="' + dataTabindex + '"]').fadeIn();
    });
}