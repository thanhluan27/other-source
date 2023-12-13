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
          <h1>Cate</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Table</h3>
        <br>
        <a class="btn btn-success btn-sm" href="category-add.php">
          <i class="fas fa-plus"></i> Add New Category
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
              <th style="width: 40%; text-align: center;">
                Category id
              </th>
              <th style="width: 40%; text-align: center;">
                Category name
              </th>
              <th style="width: 20%" class="text-center">
                Action
              </th>
              <th style="width: 20%">
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllCategory = $cate->getAllCategory();
            foreach ($getAllCategory as $value) :
            ?>
              <tr>
                <td style="text-align: center;"><?php echo $value['category_id'] ?></td>
                <td style="text-align: center;"><?php echo $value['category_name'] ?></td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="category-edit.php?category_id=<?php echo $value['category_id'] ?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="action/category-del.php?category_id=<?php echo $value['category_id'] ?>">
                    <i class="fas fa-trash">
                    </i>
                    Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>


<?php
include "footer.php";
?>