<section class="ArticleBanner ArticleBanner--photoFull">
	
	<div class="Slider js-Slider">
		<?php $attachments = new Attachments( 'aui_instance_1343' ); ?>
		<?php if( $attachments->exist() ) : ?>
		    <ul>
		        <?php while( $attachments->get() ) : ?>
		            <li><img src="<?php echo $attachments->src( 'full' ); ?>" alt="" /></li>
		        <?php endwhile; ?>
		    </ul>
		<?php endif; ?>
	</div>

  <div class="container">
    <div class="row">
      <div class="ArticleBanner-title col-xs-12"><?php the_title() ;?></div>
    </div>
  </div>
</section>
