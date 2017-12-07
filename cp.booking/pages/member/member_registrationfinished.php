<style>
	body{
		background-color: white !important;
	}
	.my-drop-zone { border: dotted 3px lightgray; }
	.nv-file-over { border: dotted 3px red; } /* Default class applied to drop zones on over */
	.another-file-over-class { border: dotted 3px green; }
	html, body { height: 100%; }
</style>
<div class="col-md-10 center" style="margin-top: 20px; margin:auto; clear: both;  float: none" ng-controller="memberController" ng-init="initWelcome();" >
	<div class="col-md-12" >
		<div class="portlet light ">
		<img src="assets/images/logo_white.png">
			<div class="portlet-body form">
					<div class="form-body">
						<div class="row">
							<div class="form-group">
							<div class="col-md-12">
								<h3 >Account activation success !</h3>
									<p style="margin-bottom: 6px;">Processing shall take 1-2 business days.</p>
									<p  style="margin-bottom: 6px;">Welcome aboard</p>
								</div>
							</div>
						</div>
						
						
					</div>
					<div class="form-actions col-md-11 text-right" style="background-color: white">
						<button type="button" class="btn default"   >
						Close  </button>
					</div>
			</div>
		</div>
		
	</div>
</div>