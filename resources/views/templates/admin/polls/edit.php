<form name="vm.form" autocomplete="off" ng-submit="vm.onSubmit()" novalidate autocomplete="off">    
	<md-toolbar class="md-toolbar-grey">        
		<div class="md-toolbar-tools">            
			<span flex></span>            
			<md-button md-theme="nexo" type="submit" class="md-raised md-primary">{{ 'GLOBAL.GUARDAR' | translate }}</md-button>
			<md-button ui-sref="encuestas" class="md-raised nd-default">{{ 'GLOBAL.CANCELAR' | translate }}</md-button>        
		</div>    
	</md-toolbar>    
	<md-content layout="row" layout-margin layout-xs="column">      
		<div flex>            
			<div class="md-nx-panel mb" md-whiteframe="1">                
				<md-toolbar>                    
					<div class="md-toolbar-tools">                        
						<h5 translate="FORMS.PRODUCT.INFORMACION_BASICA"></h5>                    
					</div>                
				</md-toolbar>                
				<md-content layout="column" layout-padding>                    
					<formly-form model="vm.model" fields="vm.fields.basic" form="vm.form" options="vm.options"></formly-form>
				</md-content>            
			</div>        
		</div>        
	</md-content>
</form>