class ServiceSchema extends Constant
  constructor: () ->
    schema =
      id:
        numericality: true

      service_status_id:
        numericality: true

      service_type_id:
        numericality: true
        presence: true

      customer_id:
        numericality: true
        presence: true

      customer_address_id:
        numericality: true
        presence: true

      city_id:
        numericality: true
        presence: true

      map:
        url: true
        presence: true

      date_type:
        presence: true

      start_at:
        presence: true

      end_at:
        presence: true

      duration:
        numericality: true
        presence: true

      address:
        presence: true

      latitude:
        presence: true

      longitude:
        presence: true

      assignment_type:
        presence: true

      observations:
        presence: false

      assignments:
        presence: false

      users:
        presence: false

      items:
        presence: false

      extra:
        presence: false


    return schema