	<div id="foot-push"></div>
</div><!-- #body -->
<div id="foot">
	
	<div class="collapse blue-bird">
		
		<div class="container">
			
			<div class="row">
			
				<div class="span3 twitter">
				
					<div class="pad"><span class="bird"></span></div>
					
				</div>

			</div>
			
		</div>
		
	</div>
	
	
	<div id="footer">
		
		<div class="container">
			
			<div class="row-fluid">
			
				<div class="span3 twitter">
				
					<div class="pad">
					
						<h5><span class="currently">Currently</span> <br/>Tweeting<span class="bird"></span></h5>
					
						<div class="content">
						
							<div class="tweet-wrap"><div id="tweet-txt"></div><div class="carat"></div></div>
						
							<p class="via"><a href="http://twitter.com/17feet">@17feet</a>&nbsp;<span id="tweet-time"></span></p>
						
						</div>
					
					</div>
				
				</div>
			
				<div class="span3 blog">
				
					<div class="pad">
					
						<h5><span class="currently">Currently</span> <br/>Thinking</h5>
					
						<div class="content">
						
							<div class="post"></div>
						
							<p id="read-on" class="api-link"><a href="http://twitter.com/#!/17feet">Read On &raquo;</a></p>
						
						</div>
					</div>
				
				</div>
			
				<div class="span3 music">
				
					<div class="pad">
					
						<h5><span class="currently">Currently</span> <br/>Rocking</h5>
					
						<div id="lastfm" class="content">
						
							
							<div class="frame"><img src="" alt="" /></div>
							
							<div class="details">
								<div class="artist"></div>
								<div class="song"></div>
								<div class="album"></div>
							</div>
							
							<div class="clear"></div>
							<p class="via api-link"><a href="http://www.last.fm/user/seventeenfeet" target="_blank">Last.fm</a></p>
						
						</div>						
					</div>
				</div>
			
				<div class="span3 weather last">
				
					<div class="pad">
					
						<h5><span class="currently">Currently</span> <br/><span id="weather-condition">Foggy</span></h5>
					
						<div class="content">
						
							<div id="temp"></div>
						
							<div id="hi-low"></div>
						
							<p class="via api-link"><a href="http://weather.yahoo.com/united-states/california/san-francisco-12797159/" target="_blank">Yahoo Weather</a> for San Francisco</p>
						
						</div>
					
					</div>
				
				</div>
			
			</div> <!-- row -->
			
		</div>
		
	</div>
		
	<div id="sub-footer">
		
		<div class="container">
			
			<div class="row">
			
				<div class="span3">
				
					<a class="made-in-sf hide-txt" href="http://maps.google.com/maps?q=17feet+256+Sutter+St+%235+San+Francisco,+CA+94108&um=1&ie=UTF-8&sa=N&hl=en&tab=wl" target="_blank">Made in San Francisco</a>
				
				</div>
			
				<form class="span9" action="#" id="portfolio_form">
				
					<label for="portfolioLink"><strong>Want to join the team?</strong> Send us your online portfolio:</label>
				
					<input class="folio-url" type="text" value="http://" name="portfolioLink" title="http://" />
				
					<input type="submit" name="Submit" id="submit" value="Send">
				
				</form>
				
			</div>
			
		</div>
		
	</div>
	
</div> <!-- #foot -->

<?php if($ROOT == 'http://www.17feet.com'){ ?>
	
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-24020429-1']);
	  _gaq.push(['_trackPageview']);
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
	
<?php } ?>
</body>
</html>