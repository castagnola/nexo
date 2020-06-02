class PollForm extends Controller
  constructor: ($scope) ->
    @questions = []

    @addQuestion = ->
      @questions.push({
        id: _.uniqueId('temp-question-')
        type: 'open',
        options: [{
          id: _.uniqueId('temp-option')
          is_temp: true
        }]
      })

    @removeQuestion = (question) ->
      _.remove(@questions, {id: question.id})

    @removeOption = (question, option) ->
      _.remove(question.options, {id: option.id, is_temp: true})


    @addOption = (question) ->
      question.options.push({
        id: _.uniqueId('temp-option')
        is_temp: true
      })


    @addQuestion() unless @questions.length


    @submit = () ->
      $form = $('#nexo-polls-form')

      $form[0].submit()

