###*
  * Your JS/CoffeeScript goes here
  * Components like custom classes are in components/
  * Third party libraries are in vendor/ or /bower_components/
  *
  * For CoffeeScript style guide please refer to
  * https://github.com/MBV-Media/CoffeeScript-Style-Guide
  *
  * @since 1.0.0
  * @author R4c00n <marcel.kempf93@gmail.com>
  * @license MIT
###
'use strict'

jQuery ($) ->

  $window = $(window)
  $document = $(document)

  ###
    * Initialize modules/plugins/etc.
    *
    * @since 1.0.0
    * @return {void}
  ###
  init = ->
    $document.foundation()
    return

  ###
    * Register listeners to all kind of events.
    *
    * @since 2.3.1
    * @return {void}
  ###
  registerEventListeners = ->
    $window.on 'load', onWindowLoad
    $document.on 'mousewheel', stopPageScoll
    $document.on 'toggled.zf.responsiveToggle', '.responsive-menu-toggle',
        toggleBodyScrollBar
    $document.on 'click', '.page-scroll a', pageScroll
    return

  ###
    * Logs a 'Website loaded.' info text.
    *
    * @since 2.3.1
    * @return {void}
  ###
  onWindowLoad = (event) ->
    scrollToPage()
    return

  toggleBodyScrollBar = (event) ->
    $(@).toggleClass('active')
    $('body').toggleClass('overflow-hidden')
    $('#responsive-menu').toggleClass('active')

  pageScroll = (event) ->
    pageId = $(@).data( 'page-id' )
    target = $('.page-anchor-' + pageId)

    if target.length > 0
      event.preventDefault()
      hamburgerMenu = $('.responsive-menu-toggle')
      if hamburgerMenu.hasClass 'active'
        hamburgerMenu.find('button').trigger 'click'
      targetOffset = target.offset().top
      $('html,body').animate {scrollTop: targetOffset}, 1000

  stopPageScoll = ->
    $('html,body').stop()
    $document.off 'mousewheel'

  # scroll to page in url
  scrollToPage = ->
    url = $(location).attr 'href'
    $( '.page-scroll.menu-item a[href="' + url + '"]').trigger 'click'


  init()
  registerEventListeners()
