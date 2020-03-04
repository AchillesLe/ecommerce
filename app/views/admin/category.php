<?php 
    $list = $this->data['list'];
?>
<?php include('layout/header.php') ?>
<div class="container-fluid" id="page-category">
    <h1 class="mt-4">Categories</h1>

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAddCategory">
        Add Category 
    </a>

    <div class="card mb-4 collapse" id="collapseAddCategory">
        <div class="card-header"><i class="fas fa-table mr-1"></i>New Category</div>
        <div class="card-body">
            <form action="<?=base_url('admin/add-category')?>" method="post">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Name</label>
                    <input class="form-control py-4" type="text" name="name" placeholder="Name" />
                </div>

                <?php if( $list ) :?>
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Category parent</label>
                    <select class="form-control" name="parent_id">
                        <option value="-1"></option>
                        <?php foreach($list as $key => $val ): ?>
                            <option value="<?=$val['id']?>"><?=$val['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endif;?>

                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <input class="btn btn-primary" type="submit" value="submit" />
                </div>

            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Table Category</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tbl-categories" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Parent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list as $key =>  $value ) : ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$value['name']?></td>
                                <td><?=$value['slug']?></td>
                                <td><?=$value['parent_name']?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
<?php include('layout/footer.php') ?>
