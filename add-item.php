
<div class="item-addmenu">
    <div class="item-addmenu-button">
        <button type="button" data-toggle="modal" data-target="#exampleModal"><img src="images/add-icon.jpg" alt=""></button>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        






      <div class="add-item-box">
    <div class="add-element">
        <form method="POST" action="">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group position-relative">
                        <div class="element-icon">
                            <i class="icofont-phone"></i>
                        </div>
                        <input name="sellerPhone" id="sellerPhone" type="text" class="form-control" placeholder="Enter the seller phone number">
                        <span id="errorFound" class="errorMessage"></span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group position-relative">
                        <div class="element-icon">
                            <i class="icofont-user"></i>
                        </div>
                        <select name="sellerType" id="sellerType" class="form-control">
                            <option value="null">Type</option>
                            <option value="farmer">Farmer</option>
                            <option value="mediator">Mediator</option>
                            <option value="buyer">Buyer</option>
                        </select>
                        <span id="userNotFound" class="errorMessage"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group position-relative">
                        <div class="element-icon">
                            <i class="icofont-tree-alt"></i>
                        </div>
                        <input name="product" id="product" type="text" class="form-control" placeholder="Product name">
                        <span id="userproduct" class="errorMessage"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group position-relative">
                        <div class="element-icon">
                            <i class="icofont-muscle-weight"></i>
                        </div>
                        <input type="text" name="weight" id="weight" class="form-control" placeholder="Product weight">
                        <span id="userweight" class="errorMessage"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group position-relative">
                        <div class="element-icon">
                            <i class="icofont-money-bag"></i>
                        </div>
                        <input type="text" name="price" id="price" class="form-control" placeholder="Per unit price">
                        <span id="userprice" class="errorMessage"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group position-relative">
                        <div class="element-icon">
                            <i class="icofont-price"></i>
                        </div>
                        <input type="text" name="vat" id="vat" class="form-control" placeholder="% vat">
                        <span id="pvat" class="errorMessage"></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group position-relative">
                        <div class="element-icon">
                            <i class="icofont-plus"></i>
                        </div>
                        <input type="text" name="additionalFees" id="additionalFees"  class="form-control" placeholder="Additional charge">
                        <span id="addfee" class="errorMessage"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="add-button btn btn-primary form-control" style=" border-radius: 0;"><a href="add-new-seller.php" style="color:#fff;">Add Another Seller</a></div>
                </div>
                <div class="col-md-6">
                    <button id="saveItem" type="submit" class="add-button btn btn-default form-control" style="background: rgb(0, 140, 66); color:#fff; border-radius: 0;">Add now</button >
                </div>
            </div>


        </form>
    </div>
</div>















      </div>
      <div class="modal-footer">
   <!--      <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span class="notify" id="notify" style="color: green"></span>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>









