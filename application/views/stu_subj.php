<!-- container -->
<div class="container">
                        <div class="row">
                                <div class="col-md-8">
                                        <?php if(isset($scs)&&$scs==TRUE){?> 
                                            <div class="scsmsg"><h3>تمت عملية الادخال بنجاح</h3></div>
                                        <?php }elseif(isset($scs)&&$scs==FALSE){ ?>
                                            <div class="errmsg"><h3>هناك خطأ في الادخال </h3></div>
                                        <?php } ?>
                                        <h3 class="section-title">تنزيل مواد</h3>
                                        <?php echo form_open( ''.base_url().'index.php/home');  ?>
<!--                                                <form class="form-light mt-20" role="SearchForm" name ="SearchForm" id="SearchForm">-->
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group">
                                                                            <input type="text" class="form-control" placeholder="رقم الدراسي " id="Stu_ID" name="Stu_ID">
                                                                </div>
                                                        </div>

                                                </div>
                                                <button type="submit" class="btn btn-two">بحث</button><p><br/></p>
                                        </form> 
                                        <?php echo validation_errors(); ?>
                                            <br>
                                             <br>
                                              <br>
                                               <br>
                                        <?php echo form_open('VerifyStuSubj');  ?>
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group">

                                                                        <input type="text" class="form-control" placeholder="اسم الطالب" readonly="ture" value="<?php  if(isset($full_name)) echo $full_name; ?>" id="full_name" name="full_name">
                                                                </div>
                                                        </div>

                                                </div>
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group">

                                                                        <input type="text" class="form-control" placeholder="الرقم الدراسي" readonly="ture" value="<?php  if(isset($Stu_ID)) echo $Stu_ID; ?>" id="Stu_ID" name="Stu_ID">
                                                                </div>
                                                        </div>

                                                </div>
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group">

                                                                        <input type="text" class="form-control" placeholder="القسم المنتمي اليه" readonly="ture" value="<?php  if(isset($dep_no)) echo $dep_no; ?>" id="dep_no" name="dep_no">
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