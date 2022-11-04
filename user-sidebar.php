
 
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
    
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <div class="dashboard">
<div class="admin-menu-wrapper">
                        <div class="admin-menu">
                            <div class="admin-logo">
                                <img src="images/logo.png" alt="">
                            </div>
                            <div class="admin-menu-area">
                                <div class="user-info">
                                    <div class="profile-avater">
                                        <img src="images/user.png" alt="">
                                    </div>
                                    <div class="user-name">
                                        <h5 style="color: #ffffff; text-align-center;"><?php 
                                        echo $farmerObject->fname." ";
                                        echo $farmerObject->lname;
                                        
                                        ?></h5>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="deshboard.php"><i class="icofont-dashboard"></i> Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="sold-items.php"><i class="icofont-food-cart"></i> Sold Products</a>
                                    </li>
                                    <li>
                                        <a href="bought-product.php"><i class="icofont-cart-alt"></i> Bought Products</a>
                                    </li>
                                    <li>
                                        <a href="analytics.php"><i class="icofont-chart-line-alt"></i> Analytics</a>
                                    </li>
                                    <li>
                                        <a href="buyer-list.php"><i class="icofont-business-man-alt-2"></i> Buyers</a>
                                    </li>
                                    <li>
                                        <a href="seller.php"> <i class="icofont-funky-man"></i> Seller</a>
                                    </li>
                                    <li>
                                        <a href="reminder.php"><i class="icofont-ui-note"></i> Set Reminder</a>
                                    </li>
                                    <li>
                                        <a href="settings.php"><i class="icofont-ui-settings"></i> Settings</a>
                                    </li>
                                    <li>
                                        <a href="logout.php"><i class="icofont-logout"></i> Logout</a>
                                    </li>
                                    <li>
                                        
                                        <!-- <div id="google_translate_element"></div> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
