<nx-import resource="vm.resource" redirect-to="vm.redirectTo">    
	<nx-import-header class="md-toolbar-tools">        
		<h4>            
			<span>Importación de productos</span>        
		</h4>        
		<span flex></span>        
		<md-button ui-sref="productos" class="md-raised nd-default">Cancelar</md-button>    
	</nx-import-header>    
	<nx-import-instructions>        
		<div class="md-body-1" layout="row" layout-sm="column" layout-wrap layout-fill layout-padding layout-align="center center" flex>            
			<div flex>                
				<p>Descargue el archivo guía para realizar la importación de manera correcta. Recomendamos no alterar el nombre o la posición de las columnas.</p>            
			</div>            
			<div flex>                
				<md-button ng-href="{{ vm.files.guide }}" class="md-raised" target="_blank">                    
					<i class="fa fa-arrow-down"></i>                    Descargar archivo guia                
				</md-button>            
			</div>        
		</div>        
		<div class="md-body-1" layout="row" layout-sm="column" layout-wrap layout-fill layout-padding layout-align="center center" flex>            
			<div flex>                
				<p>Descargue el archivo de las categorias con sus respectivo id's para realizar la importación de manera correcta. Este archivo es solo informativo.</p>            
			</div>            
			<div flex>                
				<md-button ng-href="{{ vm.files.categoryExport }}" class="md-raised" target="_blank">                    
					<i class="fa fa-arrow-down"></i>                    Descargar archivo de categorias                
				</md-button>            
			</div>        
		</div>    
	</nx-import-instructions>
</nx-import>