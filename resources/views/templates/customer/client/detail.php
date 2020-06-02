<clientes-editar-page customer="::$resolve.customer" class="ng-scope ng-isolate-scope">
    <form name="vm.form" autocomplete="off" ng-submit="vm.onSubmit()" novalidate="" class="ng-pristine ng-valid ng-valid-required" style="">
        <md-toolbar class="md-toolbar-grey">
            <div class="md-toolbar-tools">
                <span flex="" class="flex"></span>

                <a class="md-raised nd-default md-button md-ink-ripple" ui-sref="clientes" href="#/clientes" aria-label="Cancelar"><span class="ng-scope" translate="GLOBAL.CANCELAR"></span></a>
                <button class="md-raised md-primary md-button md-nexo-theme md-ink-ripple" type="submit" md-theme="nexo" aria-label="Guardar"><span class="ng-scope" translate="GLOBAL.GUARDAR"></span></button>
            </div>
        </md-toolbar>
        <md-content layout="row" layout-margin layout-xs="column">
            <!-- basic -->
            <div flex>
                <div class="md-nx-panel md-whiteframe-1dp" md-whiteframe="1">
                    <md-toolbar>
                        <div class="md-toolbar-tools">
                            <h5 translate="PAGES.ASIGNACIONES.INFORMACION_GENERAL"></h5>
                        </div>
                    </md-toolbar>
                    <md-content layout="column" layout-padding="" class="layout-padding layout-column">
                        <div ngf-select ngf-change="openResizeImageDialog($files, $file, $newFiles, $duplicateFiles, $invalidFiles, $event)"     ngf-drop ng-model="image" accept="image/*" ngf-pattern="image/*" class="nx-image-field" layout="column"     layout-align="center center">
                            <md-icon md-svg-icon="file-image" ng-hide="!!croppedDataUrl"></md-icon>
                            <div class="md-caption" ng-hide="!!croppedDataUrl">        
                                [[ to.placeholder || 'Seleccione o arrastre la imagen' ]]       
                            </div>  
                            <img ng-src="[[croppedDataUrl]]" ng-if="croppedDataUrl" />
                        </div>
                        <ng-form class="formly ng-pristine ng-valid ng-isolate-scope" name="formly_1" role="form" model="vm.model" fields="vm.fields.basic" form="vm.form">
                            <div formly-field="" ng-repeat="field in vm.fields.basic " ng-if="!field.hide" class="formly-field ng-scope ng-isolate-scope formly-field-input" options="field" model="field.model || model" original-model="model" fields="fields" form="theFormlyForm" form-id="formly_1" form-state="options.formState" form-options="options" index="$index">
                                <md-input-container class="md-block ng-scope md-input-has-value" md-theme="">
                                    <label for="vm.form_input_first_name_0" class="ng-binding">[[ field.templateOptions.label ]]</label>
                                    <input ng-model="vm.model[field.key]" formly-custom-validation="" required="true" ng-disabled="field.templateOptions['disabled']" type="text" class="ng-pristine ng-valid md-input ng-not-empty ng-valid-required ng-touched" aria-invalid="false" style="">
                                </md-input-container>
                            </div>
                        </ng-form>
                    </md-content>
                </div>
                <div class="md-nx-panel md-whiteframe-1dp" md-whiteframe="1">
                    <md-toolbar>
                        <div class="md-toolbar-tools">
                            <h5 translate="FORMS.USER.CONTRASENA"></h5>
                        </div>
                    </md-toolbar>
                    <md-content layout="column" layout-padding="" class="layout-padding layout-column">
                        <ng-form class="formly ng-pristine ng-valid ng-isolate-scope" name="formly_1" role="form" model="vm.model" fields="vm.fields.password" form="vm.form">
                            <div formly-field="" ng-repeat="field in vm.fields.password " ng-if="!field.hide" class="formly-field ng-scope ng-isolate-scope formly-field-input" options="field" model="field.model || model" original-model="model" fields="fields" form="theFormlyForm" form-id="formly_1" form-state="options.formState" form-options="options" index="$index">
                                <md-input-container class="md-block ng-scope md-input-has-value" md-theme="">
                                    <label for="vm.form_input_first_name_0" class="ng-binding">[[ field.templateOptions.label ]]</label>
                                    <input ng-model="vm.model[field.key]" formly-custom-validation="" required="true" ng-disabled="field.templateOptions['disabled']" class="ng-pristine ng-valid md-input ng-not-empty ng-valid-required ng-touched" aria-invalid="false" style="" type="password">
                                </md-input-container>
                            </div>
                        </ng-form>
                    </md-content>
                </div>
            </div>
            <!-- end basic -->
            <!-- advanced -->
            <div flex>
                <div class="md-nx-panel mb md-whiteframe-1dp" md-whiteframe="1">
                    <md-toolbar>
                        <div class="md-toolbar-tools">
                            <h5>Direcciones</h5>
                        </div>
                    </md-toolbar>
                    <md-content layout="column" layout-padding="" class="layout-padding layout-column">
                        <ng-form class="formly ng-pristine ng-valid ng-isolate-scope" name="formly_2" role="form" model="vm.model" fields="vm.fields.addresses" form="vm.form">
                            <div formly-field=""  class="formly-field ng-scope ng-isolate-scope formly-field-repeatSection">
                                <div class="column ng-scope">
                                    <div ng-repeat="(key, addresses) in vm.model.addresses.data track by $index"> 
                                        <div class="repeatsection ng-scope" ng-if="addresses.isReady">
                                            <div layout="row" layout-fill="" class="layout-fill layout-row">
                                                <h4 flex="" class="ng-binding flex">Dirección #[[ key+1 ]]</h4>
                                                <div flex="" class="ta-r flex"> 
                                                    <button class="md-raised md-button md-ink-ripple" type="button" ng-click="vm.model.addresses.data.splice(key, 1)" aria-label="Eliminar" aria-hidden="false">
                                                        <span class="ng-scope">Eliminar</span>
                                                        <div class="md-ripple-container"></div>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="formly ng-pristine ng-valid ng-isolate-scope" name="formly_4" role="form" ng-repeat="field in vm.fields.addresses.templateOptions.fields" form="form">
                                                    <div ng-if="field.type == 'address'">
                                                        <h5 class="noteAddress ng-scope">Nota: Se debe colocar la dirección y la ciudad para que la busqueda sea mas exacta<br><br>Ejemplo: Cl. 22 #2-45, Bogotá</h5>
                                                        <md-input-container class="md-block ng-scope md-nexo-theme md-input-has-placeholder md-input-has-value">
                                                            <input ng-change="changeAddress(this,addresses,key)" ng-model="addresses[field.key]" formly-custom-validation="" required="true"  type="text" class="ng-pristine ng-valid md-input ng-not-empty ng-valid-required ng-touched">
                                                        </md-input-container>
                                                        <ui-gmap-google-map center='addresses.maps.center' zoom='map.zoom'  control="addresses.maps.control" draggable="true" options="options" idkey="addresses.maps.id">
                                                            <ui-gmap-marker coords="addresses.marker.coords" options="addresses.marker.options" events="markersEvents" idkey="addresses.marker.id"></ui-gmap-marker>
                                                        </ui-gmap-google-map>
                                                    </div>
                                                    <div ng-if="field.type == 'textarea'">
                                                        <md-input-container class="md-block ng-scope">
                                                            <label class="ng-binding">Observaciones</label>
                                                            <textarea ng-model="addresses[field.key]" class="ng-pristine ng-valid md-input ng-empty ng-touched" rows="1" style="height: 30px;"></textarea>
                                                        </md-input-container>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="md-raised md-button md-ink-ripple" type="button"  ng-click="addNew()"><span class="ng-binding ng-scope">Agregar otra dirección</span></button>
                                </div>
                            </div>
                        </ng-form>
                    </md-content>
                </div>
                <div class="md-nx-panel md-whiteframe-1dp" md-whiteframe="1">
                    <md-toolbar>
                        <div class="md-toolbar-tools">
                            <h5>Teléfonos</h5>
                        </div>
                    </md-toolbar>
                    <md-content layout="column" layout-padding="" class="layout-padding layout-column">
                        <ng-form class="formly ng-pristine ng-valid ng-isolate-scope" name="formly_3" role="form" model="vm.model" fields="vm.fields.phones" form="vm.form">
                            <div formly-field=""  class="formly-field ng-scope ng-isolate-scope formly-field-repeatSection" options="field" model="field.model || model" original-model="model" fields="fields" form="theFormlyForm" form-id="formly_3" form-state="options.formState" form-options="options" index="$index">
                                <div class="column ng-scope">
                                    <div ng-repeat="(key, phones) in vm.model.phones.data track by $index">
                                        <div layout="row" layout-fill="" class="layout-fill layout-row">
                                                <h4 flex="" class="ng-binding flex">Teléfono #[[ key+1 ]]</h4>
                                                <div flex="" class="ta-r flex">
                                                    <button class="md-raised md-button md-ink-ripple ng-hide" type="button" ng-click="model[options.key].splice($index, 1)" ng-show="model[options.key].length > 1" aria-label="Eliminar" aria-hidden="true"><span class="ng-scope">
                                                        Eliminar
                                                    </span></button>
                                                </div>
                                        </div>
                                        <div class="repeatsection ng-scope" ng-repeat="field in vm.fields.phones.templateOptions.fields">
                                            <ng-form class="formly ng-pristine ng-valid ng-isolate-scope" name="formly_5" role="form" fields="fields" model="element" form="form">
                                                <div ng-if="field.type == 'select'">
                                                    <div formly-field="" class="formly-field ng-scope ng-isolate-scope formly-field-select"  form-id="formly_5">
                                                        <md-input-container class="md-block ng-scope md-input-has-value" md-theme="">
                                                            <md-select ng-model="phones.type.slug" placeholder="[[ field.templateOptions.label ]]">
                                                                <md-option ng-value="option.slug" ng-repeat="option in field.templateOptions.options" ng-selected="phones.type.slug == option.slug">[[ option.name ]]</md-option>
                                                            </md-select>
                                                        </md-input-container>
                                                    </div>
                                                </div>
                                                <div ng-if="field.type == 'input'">
                                                        <md-input-container class="md-block ng-scope md-input-has-value" md-theme="">
                                                            <label for="phone_1_3function" class="ng-binding">Teléfono</label>
                                                            <input ng-model="phones[field.key]" id="[phone-type]" type="text" class="ng-pristine ng-untouched ng-valid md-input ng-not-empty ng-valid-required" aria-invalid="false">
                                                        </md-input-container>
                                                </div>
                                            </ng-form>
                                        </div>
                                    </div>
                                    <button class="md-raised md-button md-ink-ripple" type="button" ng-click="addNewPhone()" aria-label="Agregar otro teléfono">
                                            <span class="ng-binding ng-scope">Agregar otro teléfono</span>
                                    </button>
                                </div>
                            </div>
                        </ng-form>
                    </md-content>
                </div>
            </div>
        </md-content>
    </form>
</clientes-editar-page>