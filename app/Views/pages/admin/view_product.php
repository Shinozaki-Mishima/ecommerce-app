<div class="container">
    <div class="card p-3">
        <div class="row">
            <div class="col-md-12">
                <h1>View Products</h1>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($product_details as $data): ?>
                            <tr>
                                <td>
                                    <img 
                                    style="width: 80px; height: 90px;" 
                                    src="<?php echo BASE_URL . $data["product_image1"]; ?>" 
                                    alt="image">
                                </td>
                                <td>
                                    <?php echo $data["product_title"]; ?>
                                </td>
                                <td>
                                    $<?php echo $data["product_price"]; ?>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="<?php echo BASE_URL."admin/products/edit/{$data["product_id"]}"; ?>">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>