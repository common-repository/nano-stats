<?php
	if (!is_admin()) die('no rights');
	
	register_setting('nanostats_basic','nanostats_username');
	register_setting('nanostats_basic','nanostats_region');
	register_setting('nanostats_basic','nanostats_width');
	register_setting('nanostats_basic','nanostats_height');
	register_setting('nanostats_basic','nanostats_color_wordcount');
	register_setting('nanostats_basic','nanostats_color_goal');
	register_setting('nanostats_basic','nanostats_color_daily');
	register_setting('nanostats_basic','nanostats_title');	
?>

<div class="wrap" style="margin-top: 0;">
	<style type="text/css">
		code {
			font-size: 85%;
		}
		ul {
			list-style-type: disc;
			padding-left: 20px;
		}
		td {
			vertical-align: middle;
			height: 30px;
		}
		td#help {
			vertical-align: top;
			height: 200px;
		}
		td#help span.ver_spacer {
			display: block;
		}
		table.settings tr td {
			vertical-align:top;
		}
		table.settings tr td.help {
			color: #888;
			font-style: italic;
			padding-bottom: 2em;
		}
		#tabs {
			width: 100%;
			border-color: #808080;
			border-style: solid;
			border-width: 0 0 1px 0;
			position: fixed;
			background-color: #f1f1f1;
			margin: 0;
			padding-bottom: 1px;
			padding-top: 10px;
			height: 30px;
		}
		#tabs ul {
			list-style-type: none;
			margin: 0;
		}
		#tabs ul li {
			background-color: #dfdfdf;
			display: inline-block;
			padding: 0 10px;
			height: 30px;
			line-height: 30px;
			font-size: 16px;
			text-align: center;
			border-style: solid;
			border-width: 1px;
			border-radius: 10px 10px 0 0;
			border-color: #808080;
			margin-bottom: 0;
			margin-right: 5px;
		}
		#tabs ul li.selected {
			background-color: #808080;
		}
		#tabs ul li a {
			font-weight: bold;
			text-decoration: none;
			color: #21759b;
			width: 100%;
			display: block;
		}
		#tabs ul li.selected a {
			color: #fff;
			text-shadow: 0 -1px 0 #333333;
		}
		
		#main {
			padding-top: 45px;
		}
		
		#main table input {
			width: 200px;
		}
		
		#docs, #form, #support {
			display: none;
		}
		#docs.selected, #form.selected, #support.selected {
			display: block;
		}
	</style>
	<script type="text/javascript">
		pages = ['form','docs','support'];
		function openPage(page) {
			for (var i in pages) {
				document.getElementById(pages[i]).setAttribute("class","");
				document.getElementById('li' + pages[i]).setAttribute("class","");
			}
			document.getElementById(page).setAttribute("class","selected");
			document.getElementById('li' + page).setAttribute("class","selected");
			scroll(0,0);
		}
	</script>
	<div id="tabs">
		<ul>
			<li id="liform" class="selected"><a href="javascript:openPage('form');">Settings</a></li>
			<li id="lidocs"><a href="javascript:openPage('docs');">Documentation</a></li>
			<li id="lisupport"><a href="javascript:openPage('support');">Support</a></li>
		</ul>
	</div>
	<div id="main">
		<div id="form" class="selected">
			<form method="post" action="">
			<?php 
				settings_fields('nanostats_basic'); 
				if (isset($_POST['nanostats_username'])) update_option('nanostats_username', $_POST['nanostats_username']);
				if (isset($_POST['nanostats_region'])) update_option('nanostats_region', $_POST['nanostats_region']);
				if (isset($_POST['nanostats_width'])) update_option('nanostats_width', $_POST['nanostats_width']);
				if (isset($_POST['nanostats_height'])) update_option('nanostats_height', $_POST['nanostats_height']);
				if (isset($_POST['nanostats_color_wordcount'])) update_option('nanostats_color_wordcount', $_POST['nanostats_color_wordcount']);
				if (isset($_POST['nanostats_color_goal'])) update_option('nanostats_color_goal', $_POST['nanostats_color_goal']);
				if (isset($_POST['nanostats_color_daily'])) update_option('nanostats_color_daily', $_POST['nanostats_color_daily']);
				if (isset($_POST['nanostats_title'])) update_option('nanostats_title', $_POST['nanostats_title']);
				if (isset($_POST['nanostats_username'])) {
					?><div class="updated"><p><strong><?php _e('Options saved.', 'mt_trans_domain' ); ?></strong></p></div><?php
				}
			?>
			<h2>NaNo Stats Options</h2>
			<table style="width:100%;" cellspacing="0" class="settings">
				<tr>
					<td style="width:170px;">Default username</td>
					<td style="width:200px;"><input type="text" name="nanostats_username" value="<?php echo get_option('nanostats_username'); ?>" /></td>
				</tr>
				<tr>
					<td colspan="2" class="help">
						In every chart and widget, you can choose a username.
						If you don't specify one, this username will be used to show the statistics.
						When in a WordWar widget less than 2 usernames are given, this one will be added.
					</td>
				</tr>
				<tr>
					<td>Default region</td>
					<td><input type="text" name="nanostats_region" value="<?php echo get_option('nanostats_region'); ?>" /></td>
				</tr>
				<tr>
					<td colspan="2" class="help">
						The default region.
						When in a RegionWar widget less than 2 regions are given, this one will be added.
						You can override this option in individual charts and widgets.
						<br/>
						You can lookup your region by going to <a target="_blank" href="http://nanowrimo.org/en/regions">http://nanowrimo.org/en/regions</a>, click on your region and copy the region from the URL.
						For example, my region is <a target="_blank" href="http://nanowrimo.org/en/regions/europe-the-netherlands">http://nanowrimo.org/en/regions/europe-the-netherlands</a>, so my region is "europe-the-netherlands".
					</td>
				</tr>
				<tr>
					<td>Default width</td>
					<td><input type="text" name="nanostats_width" value="<?php echo get_option('nanostats_width'); ?>" /></td>
				</tr>
				<tr>
					<td colspan="2" class="help">
						In pixels.
						Only applicable for the wordcount history chart.
					</td>
				</tr>
				<tr>
					<td>Default height</td>
					<td><input type="text" name="nanostats_height" value="<?php echo get_option('nanostats_height'); ?>" /></td>
				</tr>
				<tr>
					<td colspan="2" class="help">
						In pixels.
						Only applicable for the wordcount history chart.
					</td>
				</tr>
				<tr>
					<td>Default WC color</td>
					<td><input type="text" name="nanostats_color_wordcount" value="<?php echo get_option('nanostats_color_wordcount'); ?>" /></td>
				</tr>
				<tr>
					<td colspan="2" class="help">
						The default color for the wordcount bars (default: <code>#8888cc</code>).
						Only applicable for the wordcount history chart.
						More information about the format is on <a href="https://en.wikipedia.org/wiki/Web_colors">Wikipedia:Web colors</a>.
					</td>
				</tr>
				<tr>
					<td>Default goal color</td>
					<td><input type="text" name="nanostats_color_goal" value="<?php echo get_option('nanostats_color_goal'); ?>" /></td>
				</tr>
				<tr>
					<td colspan="2" class="help">
						The default color for the goal line (default: <code>#674732</code>).
						Only applicable for the wordcount history chart.
						More information about the format is on <a href="https://en.wikipedia.org/wiki/Web_colors">Wikipedia:Web colors</a>.
					</td>
				</tr>
				<tr>
					<td>Default todays words color</td>
					<td><input type="text" name="nanostats_color_daily" value="<?php echo get_option('nanostats_color_daily'); ?>" /></td>
				</tr>
				<tr>
					<td colspan="2" class="help">
						The default color for daily words written bars (default: <code>#000000</code>).
						Only applicable for the wordcount history chart.
						More information about the format is on <a href="https://en.wikipedia.org/wiki/Web_colors">Wikipedia:Web colors</a>.
					</td>
				</tr>
				<tr>
					<td>Title</td>
					<td><input type="text" name="nanostats_title" value="<?php echo get_option('nanostats_title'); ?>" /></td>
				</tr>
				<tr>
					<td colspan="2" class="help">
						The title for your graph. Use %u to display the username.
						Keep empty for no title.
						For example, <code>Stats for %u</code> would display "Stats for camilstaps", if your username is camilstaps.
					</td>
				</tr>
			</table>
			<?php 
				submit_button(); 
			?>
			</form>
		</div>
		<div id="docs">
			<h3>Shortcodes</h3>
			A shortcode is a little text that will be replaced by WordPress.
			WordPress shortcodes are between square brackets: <code>[</code> and <code>]</code>. An example of a short code is <code>[nanostats]</code>.
			<br/>
			Shortcodes can have variables. For example, to set <code>username</code> to <code>chris-baty</code>: <code>[nanostats username="chris-baty"]</code>.
			<br/>
			<h3>NaNoWriMo Stats</h3>
			Adding <code>[nanostats]</code> to a post, page or sidebar widget will include your NaNoWriMo stats! 
			<br/>
			You can also add variables to this shortcode, like this: <code>[nanostats width=500]</code> 
			<br/>
			You can use the following variables:
			<ul>
				<li><code>username</code>: the username to show the statistics for</li>
				<li><code>width</code>: the width of the graph in pixels</li>
				<li><code>height</code>: the height of the graph in pixels</li>
				<li><code>wccolor</code>: the color for the wordcount bars (don't forget the '#' !)</li>
				<li><code>goalcolor</code>: the color for the goal line (don't forget the '#' !)</li>
				<li><code>dailycolor</code>: the color for the daily words bars (don't forget the '#' !)</li>
				<li><code>showtotals</code>: set to false if you don't want to see the totals (default: true)</li>
				<li><code>showgoal</code>: set to false if you don't want to see the goal line (default: true)</li>
				<li><code>showdaily</code>: set to false if you don't want to see the daily words written bars (default: true)</li>
				<li><code>showtitle</code>: set to false if you don't want a title</li>
			</ul>
			All variables you don't define, will get the default value you inputted above.
			<br/>
			<h3>NaNoWidgets</h3>
			You can also easily add NaNoWriMo widgets to your site, using the following shortcodes:
			<br/>
			<table>
				<tr>
					<td>
						<code>[nanowidget_participant]</code><br/>
						Additional variables: <code>show_username</code>.
					</td>
					<td><img src="http://www.nanowrimo.org/widget/LiveParticipant/chris-baty.png"/></td>
				</tr>
				<tr>
					<td><code>[nanowidget_calendar showdays=true showpercent=true]</code></td>
					<td><img src="http://www.nanowrimo.org/widget/MyMonth/chris-baty,pc,days,wc.png"/></td>
				</tr>
				<tr>
					<td><code>[nanowidget_progress showdays=true showpercent=true showwords=true goal=100000 username=chris-baty]</code></td>
					<td><img src="http://www.nanowrimo.org/widget/graph/chris-baty,pc,days,goal=100000.png"/></td>
				</tr>
				<tr>
					<td><code>[nanowidget_wordwar showpercent=true username1=chris-baty username2=lindsey-grant]</code></td>
					<td><img src="http://www.nanowrimo.org/widget/WordWar/chris-baty,lindsey-grant,pc,wc.png"/></td>
				</tr>
				<tr>
					<td><code>[nanowidget_regionstatus showwords=true]</code></td>
					<td><img src="http://www.nanowrimo.org/widget/RegionStatus/europe-the-netherlands.png"/></td>
				</tr>
				<tr>
					<td><code>[nanowidget_regionwar showwords=true region1=europe-germany]</code></td>
					<td><img src="http://www.nanowrimo.org/widget/RegionWar/europe-germany,europe-the-netherlands.png"/></td>
				</tr>
			</table>
			All widgets have the following variables:
			<ul>
				<li><code>username</code>: override the default username setting (only for participant, calendar, progress and wordwar)</li>
				<li><code>region</code>: override the default region setting (only for regionstatus and regionwar)</li>
				<li><code>showpercent</code>: set to true if you want to see a percentage of your goal</li>
				<li><code>showdays</code>: set to true if you want to see which day of the month it is</li>
				<li><code>showwords</code>: set to true if you want the widget to display your wordcount</li>
				<li><code>goal</code>: give it a number to override the standard 50.000 words goal</li>
			</ul>
			<span style="color:#f00;">One of the variables <code>showpercent</code>, <code>showdays</code>, <code>showwords</code> should be set to true in every widget in order for the widget to work.</span>
			<br/>
			<h3>Plain-text NaNoWidgets</h3>
			In case you don't want images and stuff, but just some plain-text stats, use one of the following shortcodes:
			<ul>
				<li>
					<code>[nanostats_wordcount]</code>: will be replaced by your wordcount.
					Set the <code>username</code> variable to override the default.
				</li>
			</ul>
		</div>
		<div id="support">
			<h2>Support</h2>
			For support, drop me an email at <code>info (at) camilstaps (dot) nl</code>.
		</div>
	</div>
	<div style="width:25%;float:left;margin:0;padding:0;">
	</div>
</div>
