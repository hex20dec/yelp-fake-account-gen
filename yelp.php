<?
error_reporting(-1);
// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://www.fakenamegenerator.com/gen-random-us-us.php");
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13");
    //allow returning the content to a variable for manipulation before outputting
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $x = curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);




preg_match('/<div class="address">[^~]+?<h3>[^~]+?<\/h3>/',$x,$name);
$name = $name[0];
$name = preg_replace('/<div class="address">[^~]+?<h3>/','',$name);
$name = str_replace('</h3>','',$name);
$name = explode(' ',$name);
$first = $name[0];
$last = end($name);
file_put_contents('identities/'.$first.'_'.$last.'.html',$x);

// Gender
$selected = array('','');
if(preg_match('/alt="Female"/',$x)){
$gender = 'f';
}else{
$gender = 'm';
}
$gender = "<input type='text' name='gender' value='".$gender."' />";

//bday
preg_match('/<li class="bday">[^~]+?<\/li>/',$x,$bday); //May 7, 1969 (43 years old)
$bday = $bday[0];
$bday = str_replace('<li class="bday">','',$bday);
$bday = str_replace('</li>','',$bday);
$bday = str_replace(',','',$bday);
$bday = explode(' ',$bday);
$month = $bday[0];
$day = $bday[1];
$year = $bday[2];
switch ($month) {
    case "January":
        $month = 1;
        break;
    case "February":
        $month = 2;
        break;
    case "March":
        $month = 3;
        break;
    case "April":
        $month = 4;
        break;
    case "May":
        $month = 5;
        break;
    case "June":
        $month = 6;
        break;
    case "July":
        $month = 7;
        break;
    case "August":
        $month = 8;
        break;
    case "September":
        $month = 9;
        break;
    case "October":
        $month = 10;
        break;
    case "November":
        $month = 11;
        break;
    case "December":
        $month = 12;
        break;
}

//email
preg_match('/<li class="email">[^~]*?<span class="value">[^~]+?<\/span>/',$x,$email);
$email = $email[0];
$email = preg_replace('/<li class="email">[^~]*?<span class="value">/','',$email);
$email = str_replace('</span>','',$email);



//password
preg_match('/<li class="lab">Password:<\/li>[^~]+?<li>[^~]+?<\/li>/',$x,$password);
$password = $password[0];
$password = preg_replace('/<li class="lab">Password:<\/li>[^~]+?<li>/','',$password);
$password = str_replace('</li>','',$password);
$password = 'ffb'.$password;



//zip
preg_match('/<div class="adr">[^~]+?[0-9]{5}/',$x,$zip);
preg_match('/[0-9]{5}$/',$zip[0],$zip);
$zip = $zip[0];

?>
<html>
<head></head>
<body>
<form action="http://yelp.com/signup" class="signup" id="signup_form" method="POST" name="signup_form">
<input type="hidden" class="csrftok" name="csrftok" value="05ca0afd1dff0682fcad5af333cba08d6b304d20f0c469b3fdc78bf8e5b11336">
		<fieldset>
			<input type="hidden" name="context" value="K4CPuqkU1WR3o4jApf2SOw">
			<input type="hidden" name="rival" value="default">
			<input type="hidden" name="action_submit" value="1">
			<input type="hidden" name="signup_source" value="">
			<ol class="clearfix">
				<div id="signup-list-required-container">
					<input type="hidden" name="country" value="US">
					<li id="signup-list-first-name">
						<label for="signup-first-name">		First Name:
</label>
						<input id="signup-first-name" type="text" tabindex="1" size="20" maxlength="64" name="first_name" value="<?=$first?>">
					</li>
					<li id="signup-list-last-name">
						<label for="signup-last-name">		Last Name:
</label>
						<input id="signup-last-name" type="text" tabindex="2" size="20" maxlength="64" name="last_name" value="<?=$last?>">
					</li>
				</div>
				<li id="signup-list-address">
					<label for="signup-address">		Email Address:
</label>
					<input id="signup-address" type="email" size="20" tabindex="3" maxlength="64" name="email" value="<?=$email?>">
				</li>
				<li>
					<label for="signup-password">		Password:
</label>
					<input id="signup-password" autocomplete="off" type="password" size="20" tabindex="4" name="password" value="<?=$password?>">
				</li>
					<li>
						<label for="signup-zip">		Zip Code:
</label>
						<input id="signup-zip" type="text" size="7" class="zip" name="zip" tabindex="7" value="<?=$zip?>">
					</li>

				<li id="signup-list-gender" class="gender">
					<span class="gender-label">		Gender:
<span class="formNote">(Optional)</span></span>
				<?=$gender?></li>
				<li id="signup-list-birthdate" class="birthdate">
					<label for="signup-birthdate">		Birthdate:
