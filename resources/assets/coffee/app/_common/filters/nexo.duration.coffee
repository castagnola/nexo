class NexoDuration extends Filter
  constructor: () ->
    return (value) ->
      duration = moment.duration value
      hours = duration.hours()
      minutes = duration.minutes()
      humanize = ''

      if hours > 0
        humanize = moment.duration(hours, 'h').humanize()

      if hours > 0 and minutes > 0
        humanize += ' y '

      if minutes > 0
        humanize += moment.duration(minutes, 'm').humanize()

      return humanize
