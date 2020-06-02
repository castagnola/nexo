<encuestas-ver-page class="ng-scope ng-isolate-scope">
    <form name="vm.form" autocomplete="off" ng-submit="vm.onSubmit()" novalidate="" class="ng-pristine ng-valid ng-valid-required">
        <md-toolbar class="md-toolbar-grey">
            <div class="md-toolbar-tools">
                <h3>
                    <span class="ng-binding">[[ vm.item.name ]]</span>
                    <div star-rating rating="starRating" read-only="false" max-rating="5" click="click(param)" mouse-hover="mouseHover(param)" mouse-leave="mouseLeave(param)"></div>
                </h3>
                <span flex="" class="flex"></span>
                <a class="md-raised nd-default md-button md-ink-ripple" ui-sref="productos.categorias" href="#/customer" aria-label="Cancelar"><span class="ng-scope">Cancelar</span></a>
                <button class="md-raised md-primary md-button md-nexo-theme md-ink-ripple" type="submit" md-theme="nexo" aria-label="Guardar"><span class="ng-scope">Guardar</span><div class="md-ripple-container"></div></button>
            </div>
        </md-toolbar>

        <div class="md-padding">
            <md-content layout="row" layout-margin="" layout-wrap="" layout-fill="" class="layout-fill layout-margin layout-wrap layout-row">
                <div flex="" class="flex">
                    <div class="md-nx-panel md-whiteframe-1dp" md-whiteframe="1">
                        <div class="md-nx-panel md-whiteframe-1dp" md-whiteframe="1">
                            <md-content layout="row" layout-padding="" class="layout-padding layout-row">
                                <div flex="100" class="flex-100">
                                    <ng-form class="formly ng-pristine ng-valid ng-isolate-scope" name="formly_1" role="form" model="vm.model" fields="vm.item.questions.data" form="vm.form">
                                        <input type="hidden" ng-model="vm.model.poll_id" value="[[ vm.poll ]]">
                                        <input type="hidden" ng-model="vm.model.customer_id" value="[[ vm.customer.id ]]">
                                        <div formly-field="" ng-repeat="(key, field) in vm.item.questions.data" class="formly-field ng-scope ng-isolate-scope formly-field-input" options="field" model="field.model || model" original-model="model" fields="fields" form="theFormlyForm" form-id="formly_1" form-state="options.formState" form-options="options" index="$index">
                                            <input type="hidden"  ng-init="vm.model.questions[key].id=field.id" ng-model="vm.model.questions[key].id" value="[[ field.id ]]" >
                                            <md-input-container class="md-block ng-scope md-input-has-value" md-theme="">
                                                <label for="vm.form_input_name_0" class="ng-binding">
                                                    [[ field.question ]]
                                                </label>
                                                <textarea ng-model="vm.model.questions[key].answer" id="vm.form_input_name_0" formly-custom-validation="" required="true"  type="text" class="ng-pristine ng-untouched ng-valid md-input ng-not-empty ng-valid-required" ng-if="field.type == 'open'"></textarea> 
                                                <md-select ng-model="vm.model.questions[key].poll_option_id" placeholder="[[ field.question ]]" ng-if="field.type == 'multiple'">
                                                    <md-option ng-value="option.id" ng-repeat="option in field.options.data">[[ option.option ]]</md-option>
                                                </md-select>
                                            </md-input-container>
                                        </div>
                                    </ng-form>
                                </div>
                            </md-content>
                        </div>
                    </div>
                </div>
            </md-content>
        </div>
        <div class="hidden">
            <input type="hidden"  ng-model="vm.model.service">
            <input type="hidden"  ng-model="vm.model.ranking">
        </div>
    </form>
</encuestas-ver-page>