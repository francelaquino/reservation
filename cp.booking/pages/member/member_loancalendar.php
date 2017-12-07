<script type="text/javascript">
    $(".sliding-link").click(function(e) {
        e.preventDefault();
        var aid = $(this).attr("href");
        $('html,body').animate({scrollTop: $(aid).offset().top},'slow');
    });
</script>

                    <h1 class="periodtitle">{{ month }}</h1>
                    <h1 class="period"> PAY PERIOD {{ payperiod }}</h1>
                <div class="week-days">
                <h1>SUN</h1>
                <h1>MON</h1>
                <h1>TUE</h1>
                <h1>WED</h1>
                <h1>THU</h1>
                <h1>FRI</h1>
                <h1>SAT</h1>
                </div>
                <div ng-repeat="d in days">
                    
                    <div ng-show="dates[$index]==0" class="cal-days cal-days-disabled" >
                        <div class="cal-day">{{ d }}</div>
                    </div>
                    <div ng-show="dates[$index]==1" class="cal-days">
                        <div class="cal-day">{{ d }}</div>
                        <div  class="selectWrapper" class="selectWrapper" ng-class="noofhoursctr[$index]>0 ? 'disabled' : ''">
                            <select  class="cal-category" ng-disabled="noofhoursctr[$index]>0" ng-model="category[$index]" >
                                <option value="0" selected="selected" class="black">Category</option>
                                <option value="1">Regular</option>
                                <option value="2">Paid Leave</option>
                                <option value="3">Dayoff</option>
                            </select>
                        </div>
                        <div  class="selectWrapper" ng-class="noofhoursctr[$index]>0 ? 'disabled' : ''">
                            <select class="cal-category"   ng-disabled="noofhoursctr[$index]>0" ng-model="noofhours[$index]">
                                <option value="0" selected="selected">No of Hours</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>
                    <div class="cal-divider" ng-show="dayno[$index]=='6'" >
                    </div>
                </div>
                <div style="width: 100%;text-align: center;margin-top: 20px;float:left;margin-bottom: 100px">
             <a href="javascript:void(0)" id="btnstart" ng-click="startLoanForm()" class="active btn-loan-curve ">Next</a>
            </div>
            
