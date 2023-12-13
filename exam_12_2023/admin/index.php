<?php
include "header.php";
include "sidebar.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>View list products</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><strong>Table</strong></h3>
      <br>
      <a class="btn btn-success btn-sm" href="product-add.php">
        <i class="fas fa-plus"></i> Add New Product
      </a>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>

    <div class="card-body p-0">
      <table class="table table-striped projects">
        <thead>
          <tr>
            <th style="width: 10%" class="text-center">
              Image
            </th>
            <th style="width: 20%" class="text-center">
              Name
            </th>
            <th style="width: 20%" class="text-center">
              Price
            </th>
            <th style="width: 20%" class="text-center">
              Category
            </th>
            <th style="width: 40%" class="text-center">
              Decription
            </th>
            <th style="width: 20%" class="text-center">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $getAllProduct = $product->getAllProductsAdmin();
          foreach ($getAllProduct as $value) :
          ?>
            <tr>
              <td>
                <img style="width: 100px;" src="../public/img/<?php echo $value['image'] ?>" alt="">
              </td>
              <td style="text-align: center;"><?php echo $value['name'] ?></td>
              <td style="text-align: center;"><?php echo number_format($value['price']) ?> VNĐ</td>
              <td style="text-align: center;"><?php echo $value['category_name'] ?></td>
              <td><?php echo substr($value['description'], 0, 50) ?>...</td>
              <td style="text-align: center;"><strong></strong></td>
              <td class="project-actions text-right">
                <form action="" method="POST">
                  <a class="btn btn-info btn-sm" href="product-edit.php?id=<?php echo $value['id'] ?>" style="width: 91px; height: 55px;">
                    <img src="" alt="" style="width: 30px; height: 30px;">
                    <br>
                    Edit
                  </a>
                  <a class="btn btn-info btn-danger" href="action/product-del.php?id=<?php echo $value['id'] ?>" style="width: 91px; height: 55px;">
                    <img src="" alt="" style="width: 30px; height: 30px;">
                    <br>
                    Delete
                  </a>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  <!-- /.card -->
  <!-- /.content -->
</div>

<?php
include "footer.php";
?>