


<input type="text" ng-model="model[options.key]" placeholder="Escriba para buscar la ciudad"
       uib-typeahead="city as city.name for city in getCities($viewValue)"
       typeahead-loading="loadingLocations"
       typeahead-no-results="noResults"
       typeahead-editable="false"
       autocomplete="off"
       class="form-control">

<i ng-show="loadingLocations" class="glyphicon glyphicon-refresh"></i>

<div ng-show="noResults">
    <i class="glyphicon glyphicon-remove"></i> No se encontraron ciudades
</div>
