 (function ($, window, document, undefined) {
      if ($('ul.simpleFull').length) {
          var collapsed = true;
          var close_same_level = false;
          var duration = 400;
          var listAnim = true;
          var easing = 'easeOutQuart';
          $('.simpleFull ul').css({
              'overflow': 'hidden',
              'height': collapsed ? 0 : 'auto',
              'display': collapsed ? 'none' : 'block'
          });
          var node = $('.simpleFull li:has(ul)');
          node.each(function (index, val) {
              $(this).children(':first-child').css('cursor', 'pointer');
              $(this).addClass('simpleFull-node simpleFull-' + (collapsed ? 'closed' : 'open'));
              $(this).children('ul').addClass('simpleFull-level-' + ($(this).parentsUntil($('ul.simpleFull'), 'ul').length + 1));
          });
          $('.simpleFull li > *:first-child').on('click.simpleFull-active', function (e) {
              if ($(this).parent().hasClass('simpleFull-closed')) {
                  $('.simpleFull-active').not($(this).parent()).removeClass('simpleFull-active');
                  $(this).parent().addClass('simpleFull-active');
              } else if ($(this).parent().hasClass('simpleFull-open')) {
                  $(this).parent().removeClass('simpleFull-active');
              } else {
                  $('.simpleFull-active').not($(this).parent()).removeClass('simpleFull-active');
                  $(this).parent().toggleClass('simpleFull-active');
              }
          });
          node.children(':first-child').on('click.simpleFull', function (e) {
              var el = $(this).parent().children('ul').first();
              var isOpen = $(this).parent().hasClass('simpleFull-open');
              if ((close_same_level || $('.csl').hasClass('active')) && !isOpen) {
                  var close_items = $(this).closest('ul').children('.simpleFull-open').not($(this).parent()).children('ul');
                  if ($.Velocity) {
                      close_items.velocity({ height: 0 }, {
                          duration: duration,
                          easing: easing,
                          display: 'none',
                          delay: 100,
                          complete: function () {
                              setNodeClass($(this).parent(), true);
                          }
                      });
                  } else {
                      close_items.delay(100).slideToggle(duration, function () {
                          setNodeClass($(this).parent(), true);
                      });
                  }
              }
              el.css({ 'height': 'auto' });
              if (!isOpen && $.Velocity && listAnim)
                  el.find(' > li, li.simpleFull-open > ul > li').css({ 'opacity': 0 }).velocity('stop').velocity('list');
              if ($.Velocity) {
                  el.velocity('stop').velocity({
                      height: isOpen ? [
                          0,
                          el.outerHeight()
                      ] : [
                          el.outerHeight(),
                          0
                      ]
                  }, {
                      queue: false,
                      duration: duration,
                      easing: easing,
                      display: isOpen ? 'none' : 'block',
                      begin: setNodeClass($(this).parent(), isOpen),
                      complete: function () {
                          if (!isOpen)
                              $(this).css('height', 'auto');
                      }
                  });
              } else {
                  setNodeClass($(this).parent(), isOpen);
                  el.slideToggle(duration);
              }
              e.preventDefault();
          });
          function setNodeClass(el, isOpen) {
              if (isOpen) {
                  el.removeClass('simpleFull-open').addClass('simpleFull-closed');
              } else {
                  el.removeClass('simpleFull-closed').addClass('simpleFull-open');
              }
          }
          if ($.Velocity && listAnim) {
              $.Velocity.Sequences.list = function (element, options, index, size) {
                  $.Velocity.animate(element, {
                      opacity: [
                          1,
                          0
                      ],
                      translateY: [
                          0,
                          -(index + 1)
                      ]
                  }, {
                      delay: index * (duration / size / 2),
                      duration: duration,
                      easing: easing
                  });
              };
          }
          if ($('.simpleFull').css('opacity') == 0) {
              if ($.Velocity) {
                  $('.simpleFull').css('opacity', 1).children().css('opacity', 0).velocity('list');
              } else {
                  $('.simpleFull').show(200);
              }
          }
      }
  }(jQuery, this, this.document));
  
  jQuery(function($) {
    	$('.navbar-toggle-fix').click(function() {
        $('.navbar-toggle-fix').toggleClass('navbar-on');
        $('.nav').fadeToggle();

        $('.nav').removeClass('nav-hide');

    });
});