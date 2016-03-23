<?php
    $this->Html->css(SITE_URL.'/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css', array('block' => 'styles'));
    $this->Html->css(SITE_URL.'/bower_components/datatables-responsive/css/dataTables.responsive.css', array('block' => 'styles'));
    $this->Html->script(SITE_URL.'/bower_components/datatables/media/js/jquery.dataTables.min.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js', array('block' => 'scripts'));
    $this->Html->scriptBlock("
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '".SITE_URL."/orders/all'
        });
    });
    ", array('block' => 'scripts'));
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Orders</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Orders Listings
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Event</th>
                                        <th>Venue</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->

