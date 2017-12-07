

<div class="portlet light bordered " id="ownerController" ng-controller="ownerController" ng-init="initPropertyForm();getPropertyInfo()">

    <div class="portlet-body  ">

        <form role="form" id="form">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="form-title">Modify Property</h4>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="note note-info" style="display:none">
                            Your registration has been submitted and sent to admin for approval.</div>
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
                        <select class="form-control" id="rentaltype" name="rentaltype" ng-model="property.rentaltype">
                            
                            <option ng-repeat="r in rentaltype" value="{{ r.id }}">{{ r.rentaltype }}</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                    <label>No of Bathroom
                        <span class="required">*</span>
                    </label>
                    <select class="form-control" id="bathroom" name="bathroom" ng-model="property.bathroom">
                        
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label>Max Occupancy<span class="required">*</span></label>
                    <select class="form-control" id="occupancy" name="occupancy" ng-model="property.occupancy">
                        
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
                        <select class="form-control" id="bedrooms" name="bedrooms" ng-model="property.bedrooms">
                            
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
                        <input type="text" class="form-control " id="title" maxlength="100" name="title" ng-model="property.title">
                    </div>
                </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label>Description of your place</label>
                    <textarea class="form-control " name="description" ng-model="property.description"></textarea>
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
            <select class="form-control" id="country" name="country" ng-model="property.country" ng-change="getCities(property.country)">
                
                <option ng-repeat="c in country" value="{{ c.id }}">{{ c.nationality }}</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>City
                <span class="required">*</span>
            </label>
            <select class="form-control" id="city" name="city" ng-model="property.city">
                <option ng-repeat="c in cities" value="{{ c.id }}">{{ c.city }}</option>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label>Street <span class="required">*</span></label>
            <input type="text" class="form-control" id="street" maxlength="50" name="street" ng-model="property.street">
        </div>

        <div class="form-group col-md-3">
            <label>Unit/Apt #
            </label>
            <input type="text" class="form-control" maxlength="50" name="unitno" ng-model="property.unitno">
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
            <input type="checkbox" ng-true-value="Y"  ng-false-value="N" ng-model="property.airconditioning">
        </div>

        <div class="form-group col-md-3">
            <label>Linen Provided</label>
            <input type="checkbox" ng-true-value="Y"  ng-false-value="N" ng-model="property.linen">
        </div>

        <div class="form-group col-md-3">
            <label>Washing Machine</label>
            <input type="checkbox" ng-true-value="Y"  ng-false-value="N" ng-model="property.washingmachine">
        </div>
    </div>

    <div class="row ">

        <div class="col-md-12">
            <p class="heading2">Internet</p>
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
            <input type="checkbox" name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.elevator">
        </div>

        <div class="form-group col-md-3">
            <label>Wheel chair accessible</label>
            <input type="checkbox" name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.wheelchair">
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
            <input type="checkbox" name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.fridge">
        </div>

        <div class="form-group col-md-3">
            <label>Kettle</label>
            <input type="checkbox" name="address" ng-true-value="Y"  ng-false-value="N"  ng-model="property.kettle">
        </div>

        <div class="form-group col-md-3">
            <label>Microwave</label>
            <input type="checkbox" name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.microwave">
        </div>

        <div class="form-group col-md-3">
            <label>Stove</label>
            <input type="checkbox" name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.stove">
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
            <input type="checkbox" name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.satelitetv">
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
            <input type="checkbox" name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.balcony">
        </div>

        <div class="form-group col-md-3">
                <label>Climbing Frame</label>
                <input type="checkbox"  name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.climbingframe">
            </div>

            <div class="form-group col-md-3">
                <label>Patio</label>
                <input type="checkbox" name="address" ng-true-value="Y"  ng-false-value="N" ng-model="property.patio">
            </div>



        </div>



        <div class="row">

                    <div class="col-md-12">
                        <p class="heading1">Rates and Discounts</p>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-4">
                        <label>Payment Method
                            <span class="required">*</span>
                        </label>
                        <select class="form-control" id="paymentmethod" name="paymentmethod" ng-model="property.paymentmethod">
                        <option value="" >--Select--</option>
                        <option value="paypal" >Paypal</option>
                        </select>
                    </div>

                    

                <div class="form-group col-md-4">
                    <label>Enter your paypal email account<span class="required">*</span></label>
                    <input type="text" class="form-control " id="paypalemail" maxlength="100" name="paypalemail" ng-model="property.paypalemail">
                </div>

                </div>

                <div class="row">

                    <div class="form-group col-md-4">
                        <label>Currency
                            <span class="required">*</span>
                        </label>
                        <select class="form-control" id="currency" name="currency" ng-model="property.currency">
                            
                        <option value="PHP" >PHP</option>
                        <option value="USD" >USD</option>
                        <option value="SAR" >SAR</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                    <label>Minimum Stay
                        <span class="required">*</span>
                    </label>
                    <select class="form-control" id="minimumstay" name="minimumstay" ng-model="property.minimumstay">
                        
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label>Rate Per Day<span class="required">*</span></label>
                    <input type="number" class="form-control " id="rateperday" maxlength="100" name="rateperday" ng-model="property.rateperday">
                </div>

                </div>

                <div class="row">

                    <div class="form-group col-md-4">
                        <label>Discount for 30 days stay <span class="required">*</span>
                        </label>
                        <select class="form-control" id="thirtydays" name="thirtydays" ng-model="property.thirtydays">
                           
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
                        <select class="form-control" id="sixtydays" name="sixtydays" ng-model="property.sixtydays">
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
                        <select class="form-control" id="ninetydays" name="ninetydays" ng-model="property.ninetydays">
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
                        <select class="form-control" id="reservationfee" name="reservationfee" ng-model="property.reservationfee">
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
                    <input type="number" class="form-control " id="depositfee" maxlength="100" name="depositfee" ng-model="property.depositfee">
                
                    </div>

                    <div class="form-group col-md-12">
                    <label>Guarantee Terms and Conditions</label>
                    <textarea class="form-control " ng-model="property.termsandconditions">
                    </textarea>
                
                    </div>
                   
                    

                

                </div>



                <div class="row">

                    <div class="col-md-12">
                        <p class="heading1">Map Location</p>
                    </div>
                    <div class="col-md-12">
                    </div>
                    
                    <div class="col-md-12 " >
                    <input id="pac-input" class="form-control" type="text" placeholder="Search Box" style="display:none">
                    <div id="map" style="height:400px;margin-left:6%; width:88%;margin-bottom:10px"></div>
                    </div>
                    <div  style="margin-left:6%; width:88%;margin-bottom:10px">
                    <input type="text" id="txtmaplocation" name="txtmaplocation" ng-model="property.maplocation" class="form-control" readonly="readonly" />
                    </div>
                    <input type="text" id="txtlat_o" name="txtlat_o" ng-model="property.lat" class="hidden" readonly="readonly" />
                        <input type="text" id="txtlon_o" name="txtlon_o" ng-model="property.lng" class="hidden" readonly="readonly" />
                        <input type="text" id="txtmapaddress" name="txtmapaddress" ng-model="property.mapaddress" class="hidden" readonly="readonly" />

                    </div>

        <div class="row">

                    <div class="col-md-12">
                        <p class="heading1">Upload Images</p>
                    </div>

                    <div class="col-md-8">
                    <table class="table table-bordered">
