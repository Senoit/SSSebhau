	<!-- container -->
	<div class="container">
				<div class="row">
					<div class="col-md-8">
                                            <h3 class="section-title">ادخال بيانات</h3><p><br></p>
                                                <?php if(isset($scs)){?> 
                                                    <div class="scsmsg"><h3>تمت عملية الادخال بنجاح</h3></div>
                                                <?php }?>
                                                    
						<?php echo validation_errors(); ?>
                                                    <br>
                                                     <br>
                                                      <br>
                                                       <br>
                                                <?php echo form_open('verifysubj');  ?>
						<!--<form class="form-light mt-20" role="insertForm" name ="insertForm" id="insertForm" >-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										
                                                                                <input type="text" class="form-control" placeholder="رقم المادة الدراسية"  value="<?php  if(isset($Subj_NO)) echo $Subj_NO; ?>" id="Subj_NO" name="Subj_NO">
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										
										<input type="text" class="form-control" placeholder="الاسم بالعربي"  value="<?php  if(isset($Subj_Name_Ar)) echo $Subj_Name_Ar; ?>" id="Subj_Name_Ar" name="Subj_Name_Ar">
									</div>
								</div>
								
							</div>
                                                        <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										
										<input type="text" class="form-control" placeholder="الاسم بالانجليزي"  value="<?php  if(isset($Subj_Name_Eg)) echo $Subj_Name_Eg; ?>" id="Subj_Name_Eg" name="Subj_Name_Eg">
									</div>
                                                                </div>	
							</div>
                                                        <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										
                                                                            <input type="number" class="form-control"  placeholder="عدد الوحدات" value="<?php  if(isset($subj_unit)) echo $subj_unit; ?>" id="subj_unit" name="subj_unit">
									</div>
                                                                </div>	
							</div>
                                                        <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										
                                                                            <input type="text" class="form-control" placeholder="القسم" readonly="ture" value="<?php  if(isset($user_Section)) echo $user_Section; ?>" id="Depar" name="Depar">
									</div>
                                                                </div>	
							</div>
                                                        <div class="row">
								<div class="col-md-6">
                                                                    
									<div class="form-group">
										
										<?php //echo $menulist; ?>
									</div>
								</div>								
                                                        </div>
                                                        
                                                        <button type="submit" class="btn btn-two" value="dddd">نفــــــد</button><p><br/></p>
						</form>
					</div>
					
				</div>
			</div>
	<!-- /container -->