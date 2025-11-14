/**
 * Delta Team Three - Main JavaScript
 */

(function($) {
    'use strict';

    // Mobile menu toggle
    $(document).ready(function() {
        $('#menu-toggle').on('click', function() {
            $('#main-navigation').toggleClass('active');
            $(this).toggleClass('active');
        });

        // Close mobile menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.header-content').length) {
                $('#main-navigation').removeClass('active');
                $('#menu-toggle').removeClass('active');
            }
        });

        // Smooth scrolling for anchor links
        $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

                if (target.length) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 80
                    }, 800);
                }
            }
        });

        // Add animation on scroll
        function checkScroll() {
            $('.card').each(function() {
                var elementTop = $(this).offset().top;
                var viewportBottom = $(window).scrollTop() + $(window).height();

                if (elementTop < viewportBottom - 100) {
                    $(this).addClass('fade-in');
                }
            });
        }

        // Initial check
        checkScroll();

        // Check on scroll
        $(window).on('scroll', function() {
            checkScroll();
        });

        // Sticky header on scroll
        var header = $('.site-header');
        var headerHeight = header.outerHeight();

        $(window).scroll(function() {
            if ($(window).scrollTop() > headerHeight) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }
        });
    });

})(jQuery);