<tr>
    <td>Image 1</td>
    <td>
                    <input type="file" class="btn btn-default" name="file1" id="fileupload1" >
                    </td>
                    <td><button  type="button" ng-show="property.image1!=''" ng-click="viewProperyImage(property.image1)" class="btn btn-default">View</button>
                    <button  type="button" ng-show="property.image1!=''" ng-click="removeProperyImage('1')" class="btn btn-default">Remove</button> </td>
</tr>
<tr>
    <td>Image 2</td>
    <td>
                    <input type="file" class="btn btn-default" name="file2" id="fileupload2" >
                    </td>
                    <td>
                    <button  type="button" ng-show="property.image2!=''" ng-click="viewProperyImage(property.image2)" class="btn btn-default">View</button>
                    <button  type="button" ng-show="property.image2!=''" ng-click="removeProperyImage('2')" class="btn btn-default">Remove</button> </td>
</tr>

<tr>
    <td>Image 3</td>
    <td>
                    <input type="file" class="btn btn-default" name="file3" id="fileupload3" >
                    </td>
                    <td><button  type="button" ng-show="property.image3!=''" ng-click="viewProperyImage(property.image3)" class="btn btn-default">View</button>
                    <button  type="button" ng-show="property.image3!=''" ng-click="removeProperyImage('3')" class="btn btn-default">Remove</button> </td>
