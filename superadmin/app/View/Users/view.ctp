            <div class="panel invoice-panel">
                <div class="panel-heading">
                    <span class="panel-title">Order Id : <?php echo $order['Order']['id'];?></span>
                </div>
                <div class="panel-body p20" id="invoice-item">

                    <div class="row mb30">
                        <div class="col-md-4">
                            <div class="pull-left">
                                <h5 class="mn"> Created: Nov 01 2015 </h5>
                                <h5 class="mn"> Status:
                                    <b class="text-success">Paid</b>
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <div class="pull-right text-right">
                                <h2 class="invoice-logo-text hidden lh10">ThemeREX</h2>
                                <h6> Customer:
                                    <b class="text-primary"><?php echo $order['Order']['full_name'];?></b>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="invoice-info">
                        <div class="col-md-4">
                            <div class="panel panel-alt">
                                <div class="panel-heading">
                                    <span class="panel-title"> Bill To: </span>

                                    <div class="panel-btns pull-right ml10">
                                        <span class="panel-title-sm"> <a href="<?php echo SITE_URL;?>/orders/edit/<?php echo $order['Order']['id'];?>">Edit</a></span>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="fw700"><?php echo $order['Order']['full_name'];?></div>
                                    <div>Phone: <?php echo $order['Order']['phone'];?></div>
                                    <div>Email: <?php echo $order['Order']['email'];?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-alt">
                                <div class="panel-heading">
                                    <span class="panel-title"> Ship To:</span>

                                    <div class="panel-btns pull-right ml10">
                                        <span class="panel-title-sm"> <a href="<?php echo SITE_URL;?>/orders/edit/<?php echo $order['Order']['id'];?>">Edit</a></span>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div><strong><?php echo $order['Order']['address1']." ".$order['Order']['address2'];?></strong></div>
                                    <div> <?php echo $order['Order']['city'].", ".$order['Order']['state'];?></div>
                                    <div> <?php echo $order['Order']['country']." ".$order['Order']['zip'];?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-alt">
                                <div class="panel-heading">
                                    <span class="panel-title"> Event Details: </span>

                                    <div class="panel-btns pull-right ml10"></div>
                                </div>
                                <div class="panel-body">
                                    <div><b>Event Name:</b> <?php echo $order['Order']['event_name'];?></div>
                                    <div><b>Timing:</b> <?php echo $order['Order']['event_time'];?></div>
                                    <div><b>Venue:</b> <?php echo $order['Order']['venue'];?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="invoice-table">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="hidden-xs">N</th>
                                    <th>Event</th>
                                    <th class="hidden-xs">Ticket Row</th>
                                    <th style="width: 135px;">Quantity</th>
                                    <th class="text-right pr10">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="hidden-xs">
                                        <b>1</b>
                                    </td>
                                    <td><?php echo $order['Order']['event_name'];?></td>
                                    <td class="hidden-xs"><?php echo $order['Order']['ticket_row'];?></td>
                                    <td><?php echo $order['Order']['quantity'];?></td>
                                    <td class="text-right pr10"><?php echo $order['Order']['total'];?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row" id="invoice-footer">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <table class="table" id="basic-invoice-result">
                                    <thead>
                                    <tr>
                                        <th>
                                            <b>Total:</b>
                                        </th>
                                        <th><?php echo $order['Order']['total'];?></th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
            </div>
