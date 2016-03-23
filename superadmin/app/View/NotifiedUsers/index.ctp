<?php
    $this->Html->script(SITE_URL.'/js/pages/forms-layouts.js', array('block' => 'scripts'));
    $this->Html->css(SITE_URL.'/js/plugins/datatables/media/css/dataTables.bootstrap.css', array('block' => 'styles'));
    $this->Html->css(SITE_URL.'/js/plugins/datatables/extensions/Editor/css/dataTables.editor.css', array('block' => 'styles'));
    $this->Html->css(SITE_URL.'/js/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css', array('block' => 'styles'));
    $this->Html->script(SITE_URL.'/js/plugins/datatables/media/js/jquery.dataTables.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/js/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/js/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/js/plugins/datatables/media/js/dataTables.bootstrap.js', array('block' => 'scripts'));
    $this->Html->scriptBlock("
    $(document).ready(function() {
        $('#dataTables-user').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '".SITE_URL."/notifiedUsers/all',
                order: [[ 0, 'desc' ]]
        });
    });
    ", array('block' => 'scripts'));
?>
            <!-- -------------- Column Center -------------- -->
            <div class="chute chute-center">

                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-visible" id="spy6">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    Get Notified Users
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <?php echo $this->Flash->render(); ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="dataTables-user" cellspacing="0"
                                           width="100%">
                                        <thead>
                                        <tr>
                                            <th class="va-m">ID</th>
                                            <th class="va-m">First Name</th>
                                            <th class="va-m">Last Name</th>
                                            <th class="va-m">Email</th>
                                            <th class="va-m">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- -------------- /Column Center -------------- -->
