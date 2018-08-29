<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package spielstation
 */

?><!DOCTYPE html>
<html lang="de_DE">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
      

	<?php wp_head(); ?>
</head>
<style>
  /**
   * cookiebar - It is a pure JS code, that warns the visitors in the notification bar, the page saves cookies. This is Compliant with the new EU cookie law.
   * Date 2017-08-08T12:26:15Z
   *
   * @author Tamás András Horváth <htomy92@gmail.com> (http://icetee.hu)
   * @version v0.9.7
   * @link https://github.com/icetee/cookiebar#readme
   * @license MIT
   */

/*  .cookiebar{background-color:#2c3e50;bottom:0;box-sizing:initial;color:#fff;min-height:50px;left:0;position:fixed;width:100%}.cookiebar-wrapper{height:100%;overflow:hidden;padding:14px;width:85%}.cookiebar-desciption{display:inline;font-size:1em}.cookiebar-link{display:inline;padding-left:5px}.cookiebar-link a{color:#3498db;text-decoration:none}.cookiebar-link a:hover{text-decoration:underline}.cookiebar-btn{background:#e74c3c none repeat scroll 0 0;border:0 none;color:#fff;cursor:pointer;font-size:.875em;height:28px;padding:0 10px 2px;position:absolute;right:20px;text-transform:uppercase;margin:auto;top:0;bottom:0}.cookiebar-btn:hover{background:#d34c37 none repeat scroll 0 0}*/
  .cookiebar-wrapper {
    background: grey;
    color: white;
    display: inline-flex;
    padding: 10px 30px;
    width: 100%;
  }
  .cookiebar-desciption {
    padding: 0 30px;
    width: 100%;
  }
  .cookiebar-btn {
    background-color: grey;
    vertical-align: middle;
  }
  .cookiebar-button {
    margin: auto !important;
  }
  @media screen and (max-width: 769px) {
    .cookiebar-wrapper {
      padding: 0 0px;
      font-size: 1.7vh;
      top: -1px;
      position: relative;
    }
    .cookiebar-desciption {
      padding: 0 0 0 20px;
    }
    .cookiebar-button {
      margin: auto !important;
      padding: 0 10px 0 10px;

    }

  }
</style>

