<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="#">Members</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="#">Bulk Upload</a>
        <i class="fa fa-circle"></i>
    </li>
    
</ul>
<div class="page-content-inner"  ng-controller="partnerController">
    <div class="row">
        <div class="portlet light ">
            <div class="portlet-title ">
                <div class="caption caption-md">
                    <span class="captin-subject font-blue-madison  uppercase">Upload Member </span>
                </div>
            </div>
            <form id="member_form" action="" method="post">
            
                <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                  
                            <div class=" alert alert-block alert-success fade in" style="display: none;">

                         </div>
                    <div class="form-body " >
                        
                         <div class="row">
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label>File<span class="required">*</span></label>
                                    <input type="file" name="file" id="fileupload" class="form-control">
                                </div>
                            </div>
                        </div>

                        
                       
                        
                       
                        <div class="row">
                            <div class="form-actions col-md-6 text-right " >
                                <hr/>
                                <button type="button" id="btnsubmit"  ng-click="uploadBulkMember()" class="btn green">
                                Upload  </button>
                                
                                
                            </div>
                        </div>
                        
                    </div>
                    
                    
                </div>
            </form>
        </div>
        
        
        
    </div>
</div>
