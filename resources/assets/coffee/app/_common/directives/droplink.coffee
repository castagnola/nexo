class NexoSidebar extends Directive
  constructor: ($timeout) ->
    link = (scope, element) ->
      sidebar = $(element).find('.sidebar')
      accordion = sidebar.find('.accordion-menu')
      items = accordion.find('> li')

      closeSubmenu = (duration) ->
        items.not('.active').find('.sub-menu').slideUp(duration or 0)


      openSubmenu = ->

        li = $(this).parent()

        items.removeClass('active')
        li.addClass('active')

        closeSubmenu(200)

        if li.hasClass 'droplink'
          submenu = $(this).next()
          submenu.slideDown()

      items.find('> a').click(openSubmenu)

      closeSubmenu()


    directive =
      link: link

    return directive