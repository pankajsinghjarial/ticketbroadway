<?php
    $this->Html->css(SITE_URL.'/allcp/forms/css/forms.css', array('block' => 'styles'));
    $this->Html->script(SITE_URL.'/js/demo/widgets_sidebar.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/js/pages/forms-layouts.js', array('block' => 'scripts'));

?>
<!-- -------------- Column Left -------------- -->
<aside class="chute chute-left chute290 bg-primary" data-chute-height="match">

    <div class="chute-bin1 stretch1 btn-dimmer mt20">

        <div class="pn br-n bg-none allcp-form-list">

            <ul class="nav list-unstyled">

                <li class="nav-label">Settings</li>

                <li>
                    <a class="btn btn-danger btn-gradient btn-alt btn-block br-n item-active" href="javascript:void(0)"> Edit Details </a>
                </li>

                <li>
                    <a class="btn btn-info btn-gradient btn-alt btn-block br-n" href="<?php echo SITE_URL;?>/users/change_admin_password"> Change Password </a>
                </li>
                
                <li>
                    <a class="btn btn-info btn-gradient btn-alt btn-block br-n" href="<?php echo SITE_URL;?>/users/admin_profile_pic"> Change Profile Pic </a>
                </li>
            </ul>

        </div>

    </div>


</aside>
<!-- -------------- /Column Left -------------- -->

<!-- -------------- Column Center -------------- -->
<div class="chute chute-center">
    <div class="">

        <div class="tab-content mw900 center-block center-children">

            <!-- -------------- Registration -------------- -->
            <div class="allcp-form theme-primary" id="register" role="tabpanel">
                <div class="panel">
                    <?php echo $this->Flash->render(); ?>
                    <div class="panel-heading">
                        <span class="panel-title">
                          Admin Details
                        </span>
                    </div>
                    <!-- -------------- /Panel Heading -------------- -->

                    <?php echo $this->Form->create('User'); ?>
                        <div class="panel-body pn">

                            <div class="section">
                                <label for="username" class="field prepend-icon">
                                    <input type="text" name="username" id="username" class="gui-input"
                                           placeholder="Username" value="<?php echo (isset($admin['User']['username']))?$admin['User']['username']:'';?>">
                                    <label for="username" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                </label>
                            </div>
                            <!-- -------------- /section -------------- -->

                            <div class="section">
                                <label for="email" class="field prepend-icon">
                                    <input type="email" name="email" id="email" class="gui-input"
                                           placeholder="Email address" value="<?php echo (isset($admin['User']['email']))?$admin['User']['email']:'';?>">
                                    <label for="email" class="field-icon">
                                        <i class="fa fa-envelope"></i>
                                    </label>
                                </label>
                            </div>
                            <!-- -------------- /section -------------- -->

                            <div class="section">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-bordered btn-primary">Update</div>
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
