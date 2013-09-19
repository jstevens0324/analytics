<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jstevens
 * Date: 9/18/13
 * Time: 6:42 PM
 * To change this template use File | Settings | File Templates.
 */

session_start(); //start session
session_regenerate_id(); // generate session id
if(!isset($_SESSION['user'])) // if there is no valid session
{
    header("Location: index.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Information Center</title>

    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/custom.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script src="js/hideshow.js" type="text/javascript"></script>
    <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.equalHeight.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
            {
                $(".tablesorter").tablesorter();
            }
        );
        $(document).ready(function() {

            //When page loads...
            $(".tab_content").hide(); //Hide all content
            $("ul.tabs li:first").addClass("active").show(); //Activate first tab
            $(".tab_content:first").show(); //Show first tab content

            //On Click Event
            $("ul.tabs li").click(function() {

                $("ul.tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $(".tab_content").hide(); //Hide all tab content

                var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active ID content
                return false;
            });

        });
    </script>
    <script type="text/javascript">
        $(function(){
            $('.column').equalHeight();
        });
    </script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        function drawChart() {
            // Create and populate the data table.
            var option = {animation: {duration: 1000, easing: 'in'},
                vAxis: {title: "Income", minValue:0, maxValue:9000},
                hAxis: {title: "Day"}};
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'N');
            data.addColumn('number', 'Income');
            data.addRow(['Thu',  0]);
            data.addRow(['Fri',  0]);
            data.addRow(['Sat',  0]);
            data.addRow(['Mon',  0]);
            data.addRow(['Tue',  0]);
            data.addRow(['Wed',  0]);
            // Create and draw the visualization.
            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, option);
            data.setValue(0, 1, 8456);

            data.setValue(1, 1, 9100);

            data.setValue(2, 1, 1200);

            data.setValue(3, 1, 4100);

            data.setValue(4, 1, 3895);

            data.setValue(5, 1, 6200);

            chart.draw(data, option);

        }

        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
    </script>

    <script type="text/javascript">
        function drawChart() {
            // Create and populate the data table.
            var option = {animation: {duration: 1000, easing: 'linear'},
                vAxis: {title: "Visits", minValue:0, maxValue:700},
                hAxis: {title: "Day"}};
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'N');
            data.addColumn('number', 'Canine');
            data.addColumn('number', 'Feline');
            data.addRow(['Thu',  0, 0]);
            data.addRow(['Fri',  0, 0]);
            data.addRow(['Sat',  0, 0]);
            data.addRow(['Mon',  0, 0]);
            data.addRow(['Tue',  0, 0]);
            data.addRow(['Wed',  0, 0]);
            // Create and draw the visualization.
            var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
            chart.draw(data, option);
            data.setValue(0, 1, 400);
            data.setValue(0, 2, 50);

            data.setValue(1, 1, 600);
            data.setValue(1, 2, 100);

            data.setValue(2, 1, 500);
            data.setValue(2, 2, 45);

            data.setValue(3, 1, 715);
            data.setValue(3, 2, 102);

            data.setValue(4, 1, 200);
            data.setValue(4, 2, 20);

            data.setValue(5, 1, 600);
            data.setValue(5, 2, 100);

            chart.draw(data, option);

        }

        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
    </script>

    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Day', 'Canine', 'Feline'],
                ['Thu',  200,      44],
                ['Fri',  135,      22],
                ['Sat',  120,       13],
                ['Mon',  201,      17],
                ['Tue',  116,       7],
                ['Wed',  86,      4]
            ]);

            var options = {
                colors: ['red', 'blue'],
                hAxis: {title: 'Number of Visits'},
                vAxis: {minValue: 0}
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div15'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Types', 'Number Sent'],
                ['Emailed Reminder',     1800],
                ['Appointments',      600],
                ['Account Created',  425],
                ['Mailed Reminder', 2100],
                ['Newsletter',    650]
            ]);

            var options = {
                title: 'Outgoing Message Types'
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript" src="js/Chart.js"></script>
</head>


<body>
<header id="header">
    <hgroup>
        <h1 class="site_title"><a href="index.html">Columbia Animal Hospital</a></h1>
        <h2 class="section_title">Dashboard</h2>
    </hgroup>
</header> <!-- end of header bar -->

<section id="secondary_bar">
    <div class="user">
        <p>Jessica Krueger (<a href="#">3 Messages</a>)</p>
        <a class="logout_user" href="logout.php" title="Logout">Logout</a>
    </div>
    <div class="breadcrumbs_container">
        <article class="breadcrumbs"><a href="home.php">Infomation Center</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
    </div>
</section><!-- end of secondary bar -->

<aside id="sidebar" class="column">
    <form class="quick_search">
        <input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
    </form>
    <hr/>
    <h3>Analytics</h3>
    <ul class="toggle">
        <li class="icn_new_article"><a href="financial.php">Financial</a></li>
        <li class="icn_edit_article"><a href="#">Inventory</a></li>
        <li class="icn_categories"><a href="#">Retention</a></li>
        <li class="icn_tags"><a href="#">Marketing</a></li>
        <li class="icn_compliance"><a href="#">Compliance</a></li>
        <li class="icn_vpat"><a href="#">VPAT</a></li>
    </ul>
    <h3>Campaign</h3>
    <ul class="toggle">
        <li class="icn_template"><a href="#">Templates</a></li>
        <li class="icn_messages"><a href="#">Messages</a></li>
        <li class="icn_settings"><a href="#">Settings</a></li>
    </ul>
    <h3>Website</h3>
    <ul class="toggle">
        <li class="icn_create"><a href="#">Create</a></li>
        <li class="icn_manage"><a href="#">Manage</a></li>
        <li class="icn_upload"><a href="#">Upload</a></li>
        <li class="icn_data"><a href="#">Data</a></li>
        <li class="icn_history"><a href="#">History Filter</a></li>
    </ul>
    <h3>Social Media</h3>
    <ul class="toggle">
        <li class="icn_facebook"><a href="#">Facebook</a></li>
        <li class="icn_twitter"><a href="#">Twitter</a></li>
        <li class="icn_pinterest"><a href="#">Pinterest</a></li>
        <li class="icn_google"><a href="#">Google +</a></li>
    </ul>
    <!--        <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/PetWiseWebsites" data-widget-id="379686071656669184">Tweets by @PetWiseWebsites</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    -->
    <footer>
        <hr />
        <p><strong>Copyright &copy; 2013 AVImark / Henry Schein Animal Health</strong></p>
    </footer>
</aside><!-- end of sidebar -->

<section id="main" class="column">
<!--h4 class="alert_warning">You have inventory items that are ready for re-order<a href="#" style="float:right;margin-right:1%;">Click here to view</a></h4-->
<h4 class="alert_warning">You have new patient photos to approve<a href="#" style="float:right;margin-right:1%;">Click here to view</a></h4>
<h4 class="alert_warning">You have a new client to approve<a href="#" style="float:right;margin-right:1%;">Click here to view</a></h4>
<article class="module width_full">
    <header id="modules"><h2 class="section_title">Stats for Last 7 Days</h2></header>
    <div class="module_content">
        <article class="stats_graph">
            <div id="chart_div" style=" height: 240px;"></div>
            <div id="chart_div2" style="height: 240px;"></div>
        </article>
        <article class="stats_graph">
            <div id="chart_div3" style=" height: 240px;"></div>
            <div id="chart_div4" style="height: 240px;"></div>
        </article>
        <!--article class="stats_overview">
            <div class="overview_today">
                <p class="overview_day">Today</p>
                <p class="overview_count">$1,876.74</p>
                <p class="overview_type">Income</p>
                <p class="overview_count">28</p>
                <p class="overview_type">Visits</p>
            </div>
            <div class="overview_previous">
                <p class="overview_day">Yesterday</p>
                <p class="overview_count">$5,786.25</p>
                <p class="overview_type">Income</p>
                <p class="overview_count">89</p>
                <p class="overview_type">Visits</p>
            </div>
        </article-->
        <div class="clear"></div>
    </div>
</article><!-- end of stats article -->

<article class="module width_half">
    <header><h3>New Blog Post</h3></header>
    <div class="module_content">
        <fieldset>
            <label>Post Title</label>
            <input type="text">
        </fieldset>
        <fieldset>
            <label>Content</label>
            <textarea rows="12"></textarea>
        </fieldset>
        <fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
            <label>Category</label>
            <select style="width:92%;">
                <option>Upcoming events</option>
                <option>News</option>
                <option>Freebies</option>
            </select>
        </fieldset>
        <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
            <label>Tags</label>
            <input type="text" style="width:92%;">
        </fieldset><div class="clear"></div>
    </div>
    <footer>
        <div class="submit_link">
            <select>
                <option>Draft</option>
                <option>Published</option>
            </select>
            <input type="submit" value="Publish" class="alt_btn">
            <input type="submit" value="Reset">
        </div>
    </footer>
</article><!-- end of post new article -->

<article class="module width_half">
    <header><h3 class="tabs_involved">Content Manager</h3>
        <ul class="tabs">
            <li><a href="#tab1">Campaigns</a></li>
            <li><a href="#tab2">Templates</a></li>
        </ul>
    </header>
    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0">
                <thead>
                <tr>
                    <th></th>
                    <th>Campaign Name</th>
                    <th>Type</th>
                    <th>Created On</th>
                    <th>Active</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td>Flea/Tick Campaign</td>
                    <td>Reminder</td>
                    <td>08-30-2013</td>
                    <td>yes</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Dental Month</td>
                    <td>Marketing</td>
                    <td>07-25-2013</td>
                    <td>no</td>
                </tr>
                <tr>
                    <td></td>
                    <td>General Reminders</td>
                    <td>Reminder</td>
                    <td>07-09-2013</td>
                    <td>no</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Appointment Campaign</td>
                    <td>Appointments</td>
                    <td>09-16-2013</td>
                    <td>yes</td>
                </tr>
                </tbody>

            </table>
        </div><!-- end of #tab1 -->

        <div id="tab2" class="tab_content">
            <table class="tablesorter" cellspacing="0">
                <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Message Type</th>
                    <th>Delivery Type</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Email Reminder Template</td>
                    <td>Reminder</td>
                    <td>Email</td>
                    <td>05-14-2012</td>
                    <td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>SMS Reminder Template</td>
                    <td>Reminder</td>
                    <td>SMS</td>
                    <td>09-15-2013</td>
                    <td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Email Appointment Template</td>
                    <td>Appointment</td>
                    <td>Email</td>
                    <td>01-11-2013</td>
                    <td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>SMS Appointment Template</td>
                    <td>Appointment</td>
                    <td>SMS</td>
                    <td>05-14-2012</td>
                    <td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Create Acct</td>
                    <td>Account Creation</td>
                    <td>Email</td>
                    <td>11-09-2012</td>
                    <td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td>
                </tr>
                </tbody>
            </table>

        </div><!-- end of #tab2 -->

    </div><!-- end of .tab_container -->
    <footer></footer>
</article><!-- end of content manager article -->



<!--article class="module width_half">
    <header><h3>Twitter</h3></header>
    <div class="module_content">
        <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/PetWiseWebsites" data-widget-id="379686071656669184">Tweets by @PetWiseWebsites</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    </div>
</article><!-- end of styles article -->
<!--article class="module width_quarter">
    <header><h3>Messages</h3></header>
    <div class="message_list">
        <div class="module_content">
            <div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
            <p><strong>John Doe</strong></p></div>
            <div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
            <p><strong>John Doe</strong></p></div>
            <div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
            <p><strong>John Doe</strong></p></div>
            <div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
            <p><strong>John Doe</strong></p></div>
            <div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
            <p><strong>John Doe</strong></p></div>
        </div>
    </div>
    <footer>
        <form class="post_message">
            <input type="text" value="Message" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
            <input type="submit" class="btn_post_message" value=""/>
        </form>
    </footer>
</article--><!-- end of messages article -->

<div class="clear"></div>





<!--h4 class="alert_error">An Error Message</h4>

<h4 class="alert_success">A Success Message</h4-->


</section>


</body>

</html>