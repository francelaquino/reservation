<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Inbox</a>
        <i class="fa fa-circle"></i>
    </li>
    
</ul>
<div class="page-content-inner" ng-controller="memberController" ng-init="getMemberInbox()">
    <div class="row">
        <div class="portlet light ">
            <div class="portlet-title ">
                <div class="caption caption-md">
                    <span class="captin-subject font-blue-madison  uppercase">Inbox</span>
                </div>
            </div>
            <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                
                
                <div class="form-body " >
                    
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th style="width:100px">Message ID.</th>
                                <th style="width: 200px">Date</th>
                                <th>
                                    Subject
                                </th>
                                <th style="width: 100px">Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="in in inbox" >
                                <td>{{ in.id }}</td>
                                <td>{{ in.date }}</td>
                                <td>
                                    <span ng-show="in.readflag=='N'"><b>{{ in.subject }}</b></span>
                                    <span ng-show="in.readflag=='Y'">{{ in.subject }}</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm green btn-outline" ng-click="in.readflag='Y';getInboxMessage(in.id)" green btn-outline filter-cancel"><i class="fa fa-list-alt"></i> Read</button>
                                </td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                    
                </div>
                
            </div>
        </div>
        
    </div>
    
    <div id="inbox" class="modal container fade" tabindex="-1" >
        <div class="modal-header" style=" background-color: #45b6af; ">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title " style="color: white">Message Details</h4>
        </div>
        <div class="modal-body" style="background-color: #f6fbfc; " >
            <div class="form-body " >
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message ID</label>
                                    <input type="text" class="form-control" id="messageid" readonly="readonly" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Date/Time</label>
                                    <input type="text" class="form-control" id="date" readonly="readonly" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control" id="subject" readonly="readonly" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" id="message" style="height: 100px" readonly="readonly" ></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-actions col-md-12 text-right " >
                                <hr/>
                                <button type="button" class="btn green" onclick="$('#inbox').modal('hide')">
                                Close  </button>
                                
                                
                            </div>
                        </div>
                        
                    </div>
        </div>
    </div>
</div>