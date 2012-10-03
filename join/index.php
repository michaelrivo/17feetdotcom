<?php 
$parentPage = 'mobile-menu';
require('../inc/header.php'); 
?>

<div class="container static join-us">
	
	<div class="header">
		<h2>Join the Team!</h2>	
		<hr class="up" />
	</div>
	
	<div class="row-fluid width-lg-tablet">
		<div class="span3 openings">
		
			<h4>Open Positions</h4>
			
			<div id="picker-wrapper">
				<ul class="selector">
					<li><a class="hide">&nbsp;</a><div class="carat"></div></li>
				</ul>
				<ul class="picker clearfix">
					<li class="first"><a href="#interaction-designer">Interaction Designer</a></li>
					<li><a href="#visual-designer">Visual Designer</a></li>
					<li><a href="#senior-interactive-developer" class="active">Senior Interactive Developer</a></li>
				</ul>
			
			</div>
		
		</div>
	
		<div class="span8 offset1 last job-wrapper">
		
			<div class="jobs"> 
				<!-- UI Designer --> 
				<div class="jobPosition first active" job="interaction-designer"> 
					<h4 class="nomargin">Interaction Designer</h4> 

					<p class="desc">As an Interaction Designer at 17FEET you will concept ways to make technology and people connect in magical ways. Conduct research, create wireframes, user flows, process flows and site maps all while working closely with visual designers and developers.</p> 

					<h5 class="nomargin">Your Experience:</h5> 
					<ul> 
						<li>Experience creating user experiences for web and mobile software applications.</li>
						<li>Hands-on skills in developing wireframes, site maps, user flows, experience maps, personas, etc.</li>
						<li>Solid knowledge of interaction design tools to create prototypes</li>
						<li>Strong written and verbal communication skills</li>
						<li>Organized &amp; detail oriented</li>
						<li>Demonstrated knowledge of a variety web and software development technologies</li>
						<li>Familiarity with the software development process</li>
						<li>Ability to work both collaboratively and autonomously</li>
						<li>3 + years of experience</li>
					</ul> 

					<p>Sound good? Send us your information and we'll be in touch!</p> 

					<p class="bold small">No phone calls<br class="hold" /> 
					Please provide a link to your portfolio</p>
				</div> 
	        
				<!-- Visual Designer --> 
				<div class="jobPosition" job="visual-designer"> 
					<h4 class="nomargin">Visual Designer</h4> 
				
					<p class="desc">17FEET is looking for a designer to connect technology and people in magical ways through web experiences and mobile interfaces. You should have a solid understanding of user interface principles, rich visual communication skills.</p> 

					<h5 class="nomargin">Your Experience:</h5> 
					<ul> 
						<li>Strong conceptual skills</li>
						<li>Proven ability to translate wireframes into rich visual experiences</li>
						<li>Ability to work both collaboratively and autonomously</li>
						<li>Killer portfolio</li>
						<li>3+ years of relevant experience</li>
					</ul> 

				  <h5 class="nomargin">Bonus points for:</h5> 
					<ul> 
						<li>UX experience</li>
						<li>Mobile experience</li>
						<li>Experience with HTML / CSS / JavaScript development</li>
					</ul> 

					<p>Sound good? Send us your information and we'll be in touch!</p> 

					<p class="bold small">No phone calls<br class="hold" /> 
					Please provide a link to your portfolio</p> 

				</div>
				
				<!-- Senior Interactive Developer --> 
				<div class="jobPosition " job="senior-interactive-developer"> 
					<h3 class="nomargin">Senior Interactive Developer</h3> 

					<p class="desc">Hello. We are seeking a Senior Interactive Developer to work full-time, in house, to create interface-driven applications and sites for web and mobile. The projects we take on focus on usability and user experience, and we try to learn something new with every project: new languages, new frameworks or a new approach to how things get done.</p> 

					<h5 class="nomargin">Your Experience:</h5> 
					<ul> 
						<li>Strong grasp of OOP concepts</li>
						<li>Understanding of design patterns and a passion for design excellence</li>
						<li>Experience with C#, Ruby or other object-oriented web languages</li>
						<li>Experience with Objective-C and UIKit experience</li>
						<li>Experience with HTML5, CSS3, JS Frameworks</li>
						<li>Understanding of cross-browser issues &amp; solutions</li>
						<li>Comfort with agile and waterfall development methodologies</li>
						<li>Able to lead technology definition with clients</li>
						<li>Strong written and verbal communication skills</li>
						<li>Courage in the face of the unknown</li>
					</ul>
				
					<p>Sound good? Send us your information and we'll be in touch!</p> 

					<p class="bold small">No phone calls<br class="hold" /> 
					Please provide a link to your portfolio</p>

				</div>

			</div>
		
			<div style="position:relative;" class="row-fluid">
		
				<form action="#" id="job_form" class="active span8" method="POST">
					<div>
						<div class="error hide" id="errorMessage"></div>
						<input type="text" name="jobName" class="type_text" title="Name" value="Name" /><br />
						<input type="text" name="jobEmail" class="type_text" title="Email" value="Email" /><br />
						<input type="text" name="jobPortfolioLink" class="type_text" title="Portfolio Link" value="Portfolio Link"><br />
						<textarea  name="jobMessage" rows="6" cols="20" title="Message" class="type_text">Message</textarea>
						<div class="blueBtn">
							<input type="hidden" name="jobPosition" value="" id="jobPosition" />
							<input type="submit" class="submit" alt="Submit" value="Submit" title="Submit"/>
						</div>
					</div>
				</form>
			
			</div>
		</div>
		
	</div> <!-- row-fluid -->
</div>

<?php require('../inc/footer.php'); ?>