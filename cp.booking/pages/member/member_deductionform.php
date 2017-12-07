
     <h5 style="border-bottom: 1px solid #4f5153; padding-bottom: 5px; display: inline-block;width:100%">
     <span>Enter your estimated deductions for this pay period
     <br/>
     <span style="font-size: 11px;font-style: italic;">not including tax and other government-mandated contributions</span>
     <button  class="btn btn-default  btn-sm pull-right" ng-click="loadDeductionForm()"  type="button" >Choose</button>
    </h5>
    
    <div class="table-scrollable" style="width:100%; " ng-show="deductions.length>0">
        <table class="table table-striped table-bordered table-advance table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Deduction</th>
                                                        <th>Amount</th>
                                                        <th style="width: 80px"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="deduction in deductions">
                                                        <td>{{ deduction.deductionname }}</td>
                                                        <td class="text-right">{{ deduction.amount | number:2 }}</td>
                                                        <td class="text-center">
                                                            <a href="javascript:void(0)"  ng-click="removeDeduction($index)">Remove</i></a>
                                                        </td>
                                                        
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
       
       <div class="row">

                    <div class="form-actions col-md-12 text-right" >
                    <button type="button" ng-click="showAddOn()"   class="btn btn-primary">
                        Next  </button>
                        <button type="button" onclick="$('#deductionform').modal('hide')"   class="btn">
                        Cancel  </button>
                         
                        
                    </div>
                </div>

                