'use strict'
angular.module 'ngLocale', [], [
  '$provide'
  ($provide) ->
    PLURAL_CATEGORY =
      ZERO: 'zero'
      ONE: 'one'
      TWO: 'two'
      FEW: 'few'
      MANY: 'many'
      OTHER: 'other'
    $provide.value '$locale',
      'DATETIME_FORMATS':
        'AMPMS': [
          'a. m.'
          'p. m.'
        ]
        'DAY': [
          'domingo'
          'lunes'
          'martes'
          'miércoles'
          'jueves'
          'viernes'
          'sábado'
        ]
        'ERANAMES': [
          'antes de Cristo'
          'después de Cristo'
        ]
        'ERAS': [
          'a. C.'
          'd. C.'
        ]
        'FIRSTDAYOFWEEK': 6
        'MONTH': [
          'Enero'
          'Febrero'
          'Marzo'
          'Abril'
          'Mayo'
          'Junio'
          'Julio'
          'Agosto'
          'Septiembre'
          'Octubre'
          'Noviembre'
          'Diciembre'
        ]
        'SHORTDAY': [
          'dom.'
          'lun.'
          'mar.'
          'mié.'
          'jue.'
          'vie.'
          'sáb.'
        ]
        'SHORTMONTH': [
          'Ene'
          'Feb'
          'Mar'
          'Abr'
          'May'
          'Jun'
          'Jul'
          'Ago'
          'Sep'
          'Oct'
          'Nov'
          'Dic'
        ]
        'WEEKENDRANGE': [
          5
          6
        ]
        'fullDate': 'EEEE, d \'de\' MMMM \'de\' y'
        'longDate': 'd \'de\' MMMM \'de\' y'
        'medium': 'd/MM/y h:mm:ss a'
        'mediumDate': 'd/MM/y'
        'mediumTime': 'h:mm:ss a'
        'short': 'd/MM/yy h:mm a'
        'shortDate': 'd/MM/yy'
        'shortTime': 'h:mm a'
      'NUMBER_FORMATS':
        'CURRENCY_SYM': '$'
        'DECIMAL_SEP': ','
        'GROUP_SEP': '.'
        'PATTERNS': [
          {
            'gSize': 3
            'lgSize': 3
            'maxFrac': 3
            'minFrac': 0
            'minInt': 1
            'negPre': '-'
            'negSuf': ''
            'posPre': ''
            'posSuf': ''
          }
          {
            'gSize': 3
            'lgSize': 3
            'maxFrac': 2
            'minFrac': 2
            'minInt': 1
            'negPre': '-¤'
            'negSuf': ''
            'posPre': '¤'
            'posSuf': ''
          }
        ]
      'id': 'es-co'
      'pluralCat': (n, opt_precision) ->
        if n == 1
          return PLURAL_CATEGORY.ONE
        PLURAL_CATEGORY.OTHER
    return
]

# ---
# generated by js2coffee 2.1.0