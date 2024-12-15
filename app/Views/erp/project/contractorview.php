<div class="alldiv flex widget_title">
    <h3>View Project Contractor</h3>
    <div class="title_right">
        <a href="<?php echo base_url().'erp/project/projects' ;?>" class="btn bg-success" ><i class="fa fa-reply" ></i> Back </a>
    </div>
</div>
<div class="alldiv">
    <ul class="tab_nav">
        <li><a type="button" class="tab_nav_item active" data-src="contractor_info">Info</a></li>
        <li><a type="button" class="tab_nav_item" data-src="contractor_attachment">Attachments</a></li>
        <li><a type="button" class="tab_nav_item" data-src="contractor_payment">Payments</a></li>
    </ul>
    <div class="tab_content">
        <div class="tab_pane active" id="contractor_info">
            <div class="flex">
                <div class="form-width-1">
                    <h2>Project Contractor Info</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><b>Workgroup</b></td>
                                    <td><?php echo $contractor->workgroup; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Contractor</b></td>
                                    <td><?php echo $contractor->contractor; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Code</b></td>
                                    <td><?php echo $contractor->con_code; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Contact Person</b></td>
                                    <td><?php echo $contractor->contact_person; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Amount</b></td>
                                    <td><?php echo $contractor->amount; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Pay Before</b></td>
                                    <td><?php echo $contractor->pay_before; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Paid Till</b></td>
                                    <td><?php echo $contractor->paid_till; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Due</b></td>
                                    <td><?php echo $contractor->due; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Status</b></td>
                                    <td><span class="st <?php echo $contractor_status_bg[$contractor->c_status]; ?> " ><?php echo $contractor_status[$contractor->c_status]; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab_pane" id="contractor_attachment">
            <div class="flex">
                <div class="form-width-1">
                    <div class="file-uploader-frame" data-ajax-url="<?php echo base_url().'erp/project/upload_contractorattachment?id='.$project_wgrp_id.'&' ;?>" >
                        <div class="file-uploader-box">
                            <span class="file-uploader-text">drop or click to upload files</span>
                        </div>
                        <div class="file-uploader-progessbar">
                            <span class="progressbar bg-success"></span>
                        </div>
                        <input type="file" class="file-uploader-input" name="attachment" />
                        <p class="file-uploader-error"></p>
                    </div>
                </div>
                <div class="form-width-1">
                    <div class="table-responsive">
                        <table class="table" >
                            <tbody class="attachment-holder" data-ajaxdel-url="<?php echo base_url().'erp/project/invoice_delete_attachment?' ;?>" >
                                <?php
                                    foreach ($attachments as $attach) {
                                        ?>
                                <tr>
                                    <td><a target="_BLANK" download class="text-primary" href="<?php echo get_attachment_link('project_contractor').$attach['filename'] ;?>"><?php echo $attach['filename'] ;?></a></td>
                                    <td><button class="btn bg-danger del-attachment-btn" type="button" data-attach-id="<?php echo $attach['attach_id'];?>" ><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab_pane" id="contractor_payment">
            <div class="flex">
                <div class="form-width-1 textRight">
                    <a href="#" id="payment_modal_invoker1" class="btn bg-primary" type="button" ><i class="fa fa-plus" ></i>Add Payment</a>
                </div>
                <div class="form-width-1">
                    <div class="datatable" id="invoice_payment_datatable" data-ajax-url="<?php echo base_url().'erp/project/ajax_contractorpayment_response?project_wgrp_id='.$project_wgrp_id.'&' ;?>" >
                            <div class="tableHeader flex">
                                <div class="formWidth">
                                    <div class="selectBox poR bulkaction" data-ajax-url="" >
                                        <div class="selectBoxBtn flex"> 
                                            <div class="textFlow" data-default="Action">Action</div>
                                            <button class="close" type="button" ><i class="fa fa-close"></i></button>
                                            <button class="drops" type="button" ><i class="fa fa-caret-down"></i></button>
                                            <input type="hidden" class="selectBox_Value" value="" >
                                        </div>
                                            <ul role="listbox" class="selectBox_Container alldiv">
                                            <li role="option" data-value="1" >Delete</li>
                                            <li role="option" data-value="2" >Send</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="formWidth">
                                    <input type="text" placeholder="search" class="form_control dt-search">
                                </div>
                                <div class="formWidth textRight">
                                <!--export button-->
                                    <a type="button" class="exprotBtn btn bg-primary"><i class="fa fa-external-link"></i> Export</a>
                                    <div class="export_container poF">
                                        <ul class="exportUl">
                                            <li><a data-default-href="<?php echo base_url().'erp/project/contractor_payment_export?export=excel&project_wgrp_id='.$project_wgrp_id.'&';?>" href="<?php echo base_url().'erp/project/contractor_payment_export?export=excel&project_wgrp_id='.$project_wgrp_id.'&';?>" target="_BLANK" ><img src="<?php echo base_url().'assets/images/icons/xls.png' ;?>" alt="excel" >EXCEL</a></li>
                                            <li><a data-default-href="<?php echo base_url().'erp/project/contractor_payment_export?export=pdf&project_wgrp_id='.$project_wgrp_id.'&';?>" href="<?php echo base_url().'erp/project/contractor_payment_export?export=pdf&project_wgrp_id='.$project_wgrp_id.'&';?>" target="_BLANK" ><img src="<?php echo base_url().'assets/images/icons/pdf.png' ;?>" alt="pdf" >PDF</a></li>
                                            <li><a data-default-href="<?php echo base_url().'erp/project/contractor_payment_export?export=csv&project_wgrp_id='.$project_wgrp_id.'&';?>" href="<?php echo base_url().'erp/project/contractor_payment_export?export=csv&project_wgrp_id='.$project_wgrp_id.'&';?>" target="_BLANK" ><img src="<?php echo base_url().'assets/images/icons/csv.png' ;?>" alt="csv" >CSV</a></li>
                                        </ul>
                                        <a type="button" class="closeBtn3 HoverA"><i class="fa fa-close"></i></a>
                                    </div>
                                <!--export button-->
                                </div>
                            </div>
                            <div class="table_responsive">
                                <table class="table">
                                    <thead class="thead">
                                        
                                    </thead>
                                    <tbody class="table-paint-area">
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="tableFooter flex">
                                <div class="tableFooterLeft flex">
                                    <p>Rows per page:</p>
                                    <div class="selectBox miniSelectBox poR">
                                        <div class="selectBoxBtn flex"> 
                                            <div class="textFlow" data-default="10">10</div>
                                            <button class="drops"><i class="fa fa-caret-down"></i></button>
                                            <input type="hidden" class="selectBox_Value" value="10">
                                        </div>
                                        <ul role="listbox" class="selectBox_Container alldiv">
                                            <li role="option" class="active" data-value="10" >10</li>
                                            <li role="option" data-value="15" >15</li>
                                            <li role="option" data-value="20">20</li>
                                            <li role="option" data-value="25">25</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tableFooterRight flex">
                                    <div class="pagination"><span class="dt-page-start" >1</span> - <span class="dt-page-end">5</span> of <span class="dt-total-rows" >100<span></div>
                                        <ul class="flex paginationBtns">
                                            <li><a type="button" class="HoverA dt-prev-btn" ><i class="fa fa-angle-left"></i></a></li>
                                            <li><a type="button" class="HoverA dt-next-btn" ><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--MODALS-->

    <div class="modal" id="payment_addedit_modal" role="dialog">
        <div class="modalbody">
            <h2 class="modalTitle">Payment</h2>
            <?php
                echo form_open(base_url().'erp/project/contractorpayment/'.$project_id.'/'.$project_wgrp_id,array(
                    "id"=>"payment_addedit_form",
                    "class"=>"flex modal-scroll-form"
                ));
            ?>
                <input type="hidden" name="contractor_pay_id" id="f_contractor_pay_id" value="0" />
                <div class="form-width-1">
                    <div class="form-group field-money ">
                        <label class="form-label">Amount</label>
                        <input type="text" class="form_control field-check" id="f_amount" name="amount" />
                        <p class="error-text" ></p>
                    </div>
                </div>
                <div class="form-width-1">
                    <div class="form-group field-required ">
                        <label class="form-label">Paid On</label>
                        <input type="date" class="form_control field-check" id="f_paid_on" name="paid_on" />
                        <p class="error-text" ></p>
                    </div>
                </div>
                <div class="form-width-1">
                    <div class="form-group field-required">
                        <label class="form-label">Payment Mode</label>
                        <div class="selectBox poR">
                            <div class="selectBoxBtn flex"> 
                                <div class="textFlow" data-default="select mode">select mode</div>
                                <button class="close" type="button" ><i class="fa fa-close"></i></button>
                                <button class="drops" type="button" ><i class="fa fa-caret-down"></i></button>
                                <input type="hidden" class="selectBox_Value field-check" id="f_payment_id" name="payment_id" value="" >
                            </div>
                            <ul role="listbox" class="selectBox_Container alldiv">
                            <?php
                                foreach ($paymentmodes as $row) {
                                    ?>
                                <li role="option" data-value="<?php echo $row['payment_id'];?>" ><?php echo $row['name'];?></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                        <p class="error-text" ></p>
                    </div>
                </div>
                <div class="form-width-1">
                    <div class="form-group">
                        <label class="form-label">Transaction ID</label>
                        <input type="text" class="form_control field-check" id="f_transaction_id" name="transaction_id" />
                        <p class="error-text" ></p>
                    </div>
                </div>
                <div class="form-width-1">
                    <div class="form-group">
                        <label class="form-label">Notes</label>
                        <textarea class="form_control field-check" id="f_notes" name="notes" ></textarea>
                        <p class="error-text" ></p>
                    </div>
                </div>
                <div class="form-width-1 ">
                    <div class="form-group textRight ">
                        <button type="button" class="btn outline-danger modalClose">Close</button>
                        <button class="btn bg-primary" type="button" id="payment_addedit_btn" >Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


<!-- MODAL ENDS -->




<!--SCRIPT WORKS -->
</div>
    </main>
    <script src="<?php echo base_url().'assets/js/jquery.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/script.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/erp.js' ;?>" ></script>
    <script type="text/javascript">
        let closer=new WindowCloser();
        closer.init();
        let tbody=document.querySelector(".attachment-holder");
        let fileuploader=new FileUploader(document.querySelector(".file-uploader-frame"));
        let alert=new ModalAlert();

        fileuploader.ajaxFullUpload({
            files_allowed:["text/plain","image/png","application/pdf","image/jpeg","image/gif","image/jpg","application/msword","application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/vnd.ms-powerpoint","application/vnd.openxmlformats-officedocument.presentationml.presentation","application/vnd.ms-excel","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet","image/webp","image/svg+xml"],
            listener:function(json){
                let tr=document.createElement("tr");
                let td1=document.createElement("td");
                let td2=document.createElement("td");
                td1.innerHTML=`<a target="_BLANK" download class="text-primary" href="`+json['filelink']+`">`+json['filename']+`</a>`;
                td2.innerHTML=`<button class="btn bg-danger del-attachment-btn" type="button" data-attach-id="`+json['insert_id']+`" ><i class="fa fa-trash"></i></button>`;
                tr.append(td1);
                tr.append(td2);
                tbody.append(tr);
            }
        });

        tbody.onclick=(evt)=>{
            let target=evt.target;
            let ajax_url=tbody.getAttribute("data-ajaxdel-url");
            tbody.querySelectorAll(".del-attachment-btn").forEach((item)=>{
                if(item.contains(target)){
                    let xhr=null;
                    if(window.ActiveXObject){
                        xhr=new ActiveXObject("Msxml2.XMLHTTP");
                    }else if(window.XMLHttpRequest){
                        xhr=new XMLHttpRequest();
                    }
                    if(xhr!==null || xhr!==undefined){
                        xhr.open("GET",ajax_url+"id="+item.getAttribute("data-attach-id"),true);
                        xhr.send(null);
                        xhr.onreadystatechange=(evt)=>{
                            if(xhr.readyState==4 && xhr.status==200){
                                let json=JSON.parse(xhr.responseText);
                                if(json['error']==0){
                                    alert.invoke_alert(json['reason'],"success");
                                    item.parentElement.parentElement.remove();
                                }else{
                                    alert.invoke_alert(json['reason'],"error");
                                }
                            }
                        }
                    }
                }
            })
        };


        let payment_selectboxes=[];
        document.querySelectorAll("#payment_addedit_modal .selectBox").forEach((item)=>{
            let selectbox=new SelectBox(item);
            selectbox.init();
            payment_selectboxes.push(selectbox);
            closer.register_shutdown(selectbox.shutdown,selectbox.get_container());
        });

        let payment_modal=new ModalBox(document.getElementById("payment_addedit_modal"));
        payment_modal.init();

        document.getElementById("payment_modal_invoker1").onclick=(evt)=>{
            document.getElementById("f_contractor_pay_id").value="0";
            document.getElementById("f_payment_id").value="";
            document.getElementById("f_notes").value="";
            document.getElementById("f_amount").value="";
            document.getElementById("f_paid_on").value="";
            document.getElementById("f_transaction_id").value="";
            for(let i=0;i<payment_selectboxes.length;i++){
                payment_selectboxes[i].construct();
            }
            payment_modal.show_modal();
        };

        let payment_paintarea=document.querySelector("#invoice_payment_datatable .table-paint-area");
        payment_paintarea.onclick=(evt)=>{
            let target=evt.target;
            payment_paintarea.querySelectorAll(".modalBtn").forEach((item)=>{
                if(item.contains(target)){
                    let ajax_url=item.getAttribute("data-ajax-url");
                    let xhr=null;
                    if(window.XMLHttpRequest){
                        xhr=new XMLHttpRequest();
                    }else if(window.ActiveXObject){
                        xhr=new ActiveXObject("Msxml2.XMLHTTP");
                    }
                    if(xhr!==null && xhr!==undefined){
                        xhr.open("GET",ajax_url,true);
                        xhr.send(null);
                        xhr.onreadystatechange=(evt)=>{
                            if(xhr.readyState==4 && xhr.status==200){
                                let json=JSON.parse(xhr.responseText);
                                if(json['error']==0){
                                    let data=json['data'];
                                    document.getElementById("f_contractor_pay_id").value=data['contractor_pay_id'];
                                    document.getElementById("f_payment_id").value=data['payment_id'];
                                    document.getElementById("f_notes").value=data['notes'];
                                    document.getElementById("f_amount").value=data['amount'];
                                    document.getElementById("f_paid_on").value=data['paid_on'];
                                    document.getElementById("f_transaction_id").value=data['transaction_id'];
                                    for(let i=0;i<payment_selectboxes.length;i++){
                                        payment_selectboxes[i].construct();
                                    }
                                    payment_modal.show_modal();
                                }
                            }
                        }
                    }
                }
            });
        };

        let payment_form=document.getElementById("payment_addedit_form");
        let payment_validator=new FormValidate(payment_form);

        let payment_lock=false;
        document.getElementById("payment_addedit_btn").onclick=(evt)=>{
            if(!payment_lock){
                payment_lock=true;
                payment_validator.validate(
                (params)=>{
                    payment_form.submit();
                    payment_lock=false;
                },
                (params)=>{
                    payment_lock=false;
                },
                {});
            }
        }

        let payment_datatable_elem=document.querySelector("#invoice_payment_datatable.datatable");
        let payment_rows_per_page=new SelectBox(payment_datatable_elem.querySelector(".tableFooter .selectBox"));
        payment_rows_per_page.init();
        closer.register_shutdown(payment_rows_per_page.shutdown,payment_rows_per_page.get_container())
        let payment_bulkaction=new SelectBox(payment_datatable_elem.querySelector(".tableHeader .bulkaction"));
        payment_bulkaction.init();
        closer.register_shutdown(payment_bulkaction.shutdown,payment_bulkaction.get_container());
        let payment_config=JSON.parse('<?php echo $payment_datatable_config; ?>');
        let payment_datatable=new DataTable(payment_datatable_elem,payment_config);
        payment_datatable.init();
        payment_rows_per_page.add_listener(payment_datatable.rows_per_page,{});

        <?php
            if($this->session->flashdata("op_success")){ ?>
                alert.invoke_alert("<?php echo $this->session->flashdata('op_success'); ?>","success");
        <?php
            }else if($this->session->flashdata("op_error")){ ?>
                alert.invoke_alert("<?php echo $this->session->flashdata('op_error'); ?>","error");
        <?php
            }
        ?>
    </script>
    </body>
</html>