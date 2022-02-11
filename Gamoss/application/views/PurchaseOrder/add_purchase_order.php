<main class="main new-post-main" id="skip-target">
      <div class="container">
      <?= form_open_multipart('purchaseorder/addorder'); ?>
          <div class="main-title-wrapper">
            <h2 class="main-title">Add Order</h2>
          </div>
          <div class="row new-page__row">
            <div class="col-xl-12 col-md-12">
              <div class="main-content new-page-content">

                <div class="main-title-wrapper">
                  <h2 class="main-title">Add New Order</h2>
                  <div class="main-btns-wrapper">
                    <button class="primary-default-btn">Save</button>
                  </div>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <label>
                            <div class="white-block" style="padding:0">
                                <span class="new-page-label">Vendor</span>
                                <select class="select transparent-btn" class="vendor_id" name="vendor_id" required>
                                <?php foreach ($allvendor as $av) { ?>
                                    <option value="<?= $av["id"]; ?>"><?= $av["vendor_name"]; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </label>
                    </div>
                    <div class="col-sm">
                        <label>
                        <span class="new-page-label">Date & Time</span>
                        <input type="datetime-local" name="date_time" placeholder="Enter Datetime" required />
                        </label>
                    </div>
                    <div class="col-sm">
                        <label>
                        <span class="new-page-label">PO Number</span>
                        <input readonly type="text" name="po_number" placeholder="Enter PO Number" value="PO<?= date("Y") ?><?= $allpurchase ?>">
                        </label>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="users-table table-wrapper">
                            <table class="library-table">
                                <thead>
                                    <tr class="users-table-info">
                                    <th>&emsp;&emsp;Item Name</th>
                                    <th>Item Description</th>
                                    <th>HSN</th>
                                    <th>Quantity</th>
                                    <th>Rate</th>
                                    <th>&emsp;Tax</th>
                                    <th>&emsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> &ensp; <input type="text" id="input_name" placeholder="Item Name"></td>
                                    <td> &ensp;<input type="text" id="input_description" placeholder="Item Description"></td>
                                    <td> &ensp;<input type="text" id="input_hsn" placeholder="HSN"></td>
                                    <td> &ensp;<input type="number" id="input_quantity" placeholder="Quantity"></td>
                                    <td> &ensp;<input type="number" id="input_rate" placeholder="Rate"></td>
                                    <td> &ensp;
                                        <!-- <div class="white-block">
                                            <select class="select-checkbox transparent-btn" id="input_gst">
                                                <option selected value="9">CGST 9%</option>
                                                <option value="18">GST 18%</option>
                                               
                                            </select>
                                        </div> -->

                                        <span class="p-relative">
                                            <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                            GST<i data-feather="chevron-down" aria-hidden="true"></i>
                                            </button>
                                            <ul class="users-item-dropdown dropdown">
                                            <li>
                                                <div class="row">
                                                    <div class="col-3"><input type="checkbox" name="cgst" id="cgst_value"></div>
                                                    <div class="col-9">CGST 9%</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-3"><input type="checkbox" name="igst" id="igst_value"></div>
                                                    <div class="col-9">ICGST 9%</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-3"><input type="checkbox" name="gst" id="gst_value"></div>
                                                    <div class="col-9">GST 18%</div>
                                                </div>
                                            </li>
                                            </ul>
                                        </span>
                                    </td>
                                    <td> 
                                        <button type="button" class="badge-active" style="padding: 5px;" onclick="addTableRow()">
                                        <i data-feather="plus"></i>
                                        </button>
                                    </td>
                                </tr>
                                

                                </tbody>
                            </table>
                            <table class="library-table" >
                                <thead>
                                    <tr class="users-table-info">
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
                                
                                

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-8"></div>
                            <div class="col-4">
                            <div class="white-block">
                                
                                <p>Sub Total <input type="number" readonly placeholder="Sub Total" id="sub_total" name="sub_total" value="0" ></p>
                                <p>Discount</p>
                                    <div class="row">
                                        <div class="col-sm" style="margin-left:-15px;">
                                            <div class="white-block">
                                                <select class="select transparent-btn" id="discount_type" name="discount_type" onchange="calcTotal()">
                                                    <option value="num" selected>Value </option>
                                                    <option value="per">Percentage </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            &ensp;
                                            <input type="number" placeholder="Discount" id="discount_value" name="discount_value" value="0" onchange="calcTotal()">
                                        </div>
                                    </div>
                                
         
                                <p>Tax amount<input type="number" readonly placeholder="Tax amount" id="tax_amount" name="tax_amount" value="0" ></p>
                                <p>Total <input type="number" placeholder="Total" value="0" id="total_amount" name="total_amount" readonly ></p>
                                





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
        var count = 0;
        function addTableRow() {
            count = count+1;
            var input_name = document.getElementById("input_name").value;
            var input_description = document.getElementById("input_description").value;
            var input_hsn = document.getElementById("input_hsn").value;
            var input_quantity = document.getElementById("input_quantity").value;
            var input_rate = document.getElementById("input_rate").value;

            var input_cgst = document.getElementById("cgst_value").checked;
            var input_igst = document.getElementById("igst_value").checked;
            var input_gst_val = document.getElementById("gst_value").checked;
            // console.log(input_cgst);
            // console.log(input_igst);
            // console.log(input_gst_val);

            let input_gst = 0;
            let tax_type = "";
            if(input_cgst) {
                input_gst += 9;
                tax_type+="cgst";
            }
            if(input_igst) {
                input_gst += 9;
                tax_type+=" igst";
            }
            if(input_gst_val) {
                input_gst += 18;
                tax_type+=" gst";
            }

            // var e = document.getElementById("input_gst");
            // var input_gst = e.options[e.selectedIndex].value;


            var tax = ((parseInt(input_gst)/100)*( parseInt(input_quantity) * parseInt(input_rate) )).toFixed(2);
            var ttl =  ( parseInt( parseInt(input_quantity) * parseInt(input_rate) ) + parseFloat(tax) ).toFixed(2);


            var mystr = `<tr id="${count}">
                            <td>&ensp;<input type="text" readonly name="po_item_name[]" value="${input_name} " placeholder="Item Name"></td>
                            <td>&ensp;<input type="text" readonly name="po_item_description[]" value="${input_description} " placeholder="Item Description"></td>
                            <td>&ensp;<input type="text" readonly name="po_hsn[]" value="${input_hsn} " placeholder="HSN"></td>
                            <td>&ensp;<input type="text" readonly name="po_quantity[]" value="${input_quantity} " placeholder="Quantity"></td>
                            <td>&ensp;<input type="text" readonly name="po_rate[]" value="${input_rate} " placeholder="Rate"></td>
                            <td>&ensp;<input type="text" readonly name="po_tax[]" value="${tax} " placeholder="Tax"></td>
                            <td>&ensp;<input type="text" readonly name="po_tax_type[]" value="${tax_type} " placeholder="Tax Type"></td>
                            <td>&ensp;<input type="text" readonly name="po_value[]" value="${ttl} " placeholder="Value"></td>
                            <td> 
                                <button class="badge-trashed"  onclick="deleteTableRow(${count})" style="padding: 5px;">
                                    Delete
                                </button>
                            </td>
                        </tr>`;

                        if(input_quantity && input_rate) {
                            document.getElementById("poTable").insertAdjacentHTML("afterend", mystr);
                            calcTotal();
                        }
                        else {
                            alert("Please fill the complete details !");
                        }


        }

        function deleteTableRow(iddel) {
            document.getElementById(iddel).remove();
            calcTotal();
        }

        function calcTotal() {
            var quantities = $("input[name='po_quantity[]']").map(function(){return $(this).val();}).get();
            var rates = $("input[name='po_rate[]']").map(function(){return $(this).val();}).get();
            var taxes = $("input[name='po_tax[]']").map(function(){return $(this).val();}).get();
            var values = $("input[name='po_value[]']").map(function(){return $(this).val();}).get();
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
            // console.log(d_type)
            // console.log(vv)
            // console.log(parseFloat(vv)-dis)
            $("#total_amount").val( parseFloat(vv)-dis );


        }
    </script>