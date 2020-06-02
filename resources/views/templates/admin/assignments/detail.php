<md-content layout="row" layout-margin layout-xs="column">    
	<div flex>        
		<div class="md-nx-panel mb" md-whiteframe="1">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5 translate="FORMS.ASSIGN.INFORMACION_CLIENTE">Información del cliente</h5>               
				</div>            
			</md-toolbar> 

			<div ng-if="vm.item.customer.avatar" class="nx-image-field ng-pristine ng-untouched ng-valid ng-scope layout-align-center-center layout-column ng-empty" style="cursor: default;">

				<md-icon md-svg-icon="file-image" ng-hide="!!vm.item.customer.avatar" aria-hidden="true" class="ng-hide"><svg xmlns="http://www.w3.org/2000/svg" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" focusable="false"><g id="file-image"><path d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M6,20H15L18,20V12L14,16L12,14L6,20M8,9A2,2 0 0,0 6,11A2,2 0 0,0 8,13A2,2 0 0,0 10,11A2,2 0 0,0 8,9Z"></path></g></svg></md-icon> 

				<img ng-src="/images/large/{{ vm.item.customer.avatar }}" class="ng-scope">
			</div>     


			<ul class="nx-detail-list">                
				<li>                    
					<strong translate="FORMS.CUSTOMER.NOMBRES">Nombre</strong>                    
					<span class="fl-r">{{vm.item.customer.name}}</span>                
				</li>               
				<li>                    
					<strong translate="FORMS.CUSTOMER.DOCUMENTO">Documento</strong>                    
					<span class="fl-r">{{vm.item.customer.document_formatted}}</span>                
				</li>                
				<li>                    
					<strong translate="FORMS.CUSTOMER.EMAIL">Email</strong>                    
					<span class="fl-r">{{vm.item.customer.email}}</span>                
				</li>                
				<li ng-repeat="phone in vm.item.customer.phones.data">                    
					<strong ><span translate="FORMS.CUSTOMER.TELEFONO">Teléfono</span> {{$index+1}}</strong>                    
					<span class="fl-r">{{phone.phone}}</span>                
				</li>            
			</ul>        
		</div>        
		<div class="md-nx-panel" md-whiteframe="1">            
			<img class="img-fluid" ng-src="{{ vm.item.map }}" alt="Mapa de la asignación">            
			<ul class="nx-detail-list">                
				<li>                    
					<strong translate="FORMS.CUSTOMER.DIRECCION">Dirección</strong>                    
					<span class="fl-r">{{vm.item.address }}</span>                
				</li>            
			</ul>        
		</div>    
	</div>    
	<div flex>        
		<div class="md-nx-panel mb" md-whiteframe="1" ng-if="vm.users.length > 0">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5 translate="PAGES.ASIGNACIONES.RUTEROS_ASIGNADOS">Ruteros asignados</h5>               
				</div>            
			</md-toolbar>          
			<md-content layout="column" layout-padding>            
				<md-list>                 
					<md-list-item ng-repeat="user in vm.users">                        
						<img ng-src="{{user.avatar[150]}}" class="md-avatar" alt="{{user.name}}" />                       
						<p>{{user.name}}</p>                   
					</md-list-item>                
				</md-list>            
			</md-content>        
		</div>        
		<div class="md-nx-panel mb" md-whiteframe="1" ng-if="!vm.creationMode">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5 translate="PAGES.ASIGNACIONES.INFORMACION_GENERAL">Información general</h5>                
				</div>            
			</md-toolbar>            
			<ul class="nx-detail-list">                
				<li>                    
					<strong translate="PAGES.ASIGNACIONES.ESTADO">Estado</strong>                    
					<div class="fl-r">                        
						<span class="label nexo-service-{{service.status.slug}}">{{vm.item.status.name}}</span>                    
					</div>                
				</li>                
				<li>                    
					<strong translate="PAGES.ASIGNACIONES.CODIGO_DE_SERVICIO">Código del servicio</strong>                    
					<span class="fl-r">{{vm.item.code }}</span>                
				</li>                
				<li>                    
					<strong translate="PAGES.ASIGNACIONES.CODIGO_DE_VERIFICACION">Código de verificación</strong>                    
					<span class="fl-r">{{vm.item.verification_code }}</span>                
				</li>                
				<li ng-if="!!vm.item.observations">                    
					<strong translate="PAGES.ASIGNACIONES.OBSERVACIONES">Observaciones</strong>                    
					<span class="fl-r">{{vm.item.observations }}</span>                
				</li>            
			</ul>        
		</div>        
		<!-- Programación -->        
		<div class="md-nx-panel mb" md-whiteframe="1">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5 translate="PAGES.ASIGNACIONES.PROGRAMACION_ASIGNACION">Programación de la asignación</h5>                
				</div>            
			</md-toolbar>            
			<ul class="nx-detail-list">                
				<li>                    
					<strong translate="PAGES.ASIGNACIONES.TIPO_PROGRAMACION">Tipo de programación</strong>  
					<span class="fl-r">{{ 'OPTIONS.' + vm.item.date_type | uppercase |translate }}</span>                
				</li>                
				<li>                    
					<strong translate="PAGES.ASIGNACIONES.TIPO_ASIGNACION">Tipo de asignación</strong>                    
					<span class="fl-r">{{ 'OPTIONS.' + vm.item.assignment_type | uppercase | translate }}</span>                
				</li>                
				<li>                    
					<strong translate="PAGES.ASIGNACIONES.INICIA">Inicia</strong>                    
					<span class="fl-r">{{ vm.item.start_at.date || vm.item.start_at | amDateFormat:'LLLL' }}</span>                
				</li>                
				<li>                    
					<strong translate="PAGES.ASIGNACIONES.FINALIZA">Finaliza</strong>                    
					<span class="fl-r">{{ vm.item.end_at.date || vm.item.end_at | amDateFormat:'LLLL' }}</span>                
				</li>                
				<li>                    
					<strong translate="PAGES.ASIGNACIONES.DURACION">Duración</strong>                    
					<span class="fl-r">{{ vm.item.duration }} minutos</span>                
				</li>            
			</ul>        
		</div>        
		<!-- Recurrencia -->        
		<div class="md-nx-panel mb" md-whiteframe="1" ng-if="vm.recurrenceDates.length > 0 && vm.item.date_type == 'recurrent'">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5><span translate="PAGES.ASIGNACIONES.RECURRENCIA">Recurrencia</span> ({{ vm.recurrenceDates.length }} veces)</h5>                
				</div>            
			</md-toolbar>            
			<md-list class="md-dense">                
				<md-virtual-repeat-container id="vr-recurrencia">                    
					<md-list-item md-virtual-repeat="date in vm.recurrenceDates">                        
						<md-icon md-svg-icon="calendar"></md-icon>                        
						<p>                            
							<small>                            {{ date.start.date || date.start | amDateFormat:'LLLL' }} ({{ date.start.date || date.end | amTimeAgo }})                          </small>                       
						</p>                    
					</md-list-item>                
				</md-virtual-repeat-container>            
			</md-list>        
		</div>        
		<!-- Servicios -->        
		<div class="md-nx-panel mb" md-whiteframe="1" ng-if="vm.services.length > 0 && vm.item.with_services">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5 translate="PAGES.ASIGNACIONES.SERVICIOS">Servicio(s)</h5>                
				</div>            
			</md-toolbar>            
			<ul class="nx-detail-list">                
				<li ng-repeat="service in vm.services">                    
					<span>{{ service.name_only }}</span>                
				</li>            
			</ul>        
		</div>        
		<!-- Productos -->        
		<div class="md-nx-panel mb" md-whiteframe="1" ng-if="vm.products.length > 0 && vm.item.with_products"> 
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5 translate="PAGES.ASIGNACIONES.PRODUCTOS">Producto(s)</h5>                
				</div>            
			</md-toolbar>            
			<ul class="nx-detail-list">                
				<li ng-repeat="serviceProduct in vm.products">                    
					<span>{{ serviceProduct.product.name_only }}</span>                    
					<span class="fl-r">{{ serviceProduct.quantity }} unds</span>                
				</li>            
			</ul>        
		</div>
		<!-- Herramientas -->        
		<div class="md-nx-panel mb" md-whiteframe="1" ng-if="vm.item.tools.data.length > 0">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5 translate="PAGES.ASIGNACIONES.HERRAMIENTAS">Herramientas / Actividades</h5>                
				</div>            
			</md-toolbar>            
			<ul class="nx-detail-list">                
				<li ng-repeat="tool in vm.item.tools.data">                    
					<span>{{ tool.name }}</span>                
				</li>            
			</ul>        
		</div>  
		<div class="md-nx-panel mb" md-whiteframe="1" ng-if="vm.item.observations">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5 translate="PAGES.ASIGNACIONES.COMENTARIOS">Comentario(s)</h5>    
				</div>            
			</md-toolbar>           
			<ul ng-if="vm.item.observations.length > 0" class="nx-detail-list">                
				<li>                    
					<span>{{ vm.item.observations }}</span>                
				</li>            
			</ul>  
			<ul class="nx-detail-list" ng-if="vm.item.observations.length == 0">                
				<li class="ng-scope">                    
					<span class="ng-binding" translate="PAGES.ASIGNACIONES.NO_COMENTARIOS">No tienes Comentarios</span>                
				</li>
			</ul>
		</div>    
		<div class="md-nx-panel mb" md-whiteframe="1" ng-if="vm.item.novelties">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5 translate="PAGES.ASIGNACIONES.NOVEDADES">Novedad(es)</h5>    
				</div>            
			</md-toolbar>           
			<ul ng-if="vm.item.novelties.data.length > 0" class="nx-detail-list">                
				<li ng-repeat="novelty in vm.item.novelties.data">                    
					<span>{{ novelty.observation }}</span>                
				</li>            
			</ul>  
			<ul class="nx-detail-list" ng-if="vm.item.novelties.data.length == 0">                
				<li class="ng-scope">                    
					<span class="ng-binding" translate="PAGES.ASIGNACIONES.NO_NOVEDADES">No tienes novedades</span>                
				</li>
			</ul>
		</div>  
	</div>
</md-content>