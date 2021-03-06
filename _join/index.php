<?php 
$parentPage = 'mobile-menu join';
require('../inc/header.php'); 
?>

<div class="dark-header">

	<div class="container static join-us">
	
		<div class="header">
			<h2>We are 17FEET.</h2>
		
			<h3 class="bottom">And we're looking for amazing people who want to do great work.</h3>
			<h4>We believe that small teams can achieve monumental results and that when smart people are empowered to think critically the results can be, well&hellip; pretty badass. <span class="caps">See Open Positions</span><span class="open-positions-arrow"></span></h4>
			
		</div>
	
	</div>
	<div class="dotted-grey"></div>
</div>

<div class="container static join-us">
	
	<div class="row-fluid width-lg-tablet">
		<div class="span3 openings">
					
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
					<h4 class="top">Interaction Designer</h4> 

					<p class="desc">As an Interaction Designer at 17FEET, you will concept ways to make technology and people connect in magical ways: conduct research, create user flows, process flows and site maps, wireframes, prototypes, all while working closely with clients, producers, visual designers and developers.</p> 

					<h5>Your Experience:</h5> 
					<ul> 
						<li>3 + years of experience</li>
						<li>Background in UX design for web and mobile software applications</li>
						<li>Hands-on skills in creating wireframes, site maps, user flows, experience maps, personas, etc.</li>
						<li>Solid knowledge of interaction design tools to create prototypes</li>
						<li>Strong written and verbal communication skills</li>
						<li>Organized &amp; detail oriented</li>
						<li>Capacity to understand client goals and requirements, technical constraints, as well as budget and schedule</li>
						<li>Demonstrated knowledge of a variety web and software development technologies</li>
						<li>Familiarity with the software development process</li>
						<li>Ability to work both collaboratively and autonomously</li>
						<li>Passion for concept development, ideation and sketching</li>
						<li>Skill and excitement presenting to clients</li>
						<li>Knowledge of current trends and technologies</li>
					</ul> 

					<p>Sound good? Send us your information and we'll be in touch!</p> 

					<p class="bold small">No phone calls<br class="hold" /> 
					Please provide a link to your portfolio</p>
				</div> 
	        
				<!-- Visual Designer --> 
				<div class="jobPosition" job="visual-designer"> 
					<h4 class="top">Visual Designer</h4> 
				
					<p class="desc">17FEET is looking for an experienced designer to design digital experiences that connect technology and people in magical ways. Work with a small collaborative team that includes clients, producers, interaction designers and developers. You should have a solid understanding of user interface principles and rich visual communication skills.</p> 

					<h5>Your Experience:</h5> 
					<ul>
						<li>3+ years of relevant experience</li>
						<li>Strong conceptual skills - passion for concept development, ideation and sketching</li>
						<li>Ability to rapidly explore multiple design directions</li>
						<li>Proven ability to translate wireframes into rich visual experiences</li>
						<li>Strong knowledge of HTML - understanding how page layouts translate to code</li>
						<li>Experience designing cross-platform visual design systems for mobile and web</li>
						<li>Capacity to understand client goals and requirements, usability, technical constraints, as well as budget and schedule</li>
						<li>Ability to work both collaboratively and autonomously</li>
						<li>Skill and excitement presenting to clients</li>
						<li>Knowledge of current design trends and technologies</li>
						<li>Killer portfolio</li>
					</ul>

				  <h5>Bonus points for:</h5> 
					<ul> 
						<li>UX experience</li>
						<li>Experience with HTML / CSS / JavaScript development</li>
					</ul> 

					<p>Sound good? Send us your information and we'll be in touch!</p> 

					<p class="bold small">No phone calls<br class="hold" /> 
					Please provide a link to your portfolio</p> 

				</div>
				
				<!-- Senior Interactive Developer --> 
				<div class="jobPosition " job="senior-interactive-developer"> 
					<h4 class="top">Interactive Developer</h4> 

					<p class="desc">We are seeking a Interactive Developer to create interface-driven applications and sites for web and mobile. Our projects have a strong focus on usability, user experience and front-end polish and we always try to learn something new with every project: new languages, new frameworks or a new approach to how things get done.</p> 

					<h5>Your Experience:</h5> 
					<ul>
						<li>Strong grasp of OOP concepts</li>
						<li>Understanding of design patterns and a passion for design excellence</li>
						<li>Experience with C#, Ruby or other object-oriented web languages</li>
						<li>Experience with Objective-C and UIKit</li>
						<li>Experience with HTML5, CSS3, JS Frameworks</li>
						<li>Understanding of cross-browser issues & solutions</li>
						<li>Comfort with agile and waterfall development methodologies</li>
						<li>Knowledge of responsive design implementation</li>
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