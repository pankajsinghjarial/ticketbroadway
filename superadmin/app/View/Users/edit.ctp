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
                          Edit User : ID (<?php echo $user['WpUsers']['ID'];?>)
                        </span>
                    </div>
                    <!-- -------------- /Panel Heading -------------- -->
                    <?php echo $this->Form->create('User'); ?>
                    
                        <div class="panel-body pn">
                            <div class="section row">
                                <div class="col-md-6 ph10 mb5">
                                    <label for="name" class="field prepend-icon">
                                        <input type="text" name="name" id="name" value="<?php echo (isset($user['WpUsers']['display_name']))?$user['WpUsers']['display_name']:'';?>"
                                               class="gui-input"
                                               placeholder="Name">
                                        <label for="name" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->

                                <div class="col-md-6 ph10 mb5">
                                    <label for="email" class="field prepend-icon">
                                        <input type="email" name="email" id="email" class="gui-input" value="<?php echo (isset($user['WpUsers']['user_email']))?$user['WpUsers']['user_email']:'';?>"
                                               placeholder="Email address">
                                        <label for="email" class="field-icon">
                                            <i class="fa fa-envelope"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->
                            </div>
                            <div class="section row">
                                <div class="col-md-6 ph10 mb5">
                                    <label for="address1" class="field prepend-icon">
                                        <input type="text" name="address1" id="address1" value="<?php echo (isset($user['WpUsers']['billing_address_1']))?$user['WpUsers']['billing_address_1']:'';?>"
                                               class="gui-input"
                                               placeholder="Address Line 1">
                                        <label for="address1" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->

                                <div class="col-md-6 ph10 mb5">
                                    <label for="address2" class="field prepend-icon">
                                        <input type="text" name="address2" id="address2" class="gui-input" value="<?php echo (isset($user['WpUsers']['billing_address_2']))?$user['WpUsers']['billing_address_2']:'';?>"
                                               placeholder="Address Line 2">
                                        <label for="address2" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->
                            </div>
                            <!-- -------------- /section -------------- -->
                            <div class="section row">
                                <div class="col-md-6 ph10 mb5">
                                    <label for="city" class="field prepend-icon">
                                        <input type="text" name="city" id="city" class="gui-input" value="<?php echo (isset($user['WpUsers']['billing_city']))?$user['WpUsers']['billing_city']:'';?>"
                                               placeholder="City">
                                        <label for="city" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="col-md-6 ph10 mb5">
                                    <label for="state" class="field prepend-icon">
                                        <input type="text" name="state" id="state" value="<?php echo (isset($user['WpUsers']['billing_state']))?$user['WpUsers']['billing_state']:'';?>"
                                               class="gui-input"
                                               placeholder="State">
                                        <label for="firstname" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->
                            </div>
                            <!-- -------------- /section -------------- -->
                            <div class="section row">
                                <div class="col-md-12 ph10 mb5">
                                    <label class="field select">
                                        <select id="country" name="country">
                                            <option value="">Select country</option>
                                            <?php foreach(unserialize(COUNTRIES_LIST) as $country){ ?>
                                                <option <?php echo (isset($user['WpUsers']['billing_country']))?(($user['WpUsers']['billing_country'] == $country)?'selected="selected"':''):'';?>value="<?php echo $country;?>"><?php echo $country;?></option>
                                            <?php } ?>
                                        </select>
                                        <i class="arrow"></i>
                                    </label>
                                </div>
                            </div>
                            <!-- -------------- /section -------------- -->
                            <div class="section row">
                                <div class="col-md-6 ph10 mb5">
                                    <label for="postcode" class="field prepend-icon">
                                        <input type="text" name="postcode" id="postcode" class="gui-input" value="<?php echo (isset($user['WpUsers']['billing_postcode']))?$user['WpUsers']['billing_postcode']:'';?>"
                                               placeholder="Postal Code">
                                        <label for="postcode" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="col-md-6 ph10 mb5">
                                    <label for="phone" class="field prepend-icon">
                                        <input type="text" name="phone" id="phone" value="<?php echo (isset($user['WpUsers']['billing_phone']))?$user['WpUsers']['billing_phone']:'';?>"
                                               class="gui-input"
                                               placeholder="State">
                                        <label for="phone" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->
                            </div>
                            <!-- -------------- /section -------------- -->
                            <div class="section">
                                <div class="pull-right">
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
