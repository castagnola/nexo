<form name="vm.form" autocomplete="off" ng-submit="vm.onSubmit()" novalidate autocomplete="off">    
	<md-toolbar class="md-toolbar-grey">        
		<div class="md-toolbar-tools">            
			<span flex></span>            
			<md-button md-theme="nexo" type="submit" class="md-raised md-primary">Guardar</md-button>            
			<md-button ui-sref="productos.categorias" class="md-raised nd-default">Cancelar</md-button>        
		</div>    
	</md-toolbar>    
	<md-content layout="row" layout-margin layout-xs="column">       
		<div flex> 
			<div class="md-nx-panel mb" md-whiteframe="1">            
				<md-toolbar>                
					<div class="md-toolbar-tools">                    
						<h5>Información básica</h5>                 
					</div>            
				</md-toolbar>   
				<md-content layout="column" layout-padding>          
					<formly-form model="vm.model" fields="vm.fields.basic" form="vm.form"></formly-form>        
				</md-content>
			</div>  
		</div>  
	</md-content>
</form>