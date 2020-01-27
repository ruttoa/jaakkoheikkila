    <footer class="footer" role="contentinfo">
    	<div class="container container--wide">
    		<div class="footer__text" data-aos="fade-right">
    			<div class="row">
    				<h4 class="footer-title">Jaakko Heikkilä</h4>
    			</div>
    			<div class="row">
    				<div class="col widget">
    					<h5 class="widget-title">Phone</h5>
    					<p>+358 123 4567</p>
    				</div>
    				<div class="col widget">
    					<h5 class="widget-title">Mail</h5>
    					<p><a href="mailto:contact@jaakkoheikkila.com">contact@jaakkoheikkila.com</a></p>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col widget">
    					<h5 class="widget-title">Follow</h5>
    					<ul class="some-menu">
    						<li><a href="https://instagram.com">Instagram</a></li>
    						<li><a href="https://facebook.com">Facebook</a></li>
    					</ul>
    				</div>
    				<div class="col widget">
    					<h5 class="widget-title">Address</h5>
    					<p>Studioblue Kukkola, Finland</p>
    				</div>
    			</div>
    			<div class="row last-row">
    				<div class="col">
    					<p class="copytext">
    						PHOTOS <br>
    						(REQUIRES ALL MATERIAL): <br>
    						<span>Copyright</span> &copy; <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?>.</a>
    					</p>
    				</div>
    				<div class="col">
    					<p><?php echo get_the_privacy_policy_link(); ?></p>
    				</div>
    			</div>
    		</div>
    		<div class="footer__image" data-aos="fade-left">
    		</div>
    	</div>
    </footer>
    </div> <?php // end wrapper 
			?>

    <?php wp_footer(); ?>

    </body>

    </html>