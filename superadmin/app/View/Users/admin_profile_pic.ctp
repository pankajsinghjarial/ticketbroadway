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
                    <a class="btn btn-danger btn-gradient btn-alt btn-block br-n" href="<?php echo SITE_URL;?>/users/admin_profile"> Edit Details </a>
                </li>

                <li>
                    <a class="btn btn-info btn-gradient btn-alt btn-block br-n" href="<?php echo SITE_URL;?>/users/change_admin_password"> Change Password </a>
                </li>

                <li>
                    <a class="btn btn-info btn-gradient btn-alt btn-block br-n item-active" href="javascript:void(0);"> Change Profile Pic </a>
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
                          Admin Picture
                        </span>
                    </div>
                    <!-- -------------- /Panel Heading -------------- -->

                    <?php echo $this->Form->create('User', array('type' => 'file')); ?>
                        <div class="panel-body pn">
                            <p class="small-text text-muted mb20">Please upload jpg image</p>
                            <div class="section">
                                <label class="field prepend-icon append-button file">
                                    <span class="button btn-primary">Choose File</span>
                                    <input type="file" class="gui-file" name="data[User][file1]" id="file1" onchange="document.getElementById('uploader1').value = this.value;">
                                    <input type="text" class="gui-input" id="uploader1" placeholder="Select File">
                                    <label class="field-icon">
                                        <i class="fa fa-cloud-upload"></i>
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
