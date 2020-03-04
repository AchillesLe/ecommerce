<?php 
    $products = $this->data['products'];
    $categories = $this->data['categories'];
?>
<?php include('layout/header.php') ?>
<div class="container-fluid" id="page-product">
    <h1 class="mt-4">Products</h1>

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct">
        Add Product 
    </a>

    <div class="card mb-4 collapse" id="collapseProduct">
        <div class="card-header"><i class="fas fa-table mr-1"></i>New Product</div>
        <div class="card-body">
            <form action="<?=base_url('admin/add-product')?>" method="post">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Name</label>
                    <input class="form-control py-4" type="text" name="name" placeholder="Name" />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Desciption</label>
                    <input class="form-control py-4" type="text" name="des" placeholder="Desciption" />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Price</label>
                    <input class="form-control py-4" type="text" name="price" placeholder="Price" />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Quantity</label>
                    <input class="form-control py-4" type="text" name="qty" type="number" placeholder="Quantity" />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Category</label>
                    <select class="form-control" name="category_id">
                        <option value="-1"></option>
                        <?php foreach($categories as $key => $val ): ?>
                            <option value="<?=$val['id']?>"><?=$val['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <input class="btn btn-primary" type="submit" value="submit" />
                </div>

            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Table Product</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tbl-product" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $key =>  $value ) : ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$value['name']?></td>
                                <td><?=$value['slug']?></td>
                                <td><?=$value['des']?></td>
                                <td><?=$value['price']?></td>
                                <td><?=$value['qty']?></td>
                                <td><?=$value['category']?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
<?php include('layout/footer.php') ?>
