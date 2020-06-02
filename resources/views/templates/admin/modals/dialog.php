<style>    
.angular-google-map-container {        
	height: 400px;    
}
</style>
<md-dialog aria-label="Agregar direccion" ng-cloak md-theme="nexo" flex="50">    
	<form name="form" autocomplete="off" ng-submit="onSubmit()" novalidate>        
		<md-toolbar>            
			<div class="md-toolbar-tools">                
				<h2>{{ 'FORMS.ASSIGN.EDITAR_DIRECCION' | translate }}</h2>            
			</div>        
		</md-toolbar>        
		<md-dialog-content>            
			<div class="md-dialog-content">                
				<formly-form model="model" fields="fields" form="form"></formly-form>            
			</div>        
		</md-dialog-content>        
		<md-dialog-actions layout="row">            
			<span flex></span>            
			<md-button ng-click="cancel()" class="mr">{{ 'GLOBAL.CANCELAR' | translate }}</md-button>            
			<md-button ng-click="save()" ng-disabled="saving">                {{ 'GLOBAL.GUARDAR' | translate }}            </md-button>        
		</md-dialog-actions>    
	</form>
</md-dialog>