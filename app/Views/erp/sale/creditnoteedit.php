<div class="alldiv flex widget_title">
    <h3>Edit Credit Note</h3>
    <div class="title_right">
        <a href="<?= url_to('erp.sale.creditnotes'); ?>" class="btn bg-success"><i class="fa fa-reply"></i> Back </a>
    </div>
</div>

<div class="alldiv">
    <?php
    echo form_open(url_to('erp.edit.creditnoteedit', $credit_id), array(
        "id" => "credit_edit_form",
        "class" => "flex"
    ));
    ?>
    <div class="form-width-2">
        <div class="form-group" data-ajax-url="#">
            <label class="form-label">Credit Code</label>
            <input type="text" name="code" value=<?= $credit_note['code'];?> class="form_control field-check" readonly/>
            <p class="error-text"></p>
        </div>
    </div>  
    <div class="form-width-2">
        <div class="form-group field-required ">
            <label class="form-label ">Customer</label>
            <select class="form_control field-check" name="customer_id" >
                <?php foreach ($customer_company as $row) : ?>
                    <option value="<?= $row['cust_id']; ?>" <?= ($row['cust_id'] == $credit_note['cust_id']) ? 'selected' : ''; ?>><?= $row['company']; ?></option>
                <?php endforeach; ?>
            </select>
            <p class="error-text"></p>
        </div>
    </div>
    <div class="form-width-2">
        <div class="form-group field-required">
            <label class="form-label">Credit Note Date</label>
            <input type="date" name="issued_date" value="<?= $credit_note['issued_date'];?>" class="form_control field-check" />
            <p class="error-text"></p>
        </div>
    </div>
    <div class="form-width-2">
        <div class="form-group ">
            <label class="form-label">Amount</label>
            <input type="text" name="other_charge" value="<?= $credit_note['other_charge'];?>" class="form_control field-check" />
            <p class="error-text"></p>
        </div>
    </div>
    <div class="form-width-2">
        <div class="form-group field-required">
            <label class="form-label">Payment Terms</label>
            <input type="text" name="payment_terms" value="<?= $credit_note['payment_terms'];?>" class="form_control field-check" />
            <p class="error-text"></p>
        </div>
    </div>
    <div class="form-width-1">
        <div class="form-group">
            <label class="form-label">Terms and condition</label>
            <textarea rows="3" id="termsCondition" name="terms_condition" class="form_control" <?= $credit_note['terms_condition']; ?>></textarea>
            <p class="error-text"></p>
        </div>
    </div>
    <div class="form-width-1">
        <div class="form-group">
            <label class="form-label">Remarks</label>
            <textarea rows="3" name="remarks" class="form_control field-check"><?= $credit_note['remarks'];?></textarea>
            <p class="error-text"></p>
        </div>
    </div>

    <div class="form-width-1">
        <div class="form-group textRight ">
            <a class="btn outline-danger" href="<?= url_to('erp.sale.creditnotes'); ?>">Cancel</a>
            <button class="btn bg-primary" type="button" id="credit_edit_btn">Save</button>
        </div>
    </div>
    <?php
    echo form_close();
    ?>
</div>


<!--SCRIPT WORKS -->
</div>
</main>
<script src="<?php echo base_url() . 'assets/js/jquery.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/js/script.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/js/erp.js'; ?>"></script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#termsCondition'))
            .catch(error => {
                console.error(error);
            });
    });
</script>

<script type="text/javascript">
    let closer = new WindowCloser();
    let alert = new ModalAlert();
    closer.init();

    let form = document.getElementById("credit_edit_form");
    let validator = new FormValidate(form);


    let lock = false;
    document.getElementById("credit_edit_btn").onclick = function(evt) {
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
        alert.invoke_alert("<?= session()->getFlashdata('op_success'); ?>", "success");
    <?php
    } else if (session()->getFlashdata("op_error")) { ?>
        alert.invoke_alert("<?= session()->getFlashdata('op_error'); ?>", "error");
    <?php
    }
    ?>
</script>
</body>

</html>