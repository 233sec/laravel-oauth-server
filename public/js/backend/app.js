/* globals AdminLTEOptions: false */
/* globals FastClick: false */

/*! AdminLTE app.js
 * ================
 * Main JS application file for AdminLTE v2. This file
 * should be included in all pages. It controls some layout
 * options and implements exclusive AdminLTE plugins.
 *
 * @Author  Almsaeed Studio
 * @Support <http://www.almsaeedstudio.com>
 * @Email   <support@almsaeedstudio.com>
 * @version 2.1.2
 * @license MIT <http://opensource.org/licenses/MIT>
 */

//Make sure jQuery has been loaded before app.js
if (typeof jQuery === 'undefined') {
    throw new Error('AdminLTE requires jQuery');
}

/* AdminLTE
 *
 * @type Object
 * @description $.AdminLTE is the main object for the template's app.
 *              It's used for implementing functions and options related
 *              to the template. Keeping everything wrapped in an object
 *              prevents conflict with other plugins and is a better
 *              way to organize our code.
 */
$.AdminLTE = {};

/* --------------------
 * - AdminLTE Options -
 * --------------------
 * Modify these options to suit your implementation
 */
$.AdminLTE.options = {
    //Add slimscroll to navbar menus
    //This requires you to load the slimscroll plugin
    //in every page before app.js
    navbarMenuSlimscroll: true,
    navbarMenuSlimscrollWidth: '3px', //The width of the scroll bar
    navbarMenuHeight: '200px', //The height of the inner menu
    //General animation speed for JS animated elements such as box collapse/expand and
    //sidebar treeview slide up/down. This options accepts an integer as milliseconds,
    //'fast', 'normal', or 'slow'
    animationSpeed: 500,
    //Sidebar push menu toggle button selector
    sidebarToggleSelector: '[data-toggle="offcanvas"]',
    //Activate sidebar push menu
    sidebarPushMenu: true,
    //Activate sidebar slimscroll if the fixed layout is set (requires SlimScroll Plugin)
    sidebarSlimScroll: true,
    //Enable sidebar expand on hover effect for sidebar mini
    //This option is forced to true if both the fixed layout and sidebar mini
    //are used together
    sidebarExpandOnHover: false,
    //BoxRefresh Plugin
    enableBoxRefresh: true,
    //Bootstrap.js tooltip
    enableBSToppltip: true,
    BSTooltipSelector: '[data-toggle="tooltip"]',
    //Enable Fast Click. Fastclick.js creates a more
    //native touch experience with touch devices. If you
    //choose to enable the plugin, make sure you load the script
    //before AdminLTE's app.js
    enableFastclick: true,
    //Control Sidebar Options
    enableControlSidebar: true,
    controlSidebarOptions: {
        //Which button should trigger the open/close event
        toggleBtnSelector: '[data-toggle="control-sidebar"]',
        //The sidebar selector
        selector: '.control-sidebar',
        //Enable slide over content
        slide: true
    },
    //Box Widget Plugin. Enable this plugin
    //to allow boxes to be collapsed and/or removed
    enableBoxWidget: true,
    //Box Widget plugin options
    boxWidgetOptions: {
        boxWidgetIcons: {
            //Collapse icon
            collapse: 'fa-minus',
            //Open icon
            open: 'fa-plus',
            //Remove icon
            remove: 'fa-times'
        },
        boxWidgetSelectors: {
            //Remove button selector
            remove: '[data-widget="remove"]',
            //Collapse button selector
            collapse: '[data-widget="collapse"]'
        }
    },
    //Direct Chat plugin options
    directChat: {
        //Enable direct chat by default
        enable: true,
        //The button to open and close the chat contacts pane
        contactToggleSelector: '[data-widget="chat-pane-toggle"]'
    },
    //Define the set of colors to use globally around the website
    colors: {
        lightBlue: '#3c8dbc',
        red: '#f56954',
        green: '#00a65a',
        aqua: '#00c0ef',
        yellow: '#f39c12',
        blue: '#0073b7',
        navy: '#001F3F',
        teal: '#39CCCC',
        olive: '#3D9970',
        lime: '#01FF70',
        orange: '#FF851B',
        fuchsia: '#F012BE',
        purple: '#8E24AA',
        maroon: '#D81B60',
        black: '#222222',
        gray: '#d2d6de'
    },
    //The standard screen sizes that bootstrap uses.
    //If you change these in the variables.less file, change
    //them here too.
    screenSizes: {
        xs: 480,
        sm: 768,
        md: 992,
        lg: 1200
    }
};

/* ------------------
 * - Implementation -
 * ------------------
 * The next block of code implements AdminLTE's
 * functions and plugins as specified by the
 * options above.
 */
