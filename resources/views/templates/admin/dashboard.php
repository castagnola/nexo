<?php
/**
 * Created by PhpStorm.
 * User: rigobcastro
 * Date: 17/11/15
 * Time: 11:20 PM
 */

?>

<div class="md-padding">    
	<md-content layout="row" layout-margin layout-xs="column">        
		<div flex>            
			<div class="md-nx-panel" md-whiteframe="1">                
				<md-toolbar>                    
					<div class="md-toolbar-tools">                        
						<h5 translate="PAGES.DASHBOARD.ULTIMAS_ASIGNACIONES_CREADAS"></h5>                    
					</div>                
				</md-toolbar>                
				<md-content layout="column" layout-padding>                  
					<p ng-if="!vm.assignments.length" translate="PAGES.DASHBOARD.ULTIMAS_ASIGNACIONES_CREADAS"></p>                    
					<md-list>                        
						<md-list-item ng-repeat="item in vm.assignments" ui-sref="asignaciones.ver({ id : item.id })">                            
							<p>#{{ item.name }}</p>                            
							<span class="md-secondary md-caption">{{ item.created_at.date | amTimeAgo }}</span>                        
						</md-list-item>                    
					</md-list>                
				</md-content>            
			</div>            
		</div>        
		<div flex>            
			<div class="md-nx-panel md-whiteframe-1dp" md-whiteframe="1">                
				<md-toolbar>                    
					<div class="md-toolbar-tools">                        
						<h5 translate="PAGES.DASHBOARD.MODULOS"></h5>                    
					</div>                
				</md-toolbar>                
				<md-content layout="column" layout-padding>                    
					<md-list class="md-dense">                        
						<md-list-item class="pl-0 pr-0" ng-repeat="item in vm.team.modules">                            
							<p>{{ item.slug | translate }}</p>                            
							<span flex></span>                            
							<span class="nx-label" ng-class="{ green: item.active, red: !item.active }">
								{{ item.active ? 'GLOBAL.ACTIVADO' : 'GLOBAL.DESACTIVADO' | translate }}                            
							</span>                        
						</md-list-item>                    
					</md-list>                
				</md-content>            
			</div>            
			<div class="md-nx-panel md-whiteframe-1dp mt" md-whiteframe="1">                
				<md-toolbar>                    
					<div class="md-toolbar-tools">                        
						<h5 translate="PAGES.DASHBOARD.LIMITES_POR_GRUPO"></h5>                    
					</div>                
				</md-toolbar>                
				<md-content layout="column" layout-padding>                    
					<md-list class="md-dense">                        
						<md-list-item class="pl-0 pr-0" ng-repeat="limit in vm.rolesLimits">  
							<p>{{ limit.slug | translate }}</p>                           
							<div style="width: 50%; margin-top: 20px;">                                
								<div class="nx-progress">                                    
									<div class="nx-progress-bar purple" ng-style="{ width: limit.percentage + '%' }">                                      {{ limit.used }} / {{ limit.limit }}                                    
									</div>                                
								</div>                            
							</div>                        
						</md-list-item>                    
					</md-list>                
				</md-content>            
			</div>            
		</div>   
	</md-content>
	<md-content layout="row" layout-margin layout-xs="column">  
		<div flex>            
			<dashboard-map latitude="4.709634" longitude="-74.2257879" ></dashboard-map>        
		</div>   
	</md-content>
</div>