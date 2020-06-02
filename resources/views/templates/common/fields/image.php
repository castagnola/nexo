<div>
    <div class="btn btn-default"
         ngf-select
         ngf-accept="'image/*'"
         ngf-change="change($file)">
        {{ currentImage || showCropper ? 'Cambiar imagen' : 'Seleccionar imagen' }}
    </div>

    <div class="m-t-lg">
        <img class="img-responsive" ng-src="{{ cropperDataUrl }}"
             ng-cropper
             ng-if="showCropper"
             ng-cropper-options="cropperOptions"
             ng-cropper-show="'show.cropper'"/>


        <img ng-src="{{ currentImage }}" class="img-responsive" ng-if="!showCropper">

    </div>
</div>