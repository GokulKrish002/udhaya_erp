<div class="alldiv flex widget_title">
    <h3>Add BOM</h3>
    <div class="title_right">
        <a href="<?= url_to('erp.mrp.planningview', $planning_id) ?>" class="btn bg-success"><i class="fa fa-reply"></i> Back </a>
    </div>
</div>
<div class="alldiv">
    <form action="<?= url_to('erp.mrp.add.bom', $planning_id) ?>" method="POST" class="flex" id="stock_add_form">


        <div class="form-width-2">
            <div class="form-group field-required">
                <label class="form-label">Scheduling</label>
                <div class="ajaxselectBox poR" data-ajax-url="<?= url_to('erp.procurement.ajaxfetchpricelist'); ?>">
                    <div class="ajaxselectBoxBtn flex">
                        <div class="textFlow" data-default="select price">select Schedule</div>
                        <button class="close" type="button"><i class="fa fa-close"></i></button>
                        <button class="drops" type="button"><i class="fa fa-caret-down"></i></button>
                        <input type="hidden" class="ajaxselectBox_Value field-check" name="scheduling" value="">
                    </div>
                    <div class="ajaxselectBox_Container alldiv">
                        <input type="text" class="ajaxselectBox_Search form_control" />
                        <ul role="listbox">

                        </ul>
                    </div>
                </div>
                <p class="error-text"></p>
            </div>
        </div>

        <div class="form-width-2">
            <div class="form-group field-required">
                <label class="form-label">Warehouse</label>
                <div class="selectBox poR">
                    <div class="selectBoxBtn flex">
                        <div class="textFlow" data-default="select warehouse">select warehouse</div>
                        <button class="close" type="button"><i class="fa fa-close"></i></button>
                        <button class="drops" type="button"><i class="fa fa-caret-down"></i></button>
                        <input type="hidden" class="selectBox_Value field-check" name="warehouse_id" value="">
                    </div>
                    <ul role="listbox" class="selectBox_Container alldiv">
                        <?php
                        foreach ($warehouses as $row) {
                        ?>
                            <li role="option" data-value="<?php echo $row['warehouse_id']; ?>"><?php echo $row['name']; ?></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <p class="error-text"></p>
            </div>
        </div>
        <div class="form-width-2">
            <div class="form-group ">
                <label class="form-label">Cost Per Unit</label>
                <input type="text" name="cost_per_unit" class="form_control field-check" />
                <p class="error-text"></p>
            </div>
        </div>

        <div class="form-width-2">
            <div class="form-group field-required">
                <label class="form-label">BOM Date</label>
                <input type="date" name="mfg_date" class="form_control field-check" />
                <p class="error-text"></p>
            </div>
        </div>

        <div class="form-width-1">
            <div class="widget_title">
                <h3>Add Items</h3>
            </div>
        </div>
        <div class="form-width-3">
            <div class="form-group" id="invoice_product">
                <label class="form-label">Raw Materials</label>
                <div class="ajaxselectBox poR" data-ajax-url="<?= url_to('erp.crm.ajaxfetchfinishedgoods'); ?>">
                    <div class="ajaxselectBoxBtn flex">
                        <div class="textFlow" data-default="select product">select materials</div>
                        <button class="close" type="button"><i class="fa fa-close"></i></button>
                        <button class="drops" type="button"><i class="fa fa-caret-down"></i></button>
                        <input type="hidden" class="ajaxselectBox_Value field-check" name="raw_materials" value="">
                    </div>
                    <div class="ajaxselectBox_Container alldiv">
                        <input type="text" class="ajaxselectBox_Search form_control" />
                        <ul role="listbox">

                        </ul>
                    </div>
                </div>
                <p class="error-text"></p>
            </div>
        </div>
        <div class="form-width-3">
            <div class="form-group" id="invoice_price_list" data-ajax-url="<?= url_to('erp.sale.getPriceData'); ?>">
                <label class="form-label">Amount</label>
                <div class="selectBox poR">
                    <div class="selectBoxBtn flex">
                        <div class="textFlow" data-default="select price">select amount</div>
                        <button class="close" type="button"><i class="fa fa-close"></i></button>
                        <button class="drops" type="button"><i class="fa fa-caret-down"></i></button>
                        <input type="hidden" class="selectBox_Value field-check"  name="amount" value="">
                    </div>
                    <ul role="listbox" class="selectBox_Container alldiv">

                    </ul>
                </div>
                <p class="error-text"></p>
            </div>
        </div>
        
        <input type="hidden" id="invoice_amount" />
        <div class="form-width-3">
            <div class="form-group" id="invoice_product_qty">
                <label class="form-label">Quantity</label>
                <input type="text" class="form_control field-check" name="quantity" />
                <p class="error-text"></p>
            </div>
        </div>
        <div class="form-width-1">
            <div class="form-group textRight">
                <label class="form-label"></label>
                <button class="btn outline-primary" type="button" id="add_item_btn">Add Item</button>
            </div>
        </div>
        <div class="form-width-1">
            <table class="table">
                <thead>
                    <th>SNO</th>
                    <th>Raw Material</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                    <!-- <th>Tax</th> -->
                    <th>Action</th>
                </thead>
                <tbody id="invoice_items_holder">

                </tbody>
            </table>
        </div>


        <div class="form-width-1 mt-5" >
            <div class="form-group textRight">
                <a href="<?= url_to('erp.mrp.planningview', $planning_id) ?>" class="btn outline-secondary">Cancel</a>
                <button class="btn bg-primary" type="button" id="stock_add_submit">Save</button>
            </div>
        </div>
    </form>
</div>








<!--SCRIPT WORKS -->
</div>
</main>
<script src="<?php echo base_url() . 'assets/js/jquery.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/js/script.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/js/erp.js'; ?>"></script>
<script type="text/javascript">
    let closer = new WindowCloser();
    closer.init();

    let product_links = JSON.parse('<?php echo json_encode($product_links); ?>');
    let base_url = "<?php echo base_url(); ?>";

     
    let ajaxselectbox_elem = document.querySelector(".ajaxselectBox.stock_product_type");
    let ajaxselectbox = new AjaxSelectBox(ajaxselectbox_elem);
    let default_ajax_url = ajaxselectbox_elem.getAttribute("data-ajax-url");
    ajaxselectbox.init();
    closer.register_shutdown(ajaxselectbox.shutdown, ajaxselectbox.get_container());

    let selectbox_elem = document.querySelector(".selectBox.stock_product_type");
    let selectbox = new SelectBox(selectbox_elem);
    selectbox.init();
    selectbox.add_listener((params) => {
        let url = params['value'];
        if (url !== null && url !== undefined && url !== "") {
            ajaxselectbox_elem.setAttribute("data-ajax-url", base_url + product_links[url]);
        } else {
            ajaxselectbox_elem.setAttribute("data-ajax-url", default_ajax_url);
        }
    }, {});
    closer.register_shutdown(selectbox.shutdown, selectbox.get_container());

    document.querySelectorAll(".selectBox:not(.stock_product_type)").forEach((item) => {
        let _selectbox = new SelectBox(item);
        _selectbox.init();
        closer.register_shutdown(_selectbox.shutdown, _selectbox.get_container());
    });

    document.querySelectorAll(".ajaxselectBox:not(.stock_product_type)").forEach((item) => {
        let _ajaxselectbox = new AjaxSelectBox(item);
        _ajaxselectbox.init();
        closer.register_shutdown(_ajaxselectbox.shutdown, _ajaxselectbox.get_container());
    });


    let form = document.getElementById("stock_add_form");
    let validator = new FormValidate(form);

    let lock = false;
    document.getElementById("stock_add_submit").onclick = function(evt) {
        if (!lock) {
            lock = true;
            validator.validate(
                (params) => {
                    form.submit();
                    lock = false;
                },
                (params) => {
                    lock = false;
                }, {});
        }
    }

    <?php
    if (session()->getFlashdata("op_success")) { ?>
        let alerts = new ModalAlert();
        alerts.invoke_alert("<?= session()->getFlashdata('op_success'); ?>", "success");
    <?php
    } else if (session()->getFlashdata("op_error")) { ?>
        let alert = new ModalAlert();
        alert.invoke_alert("<?= session()->getFlashdata('op_error'); ?>", "error");
    <?php
    }
    ?>
</script>
</body>

</html>