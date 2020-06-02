<div ng-hide="vm.pagination.total == 0 && !filterValue.length">    
	<md-toolbar class="md-toolbar-grey md-table-toolbar">        
		<div class="md-toolbar-tools">            
			<form class="search" name="filter.form" ng-class="{'focus' : focussed}" click-outside="focus = false">                
				<div layout="row" layout-align="start center">                    
					<md-icon ng-hide="!!filterValue" md-svg-icon="magnify"></md-icon>                    
					<md-icon ng-show="!!filterValue" md-svg-icon="close"></md-icon>                    
					<input type="text" placeholder="{{ 'TABLE.BUSCAR' | translate }}" ng-model="filterValue" ng-change="vm.onFilter(filterValue, filterUser)" ng-model-options="{debounce:500}" aria-invalid="false" ng-focus="focussed = true">
					<md-select ng-if="vm.resource == 'assignment'" placeholder="Usuarios" ng-model="filterUser" style="min-width: 200px;" class="selectFilter" ng-change="vm.onFilter(filterValue, filterUser)">                        
						<md-option ng-value="">{{ 'TODOS' | translate }}</md-option>                        
						<md-option ng-value="user.id" ng-repeat="user in vm.users">{{user.name}}</md-option>                   
					</md-select>                
				</div>            
			</form>            
			<span flex></span>            
			<div ng-if="!!vm.actions.header">                
				<md-button md-theme="nexo" ui-sref="{{ button.state }}" class="md-raised md-secondary mr-0" ng-repeat="button in vm.actions.header" translate="{{ button.text }}"></md-button>            
			</div>            
			<div ng-if="!!vm.actions.import">                
				<md-button md-theme="nexo" ui-sref="{{ vm.actions.import }}" class="md-raised md-secondary mr-0">                    {{ 'TABLE.IMPORTAR' | translate }}                </md-button>            
			</div>            
			<div ng-if="!!vm.actions.create">                
				<md-button md-theme="nexo" ui-sref="{{ vm.actions.create }}" class="md-raised md-primary mr-0">                    {{ 'TABLE.CREAR' | translate }}                
				</md-button>            
			</div>        
		</div>    
	</md-toolbar>    
	<md-table-container>        
		<table md-table ng-model="vm.selected" md-progress="vm.promise" md-theme="nexo">            
			<thead md-head md-order="vm.query.order" md-on-reorder="vm.getItems">                
				<tr md-row>                    
					<th md-column md-order-by="{{ column.orderBy }}" ng-repeat="column in vm.columns" ng-attr-md-numeric="column.isNumeric">                        
						<span>{{ vm.getColumnName(column) }}</span>                    
					</th>                    
					<th md-column md-numeric></th>                
				</tr>            
			</thead>            
			<tbody md-body>                
				<tr md-row md-select="item" md-select-id="id" md-auto-select ng-repeat="item in vm.items">                    
					<td md-cell ng-repeat="column in vm.columns">                        
						<div ng-if="!column.isImage">{{ item | row:column }}</div>                        
						<div class="avatar" ng-if="column.isImage">                            
							<img ng-src="{{ vm.getImage(item, column) }}?{{$index}}">                        
						</div>                    
					</td>                    
					<td md-cell>                        
						<md-menu md-position-mode="target-right target">                            
							<md-button aria-label="Open demo menu" class="md-icon-button" ng-click="$mdOpenMenu($event)">
								<md-icon md-menu-origin md-svg-icon="dots-vertical"></md-icon>                            
							</md-button>                            
							<md-menu-content width="3">                                
								<md-menu-item ng-repeat="button in vm.buttons">                                    
									<md-button aria-label="{{ button.label }}" ng-attr-ng-href="{{ vm.getButtonUrl(item, button) }}" ng-attr-target="{{ button.target }}">                                        {{ vm.getButtonName(button) }}                                    </md-button>                                
								</md-menu-item>                                
								<md-menu-item ng-if="!!vm.actions.show">                                    
									<md-button aria-label="{{ 'TABLE.VER' | translate }}" ng-click="vm.goToClick(vm.actions.show, { id: item.id })">                                        {{ 'TABLE.VER' | translate }}                                    </md-button>                                
								</md-menu-item>                                
								<md-menu-item ng-if="!!vm.actions.edit">                                    
									<md-button aria-label="{{ 'TABLE.EDITAR' | translate }}" ng-click="vm.goToClick(vm.actions.edit, { id: item.id })">                                        {{ 'TABLE.EDITAR' | translate }}                                    </md-button>                                
								</md-menu-item>                                
								<md-menu-item ng-hide="vm.actions.hideDelete">                                    
									<md-button ng-click="vm.onDelete($event, item)" aria-label="{{ 'TABLE.ELIMINAR' | translate }}">                                        {{ 'TABLE.ELIMINAR' | translate }}                                    </md-button>                                
								</md-menu-item>                            
							</md-menu-content>                        
						</md-menu>                    
					</td>                
				</tr>            
			</tbody>        
		</table>    
	</md-table-container>    
	<md-table-pagination md-limit="vm.query.limit" md-limit-options="[10, 25, 50, 100]" md-page="vm.query.page" md-total="{{vm.pagination.total}}" md-on-paginate="vm.getItems" md-label="{{ vm.paginationLabels }}" md-page-select>    </md-table-pagination>
</div>
<div class="no-records" ng-show="vm.pagination.total == 0 && !filterValue.length">    
	<md-content layout="column" layout-align="center center">        
		<h3>{{ vm.lang.noRecords | translate }}</h3>        
		<md-button md-theme="nexo" ng-if="!!vm.actions.create" ui-sref="{{ vm.actions.create }}" class="md-raised md-primary">{{ vm.lang.createFirst | translate }}</md-button>        
		<md-button class="md-raised" md-theme="nexo" ng-if="!!vm.actions.import" ui-sref="{{ vm.actions.import }}">{{ vm.lang.orImport | translate }}</md-button> 
		<md-button class="md-raised" md-theme="nexo" ng-if="!!vm.actions.categories" ui-sref="{{ vm.actions.categories }}" translate="MENU.PRODUCTOS.CREAR_CATEGORIAS"></md-button> 
	</md-content>
</div>