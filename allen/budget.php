<?php 
$page_settings = array("title" => "Moving Out",
					   "desc" => "",
					   "keywords" => "",
					   "extrahead" => "",
					   "printhead" => "1");

include("$_SERVER[DOCUMENT_ROOT]/includes/header.php");

print "<h1>Monthly Expenses</h1>

<p>On my own - one year later</p>";

$c['Rent'] = 455;
$c['Tuition'] = 400;
$c['Insurance'] = 250;
$c['Gas'] = 150;
$c['Books'] = 70;
$c['Food<ul>
						<li>Groceries
						<li>Work/school food
					</ul>'] = 200;
$c['Long Term Savings'] = 100;
$c['Other<ul>
						<li>Clothes
						<li>Haircuts
						<li>Toothbrushes
						<li>Something goes wrong
					</ul>'] = 60;
$c['Occasions <ul>
						<li>Gifts
						<li>Vacations
					</ul>'] = 30;
$c['Hardware <ul>
					 <li>Laptops
					 <li>Peripherals
					 <li>Gadgets
					 <li>Ink
				 </ul>'] = 50;
$c['Bills <ul>
						<li>Phone
						<li>Internet
						<li>Website
						<li>Interest
					</ul>'] = 80;
$c['Entertainment<ul>
						<li>Movies
						<li>Eating Out
						<li>Concerts
					</ul>'] = 50;
$c['Beverages <ul>
						<li>Coffee
						<li>Alcohol
					</ul>'] = 40;

foreach ($c as $desc => $cost)
	$total += $cost;

$salary = $total * 12;
$tax = getTax($salary);

function getTax($income)
	{
	return round(($income - 8000) * 0.2205);
	}
	
$c['Income Tax + Deductions'] = round($tax / 12);
$c['EI + CPP'] = round(($salary / 12) * 0.06);

$salary += $tax;
$hours = 20;
$hourly = round($salary / 52 / $hours, 2);

$current_salary = 24000;
$current_wage = round($current_salary / 52/ $hours, 2);
$hrsneeded = round($salary / 52 / $current_wage);

$shortfall = round(($salary - $current_salary )/ 12);

arsort($c);

print "<ul>";
foreach($c as $desc => $cost)
	{
	print "<li><b>\$$cost</b>: $desc</li>";
	}
print "</ul>";

print "<p><b>Total Required: \$$total/mo.<br />
		Corresponding salary: \$$salary/yr<br />
		Current salary: \$$current_salary/yr (\$$current_wage/hr @ $hours/wk)<br />
		Current shortfall: \$$shortfall/mo<br /><br />
		Solutions:<br />
		&nbsp;&nbsp; Get raise to \$$hourly/hr<br />
		<!--&nbsp;&nbsp; Work $hrsneeded hrs/wk + 25 hrs/wk school<br />-->
			</b></p>";
?>
<?php include("$_SERVER[DOCUMENT_ROOT]/includes/footer.php"); ?>
