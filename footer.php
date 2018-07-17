</div>
<!-- End of white div -->
			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<p>
					&copy; <?php echo date('Y'); ?>  <?php bloginfo('name'); ?> | Website by <a href="//webfactor.ch" title="Webfactor">Webfactor</a>
				</p>
				<?php if(is_user_logged_in()) : ?>
							<a class="logout" href="<?php echo wp_logout_url( site_url('/')  ); ?>">Déconnexion</a>
				<?php else: ?>
							<a class="login" href="<?php echo  site_url('/login'); ?>">Connexion Membres</a>
						</div>
				<?php endif; ?>
				<div class="clear"></div>
			</footer>
			<!-- /footer -->




		<?php $tdu  =  get_template_directory_uri() ; ?>
		<!-- <script type="text/javascript" src="<?php echo $tdu; ?>/bower_components/jquery/dist/jquery.min.js"></script> -->
		<script type='text/javascript' src='<?php echo get_site_url(); ?>/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
		<script type="text/javascript" src="<?php echo $tdu; ?>/bower_components/underscore/underscore-min.js"></script>
		<script type="text/javascript" src="<?php echo $tdu; ?>/bower_components/bxslider-4/dist/jquery.bxslider.min.js"></script>
		<script type="text/javascript" src="<?php echo $tdu; ?>/bower_components/matchHeight/dist/jquery.matchHeight-min.js"></script>
		<script type="text/javascript" src="<?php echo $tdu; ?>/bower_components/moment/min/moment.min.js"></script>
		<script type="text/javascript" src="<?php echo $tdu; ?>/bower_components/clndr/src/clndr.js "></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/min/featherlight.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/min/featherlight.gallery.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/min/jquery.justifiedGallery.min.js"></script>
		<script type="text/javascript" src="<?php echo $tdu; ?>/js/scripts.js?v=<?php echo wf_version(); ?>"></script>
		<!-- <script type="text/javascript" src="<?php echo $tdu; ?>/js/scripts.js"></script> -->

		<?php wp_footer(); ?>
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114588276-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-114588276-1');
		</script>


	</body>
</html>