$(function () {
    //Extend options if external options exist
    if (typeof AdminLTEOptions !== 'undefined') {
        $.extend(true,
            $.AdminLTE.options,
            AdminLTEOptions);
    }

    //Easy access to options
    var o = $.AdminLTE.options;

    //Set up the object
    _init();

    //Activate the layout maker
    $.AdminLTE.layout.activate();

    //Enable sidebar tree view controls
    $.AdminLTE.tree('.sidebar');

    //Enable control sidebar
    if (o.enableControlSidebar) {
        $.AdminLTE.controlSidebar.activate();
    }

    //Add slimscroll to navbar dropdown
    if (o.navbarMenuSlimscroll && typeof $.fn.slimscroll !== 'undefined') {
        $('.navbar .menu').slimscroll({
            height: o.navbarMenuHeight,
            alwaysVisible: false,
            size: o.navbarMenuSlimscrollWidth
        }).css('width', '100%');
    }

    //Activate sidebar push menu
    if (o.sidebarPushMenu) {
        $.AdminLTE.pushMenu.activate(o.sidebarToggleSelector);
    }

    //Activate Bootstrap tooltip
    if (o.enableBSToppltip) {
        $('body').tooltip({
            selector: o.BSTooltipSelector
        });
    }

    //Activate box widget
    if (o.enableBoxWidget) {
        $.AdminLTE.boxWidget.activate();
    }

    //Activate fast click
    if (o.enableFastclick && typeof FastClick !== 'undefined') {
        FastClick.attach(document.body);
    }

    //Activate direct chat widget
    if (o.directChat.enable) {
        $(o.directChat.contactToggleSelector).on('click', function () {
            var box = $(this).parents('.direct-chat').first();
            box.toggleClass('direct-chat-contacts-open');
        });
    }

    /*
     * INITIALIZE BUTTON TOGGLE
     * ------------------------
     */
    $('.btn-group[data-toggle="btn-toggle"]').each(function () {
        var group = $(this);
        $(this).find('.btn').on('click', function (e) {
            group.find('.btn.active').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

    });
});

/* ----------------------------------
 * - Initialize the AdminLTE Object -
 * ----------------------------------
 * All AdminLTE functions are implemented below.
 */
function _init() {

    /* Layout
     * ======
     * Fixes the layout height in case min-height fails.
     *
     * @type Object
     * @usage $.AdminLTE.layout.activate()
     *        $.AdminLTE.layout.fix()
     *        $.AdminLTE.layout.fixSidebar()
     */
    $.AdminLTE.layout = {
        activate: function () {
            var _this = this;
            _this.fix();
            _this.fixSidebar();
            $(window, '.wrapper').resize(function () {
                _this.fix();
                _this.fixSidebar();
            });
        },
        fix: function () {
            //Get window height and the wrapper height
            var neg = $('.main-header').outerHeight() + $('.main-footer').outerHeight();
            var windowHeight = $(window).height();
            var sidebarHeight = $('.sidebar').height();
            //Set the min-height of the content and sidebar based on the
            //the height of the document.
            if ($('body').hasClass('fixed')) {
                $('.content-wrapper, .right-side').css('min-height', windowHeight - $('.main-footer').outerHeight());
            } else {
                var postSetWidth;
                if (windowHeight >= sidebarHeight) {
                    $('.content-wrapper, .right-side').css('min-height', windowHeight - neg);
                    postSetWidth = windowHeight - neg;
                } else {
                    $('.content-wrapper, .right-side').css('min-height', sidebarHeight);
                    postSetWidth = sidebarHeight;
                }

                //Fix for the control sidebar height
                var controlSidebar = $($.AdminLTE.options.controlSidebarOptions.selector);
                if (typeof controlSidebar !== 'undefined') {
                    if (controlSidebar.height() > postSetWidth) {
                        $('.content-wrapper, .right-side').css('min-height', controlSidebar.height());
                    }
                }

            }
        },
        fixSidebar: function () {
            //Make sure the body tag has the .fixed class
            if (!$('body').hasClass('fixed')) {
                if (typeof $.fn.slimScroll !== 'undefined') {
                    $('.sidebar').slimScroll({destroy: true}).height('auto');
                }
                return;
            } else if (typeof $.fn.slimScroll === 'undefined' && console) {
                console.error('Error: the fixed layout requires the slimscroll plugin!');
            }
            //Enable slimscroll for fixed layout
            if ($.AdminLTE.options.sidebarSlimScroll) {
                if (typeof $.fn.slimScroll !== 'undefined') {
                    //Destroy if it exists
                    $('.sidebar').slimScroll({destroy: true}).height('auto');
                    //Add slimscroll
                    $('.sidebar').slimscroll({
                        height: ($(window).height() - $('.main-header').height()) + 'px',
                        color: 'rgba(0,0,0,0.2)',
                        size: '3px'
                    });
                }
            }
        }
    };

    /* PushMenu()
     * ==========
     * Adds the push menu functionality to the sidebar.
     *
     * @type Function
     * @usage: $.AdminLTE.pushMenu("[data-toggle='offcanvas']")
     */
    $.AdminLTE.pushMenu = {
        activate: function (toggleBtn) {
            //Get the screen sizes
            var screenSizes = $.AdminLTE.options.screenSizes;

            //Enable sidebar toggle
            $(toggleBtn).on('click', function (e) {
                e.preventDefault();

                //Enable sidebar push menu
                if ($(window).width() > (screenSizes.sm - 1)) {
                    $('body').toggleClass('sidebar-collapse');
                }
                //Handle sidebar push menu for small screens
                else {
                    if ($('body').hasClass('sidebar-open')) {
                        $('body').removeClass('sidebar-open');
                        $('body').removeClass('sidebar-collapse');
                    } else {
                        $('body').addClass('sidebar-open');
                    }
                }
            });

            $('.content-wrapper').click(function () {
                //Enable hide menu when clicking on the content-wrapper on small screens
                if ($(window).width() <= (screenSizes.sm - 1) && $('body').hasClass('sidebar-open')) {
                    $('body').removeClass('sidebar-open');
                }
            });

            //Enable expand on hover for sidebar mini
            if ($.AdminLTE.options.sidebarExpandOnHover ||
                ($('body').hasClass('fixed') && $('body').hasClass('sidebar-mini'))) {
                this.expandOnHover();
            }

        },
        expandOnHover: function () {
            var _this = this;
            var screenWidth = $.AdminLTE.options.screenSizes.sm - 1;
            //Expand sidebar on hover
            $('.main-sidebar').hover(function () {
                if ($('body').hasClass('sidebar-mini') &&
                    $('body').hasClass('sidebar-collapse') &&
                    $(window).width() > screenWidth) {
                    _this.expand();
                }
            }, function () {
                if ($('body').hasClass('sidebar-mini') &&
                    $('body').hasClass('sidebar-expanded-on-hover') &&
                    $(window).width() > screenWidth) {
                    _this.collapse();
                }
            });
        },
        expand: function () {
            $('body').removeClass('sidebar-collapse').addClass('sidebar-expanded-on-hover');
        },
        collapse: function () {
            if ($('body').hasClass('sidebar-expanded-on-hover')) {
                $('body').removeClass('sidebar-expanded-on-hover').addClass('sidebar-collapse');
            }
        }
    };

    /* Tree()
     * ======
     * Converts the sidebar into a multilevel
     * tree view menu.
     *
     * @type Function
     * @Usage: $.AdminLTE.tree('.sidebar')
     */
    $.AdminLTE.tree = function (menu) {
        var _this = this;
        var animationSpeed = $.AdminLTE.options.animationSpeed;
        $('li a', $(menu)).on('click', function (e) {
            //Get the clicked link and the next element
            var $this = $(this);
            var checkElement = $this.next();

            //Check if the next element is a menu and is visible
            if ((checkElement.is('.treeview-menu')) && (checkElement.is(':visible'))) {
                //Close the menu
                checkElement.slideUp(animationSpeed, function () {
                    checkElement.removeClass('menu-open');
                    //Fix the layout in case the sidebar stretches over the height of the window
                    //_this.layout.fix();
                });
                checkElement.parent('li').removeClass('active');
            }
            //If the menu is not visible
            else if ((checkElement.is('.treeview-menu')) && (!checkElement.is(':visible'))) {
                //Get the parent menu
                var parent = $this.parents('ul').first();
                //Close all open menus within the parent
                var ul = parent.find('ul:visible').slideUp(animationSpeed);
                //Remove the menu-open class from the parent
                ul.removeClass('menu-open');
                //Get the parent li
                var liParent = $this.parent('li');

                //Open the target menu and add the menu-open class
                checkElement.slideDown(animationSpeed, function () {
                    //Add the class active to the parent li
                    checkElement.addClass('menu-open');
                    parent.find('li.active').removeClass('active');
                    liParent.addClass('active');
                    //Fix the layout in case the sidebar stretches over the height of the window
                    _this.layout.fix();
                });
            }
            //if this isn't a link, prevent the page from being redirected
            if (checkElement.is('.treeview-menu')) {
                e.preventDefault();
            }
        });
    };

    /* ControlSidebar
     * ==============
     * Adds functionality to the right sidebar
     *
     * @type Object
     * @usage $.AdminLTE.controlSidebar.activate(options)
     */
    $.AdminLTE.controlSidebar = {
        //instantiate the object
        activate: function () {
            //Get the object
            var _this = this;
            //Update options
            var o = $.AdminLTE.options.controlSidebarOptions;
            //Get the sidebar
            var sidebar = $(o.selector);
            //The toggle button
            var btn = $(o.toggleBtnSelector);

            //Listen to the click event
            btn.on('click', function (e) {
                e.preventDefault();
                //If the sidebar is not open
                if (!sidebar.hasClass('control-sidebar-open') && !$('body').hasClass('control-sidebar-open')) {
                    //Open the sidebar
                    _this.open(sidebar, o.slide);
                } else {
                    _this.close(sidebar, o.slide);
                }
            });

            //If the body has a boxed layout, fix the sidebar bg position
            var bg = $('.control-sidebar-bg');
            _this._fix(bg);

            //If the body has a fixed layout, make the control sidebar fixed
            if ($('body').hasClass('fixed')) {
                _this._fixForFixed(sidebar);
            } else {
                //If the content height is less than the sidebar's height, force max height
                if ($('.content-wrapper, .right-side').height() < sidebar.height()) {
                    _this._fixForContent(sidebar);
                }
            }
        },
        //Open the control sidebar
        open: function (sidebar, slide) {
            // var _this = this;
            //Slide over content
            if (slide) {
                sidebar.addClass('control-sidebar-open');
            } else {
                //Push the content by adding the open class to the body instead
                //of the sidebar itself
                $('body').addClass('control-sidebar-open');
            }
        },
        //Close the control sidebar
        close: function (sidebar, slide) {
            if (slide) {
                sidebar.removeClass('control-sidebar-open');
            } else {
                $('body').removeClass('control-sidebar-open');
            }
        },
        _fix: function (sidebar) {
            var _this = this;
            if ($('body').hasClass('layout-boxed')) {
                sidebar.css('position', 'absolute');
                sidebar.height($('.wrapper').height());
                $(window).resize(function () {
                    _this._fix(sidebar);
                });
            } else {
                sidebar.css({
                    'position': 'fixed',
                    'height': 'auto'
                });
            }
        },
        _fixForFixed: function (sidebar) {
            sidebar.css({
                'position': 'fixed',
                'max-height': '100%',
                'overflow': 'auto',
                'padding-bottom': '50px'
            });
        },
        _fixForContent: function (sidebar) {
            $('.content-wrapper, .right-side').css('min-height', sidebar.height());
        }
    };

    /* BoxWidget
     * =========
     * BoxWidget is a plugin to handle collapsing and
     * removing boxes from the screen.
     *
     * @type Object
     * @usage $.AdminLTE.boxWidget.activate()
     *        Set all your options in the main $.AdminLTE.options object
     */
    $.AdminLTE.boxWidget = {
        selectors: $.AdminLTE.options.boxWidgetOptions.boxWidgetSelectors,
        icons: $.AdminLTE.options.boxWidgetOptions.boxWidgetIcons,
        animationSpeed: $.AdminLTE.options.animationSpeed,
        activate: function (_box) {
            var _this = this;
            if (! _box) {
                _box = document; // activate all boxes per default
            }
            //Listen for collapse event triggers
            $(_box).find(_this.selectors.collapse).on('click', function (e) {
                e.preventDefault();
                _this.collapse($(this));
            });

            //Listen for remove event triggers
            $(_box).find(_this.selectors.remove).on('click', function (e) {
                e.preventDefault();
                _this.remove($(this));
            });
        },
        collapse: function (element) {
            var _this = this;
            //Find the box parent
            var box = element.parents('.box').first();
            //Find the body and the footer
            var boxContent = box.find('> .box-body, > .box-footer');
            if (!box.hasClass('collapsed-box')) {
                //Convert minus into plus
                element.children(':first')
                    .removeClass(_this.icons.collapse)
                    .addClass(_this.icons.open);
                //Hide the content
                boxContent.slideUp(_this.animationSpeed, function () {
                    box.addClass('collapsed-box');
                });
            } else {
                //Convert plus into minus
                element.children(':first')
                    .removeClass(_this.icons.open)
                    .addClass(_this.icons.collapse);
                //Show the content
                boxContent.slideDown(_this.animationSpeed, function () {
                    box.removeClass('collapsed-box');
                });
            }
        },
        remove: function (element) {
            //Find the box parent
            var box = element.parents('.box').first();
            box.slideUp(this.animationSpeed);
        }
    };
}

/* ------------------
 * - Custom Plugins -
 * ------------------
 * All custom plugins are defined below.
 */

/*
 * BOX REFRESH BUTTON
 * ------------------
 * This is a custom plugin to use with the component BOX. It allows you to add
 * a refresh button to the box. It converts the box's state to a loading state.
 *
 * @type plugin
 * @usage $('#box-widget').boxRefresh( options );
 */
(function ($) {

    $.fn.boxRefresh = function (options) {

        // Render options
        var settings = $.extend({
            //Refresh button selector
            trigger: '.refresh-btn',
            //File source to be loaded (e.g: ajax/src.php)
            source: '',
            //Callbacks
            onLoadStart: function (box) {
            }, //Right after the button has been clicked
            onLoadDone: function (box) {
            } //When the source has been loaded

        }, options);

        //The overlay
        var overlay = $('<div class="overlay"><div class="fa fa-refresh fa-spin"></div></div>');

        return this.each(function () {
            //if a source is specified
            if (settings.source === '') {
                if (console) {
                    console.log('Please specify a source first - boxRefresh()');
                }
                return;
            }
            //the box
            var box = $(this);
            //the button
            var rBtn = box.find(settings.trigger).first();

            //On trigger click
            rBtn.on('click', function (e) {
                e.preventDefault();
                //Add loading overlay
                start(box);

                //Perform ajax call
                box.find('.box-body').load(settings.source, function () {
                    done(box);
                });
            });
        });

        function start(box) {
            //Add overlay and loading img
            box.append(overlay);

            settings.onLoadStart.call(box);
        }

        function done(box) {
            //Remove overlay and loading img
            box.find(overlay).remove();

            settings.onLoadDone.call(box);
        }

    };

})(jQuery);

/*
 * EXPLICIT BOX ACTIVATION
 * -----------------------
 * This is a custom plugin to use with the component BOX. It allows you to activate
 * a box inserted in the DOM after the app.js was loaded.
 *
 * @type plugin
 * @usage $('#box-widget').activateBox();
 */
(function ($) {

    $.fn.activateBox = function () {
        $.AdminLTE.boxWidget.activate(this);
    };

})(jQuery);

/*
 * TODO LIST CUSTOM PLUGIN
 * -----------------------
 * This plugin depends on iCheck plugin for checkbox and radio inputs
 *
 * @type plugin
 * @usage $('#todo-widget').todolist( options );
 */
(function ($) {

    $.fn.todolist = function (options) {
        // Render options
        var settings = $.extend({
            //When the user checks the input
            onCheck: function (ele) {
            },
            //When the user unchecks the input
            onUncheck: function (ele) {
            }
        }, options);

        return this.each(function () {

            if (typeof $.fn.iCheck !== 'undefined') {
                $('input', this).on('ifChecked', function (event) {
                    var ele = $(this).parents('li').first();
                    ele.toggleClass('done');
                    settings.onCheck.call(ele);
                });

                $('input', this).on('ifUnchecked', function (event) {
                    var ele = $(this).parents('li').first();
                    ele.toggleClass('done');
                    settings.onUncheck.call(ele);
                });
            } else {
                $('input', this).on('change', function (event) {
                    var ele = $(this).parents('li').first();
                    ele.toggleClass('done');
                    settings.onCheck.call(ele);
                });
            }
        });
    };
}(jQuery));

(function($){

  $(".sidebar-toggle").on("click",function(){setTimeout(function(){$("body").hasClass("sidebar-collapse")?document.cookie="bodyClass=sidebar-collapse; path=/;":document.cookie="bodyClass=sidebar-uncollapse; path=/;"},500)});

  $.xss = function(_data, _class, _tag, _attr){
    if('undefined' === typeof _tag)_tag = 'span';
    if('undefined' === typeof _attr)_attr = {};
    if('undefined' === typeof _class)_class = '';
    var $dom = $('<'+_tag+'></'+_tag+'>');
    $dom.attr('class', _class);
    $dom.text(_data);
    $dom.attr(_attr);
    return $dom.get(0).outerHTML;
  };

  Number.prototype.toDate = function(times){
    if('undefined' == typeof times) times = 1;
    return new Date(this * 1 * times).toLocaleString();
  };

  window.file_upload_url = $('meta[name="oss-url"]').attr('content');
  window.file_upload_callback = function(json){return json.data.url;};
  window.file_upload_param = {_token: $('meta[name="_token"]').attr('content')};
  window.wysiwyg_param = {
    customConfig: $('meta[name="ckeditor-config-url"]').attr('content')
  };
  window.wysiwyg_init = function(dom){
    $(dom).each(function(index, el) {
      CKEDITOR.replace($(this)[0], window.wysiwyg_param);
    });
  };
  window.datetime_init = function(dom){
    $(dom).each(function(index, el) {
      $(this).datetimepicker({
        locale:'zh-cn',
        sideBySide: true,
        format: 'YYYY/MM/DD HH:mm:ss',
      });
    });
  };
  window._table_sdom = '<rBlit"top">';
  window._table_i18n = {
    "sLengthMenu":"显示 _MENU_ 条记录",
    "sZeroRecords":"没有检索到数据",
    "sInfo":"当前数据为 _START_ - _END_ 条数据；总共有 _TOTAL_ 条记录",
    "sInfoEmpty":"没有数据",
    "sProcessing":"正在加载数据......",
    "sSearch":"查询",
    "sInfoFiltered": "(过滤自 _MAX_ 条记录)",
    "oPaginate":{
      "sFirst":"首页",
      "sPrevious":"前页",
      "sNext":"后页",
      "sLast":"尾页"
    }
  };
  window._table_button = [
    { text: '备用按钮', className: 'btn btn-sm btn-default ext-bak1 hide' },
    { text: '&nbsp;&nbsp;&nbsp;', className: 'ext-bak1 hide' },
    { text: '备用按钮2', className: 'btn btn-sm btn-default ext-bak2 hide' },
    { text: '&nbsp;&nbsp;&nbsp;', className: 'ext-bak2 hide' },
    { text: '备用按钮3', className: 'btn btn-sm btn-default ext-bak3 hide' },
    { text: '&nbsp;&nbsp;&nbsp;', className: 'ext-bak2 hide' },
    {
      title: function(){return document.title.split('|').join('-');},
      text: '导出CSV(当前页)',
      className: 'btn btn-sm btn-default',
      extend: 'csv'
    },
    { text: '&nbsp;&nbsp;&nbsp;'},
    {
      title: function(){return document.title.split('|').join('-');},
      text: '导出CSV(所有)',
      className: 'btn btn-sm btn-default buttons-csv-all',
      action: function ( e, dt, node, config ) {
        $(this.node()).attr('data-exporting', '1');
        $(this.node()).parent().parent().find('.dataTables_length select').val('-1').trigger('change');
        return;
      }
    }
  ];
  var _oldhide = $.fn.hide;
  var _oldcss = $.fn.css;
  $.fn.css = function(speed, callback) {
    try{
      if(('object' == typeof speed && speed.display == 'none')||(speed == 'display' && callback == 'none')) $(this).trigger('hide');
    }catch(e){}
    return _oldcss.apply(this,arguments);
  };

  $.fn.hide = function(speed, callback) {
    $(this).trigger('hide');
    return _oldhide.apply(this,arguments);
  };

  window._pause_datatables = 0;

  $('.date-range,.datetime-range,.datestamp-range,.datetimestamp-range').each(function(){
    // date-range 日期段检索                 数据库存的 date|datetime|timestamp
    // datetime-range 日期时间段检索         数据库存的 datetime|timestamp
    // datestamp-range 日期戳段检索          数据库存的 int
    // datetimestamp-range 日期时间戳端检索  数据库存的 int

    var format = 'YYYY/MM/DD';
    if($(this).hasClass('datetime-range')) format = 'YYYY/MM/DD HH:mm:ss';
    else if($(this).hasClass('datestamp-range') || $(this).hasClass('datetimestamp-range')) format = 'X';
    $_v = $(this).val();
    $(this).daterangepicker({
      locale: {
        applyLabel: '应用',
        cancelLabel: '清除',
        monthNames: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
        daysOfWeek: ['日','一','二','三','四','五','六'],
        format: format
      }
    });
    $(this).val($_v);
    $(this).on('show.daterangepicker', function(ev, picker){
      window._pause_datatables = 1;
      window._pause_range_old_value = $(this).val();
    }).on('hide.daterangepicker', function(ev, picker){
      window._pause_datatables = 0;
      if(false == ($(event.target).hasClass('applyBtn') || $(event.target).hasClass('cancelBtn'))){
        $(this).val(window._pause_range_old_value);
      }
    }).on('apply.daterangepicker', function(ev, picker) {
      window._pause_datatables = 0;
      var format = 'YYYY/MM/DD';
      if($(this).hasClass('datetime-range')) format = 'YYYY/MM/DD HH:mm:ss';
      else if($(this).hasClass('datestamp-range') || $(this).hasClass('datetimestamp-range')) format = 'X';
      $(this).val(picker.startDate.format(format) + ' - ' + picker.endDate.format(format)).trigger('change');
    }).on('cancel.daterangepicker', function(ev, picker) {
      window._pause_datatables = 0;
      $(this).val('').trigger('change');
    });
  });

  $(document).on( 'preInit.dt', function (e, settings) {
    var table = e.target;
    $(table).addClass('table').addClass('table-bordered');//.addClass('table-striped');
    if($(table).find('tfoot tr').length > 0 && $(table).find('thead tr').length < 2){
      $(table).find('tfoot tr').find('th,td').css('padding-right', '5px');
      $(table).find('thead').prepend($(table).find('tfoot').html());
      $(table).find('thead tr').eq(0).find('input,select').removeClass('input-lg').removeClass('input-sm').addClass('form-control');
      $(table).find('thead tr').eq(1).find('th,td').each(function(i, e){
        $(table).find('thead tr').eq(0).find('th,td').eq(i).find('input,select').attr('placeholder', '搜 '+$(e).text()).css('min-width', '45px');
      });
      $(table).find('tfoot').remove();
    }

    $(table).find('.date-range,.datetime-range,.datestamp-range,.datetimestamp-range').each(function(){
      // date-range 日期段检索                 数据库存的 date|datetime|timestamp
      // datetime-range 日期时间段检索         数据库存的 datetime|timestamp
      // datestamp-range 日期戳段检索          数据库存的 int
      // datetimestamp-range 日期时间戳端检索  数据库存的 int

      var format = 'YYYY/MM/DD';
      if($(this).hasClass('datetime-range')) format = 'YYYY/MM/DD HH:mm:ss';
      else if($(this).hasClass('datestamp-range') || $(this).hasClass('datetimestamp-range')) format = 'X';
      $(this).daterangepicker({
        locale: {
          applyLabel: '应用',
          cancelLabel: '清除',
          monthNames: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
          daysOfWeek: ['日','一','二','三','四','五','六'],
          format: format
        }
      }).on('show.daterangepicker', function(ev, picker){
        window._pause_datatables = 1;
        window._pause_range_old_value = $(this).val();
      }).on('hide.daterangepicker', function(ev, picker){
        window._pause_datatables = 0;
        if(false == ($(event.target).hasClass('applyBtn') || $(event.target).hasClass('cancelBtn'))){
          $(this).val(window._pause_range_old_value);
        }
      }).on('apply.daterangepicker', function(ev, picker) {
        window._pause_datatables = 0;
        var format = 'YYYY/MM/DD';
        if($(this).hasClass('datetime-range')) format = 'YYYY/MM/DD HH:mm:ss';
        else if($(this).hasClass('datestamp-range') || $(this).hasClass('datetimestamp-range')) format = 'X';
        $(this).val(picker.startDate.format(format) + ' - ' + picker.endDate.format(format)).trigger('change');
      }).on('cancel.daterangepicker', function(ev, picker) {
        window._pause_datatables = 0;
        $(this).val('').trigger('change');
      });
    });
  } );

  window._table_options_default = {
    autoWidth: false,
    sPaginationType: "full_numbers",
    aLengthMenu: [[20,50,100,500,-1],['20条','50条','100条','500条','All']], // 不显示表格信息(总条数)
    oLanguage: window._table_i18n,
    sDom: window._table_sdom,
    dom: window._table_sdom,
    bStateSave: true,
    buttons: window._table_button,
    searchDelay: 500,
    ajax: {
      error: function(e){
        bootbox.alert([
          '<p><b>出错了</b></p>',
          '<b>'+ e.status + '</b> ' + e.statusText
        ].join(''));
        return 1;
      }
    },
    initComplete: function () {
      $(this).parent().parent().on('hide', '.dataTables_processing', function(){
        if($(this).parent().find('.buttons-csv-all').attr('data-exporting') == '1'){
          $(this).parent().find('.buttons-csv-all').attr('data-exporting', '0');
          $(this).parent().find('.buttons-csv').trigger('click');
        }
      });

      var id = $(this[0]).attr('id');
      var data = JSON.parse( localStorage['DataTables_'+id+'_'+location.pathname] );
      var columns = this.api().settings().init().columns;
      this.api().columns().every( function (index) {
        var column = this;
        var header = column.header();
        var index = $(header).parent().find('th, td').toArray().indexOf(header);
        var s_p = $(header).parent().prev().find('th, td').eq(index);
        if(0 == s_p.length) s_p = $(column.footer());
        var el = $(s_p).find('input,select');
        var id = $(s_p).find('input,select').attr('id');
        var v = data.columns[index].search.search;
        if('undefined' !== typeof id){
          try{
            q = id.match(/(select|input)[\_\-](\w+)/)[2];
            if('undefined' !== typeof $.queries[q]){
              v = $.queries[q];
            }
          }catch(e){}
        }

        $(el).on('keyup change', function () {
          if(window._pause_datatables) return;
          if ($(this).val() == column.search()) return;
          var v = $(this).val();
          var regex = false;
          var fullmatch = $(this).attr('data-fullmatch');
          if('undefined' !== typeof fullmatch && fullmatch * 1 > 0 && v.length > 0){
            v = '^' + v + '$';
            regex = true;
          }
          column.search(v, regex, false, true).draw();
        } );

        var fullmatch = $(el).attr('data-fullmatch');
        if('undefined' !== typeof fullmatch && fullmatch * 1 > 0 && v.length > 0){
          try{
            v = v.match(/^\^(.*)\$$/)[1];
          }catch(e){}
        }
        $(el).val(v);
        setTimeout(function(){
          $(el).trigger('change');
        }, 100)
      } );
    }
  } ;

  $.fn.DataTable_old = $.fn.DataTable;
  $.fn.dataTable_old = $.fn.dataTable;
  delete($.fn.dataTable);
  delete($.fn.DataTable);
  $.fn.DataTable = function(a){ $.extend( true, a, window._table_options_default ); for(i in a.buttons){if('undefined' !== typeof $(this).attr('data-save-filename') && 'object' == typeof a.buttons[i]) a.buttons[i].title = $(this).attr('data-save-filename'); } return $(this).DataTable_old(a); }
  $.fn.dataTable = function(a){ $.extend( true, a, window._table_options_default ); for(i in a.buttons){if('undefined' !== typeof $(this).attr('data-save-filename') && 'object' == typeof a.buttons[i]) a.buttons[i].title = $(this).attr('data-save-filename'); } return $(this).dataTable_old(a); }

  bootbox.setDefaults({  backdrop: true, escape: true});

  $.getJSON($('meta[name="oss-url"]').attr('content'), function (json) {
    if(json.head.statusCode !== 0) return bootbox.alert('OSS 签名失败. 文件可能无法上传');
    window._upload_pk = {
      host: json.body.host,
      policy: json.body.policy,
      signature: json.body.signature,
      accessid: json.body.accessid,
      dir: json.body.dir,
      callback: json.body.callback
    };

    window.file_upload_callback = function(j){return 'https://'+json.body.host+'/'+j.body.url+'image';};
    window.file_upload_url = '//'+json.body.host;
  });

  window.file_upload_param = {
    OSSAccessKeyId: function(){return window._upload_pk.accessid},
    policy: function(){return window._upload_pk.policy},
    Signature: function(){return window._upload_pk.signature},
    key: function(uuid){ return window._upload_pk.dir + '-' + uuid + '.' + 'image'; },
    success_action_redirect: function(uuid){ return window._upload_pk.callback + '-' + uuid + '.'; },
    'Cache-Control': 'max-age=31560000',
    'Expires': (new Date((new Date()).getTime()+86400 * 3650000)).toGMTString()
  };

  $('input[type="file"],.ajax-file').not('.ajax_initlized').addClass('ajax_initlized').uploader({
    url: function(){return window.file_upload_url},
    data: function(){return window.file_upload_param},
    secureuri: true,
    filedName: 'file',
    dataType: 'json',
    minSize: 1,
    maxSize: 10*1024*1024,
    allowExt: {jpg: 1, png: 1, gif: 1, jpeg: 1, bmp: 1, rar: 1, zip: 1, '7z': 1, webp: 1, pdf: 1},
    paste: false,
    beforeUpload: function(file, nonce, dom){
      $(dom).parent().parent().find('#'+$(dom).attr('data-save-to')).val('上传中');
    },
    success: function(json, nonce, dom){
      $(dom).parent().parent().find('#'+$(dom).attr('data-save-to')).val(window.file_upload_callback(json));
    },
    error: function(file, nonce, msg, dom){
      $(dom).parent().parent().find('#'+$(dom).attr('data-save-to')).val('上传失敗');
    }
  });


  CKEDITOR.on('dialogDefinition', function (ev) {
    var editor = ev.editor;
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;
    var dialog = ev.data.definition.dialog;

    if (dialogName == 'image') {
      dialog.on('show', function () {
        this.selectPage('Upload');
        this.hidePage('info');
        for (var i in dialogDefinition.contents) {
          var contents = dialogDefinition.contents[i];
          if (contents.id == "Upload") {
            window._rf = setInterval(function() {
              if($('iframe.cke_dialog_ui_input_file').length){
                clearInterval(window._rf);
                if($('.wysiwyg_file_img:visible').length == 0){
                  $dom = $('<input/>');
                  $dom.attr({type:'file', multiple: true});
                  $dom.addClass('wysiwyg_file_img');
                  $dom.uploader({
                    url: function(){ return window.file_upload_url},
                    data: function(){ return window.file_upload_param},
                    secureuri: true,
                    filedName: 'file',
                    dataType: 'json',
                    minSize: 1,
                    maxSize: 10*1024*1024,
                    allowExt: {jpg: 1, png: 1, gif: 1, jpeg: 1, bmp: 1, rar: 1, zip: 1, '7z': 1, webp: 1, pdf: 1},
                    paste: false,
                    beforeUpload: function(file, nonce, dom){ },
                    success: function(json, nonce, dom){
                      url = window.file_upload_callback(json);

                      CKEDITOR.dialog.getCurrent() != null && CKEDITOR.dialog.getCurrent().hide();
                      editor.insertHtml('<img src="'+url+'">');
                    },
                    error: function(file, nonce, msg, dom){
                    }
                  });
                  $dom.css({
                    background: '#666',
                    width: '100%',
                    height: '120px',
                    display: 'block',
                    'text-indent': '99999px'
                  });
                  $('iframe.cke_dialog_ui_input_file:visible').after($dom);
                  $('iframe.cke_dialog_ui_input_file:visible,.cke_dialog_ui_fileButton:visible,.cke_dialog_ui_labeled_label:visible').hide();
                }
              }
            }, 50);
          }
        }
      });
      dialogDefinition.minHeight = 150;
    }
  });

  CKEDITOR.on('instanceReady', function(e){
    e.editor.on('paste', function(ev) {
    });
  });

  $('form button, form input[type="submit"]').on('click', function(){
    for(id in CKEDITOR.instances){
      $(CKEDITOR.instances[id].element.$).val(CKEDITOR.instances[id].getData());
      $(CKEDITOR.instances[id].element.$).text(CKEDITOR.instances[id].getData());
      $('[id="'+id+'"]:enabled').val(CKEDITOR.instances[id].getData());
      $('[id="'+id+'"]:enabled').text(CKEDITOR.instances[id].getData());
    }
  });

  if(false){
    $.fn.dataTableBak = $.fn.dataTable;
    $.fn.dataTable = function(a, b){
      if('function' == typeof a.drawCallback)a.drawCallbackBak = a.drawCallback;
      that = this;
      a.drawCallback = function(a){
        api = this.api();
        lengthChange = $(this).parent().find('.dataTables_length');
        if($(lengthChange).find('.btn-print').length == 0){
          $btn = $('<a></a>');
          $btn.attr('class', 'btn-print btn btn-default btn-sm');
          $btn.text('导出PDF/打印');
          $btn.on('click', function(){
            api.settings()[0].drawCallbackBak2 = api.settings()[0].drawCallback;
            api.settings()[0].drawCallback = function(){
              return;
              window.print();
              api.settings()[0].drawCallback = api.settings()[0].drawCallbackBak2;
              api.settings()[0].pageLength = 20;
              //api.draw()
            };
            //a.pageLength = -1;
            api.settings()[0].pageLength = -1;
            api.destroy();
            $(that).dataTableBak(api.settings()[0], b);
          });
          $(lengthChange).append(' ');
          $(lengthChange).append($btn);
        }
        if('function' == typeof a.drawCallbackBak){
          a.drawCallback = a.drawCallbackBak;
          a.drawCallback(a);
        }
      };
      $o = $(this).dataTableBak(a, b);
      return $o;
    };
  }


  window._paths = [];
  $('.sidebar-menu li a').each(function(){
    var url = $(this).attr('href');
    if(!/javascript\:/.test(url)){
    try{
      var url2 = url.replace(location.origin + '/admin', '');

      var g = url2.match(/\/([\w])/g);
      for(var i in g){ g[i] = g[i].substr(1); }
      url2 += '/' + g.join('');
      window._paths.push({
        id: url,
        text: $(this).text() + ' - ' + url2
      });
      }catch(e){}
    }
  });

  window.quickquery_init = function(e){
    $('#quick-q').select2({
      containerCssClass: 'select2-q-container',
      data: window._paths
    }).on('change', function(){
      location.href = $(this).val();
    });
    $('#quick-q').select2('open');

    e.preventDefault();
    e.stopPropagation();
  };
  $(window).on('keypress', function(e){
    if(e.keyCode==85 && e.shiftKey==true){
      quickquery_init(e);
    }
  });
  $('#quick-q').on('focus', window.quickquery_init);

    /**
     * 将数值四舍五入(保留2位小数)后格式化成金额形式
     *
     * @param num 数值(Number)
     * @return 金额格式的字符串,如'1,234,567.45'
     * @type String
     */
    Number.prototype.toCurrencyFormat = function toFormatCurrency() {
        num = this.toString().replace(/\$|\,/g,'');
        if(isNaN(num))
            num = "0";
        sign = (num == (num = Math.abs(num)));
        num = Math.floor(num*100+0.50000000001);
        cents = num%100;
        num = Math.floor(num/100).toString();
        if(cents<10)
            cents = "0" + cents;
        for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
            num = num.substring(0,num.length-(4*i+3))+','+
                num.substring(num.length-(4*i+3));
        return (((sign)?'':'-') + num + '.' + cents);
    };

  window._search_filter_number_and_name = function(keywords) {
    keywords = keywords.replace(/ /g, '');
    var numbers = keywords.match(/([0-9\x\X]+)/);
    var chinese = keywords.match(/([^\d^\x^\X]+)/);
    try{ numbers = numbers[0]; }catch(e){ numbers = '';}
    try{ chinese = chinese[0]; }catch(e){ chinese = '';}

    var idnbr = '';
    var phone = numbers;

    if(numbers.toString().length > 11){
      idnbr = numbers;
      phone = '';
    }
    if(numbers.substr(-1) == 'x'){
      idnbr = numbers;
      phone = '';
    }
    for(var x = 1940; x < (new Date()).getFullYear(); x ++){
      for(var y = 1; y < 12; y++){
        var a = y;
        if(y.toString().length == 1)a = '0' + y;
        if(numbers.indexOf(x + y) > -1){
          idnbr = numbers;
          phone = '';
          break;
          break;
        }
      }
    }
    return {
      name: chinese,
      idnbr: idnbr,
      phone: phone
    };
  };

  window._borrower_search_data_prepare = function (keywords) {
    var x = window._search_filter_number_and_name(keywords);
    return {
      draw:3,
      columns:[
        {data: 'name', name: 'name', searchable: true, orderable: true, search: { value: x.name, regex: false} },
        {data: 'phone', name: 'borrower.phone', searchable: true, orderable: true, search: { value: x.phone, regex: false} },
        {data: 'cert_no', name: 'borrower.cert_no', searchable: true, orderable: true, search: { value: x.idnbr, regex: false} }
      ],
      order: [{column: 0, dir: 'asc'} ],
      start:0, length:10,
      search: { value: '', regex: false},
      status:1, deleted_at:false
    };
  };

  window._ylb_user_search_data_prepare = function(keywords){
    var x = window._search_filter_number_and_name(keywords);
    return {
      length: 20,
      columns: [
        { data: 'uid', name: 'id', searchable: true, orderable: true, search: { value: '', regex: false } },
        { data: 'phone', name: 'phone', searchable: true, orderable: true, search: { value: x.phone, regex: false } },
        { data: 'realname', name: 'realname', searchable: true, orderable: true, search: { value: x.name, regex: false } },
        { data: 'idnum', name: 'idnum', searchable: true, orderable: true, search: { value: x.idnbr, regex: false } }
      ],
      search: { value: '', regex: false }
    };
  };
})(jQuery);
