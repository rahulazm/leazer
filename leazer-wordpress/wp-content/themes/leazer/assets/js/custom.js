jQuery(document).ready(function () {
    var $menu = $("#device-menu").mmenu({
        "offCanvas": {
            "position": "right"
        },
        "extensions": [
            "pagedim-black",
            "theme-dark"
        ],
        "navbars": [
            {
                "position": "bottom",
                "content": [
                    "<a class='fa fa-envelope' href='#/'></a>",
                    "<a class='fa fa-twitter' href='#/'></a>",
                    "<a class='fa fa-facebook' href='#/'></a>"
                ]
            },
            {
                "position": "top",
                height: 3,
                content: [
                    '<div class="res_logo"><img src="images/LeazerLogo.png" alt="LeazerLogo.png"></div>'
                ]
            }, true]
    });
    var $icon = $("#my-icon");
    var API = $menu.data("mmenu");
    $icon.on("click", function () {
        API.open();
    });
    API.bind("open:finish", function () {
        setTimeout(function () {
            $icon.addClass("is-active");
        }, 100);
    });
    API.bind("close:finish", function () {
        setTimeout(function () {
            $icon.removeClass("is-active");
        }, 100);
    });

    /**** Accordian For TLG LEADS Page ***/
    function close_accordion_section()
    {
        $('.accordion-section-title.active').children('.accordian-minus').remove();
        $('.accordion-section-title.active').prepend('<span class="accordian-plus">+</span>');
        $('.accordion .accordion-section-title').removeClass('active');
        $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
    }
    $('.leads-options-accordian .accordion-section-title').click(function (e) {
        var currentAttrValue = $(this).attr('href');
        if ($(e.target).is('.active') || $(this).find('span.accordian-minus').length !== 0)
        {
            close_accordion_section();
        }
        else
        {
            close_accordion_section();
            $(this).children('.accordian-plus').remove();
            $(this).prepend('<span class="accordian-minus">-</span>');
            $(this).addClass('active');
            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
        }
        e.preventDefault();
    });

    /**** Accordian For Quote Center Page ***/
    function quote_close_accordion_section()
    {
        $('.accordion-section-title.active').children('.accordian-minus').remove();
        $('.accordion-section-title.active').append('<span class="accordian-plus">+</span>');
        $('.accordion .accordion-section-title').removeClass('active');
        $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
    }
    $('.quote-center-content .accordion-section-title').click(function (e) {
        var currentAttrValue = $(this).attr('href');
        e.preventDefault();
        if ($(e.target).is('.active') || $(this).find('span.accordian-minus').length !== 0)
        {
            quote_close_accordion_section();
        }
        else
        {
            quote_close_accordion_section();
            $(this).children('.accordian-plus').remove();
            $(this).append('<span class="accordian-minus">-</span>');
            $(this).addClass('active');
            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
        }
    });

    /**** Accordian For Form Depot Page ***/
    function form_depot_accordion_section()
    {
        $('.accordion-section-title.active').children('.accordian-minus').remove();
        $('.accordion-section-title.active').append('<span class="accordian-plus">+</span>');
        $('.accordion .accordion-section-title').removeClass('active');
        $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
    }
    $('.form-depot-accordian .accordion-section-title').click(function (e) {
        var currentAttrValue = $(this).attr('href');
        e.preventDefault();
        if ($(e.target).is('.active') || $(this).find('span.accordian-minus').length !== 0)
        {
            form_depot_accordion_section();
        }
        else
        {
            form_depot_accordion_section();
            $(this).children('.accordian-plus').remove();
            $(this).append('<span class="accordian-minus">-</span>');
            $(this).addClass('active');
            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
        }
    });

    $('.bill-accept-btn a').click(function () {
        var status = $(this).text();
        if (status == "I Accept")
        {
            $('.decline-policy').removeClass('active-policy-btn');
            $('.accept-policy').addClass('active-policy-btn');
            $('.gform_footer input[type="submit"]').show();
        }
        else if (status == "Decline")
        {
            $('.accept-policy').removeClass('active-policy-btn');
            $('.decline-policy').addClass('active-policy-btn');
            $('.gform_footer input[type="submit"]').hide();
        }
    });
});