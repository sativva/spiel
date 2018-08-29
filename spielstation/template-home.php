<?php
/**
 * The template for displaying home page.
 *
 *
 * @package spiestation
 */
/*
Template Name: Home
*/
get_header(); ?>


    <!--  NEWS - STICKY -->


          <?php
            $sticky = get_option('sticky_posts');

            if ($sticky) {
              $args = array(
                'post__in' => $sticky,
                'posts_per_page'=>'1'
                );
              query_posts( $args );

              while(have_posts()) : the_post();
                get_template_part( 'components/article/article', 'home' );
              endwhile; // End of the loop.

            }
          ?>





    <!--  JOB SEARCH -->
    <section class="JobSearch col-xs-12">
        <div class="Container--small">
            <div class="JobSearch-img col-xs-12 col-sm-6"></div>
            <div class="JobSearch-content col-xs-12 col-sm-6">
              <div class="JobSearch-title">Jobangebote</div>
              <div class="JobSearch-title-border"></div>
              <div class="JobSearch-description">Sie suchen einen Arbeits- oder Ausbildungsplatz, in dem Sie gefordert, aber auch gefördert werden? Dann bewerben Sie sich bei uns!</div>

              <div>
                <a class="btn btn--purple btn--big" href="<?php echo get_page_link(896); ?>">Aktuelle Jobangebote</a>
              </div>
            </div>
        </div>
    </section>


    <!--  VIRTUAL VISIT -->
    <section class="VirtualVisit col-xs-12 hidden-xs hidden-sm">
        <div class="Container--small">
          <div class="row">
          <div class="VirtualVisit-content">
            <a href="<?php echo get_page_link(932); ?>">
              <div class="VirtualVisit-title">360° Begehung</div>
              <div class="VirtualVisit-description">Virtuelle Begehungen ermöglichen einen Einblick in verschiedene SPIELSTATIONEN und zeigen wie es bei uns aussieht.</div>
              <img src="<?php echo get_template_directory_uri();?>/assets/img/home/picto-360.svg" alt="">
            </a>
          </div>
          </div>
        </div>
    </section>


    <!--  HOME GUARANTEE -->
    <section class="HomeGuarantee col-xs-12">
      <div class="container">
        <div class="row">
          <div class="HomeGuarantee-content col-xs-12 col-sm-4">
            <a href="<?php echo get_page_link(936); ?>">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/home/icon-verbraucherschutz.svg" alt=""/>
            </a>
            <div class="HomeGuarantee-title">
              <a href="<?php echo get_page_link(936); ?>">SPIELERSCHUTZ & PRÄVENTION</a>
            </div>
            <div class="HomeGuarantee-border HomeGuarantee-border--orange"></div>
            <div class="HomeGuarantee-description">
              <a href="<?php echo get_page_link(936); ?>">
                <p>Die meisten Spielgäste verbinden mit unserem Spielangebot Spaß, Unterhaltung und Freizeitvergnügen. Aber es gibt auch Menschen, die mit dem Angebot Schwierigkeiten bekommen können und deren Umgang mit dem Spielen problematische oder sogar pathologische Züge annehmen kann.</p>
                <p>Wir sind uns dieser Tatsache bewusst und engagieren uns daher schon seit 2007 im Spielerschutz.</p>
              </a>
            </div>
          </div>

          <div class="HomeGuarantee-content col-xs-12 col-sm-4">
            <a href="<?php echo get_page_link(946); ?>">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/home/icon-zertifizierung.svg" alt=""/>
            </a>
            <div class="HomeGuarantee-title">
              <a href="<?php echo get_page_link(946); ?>">Zertifizierung</a>
            </div>
            <div class="HomeGuarantee-border HomeGuarantee-border--green"></div>
            <div class="HomeGuarantee-description">
              <a href="<?php echo get_page_link(946); ?>">
                <p>Gemeinsam mit dem TÜV Rheinland und dem TÜV InterCert Saar haben wir 2015 begonnen, unsere Spielstätten zum Nachweis eines hohen Qualitätsstandards freiwillig zertifizieren zu lassen. Hinzu kommen zukünftig auch Zertifizierungen durch die Prüfstelle ClarCert.</p>
                <p>Die erfolgreichen Zertifizierungen zeigen unseren Spielgästen, dass sie ihrer Freizeitbeschäftigung in einem qualitativen, sicheren und legalen Umfeld nachgehen.</p>
              </a>
            </div>
          </div>

          <div class="HomeGuarantee-content col-xs-12 col-sm-4">
            <a href="<?php echo get_page_link(53); ?>">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/home/icon-rahmenbedingungen.svg" alt=""/>
            </a>
            <div class="HomeGuarantee-title">
              <a href="<?php echo get_page_link(53); ?>">RECHTSRAHMEN</a>
            </div>
            <div class="HomeGuarantee-border HomeGuarantee-border--red"></div>
            <div class="HomeGuarantee-description">
              <a href="<?php echo get_page_link(53); ?>">
                <p>Für den legalen Betrieb von Spielhallen in der Bundesrepublik Deutschland sind unterschiedliche Genehmigungen und Erlaubnisse einzuholen. Erst nach deren Vorlage darf die Einrichtung und der Betrieb der Spielhalle aufgenommen werden. Für den laufenden Betrieb gelten darüber hinaus gewerberechtliche Vorschriften der Gewerbeordnung, der Spielverordnung, des Glücksspielstaatsvertrages sowie der einzelnen Landesgesetze zum Glückspielstaatsvertrag.</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php
get_footer();
?>
