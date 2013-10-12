<?
/** @var $this View */

$this->extend('/Common/template');

?>
<div class="row" ng-app="kmitl">
    <div class="col-md-6 col-md-offset-3" ng-controller="UrlShortenerCtrl">

        <!-- Header -->
        <div class="text-center">
            <h1>
                KMI.TL <br/>
                <small>url shortener</small>
            </h1>
            <div class="input-group input-group-lg" ng-class="inputUrlClass">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-link"></span>
                </span>
                <input id="inputUrl" type="text" class="form-control input-lg" placeholder="url" ng-model="inputUrl" ng-keypress="insertUrl($event)" ng-click="clickInputUrl()">
            </div>
            <small class="color-grey">All kmi.tl URLs are public and can be shared by anyone.</small>
        </div>

        <!-- Content -->
        <div id="short-urls" ng-if="urls.length">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8">Long Url</div>
                        <div class="col-md-3">Short Url</div>
                        <div class="col-md-1">Info</div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row" ng-repeat="url in urls">
                        <div class="col-md-8">
                            <a href="{{url.long}}">{{url.long}}</a></div>
                        <div class="col-md-3">
                            <a href="{{url.short}}">{{ url.short.replace("http://", "") }}</a>
                        </div>
                        <div class="col-md-1 text-center">
                            <a ng-href="{{url.info}}" href="#">
                                <span class="glyphicon glyphicon-info-sign"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
