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
        $('#dataTables-order').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '".SITE_URL."/users/all',
                columnDefs: [{ orderable: false, targets: [4,5] }],
                order: [[ 3, 'desc' ]]
        });
        $('#dataTables-order_wrapper').on('click','.delete-user',function(){
            elem = $(this);
            var user_id = elem.attr('data-id');
            var data = {
                'action': 'delete_user',
                'user_id': user_id
            };
            if(confirm('Are you sure. Once done action can not be reverted back.')){
                $.ajax({
                    type:'POST',
                    url:'".TB_AJAX_URL."',
                    crossDomain:true,
                    data:data,
                    dataType:'jsonp',
                    success:function(result) {
                        if(result == true){
                            location.href = '".SITE_URL."/users/delete/'+user_id+'?st=1';
                        }else{
                            location.href = '".SITE_URL."/users/delete/'+user_id+'?st=0';
                        }
                    }
                });
            }

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
                                    Customers
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <?php echo $this->Flash->render(); ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="dataTables-order" cellspacing="0"
                                           width="100%">
                                        <thead>
                                        <tr>
                                            <th class="va-m">ID</th>
                                            <th class="va-m">Name</th>
                                            <th class="va-m">Email</th>
                                            <th class="va-m">Created</th>
                                            <th class="va-m">Source</th>
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
