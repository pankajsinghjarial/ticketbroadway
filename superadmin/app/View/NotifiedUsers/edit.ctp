<?php
    $this->Html->css(SITE_URL.'/allcp/forms/css/forms.css', array('block' => 'styles'));
    $this->Html->script(SITE_URL.'/js/demo/widgets_sidebar.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/js/pages/forms-layouts.js', array('block' => 'scripts'));

?>
<!-- -------------- Column Center -------------- -->
<div class="chute chute-center">
    <div class="">

        <div class="tab-content mw900 center-block center-children">

            <!-- -------------- Registration -------------- -->
            <div class="allcp-form theme-primary" id="register">
                <div class="panel">
                    <?php echo $this->Flash->render(); ?>
                    <div class="panel-heading">
                        <span class="panel-title">
                          Notified User : ID (<?php echo $user['NotifiedUser']['id'];?>)
                        </span>
                    </div>
                    <!-- -------------- /Panel Heading -------------- -->
                    <?php echo $this->Form->create('NotifiedUser'); ?>
                        <div class="panel-body pn">
                            <h6 class="mb20" id="spy1">User Details</h6>
                            <div class="section row">
                                <div class="col-md-6 ph10 mb5">
                                    <label for="first_name" class="field prepend-icon">
                                        <input type="text" name="first_name" id="first_name" value="<?php echo (isset($user['NotifiedUser']['first_name']))?trim($user['NotifiedUser']['first_name']):'';?>"
                                               class="gui-input"
                                               placeholder="First Name">
                                        <label for="first_name" class="field-icon">
                                            <i class="fa fa-list"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->

                                <div class="col-md-6 ph10 mb5">
                                    <label for="last_name" class="field prepend-icon">
                                        <input type="text" name="last_name" id="last_name" class="gui-input" value="<?php echo (isset($user['NotifiedUser']['last_name']))?trim($user['NotifiedUser']['last_name']):'';?>"
                                               placeholder="Last Name">
                                        <label for="last_name" class="field-icon">
                                            <i class="fa fa-list"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->
                            </div>
                            <!-- -------------- /section -------------- -->
                            <div class="section row">
                                <div class="col-md-6 ph10 mb5">
                                    <label for="email" class="field prepend-icon">
                                        <input type="text" name="email" id="email" class="gui-input" value="<?php echo (isset($user['NotifiedUser']['email']))?trim($user['NotifiedUser']['email']):'';?>"
                                               placeholder="Email">
                                        <label for="email" class="field-icon">
                                            <i class="fa fa-list"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->
                            </div>
                            <!-- -------------- /section -------------- -->
                            <div class="section">
                                <div class="pull-right">
                                    <a href="<?php echo SITE_URL;?>/notifiedUsers" class="btn">&lt;&lt;Back to list</a>
                                    <button type="submit" class="btn btn-bordered btn-primary">Submit</button>
                                </div>
                            </div>
                            <!-- -------------- /section -------------- -->
                        </div>
                        <!-- -------------- /Form -------------- -->
                        <div class="panel-footer"></div>
                    <?php echo $this->Form->end(); ?>
                </div>
                <!-- -------------- /Panel -------------- -->
            </div>
            <!-- -------------- /Registration -------------- -->

        </div>

    </div>
</div>
<!-- -------------- /Column Center -------------- -->
