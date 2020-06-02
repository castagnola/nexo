<md-toolbar class="md-toolbar-grey">    
	<div class="md-toolbar-tools">        
		<h3>            
			<span>Producto {{ vm.item.SKU }} - {{ vm.item.name }}</span>        
		</h3>        
		<span flex></span>        
		<!-- <md-button md-theme="nexo" type="submit" class="md-raised md-primary">Guardar</md-button> -->        <!-- <md-button ui-sref="clientes" class="md-raised nd-default">Cancelar</md-button> -->    
	</div>
</md-toolbar>
<md-content layout="row" layout-margin layout-xs="column">   
	<div flex>        
		<div class="md-nx-panel mb" md-whiteframe="1">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5>Información general</h5>                
				</div>            
			</md-toolbar>            
			<ul class="nx-detail-list">                
				<li>                    
					<strong>Categoría del producto</strong>                    
					<span class="fl-r">{{vm.item.category.name }}</span>                
				</li>                
				<li>                    
					<strong>Nombre</strong>                    
					<span class="fl-r">{{vm.item.name }}</span>                
				</li>                
				<li>                    
					<strong>Descripción</strong>                    
					<span class="fl-r">{{vm.item.description }}</span>                
				</li>                
				<li>                    
					<strong>Código</strong>                    
					<span class="fl-r">{{vm.item.SKU }}</span>                
				</li>            
			</ul>        
		</div>    
	</div>    
	<div flex>        
		<div class="md-nx-panel mb" md-whiteframe="1">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5>Características</h5>                
				</div>            
			</md-toolbar>            
			<ul class="nx-detail-list">                
				<li>                    
					<strong>Peso</strong>                    
					<span class="fl-r">{{vm.item.weight }} {{vm.item.weight_unit }}</span>                
				</li>                
				<li>                    
					<strong>Altura</strong>                    
					<span class="fl-r">{{vm.item.height }} {{vm.item.height_unit }}</span>                
				</li>                
				<li>                    
					<strong>Ancho</strong>                    
					<span class="fl-r">{{vm.item.width }} {{vm.item.width_unit }}</span>                
				</li>                
				<li>                    
					<strong>Profundidad</strong>                    
					<span class="fl-r">{{vm.item.depth }} {{vm.item.depth_unit }}</span>                
				</li>            
			</ul>        
		</div>    
	</div>
</md-content>