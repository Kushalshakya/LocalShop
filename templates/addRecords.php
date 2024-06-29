<?php include_once "config/addUser.php"; ?>


<div class="add-customer d-flex gap-2">
    <div class="pt-2 w-50">
        <h2 class="mb-4">Add Customer Records</h2>
        <form method="POST" action="config/addUser.php" class="bg-white rounded p-4">
            <div class="form-row d-flex gap-1">
                <div class="form-group col-md-6">
                    <label class="py-2" for="id">ID</label>
                    <input type="text" class="form-control" name="id" id="id" placeholder="ID" autocomplete="off" readonly
                    value="<?php echo $customerIdPrim; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label class="py-2" for="customerId">Customer ID</label>
                    <input type="text" class="form-control" name="customerId" id="customerId" placeholder="Customer ID" autocomplete="off" readonly
                    value="<?php echo $uniqueCustomerId; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="py-2" for="firstName">First Name</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Kushal" autocomplete="off">
            </div>
            <div class="form-group">
                <label class="py-2" for="lastName">Last Name</label>
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Shakya" autocomplete="off">
            </div>

            <div class="form-group">
                <label class="py-2" for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Dharan-13, Sunsari" autocomplete="off">
            </div>
            <div class="form-group">
                <label class="py-2" for="phoneNumber">Phone Number</label>
                <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="+977 9800000000" autocomplete="off">
            </div>
            <button type="submit" name="btn-submit" class="btn btn-submit text-white my-3">Submit</button>
        </form>
    </div>
    <div class="add-bought-products w-50 rounded p-2">
        <h2>Items Bought</h2>
        <div class="item-form px-2 pt-3 my-4 bg-white rounded" method="POST">
            <div class="form-group">
                <label class="py-2" for="customerId">Customer Phone Number</label>
                <input type="tel" class="form-control mb-3 customerPhoneNumber" id="customerId" placeholder="Phone Number" autocomplete="off">
            </div>
            <div class="item-add-wrap d-flex gap-2">
                <input type="text" placeholder="Item Name" class="form-control item-name" required>
                <input type="number" value="1" class="item-quantity" required>
                <input type="number" class="item-price" placeholder="Item Price" required>
            </div>
            <button class="btn btn-add text-white my-3 w-100">Add</button>
        </div>

        <table class="table table-striped table-hover text-center table-bordered table-data">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th class="text-start">Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="dynamic-tbody">
                
            </tbody>
            <!-- <tfoot class="dynamic-tfoot">
                <tr>
                    <td colspan="3" class="text-end">Total:</td>
                    <td colspan="2" class="text-start">300</td>
                </tr>
            </tfoot> -->
        </table>
        <div class="btn-wrap btn-wrap-payment d-flex justify-content-end gap-2">
            <button class="btn btn-pay px-3 text-white">Paid</button>
            <button class="btn btn-cancel bg-danger text-white px-3">Cancel</button>
        </div>
    </div>
</div>