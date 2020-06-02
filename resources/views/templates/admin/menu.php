<md-sidenav class="md-sidenav-left sidenav-component open-menu" md-component-id="left"        md-is-locked-open="$mdMedia('gt-sm')" md-disable-backdrop>    
	<md-toolbar>        
		<div id="nexo-avatar" class="logo"><div></div></div>    
	</md-toolbar>    
	<md-content md-theme="default" flex>        
		<ul class="menu">            
			<li ng-repeat="item in vm.menu">                
				<md-button ng-click="item.open = !item.open" ng-if="!!item.children">                    
					<div flex layout="row">                        {{ 'MENU.' + item.name | translate }}                        
						<span flex></span>                        
						<span aria-hidden="true" class="md-toggle-icon">                          
							<md-icon md-svg-src="chevron-down" aria-hidden="true" ng-if="!item.open"></md-icon>           
							<md-icon md-svg-src="chevron-up" aria-hidden="true" ng-if="item.open"></md-icon>                        
						</span>                    
					</div>                
				</md-button>                
				<md-button ui-sref="{{ item.url }}" ng-if="!item.children">                    
					{{ 'MENU.' + item.name | translate }}                
				</md-button>                
				<ul class="menu-children" ng-if="!!item.children" ng-show="item.open">                    
					<li ng-repeat="children in item.children">                        
						<md-button ui-sref="{{ children.url }}">                            {{ 'MENU.' + children.name | translate }}                        
						</md-button>                    
					</li>                
				</ul>            
			</li>            
			<li>                
				<md-button href="/logout" target="_self">                    {{ 'MENU.SALIR' | translate }}                </md-button>            
			</li>        
		</ul>    
	</md-content>    
	<md-menu class="lang-button">        
		<md-button aria-label="Abrir menu de cambio de lenguaje" class="md-block"  md-menu-origin ng-click="$mdOpenMenu($event)">            {{ 'LANG' | translate }}        </md-button>        
		<md-menu-content width="4">            
			<md-menu-item ng-if="vm.currentLang == 'es' || vm.currentLang == 'en'">                
				<md-button ng-click="vm.changeLang('pt')">Português</md-button>             
			</md-menu-item>            
			<md-menu-item ng-if="vm.currentLang == 'pt' || vm.currentLang == 'en'">                
				<md-button ng-click="vm.changeLang('es')">Español</md-button>            
			</md-menu-item>  
			<md-menu-item ng-if="vm.currentLang == 'es' || vm.currentLang == 'pt'">                
				<md-button ng-click="vm.changeLang('en')">Inglés</md-button>            
			</md-menu-item>        
		</md-menu-content>    
	</md-menu>
</md-sidenav>