</tr>
<tr>
    <td>Image 4</td>
    <td>
                    <input type="file" class="btn btn-default" name="file4" id="fileupload4" >
                    </td>
                    <td><button  type="button" ng-show="property.image4!=''" ng-click="viewProperyImage(property.image4)" class="btn btn-default">View</button>
                    <button  type="button" ng-show="property.image4!=''" ng-click="removeProperyImage('4')" class="btn btn-default">Remove</button> </td>
</tr>
</table>
                    </div>

                </div>
                



        

        <div class="row">
            <div class="col-md-12">
                <div class="form-actions">
                    <button type="submit" class="btn btn-green ">Update</button>
                </div>
            </div>
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



<script type="text/javascript">
$(document).ready(function () {

   


	$('.datepicker').datetimepicker({
		format: 'DD-MMM-YYYY'
	});

	$('.datepicker').on('dp.change', function (e) {
		$(this).trigger('input');
	})



	

   

	$('#form').bootstrapValidator({
		submitHandler: function (validator, form, submitButton) {
			angular.element(document.getElementById('ownerController')).scope().updateProperty();
			$("#btnsubmit").attr("disabled", false);
		},
		excluded: [':disabled', ':hidden', ':not(:visible)', '.ignore'],
		framework: 'bootstrap',
		fields: {

            
            title: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            rentaltype: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            bathroom: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            occupancy: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            bedrooms: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            description: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            currency: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            minimumstay: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            rateperday: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            
            country: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            street: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            city: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },

            thirtydays: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            sixtydays: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            ninetydays: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            depositfee: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            reservationfee: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            paymentmethod: {
				validators: {
					notEmpty: {
						message: ' '
					}
				}
            },
            paypalemail: {
				validators: {
					notEmpty: {
						message: 'This field is required'
					},
					emailAddress: {
						message: 'Please supply a valid email address'
					}
				}
			},
            

          

            
            
			

			





		}

	});




});






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

        marker.addListener('click', toggleBounce);

        google.maps.event.addListener(map, 'dblclick', function(e) {
            var positionDoubleclick = e.latLng;
            marker.setPosition(positionDoubleclick);
            // if you don't do this, the map will zoom in

            geocoder.geocode({
                'latLng': e.latLng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    $("#txtmaplocation").val(results[0].formatted_address);
                }
                }
            });

          });



        google.maps.event.addListener(map, 'click', function(event) {
            $("#txtlat_o").val(event.latLng.lat());
            $("#txtlon_o").val(event.latLng.lng());
           

        });

        google.maps.event.addListener(marker, 'dragend', function(event){
            $("#txtlat_o").val(event.latLng.lat());
            $("#txtlon_o").val(event.latLng.lng());
           
});


        google.maps.event.addListenerOnce(map, 'idle', function () {
            $("#pac-input").show();
});






        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
       
       
      }
      function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }

      


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA90yEX5rQh39o2hIESwLnB_V6mG0hUFmg&signed_in=true&libraries=places&callback=initMap" async defer>
</script>
