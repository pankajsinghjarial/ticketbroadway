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
                          Edit Order : ID (<?php echo $order['Order']['id'];?>)
                        </span>
                    </div>
                    <!-- -------------- /Panel Heading -------------- -->
                    <?php echo $this->Form->create('Order'); ?>
                        <div class="panel-body pn">
                            <h6 class="mb20" id="spy1">Event Ticket Details</h6>
                            <div class="section row">
                                <div class="col-md-6 ph10 mb5">
                                    <label for="event_name" class="field prepend-icon">
                                        <input type="text" name="event_name" id="event_name" value="<?php echo (isset($order['Order']['event_name']))?trim($order['Order']['event_name']):'';?>"
                                               class="gui-input"
                                               placeholder="Event Name">
                                        <label for="event_name" class="field-icon">
                                            <i class="fa fa-list"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->

                                <div class="col-md-6 ph10 mb5">
                                    <label for="event_time" class="field prepend-icon">
                                        <input type="text" name="event_time" id="event_time" class="gui-input" value="<?php echo (isset($order['Order']['event_time']))?trim($order['Order']['event_time']):'';?>"
                                               placeholder="Event Timing">
                                        <label for="event_time" class="field-icon">
                                            <i class="fa fa-list"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->
                            </div>
                            <!-- -------------- /section -------------- -->
                            <div class="section row">
                                <div class="col-md-6 ph10 mb5">
                                    <label for="venue" class="field prepend-icon">
                                        <input type="text" name="venue" id="venue" class="gui-input" value="<?php echo (isset($order['Order']['venue']))?trim($order['Order']['venue']):'';?>"
                                               placeholder="Venue">
                                        <label for="venue" class="field-icon">
                                            <i class="fa fa-list"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="col-md-6 ph10 mb5">
                                    <label for="quantity" class="field prepend-icon">
                                        <input type="text" name="quantity" id="quantity" value="<?php echo (isset($order['Order']['quantity']))?$order['Order']['quantity']:'';?>"
                                               class="gui-input"
                                               placeholder="Quantity Ordered">
                                        <label for="quantity" class="field-icon">
                                            <i class="fa fa-list"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->
                            </div>
                            <!-- -------------- /section -------------- -->
                            <div class="section row">
                                <div class="col-md-6 ph10 mb5">
                                    <label for="ticket_row" class="field prepend-icon">
                                        <input type="text" name="ticket_row" id="ticket_row" class="gui-input" value="<?php echo (isset($order['Order']['ticket_row']))?trim(preg_replace('/\s+/', ' ',$order['Order']['ticket_row'])):'';?>"
                                               placeholder="Ticket Row">
                                        <label for="ticket_row" class="field-icon">
                                            <i class="fa fa-list"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="col-md-6 ph10 mb5">
                                    <label for="total" class="field prepend-icon">
                                        <input type="text" name="total" id="total" value="<?php echo (isset($order['Order']['total']))?$order['Order']['total']:'';?>"
                                               class="gui-input"
                                               placeholder="Total">
                                        <label for="total" class="field-icon">
                                            <i class="fa fa-list"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->
                            </div>
                            <h6 class="mb20" id="spy1">Customer Details</h6>
                            <div class="section row">
                                <div class="col-md-6 ph10 mb5">
                                    <label for="full_name" class="field prepend-icon">
                                        <input type="text" name="full_name" id="full_name" value="<?php echo (isset($order['Order']['full_name']))?$order['Order']['full_name']:'';?>"
                                               class="gui-input"
                                               placeholder="Name">
                                        <label for="full_name" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->

                                <div class="col-md-6 ph10 mb5">
                                    <label for="email" class="field prepend-icon">
                                        <input type="email" name="email" id="email" class="gui-input" value="<?php echo (isset($order['Order']['email']))?$order['Order']['email']:'';?>"
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
                                        <input type="text" name="address1" id="address1" value="<?php echo (isset($order['Order']['address1']))?$order['Order']['address1']:'';?>"
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
                                        <input type="text" name="address2" id="address2" class="gui-input" value="<?php echo (isset($order['Order']['address2']))?$order['Order']['address2']:'';?>"
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
                                        <input type="text" name="city" id="city" class="gui-input" value="<?php echo (isset($order['Order']['city']))?$order['Order']['city']:'';?>"
                                               placeholder="City">
                                        <label for="city" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="col-md-6 ph10 mb5">
                                    <label for="state" class="field prepend-icon">
                                        <input type="text" name="state" id="state" value="<?php echo (isset($order['Order']['state']))?$order['Order']['state']:'';?>"
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
                                                <option <?php echo (isset($order['Order']['country']))?(($order['Order']['country'] == $country)?'selected="selected"':''):'';?>value="<?php echo $country;?>"><?php echo $country;?></option>
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
                                        <input type="text" name="zip" id="zip" class="gui-input" value="<?php echo (isset($order['Order']['zip']))?$order['Order']['zip']:'';?>"
                                               placeholder="Postal Code">
                                        <label for="postcode" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="col-md-6 ph10 mb5">
                                    <label for="phone" class="field prepend-icon">
                                        <input type="text" name="phone" id="phone" value="<?php echo (isset($order['Order']['phone']))?$order['Order']['phone']:'';?>"
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
