<div class="alldiv flex widget_title">
    <h3>Account Groups</h3>
    <div class="title_right">
        <a href="#" id="accgroup_modal_invoker1" class="btn bg-success" ><i class="fa fa-plus" ></i> Add </a>
    </div>
</div>

<div class="alldiv">
    <div class="datatable" data-ajax-url="<?= url_to('erp.finance.ajaxaccresponse').'?';?>" >
        <div class="filterBox">
            <div class="flex">
                <h4>Filter and Search</h4>
                <a type='button' class="filterIcon HoverA" title="Filter open/close"><i class="fa fa-filter"></i></a>
            </div>
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
                            <li><a data-default-href="<?= url_to('erp.finance.accgroupexport').'?export=excel&';?>" href="<?= url_to('erp.finance.accgroupexport').'?export=excel&';?>" target="_BLANK" ><img src="<?php echo base_url().'assets/images/icons/xls.png' ;?>" alt="excel" >EXCEL</a></li>
                            <li><a data-default-href="<?= url_to('erp.finance.accgroupexport').'?export=pdf&';?>" href="<?= url_to('erp.finance.accgroupexport').'?export=pdf&';?>" target="_BLANK" ><img src="<?php echo base_url().'assets/images/icons/pdf.png' ;?>" alt="pdf" >PDF</a></li>
                            <li><a data-default-href="<?= url_to('erp.finance.accgroupexport').'?export=csv&';?>" href="<?= url_to('erp.finance.accgroupexport').'?export=csv&';?>" target="_BLANK" ><img src="<?php echo base_url().'assets/images/icons/csv.png' ;?>" alt="csv" >CSV</a></li>
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




<!--MODALS-->
<div class="modal" id="accgroup_addedit_modal" role="dialog">
        <div class="modalbody">
            <h2 class="modalTitle">Account Groups</h2>
            <?= form_open(url_to('erp.finance.accountgroup'),["id"=>"accgroup_addedit_form", 
            "class"=>"flex" ]);
            ?>
                <input type="hidden" name="acc_group_id" id="f_acc_group_id" value="0" />
                <div class="form-width-1">
                    <div class="form-group field-required ">
                        <label class="form-label">Group Name</label>
                        <input type="text" class="form_control field-check" id="f_group_name" name="group_name" />
                        <p class="error-text" ></p>
                    </div>
                </div>
                <div class="form-width-1">
                    <div class="form-group field-required">
                        <label class="form-label">Base</label>
                        <div class="selectBox poR">
                            <div class="selectBoxBtn flex"> 
                                <div class="textFlow" data-default="select base">select base</div>
                                <button class="close" type="button" ><i class="fa fa-close"></i></button>
                                <button class="drops" type="button" ><i class="fa fa-caret-down"></i></button>
                                <input type="hidden" id="f_base_id" class="selectBox_Value field-check" name="base_id" value="" >
                            </div>
                            <ul role="listbox" class="selectBox_Container alldiv">
                            <?php
                                foreach ($accountbase as $base) {
                                    ?>
                                <li role="option" data-value="<?php echo $base['base_id']; ?>" ><?php echo $base['base_name']; ?></li>
                            <?php
                                }
                            ?>
                            </ul>
                        </div>
                        <p class="error-text" ></p>
                    </div>
                </div>
                <div class="form-width-1">
                    <div class="form-group field-checked-any">
                        <label class="form-label" >Profit/Loss</label>
                        <div id="f_profit_loss" >
                            <label class="form-check-label"><input type="radio" class="field-check" name="profit_loss" value="1" /> Yes </label>
                            <label class="form-check-label"><input type="radio" class="field-check" name="profit_loss" value="0" /> No </label>
                        </div>
                        <p class="error-text" ></p>
                    </div>
                </div>
                <div class="form-width-1 ">
                    <div class="form-group textRight ">
                        <button type="button" class="btn outline-danger modalClose">Close</button>
                        <button class="btn bg-primary" type="button" id="accgroup_addedit_btn" >Save</button>
                    </div>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
