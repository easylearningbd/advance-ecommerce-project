//[Preview Menu Javascript]

//Project:	Sunny Admin - Responsive Admin Template
//Primary use:   This file is for demo purposes only.

$(function () {
  'use strict'


  /**
   * Get access to plugins
   */

  $('[data-toggle="control-sidebar"]').controlSidebar()
  $('[data-toggle="push-menu"]').pushMenu()

  var $pushMenu       = $('[data-toggle="push-menu"]').data('lte.pushmenu')
  var $controlSidebar = $('[data-toggle="control-sidebar"]').data('lte.controlsidebar')
  var $layout         = $('body').data('lte.layout')

  /**
   * List of all the available themes
   *
   * @type Array
   */
  var mySkins = [
    'theme-fruit',
    'theme-purple',
    'theme-oceansky',
    'theme-rosegold',
    'theme-ultraviolet',
    'theme-botani',
    'theme-ubuntu',
    'theme-patriot',
    'theme-vintage',
    'theme-mint',
    'theme-deepocean',
    'theme-school',
    'theme-leaf',
    'theme-metalred',
    'theme-grey',
  ]

  /**
   * Get a prestored setting
   *
   * @param String name Name of of the setting
   * @returns String The value of the setting | null
   */
  function get(name) {
    if (typeof (Storage) !== 'undefined') {
      return localStorage.getItem(name)
    } else {
      window.alert('Please use a modern browser to properly view this template!')
    }
  }

  /**
   * Store a new settings in the browser
   *
   * @param String name Name of the setting
   * @param String val Value of the setting
   * @returns void
   */
  function store(name, val) {
    if (typeof (Storage) !== 'undefined') {
      localStorage.setItem(name, val)
    } else {
      window.alert('Please use a modern browser to properly view this template!')
    }
  }

  /**
   * Toggles layout classes
   *
   * @param String cls the layout class to toggle
   * @returns void
   */
  function changeLayout(cls) {
    $('body').toggleClass(cls)
    if ($('body').hasClass('fixed') && cls == 'fixed') {
      $pushMenu.expandOnHover()
      $layout.activate()
    }
    $controlSidebar.fix()
  }

  /**
   * Replaces the old skin with the new skin
   * @param String cls the new skin class
   * @returns Boolean false to prevent link's default action
   */
  function changeSkin(cls) {
    $.each(mySkins, function (i) {
      $('body').removeClass(mySkins[i])
    })

    $('body').addClass(cls)
    store('theme', cls)
    return false
  }

  /**
   * Retrieve default settings and apply them to the template
   *
   * @returns void
   */
  function setup() {
    var tmp = get('theme')
    if (tmp && $.inArray(tmp, mySkins))
      changeSkin(tmp)

    // Add the change skin listener
    $('[data-theme]').on('click', function (e) {
      if ($(this).hasClass('knob'))
        return
      e.preventDefault()
      changeSkin($(this).data('theme'))
    })

    // Add the layout manager
    $('[data-layout]').on('click', function () {
      changeLayout($(this).data('layout'))
    })

    $('[data-controlsidebar]').on('click', function () {
      changeLayout($(this).data('controlsidebar'))
      var slide = !$controlSidebar.options.slide

      $controlSidebar.options.slide = slide
      if (!slide)
        $('.control-sidebar').removeClass('control-sidebar-open')
    })


    $('[data-enable="expandOnHover"]').on('click', function () {
      $(this).attr('disabled', true)
      $pushMenu.expandOnHover()
      if (!$('body').hasClass('sidebar-collapse'))
        $('[data-layout="sidebar-collapse"]').click()
    })

    $('[data-enable="rtl"]').on('click', function () {
      $(this).attr('disabled', true)
      $pushMenu.expandOnHover()
      if (!$('body').hasClass('rtl'))
        $('[data-layout="rtl"]').click()
    })

	  	

    $('[data-mainsidebarskin="toggle"]').on('click', function () {
      var $sidebar = $('body')
      if ($sidebar.hasClass('dark-skin')) {
        $sidebar.removeClass('dark-skin')
        $sidebar.addClass('light-skin')
      } else {
        $sidebar.removeClass('light-skin')
        $sidebar.addClass('dark-skin')
      }
    })

    //  Reset options
    if ($('body').hasClass('fixed')) {
      $('[data-layout="fixed"]').attr('checked', 'checked')
    }
    if ($('body').hasClass('layout-boxed')) {
      $('[data-layout="layout-boxed"]').attr('checked', 'checked')
    }
    if ($('body').hasClass('sidebar-collapse')) {
      $('[data-layout="sidebar-collapse"]').attr('checked', 'checked')
    }
    if ($('body').hasClass('rtl')) {
      $('[data-layout="rtl"]').attr('checked', 'checked')
    }
   // if ($('body').hasClass('dark')) {
//      $('[data-layout="dark"]').attr('checked', 'checked')
//    }

  }

  // Create the new tab
  var $tabPane = $('<div />', {
    'id'   : 'control-sidebar-theme-demo-options-tab',
    'class': 'tab-pane active'
  })

  // Create the tab button
  var $tabButton = $('<li />', { 'class': 'nav-item' })
    .html('<a href=\'#control-sidebar-theme-demo-options-tab\' class=\'active\' data-toggle=\'tab\'>'
      + 'Settings'
      + '</a>')

  // Add the tab button to the right sidebar tabs
  $('[href="#control-sidebar-home-tab"]')
    .parent()
    .before($tabButton)

  // Create the menu
  var $demoSettings = $('<div />')
  
    // Layout options
  $demoSettings.append(
    '<h4 class="control-sidebar-heading">'
    + 'Background Size'
    + '</h4>'
	  
    // Theme Skin Toggle	  
	+ '<div class="flexbox mb-10 pb-10 bb-1">'
	+ '<label class="control-sidebar-subheading w-p100 mt-5">'
    + 'Choose Size'
    + '</label>'
	+ '<select id="bg-size" class="bg-size custom-select">'
	+ '<option value="full">Full</option>'
    + '<option value="half" selected="">Half</option>'
    + '<option value="header">Header</option>'
    + '</select>'
	+ '</div>'
	  
	
  )
	
  
  // Layout options
  $demoSettings.append(
    '<h4 class="control-sidebar-heading">'
    + 'Dark or Light Skin'
    + '</h4>'
	  
    // Theme Skin Toggle	  
	+ '<div class="flexbox mb-10 pb-10 bb-1">'
	+ '<label for="toggle_left_sidebar_skin" class="control-sidebar-subheading">'
    + 'Turn Dark/Light'
    + '</label>'
	+ '<label class="switch switch-border switch-danger">'
	+ '<input type="checkbox" data-mainsidebarskin="toggle" id="toggle_left_sidebar_skin">'
	+ '<span class="switch-indicator"></span>'
	+ '<span class="switch-description"></span>'
	+ '</label>'
	+ '</div>'
	  
	
  )
	
  // Layout options
  $demoSettings.append(
    '<h4 class="control-sidebar-heading">'
    + 'RTL or LTR'
    + '</h4>'
	  
    // rtl layout
	+ '<div class="flexbox mb-10 pb-10 bb-1">'
	+ '<label for="rtl" class="control-sidebar-subheading">'
    + 'Turn RTL/LTR'
    + '</label>'
	+ '<label class="switch switch-border switch-danger">'
	+ '<input type="checkbox" data-layout="rtl" id="rtl">'
	+ '<span class="switch-indicator"></span>'
	+ '<span class="switch-description"></span>'
	+ '</label>'
	+ '</div>'
  )


  // Layout options
  $demoSettings.append(
    '<h4 class="control-sidebar-heading">'
    + 'Layout Options'
    + '</h4>'
	  
	  
    // Fixed layout
	+ '<div class="flexbox mb-10">'
	+ '<label for="layout_fixed" class="control-sidebar-subheading">'
    + 'Fixed layout'
    + '</label>'
	+ '<label class="switch switch-border switch-danger">'
	+ '<input type="checkbox" data-layout="fixed" id="layout_fixed">'
	+ '<span class="switch-indicator"></span>'
	+ '<span class="switch-description"></span>'
	+ '</label>'
	+ '</div>'	
	  
    // Boxed layout
	+ '<div class="flexbox mb-10">'
	+ '<label for="layout_boxed" class="control-sidebar-subheading">'
    + 'Boxed Layout'
    + '</label>'
	+ '<label class="switch switch-border switch-danger">'
	+ '<input type="checkbox" data-layout="layout-boxed" id="layout_boxed">'
	+ '<span class="switch-indicator"></span>'
	+ '<span class="switch-description"></span>'
	+ '</label>'
	+ '</div>'
	  
    // Sidebar Toggle
	+ '<div class="flexbox mb-10">'
	+ '<label for="toggle_sidebar" class="control-sidebar-subheading">'
    + 'Toggle Sidebar'
    + '</label>'
	+ '<label class="switch switch-border switch-danger">'
	+ '<input type="checkbox" data-layout="sidebar-collapse" id="toggle_sidebar">'
	+ '<span class="switch-indicator"></span>'
	+ '<span class="switch-description"></span>'
	+ '</label>'
	+ '</div>'	  
    
    // Control Sidebar Toggle
	+ '<div class="flexbox mb-10">'
	+ '<label for="toggle_right_sidebar" class="control-sidebar-subheading">'
    + 'Toggle Right Sidebar Slide'
    + '</label>'
	+ '<label class="switch switch-border switch-danger">'
	+ '<input type="checkbox" data-controlsidebar="control-sidebar-open" id="toggle_right_sidebar">'
	+ '<span class="switch-indicator"></span>'
	+ '<span class="switch-description"></span>'
	+ '</label>'
	+ '</div>'	  
	
  )
  
  var $skinsList = $('<ul />', { 'class': 'list-inline clearfix theme-switch' })

  // Dark sidebar skins
  var $themeFruit =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-fruit" style="display: inline-block;vertical-align: middle;" class="clearfix active bg-gradient-fruit rounded w-40 h-80" title="Theme Fruit">'
            + '</a>')
  $skinsList.append($themeFruit)
	
  var $themePurple =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-purple" style="display: inline-block;vertical-align: middle;" class="clearfix bg-gradient-purple rounded w-40 h-80" title="Theme Purple">'
            + '</a>')
  $skinsList.append($themePurple)
	
  var $themeOceansky =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-oceansky" style="display: inline-block;vertical-align: middle;" class="clearfix bg-gradient-oceansky rounded w-40 h-80" title="Theme Oceansky">'
            + '</a>')
  $skinsList.append($themeOceansky)
	
  var $themeRosegold =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-rosegold" style="display: inline-block;vertical-align: middle;" class="clearfix bg-gradient-rosegold rounded w-40 h-80" title="Theme Rosegold">'
            + '</a>')
  $skinsList.append($themeRosegold)
	
  var $themeUltraviolet =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-ultraviolet" style="display: inline-block;vertical-align: middle;" class="clearfix bg-gradient-ultraviolet rounded w-40 h-80" title="Theme Ultraviolet">'
            + '</a>')
  $skinsList.append($themeUltraviolet)
	
  var $themeBotani =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-botani" style="display: inline-block;vertical-align: middle;" class="clearfix bg-gradient-botani rounded w-40 h-80" title="Theme Botani">'
            + '</a>')
  $skinsList.append($themeBotani)
	
  var $themeUbuntu =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-ubuntu" style="display: inline-block;vertical-align: middle;" class="clearfix bg-gradient-ubuntu rounded w-40 h-80" title="Theme Ubuntu">'
            + '</a>')
  $skinsList.append($themeUbuntu)
	
  var $themePatriot =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-patriot" style="display: inline-block;vertical-align: middle;" class="clearfix bg-gradient-patriot rounded w-40 h-80" title="Theme Patriot">'
            + '</a>')
  $skinsList.append($themePatriot)
	
  var $themeVintage =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-vintage" style="display: inline-block;vertical-align: middle;" class="clearfix bg-gradient-vintage rounded w-40 h-80" title="Theme Vintage">'
            + '</a>')
  $skinsList.append($themeVintage)
	
  var $themeMint =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-mint" style="display: inline-block;vertical-align: middle;" class="clearfix bg-gradient-mint rounded w-40 h-80" title="Theme Mint">'
            + '</a>')
  $skinsList.append($themeMint)
	
  var $themeDeepocean =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-deepocean" style="display: inline-block;vertical-align: middle;" class="clearfix bg-gradient-deepocean rounded w-40 h-80" title="Theme Deepocean">'
            + '</a>')
  $skinsList.append($themeDeepocean)
	
  var $themeSchool =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-school" style="display: inline-block;vertical-align: middle;" class="clearfix bg-gradient-school rounded w-40 h-80" title="Theme School">'
            + '</a>')
  $skinsList.append($themeSchool)
	
  var $themeLeaf =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-leaf" style="display: inline-block;vertical-align: middle;" class="clearfix bg-gradient-leaf rounded w-40 h-80" title="Theme Leaf">'
            + '</a>')
  $skinsList.append($themeLeaf)
	
  var $themeMetalred =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-metalred" style="display: inline-block;vertical-align: middle;" class="clearfix bg-gradient-metalred rounded w-40 h-80" title="Theme Metalred">'
            + '</a>')
  $skinsList.append($themeMetalred)
	
  var $themeGrey =
        $('<li />', { style: 'padding: 5px;line-height: 25px;' })
          .append('<a href="javascript:void(0)" data-theme="theme-grey" style="display: inline-block;vertical-align: middle;" class="clearfix bg-gradient-grey rounded w-40 h-80" title="Theme Grey">'
            + '</a>')
  $skinsList.append($themeGrey)
	

  

  $demoSettings.append('<h4 class="control-sidebar-heading">Theme Colors</h4>')
  $demoSettings.append($skinsList)

  $tabPane.append($demoSettings)
  $('#control-sidebar-home-tab').after($tabPane)

  setup()

  $('[data-toggle="tooltip"]').tooltip()
});// End of use strict

$(function () {
  'use strict'
	
	$('.theme-switch li a').click(function () {
		$('.theme-switch li a').removeClass('active').addClass('inactive');
		$(this).toggleClass('active inactive');
	});
	
});// End of use strict


$(function () {
  'use strict'	
 	$('.bg-size').on('change',function(){
		var $this = $(this),
		width_val = this.value,
		wrapper = $('body');

		if(width_val === 'full'){
			$(wrapper).removeClass('onlyheader').addClass('onlyfull');
		}
		else if(width_val === 'header'){
			$(wrapper).removeClass('onlyfull').addClass('onlyheader');
		}
		else{
			$(wrapper).removeClass('onlyfull onlyheader');
		}
	});
});// End of use strict