<span class="formNote">(Optional)</span></label>


		<select name="birthdate_m" tabindex="11">
			<option value="">---</option>
			<option value="1">Jan</option>
			<option value="2">Feb</option>
			<option value="3">Mar</option>
			<option value="4">Apr</option>
			<option value="5">May</option>
			<option value="6">Jun</option>
			<option value="7">Jul</option>
			<option value="8">Aug</option>
			<option value="9">Sep</option>
			<option value="10">Oct</option>
			<option value="11">Nov</option>
			<option value="12">Dec</option>
	</select>
 	<select name="birthdate_d" tabindex="12">
			<option value="">---</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
	</select>
 	<select name="birthdate_y" tabindex="13">
			<option value="">---</option>
			<option value="2013">2013</option>
			<option value="2012">2012</option>
			<option value="2011">2011</option>
			<option value="2010">2010</option>
			<option value="2009">2009</option>
			<option value="2008">2008</option>
			<option value="2007">2007</option>
			<option value="2006">2006</option>
			<option value="2005">2005</option>
			<option value="2004">2004</option>
			<option value="2003">2003</option>
			<option value="2002">2002</option>
			<option value="2001">2001</option>
			<option value="2000">2000</option>
			<option value="1999">1999</option>
			<option value="1998">1998</option>
			<option value="1997">1997</option>
			<option value="1996">1996</option>
			<option value="1995">1995</option>
			<option value="1994">1994</option>
			<option value="1993">1993</option>
			<option value="1992">1992</option>
			<option value="1991">1991</option>
			<option value="1990">1990</option>
			<option value="1989">1989</option>
			<option value="1988">1988</option>
			<option value="1987">1987</option>
			<option value="1986">1986</option>
			<option value="1985">1985</option>
			<option value="1984">1984</option>
			<option value="1983">1983</option>
			<option value="1982">1982</option>
			<option value="1981">1981</option>
			<option value="1980">1980</option>
			<option value="1979">1979</option>
			<option value="1978">1978</option>
			<option value="1977">1977</option>
			<option value="1976">1976</option>
			<option value="1975">1975</option>
			<option value="1974">1974</option>
			<option value="1973">1973</option>
			<option value="1972">1972</option>
			<option value="1971">1971</option>
			<option value="1970">1970</option>
			<option value="1969">1969</option>
			<option value="1968">1968</option>
			<option value="1967">1967</option>
			<option value="1966">1966</option>
			<option value="1965">1965</option>
			<option value="1964">1964</option>
			<option value="1963">1963</option>
			<option value="1962">1962</option>
			<option value="1961">1961</option>
			<option value="1960">1960</option>
			<option value="1959">1959</option>
			<option value="1958">1958</option>
			<option value="1957">1957</option>
			<option value="1956">1956</option>
			<option value="1955">1955</option>
			<option value="1954">1954</option>
			<option value="1953">1953</option>
			<option value="1952">1952</option>
			<option value="1951">1951</option>
			<option value="1950">1950</option>
			<option value="1949">1949</option>
			<option value="1948">1948</option>
			<option value="1947">1947</option>
			<option value="1946">1946</option>
			<option value="1945">1945</option>
			<option value="1944">1944</option>
			<option value="1943">1943</option>
			<option value="1942">1942</option>
			<option value="1941">1941</option>
			<option value="1940">1940</option>
			<option value="1939">1939</option>
			<option value="1938">1938</option>
			<option value="1937">1937</option>
			<option value="1936">1936</option>
			<option value="1935">1935</option>
			<option value="1934">1934</option>
			<option value="1933">1933</option>
			<option value="1932">1932</option>
			<option value="1931">1931</option>
			<option value="1930">1930</option>
			<option value="1929">1929</option>
			<option value="1928">1928</option>
			<option value="1927">1927</option>
			<option value="1926">1926</option>
			<option value="1925">1925</option>
			<option value="1924">1924</option>
			<option value="1923">1923</option>
			<option value="1922">1922</option>
			<option value="1921">1921</option>
			<option value="1920">1920</option>
			<option value="1919">1919</option>
			<option value="1918">1918</option>
			<option value="1917">1917</option>
			<option value="1916">1916</option>
			<option value="1915">1915</option>
			<option value="1914">1914</option>
			<option value="1913">1913</option>
			<option value="1912">1912</option>
			<option value="1911">1911</option>
			<option value="1910">1910</option>
			<option value="1909">1909</option>
			<option value="1908">1908</option>
			<option value="1907">1907</option>
			<option value="1906">1906</option>
			<option value="1905">1905</option>
			<option value="1904">1904</option>
			<option value="1903">1903</option>
			<option value="1902">1902</option>
			<option value="1901">1901</option>
	</select>


				</li>
				<li>
					<label for="other_country">		Country:
</label>
					<div class="primary" id="countryContainer">
							<select id="other_country" name="other_country">
		<option value="AU">Australia</option>
		<option value="AT">Austria</option>
		<option value="BE">Belgium</option>
		<option value="CA">Canada</option>
		<option value="DK">Denmark</option>
		<option value="FI">Finland</option>
		<option value="FR">France</option>
		<option value="DE">Germany</option>
		<option value="IE">Ireland</option>
		<option value="IT">Italy</option>
		<option value="NO">Norway</option>
		<option value="PL">Poland</option>
		<option value="SG">Singapore</option>
		<option value="ES">Spain</option>
		<option value="SE">Sweden</option>
		<option value="CH">Switzerland</option>
		<option value="NL">The Netherlands</option>
		<option value="TR">Turkey</option>
		<option value="GB">United Kingdom</option>
		<option value="US" selected="selected">United States</option>
	</select>

					</div>
					<div class="primary change-country" id="change-country" style="display: none;">
						<p>
							<span>United States</span>
							<a href="#">Change</a>
						</p>
					</div>
				</li>
			</ol>


			<p>

				By clicking the button below, you agree to Yelp’s <a id="tos-link" href="/static?p=tos&amp;country=US">Terms of Service</a> and <a id="pp-link" href="/static?p=privacy&amp;country=US">Privacy Policy</a>.
			</p>

			<p class="alignright">
				<button id="signUpButton" tabindex="14" type="submit" value="Sign Up" class="ybtn ybtn-primary ybtn-large disable-on-submit"><span>Sign Up</span></button>
			</p>
		</fieldset>

</form>
</body>
</html>