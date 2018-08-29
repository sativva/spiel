// Global JS

$(document).ready(function() {

            // Browser msie
            // if ($.browser.msie && $.browser.version === 10) {
            //   $("html").addClass("ie10");
            // }

            $(".js-ApplyBox").on("click", function() {
                var thisId = $(this).parents(".FinderResult-post").data("id");
                $(".MapRoute-form[data-id='" + thisId + "']").slideToggle();
            });

            // Show Form input
            $(".js-showSearchInput").click(function() {
                $(".SearchForm-Header input").css("display", "block");
            });

            // Slider
            $('.js-Slider').unslider({
                animation: 'fade',
                autoplay: true,
                delay: 12000,
                speed: 400,
                infinite: true
            });



            // CSS CUSTOM SELECT
            if ($('.basic').length > 0) {
                $('.basic').fancySelect();
            };

            // Launch mobile NAV
            $(".js-MobileNav").click(function() {
                console.log('click');
                $(".Header-nav").slideToggle();
            });


            // WRAP H2 AND P IN TEMPLATE ARTICLE
            $(".Article-content h2").each(function() {
                $(this).nextUntil('h2').andSelf().wrapAll('<div id="' + Math.random() + '"class="Article-content--wrapper"></div>');
            });

            // GET H1 IN TEMPLATE ARTICLE
            if ($('.Article').length > 0) {
                var article = document.getElementById("js-article");
                var articleH2 = article.getElementsByTagName("h2");
                var i;

                // console.log(articleH2);
                for (i = 0; i < articleH2.length; i++) {
                    articleH2[i].id = Math.random();
                    $(".ProgressBar-wrapper").append('<div class="ProgressBar-link"><a href="#' + articleH2[i].parentElement.id + '">' + articleH2[i].innerHTML + '</a><span></span></div>');
                }
            };
            // if (window.location.href.indexOf("/jobs/") > -1) {
            //     $("body").children().each(function() {
            //         $(this).html($(this).html().replace(/zagzagzag/g, "ö"));
            //         $(this).html($(this).html().replace(/zugzugzug/g, "ü"));
            //         $(this).html($(this).html().replace(/ZUGZUGZUG/g, "Ü"));
            //         $(this).html($(this).html().replace(/S7S7S7/g, "ß"));
            //         $(this).html($(this).html().replace(/zogzogzog/g, "ä"));
            //         $(this).html($(this).html().replace(/euroeuro/g, "€"));
            //         $(this).html($(this).html().replace(/zzz/g, "▪"));
            //     });
            // }
            //


            // $('.cty').css('background', 'red');

            if ($(window).width() > 768) {
              setTimeout(function() {
                $('.city').each(function(i, u) {
                    // if (($('.city:eq(0)').parents('.FinderResult-post.row').attr("data-id") !== $(this).parents('.FinderResult-post.row').attr("data-id")) && ($('.city:eq(-1)').parents('.FinderResult-post.row').attr("data-id") !== $(this).parents('.FinderResult-post.row').attr("data-id"))) {
                    a = $('.city')[i + 1].innerHTML.trim();
                    o = this.innerHTML.trim();
                    j = $('.job')[i + 1].innerHTML.trim();
                    jj = $('.job')[i].innerHTML.trim();


                    if (a == o && j == jj) {
                        $('.city').parent().eq(i + 1).css('height', '20px');
                        $('.city').parent().eq(i + 1).css('padding', '0px');
                        $('.city').eq(i + 1).css('opacity', '0');
                        $('.light').eq(i + 1).css('position', 'relative');
                        // $('.city').eq(i + 1).next().css('background', 'lightgray')
                        $('.city').eq(i + 1).next().css('left', '-4px')

                        // $('.light').eq(i + 1).css()
                        $('.city').eq(i + 1).css('height', '23px');
                        $('.job').eq(i + 1).css('opacity', '0');
                        $('.city').parent().next().eq(i).hide()
                    }
                    // }
                });
              }, 1000);

            };
            // hide city + hr
            if ($(window).width() > 768) {

              //SORT BY DISTANCE
              jQuery.fn.sortDivs = function sortDivs() {
                  $("> div", this[0]).sort(dec_sort).appendTo(this[0]);
                  function dec_sort(a, b){ return ($(b).data("sort")) < ($(a).data("sort")) ? 1 : -1; }
              }
              // $('.Container--small .row').sortDivs();

              //SORT BY JOB NAME
              jQuery.fn.sortJobs = function sortJobs(classN) {
                  $("> div." + classN,this[0]).sort(dec_sort).appendTo(this[0]);
                  function dec_sort(a, b){ return ($(b).find('.job').text()) < ($(a).find('.job').text()) ? 1 : -1; }
              }

              var classes = {};
              $(".Container--small .FinderResult-post").each(function() {
                  var temp = $(this).attr("class").split(' ');
                  if (temp[2]) {
                      classes[temp[2]] = true;

                  }
              });
              setTimeout(function() {
                for (singleClass in classes) {
                  // if (singleClass == "Lüdenscheid") {
                  //   console.log('lulu');
                  //   $('.row.Lüdenscheid').parent().sortJobs('Lüdenscheid');
                  // } else if (singleClass == "Remscheid") {
                  //   console.log('Rem');
                  //   $('.row.Remscheid').parent().sortJobs('Remscheid');
                  // } else {
                    $(".row." + singleClass).parent().sortJobs(singleClass);
                  // }
                }
              }, 10);


              $('.city').map(function (i, u) {
                if ($('.city').eq(i).hasClass('region') && i > 0) {
                  if ($('.city')[i-1].innerHTML.trim() == $('.city')[i + 1].innerHTML.trim()) {
                    $('.city').eq(i+2).parents('.FinderResult-post').html($('.city').eq(i).parents(".FinderResult-post").html());
                    $('.city').eq(i).parents('.FinderResult-post').html("");
                    $('.city').eq(i).parents('.FinderResult-post').css('padding-top', '5px');
                  }
                }
              });

              $('.FinderResult-post').each(function(i, u) {
                  if ($(this).find('.region').length === 1) {
                      if (($('.city:eq(0)').parents('.FinderResult-post.row').attr("data-id") !== $(this).attr("data-id")) && ($('.city:eq(-1)').parents('.FinderResult-post.row').attr("data-id") !== $(this).attr("data-id"))) {
                          $r = $(this).find('.region')
                          $p = $(this).nextAll('.FinderResult-post.row').find('.city').html().trim();
                          $a = $('.FinderResult-post:eq(' + (i - 1) + ')').find('.city').html().trim();
                          if ($a === $p) {
                              if ($('.FinderResult-post:eq(' + (i - 1) + ')')) {
                                  $z = $('.FinderResult-post:eq(' + (i - 1) + ')').find('.city').html().trim();
                                  if ($z !== $a) {
                                      $('.FinderResult-post:eq(' + i + ')').insertAfter($('.FinderResult-post:eq(' + (i - 1) + ')'));
                                  } else if ($('.FinderResult-post:eq(' + (i - 2) + ')')) {
                                      $b = $('.FinderResult-post:eq(' + (i - 2) + ')').find('.city').html().trim();
                                      if ($b !== $a) {
                                          $('.FinderResult-post:eq(' + i + ')').insertAfter($('.FinderResult-post:eq(' + (i - 2) + ')'));
                                      } else if ($('.FinderResult-post:eq(' + (i - 3) + ')')) {
                                          $c = $('.FinderResult-post:eq(' + (i - 3) + ')').find('.city').html().trim();
                                          if ($c !== $a) {
                                              $('.FinderResult-post:eq(' + i + ')').insertAfter($('.FinderResult-post:eq(' + (i - 3) + ')'));

                                          } else if ($('.FinderResult-post:eq(' + (i - 4) + ')')) {
                                              $d = $('.FinderResult-post:eq(' + (i - 4) + ')').find('.city').html().trim();
                                              if ($d !== $a) {
                                                  $('.FinderResult-post:eq(' + i + ')').insertAfter($('.FinderResult-post:eq(' + (i - 4) + ')'));
                                              } else if ($('.FinderResult-post:eq(' + (i - 5) + ')')) {
                                                  $e = $('.FinderResult-post:eq(' + (i - 5) + ')').find('.city').html().trim();
                                                  if ($e !== $a) {
                                                      $('.FinderResult-post:eq(' + i + ')').insertAfter($('.FinderResult-post:eq(' + (i - 5) + ')'));
                                                  } else if ($('.FinderResult-post:eq(' + (i - 6) + ')')) {
                                                      $f = $('.FinderResult-post:eq(' + (i - 6) + ')').find('.city').html().trim();
                                                      if ($f !== $a) {
                                                          $('.FinderResult-post:eq(' + i + ')').insertAfter($('.FinderResult-post:eq(' + (i - 6) + ')'));
                                                      }
                                                  }
                                              }
                                          }
                                      }
                                  }
                              }
                          }
                      }
                  }
              });

              $('.FinderResult-post').each(function(i, u) {

                  $r = $(this).find('.job').html().trim() //auszubilden
                  $p = $(this).nextAll('.FinderResult-post.row').find('.job').html().trim();
                  $b = $(this).nextAll('.FinderResult-post.row').nextAll('.FinderResult-post.row').find('.job').html().trim();
                  $a = $('.FinderResult-post:eq(' + (i) + ')').find('.job').html().trim();
                  $q = $(this).find('.city').html().trim();
                  $s = $(this).nextAll('.FinderResult-post.row').find('.city').html().trim();
                  $t = $('.FinderResult-post:eq(' + (i - 1) + ')').find('.city').html().trim();
                  $u = $('.FinderResult-post:eq(' + (i - 2) + ')').find('.city').html().trim();
                  $v = $('.FinderResult-post:eq(' + (i - 3) + ')').find('.city').html().trim();
                  $x = $('.FinderResult-post:eq(' + (i - 4) + ')').find('.city').html().trim();
                  $y = $('.FinderResult-post:eq(' + (i - 5) + ')').find('.city').html().trim();
                  $z = $('.FinderResult-post:eq(' + (i - 6) + ')').find('.city').html().trim();

                  if ($t === $s && $p === $a && ($p!==$r || $b != $r)) {
                    console.log("a" + $a + "r" + $r + "p" + $p + "b" + $b);



                    if ($t === $z) {
                      $('.FinderResult-post:eq(' + i + ')').insertAfter($('.FinderResult-post:eq(' + (i - 7) + ')'));
                    } else if ($t === $y ) {
                      $('.FinderResult-post:eq(' + i + ')').insertAfter($('.FinderResult-post:eq(' + (i - 6) + ')'));
                    }else if ($t === $x ) {
                      $('.FinderResult-post:eq(' + i + ')').insertAfter($('.FinderResult-post:eq(' + (i - 5) + ')'));
                    }else if ($t === $v ) {
                      $('.FinderResult-post:eq(' + i + ')').insertAfter($('.FinderResult-post:eq(' + (i - 4) + ')'));
                    }else if ($t === $u ) {
                      $('.FinderResult-post:eq(' + i + ')').insertAfter($('.FinderResult-post:eq(' + (i - 3) + ')'));
                    }else if ($t === $s ) {
                      $('.FinderResult-post:eq(' + i + ')').insertAfter($('.FinderResult-post:eq(' + (i - 2) + ')'));
                    }


                  }

              });
            };




            jQuery(window).resize(function() {

                if ($(window).width() > 1200) {
                    $(".Header-nav").css("display", "block");
                } else {
                    $(".Header-nav").css("display", "none");
                }



            });

});

