<?php $__env->startSection('content'); ?>
<style type="text/css">

    #map {
        height: 100%;
    } 

    #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
    }

    #infowindow-content .title {
        font-weight: bold;
    }

    #infowindow-content {
        display: none;
    }

    #map #infowindow-content {
        display: inline;
    }



    #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
    }

    .pac-controls {
        display: inline-block;
        padding: 5px 11px;
    }

    .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }




    #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
    }
    #target {
        width: 345px;
    }
</style>


<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">New Donor </h3>

                <div class="box-tools pull-right">
                    <a href="<?php echo e(url('/donor')); ?>" class="">      
                        <i class="fa fa-undo" aria-hidden="true"></i> back
                    </a>

                </div>
            </div>

            <div class="box-body">
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo e(url('/donor/store')); ?>" method="post" enctype= "multipart/form-data"> 
                    <?php echo csrf_field(); ?>


                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Full Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="fullname"  autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Email</label>
                        <div class="col-md-6">
                            <input id="name" type="email" class="form-control" name="email"  autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            <input id="name" type="password" class="form-control" name="password"  autofocus>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Gender</label>
                        <div class="col-md-6">
                            <input id="name" type="radio" name="gender" value="male" >Male &nbsp;&nbsp;&nbsp;
                            <input id="name" type="radio" name="gender" value="female" >Female
                            <input type="hidden" value="67890" name="donner_id">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Date of Birth</label>
                        <div class="col-md-2">
                            <input id="name" type="date" class="form-control" name="date_of_birth"  autofocus>
                        </div> 
                        <label for="name" class="col-md-2 control-label">Last Donate</label>
                        <div class="col-md-2">
                            <input id="name" type="date" class="form-control" name="last_donate_date"  autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Phone</label>
                        <div class="col-md-6">
                            <input id="name" type="number" class="form-control" name="phone"  autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Division</label>
                        <div class="col-md-2">
                            <select name="division" class="divisions form-control">

                                <?php $__currentLoopData = $data['division']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($row->id); ?>"><?php echo e($row->division_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                        </div> 
                        <label for="email" class="col-md-2 control-label">District</label>

                        <div class="col-md-2">
                            <select name="district" id="districts" class="districts form-control"> 
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Upazilla</label>

                        <div class="col-md-2">
                            <select name="upazila" id="upazillas" class="form-control"> 
                            </select>

                        </div>

                        <label class="col-md-2 control-label">Post Code</label>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="post_code" placeholder="Post Code">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Location</label>

                        <div class="col-md-6" style="height: 150px;">
                            <input name="location" id="pac-input" class=" form-control" type="text" placeholder="Search Box">
                            <div id="map" style="overflow: hidden;"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Blood Group</label>

                        <div class="col-md-2">
                            <select name="blood_group" class="form-control">
                                <option value="A+">A+</option>
                                <option value="AB+">AB+</option>
                                <option value="B+">B+</option>
                                <option value="O+">O+</option>
                                <option value="A-">A-</option>
                                <option value="AB-">AB-</option>
                                <option value="B-">B-</option>
                                <option value="O-">O-</option> 
                            </select>

                        </div> 
                        <label for="email" class="col-md-2 control-label">Profile Photo</label>

                        <div class="col-md-2">
                            <input type="file" class="form-control"  name="profile_photo" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Called Date</label>

                        <div class="col-md-2">
                            <input type="date" class="form-control"  name="called_date" />
                        </div> 
                        <label for="email" class="col-md-2 control-label">Called Today</label>

                        <div class="col-md-2">
                            <input type="date" class="form-control"  name="called_today" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Religion</label>

                        <div class="col-md-2">
                            <select name="religion" class="form-control">
                                <option value="Muslim">Muslim</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Christian">Christian</option>
                                <option value="Other">Other</option>
                            </select>
                        </div> 
                        <label for="email" class="col-md-2 control-label">Is Physically Disable</label>

                        <div class="col-md-2">
                            <select name="is_physically_disble" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Nationality</label>

                        <div class="col-md-2">
                            <input type="text" class="form-control"  name="nationality" />
                        </div> 
                        <label for="email" class="col-md-2 control-label">NID</label>

                        <div class="col-md-2">
                            <input type="number" class="form-control"  name="nid" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Age</label>

                        <div class="col-md-2">
                            <input type="number" class="form-control"  name="age" />
                        </div> 
                        <label for="email" class="col-md-2 control-label">Profile Visible</label>

                        <div class="col-md-2">
                            <select name="pro_visible" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Latitude</label>

                        <div class="col-md-2">
                            <input type="text" class="form-control"  name="latitude" />
                        </div> 
                        <label for="email" class="col-md-2 control-label">Longitude</label>

                        <div class="col-md-2">
                            <input type="text" class="form-control"  name="longitude" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Last Latitude</label>

                        <div class="col-md-2">
                            <input type="text" class="form-control"  name="lastLat" />
                        </div> 
                        <label for="email" class="col-md-2 control-label">Last Longitude</label>

                        <div class="col-md-2">
                            <input type="text" class="form-control"  name="lastLng" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Rank</label>

                        <div class="col-md-2">

                            <input id="password" type="text" class="form-control" name="rank" >
                        </div> 
                        <label for="email" class="col-md-2 control-label">Status</label>

                        <div class="col-md-2">
                            <input type="text" class="form-control"  name="status" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Number of Donate</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control"  name="number_of_donate" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Add Donor
                            </button>
                        </div>
                    </div>
                </form>
                <!-- form close -->
            </div> 
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

</div>

<script>
    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13,
            mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        // alert(input);
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        // map.addListener('bounds_changed', function() {
        //   searchBox.setBounds(map.getBounds());
        //  });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function () {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function (marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function (place) {
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

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZaGo1-bLGV49YimZizEHF4Ny_4gxGG3E&libraries=places&callback=initAutocomplete"
async defer></script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.myapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>