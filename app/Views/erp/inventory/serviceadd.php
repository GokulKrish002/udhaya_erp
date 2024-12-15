<div class="alldiv flex widget_title">
    <h3>Create Service</h3>
    <div class="title_right">
        <a href="<?php echo url_to('erp.inventory.services') ;?>" class="btn bg-success" ><i class="fa fa-reply" ></i> Back </a>
    </div>
</div>
<div class="alldiv">
    <?php
        echo form_open(url_to('erp.inventory.serviceadd'),array(
            "class"=>"flex",
            "id"=>"service_add_form"
        ));
    ?>
        <div class="form-width-2">
            <div class="form-group field-required ">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form_control field-check" />
                <p class="error-text" ></p>
            </div>
        </div>
        <div class="form-width-2">
            <div class="form-group  field-ajax" data-ajax-url="<?php echo url_to('erp.inventory.ajaxservicecodeunique').'?' ;?>" >
                <label class="form-label">Code</label>
                <input type="text" name="code" class="form_control field-check" />
                <p class="error-text" ></p>
            </div>
        </div>
        <div class="form-width-2">
            <div class="form-group field-required ">
                <label class="form-label">Group</label>
                <div class="selectBox poR">
                    <div class="selectBoxBtn flex"> 
                        <div class="textFlow" data-default="select group">select group</div>
                        <button class="close" type="button" ><i class="fa fa-close"></i></button>
                        <button class="drops" type="button" ><i class="fa fa-caret-down"></i></button>
                        <input type="hidden"  class="selectBox_Value field-check" name="group" value="" >
                    </div>
                    <ul role="listbox" class="selectBox_Container alldiv">
                        <?php
                            foreach ($service_groups as $group) {
                                ?>
                        <li role="option" data-value="<?php echo $group['group_id'];?>" ><?php echo $group['group_name'];?></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                <p class="error-text" ></p>
            </div>
        </div>
        <div class="form-width-2">
            <div class="form-group field-money ">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form_control field-check" />
                <p class="error-text" ></p>
            </div>
        </div>
        <div class="form-width-2">
            <div class="form-group field-required ">
                <label class="form-label">Tax1</label>
                <div class="selectBox poR">
                    <div class="selectBoxBtn flex"> 
                        <div class="textFlow" data-default="select tax">select tax</div>
                        <button class="close" type="button" ><i class="fa fa-close"></i></button>
                        <button class="drops" type="button" ><i class="fa fa-caret-down"></i></button>
                        <input type="hidden"  class="selectBox_Value field-check" name="tax1" value="" >
                    </div>
                    <ul role="listbox" class="selectBox_Container alldiv">
                        <?php
                            foreach ($taxes as $tax) {
                                ?>
                        <li role="option" data-value="<?php echo $tax['tax_id'];?>" ><?php echo $tax['tax_name'];?></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                <p class="error-text" ></p>
            </div>
        </div>
        <div class="form-width-2">
            <div class="form-group ">
                <label class="form-label">Tax2</label>
                <div class="selectBox poR">
                    <div class="selectBoxBtn flex"> 
                        <div class="textFlow" data-default="select tax">select tax</div>
                        <button class="close" type="button" ><i class="fa fa-close"></i></button>
                        <button class="drops" type="button" ><i class="fa fa-caret-down"></i></button>
                        <input type="hidden"  class="selectBox_Value field-check" name="tax2" value="" >
                    </div>
                    <ul role="listbox" class="selectBox_Container alldiv">
                        <?php
                            foreach ($taxes as $tax) {
                                ?>
                        <li role="option" data-value="<?php echo $tax['tax_id'];?>" ><?php echo $tax['tax_name'];?></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                <p class="error-text" ></p>
            </div>
        </div>

        <div class="form-width-1">
            <div class="form-group field-required">
                <label class="form-label">Short Description</label>
                <textarea rows="3" name="short_desc" class="form_control field-check" ></textarea>
                <p class="error-text" ></p>
            </div>
        </div>
        <div class="form-width-1">
            <div class="form-group ">
                <label class="form-label">Long Description</label>
                <textarea rows="3" name="long_desc" class="form_control field-check" ></textarea>
                <p class="error-text"></p>
            </div>
        </div>

        <!--CUSTOM FIELDS -->
            <input type="hidden" name="customfield_chkbx_counter" value="<?php echo $customfield_chkbx_counter; ?>" />
            <?php echo $customfields; ?>
        <!--CUSTOM FIELDS ENDS-->

        <div class="form-width-1">
            <div class="form-group textRight">
                <a href="<?php echo url_to('erp.inventory.services') ;?>" class="btn outline-secondary">Cancel</a>
                <button class="btn bg-primary" type="button" id="service_add_submit">Save</button>
            </div>
        </div>
    </form>
</div>








<!--SCRIPT WORKS -->
</div>
    </main>
    <script src="<?php echo base_url().'assets/js/jquery.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/script.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/erp.js' ;?>" ></script>
    <script type="text/javascript">
        let closer=new WindowCloser();
        closer.init();

        document.querySelectorAll(".selectBox").forEach((item)=>{
            let selectbox=new SelectBox(item);
            selectbox.init();
            closer.register_shutdown(selectbox.shutdown,selectbox.get_container());
        });

        let form=document.getElementById("service_add_form");
        let validator=new FormValidate(form);

        let lock=false;
        document.getElementById("service_add_submit").onclick=function(evt){
            if(!lock){
                lock=true;
                validator.validate(
                (params)=>{
                    form.submit();
                    lock=false;
                },
                (params)=>{
                    lock=false;
                },
                {});
            }
        }

        <?php
            if(session()->getflashdata("op_success")){ ?>
                let alerts=new ModalAlert();
                alerts.invoke_alert("<?php echo session()->getflashdata('op_success'); ?>","success");
        <?php
            }else if(session()->getflashdata("op_error")){ ?>
                let alert=new ModalAlert();
                alert.invoke_alert("<?php echo session()->getflashdata('op_error'); ?>","error");
        <?php
            }
        ?>
    </script>
    </body>
</html>