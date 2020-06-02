<md-toolbar class="md-toolbar-grey">    
	<div class="md-toolbar-tools">        
		<h3>            
			<span>Cliente #{{ vm.item.id }}</span>        
		</h3>        
		<span flex></span>        
		<!-- <md-button md-theme="nexo" type="submit" class="md-raised md-primary">Guardar</md-button> -->        
		<!-- <md-button ui-sref="clientes" class="md-raised nd-default">Cancelar</md-button> -->    
	</div>
</md-toolbar>
<md-content layout="row" layout-margin layout-xs="column">   
	<div flex>        
		<div class="md-nx-panel mb" md-whiteframe="1">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5>Cliente</h5>                
				</div>            
			</md-toolbar>            
			<ul class="nx-detail-list">                
				<li>                    
					<strong>Nombre</strong>                    
					<span class="fl-r">{{vm.item.name }}</span>                
				</li>                
				<li>                    
					<strong>Documento</strong>                    
					<span class="fl-r">{{vm.item.document_formatted }}</span>                
				</li>                
				<li>                    
					<strong>Correo</strong>                    
					<span class="fl-r">{{vm.item.email }}</span>                
				</li>            
			</ul>        
		</div>        
		<div class="md-nx-panel mb" md-whiteframe="1">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5>Direcciones</h5>                
				</div>            
			</md-toolbar>              
			<ul class="nx-detail-list" ng-repeat="option in vm.item.addresses.data">                
				<li>                    
					<strong>Dirección</strong>                    
					<span class="fl-r">{{option.address}}</span>                
				</li>                
				<li>                    
					<strong>Observación</strong>                    
					<span class="fl-r">{{option.observations}}</span>                
				</li>            
			</ul>        
		</div>        
		<div class="md-nx-panel mb" md-whiteframe="1">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5>Telefonos</h5>                
				</div>            
			</md-toolbar>            
			<ul class="nx-detail-list" ng-repeat="option in vm.item.phones.data">                
				<li>                    
					<strong>Tipo</strong>                    
					<span class="fl-r">{{option.type.name}}</span>                
				</li>                
				<li>                    
					<strong>Telefono</strong>                    
					<span class="fl-r">{{option.phone}}</span>                
				</li>            
			</ul>        
		</div>    
	</div>    
	<div flex>        
		<div class="md-nx-panel" md-whiteframe="1">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5>Asignaciones</h5>                
				</div>            
			</md-toolbar>            
			<md-content layout="column" layout-padding>                
				<p ng-if="!vm.services.data.length">No hay asignaciones asignadas a este cliente</p>                
				<md-list>                    
					<md-list-item ng-repeat="service in vm.services.data | orderBy: 'created_at':true" ui-sref="asignaciones.ver({ id : service.id })">                        
						<p>#{{ service.name }}</p>                        
						<span class="md-secondary md-caption">{{ service.created_at.date | amTimeAgo }}</span>                    
					</md-list-item>                
				</md-list>            
			</md-content>        
		</div>    
	</div>
</md-content>