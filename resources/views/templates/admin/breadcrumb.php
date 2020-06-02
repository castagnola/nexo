<div> 
	<div class="ng-isolate-scope">
		<h3 class="md-toolbar-item md-breadcrumb md-headline">        
			<a href="{{step.ncyBreadcrumbLink}}" ng-repeat="step in steps | limitTo:(steps.length-1)">          
				<span class="hide-md hide-sm" ng-bind-html="step.ncyBreadcrumbLabel | translate">Layout</span>          
				<span class="docs-menu-separator-icon hide-md hide-sm" hide-sm="" hide-md="" style="transform: translate3d(0, 1px, 0)">            
					<md-icon md-svg-icon="chevron-right" aria-hidden="true" style="margin-top: -2px"></md-icon>          
				</span>        
			</a>        
			<span ng-repeat="step in steps | limitTo:-1" class="md-breadcrumb-page" ng-bind-html="step.ncyBreadcrumbLabel | translate"></span>    
		</h3>
	</div>
</div>