<!-- 1 Start create discount -->

<div class="card p-3">
    <form action="<?php echo BASE_URL; ?>admin/discounts" method="post">
        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="usr">Discount:</label>
                    <input type="number" min="1" max="100" class="form-control" id="usr" name="discount_percent">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="usr">Start Date:</label>
                    <input type="date" class="form-control" id="usr" name="discount_start">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="usr">Expiry Date:</label>
                    <input type="date" class="form-control" id="usr" name="discount_expiry">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="usr">Description:</label>
                    <input type="text" class="form-control" id="usr" name="discount_description">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="usr">Discount Status:</label>
                    <input type="text" class="form-control" id="usr" name="discount_status">
                </div>
            </div>

            <div class="col-md-4">
                <button class="btn btn-primary btn-block" name="add_discount" type="submit">Add Discount</button>
            </div>

        </div>
    </form>
</div>

<!-- End create discount-->

<!-- 2 Start view discount -->

<div class="card p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Discount</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>Expiry Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($discount_details as $data): ?>
                <tr>
                    <td>
                        <?php echo $data["discount_percent"]; ?>
                    </td>
                    <td>
                        <?php echo $data["discount_description"]; ?>
                    </td>
                    <td>
                        <?php echo $data["discount_start"]; ?>
                    </td>
                    <td>
                        <?php echo $data["discount_expiry"]; ?>
                    </td>
                    <td>
                        <?php echo $data["discount_status"]; ?>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
</div>

<!-- End view discount-->

<!-- 3 Start assign discount -->

<div class="card p-3">
    <h3>Assign Discounts</h3>
    <form action="<?php echo BASE_URL; ?>admin/discounts" method="post">
        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="sel1">Select Products:</label>
                    <select class="form-control" id="sel1" name="product_id">

                        <option value="0">All</option>
                        <?php foreach ($product_details as $data): ?>

                        <option value="<?php echo $data["product_id"]; ?>">
                            <?php echo $data["product_title"]; ?>
                        </option>

                        <?php endforeach ?>

                 </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="sel1">Select Discount:</label>
                    <select class="form-control" id="sel1" name="discount_id">

                        <?php foreach ($discount_details as $data): ?>

                        <option value="<?php echo $data["discount_id"]; ?>">
                            <?php echo $data["discount_description"]; ?>
                        </option>

                        <?php endforeach ?>

                 </select>
                </div>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary btn-block" name="assign_discount" type="submit">Assign</button>
                <button class="btn btn-danger btn-block" name="remove_discount" type="submit">Remove</button>
            </div>
            
        </div>
    </form>
</div>

<!-- End assign discount-->

<!-- 4 Start view product discount -->

<div class="card p-3">

</div>

<!-- End view product discount-->