<!-- MODAL ENDS-->


<!--SCRIPT WORKS -->
</div>
    </main>
    <script src="<?php echo base_url().'assets/js/jquery.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/script.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/erp.js' ;?>" ></script>

    <script type="text/javascript">
        let alert=new ModalAlert();
        let closer=new WindowCloser();
        closer.init();
        let selectboxes=[];
        document.querySelectorAll("#accgroup_addedit_modal .selectBox").forEach((item)=>{
            let selectbox=new SelectBox(item);
            selectboxes.push(selectbox);
            selectbox.init();
            closer.register_shutdown(selectbox.shutdown,selectbox.get_container());
        });

        let accgroup_modal=new ModalBox(document.getElementById("accgroup_addedit_modal"));
        accgroup_modal.init();

        document.getElementById("accgroup_modal_invoker1").onclick=(evt)=>{
            document.getElementById("f_acc_group_id").value="0";
            document.getElementById("f_group_name").value="";
            document.getElementById("f_base_id").value="";
            for(let i=0;i<selectboxes.length;i++){
                selectboxes[i].construct();
            }
            document.querySelectorAll("#f_profit_loss .field-check").forEach((item)=>{
                item.checked=false;
            });
            accgroup_modal.show_modal();
        };

        let accgroup_paintarea=document.querySelector(".table-paint-area");
        accgroup_paintarea.onclick=(evt)=>{
            let target=evt.target;
            accgroup_paintarea.querySelectorAll(".modalBtn").forEach((item)=>{
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
                                    document.getElementById("f_acc_group_id").value=data['acc_group_id'];
                                    document.getElementById("f_group_name").value=data['group_name'];
                                    document.getElementById("f_base_id").value=data['base_id'];
                                    for(let i=0;i<selectboxes.length;i++){
                                        selectboxes[i].construct();
                                    }
                                    let profit_loss=data['profit_loss'];
                                    document.querySelectorAll("#f_profit_loss .field-check").forEach((item)=>{
                                        if(item.getAttribute("value")==profit_loss){
                                            item.checked=true;
                                        }
                                    });
                                    accgroup_modal.show_modal();
                                }
                            }
                        }
                    }
                }
            });
        };

        let accgroup_form=document.getElementById("accgroup_addedit_form");
        let accgroup_validator=new FormValidate(accgroup_form);

        let accgroup_lock=false;
        document.getElementById("accgroup_addedit_btn").onclick=(evt)=>{
            if(!accgroup_lock){
                accgroup_lock=true;
                accgroup_validator.validate(
                (params)=>{
                    accgroup_form.submit();
                    accgroup_lock=false;
                },
                (params)=>{
                    accgroup_lock=false;
                },
                {});
            }
        }


        let datatable_elem=document.querySelector(".datatable");

        let rows_per_page=new SelectBox(datatable_elem.querySelector(".tableFooter .selectBox"));
        rows_per_page.init();
        closer.register_shutdown(rows_per_page.shutdown,rows_per_page.get_container());

        let bulkaction=new SelectBox(datatable_elem.querySelector(".tableHeader .bulkaction"));
        bulkaction.init();
        closer.register_shutdown(bulkaction.shutdown,bulkaction.get_container());

        let config=JSON.parse('<?php echo $accgroup_datatable_config; ?>');
        let datatable=new DataTable(datatable_elem,config);
        datatable.init();

        rows_per_page.add_listener(datatable.rows_per_page,{});

         <?php
             if(session()->getFlashdata("op_success")){ ?>
                 alert.invoke_alert("<?php echo session()->getFlashdata('op_success'); ?>","success");
         <?php
             }else if(session()->getFlashdata("op_error")){ ?>
                 alert.invoke_alert("<?php echo session()->getFlashdata('op_error'); ?>","error");
         <?php
             }
         ?>
    </script>
    </body>
</html>