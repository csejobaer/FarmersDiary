<div class="col-md-6 col-sm-13">
                            <h4><?php 
                                        echo $farmerObject->fname." ";
                                        echo $farmerObject->lname;
                                        
                                        ?>
                            </h4>
                            
                            <i>From-<?php if($_SESSION['type'] == 'farmers'){echo "Farmer";}else if($_SESSION['type'] == 'mediator'){echo "Mediator";}?></i>
                            <p>Phone: 0<?php echo $farmerObject->phone; ?></p>
                            <p><?php echo $farmerObject->address." "; ?><?php echo $farmerObject->thana; ?></p>
                            <p><?php echo $farmerObject->district.", "; ?><?php echo $farmerObject->country; ?></p>

                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <h4>Farmers Diary</h4>
                            <i>Recusive Solutions</i>
                            <p>Email: help@example.com</p>
                            <p>Mirpur-2</p>
                            <p>Dhaka, Bangladesh</p>
                        </div>