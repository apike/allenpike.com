<?php
$page_settings = array("title" => "Allen Pike's Programming Resume",
					   "desc" => "",
					   "keywords" => "resume, allen, allen pike, pike, software developer, web designer, web design, c++, java, php, mysql, html, xhtml, css, standards, communication, canada, british columbia, interface, usability, resume, design, programming, programmer",
					   "extrahead" => "<style>
					   						.date {
					   							float: right;
					   							color: #777;
					   							font-weight: bold;
					   							}
					   							
					   						h2 {font-size: 1.4em}
					   						h3 {
					   							border-bottom: 1px dotted #CCC;
					   							color: #222;}
					   							
					   						#resumeheading {text-align: center}
					   						
					   					 </style>",
					   "printhead" => "1");

if (!$_GET['print'])
	include("$_SERVER[DOCUMENT_ROOT]/includes/header.php");
else
	{
	include_once("$_SERVER[DOCUMENT_ROOT]/includes/utils.php");
	print $page_settings[extrahead];
	print "<style>
				body { font-family: Frutiger, Verdana; line-height: 1.3em; font-size: 0.9em}
				h1 {margin: 0}
				a, abbr {color: black; text-decoration: none;}
			</style>";
	}
?>


<div id='resumeheading'>
<h1>Allen Pike</h1>
<p>
	<?php if (!$_GET['print'])
			print "Resume - Updated ".timeAgo(strtotime("August 12, 2007")) . "<br />";
	?>
	Burnaby, BC, Canada - Cell 604.614.8992</p>
</div>

<h2>Core Competencies</h2>

<h3>Development Experience</h3>
<ul>
	<li>Over 5 years' industry programming experience</li>
	<li>Serious development expertise with LAMP (Linux, Apache, MySQL, PHP)</li>
	<li>Object-oriented experience with C++ and Java</li>
	<li>Working knowledge of C, Javascript, Python, Ruby, and even QBasic</li>
	<li>CSS and Ajax web design experience</li>
	<li>Nearly a decade of self-directed game development</li>
	<li>Exprience with with CVS, SubVersion, and Perforce</li>
</ul>

<h3>Workplace Skills</h3>
<ul>
	<li>Speaking and presenting skillfully</li>
	<li>Gathering and refining requirements</li>
	<li>Using Mac OS X, Windows, and Linux</li>
	<li>Managing small projects, including estimation</li>
	<li>Editing and proofreading superbly</li>
	<li>Creating basic art with Photoshop, Illustrator, and Maya</li>
	<li>Focusing on usability and open source</li>
	<li>Paying attention to details</li>
</ul>

<h2>Work History</h2> 

<h3><span class='date'>2003-present</span>
	Software Developer, <a href='http://www.discoverysoftware.com/'>Discovery Software</a></h3>
<ul>
	<li>Initiated, designed, and manages intranet system based on <abbr title='Linux, Apache, MySQL and PHP'>LAMP</abbr>
	<ul>
		<li>Implemented CRM, reporting, time tracking, bug tracking, and other internal tools</li>
		<li>Reviewed code, assigned tasks, and otherwise managed other developers occasionally</li>
		<li>Gathers requirements and drives development in an iterative fashion</li>
		<li>Mentors other developers in PHP and SQL</li>
	</ul>
	<li>Kept active in many facets of the business
	<ul>
		<li>Managed a series of small programming contracts, including estimates</li>
		<li>Develops and manages public web presence</li>
		<li>Participated in software testing and documentation at one time</li>
		<li>Presents training and sales sessions at conferences occasionally</li>
		<li>Assists with logos, marketing, and other product management tasks as needed</li>
		<li>Assisted with hiring on occasion</li>
	</ul>
</ul>

<h3><span class='date'>2005-present</span> VP Operations and more, <a href='http://csss.cs.sfu.ca/'>SFU CS Student Society</a></h3>

<ul>
	<li>Starting as Secretary, went on to be VP Operations and Acting President</li>
	<li>Assisted with the first <a href='http://www.ntcu.ca/'>NTCU</a> technology conference</li>
	<li>Led <a href='http://olpc.costar.sfu.ca/'>One Laptop Per Child</a> project at SFU for one semester</li>
</ul>

<h3><span class='date'>2000-present</span>Everything, <a href='http://www.alteringtime.com/'>Altering Time</a></h3>
<ul>
	<li>Maintains and administers AlteringTime.com, a PHP-based community website</li>
	<li>Wrote Engineering Faith and Political Asylum, web-based games with 100+ players</li>
	<li>Broke 10,000 monthly unique visitors threshold</li>
	<li>Estimated and completed 100-hour freelance web application contract</li>
	<li>Freelanced doing web design work for a number of clients</li>
	<li>Wrote simple games with C++Builder and QBasic long ago</li>
</ul>

<h3><span class='date'>2001-2003</span>
	Customer Service and intranet developer, <a href="http://www.uniserve.com/">Uniserve Online</a></h3>
<ul>
	<li>Initiated, designed, and developed dynamic intranet project w/ 100+ pages</li>
	<li>Wrote training and knowledge base articles and guides</li>
	<li>Solved billing and technical problems</li>
</ul>

<h3><span class='date'>2001</span> 
	Work experience student, <a href="http://www.radical.ca/">Radical Entertainment</a> </h3>
<ul>
	<li>Enhanced a 3D viewing utility using Visual C++</li>
</ul>

<h2>Education</h2>

<h3><span class='date'>2002-present</span>Computing Science Major, <a href="http://www.sfu.ca/">Simon Fraser University</a></h3>
<ul>
	<li>Set to complete Bachelor of Science in Computing Science in April 2008</li>
	<li>Will also receive a Certificate in Liberal Arts</li>
	<li>Upper division electives include graphics, AI, databases, networking, web apps, and HCI</li>
	<li>Was awarded scholarship to the Apple Worldwide Developers' Conference in 2006</li>
	<li>Transferred to SFU from <a href='http://www.ucfv.ca'>UCFV</a> after first year</li>
	<li>Currently maintaining a B+ GPA while working</li>
</ul>

<h3><span class='date'>1997-2002</span>High School Diploma, Aldergrove Secondary</h3>
<ul>
	<li>Graduated with 92% GPA</li>
	<li>Received provincial scholarships</li>
	<li>Took a leadership role in extracurricular theatre and provincial improv team</li>
</ul>

<h2>Et cetera</h2>

<h3>Interests</h3>
<ul>
	<li>Creating <a href="/faith/">games</a>, especially online</li>
	<li>Fostering Open Source development</li>
	<li>Theatre and comedy</li>
	<li>Human interface and <a href="http://www.useit.com/">usability</a></li>
</ul>

<?php 
if (!$_GET['print'])
	{
?>
	
	<h3>Favourite Readings</h3>
		<ul>
		<li><a href='http://www.37signals.com/svn/'>Signal vs. Noise</a> - These guys really get the power of simplicity.</li>
		<li><a href='http://www.paulgraham.com/articles.html'>Paul Graham's Essays</a>  - Always worth reading.</li>
		<li><a href='http://www.amazon.com/gp/product/0385267746/103-0474261-9749419?v=glance&n=283155'>The Design of Everyday Things</a>  - Priceless.</li>
		<li><a href='http://www.joelonsoftware.com/'>Joel On Software</a>  - Also worth reading.</li>
		<li><a href='http://www.amazon.com/gp/product/0673461750/qid=1140597451/sr=1-1/ref=sr_1_1/103-0474261-9749419?s=books&v=glance&n=283155'>The Macintosh Way</a>  - A cool take on what a company should be.
		<li><a href='http://www.alteringtime.com/log/'>Altering Log</a> - Where I post my own musings.</li>
	</ul>
	
	<p><a href='/site/contact.php'>Contact me</a> or see a <a href='?print=1'>print version</a>.</p>

<?php
	include("$_SERVER[DOCUMENT_ROOT]/includes/footer.php"); 
	}
?>

