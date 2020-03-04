<?php 
    $list = $this->data['list'];
?>
<?php include('layout/header.php') ?>
<div class="container-fluid">
    <h1 class="mt-4">Categories</h1>

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAddCategory">
        Add Category 
    </a>
    <div class="card mb-4 collapse" id="collapseAddCategory">
        <div class="card-header"><i class="fas fa-table mr-1"></i>New Category</div>
        <div class="card-body">
            <form action="<?=base_url('admin/category-add')?>" method="post">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Name</label>
                    <input class="form-control py-4" type="text" placeholder="Name" />
                </div>

                <?php if( $list ) :?>
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Category parent</label>
                    <input class="form-control py-4" type="text" placeholder="Name" />
                </div>
                <?php endif;?>
                
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <input class="btn btn-primary" type="submit" value="submit" />
                </div>

            </form>
        </div>
    </div>
    
</div>
<?php include('layout/footer.php') ?>
