<?php $__env->startSection('title', 'Page Title'); ?>


<?php $__env->startSection('pageTitle', 'My Profile'); ?>


<?php $__env->startSection('parentTitle', 'Home'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
    	<div class="row">
    		<div class="col-md-4 col-xs-12">
    			<div class="img img-thumb">
    				<img class="img img-responsive img-thumbnail" src="<?php echo e(asset ("public/user/images/user.png")); ?>">
    			</div>
    			<p class="lead">Md Rasheduzzaman</p>
    			<span>Member since May 5, 2017, Blood Group is <label class="label label-danger">A+</label></span>

    	</div>

    		<div class="col-md-8 col-xs-12">
    			<div class="panel panel-default">
	    			<div class="panel-header">
	    				<h3 class="pageTitle">Basic Information</h3>
	    				      <form action="#" class="form-horizontal" >
	    				      		<div class="col-md-6" style="margin-top:15px;">
		    				      		<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">Username</span>
										  <input type="text" class="form-control" value="jmrashed" aria-describedby="basic-addon1" readonly="true" name="username">
										</div>
									</div>

	    				      		<div class="col-md-6" style="margin-top:15px;">
		    				      		<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">Email</span>
										  <input type="text" class="form-control" value="jmrasdhed@gmail.com" aria-describedby="basic-addon1" name="email">
										</div>
									</div> 
 
										<div class="col-md-6" style="margin-top:15px;">
		    				      		<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">Phone</span>
										  <input type="number" class="form-control" value="017344446514" aria-describedby="basic-addon1"  name="phone">
										</div>
									</div>

	    				      		<div class="col-md-6" style="margin-top:15px;">
		    				      		<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">Blood Group</span>
										  <select name="bloodgroup" class="form-control">
										  	<option value="A+">A+</option>
										  	<option value="B+">B+</option>
										  	<option value="AB+">AB+</option>
										  	<option value="O+">O+</option>
										  	<option value="AB-">AB-</option>
										  </select>
										</div>
									</div> 
									<br>

                  <div class="col-md-12" style="margin-top:15px;">
                            <button class="thm-btn pull-right" type="submit">Update</button>
                        </div>
                    </form>
	    			</div>
	    			<div class="panel-body">
	    				<h3 class="pageTitle"> Details Information</h3>
	    				 <form action="#" class="form-horizontal" >
	    				      		<div class="col-md-6" style="margin-top:15px;">
		    				      		<div class="form-group">
		    				      			<label>Present Address</label>
		    				      			<textarea name="presentaddress" class="form-control" rows="5" required="required">
		    				      				453, Green Way Rd, Maghbazar-1217, Bangladesh
		    				      			</textarea>
										</div>
									</div>
									<div class="col-md-6" style="margin-top:15px;">
		    				      		<div class="form-group">
		    				      			<label>Permanent Address</label>
		    				      			<textarea name="permanentaddress" class="form-control" rows="5" required="required">Dhaka</textarea>
										</div>
									</div>   
									<div class="col-md-6" style="margin-top:15px;">
		    				      		<div class="form-group">
		    				      			<label>Last Date of Blood Donate</label>
		    				      			<input type="date" class="form-control" name="last_date_of_donate">
										</div>
									</div>  
									<div class="col-md-6" style="margin-top:15px;">
									<label>Disease</label>
		    				      		    <div class="checkbox">
										      <label><input type="checkbox" value="">Chagas disease</label>
										    </div>
										    <div class="checkbox">
										      <label><input type="checkbox" value="">Ethnic groups</label>
										    </div>
										    <div class="checkbox">
										      <label><input type="checkbox" value="">None of them</label>
										    </div>
									</div> 




                                    <div class="col-md-6">
                                        <div class="input-group"  style="margin-top: 15px">
                                            <span class="input-group-addon" id="basic-addon1">Institute/School Name</span>
                                            <input type="text" name="school_name" class="form-control" placeholder="Institute/School Name">
                                        </div>
                                        <div class="input-group"  style="margin-top: 15px">
                                            <span class="input-group-addon" id="basic-addon1">Passing Year</span>
                                            <select name="school_passing_year" class="form-control">
                                            <?php for($i=1980; $i<=2020; $i++): ?>
                                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option> 
                                            <?php endfor; ?>
                                            </select>
                                        </div>








                  <div class="col-md-12" style="margin-top:15px;">
                            <button class="thm-btn pull-right" type="submit">Update</button>
                        </div>
                    </form>
	    			</div>
    			</div>
    		</div>
    </div>
 </form>
 </div>
 </div>

    <br><br>
    <!--Start call to action Area-->
    <div class="footer-call-to-action" style="background:#813d00;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center sm-text-center">
                    <a href="#" class="thm-btn inverse mt-sm-15">Lorem ipsum</a>
                </div>
                <div class="col-md-8 sm-text-center">
                    <h3>Lorem ipsum dolor sit amet</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="fact-counter-wrapper layer-overlay overlay-white-8 parallax-section bg-parallax"
         data-bg-img="images/bg/1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="charity-info">
                        <!--Start Single charity info-->
                        <div class="col-xs-12 col-sm-6 col-md-3 sm-text-left">
                            <div class="single-charity-info pb-sm-30">
                                <div class="fix charity-count alignleft">
                                    <h1 class="timer" data-from="1" data-to="350" data-speed="5000"
                                        data-refresh-interval="50">350</h1>
                                </div>
                                <div class="fix charity-text pl-20">
                                    <p>Total Awards</p>
                                </div>
                            </div>
                        </div>
                        <!--Start Single charity info-->
                        <div class="col-xs-12 col-sm-6 col-md-3 sm-text-left">
                            <div class="single-charity-info pb-sm-30">
                                <div class="fix charity-count alignleft">
                                    <h1 class="timer" data-from="10" data-to="3150" data-speed="5000"
                                        data-refresh-interval="50">3150</h1>
                                </div>
                                <div class="fix charity-text pl-20">
                                    <p>Total Volunteer</p>
                                </div>
                            </div>
                        </div>
                        <!--Start Single charity info-->
                        <div class="col-xs-12 col-sm-6 col-md-3 sm-text-left">
                            <div class="single-charity-info pb-sm-30">
                                <div class="fix charity-count alignleft">
                                    <h1 class="timer" data-from="10" data-to="1220" data-speed="5000"
                                        data-refresh-interval="50">1220</h1>
                                </div>
                                <div class="fix charity-text pl-20">
                                    <p>Total Projects</p>
                                </div>
                            </div>
                        </div>
                        <!--Start Single charity info-->
                        <div class="col-xs-12 col-sm-6 col-md-3 sm-text-left">
                            <div class="single-charity-info pb-sm-30">
                                <div class="fix charity-count alignleft">
                                    <h1 class="timer" data-from="10" data-to="65" data-speed="5000"
                                        data-refresh-interval="50">65</h1>
                                </div>
                                <div class="fix charity-text pl-20">
                                    <p>Running Projects</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?> 






<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>