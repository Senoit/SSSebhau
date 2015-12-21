<!-- container -->
<div class="container">
                        <div class="row">
                                <div class="col-md-8">
                                        <?php if(isset($scs)&&$scs==TRUE){?> 
                                            <div class="scsmsg"><h3>تمت عملية الادخال بنجاح</h3></div>
                                        <?php }elseif(isset($scs)&&$scs==FALSE){ ?>
                                            <div class="errmsg"><h3>هناك خطأ في الادخال </h3></div>
                                        <?php } ?>
                                        <h3 class="section-title">عرض تراتبية المواد</h3>
                                        <?php echo form_open( ''.base_url().'index.php/Tree_Sub');  ?>
<!--                                                <form class="form-light mt-20" role="SearchForm" name ="SearchForm" id="SearchForm">-->
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group">
                                                                            <input type="text" class="form-control" placeholder="أدخل رقم المادة" id="Subj_NO" name="Subj_NO">
                                                                </div>
                                                        </div>

                                                </div>
                                                <button type="submit" class="btn btn-two">عرض . . .</button><p><br/></p>
                                        </form> 
                                        <?php echo validation_errors(); ?>
                                            <br>
                                             <br>
                                              <br>
                                               <br>
                                        <?php echo form_open('Verify_Tree_Sub');  ?>
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group">

                                                                        <input type="text" class="form-control" placeholder="رقم الندة" readonly="ture" value="<?php  if(isset($Subj_NO)) echo $Subj_NO; ?>" id="Subj_NO" name="Subj_NO">
                                                                </div>
                                                        </div>

                                                </div>
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group">

                                                                        <input type="text" class="form-control" placeholder="الاسم العربي" readonly="ture" value="<?php  if(isset($Subj_Name_Ar)) echo $Subj_Name_Ar; ?>" id="Subj_Name_Ar" name="Subj_Name_Ar">
                                                                </div>
                                                        </div>

                                                </div>
                                               <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group">

                                                                        <input type="text" class="form-control" placeholder="الاسم الانجليزي" readonly="ture" value="<?php  if(isset($Subj_Name_Eg)) echo $Subj_Name_Eg; ?>" id="Subj_Name_Eg" name="Subj_Name_Eg">
                                                                </div>
                                                        </div>

                                                </div>
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group">

                                                                        <input type="text" class="form-control" placeholder="القسم" readonly="ture" value="<?php  if(isset($dep_no)) echo $dep_no; ?>" id="dep_no" name="dep_no">
                                                                </div>
                                                        </div>

                                                </div>
                                                <div class="row">
                                                        <div class="col-md-6">

                                                                <div class="form-group">

                                                                        <?php echo $menulist; ?>
                                                                </div>
                                                        </div>

                                                </div>

                                                <button type="submit" class="btn btn-two" value="dddd">نفــــــد</button><p><br/></p>
                                        </form>
                                </div>

                        </div>
                </div>
<!-- /container -->