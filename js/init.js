if (!window.console) console = {log: function() {}};

$(function() {
	// IF slider initialize it
	
	var rootFolder = 'http://www.17feet.com/';
	var prevHash;
	//console.log('prevhash '+ prevHash);

	if(String(window.location.host) == '192.168.1.246'){
		rootFolder = 'http://192.168.1.246/17feet/';
	}
	
	if($('#slider .item').length > 1){
			
			//$('#slider').append('<p id="debug" style="position:absolute; top:100px; color:#FFF;z-index:1000;"></p>');
			
			//$('body').append($('<p id="console">test</p>'));
			
			var slider = new Lectric({animateDuration: 3000 , slideThreshold: 20, toss:true});
			
			slider.init('#slider');	
			var numSlides = $('#slider .item').length;
			var slideInterval = 5000;
			window.autoplay = true;
			// Add slide indicators
			
			var sliderNav = $("#slider-nav");
			
			function updateSelected (page){
				$("#slider-nav li").removeClass("selected").eq(page).addClass("selected");
			}
			
			function advance(){
				var currentSlide = slider.page();
				if(currentSlide +1 >= numSlides){
					slider.to(0);
				} else {
					slider.to(currentSlide+1);
				}
				if(window.autoplay){ setTimer() }
			}
			
			for(i=0; i < numSlides; i++){
				
				sliderNav.append( $('<li>').attr('index', i).click(function(){
					
					slider.to($(this).attr('index'));
					updateSelected(slider.page());
					window.autoplay = false;
					})
				);
			}
			
			
			//sliderNav.css({ backgroundColor: '#F00'});
			$('.second-tier').css({overflow: 'visible'});
			
			function setTimer(){

				var page = slider.page();
				updateSelected(page);
				//console.log('timer'+ window.autoplay);
				window.setTimeout(function(){
					if(window.autoplay){ advance(); /* alert('repeating autoplay trigger') */ }
				}, slideInterval);

			}

			setTimer();
			
			document.getElementById("slider").addEventListener("touchstart", touchHandler, false);

			function touchHandler(e){
				//alert('touchhandler'); // works
				window.autoplay = false;
			}
			
			
			slider.subscribe('animationEnd', function(s, event) {
				var page = slider.page();
				updateSelected(page);
				//console.log('We just moved! Our current position is:' + s.position.x);
			});
			
			$('.banner').click(function(event){
				event.preventDefault();
				window.location = $(this).attr('project');			
			})
			
		}
	
// FOOTER

	$.each($('#footer .pad'), function(){
		$(this).append( $('<div class="loader"></div>'));
	});
	
// TWITTER
	
    $.jsonp({
      url: "http://api.twitter.com/1/users/show.json?callback=?",
	  "data":{
	  		 "screen_name" : "17feet"
	  },
      success: function(data) {
        console.log(data.status);
		$('#tweet-txt').html(replaceURLWithHTMLLinks(data.status.text));
		$('#tweet-time').html(H(data.status.created_at));
		
		console.log(data.status.created_at);
		showWidget($('#footer .twitter'));
      },
      error: function(d,msg) {
          console.log("twitter API failed");
      }
    });

	$('.bird').hover( function(){
		$this = $(this);

		$this.addClass('animating');
		$this.bind('webkitAnimationEnd', function() { 
		   $(this).removeClass('animating');
			
		});
		
	})

	// Weather API
	
	var rainyCodes = [5,6,7,8,9,10,11,12,13,14,40,42];
	var foggyCodes = [19,20,21,22];
	var stormyCodes = [0,1,2,3,4,15,16,17,18,35,37,38,39,41,43,42,45,46,47];
	var sunnyCodes = [31,32,33,34,36];
	var cloudyCodes = [26,27,28];
	var partlycloudyCodes = [23,24,25,29,30];

	$.YQL = function(query, callback) {
	    var encodedQuery = encodeURIComponent(query.toLowerCase()),
	        url = 'http://query.yahooapis.com/v1/public/yql?q='
	            + encodedQuery + '&format=json&callback=?';
	    $.getJSON(url, callback);
	};
	
	$.YQL("select * from weather.forecast where location=94107",function(data){
        //console.log(data);
		var w = data.query.results.channel;
		var code = w.item.condition.code;
		var forecast = w.item.forecast[0]; // todays forecast
		
		var weatherType = 'unknown';
		
		switch(true)
		{
		case (sunnyCodes.inArray(code)):
			weatherType = 'Sunny';
			break;
		case (rainyCodes.inArray(code)):
			weatherType = 'Rainy';
			break;
		case (foggyCodes.inArray(code)):
			weatherType = 'Foggy';
			break;	
		case (stormyCodes.inArray(code)):
			weatherType = 'Stormy';
			break;		
		case (cloudyCodes.inArray(code)):
			weatherType = 'Cloudy';
			break;
		case (partlycloudyCodes.inArray(code)):
			weatherType = 'Partly Cloudy';
			break;
		default:
			console.log('its whatever'+ code);
			break;
		}		
		
		$('#temp').html(w.item.condition.temp + '&deg;').addClass(evalTemp(w.item.condition.temp));
		$('#hi-low').html('<span class="hi '+evalTemp(forecast.high)+'">'+forecast.high+'&deg;</span>/<span class="low '+evalTemp(forecast.low)+'">'+forecast.low+'&deg;</span>');
		$('#footer .weather').addClass(weatherType.toLowerCase())
			.find('#weather-condition').html(weatherType);
			
		showWidget($('#footer .weather'));
		
	});
	
	function evalTemp(temp){
		switch (true)
		{
		case (temp <= 50):
			return 'cold';
		break;
		case (temp > 50 && temp <= 60):
			return 'chilly';
		break;
		case (temp > 60 && temp <=73):
			return 'avg';
		break;
		case (temp > 73 && temp <= 85):
			return 'warm';
		break;
		case  (temp > 85):
			return 'hot';
		break;
		default:
			return '';
		break;
		}
	}
	
	// Last.fm API

	$.jsonp({
	url: "http://ws.audioscrobbler.com/2.0/?callback=?",
	"data":{
		"method" : "user.getrecenttracks",
		"user" : "seventeenfeet", //cannonm1
		"api_key": "39b3630c94426a4bd2ef1e3bd589a493", // test dab1788fbb3c431257f60c7889dacfb1 "",
		"format" :"json",
		"limit" : "1"
	},
      success: function(data) {
	
		var song = data.recenttracks.track;
		console.log(song);
		
		if(song.length > 1){
			// weird multiple objects returned use second one
			song = song[1];
		}
		
		var date = parseInt(song.date['uts'])*1000;
		var imgSrc = song.image[3]['#text'];
		
		if(imgSrc){
			$('#lastfm img').attr({
				'src': imgSrc
			});
		} else {
			$('#lastfm img').attr({
				'src': rootFolder+'/imgs/no-album.png'
			});
		}
		
		if(date){
			//console.log(H(date) + ' lastfm date '+ date);
			if(H(date)){
				$('#lastfm .via').append( $('<span></span').text(' played '+ H(date) ) );
			} else {
				console.log("can't parse date");
			}

		} else {
			console.log('no date?');
		}
		
		$('#lastfm .artist').append($('<span></span>').text(song.artist['#text']));
		$('#lastfm .song').append($('<span></span>').text(song.name));
		$('#lastfm .album').append($('<span></span>').text(song.album['#text']));
		
		$('#lastfm .song span, #lastfm .album span').each( function(index){
				var thisWidth = $(this).innerWidth();
				//console.log(thisWidth +' '+ $(this).parent().innerWidth());
				if(thisWidth + 20 > $(this).parent().innerWidth()){
					
					$(this).mouseenter(
						function(){
							
							if($(this).attr('animating') != 'yes'){
								$(this).attr('animating', 'yes');	
								
								var offset = '-'+((thisWidth - $(this).parent().innerWidth()) + 12) +'px';
								var time =  ((thisWidth - $(this).parent().innerWidth()) + 12) *40 ;
								
								$(this).animate( {left: offset }, time, 'linear')
									.delay(2000)
									.animate( { left: '2px' }, 2000, 'linear',
														function(){
														//console.log('done animating');
														$(this).removeAttr('animating')
													}
											);
							}
						}
					);
				}
			}			
		);
				
		showWidget($('#footer .music'));
	
      },
      error: function(d,msg) {
          console.log("lastfm API failed");
      }
    });

	// Latest RSS from blog
	$.jsonp({
	url:   rootFolder + "blog/?feed=json&jsonp=?",
      success: function(data) {
		//console.log(data);

		var postText = data[0].excerpt;
		postText = postText.slice(0,115);
		
		$('#footer .blog .post').append($('<h6>'+data[0].title+'</h6>'));
		$('#footer .blog .post').append($('<p>'+postText+'&hellip;</p>'));
		$('#footer .blog a').attr('href', data[0].permalink);
		
		showWidget($('#footer .blog'));
		
      },
      error: function(d,msg) {
          console.log("blog RSS failed");
      }
    });
	
	function showWidget(elem){
		elem.find('.content').fadeTo(400,1, function(){
			elem.find('.loader').fadeTo(200, 0, function(){ $(this).remove(); });
		});
	}
	
	// Form submission
	
	addPortfolioFormEvents();
	
	// If on project detail page
	if( $('.prev-project').length > 0 ){
	
		$(document).keyup(function (event) {
		    var direction = null;

		    // handle cursor keys
		    if (event.keyCode == 37) {
		      // go left
		      direction = 'prev';
				window.location = $('.prev-project a').attr('href');
		    } else if (event.keyCode == 39) {
		      // go right
		      direction = 'next';
				window.location = $('.next-project a').attr('href');
		    }
		});
	}
	
	function addPortfolioFormEvents() {
		$("#portfolio_form").submit(onPortfolioFormSubmit);
		$("#contact_form").submit(onContactFormSubmit);
		$("#respond").submit(onCommentFormSubmit);
		$('#job_form').submit(onJobFormSubmit);
		
		// Focusing and Bluring fields with placeholders
		
		$("input[type=text], textarea, input.type_text").focus(function() {

			if( $(this).hasClass("error") ){
				//console.log('error');
				$(this).val("").removeClass("error");
				if($(this).attr('title') == "http://"){ console.log('http://'); $(this).val('http://'); }
			} else if ( $(this).attr('title') == jQuery.trim($(this).val()) && $(this).attr('title') != "http://" ) {
				$(this).val("");
			}
		});
		$("input[type=text], textarea, input.type_text").blur(function() {
			if($(this).val()=="" || ( $(this).attr("title")=="http://" && $(this).val()==$(this).attr("title") ) ) {
				$(this).val($(this).attr("title"));
				//$(this).css("color", "#adadad");
			}
		});
	}

	function onPortfolioFormSubmit() {
		
		//console.log('hit');
		if (this.portfolioLink.value == this.portfolioLink.title || this.portfolioLink.value == "") return false;
		console.log('test portfolio submission');
		$("#send").val("Thanks!");
		$("#url").val("http://");
		
		$.post(rootFolder + "inc/sendURL.php", {
			portfolioLink: this.portfolioLink.value
		}, function(data){	
			console.log('sending portfolio submission');	
			onFormSuccess("portfolio_form", data);
		}, "json");
		console.log('test portfolio submission2');
		return false;
	}
	
	// Contact form page

	function onContactFormSubmit(event) {

		event.preventDefault();
		
		$('#contact_form').find("input[title!=Submit], textarea").each(function(){
			
			var title = $(this).attr('title');
			var val = jQuery.trim($(this).val());
			console.log(title);
			if( val == title ){
				
				$(this).addClass("error").val( title+ ' is required');
			}
		})
		
		$.ajax({
			url: rootFolder + "inc/sendContact.php", 
			type: "POST",
			data: { 
				contactName: this.contactName.value,
				contactEmail: this.contactEmail.value,
				contactMessage: this.contactMessage.value
			}, 
			success: function(data) {
				data = jQuery.parseJSON(data);	
				onFormSuccess("contact_form", data);
			}
		});
	}
	
	function onFormSuccess(formname, data) {
		//console.log(formname+':id  '+JSON.stringify(data) )
		//console.log(data);
		result = data.result;
		
		var errors;
		//console.log(result);
		
		if(result != 'success'){
			result = result.substring( 0, result.length-1); // remove last '%'
			errors = result.split('%');
			
			for(i=0; i < errors.length; i++){
				
				var str = errors[i];
				str = str.split('|');
				
				if(str[0] != 'general'){
					//console.log('[name='+str[0]+']');
					$('[name='+str[0]+']').addClass('error').val(str[1]);
				} else{
					alert(str[1]);
				}
			}
			
		} else {

			if(formname == 'portfolio_form'){
				porfolioFormSuccess();
			}
			if(formname == 'contact_form'){
				contactFormSuccess();
			}
			if(formname == 'job_form'){
				jobFormSuccess();
			}
		}
	}
	
	function contactFormSuccess(){
	
		if($('.ie8,.ie6,.ie7').length >= 1){
			
			$('#contact_form').after('<h4 id="mssg"><span>Thanks</span><br/>We\'ll be in touch!</h4>')
				.hide('fast', function(){

					$('#mssg').css({
						opacity: 1,
						top: '60px'				
					}).animate({opacity:1},3500).queue(
						function(){
							$(this).remove();
							resetForm('contact_form');
							$('#contact_form').show('fast');
						});
				});			
		}else{
			$('#contact_form').after('<h4 id="mssg"><span>Thanks</span><br/>We\'ll be in touch!</h4>')
				.animate({top: '-50px', opacity:0 }, 300, function(){

					$('#mssg').animate({
						opacity: 1,
						top: '60px'				
					},300).delay(3500).animate({top:'200px', opacity: 0}, 300, 
						function(){
							$(this).remove();
							resetForm('contact_form');
							$('#contact_form').animate({top: '0px', opacity:1}, 300);
						});
				});					
		}
	}
	
	function porfolioFormSuccess(){
		 
		$('#portfolio_form').animate({top: '-20px', opacity:0}, 300);
		$('<h4>Thanks! We\'re always looking for awesome people.</h4>').appendTo('#sub-footer .container');
		$('#sub-footer .container h4').animate({
			opacity: 1,
			bottom: '24px'				
		},300).delay(4000).animate({bottom:'-20px', opacity: 0}, 300, function(){
				$(this).remove();
				resetForm('portfolio_form');
				$('#portfolio_form').animate({top: '0px', opacity:1}, 300);
			});
	}

	
	//Blog Comments form
	
	var commentform=$('#respond');
	//commentform.prepend('<div id="wdpajax-info" ></div>');
	//var infodiv=$('#wdpajax-info');
	
	
	function onCommentFormSubmit(event){
		event.preventDefault();
		var errors = new Array();
		//console.log($('#respond').find('input[type=text], textarea'));
		$('#respond').find('input[type=text], textarea').each(function(){
			
			if(jQuery.trim($(this).val()) == $(this).attr('title')){
				errors.push($(this).attr('id'));
			}	
		});
		
		if(!validateEmail(jQuery.trim($('#email').val()))){
			errors.push('email');
		}
		
		//console.log(errors.join(","));
		if(errors.length > 0){
			for(i=0; i <errors.length; i++){
				if(errors[i] != 'email'){
					$('#'+errors[i]).val($('#'+errors[i]).attr('title')+' is required').addClass('error');
				} else {
					// is invalid email
					$('#'+errors[i]).val('Valid '+$('#'+errors[i]).attr('title')+' is required').addClass('error');
				}
			}
		} else {
			
			var formdata=commentform.serialize();
			console.log
			//Add a status message
			//infodiv.html('<p class="wdpajax-loading">Processing...</p>');
			//Extract action URL from commentform
			var formurl=commentform.attr('action');
			//Post Form with data
			$.ajax({
				type: 'post',
				url: formurl,
				data: formdata,
				dataType: 'html',
				error: function(xhr, textStatus, errorThrown){
					if(xhr.status==500){
						var response=xhr.responseText;
						var text=response.split('<p>')[1].split('</p>')[0];
						//infodiv.html('<p class="wdpajax-error" >'++'</p>');
						launchFormMessage("Oops!", text, "respond", "error");
					}
					else if(xhr.status==403){
						//infodiv.html('<p class="wdpajax-error" >Stop!! You are posting comments too quickly.</p>');
						launchFormMessage("Hey now!", "Let's take a break from commenting", "respond", "error");
					}
					else{
						if(textStatus=='timeout')
							//infodiv.html('<p class="wdpajax-error" >Server timeout error. Try again.</p>');
							launchFormMessage("Error!", "Unresponsive server. Plz contact us.", "respond", "error");
						else
							//infodiv.html('<p class="wdpajax-error" >Unknown error</p>');
							launchFormMessage("Error!", "Unknown error. Plz contact us!", "respond", "error");
					}
				},
				success: function(data, textStatus){
					if(data.indexOf("success" != -1)){
						//infodiv.html('<p class="wdpajax-success" >Thanks for your comment. We appreciate your response.</p>');
						console.log('comment form ajax data');
						console.log(data);
						
						//TO DO: update comment number count
						var endCallback;
						var expandTime = 500;
						if($('#comments-title').length < 1){
							// no comments yet
							console.log('comments length < 1');
							endCallback = function(){ 
								$('<div class="hide"><h4 id="comments-title" class="shadow-heading"><span>1 Comment</span></h4></div><ul class="commentlist"></ul>')
								.prependTo( $('#comments') );
								$('#comments div.hide').each(function(index){
									var expandedHeight = $(this).innerHeight();
									$(this).css({height:'0px', opacity:0}).removeClass('hide')
										.animate({height: (expandedHeight)+'px'}, expandTime, 'linear', function(){
											$(this).animate({opacity: 1}, 500)
										});
								});
								
								var expandedHeight = $(data).appendTo($('ul.commentlist')).innerHeight();
								$('ul.commentlist li:last-child').css({height:'0px', opacity:0}).removeClass('hide')
									.animate({height: (expandedHeight)+'px'}, expandTime, 'linear', function(){
										$(this).animate({opacity: 1}, 500)
									});
								
							}
						} else {
							
							console.log('comments length 1 or more');
							//update number of comments
							endCallback = function(){
								var str = $('#comments-title span').text();
								var patt = /[0-9]+(?:\.[0-9]*)?/g;
								$('#comments-title span').text((parseInt(patt.exec(str)) +1)+' Comments');
								
								var expandedHeight = $(data).appendTo($('ul.commentlist')).innerHeight();
								$('ul.commentlist li:last-child').css({height:'0px', opacity:0}).removeClass('hide')
									.animate({height: (expandedHeight)+'px'}, expandTime, 'linear', function(){
										$(this).animate({opacity: 1}, 500)
									});
							}
						}
													
						launchFormMessage("Thanks!", "We appreciate your response.", "respond", '', endCallback);
						
						//commentform.find('textarea[name=comment]').val('');
					} else {
						launchFormMessage("Sorry!", "Couldn't process your comment.", "respond", "error");
						//infodiv.html('<p class="wdpajax-error" >Error in processing your form.</p>');
					}
				}
			});
		}
	}
	
	function launchFormMessage(heading, message, formID, mssgClass, callback ){
		var mssgHTML = '<h4 id="mssg" class="'+mssgClass+'"><span>'+heading+'</span><br/>'+message+'</h4>';
		var animSpeed = 200;
		var fieldset = $('#'+formID+ ' fieldset');
		console.log('launch form message');
		console.log(arguments);
		if($('.ie8,.ie6,.ie7').length >= 1){
			
			$('#'+formID+' fieldset').after(mssgHTML).hide(animSpeed, function(){
					$('#mssg').css({
						opacity: 1,
						top: '60px'				
					}).animate({opacity:1},2500).queue(
						function(){
							resetForm(formID);
							$('#'+formID+' fieldset').show(animSpeed).queue(
								function(){
									$('#mssg').remove();
									if(typeof callback == 'function'){ callback(); }									
								}
							);
						});
				});			
		}else{
			console.log('FIELDSET?');
			console.log($('#'+formID+' fieldset'));
			console.log(mssgHTML);
			fieldset.after(mssgHTML);
			fieldset.animate({top: '-50px', opacity:0 }, animSpeed, function(){
					console.log('woot');
					$('#mssg').animate({
						opacity: 1,
						top: '60px'				
					},300).delay(2500).animate({top:'200px', opacity: 0}, animSpeed, 
						function(){
							console.log($('#mssg'));
							resetForm(formID);
							fieldset.animate({top: '0px', opacity:1}, animSpeed, function (){
								$(this).removeAttr('style');
								$('#mssg').remove();
								if(typeof callback == 'function'){ callback(); }
								
							});
						});
				});					
		}
	}
	
	
	function validateEmail(email) 
	{ 
	 var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ 
	 return email.match(re); 
	}
	
	
	// Job Page
	
	var firstHashChange = true;
	
	if($('.picker').length > 0){
		$('.jobs .active').hide();
		prevHash = window.location.hash;
		
		senseHash();
		
		$('.picker a').click( function(event){
			//event.preventDefault();			
			window.location.hash = $(this).attr('href');
		})
	}
	
	function senseHash() {
		$(window).hashchange(function() { updateJob(location.hash) });
		updateJob(location.hash);
	}
	
	function updateJob(id) {
		
		if(id == ''){
			id = $('.picker a:first').attr('href');
			window.location.hash = id;
			prevHash = id;
			console.log('no id');
		}
		
		if(id != prevHash || firstHashChange ){

			$('.jobs .active').fadeOut('normal').queue(
				function(){	

					$('.jobs .active').removeClass('active');
					$('.jobPosition[job='+id.substring(1)+'], #job_form').addClass('active').fadeIn('normal'); 
					
					var pickerHeight = $('.picker li').innerHeight();
					var index = $('a[href='+id+']').parent().index();

					$('a.active').removeClass('active');

					$('.selector').animate({top: (index*pickerHeight+1)+'px'}, 200, function(){
						$('a[href='+id+']').addClass('active');
					})
					
					$(this).dequeue();
				}
			);	
				
			firstHashChange = false;
			prevHash = id;
		}
		//update form		
		$('#jobPosition').val(id);
	}
	
	function onJobFormSubmit(event) {
		event.preventDefault();
		
		$('#job_form').find("input[title!=Submit], textarea").each(function(){
			
			var title = $(this).attr('title');
			var val = jQuery.trim($(this).val());
			if( val == title || $(this).hasClass('error')){
				$(this).val('');
			}
		})
		
		$.post(rootFolder + "inc/sendJob.php", {
			jobPosition: this.jobPosition.value,
			jobName: this.jobName.value,
			jobEmail: this.jobEmail.value,
			jobPortfolioLink: this.jobPortfolioLink.value,
			jobMessage: this.jobMessage.value
		}, function(data){
			onFormSuccess("job_form", data);
		}, "json");
		
	}
	
	function jobFormSuccess(){
		
		if($('.ie8,.ie6,.ie7').length >= 1){
			
			$('#job_form').after('<h4 id="mssg"><span>Thanks</span><br/>We\'ll be in touch!</h4>')
				.hide('fast', function(){

					$('#mssg').css({
						opacity: 1,
						top: '60px'				
					}).animate({opacity:1},3500).queue(
						function(){
							$(this).remove();
							$('#job_form').find('input.type_text, textarea').not('input[name=jobPosition]').each(
								function(){
									$(this).val( $(this).attr('title'));
								});
							$('#contact_form').show('fast');
						});
				});			
		}else {
			$('#job_form').after('<h4 id="mssg"><span>Thanks</span><br/>We\'ll be in touch!</h4>')
			.animate({top: '-50px', opacity:0}, 300, function(){
				
				$('#mssg').animate({
					opacity: 1,
					top: '60px'				
				},300).delay(3500).animate({top:'200px', opacity: 0}, 300, 
					function(){
						$(this).remove();
						$('#job_form').find('input.type_text, textarea').not('input[name=jobPosition]').each(
							function(){
								$(this).val( $(this).attr('title'));
							});
							
						$('#job_form').animate({top: '0px', opacity:1}, 300);
					});
			});
		}
	}

	function resetForm(id){
		//console.log($('#'+id).find('input[type!=submit], textarea').filter("[type!=hidden]") );
		$('#'+id).find('input[type!=submit], textarea').filter("[type!=hidden]").each(
			function(){
				$(this).val( $(this).attr('title'));
			}
		)
	}
	// Turns absolute times to relative times for Twitter + Last FM
	
	var K = function () {
	    var a = navigator.userAgent;
	    return {
	        ie: a.match(/MSIE\s([^;]*)/)
	    }
	}();

	var H = function (a) {
	    var b = new Date();
	    var c = new Date(a);
	//alert(c);
	//console.log(c.toUTCString()+ ' c' );
	//     if (K.ie) {
	// 		//alert(typeof(a));
	// 		a = String(a);
	// 		if(Date.parse){
	//         	c = Date.parse(a.replace(/( \+)/, ' UTC$1'));
	// alert(c);
	//     	}
	// 	}
	    var d = b - c;
	//console.log(d+ ' d' );
	    var e = 1000,
	        minute = e * 60,
	        hour = minute * 60,
	        day = hour * 24,
	        week = day * 7;
	    if (isNaN(d) || d < 0) {
	        return ""
	    }
	    if (d < e * 7) {
	        return "right now"
	    }
	    if (d < minute) {
	        return Math.floor(d / e) + " seconds ago"
	    }
	    if (d < minute * 2) {
	        return "about 1 minute ago"
	    }
	    if (d < hour) {
	        return Math.floor(d / minute) + " minutes ago"
	    }
	    if (d < hour * 2) {
	        return "about 1 hour ago"
	    }
	    if (d < day) {
	        return Math.floor(d / hour) + " hours ago"
	    }
	    if (d > day && d < day * 2) {
	        return "yesterday"
	    }
	    if (d < day * 365) {
	        return Math.floor(d / day) + " days ago"
	    } else {
	        return "over a year ago"
	    }
	};
	
	// Replace plain urls with links
	
	function replaceURLWithHTMLLinks(text) {
	  var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
	  return text.replace(exp,"<a href='$1' target='_blank'>$1</a>"); 
	}
	
});

