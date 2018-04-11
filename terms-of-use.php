<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
?>          
        <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>Terms and Conditions</h2>
                </header>
            </div>
        </section>
        
        <div class="container">
            <section id="t-and-c" class="well">
                <div class="well">
                    <h1>Introduction</h1>
                    <p>Welcome to JoyaStores website (www.joyastores.com). These terms and conditions apply to the Site, and all of its divisions, subsidiaries, and affiliate operated Internet sites which reference these Terms and Conditions. The website is operated by Joya Stores.<br><br>

By accessing the Site, you confirm your understanding of the Terms and Conditions. If you do not agree to these Terms and Conditions of use, you shall not use this website. The Site reserves the right, to change, modify, add, or remove portions of these Terms and Conditions of use at any time. Changes will be effective when posted on the Site with no other notice provided. Your continued use of the Site following the posting of changes to these Terms and Conditions of use constitutes your acceptance of those changes.</p><br>
                    
                    <h1>Terms of use</h1>
                    <p>Use of the website is available only to persons who can form legally binding contracts under applicable law. Persons who are "incompetent to contract" as per local Contract Acts are not eligible to use the website.<br><br>

If you are a minor (i.e. under the age of 18 years), you may use this website only under the supervision of a parent or legal guardian who agrees to be bound by these Terms of Use, Those who choose to access the website from outside of Egypt are responsible for compliance with local laws whenever applicable.<br><br>

Except where additional conditions are provided which are specific to products or services, these Terms and Conditions supersede all previous representations, understandings or agreements.<br><br>
                        
Certain services and related features that may be made available on the Site may require registration or subscription. Should you choose to register or subscribe for any such services or related features, you agree to provide accurate and current information about yourself, and to promptly update such information if there are any changes. Every user of the Site is solely responsible for keeping passwords and other account identifiers safe and secure. The account owner is entirely responsible for all activities that occur under such password or account. Furthermore, you must notify us of any unauthorized use of your password or account. The Site shall not be responsible or liable, directly or indirectly, in any way for any loss or damage of any kind incurred as a result of, or in connection with, your failure to comply with this section.<br><br>

By using the website, you agree to be bound by the Terms and Conditions.</p><br>
                    
                    <h1>Website security</h1>
                    
                    <p>You are prohibited from violating or attempting to violate the security of the website, Violations of system or network security may result in civil or criminal liability.</p><br>
                    
                    <h1>Privacy Policy</h1>
                    <p>We view protection of your privacy as a very important community principle. We understand clearly that you and Your Information is one of our most important assets</p>
                    <p>We do not sell or rent Your Information to any third parties without your explicit consent.</p><br><br>
                    
                    <h1>Create account</h1>
                    <p>Registration includes the information (Your Information) that you need to provide us to deal with us and also to contact you. You agree that we may use (and update) Your Information to manage your Registration and to control your identity during the online checkout process.</p>
                    <p>The details provided by you during Registration will be protected in accordance with our privacy policy. Your Information will form part of a record of your dealings with us. If you use the website, you are responsible for maintaining the confidentiality of your account and password and for restricting access to your computer, and you agree to accept responsibility for all activities that occur under your account or password.</p>
                    <p>The website assumes no liability to any person for any loss or damage which may arise as a result of any failure by you in protecting your password or account. Any suspicious activities on your account shall be notified by contacting us immediately through any means <a href="contact.html">(contact us)</a>.</p><br><br>
                    
                    <h1>Shopping cart</h1>
                    <p>We reserve the right, at our sole discretion, to limit the quantity of items selected per person, per household or per order on ‘shopping cart’. Your shopping cart capacity is limited to two (2) pieces per item.</p>
                    <p>The said limitations may be applicable to orders placed by the same account, and  to orders that use the same billing and/or shipping address. We will provide notification to the customer should such limits be applied</p><br><br>
                    
                    <p><strong><a href="www.joyastores.com">joya stores</a></strong> may at any time modify the Terms and Conditions of the Website without any prior notification to you. You can access the latest version of the Terms and Conditions at any given time on our website. In the event the modified Terms and Conditions are not acceptable to you, you should discontinue using the service. However, if you continue to use the service you shall be deemed to have agreed to accept and abide by the modified Terms &amp; Conditions of Use of this site.</p>
                </div>
            </section><!-- /#Product-Panel/.Well -->
                    <!--include pug-partial/checkout-side.pug-->
        
            <section id="features">
            <div class="row text-center">
                <div class="col-xs-4 custom-padd-right">
                <div class="feat-item"><i class="fa fa-truck fa-md"> </i>
                    <h4>Delivery within 5-7 days</h4>
                </div>
                </div>
                <div class="col-xs-4 custom-padd-right custom-padd-left">
                <div class="feat-item"><i class="fa fa-money fa-md"> </i>
                    <h4>Cash on delivery</h4>
                </div>
                </div>
                <div class="col-xs-4 custom-padd-left">
                <div class="feat-item"><i class="fa fa-retweet fa-md"> </i>
                    <h4>Free return within 7 days</h4>
                </div>
                </div>
            </div>
            </section>
        </div><!-- /.Container -->
        
<?php
    include $tpl . 'footer.php'; 
    ob_end_flush(); 
?>      