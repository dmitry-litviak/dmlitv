laravel =

  initialize: ->
    @methodLinks = $('a[data-method]')
    @registerEvents()
    return

  registerEvents: ->
    @methodLinks.on 'click', @handleMethod
    return

  handleMethod: (e) ->
    link = $(this)
    httpMethod = link.data('method').toUpperCase()
    form = undefined
    # If the data-method attribute is not PUT or DELETE,
    # then we don't know what to do. Just ignore.
    if $.inArray(httpMethod, [
      'PUT'
      'DELETE'
    ]) == -1
      return
    # Allow user to optionally provide data-confirm="Are you sure?"
    if link.data('confirm')
      if !laravel.verifyConfirm(link)
        return false
    form = laravel.createForm(link)
    form.submit()
    e.preventDefault()
    return

  verifyConfirm: (link) ->
    confirm link.data('confirm')

  createForm: (link) ->
    form = $('<form>',
      'method': 'POST'
      'action': link.attr('href'))
    token = $('<input>',
      'type': 'hidden'
      'name': '_token'
      'value': $('meta[name="csrf-token"]').attr('content'))
    hiddenInput = $('<input>',
      'name': '_method'
      'type': 'hidden'
      'value': link.data('method'))
    form.append(token, hiddenInput).appendTo 'body'

$(document).ready ->
  NProgress.start()

  $('#menu-link').sidr
    side: 'right'

#  laravel.initialize()
  $('.language-switch').click (e) ->
    e.preventDefault()
    $.ajax
      url: $(this).attr('href')
      type: 'PUT'
      dataType : 'html'
      data:
        '_token': $('meta[name="csrf-token"]').attr('content')
      success: (res) ->
        location.reload true
        return
      error: (res) ->
        location.reload true
        return

$(window).load ->
  NProgress.done()
  return