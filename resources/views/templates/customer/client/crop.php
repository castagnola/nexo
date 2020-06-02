<md-dialog class="nx-image-field-dialog" aria-label="Recortar image" ng-cloak md-theme="nexo">       
	<md-toolbar>            
		<div class="md-toolbar-tools">             
			<h2>Recortar imagen</h2>           
		</div>        
	</md-toolbar>        
	<md-dialog-content>            
		<div class="md-dialog-content">                
			<img-crop image="image | ngfDataUrl" result-image="croppedDataUrl" area-type="square"></img-crop>
		</div>        
	</md-dialog-content>
	<md-dialog-actions layout="row">
		<span flex></span>            
		<md-button ng-click="save()" class="mr">Guardar</md-button>
	</md-dialog-actions>
</md-dialog>