<div class="alldiv flex widget_title">
    <h3>Add BOM</h3>
    <div class="title_right">
        <a href="<?= url_to('erp.mrp.planningview', $planning_id) ?>" class="btn bg-success"><i class="fa fa-reply"></i>
            Back </a>
    </div>
</div>
<div class="alldiv">
    <form action="<?= url_to('erp.mrp.add.bom', $planning_id) ?>" method="POST" class="flex" id="stock_add_form">
        <ul class="tab_nav">
            <li><a type="button" class="tab_nav_item active" data-src="bom">BOM</a></li>
            <li><a type="button" class="tab_nav_item" data-src="opertaions">Opertaion</a></li>
            <li><a type="button" class="tab_nav_item" data-src="scraploss">Scrap & Process Loss</a></li>
        </ul>

        <div class="tab_pane active" id="bom">
            <div class="flex">
                <div class="form-width-2">
                    <div class="form-group field-required">
                        <label class="form-label">SKU CODE</label>
                        <input type="text" class="form_control field-check" name="disabled"
                            value="<?= $planning_product_code ?>" disabled>
                        <input type="hidden" class="form_control" name="sku" value="<?= $planning_product_code ?>">
                        <p class="error-text"></p>
                    </div>
                </div>
                <div class="form-width-2">
                    <div class="form-group field-required">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form_control field-check" name="disabled1"
                            value="<?= $planning_product_name ?>" disabled>
                        <input type="hidden" class="form_control" name="item_id" value="<?= $planning_product_id ?>">
                        <p class="error-text"></p>
                    </div>
                </div>
                <div class="form-width-2">
                    <div class="form-group field-required">
                        <label class="form-label">Quantity</label>
                        <input type="number" id="qty_bom" class="form_control field-check" name="quantity" value="1">
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
                                    <li role="option" data-value="<?php echo $row['warehouse_id']; ?>">
                                        <?php echo $row['name']; ?>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <p class="error-text"></p>
                    </div>
                </div>
                <div class="form-width-2">
                    <div class="form-group field-required">
                        <label class="form-label">BOM Date</label>
                        <input type="date" name="mfg_date" id="mfg_date" class="form_control field-check" />
                        <p class="error-text"></p>
                    </div>
                </div>
                <? //= var_dump($status) ?>
                <div class="form-width-2">
                    <div class="form-group field-required">
                        <label class="form-label">Status</label>
                        <div class="selectBox poR">
                            <div class="selectBoxBtn flex">
                                <div class="textFlow" data-default="select warehouse">select status</div>
                                <button class="close" type="button"><i class="fa fa-close"></i></button>
                                <button class="drops" type="button"><i class="fa fa-caret-down"></i></button>
                                <input type="hidden" class="selectBox_Value field-check" name="status" value="">
                            </div>
                            <ul role="listbox" class="selectBox_Container alldiv">
                                <?php
                                foreach ($status as $key => $value) {
                                    ?>
                                    <li role="option" data-value="<?php echo $key; ?>"><?php echo $value; ?></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <p class="error-text"></p>
                    </div>
                </div>
                <div class="form-width-1">
                    <div class="widget_title">
                        <h3>Add Items</h3>
                    </div>
                    <div class="form-width-2">
                        <div class="form-group">
                            <label class="form-label">Select Materials Types</label>
                            <select name="rawmaterials_type" class="form_control" id="rawmaterials_type">
                                <option value="0">select type</option>
                                <option value="1">Raw Materials</option>
                                <option value="2">Semi Finished</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- //from ware house -->

                <div class="w-100 d-flex align-items-center" id="product_container">
                    <div class="form-width-1">
                        <div class="form-group" id="invoice_product">
                            <label class="form-label" id="product_label">Raw Materials</label>
                            <div class="ajaxselectBox poR" id="ajaxselectBoxpoR"
                                data-ajax-url="<?= url_to('erp.crm.ajaxfetchrawmaterials'); ?>">
                                <div class="ajaxselectBoxBtn flex">
                                    <div class="textFlow materials" data-default="select product">select materials</div>
                                    <button class="close" type="button"><i class="fa fa-close"></i></button>
                                    <button class="drops" type="button"><i class="fa fa-caret-down"></i></button>
                                    <input type="hidden" class="ajaxselectBox_Value field-check materials"
                                        name="raw_materials" value="0">
                                </div>
                                <div class="ajaxselectBox_Container alldiv">
                                    <input type="text" id="ajaxselectBox_Search_1"
                                        class="ajaxselectBox_Search form_control" />
                                    <ul role="listbox" class="listbox materials">
                                    </ul>
                                </div>
                            </div>
                            <p class="error-text"></p>
                        </div>
                    </div>
                
                    <div class="form-width-1">
                        <div class="form-group" id="invoice_product_qty">
                            <label class="form-label">price</label>
                            <input type="text" class="form_control field-check" name="price" id="est_amount" />
                            <p class="error-text"></p>
                        </div>
                    </div>
                    <div class="form-width-1">
                        <div class="form-group" id="product_qty">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="form_control field-check" name="quantitys" />
                            <p class="error-text"></p>
                        </div>
                    </div>
                    <div class="form-width-1">
                        <div class="form-group textRight">
                            <label class="form-label"></label>
                            <button class="btn outline-primary" type="button" id="add_item_btn">Add Item</button>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="total_amount" name="total_amount" value="0">
                <div class="form-width-1">
                    <table class="table">
                        <thead>
                            <th>SNO</th>
                            <th>Raw Material</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Resource</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="invoice_items_holder">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- //operatio -->
        <div class="tab_pane" id="opertaions">
            <div class="flex">
                <div class="form-width-1">
                    <div class="widget_title">
                        <h3>Operations</h3>
                    </div>
                </div>

                <div class="form-width-2">
                    <p class="my-4"><input type="checkbox" class="dt-checkbox-child open_window"
                            data-value="operation_adding_area">
                        With Operations</p>
                </div>
                <div class="form-width-2">
                    <p class="my-4"><input type="checkbox" class="dt-checkbox-child open_window"
                            style="text-align:right;" data-value="operation_cost_area">
                        Finished Goods based
                        Operating Cost</p>
                </div>

                <div class="form-width-1">
                    <input type="hidden" name="operation_type" id="operation_type">
                    <div id="operation_adding_area" class="p-3 operation_swap_areas" style="display: none;">
                        <div class="w-100 d-flex align-items-center">
                            <div class="form-width-2">
                                <div class="form-group">
                                    <label class="form-label">Operations</label>
                                    <div class="ajaxselectBox poR operation"
                                        data-ajax-url="<?= url_to('erp.mrp.operation.ajax_data'); ?>">
                                        <div class="ajaxselectBoxBtn flex">
                                            <div class="textFlow" data-default="select product">Select Operation</div>
                                            <button class="close" type="button"><i class="fa fa-close"></i></button>
                                            <button class="drops" type="button"><i
                                                    class="fa fa-caret-down"></i></button>
                                            <input type="hidden" class="ajaxselectBox_Value field-check"
                                                id="operation_id" value="0">
                                        </div>
                                        <div class="ajaxselectBox_Container alldiv">
                                            <input type="text" id="ajaxselectBox_Search_opration"
                                                class="ajaxselectBox_Search form_control" />
                                            <ul role="listbox" class="listbox">
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="error-text"></p>
                                </div>
                            </div>

                            <div class="form-width-2">
                                <div class="form-group" id="operation_time">
                                    <label class="form-label">Operation Time (Hrs)</label>
                                    <input type="text" class="form_control field-check" id="operating_hours" />
                                    <p class="error-text"></p>
                                </div>
                            </div>
                            <div class="form-width-1">
                                <div class="form-group textRight">
                                    <label class="form-label"></label>
                                    <button class="btn outline-primary" type="button" id="add_operation_btn">Add
                                        Operation</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-width-1">
                            <table class="table">
                                <thead>
                                    <th>Operation</th>
                                    <th>Workstation Name</th>
                                    <th>per hour cost</th>
                                    <th>Operation time</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="operation_list_area">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="operation_cost_area" class="p-3 operation_swap_areas" style="display: none;">
                        <p class="h6 my-3">Operating Cost Per BOM Quantity</p>
                        <input type="text" class="form_control" placeholder="Enter Cost per unit"
                            name="operation_per_unit_cost">
                    </div>
                </div>
            </div>
        </div>



        <div class="tab_pane" id="scraploss">
            <div class="form-width-1">
                <div class="widget_title">
                    <h3>Scrap Items</h3>
                </div>
                <div class="form-width-2">
                    <div class="form-group">
                        <label class="form-label">Select Materials Types</label>
                        <select name="scarp_raw_materials" class="form_control" id="scarp_raw_materials">
                            <option value="0">select type</option>
                            <option value="1">Raw Materials</option>
                            <option value="2">Semi Finished</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="w-100 d-flex align-items-center p-2" id="product_container_scrap">
                <div class="form-width-1">
                    <div class="form-group" id="invoice_product_scrap">
                        <label class="form-label" id="product_label_scrap">Raw Materials</label>
                        <div class="ajaxselectBox poR" id="ajaxselectBoxscrap"
                            data-ajax-url="<?= url_to('erp.crm.ajaxfetchrawmaterials'); ?>">
                            <div class="ajaxselectBoxBtn flex">
                                <div class="textFlow scrap" data-default="select product">select materials
                                </div>
                                <button class="close" type="button"><i class="fa fa-close"></i></button>
                                <button class="drops" type="button"><i class="fa fa-caret-down"></i></button>
                                <input type="text" class="ajaxselectBox_Value field-check scrap d-none"
                                    name="raw_materials" value="0">
                            </div>
                            <div class="ajaxselectBox_Container alldiv">
                                <input type="text" id="ajaxselectBox_Search_scrap"
                                    class="ajaxselectBox_Search form_control" />
                                <ul role="listbox" class="listbox scrap">
                                </ul>
                            </div>
                        </div>
                        <p class="error-text"></p>
                    </div>
                </div>

                <div class="form-width-1">
                    <div class="form-group" id="invoice_product_qty_scrap">
                        <label class="form-label">price</label>
                        <input type="text" class="form_control field-check" name="price" id="est_amount_scrap" />
                        <p class="error-text"></p>
                    </div>
                </div>
                <div class="form-width-1">
                    <div class="form-group" id="product_qty_scrap">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form_control field-check" name="quantitys_scrap" />
                        <p class="error-text"></p>
                    </div>
                </div>
                <div class="form-width-1">
                    <div class="form-group textRight">
                        <label class="form-label"></label>
                        <button class="btn outline-primary" type="button" id="add_item_btn_scrap">Add Item</button>
                    </div>
                </div>
            </div>
            <input type="hidden" id="total_amount_scrap" name="total_amount_scrap" value="0">
            <div class="form-width-1">
                <table class="table">
                    <thead>
                        <th>SNO</th>
                        <th>Raw Material</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Resource</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="invoice_items_holder_scrap">

                    </tbody>
                </table>
            </div>

            <div class="form-width-1 mt-4">
                <hr>
                <div class="widget_title">
                    <h3>Process Loss</h3>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="form-width-2">
                    <h5>% Process Loss</h5>
                    <input type="number" name="process_loss" id="process_loss" class="form_control" value="">
                </div>
                <div class="form-width-2" id="process_div" style="opacity: 0;">
                    <h5>Process Loss Qty</h5>
                    <input type="number" name="process_loss_qty" id="process_loss_qty" class="form_control" value=""
                        readonly>
                </div>
            </div>
            <div class="form-width-1 mt-4">
                <hr>
            </div>
        </div>
        <div class="form-width-1 mt-5 mb-3">
            <div class="form-group textRight">
                <a href="<?= url_to('erp.mrp.planningview', $planning_id) ?>" class="btn outline-secondary">Cancel</a>
                <button class="btn bg-primary" type="button" id="bom_add_submit">Save</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<style>
    .select2-container {
        width: 100% !important;
    }

    .select2-container .selection {
        height: 34px;
    }

    .select2-container--default .select2-selection--single {
        height: 40px !important;
        width: 100% !important;
        /* Adjust height */
        line-height: 40px !important;
        /* Align text vertically */
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 99% !important;
        background: #e5e3e6 !important;
        width: 34px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #000000 transparent transparent transparent !important;
    }
</style> -->
<script type="text/javascript">

    const today = new Date();
    document.getElementById("mfg_date").value = today.toISOString().split('T')[0];

    let alert = new ModalAlert();
    $(document).ready(function () {

        // $("#rawmaterials_data").select2();


        let closer = new WindowCloser();
        closer.init();
        let closer1 = new WindowCloser();
        closer1.init();
        // let closer2 = new WindowCloser();
        // closer2.init();

        // let product_links = JSON.parse('<?php //echo json_encode($product_links); ?>');
        // let base_url = "<?php //echo base_url(); ?>";

        let ajaxselectbox_elem = document.getElementById("ajaxselectBoxpoR");
        let ajaxselectbox = new AjaxSelectBox(ajaxselectbox_elem);
        let default_ajax_url = ajaxselectbox_elem.getAttribute("data-ajax-url");
        ajaxselectbox.init();
        closer.register_shutdown(ajaxselectbox.shutdown, ajaxselectbox.get_container());


        let ajaxselectbox_elem_1 = document.getElementById("ajaxselectBoxscrap");
        let ajaxselectbox_1 = new AjaxSelectBox(ajaxselectbox_elem_1);
        let default_ajax_url_1 = ajaxselectbox_elem_1.getAttribute("data-ajax-url");
        ajaxselectbox_1.init();
        closer1.register_shutdown(ajaxselectbox_1.shutdown, ajaxselectbox_1.get_container());

        // let ajaxselectbox_elem_2 = document.getElementById("ajaxwarehouse");
        // let ajaxselectbox_2 = new AjaxSelectBox(ajaxselectbox_elem_2);
        // let default_ajax_url_2 = ajaxselectbox_elem_2.getAttribute("data-ajax-url");
        // ajaxselectbox_2.init();
        // closer2.register_shutdown(ajaxselectbox_2.shutdown, ajaxselectbox_2.get_container());
        // ajaxselectbox.add_listener((params) => {
        //     // let product_id = params.value;
        //     console.log(params);
        // })
        // let selectbox_elem = document.querySelector(".selectBox.poR");
        // let selectbox = new SelectBox(selectbox_elem);
        // selectbox.init();
        // selectbox.add_listener((params) => {
        //     let url = params['value'];
        //     if (url !== null && url !== undefined && url !== "") {
        //         ajaxselectbox_elem.setAttribute("data-ajax-url", base_url + product_links[url]);
        //     } else {
        //         ajaxselectbox_elem.setAttribute("data-ajax-url", default_ajax_url);
        //     }
        // }, {});
        // closer.register_shutdown(selectbox.shutdown, selectbox.get_container());

        document.querySelectorAll(".selectBox.poR").forEach((item) => {
            let _selectbox = new SelectBox(item);
            _selectbox.init();
            closer.register_shutdown(_selectbox.shutdown, _selectbox.get_container());
        });

        // document.querySelectorAll(".selectBox:not(.poR)").forEach((item) => {
        //     let _ajaxselectbox = new AjaxSelectBox(item);
        //     _ajaxselectbox.init();
        //     closer.register_shutdown(_ajaxselectbox.shutdown, _ajaxselectbox.get_container());
        // });





    })


    let form = document.getElementById("stock_add_form");
    let validator = new FormValidate(form);
    let lock = false;
    document.getElementById("bom_add_submit").onclick = function (evt) {
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

    $("#process_loss").on("input", function (e) {
        let qty = Number($("#qty_bom").val());
        let per = Number(e.target.value);

        let total_qty_lost = (qty * per) / 100;

        console.log("Total loss qty", total_qty_lost);

        if (qty > 0) {

            if (total_qty_lost) {
                $("#process_div").css({ "opacity": 1 });
                $("#process_loss_qty").val(total_qty_lost);
            }
        } else {
            alert.invoke_alert("Bom Quantity is 0", "error");
        }
    })

    $("#qty_bom").on("change", function (e) {
        let val = $("#process_loss").val() != "" ? true : false;
        if (val) {
            $("#process_loss").trigger("input");
        }
    })

    // //warehouse func
    // $("#rawmaterials_data").on("select2:opening", function (e) {
    //     let warehouse_ids = $("#ajaxselectBox_Value_warehouse").val();
    //     let warehouse_type = $("#rawmaterials_type").val();
    //     console.log(warehouse_ids)
    //     console.log(warehouse_type)
    //     if (warehouse_ids == 0 && warehouse_ids == "") {
    //         console.log("warehouse_id false")
    //         alert.invoke_alert("Warehouse required!", "error");
    //         return;
    //     } else if (warehouse_type == 0 && warehouse_type == "") {
    //         console.log("warehouse_type false")
    //         alert.invoke_alert("Invalid Rawmaterial type", "error");
    //         return;
    //     } else {
    //         warehouse_type = (warehouse_type == 1) ? "raw_material" : "semi_finished";
    //         console.log("rawmatwerials", warehouse_type)
    //         api_rawmwteriasl_data(warehouse_ids, warehouse_type);

    //     }
    // })

    // function api_rawmwteriasl_data(warehouse_ids, warehouse_type) {
    //     $.ajax({
    //         url: '<?= url_to('erp.crm.ajaxfetchrawmaterials') ?>',
    //         type: "GET",
    //         data: {
    //             w_type: warehouse_type,
    //             w_id: warehouse_ids,
    //         }, success: function (response) {
    //             // console.log(response);
    //             let option_container = $("#rawmaterials_data");
    //             if (!response.error) {
    //                 $("#rawmaterials_data").html('');
    //                 let data = response.data;
    //                 data.forEach((item) => {
    //                     let option = `<option value = ${item.key}>${item.value}</option>`;
    //                     $("#rawmaterials_data").append(option);
    //                 })
    //             }

    //         }, error: function (xhr, status, error) {

    //         }
    //     })
    // }



    // func
    $("#add_item_btn").attr("disabled", true);
    $("#ajaxselectBox_Search_1").attr("disabled", true);
    $("#rawmaterials_type").on("change", function () {
        $(".textFlow.materials").text() == "select materials" ? "select materials" : $(".textFlow.materials").text("");
        $(".textFlow.materials").text() == "select materials" ? "select materials" : $(".ajaxselectBox_Value.field-check.materials").val(0);
        ($(".textFlow.materials").text() == "select materials") ? "select materials" : $(".listbox.materials").html("");
        $("#product_container").innerHTML = "";
        let type_mat = $(this).val();
        if (type_mat == 1) {
            $("#product_label").text("Raw Materials");
            $("#ajaxselectBoxpoR").attr("data-ajax-url", "<?= url_to('erp.crm.ajaxfetchrawmaterials'); ?>");
            $("#add_item_btn").removeAttr("disabled");
            $("#ajaxselectBox_Search_1").attr("disabled", false);
        } else {
            $("#product_label").text("Semi Finished Materials");
            $("#ajaxselectBoxpoR").attr("data-ajax-url", "<?= url_to('erp.crm.semifinished'); ?>");
            $("#add_item_btn").removeAttr("disabled");
            $("#ajaxselectBox_Search_1").attr("disabled", false);
        }
    })

    $("#add_item_btn_scrap").attr("disabled", true);
    $("#ajaxselectBox_Search_scrap").attr("disabled", true);
    $("#scarp_raw_materials").on("change", function () {
        $(".textFlow.scrap").text() == "select materials" ? "select materials" : $(".textFlow.scrap").text("");
        $(".textFlow.scrap").text() == "select materials" ? "select materials" : $(".ajaxselectBox_Value.field-check.scrap").val(0);
        ($(".textFlow.scrap").text() == "select materials") ? "select materials" : $(".listbox.scrap").html("");
        $("#product_container_scrap").innerHTML = "";
        let type_mat = $(this).val();
        if (type_mat == 1) {
            $("#product_label_scrap").text("Raw Materials");
            $("#ajaxselectBoxscrap").attr("data-ajax-url", "<?= url_to('erp.crm.ajaxfetchrawmaterials'); ?>");
            $("#add_item_btn_scrap").removeAttr("disabled");
            $("#ajaxselectBox_Search_scrap").attr("disabled", false);
        } else {
            $("#product_label_scrap").text("Semi Finished Materials");
            $("#ajaxselectBoxscrap").attr("data-ajax-url", "<?= url_to('erp.crm.semifinished'); ?>");
            $("#add_item_btn_scrap").removeAttr("disabled");
            $("#ajaxselectBox_Search_scrap").attr("disabled", false);
        }
    })

    // //operation
    // $("#add_operation_btn").attr("disabled", true);
    // $("#ajaxselectBox_Search_opration").attr("disabled", true);
    // $("#scarp_raw_materials").on("change", function () {
    //     $(".textFlow.scrap").text() == "select materials" ? "select materials" : $(".textFlow.scrap").text("");
    //     $(".textFlow.scrap").text() == "select materials" ? "select materials" : $(".ajaxselectBox_Value.field-check.scrap").val(0);
    //     ($(".textFlow.scrap").text() == "select materials") ? "select materials" : $(".listbox.scrap").html("");
    //     $("#product_container_scrap").innerHTML = "";
    //     let type_mat = $(this).val();
    //     if (type_mat == 1) {
    //         $("#product_label_scrap").text("Raw Materials");
    //         $("#ajaxselectBoxscrap").attr("data-ajax-url", "<?//= url_to('erp.crm.ajaxfetchrawmaterials'); ?>");
    //         $("#add_item_btn_scrap").removeAttr("disabled");
    //         $("#ajaxselectBox_Search_opration").attr("disabled", false);
    //     } else {
    //         $("#product_label_scrap").text("Semi Finished Materials");
    //         $("#ajaxselectBoxscrap").attr("data-ajax-url", "<?//= url_to('erp.crm.semifinished'); ?>");
    //         $("#add_item_btn_scrap").removeAttr("disabled");
    //         $("#ajaxselectBox_Search_opration").attr("disabled", false);
    //     }
    // })

    //bom
    let est_quantity = document.getElementById("product_qty");
    let sno = 1;


    let total_amount = document.getElementById("total_amount");
    console.log("above");
    document.getElementById("add_item_btn").onclick = (evt) => {
        // console.log("below");

        // get_stock_of();

        let est_product = document.getElementById("invoice_product");
        let qty = parseInt(est_quantity.querySelector(".field-check").value);
        let unit_price = parseFloat(document.getElementById("est_amount").value);
        let product_id = est_product.querySelector(".ajaxselectBox_Value.field-check.materials").value;
        let product_name = est_product.querySelector(".textFlow").textContent;
        // let warehouse_id = document.getElementById("ajaxselectBox_Value_warehouse").value;
 
        if (product_id === null || product_id === undefined || product_id === "") {
            alert.invoke_alert("Select product", "error");
            return;
        }
        if (qty === null || qty === undefined || isNaN(qty) || qty <= 0) {
            alert.invoke_alert("Invalid quantity", "error");
            return;
        }

        let product_names = document.querySelectorAll("#invoice_items_holder tr td:nth-child(2) span");
        if (product_names.length != 0) {
            let dup_found = false;
            for (let i = 0; i < product_names.length; i++) {
                if (product_name == product_names[i].textContent) {
                    dup_found = true;
                    break;
                }
            }
            if (dup_found) {
                alert.invoke_alert("Duplicate product not allowed", "error");
                return;
            }
        }
        let tr = ``;
        tr += `<td>` + sno + `</td>`
        sno++;
        console.log("qty = >", qty)
        console.log("price =>", unit_price)
        let rawmaterials_type = $("#rawmaterials_type").val();
        if (rawmaterials_type == 1) {
            tr += `<td><span>` + product_name + `</span><input type="hidden" name="product[` + sno + `][product_id]" value="` + product_id + `" /></td>`;
            tr += `<td><span>` + qty + `</span><input type="hidden" name="product[` + sno + `][quantity]" value="` + qty + `" /></td>`;
            tr += `<td><span>` + unit_price + `</span><input type="hidden" name="product[` + sno + `][price]" value="` + unit_price + `" /></td>`;
            tr += `<td><span>` + "rawmaterial" + `</span><input type="hidden" name="product[` + sno + `][product_type]" value="rawmaterial" /></td>`;
        } else {
            // console.log("2");
            tr += `<td><span>` + product_name + `</span><input type="hidden" name="product[` + sno + `][product_id]" value="` + product_id + `" /></td>`;
            tr += `<td><span>` + qty + `</span><input type="hidden" name="product[` + sno + `][quantity]" value="` + qty + `" /></td>`;
            tr += `<td><span>` + unit_price + `</span><input type="hidden" name="product[` + sno + `][price]" value="` + unit_price + `" /></td>`;
            tr += `<td><span>` + "semifinished" + `</span><input type="hidden" name="product[` + sno + `][product_type]" value="semifinished" /></td>`;
        }
        let amount = unit_price * qty;
        amount = amount.toFixed(2);
        tr += `<td><span>` + amount + `</span><input type="hidden" name="product[` + sno + `][amount]" value="` + amount + `" /></td>`;
        tr += `<td><button type="button" class="btn bg-danger product-remove-btn" ><i class="fa fa-trash"></i></button>`;
        let element = document.createElement("tr");
        element.innerHTML = tr;

        //
        let t_amount = total_amount.value;
        t_amount = Number(t_amount);
        amount = Number(amount);
        total_amount.value = t_amount + amount;
        // console.log("t_amount : ",total_amount.value);
        document.getElementById("invoice_items_holder").append(element);
    }
    document.getElementById("invoice_items_holder").onclick = (evt) => {
        let target = evt.target;
        document.querySelectorAll("#invoice_items_holder .product-remove-btn").forEach((item) => {
            if (item.contains(target)) {
                item.parentElement.parentElement.remove();
            }
        });
    }

    //scrap
    let est_quantity_scrap = document.getElementById("product_qty_scrap");
    let sno_scarp = 1;

    let total_amount_scrap = document.getElementById("total_amount_scrap");
    document.getElementById("add_item_btn_scrap").onclick = (evt) => {
        console.log("hit");
        let est_product1 = document.getElementById("invoice_product_scrap");
        console.log("hit");
        let qty1 = parseInt(est_quantity_scrap.querySelector(".field-check").value);
        console.log("hit");
        let unit_price1 = parseFloat(document.getElementById("est_amount_scrap").value);
        console.log("hit");
        let product_id1 = est_product1.querySelector(".ajaxselectBox_Value.field-check.scrap").value;
        console.log("hit");
        let product_name1 = est_product1.querySelector(".textFlow").textContent;

        if (product_id1 === null || product_id1 === undefined || product_id1 === "") {
            alert.invoke_alert("Select product", "error");
            return;
        }
        if (qty1 === null || qty1 === undefined || isNaN(qty1) || qty1 <= 0) {
            alert.invoke_alert("Invalid quantity", "error");
            return;
        }

        let product_names1 = document.querySelectorAll("#invoice_items_holder_scrap tr td:nth-child(2) span");
        if (product_names1.length != 0) {
            let dup_found1 = false;
            for (let i = 0; i < product_names1.length; i++) {
                if (product_name1 == product_names1[i].textContent) {
                    dup_found1 = true;
                    break;
                }
            }
            if (dup_found1) {
                alert.invoke_alert("Duplicate product not allowed", "error");
                return;
            }
        }
        let tr = ``;
        tr += `<td>` + sno_scarp + `</td>`
        sno_scarp++;
        console.log("qty = >", qty1);
        console.log("price =>", unit_price1);
        let rawmaterials_type_scr1 = $("#scarp_raw_materials").val();
        if (rawmaterials_type_scr1 == 1) {
            tr += `<td><span>` + product_name1 + `</span><input type="hidden" name="scrap[` + sno_scarp + `][scrap_id]" value="` + product_id1 + `" /></td>`;
            tr += `<td><span>` + qty1 + `</span><input type="hidden" name="scrap[` + sno_scarp + `][quantity]" value="` + qty1 + `" /></td>`;
            tr += `<td><span>` + unit_price1 + `</span><input type="hidden" name="scrap[` + sno_scarp + `][price]" value="` + unit_price1 + `" /></td>`;
            tr += `<td><span>` + "rawmaterial" + `</span><input type="hidden" name="scrap[` + sno_scarp + `][scrap_type]" value="rawmaterial" /></td>`;
        } else {
            // console.log("2");
            tr += `<td><span>` + product_name1 + `</span><input type="hidden" name="scrap[` + sno_scarp + `][scrap_id]" value="` + product_id1 + `" /></td>`;
            tr += `<td><span>` + qty1 + `</span><input type="hidden" name="scrap[` + sno_scarp + `][quantity]" value="` + qty1 + `" /></td>`;
            tr += `<td><span>` + unit_price1 + `</span><input type="hidden" name="scrap[` + sno_scarp + `][price]" value="` + unit_price1 + `" /></td>`;
            tr += `<td><span>` + "semifinished" + `</span><input type="hidden" name="scrap[` + sno_scarp + `][scrap_type]" value="semifinished" /></td>`;
        }
        let amount1 = unit_price1 * qty1;
        amount1 = amount1.toFixed(2);
        tr += `<td><span>` + amount1 + `</span><input type="hidden" name="scrap[` + sno_scarp + `][amount]" value="` + amount1 + `" /></td>`;
        tr += `<td><button type="button" class="btn bg-danger product-remove-btn" ><i class="fa fa-trash"></i></button>`;
        let element1 = document.createElement("tr");
        element1.innerHTML = tr;

        //
        let t_amount1 = total_amount_scrap.value;
        t_amount1 = Number(t_amount1);
        amount1 = Number(amount1);
        total_amount_scrap.value = t_amount1 + amount1;
        // console.log("t_amount : ",total_amount.value);
        document.getElementById("invoice_items_holder_scrap").append(element1);
    }
    document.getElementById("invoice_items_holder_scrap").onclick = (evt) => {
        let target1 = evt.target;
        document.querySelectorAll("#invoice_items_holder_scrap .product-remove-btn").forEach((item) => {
            if (item.contains(target1)) {
                item.parentElement.parentElement.remove();
            }
        });
    }



    <?php
    if (session()->getFlashdata("op_success")) { ?>
        // let alerts = new ModalAlert();
        alerts.invoke_alert("<?= session()->getFlashdata('op_success'); ?>", "success");
        <?php
    } else if (session()->getFlashdata("op_error")) { ?>
            // let alerts = new ModalAlert();
            alerts.invoke_alert("<?= session()->getFlashdata('op_error'); ?>", "error");
        <?php
    }
    ?>
</script>

<!-- Gokul's code Start -->
<style>
    .btn {
        position: relative;
    }

    .btn:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
<script>
    function delete_operation_row(event, id) {
        console.log(event);
        console.log(event.parentElement.parentElement.remove());
        console.log(id);
    }
    // $(document).ready(function () {
    let closer_operation = new WindowCloser();
    closer_operation.init();

    $('.open_window').on('click', function (event) {
        console.log('log_first', event.target.checked);
        if (event.target.checked) {
            $('.operation_swap_areas').hide();
            $('#' + event.target.dataset.value).show();
            $('#operation_type').val(event.target.dataset.value);
            $('.open_window').prop('checked', false);
            event.target.checked = true;
        } else {
            $('.operation_swap_areas').hide();
            $('#operation_type').val('');
        }
    });

    var list_area = document.getElementById('operation_list_area');



    let ajaxselectbox_elem_operation = document.querySelector(".ajaxselectBox.poR.operation");
    let ajaxselectbox_operation = new AjaxSelectBox(ajaxselectbox_elem_operation);
    let default_ajax_url_2 = ajaxselectbox_elem_operation.getAttribute("data-ajax-url");
    ajaxselectbox_operation.init();
    closer_operation.register_shutdown(ajaxselectbox_operation.shutdown, ajaxselectbox_operation.get_container());
    $("#add_operation_btn").removeAttr("disabled");


    let sno_number = 1;
    document.getElementById("add_operation_btn").onclick = (evt) => {
        var dataToSend = {
            id: $('#operation_id').val(),
        };
        let operating_hours = $('#operating_hours').val();

        $.ajax({
            url: "<?= url_to('erp.mrp.operation.bomdata') ?>",
            type: "GET",
            contentType: "application/json",
            data: dataToSend,
            success: function (response) {
                console.log("Success:", response.data);
                let data = response.data;
                if ($('input[name="operation_row[' + data.id + '][name]"]').length) {
                    alert.invoke_alert("Can't add duplicate operation !", "error");
                    return "";
                }
                var list_area = document.getElementById('operation_list_area');
                let row = document.createElement('tr');
                console.log("data => ", data);
                row.innerHTML = `

                    <td>${data.name}<input type="hidden" name="operation_row[${data.id}][name]" value="${data.name}" ><input type="hidden" name="operation_row[${data.id}][op_id]" value="${data.id}" ></td>
                    <td>${data.workstation_name}<input type="hidden" name="operation_row[${data.id}][workstation_name]" value="${data.workstation_name}" ></td>
                    <td>${data.total_cost}<input type="hidden" name="operation_row[${data.id}][total_cost]" value="${data.total_cost}" ></td>
                    <td>${operating_hours}<input type="hidden" name="operation_row[${data.id}][operating_hours]" value="${operating_hours}" ></td>
                    <td>${data.total_cost * operating_hours}<input type="hidden" name="operation_row[${data.id}][total_amount]" value="${data.total_cost * operating_hours}"></td>
                    <td>
                        <button class="btn bg-danger" type="button" onclick="delete_operation_row(this,${data.id})">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>`;

                list_area.appendChild(row);
                sno_number++;
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }
    // });
</script>
<!-- Gokul's code End -->

</body>

</html>