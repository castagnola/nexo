<md-toolbar class="md-toolbar-grey">    
	<div class="md-toolbar-tools">        
		<h3>            
			<spann>Herramienta - {{ vm.item.SKU }} - {{ vm.item.name }}</spann>        
		</h3>        
		<span flex></span>        
		<!-- <md-butto md-theme="exo" type="submit" class="md-raised md-primary">Guardar</md-butto> -->        <!-- <md-butto ui-sref="clietes" class="md-raised d-default">Cacelar</md-butto> -->    
	</div>
</md-toolbar>
<md-content layout="row" layout-margin layout-fill>    
	<div flex-xs="100" flex="100" layout="column">        
		<div class="md-nx-panel mb" md-whiteframe="1">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5>Información general</h5>                
				</div>            
			</md-toolbar>            
			<ul class="nx-detail-list">                
				<li>                    
					<strong>Nombre</strong>                    
					<span class="fl-r ng-binding">{{vm.item.name }}</span>                
				</li>                
				<li>                    
					<strong>Descripción</strong>                    
					<span class="fl-r ng-binding">{{vm.item.description }}</span>               
					</li>                
				</ul>        
			</div>    
		</div> 
		 
	</div>
</md-content>
<md-content layout="row" layout-margin layout-fill>   
	<div flex-xs="100" flex="100" layout="column">
		<!-- Productos -->        
		<div class="md-nx-panel mb" md-whiteframe="1" ng-if="vm.item.products.data.length > 0">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5>Producto(s)</h5>                
				</div>            
			</md-toolbar>            
			<ul class="nx-detail-list">                
				<li ng-repeat="toolProduct in vm.item.products.data">                    
					<span>{{ toolProduct.name }}</span>                    
				</li>            
			</ul>        
		</div>   
		<!-- servicios -->        
		<div class="md-nx-panel mb" md-whiteframe="1" ng-if="vm.item.services.data.length > 0">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5>Servicio(s)</h5>                
				</div>            
			</md-toolbar>            
			<ul class="nx-detail-list">                
				<li ng-repeat="toolService in vm.item.services.data"> 
					<span>{{ toolService.name }}</span>                    
				</li>            
			</ul>        
		</div>  
	</div>
</md-content>