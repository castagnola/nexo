<div class="md-single-label" translate="FORMS.ASSIGN.SELECCIONAR_DIRECCION"></div>
<div class="mt" layout="row" layout-margin flex>    
	<div ng-if="loading">        
		<md-progress-circular md-mode="indeterminate" md-theme="nexo"></md-progress-circular>    
	</div>    
	<nx-alert message="{{ 'FORMS.ASSIGN.NO_DIRECCIONES' | translate }}" ng-if="!loading && !addresses.data.length" type="warning"></nx-alert>    
	<div ng-repeat='item in addresses.data' flex-xs="100" flex="50">        
		<div md-whiteframe="1">            
			<md-toolbar class="md-toolbar-grey md-toolbar-grey-panel">                
				<div class="md-toolbar-tools">                    
					<div layout="column">                        
						<div class="md-subhead">{{ item.address }}</div>                        
						<div class="md-caption">                            
							<span ng-if="!!item.vicinity">{{ item.vicinity }},</span> 
							<span ng-if="!!item.city">{{ item.city }},</span>                            
							<span ng-if="!!item.state">{{ item.state }}</span>                        
						</div>                    
					</div>                    
					<span flex></span>                    
					<md-button class="md-icon-button" ng-click="editAddress($event, $index, item)" aria-label="Editar dirección">
						<md-icon md-svg-icon="pencil"></md-icon>                    
					</md-button>                    
					<md-button class="md-raised md-primary mr-0" md-theme="nexo" ng-click="select(item)" ng-disabled="isSelected(item)">                        
						<span ng-hide="isSelected(item)">{{ 'GLOBAL.SELECCIONAR' | translate }}</span>                        
						<span ng-show="isSelected(item)">{{ 'GLOBAL.SELECCIONADA' | translate }}</span>                    
					</md-button>                
				</div>            
			</md-toolbar>            
			<md-content layout="column" layout-align="center center" style="min-height: 550px; background-color: #ECECEC;">
				<img ng-src="{{ item.map }}" alt="{{ item.address }}" style="width: 100%;" ng-if="!!item.map">                
				<nx-alert type="warning" message="No conocemos la ubicación de esta dirección" ng-if="!item.map">
					<md-button class="md-raised" ng-click="fix($event, item)" ng-disabled="item.fixing">Corregir</md-button>
				</nx-alert>            
			</md-content>        
		</div>    
	</div>
</div>
<input type="hidden" ng-model="model[options.key]">