<body <?php body_class(); ?>>
<div id="page" class="site">



	<header id="masthead" class="site-header" role="banner">

		<?php

		if ( is_page_template( 'template-home.php' ) ) {
    	get_template_part( 'components/header/header-home' );
		}
		else {
			get_template_part( 'components/header/header' );
		}

		?>


		<?php // get_template_part( 'components/header/site', 'branding' ); ?>

		<?php //spielstation_the_site_logo(); ?>

		<?php //get_template_part( 'components/navigation/navigation', 'top' ); ?>

		<?php // spielstation_social_menu(); ?>

	</header>
      <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript">
    /**
     * cookiebar - It is a pure JS code, that warns the visitors in the notification bar, the page saves cookies. This is Compliant with the new EU cookie law.
     * Date 2017-08-08T12:26:15Z
     *
     * @author Tamás András Horváth <htomy92@gmail.com> (http://icetee.hu)
     * @version v0.9.7
     * @link https://github.com/icetee/cookiebar#readme
     * @license MIT
     */

    var Cookiebar=function(t){function e(n){if(!(this instanceof e))return new e(n);var a=n.charAt(0);"#"===a?this.el=t.getElementById(n.substr(1)):"."===a?this.el=t.getElementsByClassName(n.substr(1)):this.el=t.getElementsByTagName(n)}e.prototype.fade=function(t,e,n){function a(){o=i?o+c:o-c,d.el.style.opacity=o,o<=0&&(d.el.style.display="none"),(o<=0||o>=1)&&window.clearInterval(h)}var i="in"===t,o=i?0:1,s=50,r=e,c=s/r,l=n?n:"inline",d=this;i&&(d.el.style.display=l,d.el.style.opacity=o);var h=window.setInterval(a,s)};var n=function(){};n.prototype.extend=function(t){for(var e=1;e<arguments.length;++e){var n=arguments[e];if("object"==typeof n)for(var a in n)n.hasOwnProperty(a)&&(t[a]="object"==typeof n[a]?this.extend({},t[a],n[a]):n[a])}return t},n.prototype.trigger=function(e,n){var a=t.createEvent("Event");a.initEvent(n,!0,!0),e.dispatchEvent(a)},n.prototype.addEvent=function(t,e,n){return t[window.attachEvent?"attachEvent":"addEventListener"]((window.attachEvent?"on":"")+e,n,!0)},n.prototype.removeEvent=function(t,e,n){t.detachEvent?t.detachEvent("on"+e,n):t.removeEventListener(e,n)},n.prototype.parseTemplate=function(t,e){return t.replace(/\$\{(\w+)\}/gi,function(t,n){return void 0!==e[n]?e[n]:t})};var a=new n,i=function(e){var n=this;this.opt=a.extend({id:"cookiebar",cls:"cookiebar",cookie:"cookiebar",content:{description:"Verwendung von Cookies : Um unsere Webseite für Sie optimal zu gestalten und fortlaufend verbessern zu können, verwenden wir Cookies. Durch die weitere Nutzung der Webseite stimmen Sie der Verwendung von Cookies zu. <br/>Weitere Informationen zu Cookies erhalten Sie in unserer <a href='/datenschutzerklarung/' style='text-decoration: underline'>Datenschutzerklärung</a>",link:"",href:"",button:"X",more:"Aum unsere Webseite für Sie optimal zu gestalten und fortlaufend verbessern zu können, verwenden wir Cookies. Durch die weitere Nutzung der Webseite stimmen Sie der Verwendung von Cookies zu.Weitere Informationen zu Cookies erhalten Sie in unserer Datenschutzerklärung."},fade:{type:"in",ms:"500",display:"inline"},debug:0,exits:!0},e||{}),this.bar=null,this.data=this.opt,this.bodyMargBotBackup=t.body.style.marginBottom||"",this.accepted=!1,this.events={btnClick:function(t){t&&t.preventDefault?t.preventDefault():"object"==typeof t&&(t.returnValue=!1),n.accept()},winResize:function(){n.accepted||(t.body.style.marginBottom=n.bar.offsetHeight+"px")}},this.init()};return i.prototype.init=function(){var t=this;t.data.debug?t.setCookie("debug_cookibar","test",365,function(){t.withdraw()}):t.checkCookie()},i.prototype.getCookie=function(e){for(var n=e+"=",a=t.cookie.split(";"),i=0;i<a.length;i++){for(var o=a[i];" "==o.charAt(0);)o=o.substring(1);if(0===o.indexOf(n))return o.substring(n.length,o.length)}return""},i.prototype.setCookie=function(e,n,a,i){var o=new Date;o.setDate(o.getDate()+a);var s=escape(n)+(null===a?"":"; expires="+o.toUTCString()+"; path=/;");t.cookie=e+"="+s,"function"==typeof i&&i.call(this)},i.prototype.delCookie=function(e){t.cookie=e+"=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/"},i.prototype.html=function(){var t='<div class="${cls}-wrapper"><div class="${cls}-desciption">${des}</div><div class="${cls}-link"><a href="${href}">${link}</a></div><div class="${cls}-button"><button type="button" name="${cls}-button" class="${cls}-btn">${btn}</button></div><div class="${cls}-more" style="display: none;">${more}</div></div>';return a.parseTemplate(t,{cls:this.data.cls,href:this.data.content.href,link:this.data.content.link,more:this.data.content.more,btn:this.data.content.button,des:this.data.content.description})},i.prototype.withdraw=function(){this.delCookie(this.data.id),this.accepted=!1,this.checkCookie()},i.prototype.accept=function(){this.accepted=!0,this.setCookie(this.data.cookie,!0,365),a.removeEvent(window,"resize",this.events.winResize),this.bar&&(this.bar.style.display="none"),t.body.style.marginBottom!==this.bodyMargBotBackup&&(t.body.style.marginBottom=this.bodyMargBotBackup)},i.prototype.draw=function(){var n,i=this;i.accepted||(i.bar||(i.bar=t.createElement("div"),i.bar.id=i.data.id,i.bar.className=i.data.cls,i.bar.innerHTML=i.html(),t.body.insertBefore(i.bar,t.body.firstChild),n=i.bar.getElementsByClassName(i.data.cls+"-btn")[0],a.addEvent(n,"click",i.events.btnClick)),a.addEvent(window,"resize",i.events.winResize),a.trigger(window,"resize"),e("#"+i.data.id).fade(i.data.fade.type,i.data.fade.ms),i.setCookie(i.data.cookie,null,365))},i.prototype.checkCookie=function(){this.accepted="true"===this.getCookie(this.data.cookie),this.accepted||this.draw()},i.prototype.getStatus=function(){return this.accepted},i}(document);
  </script>
  <script>
    $( document ).ready(function() {
        var cookiebar = new Cookiebar({
            id: "cookiebar",
            cls: "cookiebar",
            cookie: "cookiebar"
        });
    });
  </script>
  <div class="modal fade" id="cookies_erase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Widerspruch</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Sie können sich hier entscheiden, ob in Ihrem Browser ein eindeutiger Webanalyse-Cookie abgelegt werden darf, um dem Betreiber der Website die Erfassung und Analyse verschiedener statistischer Daten zu ermöglichen.
          <br>
          Wenn Sie sich dagegen entscheiden möchten, klicken Sie den folgenden Link, um den Matomo-Deaktivierungs-Cookie in Ihrem Browser abzulegen.
          <br> <br>
          <input type="checkbox" class="getcookieagain">
           Ihr Besuch dieser Website wird aktuell von der Matomo Webanalyse erfasst. Klicken Sie hier, damit Ihr Besuch nicht mehr erfasst wird.
        </div>

      </div>
    </div>
  </div>
  <script>
    // COOKIES
    //
    function setCookie(nom, valeur, expire, chemin, domaine, securite){
      document.cookie = nom + ' = ' + escape(valeur) + '  ' +
                ((expire == undefined) ? '' : ('; expires = ' + expire.toGMTString())) +
                ((chemin == undefined) ? '' : ('; path = ' + chemin)) +
                ((domaine == undefined) ? '' : ('; domain = ' + domaine)) +
                ((securite == true) ? '; secure' : '');
    }

    function getCookie(name){
      if(document.cookie.length == 0)
        return null;

      var regSepCookie = new RegExp('(; )', 'g');
      var cookies = document.cookie.split(regSepCookie);

      for(var i = 0; i < cookies.length; i++){
        var regInfo = new RegExp('=', 'g');
        var infos = cookies[i].split(regInfo);
        if(infos[0] == name){
          return unescape(infos[1]);
        }
      }
      return null;
    }

    var dtExpire = new Date();
    dtExpire.setTime(dtExpire.getTime() + 3600);

    // setCookie('myCookie', 'développement web', dtExpire, '/' );
    // document.write('myCookie vaut : ' + getCookie('myCookie'));
    // affiche "myCookie vaut : développement web"

    var dtExpireDel = new Date();
    dtExpireDel.setTime(dtExpireDel.getTime() - 1);
    var myfonc = function() {

      setCookie('cookiebar', '', dtExpireDel, '/');

    }
    $('.getcookieagain').click(function() {

      // Get the checkbox
        var checkBox = $('.getcookieagain');
        setCookie('cookiebar', '', dtExpireDel, '/');
        // Get the output text

        // If the checkbox is checked, display the output text
        if ($('.getcookieagain').prop('checked') == true){

          setCookie('cookiebar', '', dtExpireDel, '/');
        } else {

          setCookie('cookiebar', 'true', dtExpire, '/');
        }
    })


  </script>

	<div id="content" class="site-content">
