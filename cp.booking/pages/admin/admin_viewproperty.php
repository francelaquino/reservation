
<div class="portlet light bordered " id="ownerController" ng-controller="ownerController" ng-init="initPropertyForm();getPropertyInfo()">

    <div class="portlet-body  ">

        <form role="form" id="form">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="form-title">Property For Approval</h4>
                    </div>

                </div>

                

                <div class="row">

                    <div class="col-md-12">
                        <p class="heading1">Tell us about your rental</p>
                    </div>
                </div>

                <div class="row">

                <div class="form-group col-md-3">
                        <label>Rental Type
                            <span class="required">*</span>
                        </label>
                        <select class="form-control"   disabled="disabled"   id="rentaltype" name="rentaltype" ng-model="property.rentaltype">
                           
                            <option ng-repeat="r in rentaltype" value="{{ r.id }}">{{ r.rentaltype }}</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                    <label>No of Bathroom
                        <span class="required">*</span>
                    </label>
                    <select class="form-control"   disabled="disabled"  id="bathroom" name="bathroom" ng-model="property.bathroom">
                       
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label>Max Occupancy<span class="required">*</span></label>
                    <select class="form-control"   disabled="disabled"  id="occupancy" name="occupancy" ng-model="property.occupancy">
                       
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                        <option value="6" >6</option>
                        <option value="7" >7</option>
                        <option value="8" >8</option>
                        <option value="9" >9</option>
                        <option value="10" >10</option>
                    </select>
                </div>

               
                    <div class="form-group col-md-3">
                        <label>Bedrooms<span class="required">*</span></label>
                        <select class="form-control"   disabled="disabled"  id="bedrooms" name="bedrooms" ng-model="property.bedrooms">
                           
                            <option value="1" >1</option>
                            <option value="2" >2</option>
                            <option value="3" >3</option>
                            <option value="4" >4</option>
                            <option value="5" >5</option>
                        </select>
                    </div>




                </div>


                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Title to apear at the top of your listing(and in search research)
                            <span class="required">*</span>
                        </label>
                        <input  disabled="disabled" type="text" class="form-control " maxlength="100" name="title" ng-model="property.title">
                    </div>
                </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label>Description of your place</label>
                    <input  disabled="disabled" type="text" class="form-control " maxlength="300" name="description" ng-model="property.description">
                </div>
            </div>

    <div class="row ">
        <div class="col-md-12">
            <p class="heading1">Where is your rental?</p>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label>Country
                <span class="required">*</span>
            </label>
            <select  disabled="disabled" class="form-control" name="country" ng-model="property.country">
                <option ng-repeat="c in country" value="{{ c.id }}">{{ c.nationality }}</option>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label>City
                <span class="required">*</span>
            </label>
            <input t disabled="disabled" ype="text" class="form-control" maxlength="50" name="city" ng-model="property.cityname">
        </div>

        <div class="form-group col-md-3">
            <label>Street</label>
            <input disabled="disabled"  type="text" class="form-control" maxlength="50" name="street" ng-model="property.street">
        </div>

        <div class="form-group col-md-3">
            <label>Unit/Apt #
                <span class="required">*</span>
            </label>
            <input  disabled="disabled"  type="text" class="form-control" maxlength="50" name="unitno" ng-model="property.unitno">
        </div>
        
    </div>

    <div class="row ">

        <div class="col-md-12">
            <p class="heading1">Amenities</p>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-12">
            <p class="heading2">General</p>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label>Air Conditioning</label>
            <input type="checkbox" disabled="disabled"  ng-true-value="Y"  ng-false-value="N" ng-model="property.airconditioning">
        </div>

        <div class="form-group col-md-3">
            <label>Linen Provided</label>
            <input type="checkbox" disabled="disabled"  ng-true-value="Y"  ng-false-value="N" ng-model="property.linen">
        </div>

        <div class="form-group col-md-3">
            <label>Washing Machine</label>
            <input type="checkbox" disabled="disabled"  ng-true-value="Y"  ng-false-value="N" ng-model="property.washingmachine">
        </div>
    </div>

    <div class="row ">

        <div class="col-md-12">
            <p class="heading2">Phone Internet</p>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label>Internet Access</label>
            <input type="checkbox" ng-true-value="Y"  ng-false-value="N" ng-model="property.internet">
        </div>

        <div class="form-group col-md-3">
            <label>Wireless Internet</label>
            <input type="checkbox" ng-true-value="Y"  ng-false-value="N" ng-model="property.wirelessinternet">
        </div>

    </div>

    <div class="row ">

        <div class="col-md-12">
            <p class="heading2">Pool / Spa</p>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label>Pool</label>
            <input type="checkbox" ng-true-value="Y"  ng-false-value="N" ng-model="property.pool">
        </div>

    </div>


    <div class="row">
        <div class="col-md-12">
            <p class="heading2">Property and Features</p>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label>Elevator access</label>
            <input type="checkbox" disabled="disabled"  name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.elevator">
        </div>

        <div class="form-group col-md-3">
            <label>Wheel chair accessible</label>
            <input type="checkbox" disabled="disabled"  name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.wheelchair">
        </div>


    </div>


    <div class="row">
        <div class="col-md-12">
            <p class="heading2">Kitchen</p>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label>Fridge</label>
            <input type="checkbox" disabled="disabled"  name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.fridge">
        </div>

        <div class="form-group col-md-3">
            <label>Kettle</label>
            <input type="checkbox" disabled="disabled"  name="address" ng-true-value="Y"  ng-false-value="N"  ng-model="property.kettle">
        </div>

        <div class="form-group col-md-3">
            <label>Microwave</label>
            <input type="checkbox" disabled="disabled"  name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.microwave">
        </div>

        <div class="form-group col-md-3">
            <label>Stove</label>
            <input type="checkbox" disabled="disabled"  name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.stove">
        </div>


    </div>



    <div class="row">
        <div class="col-md-12">
            <p class="heading2">Entertainment</p>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label>Satelite TV</label>
            <input type="checkbox" disabled="disabled"  name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.statelitetv">
        </div>


    </div>

    <div class="row">
        <div class="col-md-12">
            <p class="heading2">Outdoor</p>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label>Balcony or Terrace</label>
            <input type="checkbox"  disabled="disabled"  name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.balcony">
        </div>

        <div class="form-group col-md-3">
                <label>Climbing Frame</label>
                <input type="checkbox"    disabled="disabled" name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.climbingframe">
            </div>

            <div class="form-group col-md-3">
                <label>Patio</label>
                <input type="checkbox"  disabled="disabled"  name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.patio">
            </div>



        </div>
        <div class="row">

                    <div class="col-md-12">
                        <p class="heading1">Rates and fees</p>
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-md-4">
                        <label>Currency
                            <span class="required">*</span>
                        </label>
                        <select disabled="disabled" class="form-control" id="currency" name="currency" ng-model="property.currency">
                            
                        <option value="USD" >USD</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                    <label>Minimum Stay
                        <span class="required">*</span>
                    </label>
                    <select  disabled="disabled"  class="form-control" id="minimumstay" name="minimumstay" ng-model="property.minimumstay">
                        
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label>Rate Per Day<span class="required">*</span></label>
                    <input  disabled="disabled"  type="number" class="form-control " id="rateperday" maxlength="100" name="rateperday" ng-model="property.rateperday">
                </div>

                </div>
                <div class="row">

                    <div class="form-group col-md-4">
                        <label>Discount for 30 days stay 
                        </label>
                        <select class="form-control"disabled="disabled"   id="thirtydays" name="thirtydays" ng-model="property.thirtydays">
                            <option value="0" >0%</option>
                            <option value="0.05" >5%</option>
                            <option value="0.1" >10%</option>
                            <option value="0.15" >15%</option>
                            <option value="0.20" >20%</option>
                            <option value="0.25" >25%</option>
                            <option value="0.30" >30%</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Discount for 60 days stay 
                        </label>
                        <select class="form-control" disabled="disabled"   id="sixtydays" name="sixtydays" ng-model="property.sixtydays">
                        <option value="0" >0%</option>
                        <option value="0.05" >5%</option>
                        <option value="0.1" >10%</option>
                        <option value="0.15" >15%</option>
                        <option value="0.20" >20%</option>
                        <option value="0.25" >25%</option>
                        <option value="0.30" >30%</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Discount for 90 days stay 
                        </label>
                        <select class="form-control" disabled="disabled"   id="ninetydays" name="ninetydays" ng-model="property.ninetydays">
                        <option value="0" >0%</option>
                        <option value="0.05" >5%</option>
                        <option value="0.1" >10%</option>
                        <option value="0.15" >15%</option>
                        <option value="0.20" >20%</option>
                        <option value="0.25" >25%</option>
                        <option value="0.30" >30%</option>
                        </select>
                    </div>

                    

                

                </div>
                <div class="row">

                    <div class="form-group col-md-4">
                        <label>Discount for 30 days stay <span class="required">*</span>
                        </label>
                        <select class="form-control" disabled="disabled"   id="thirtydays" name="thirtydays" ng-model="property.thirtydays">
                           
                            <option value="0" >0%</option>
                            <option value="0.05" >5%</option>
                            <option value="0.1" >10%</option>
                            <option value="0.15" >15%</option>
                            <option value="0.20" >20%</option>
                            <option value="0.25" >25%</option>
                            <option value="0.30" >30%</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Discount for 60 days stay <span class="required">*</span>
                        </label>
                        <select class="form-control" id="sixtydays" disabled="disabled"  name="sixtydays" ng-model="property.sixtydays">
                        <option value="0" >0%</option>
                        <option value="0.05" >5%</option>
                        <option value="0.1" >10%</option>
                        <option value="0.15" >15%</option>
                        <option value="0.20" >20%</option>
                        <option value="0.25" >25%</option>
                        <option value="0.30" >30%</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Discount for 90 days stay <span class="required">*</span>
                        </label>
                        <select class="form-control" id="ninetydays" disabled="disabled"  name="ninetydays" ng-model="property.ninetydays">
                        <option value="0" >0%</option>
                        <option value="0.05" >5%</option>
                        <option value="0.1" >10%</option>
                        <option value="0.15" >15%</option>
                        <option value="0.20" >20%</option>
                        <option value="0.25" >25%</option>
                        <option value="0.30" >30%</option>
                        </select>
                    </div>

                    

                

                </div>

                <div class="row">

                    <div class="form-group col-md-4">
                        <label>Reservation Fee<span class="required">*</span>
                        </label>
                        <select class="form-control" id="reservationfee" disabled="disabled"   name="reservationfee" ng-model="property.reservationfee">
                            <option value="0" >0%</option>
                            <option value="0.05" >5%</option>
                            <option value="0.1" >10%</option>
                            <option value="0.2" >20%</option>
                            <option value="0.3" >30%</option>
                            <option value="0.4" >40%</option>
                            <option value="0.5" >50%</option>
                            <option value="0.6" >60%</option>
                            <option value="0.7" >70%</option>
                            <option value="0.8" >80%</option>
                            <option value="0.9" >90%</option>
                            <option value="1" >100%</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                    <label>Guarantee Fee/Deposit Fee<span class="required">*</span></label>
                    <input type="number" class="form-control " disabled="disabled"  id="depositfee" maxlength="100" name="depositfee" ng-model="property.depositfee">
                
                    </div>

                    <div class="form-group col-md-12">
                    <label>Guarantee Terms and Conditions</label>
                    <textarea class="form-control " disabled="disabled"  ng-model="property.termsandconditions">
                    </textarea>
                
                    </div>
                   
                    

                

                </div>


                <div class="row">

                    <div class="col-md-12">
                        <p class="heading1">Map Location</p>
                    </div>
                  
                    
                    <div class="col-md-12 " >
                    <input id="pac-input" class="form-control" type="text" placeholder="Search Box" style="display:none">
                    <div id="map" style="height:400px;margin-left:6%; width:88%;margin-bottom:10px"></div>
                    </div>
                    <div  style="margin-left:6%; width:88%;margin-bottom:10px">
                    <input type="text" id="txtmaplocation" name="txtmaplocation" ng-model="property.maplocation" class="form-control" readonly="readonly" />
                    </div>
                    <input type="text" id="txtlat_o" name="txtlat_o" ng-model="property.lat" class="hidden" disabled="disabled" />
                        <input type="text" id="txtlon_o" name="txtlon_o" ng-model="property.lng" class="hidden" disabled="disabled" />

                    </div>

        
                    <div class="row">

                    <div class="col-md-12">
                        <p class="heading1">Upload Images</p>
                    </div>

                    <div class="col-md-6">
                    <table class="table table-bordered">
