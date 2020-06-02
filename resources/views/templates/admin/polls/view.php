<md-toolbar class="md-toolbar-grey">    
	<div class="md-toolbar-tools">        
		<h3>            
			<span>{{ "PAGES.ESTADISTICAS.ENCUESTAS.RESPUESTA" | translate }} #{{ vm.item.id }}</span>        
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
					<h5>{{ "PAGES.ESTADISTICAS.ENCUESTAS.CLIENTE" | translate }}</h5>                
				</div>            
			</md-toolbar>            
			<ul class="nx-detail-list">                
				<li>                    
					<strong>{{ "PAGES.ESTADISTICAS.ENCUESTAS.CLIENTE" | translate }}</strong>                    
					<span class="fl-r">{{vm.item.customer.name }}</span>                
				</li>                
				<li>                    
					<strong>{{ "PAGES.ESTADISTICAS.ENCUESTAS.CORREO" | translate }}</strong>                    
					<span class="fl-r">{{vm.item.customer.email }}</span>                
				</li>            
			</ul>        
		</div>        
		<div class="md-nx-panel mb" md-whiteframe="1">            
			<md-toolbar>                
				<div class="md-toolbar-tools">                    
					<h5>{{ "PAGES.ESTADISTICAS.ENCUESTAS.PREGUNTA_Y_RESPUESTA" | translate }}</h5>                
				</div>            
			</md-toolbar>              
			<ul class="nx-detail-list" ng-repeat="option in vm.item.options.data">                
				<li>                    
					<strong>{{ "PAGES.ESTADISTICAS.ENCUESTAS.PREGUNTA" | translate }}</strong>                    
					<span class="fl-r">{{option.option.question.question}}</span>                
				</li>                
				<li ng-if="option.answer.length">                    
					<strong>{{ "PAGES.ESTADISTICAS.ENCUESTAS.RESPUESTA" | translate }}</strong>                    
					<span class="fl-r">{{option.answer}}</span>                
				</li>                
				<li ng-if="option.option.option.length">                    
					<strong>{{ "PAGES.ESTADISTICAS.ENCUESTAS.OPCION" | translate }}</strong>                    
					<span class="fl-r">{{option.option.option}}</span>                
				</li>            
			</ul>        
		</div>    
	</div>
</md-content>