Array.prototype.inArray = function (value,caseSensitive)
	// Returns true if the passed value is found in the
	// array. Returns false if it is not.
	{
	var i;
	for (i=0; i < this.length; i++) {
		// use === to check for Matches. ie., identical (===),
		if (this[i] == value) {
		return true;
		}
	}
	return false;
};

(function ($) {
    // Monkey patch jQuery 1.3.1+ to add support for setting or animating CSS
    // scale and rotation independently.
    // 2009-2010 Zachary Johnson www.zachstronaut.com
    // Updated 2010.11.06
    var rotateUnits = 'deg';
    
    $.fn.rotate = function (val)
    {
        var style = $(this).css('transform') || 'none';
        
        if (typeof val == 'undefined')
        {
            if (style)
            {
                var m = style.match(/rotate\(([^)]+)\)/);
                if (m && m[1])
                {
                    return m[1];
                }
            }
            
            return 0;
        }
        
        var m = val.toString().match(/^(-?\d+(\.\d+)?)(.+)?$/);
        if (m)
        {
            if (m[3])
            {
                rotateUnits = m[3];
            }
            
            $(this).css(
                'transform',
                style.replace(/none|rotate\([^)]*\)/, '') + 'rotate(' + m[1] + rotateUnits + ')'
            );
        }
        
        return this;
    }
    
    // Note that scale is unitless.
    $.fn.scale = function (val, duration, options)
    {
        var style = $(this).css('transform');
        
        if (typeof val == 'undefined')
        {
            if (style)
            {
                var m = style.match(/scale\(([^)]+)\)/);
                if (m && m[1])
                {
                    return m[1];
                }
            }
            
            return 1;
        }
        
        $(this).css(
            'transform',
            style.replace(/none|scale\([^)]*\)/, '') + 'scale(' + val + ')'
        );
        
        return this;
    }

    // fx.cur() must be monkey patched because otherwise it would always
    // return 0 for current rotate and scale values
    var curProxied = $.fx.prototype.cur;
    $.fx.prototype.cur = function ()
    {
        if (this.prop == 'rotate')
        {
            return parseFloat($(this.elem).rotate());
        }
        else if (this.prop == 'scale')
        {
            return parseFloat($(this.elem).scale());
        }
        
        return curProxied.apply(this, arguments);
    }
    
    $.fx.step.rotate = function (fx)
    {
        $(fx.elem).rotate(fx.now + rotateUnits);
    }
    
    $.fx.step.scale = function (fx)
    {
        $(fx.elem).scale(fx.now);
    }
    
    /*
    
    Starting on line 3905 of jquery-1.3.2.js we have this code:
    
    // We need to compute starting value
    if ( unit != "px" ) {
        self.style[ name ] = (end || 1) + unit;
        start = ((end || 1) / e.cur(true)) * start;
        self.style[ name ] = start + unit;
    }
    
    This creates a problem where we cannot give units to our custom animation
    because if we do then this code will execute and because self.style[name]
    does not exist where name is our custom animation's name then e.cur(true)
    will likely return zero and create a divide by zero bug which will set
    start to NaN.
    
    The following monkey patch for animate() gets around this by storing the
    units used in the rotation definition and then stripping the units off.
    
    */
    
    var animateProxied = $.fn.animate;
    $.fn.animate = function (prop)
    {
        if (typeof prop['rotate'] != 'undefined')
        {
            var m = prop['rotate'].toString().match(/^(([+-]=)?(-?\d+(\.\d+)?))(.+)?$/);
            if (m && m[5])
            {
                rotateUnits = m[5];
            }
            
            prop['rotate'] = m[1];
        }
        
        return animateProxied.apply(this, arguments);
    }
})(jQuery);
