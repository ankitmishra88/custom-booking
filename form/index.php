<?php //print_r($slots);?>
<script>
var dates="<?echo $dates;?>";
var type="<?echo $type;?>";
dates=dates.replace(/\s/g, "");
console.log(type);
dates=dates.split(',')
console.log(dates)
</script>
<div class="page-content" style="background-image: url('images/wizard-v4.jpg')">
		<div class="wizard-v4-content">
			<div class="wizard-form">
				<div class="wizard-header">
					<h3 class="heading">Proceed To Book</h3>
					<p></p>
				</div>
		        <div class="form-register">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-account"></i></span>
			            	<span class="step-text">Date And Time</span>
			            </h2>
			            <section>
			                <div class="inner">
			                <h3><!--Choose Date And Timeslot--></h3>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<span class="dt">Date</span><input type="text"  id="cd_datepicker" name="date" required>
											
					  						<span class="border"></span>
										</label>
									</div>
									
										<div class="form-holder form-holder-2">
										<span class="dt">TimeSlot</span><select name="slot" id="cd_slot"><option value="">Select Time Slot</option>
											<?php foreach($slots as $key=>$val)
												echo "<option value='{$val['value']}'>{$val['label']}</option>";
											?>
										
										</select>
									</div>
									
								</div>
								
							</div>
			            </section>
						<!-- SECTION 2 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-lock"></i></span>
			            	<span class="step-text">Select Addons</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<!--<h3>Select Addons</h3>--><div class="cd_addons">
								<?php 
								for($i=0;$i<count($adds);$i=$i+3){
									$adds1=array();
									for($j=$i;$j<$i+3&&$j<count($adds);$j++)
										$adds1[]=$adds[$j];
								?>
								<div class="form-row">
							<?php foreach($adds1 as $key=>$val){?>
										
									<div class="form-holder">
										<label class="form-row-inner">
							<h4><input type="checkbox"  oninput="this.className = ''" name="addons[]" value="<?php echo $val['id'];?>"> <?php echo $val['title'];?></h4>
							<p><img src="<?php echo $val['thumbnail']; ?>" class="thumbnail"></p><p><?php echo $val['description'];?></p>
										</label>
									</div>
								<?php }?>
									
									
								</div>
								<?php }?>
							</div>
							</div>
			            </section>
			            <!-- SECTION 3 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
			            	<span class="step-text">Notes</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<h3>Put Your Loving Message</h3>
								<div class="form-row">
									<div class="form-holder">
										
											<p><input type="text" placeholder="Put Your Customization note here(if any)" class="form-control custom_note" id="custom_note" name="custom_note" required></p>
																						
									</div>
			
								</div>
								
							</div>
			            </section>
									            <!-- SECTION 4 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
			            	<span class="step-text">Final</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<h3></h3>
								<div class="form-row">
									<div class="form-holder">
										
									</div>
									<div id="cd_book" class="form-holder">
										
									</div>
			
								</div>
								
							</div>
			            </section>
			          
		        	</div>
		        </div>
			</div>
		</div>
	</div>