<tr>
    <td>Image 1</td>
                    <td><button  type="button" ng-show="property.image1!=''" ng-click="viewProperyImage(property.image1)" class="btn btn-default">View</button> </td>
</tr>
<tr>
    <td>Image 2</td>
                    <td><button  type="button" ng-show="property.image2!=''" ng-click="viewProperyImage(property.image2)" class="btn btn-default">View</button> </td>
</tr>

<tr>
    <td>Image 3</td>
                    <td><button  type="button" ng-show="property.image3!=''" ng-click="viewProperyImage(property.image3)" class="btn btn-default">View</button> </td>
</tr>
<tr>
    <td>Image 4</td>
                    <td><button  type="button" ng-show="property.image4!=''" ng-click="viewProperyImage(property.image4)" class="btn btn-default">View</button> </td>
</tr>
</table>
                    </div>

                </div>




       

        </form>
    </div>
</div>

</div>
<div id="propertyImage" role="dialog" class="modal container fade" tabindex="-1">
    <div class="modal-header" style=" background-color: #364150; ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title " style="color: white">Property Image</h4>
    </div>
    <div class="modal-body " style="background-color: #f6fbfc; text-align:center;  " id="modal-body">
        <img style="clear:both;float:none;max-height: 100%;max-width:100%;margin: auto" src="" id="property_Image"/>
    </div>
</div>


<script>



    function initMap() {
        setTimeout(function(){ setMap(); }, 3000);
        
    }
    var image = 'assets/images/icons8-marker.png';

    function setMap() {
        var myLatlng = {lat: Number($("#txtlat_o").val()), lng: Number($("#txtlon_o").val())};
        
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatlng,
          zoom: 18,
        //mapTypeId: google.maps.MapTypeId.HYBRID
        });

        var geocoder = new google.maps.Geocoder();


        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Rental Location',
          draggable: true,
          animation: google.maps.Animation.DROP,
          icon: image
        });
    }

       


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA90yEX5rQh39o2hIESwLnB_V6mG0hUFmg&signed_in=true&libraries=places&callback=initMap" async defer>
</script>