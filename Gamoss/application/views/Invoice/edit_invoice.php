<main class="main new-post-main" id="skip-target">
      <div class="container">
      <?= form_open_multipart('invoice/editinvoicedata'); ?>
          <div class="main-title-wrapper">
            <h2 class="main-title">Edit Invoice</h2>
          </div>
          <div class="row new-page__row">
            <div class="col-xl-12 col-md-12">
              <div class="main-content new-page-content">

                <div class="main-title-wrapper">
                  <h2 class="main-title">Edit Your Invoice</h2>
       
                  <div class="main-btns-wrapper">
                    <button class="primary-default-btn">Save</button>
                  </div>
                </div>

                <div class="row">

                    <div class="col-sm">
                        <label>
                        <span class="new-page-label">Purchase Order</span>                        
                        <input required type="text" name="po_number" placeholder="PO Number" value="<?= $allpurchase["po"]; ?>" readonly>
                        <input type="hidden" value="<?= $allpurchase["id"]; ?>" name="po_id">
                        </label>
                    </div>
                    <div class="col-sm">
                        <label>
                        <span class="new-page-label">ASN </span>
                        <input type="text" name="asn" placeholder="Enter ASN"  value="<?= $allpurchase["asn"]; ?>" />
                        </label>
                    </div>
                    <div class="col-sm">
                        <label>
                        <span class="new-page-label">Invoice Number</span>
                        <input required type="text" name="invoice_number" placeholder="Enter Invoice Number"  value="<?= $allpurchase["invoice_number"]; ?>" readonly>
                        </label>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="users-table table-wrapper">
                         
                            <table class="library-table" >
                                <thead>
                                    <tr class="users-table-info">
                                        <th>SNo</th>
                                        <th> &emsp;Item Name</th>
                                        <th>Item Description</th>
                                        <th>HSN</th>
                                        <th>Quantity</th>
                                        <th>Rate</th>
                                        <th>Tax</th>
                                        <th>Tax Type</th>
                                        <th>Value</th>
                                        <th>&emsp;</th>
                                    </tr>
                                </thead>
                                <tbody id="poTable">
                                
                                <?php for($i=0; $i<count($orderdetails); $i++) { ?>

                                    
                                        <tr id="<?= $i+1; ?>">
                                            <td><?= $i+1; ?>&emsp;</td>
                                            <td><input type="text" readonly name="po_item_name[]" value="<?= $orderdetails[$i]["inv_item_name"] ?>" placeholder="Item Name"></td>
                                            <td><input type="text" readonly name="po_item_description[]" value="<?= $orderdetails[$i]["inv_item_description"] ?>" placeholder="Quantity"></td>
                                            <td><input type="text" readonly name="po_item_hsn[]" value="<?= $orderdetails[$i]["inv_item_hsn"] ?>" placeholder="Quantity"></td>

                                            <td><input type="text" id="<?= $i+1; ?>_po_item_quantity" name="po_item_quantity[]" value="<?= $orderdetails[$i]["inv_item_quantity"] ?>" placeholder="Quantity"  onchange="calcMe(<?= $i+1; ?>)"></td>
                                            <td><input type="text" id="<?= $i+1; ?>_po_item_rate" readonly name="po_item_rate[]" value="<?= $orderdetails[$i]["inv_item_rate"] ?>" placeholder="Rate"></td>
                                            <td><input type="text" id="<?= $i+1; ?>_po_item_tax" readonly name="po_item_tax[]" value="<?= $orderdetails[$i]["inv_item_tax"] ?>" placeholder="Tax"></td>
                                            <td><input type="text" id="<?= $i+1; ?>_po_item_tax_type" readonly name="po_item_tax_type[]" value="<?= $orderdetails[$i]["inv_item_tax_type"] ?>" placeholder="Tax"></td>
                                            <td><input type="text" id="<?= $i+1; ?>_po_item_value" readonly name="po_item_value[]" value="<?= $orderdetails[$i]["inv_item_value"] ?>" placeholder="Value"></td>
                                            <td></td>
                                        </tr>


                                <?php } ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-8"></div>
                            <div class="col-4">
                            <div class="white-block">
                                
                                <p>Sub Total <input type="number" readonly placeholder="Sub Total" id="sub_total" name="sub_total" value="<?= $allpurchase["sub_total"]; ?>" ></p>
                                <p>Discount</p>
                                    <div class="row">
                                        <div class="col-sm" style="margin-left:-15px;">
                                            <div class="white-block">
                                                <select class="select transparent-btn" id="discount_type" name="discount_type" onchange="calcTotal()">
                                                    <option value="num" <?php if($allpurchase["discount_type"] == "num") { ?> selected <?php } ?> >Value </option>
                                                    <option value="per" <?php if($allpurchase["discount_type"] == "per") { ?> selected <?php } ?> >Percentage </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            &ensp;
                                            <input type="number" placeholder="Discount" id="discount_value" name="discount_value" value="<?= $allpurchase["discount_value"]; ?>" onchange="calcTotal()">
                                        </div>
                                    </div>
                                
         
                                <p>Tax amount<input type="number" readonly placeholder="Tax amount" id="tax_amount" name="tax_amount" value="<?= $allpurchase["tax_amount"]; ?>" ></p>
                                <p>Total <input type="number" placeholder="Total" value="<?= $allpurchase["grand_total"]; ?>" id="total_amount" name="total_amount" readonly ></p>
                                
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


                
            </div>

          </div>
        <?= form_close(); ?>
      </div>
    </main>


    <script>
        function calcMe(id) {

            var i_quantity = $("#"+id+"_po_item_quantity").val();
            var i_rate = $("#"+id+"_po_item_rate").val();
            var i_tax = $("#"+id+"_po_item_tax").val();
            var i_value = $("#"+id+"_po_item_value").val();

            var i_tax = $("#"+id+"_po_item_tax_type").val();
            // console.log(i_tax);
            const myArray = i_tax.split(" ");
            var tax_per = 0;
            for(var i=0; i<myArray.length; i++) {
                if(myArray[i] == "gst") {
                    tax_per+=18;
                }
                else {
                    tax_per+=9;
                }
            }
            // console.log(tax_per);
            
            var temp2 = (tax_per / 100 ) * ( parseFloat(i_rate) * parseFloat(i_quantity) )
            var temp = ( parseFloat(i_rate) * parseFloat(i_quantity) ) + temp2;
            
            
            $("#"+id+"_po_item_value").val(temp);
            $("#"+id+"_po_item_tax").val(temp2);
            calcTotal();
        }


        function calcTotal() {
            var quantities = $("input[name='po_item_quantity[]']").map(function(){return $(this).val();}).get();
            var rates = $("input[name='po_item_rate[]']").map(function(){return $(this).val();}).get();
            var taxes = $("input[name='po_item_tax[]']").map(function(){return $(this).val();}).get();
            var values = $("input[name='po_item_value[]']").map(function(){return $(this).val();}).get();
            var rr = 0;
            var tt = 0;
            var vv = 0;
            for(var i=0; i<rates.length; i++) {
                rr += parseFloat(rates[i] * quantities[i]);
                tt += parseFloat(taxes[i]);
                vv += parseFloat(values[i]);
            }
            $("#sub_total").val(rr);
            $("#tax_amount").val(tt);

            var d_val = $("#discount_value").val();

            var ee = document.getElementById("discount_type");
            var d_type = ee.options[ee.selectedIndex].value;
            

            var dis = 0;
            if(d_type == "num") {
                dis = d_val;
            }
            else {
                dis = parseFloat( (parseInt(d_val)/100)*parseFloat(rr) ).toFixed(2);
            }
            console.log(dis);
            $("#total_amount").val( parseFloat(vv)-dis );


        }
    </script>