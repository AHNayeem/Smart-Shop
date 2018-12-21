<?php 
$query = $connection->prepare('SELECT * FROM `categories`');
$query->execute();
$data = $query->fetchAll();
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Category Table</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="html5buttons">
                        <div class="dt-buttons btn-group">
                            <!-- <a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>Copy</span></a> -->
                            <a class="btn btn-default buttons-csv buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>CSV</span></a>
                            <a class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>Excel</span></a>
                            <a class="btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>PDF</span></a>
                            <a class="btn btn-default buttons-print" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>Print</span></a>
                        </div>
                    </div>
                    <div class="dataTables_length" id="DataTables_Table_0_length">
                        <label>Show 
                        <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control input-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        </select> entries &nbsp; &nbsp;
                    </label>
                    </div>
                    <div id="DataTables_Table_0_filter" class="dataTables_filter pull-right">
                        <label>Search:
                            <input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_0">
                        </label>
                    </div>
                    <!-- <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                        Showing 1 to 25 of 57 entries
                    </div> -->
                    <table class="table table-hover dataTable table-stripped default" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid" >
                        <thead>
                            <tr>
                                <th>Category Id</th>
                                <th>Category Name</th>
                                <th>Category Description(s)</th>
                                <th>Category Photo</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $value) { ?>
                                <?php 
                                $category_id = $value['category_id']; 
                                $category_name = $value['category_name']; 
                                $category_desc = $value['category_desc']; 
                                $status = $value['status']; 
                                ?>
                             <tr class="gradeX">
                                <td><?php echo $category_id ?></td>   
                                <td><?php echo $category_name ?></td>   
                                <td><?php echo substr($category_desc,0,50) ?></td>
                                <td><img style="width: 100px" src="../uploads/category/<?php echo $value['category_photo']; ?>" alt=""></td>
                                 <?php 
                                    echo ($status == '0')?"<td>
                                    <a href='changecatstatus.php?cat_id=".$category_id."-".$status."' class='btn btn-xs btn-warning'>active</a>
                                    </td>":"<td>
                                    <a href='changecatstatus.php?cat_id=".$category_id."-".$status."' class='btn btn-xs btn-primary'>inactive</a>
                                    </td>";
                                 ?>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="" class="btn-primary btn btn-xs">View</a>
                                        <a href="index.php?page=edit_category&id=<?php echo $category_id;?>" class="btn-warning btn btn-xs" data-toggle="modal" data-target="">Edit</a>
                                        <a href="delete_category.php?id=<?php echo $category_id;?>" class="btn-danger btn btn-xs" data-toggle="modal" data-target="">Delete</a>
                                        <!-- <button href="" class="btn-danger btn btn-xs demo4">Delete</button> -->
                                    </div>
                                </td>
                            </tr>
                                <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="">
                                    <ul class="pagination pull-right">
                                        <li class=" disabled"><a data-page="first" href="#first">«</a></li>
                                        <li class=" disabled"><a data-page="prev" href="#prev">‹</a></li>
                                        <li class=" active"><a data-page="0" href="#">1</a></li>
                                        <li class=""><a data-page="1" href="#">2</a></li>
                                        <li class=""><a data-page="next" href="#next">›</a></li>
                                        <li class=""><a data-page="last" href="#last">»</a></li>
                                    </ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
