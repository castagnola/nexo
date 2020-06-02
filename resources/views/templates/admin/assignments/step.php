<form name="vm.form" autocomplete="off" novalidate ng-hide="vm.submitting">    
	<wizard on-finish="vm.onSubmit()" hide-indicators="true">        
		<md-toolbar class="md-toolbar-grey">            
			<div class="md-toolbar-tools">                
				<h3>{{ vm.wizard.currentStepTitle() }}</h3>                
				<span flex></span>                
				<md-button ui-sref="asignaciones" class="md-raised nd-default">{{ 'GLOBAL.CANCELAR' | translate }}</md-button>                
				<md-button class="md-raised nd-default" ng-show="vm.wizard.currentStepNumber() > 1" wz-previous>                    {{ 'GLOBAL.REGRESAR' | translate }}                </md-button>                
				<md-button md-theme="nexo" class="md-raised md-primary" ng-click="vm.nextStep()" ng-if="vm.wizard.currentStepNumber() < vm.wizard.totalStepCount()">{{ 'GLOBAL.SIGUIENTE' | translate }}</md-button>                
				<md-button md-theme="nexo" class="md-raised md-primary" wz-finish ng-if="vm.wizard.currentStepNumber() == vm.wizard.totalStepCount()">                    {{ 'GLOBAL.ENVIAR' | translate }}                </md-button>            
			</div>        
		</md-toolbar>        
		<md-content layout="row" layout-margin layout-wrap layout-fill>            
			<wz-step wz-title="{{ 'FORMS.ASSIGN.PASOS.SELECCIONAR_CLIENTE' | translate }}" flex>                
				<formly-form model="vm.model" fields="vm.fields.step1" form="vm.forms.step1" options="vm.forms.options1"></formly-form>            
			</wz-step>            
			<wz-step wz-title="{{ 'FORMS.ASSIGN.PASOS.SELECCIONAR_SERVICIOS' | translate }}" canenter="vm.canEnterValidation(vm.forms.step1)" flex>                
				<formly-form model="vm.model" fields="vm.fields.step2" form="vm.forms.step2" options="vm.forms.options2"></formly-form>            
			</wz-step>            
			<wz-step wz-title="{{ 'FORMS.ASSIGN.PASOS.SELECCIONAR_FECHA' | translate }}" flex>                
				<formly-form model="vm.model" fields="vm.fields.step3" form="vm.forms.step3" options="vm.forms.options3"></formly-form>            
			</wz-step>            <!-- resumen -->            
			<wz-step wz-title="{{ 'FORMS.ASSIGN.PASOS.RESUMEN' | translate }}" flex>                
				<div ng-if="vm.wizard.currentStepNumber() == vm.wizard.totalStepCount()">                    
					<assignment-detail item="vm.model" users="vm.model.users_data" recurrence-dates="vm.model.recurrence_dates" services="vm.model.services_data" products="vm.model.products_data" creation-mode="true"></assignment-detail>                
				</div>            
			</wz-step>        
		</md-content>    
	</wizard>
</form>
<div layout="row" layout-sm="column" layout-align="space-around" ng-show="vm.submitting">    
	<md-progress-circular md-theme="nexo" md-mode="indeterminate" md-diameter="100px"></md-progress-circular>
</div>