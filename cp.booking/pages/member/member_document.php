

<script type="text/javascript">
$(document).ready(function () {
    $("#fileupload").change(function () {
           
          uploadMemberDocuments();

        });

});

</script>



<div class="page-content-inner" id="memberController" ng-controller="memberController" ng-init="checkmemberdocuments()">
            <div class="portlet  ">
                <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="breadcrumb">My Profile <i class="fa fa-circle"></i> Documents </span>
                    </div>
                </div>
                <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                    
                    
                    <div class="form-body " >
                        <input type="file" name="file" id="fileupload" class="hidden">
                        <input type="text" id="txtid" value="{{ members.memberid }}" class="hidden">
                        <input type="text" id="txtgid" value="{{ members.membergid }}" class="hidden">
                        <input type="text" id="txtdocument" class="hidden">
                        
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr class="bg-primary">
                                    <th col>Document</th>
                                    <th class="text-center" style="width: 20px">Status</th>
                                    <th class="text-center" style="width: 250px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="document in documents" >
                                    <td>
                                    <span ng-show="document.filename==''">{{ document.document }}</span>
                                    <a  ng-hide="document.filename==''" href="javascript:void(0)" ng-click="viewDocument(document.document,document.filename)" >{{ document.document }}</a>
                                    </td>
                                    <td class="text-center"><span  ng-show="document.filename!=''" class="label label-sm label-success btn-circle"><i class="fa fa-check" aria-hidden="true"></i> </span>
                                    <span  ng-show="document.filename==''" class="label label-sm label-danger btn-circle"> <i class="fa fa-times" aria-hidden="true"></i> </span></td>
                                    <td >
                                        <button  type="button" ng-click="prepareUpload(document.docid)" class="btn btn-sm btn-default filter-submit margin-bottom btnPrepareUpload">
                                        <i class="fa fa-upload" aria-hidden="true"></i> Upload File
                                        </button>
                                        <button  ng-show="document.filename!=''" type="button" ng-click="removeFile(document.docid,members.memberid,document.filename)" class="btn btn-sm btn-default filter-submit margin-bottom btnPrepareUpload">
                                        <i class="fa fa-chain-broken" aria-hidden="true"></i> Remove File
                                        </button>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        
                        
                        
                    </div>
                </div>
                
    </div>

    <div id="documents" class="modal container fade" tabindex="-1">
    <div class="modal-header" style=" background-color: #00b050; ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title " style="color: white">Documents</h4>
    </div>
    <div class="modal-body " style="background-color: #f6fbfc; text-align:center;  " id="modal-body">
        <img style="clear:both;float:none;max-height: 100%;max-width:100%;margin: auto" src="" id="memberDoc"/>
    </div>
</div>