<form name="vm.form" autocomplete="off" ng-submit="vm.onSubmit()" novalidate autocomplete="off">    
	<md-toolbar class="md-toolbar-grey">        
		<div class="md-toolbar-tools">            
			<span flex></span>            
			<md-button md-theme="nexo" type="submit" class="md-raised md-primary">Guardar</md-button>            
			<md-button ui-sref="productos.categorias" class="md-raised nd-default">Cancelar</md-button>        
		</div>    
	</md-toolbar>    
	<md-content layout="row" layout-padding>        
		<div flex="50">            
			<h3 class="panel-title">Información básica</h3>            
			<formly-form model="vm.model" fields="vm.fields.basic" form="vm.form"></formly-form>        
		</div>    
	</md-content>
</form>