<?php
mysql_connect("Pixelgraphy.db.11837707.hostedresource.com", "Pixelgraphy", "P@web2013") or die (mysql_error()); 
mysql_select_db("Pixelgraphy")or die(mysql_error());
if(session_id() == "")
{
	session_start();
	if (!isset($_SESSION['usr']))
	{
		header("location:index.php");
	}
}
else
{
	if (!isset($_SESSION['usr']))
	{
		header("location:index.php");
	}
}
$uuid = $_SESSION['id'];
$query = mysql_query("SELECT * FROM uprofile WHERE user_id='$uuid'");
$data = mysql_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
    <title>User Settings</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
<link rel="stylesheet" href="style/layouts/side-menu.css">
<link rel="stylesheet" href="style/layouts/marketing.css">
<style type="text/css">
.pure-button-warning 
{
    background: rgb(223, 117, 20);
}
textarea 
{ 
    resize: none; 
}
</style>
</head>
<body>
<div id="layout">
    <a href="#menu" id="menuLink" class="pure-menu-link">
        <span>Menu</span>
    </a>
    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="index.php">Pixelgraphy</a>

            <ul>
                <li><a id="global_profile" href="globalfeed.php">Global Feed</a></li>
				
                <li><a id="myprofile_profile" href="profile.php">My  Profile</a></li>
				
                <li><a id="upload_profile" href="upload.php">Upload Image</a></li>
				
                <li class="pure-menu-selected menu-item-divided">
                    <a id="settings_profile" href="settings.php">Settings</a>
                </li>
				
                <li><a id="logout_profile" href="session_kill.php">Logout</a></li>
            </ul>
        </div>
    </div>
        <!-- Settings stuff starts here -->
        <form action="update_settings.php" method="POST" class="pure-form pure-form-stacked" style="margin-left:10%;margin-right:10%;">
            <fieldset>
                <legend>Update your profile.</legend>
				<?php ?>
                <div class="pure-g-r">
                    <div class="pure-u-1-3">
                        <label for="full-name">Full Name</label>
                        <input id="full-name" type="text" name="fullname" value="<?php echo $data['fullname']; ?>">
                    </div>

                    <div class="pure-u-1-3">
                        <label for="Gender">Gender</label>
                        <label for="option-one" class="pure-radio">
                        <input id="option-one" type="radio" name="gender" value="male" checked>
                        Male
                        </label>

                        <label for="option-two" class="pure-radio">
                        <input id="option-two" type="radio" name="gender" value="female">
                        Female
                        </label>
                    </div>  

                    <div class="pure-u-1-3">
                        <label for="r_status">Date of Birth</label>
                        <select id="dob_month" name="DateOfBirth_Month" class="pure-input-1-3">
                            <option>- Month -</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select> 
                        <select id="dob_day" name="DateOfBirth_Day" class="pure-input-1-3">
                            <option>- Day -</option>
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
                        <select id="dob_year" name="DateOfBirth_Year" class="pure-input-1-3">
                            <option>- Year -</option>
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
                            <option value="1900">1900</option>
                        </select> 
                    </div>

                    <div class="pure-u-1-3">
                        <label for="last-name">Nick Name</label>
                        <input id="last-name" type="text" name="nickname" value="<?php echo $data['nickname']; ?>">
                    </div>

                    <div class="pure-u-1-3">
                        <label for="city">Major</label>
                        <input id="city" type="text" name="major" value="<?php echo $data['major']; ?>">
                    </div>

                    <div class="pure-u-1-3">
                        <label for="pemail">Personal E-Mail</label>
                        <input id="pemail" type="email" name="personal_email" value="<?php echo $data['personal_email']; ?>">
                    </div>

                    <div class="pure-u-1-3">
                        <label for="city">Hometown</label>
                        <input id="city" type="text" name="hometown" value="<?php echo $data['hometown']; ?>">
                    </div>

                    <div class="pure-u-1-3">
                        <label for="state">Home State</label>
                        <select id="state" class="pure-input-1-2" name="homestate">
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>

                    <div class="pure-u-1-3">
                        <label for="r_status">Relationship Status</label>
                        <select id="r_status" class="pure-input-1-2" name="relationship">
                            <option value="Single">Single</option>
                            <option value="In A Relationship">In A Relationship</option>
                            <option value="Married">Married</option>
                            <option value="Don't Care">Don't Care</option>
                        </select>
                    </div>

                    <div class="pure-u-1-2">
                        <label for="bio_area">Your Biography</label>
                        <textarea rows="10" cols="50" name="biography"><?php echo $data['biography']; ?></textarea>
                    </div>

                    <div class="pure-u-1-2">
                        <label for="bio_area">Your Hobbies/Interests</label>
                        <textarea rows="10" cols="50" name="hobbies"><?php echo $data['hobbies']; ?></textarea>
                    </div>

                </div>
                <!--
                <label for="terms" class="pure-checkbox">
                    <input id="terms" type="checkbox">
                </label>
                -->
                <br/>
                <button type="submit" class="pure-button pure-button-primary">Submit Changes!</button>
                <button type="reset" class="pure-button pure-button-warning">Clear Changes</button>
            </fieldset>
        </form>
        <br/>
        <form class="pure-form" action="update_profile_image.php" style="margin-left:10%;margin-right:10%;" method="POST">
            <legend>Update your display Image.</legend>
            <fieldset>
                <div class="pure-u-1-2">
                    <label for="user_image">Your profile image</label>
                    <input type="file" name="user_image" accept="image/*">
                </div>
                <button type="submit" class="pure-button pure-button-primary">Update Image</button>
            </fieldset>
        </form>
        <!-- End settings stuff here -->
</div>
<script src="Javascript/ui.js"></script>
</body>
</html>
