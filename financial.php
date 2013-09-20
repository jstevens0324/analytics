<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jstevens
 * Date: 9/16/13
 * Time: 3:13 PM
 * To change this template use File | Settings | File Templates.
 */


session_start(); //start session
session_regenerate_id(); // generate session id
if(!isset($_SESSION['user'])) // if there is no valid session
{
    header("Location: index.php");
}

include 'inc/functions.php';

$email = $_SESSION['user'];
$name = getName($email);
if(isset($name))
{
    $definitions = explode("*", $name);
    $userId = $definitions[0];
    $firstName = $definitions[1];
    $lastName = $definitions[2];

    $fullname = $firstName . ' ' . $lastName;
}

include 'header.php';
?>

<body>
    <header id="header">
        <hgroup>
            <h1 class="site_title"><a href="home.php">Columbia Animal Hospital</a></h1>
            <h2 class="section_title">Financial</h2>
        </hgroup>
    </header> <!-- end of header bar -->

    <section id="secondary_bar">
        <div class="user">
            <p><? echo $fullname ?> (<a href="#">3 Messages</a>)</p>
            <a class="logout_user" href="logout.php" title="Logout">Logout</a>
        </div>
        <div class="breadcrumbs_container">
            <article class="breadcrumbs">
                <a href="#">Infomation Center</a>
                <div class="breadcrumb_divider"></div>
                <a href="home.php">Dashboard</a>
                <div class="breadcrumb_divider"></div>
                <a class="current">Financial</a></article>
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
            <li class="icn_edit_article"><a href="try.html">Inventory</a></li>
            <li class="icn_categories"><a href="#">Retention</a></li>
            <li class="icn_tags"><a href="#">Marketing</a></li>
            <li class="icn_compliance"><a href="#">Compliance</a></li>
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
        <footer>
            <hr />
            <p><strong>Copyright &copy; 2013 AVImark / Henry Schein Animal Health</strong></p>
        </footer>
    </aside><!-- end of sidebar -->

    <!--section id="main" class="column">
        <article class="module width_full">
            <header id="modules"><h2 class="section_title">Stats</h2></header>
            <div class="module_content">
                <div class="testing">
                    <article class="stats_graph">
                        <div><h3>Hourly Transactions & Income</h3></div>
                        <div id="visualization" style="height: 400px;"></div>
                    </article>
                    <article class="stats_overview" style="margin-top: 30px;">
                        <div class="overview_today">
                            <p class="overview_day">Today</p>
                            <p class="overview_count">$676.74</p>
                            <p class="overview_type">Avg Hourly Income</p>
                            <p class="overview_count">8</p>
                            <p class="overview_type">Avg Hourly Visits</p>
                        </div>
                        <div class="overview_previous">
                            <p class="overview_day">Yesterday</p>
                            <p class="overview_count">$546.24</p>
                            <p class="overview_type">Avg Hourly Income</p>
                            <p class="overview_count">5</p>
                            <p class="overview_type">Avg Hourly Visits</p>
                        </div>
                    </article>
                    <article class="stats_overview" style="margin-top: 30px;">
                        <div class="overview_today">
                            <p class="overview_day">Last 365 Days</p>
                            <p class="overview_count">$448.52</p>
                            <p class="overview_type">Avg Hourly Income</p>

                        </div>
                        <div class="overview_previous">
                            <p class="overview_day">Last 365 Days</p>
                            <p class="overview_count">12</p>
                            <p class="overview_type">Avg Hourly Visits</p>
                        </div>
                    </article>
                        <!--div id="dashboard">
                            <table>
                                <tr style='vertical-align: top'>
                                    <td style='width: 300px; font-size: 0.9em;'>
                                        <div id="control1"></div>
                                        <div id="control2"></div>
                                        <div id="control3"></div>
                                    </td>
                                    <td style='width: 600px'>
                                        <div style="float: left;" id="chart1"></div>
                                        <div style="float: left;" id="chart2"></div>
                                        <div style="float: left;" id="chart3"></div>
                                    </td>
                                </tr>
                            </table>
                        </div-->
                        <!--div>The Original Data Table</div>
                        <div id="table"></div>
                        <br />
                        <div>A Data View Chart</div>
                        <div id="chart"></div>
                        <div></div>
                </div>
                <!--div class="testing">
                    <article class="stats_graph">
                        <!--div id="piechart" style="float:left;"></div>
                        <div style="margin-top: 20px;" ><h3>Invoices by Zip Code</h3></div>
                        <div id="visualization2" style="border: 1px solid black; width:100%"></div-->

                    <!--/article>
                    <article class="stats_graph_right">
                        <div style="margin-top: 20px; width:100%;" ><h3>Invoices by Zip Code</h3></div>
                        <div id="chart_div10" style=" width:100%;float:right;"></div>
                        <div id="piechart" style="float:left;"></div>
                    </article>
                </div>
                <div class="clear"></div>
            </div>
        </article><!-- end of stats article >

        <article class="module width_full">
            <header id="modules"><h2 class="section_title">Stats</h2></header>
            <div class="module_content">
                <div class="testing">
                    <article class="stats_graph">
                        <div><h3>Hourly Transactions & Income</h3></div>
                        <div id="chart_div3" style="100%; height: 400px;"></div>
                    </article>
                    <article class="stats_overview" style="margin-top: 30px;">
                        <div class="overview_today">
                            <p class="overview_day">Today</p>
                            <p class="overview_count">$676.74</p>
                            <p class="overview_type">Avg Hourly Income</p>
                            <p class="overview_count">8</p>
                            <p class="overview_type">Avg Hourly Visits</p>
                        </div>
                        <div class="overview_previous">
                            <p class="overview_day">Yesterday</p>
                            <p class="overview_count">$546.24</p>
                            <p class="overview_type">Avg Hourly Income</p>
                            <p class="overview_count">5</p>
                            <p class="overview_type">Avg Hourly Visits</p>
                        </div>
                    </article>
                    <article class="stats_overview" style="margin-top: 30px;">
                        <div class="overview_today">
                            <p class="overview_day">Last 365 Days</p>
                            <p class="overview_count">$448.52</p>
                            <p class="overview_type">Avg Hourly Income</p>

                        </div>
                        <div class="overview_previous">
                            <p class="overview_day">Last 365 Days</p>
                            <p class="overview_count">12</p>
                            <p class="overview_type">Avg Hourly Visits</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </div>
        </article><!-- end of stats article >


        <article class="module width_full">
            <header id="modules"><h2 class="section_title">Stats</h2></header>
            <div class="module_content">
                <div class="testing">
                    <article class="stats_graph">
                        <div><h3>Hourly Transactions & Income</h3></div>
                        <div id="comparison" style="width: 600px; height: 400px;"></div>
                    </article>
                    <article class="stats_overview" style="margin-top: 30px;">
                        <div class="overview_today">
                            <p class="overview_day">Today</p>
                            <p class="overview_count">$676.74</p>
                            <p class="overview_type">Avg Hourly Income</p>
                            <p class="overview_count">8</p>
                            <p class="overview_type">Avg Hourly Visits</p>
                        </div>
                        <div class="overview_previous">
                            <p class="overview_day">Yesterday</p>
                            <p class="overview_count">$546.24</p>
                            <p class="overview_type">Avg Hourly Income</p>
                            <p class="overview_count">5</p>
                            <p class="overview_type">Avg Hourly Visits</p>
                        </div>
                    </article>
                    <article class="stats_overview" style="margin-top: 30px;">
                        <div class="overview_today">
                            <p class="overview_day">Last 365 Days</p>
                            <p class="overview_count">$448.52</p>
                            <p class="overview_type">Avg Hourly Income</p>

                        </div>
                        <div class="overview_previous">
                            <p class="overview_day">Last 365 Days</p>
                            <p class="overview_count">12</p>
                            <p class="overview_type">Avg Hourly Visits</p>
                        </div>
                    </article>
                    <!--div id="dashboard">
                        <table>
                            <tr style='vertical-align: top'>
                                <td style='width: 300px; font-size: 0.9em;'>
                                    <div id="control1"></div>
                                    <div id="control2"></div>
                                    <div id="control3"></div>
                                </td>
                                <td style='width: 600px'>
                                    <div style="float: left;" id="chart1"></div>
                                    <div style="float: left;" id="chart2"></div>
                                    <div style="float: left;" id="chart3"></div>
                                </td>
                            </tr>
                        </table>
                    </div-->
                    <!--div>The Original Data Table</div>
                    <div id="table"></div>
                    <br />
                    <div>A Data View Chart</div>
                    <div id="chart"></div>
                    <div></div>
                </div>
                <!--div class="testing">
                    <article class="stats_graph">
                        <!--div id="piechart" style="float:left;"></div>
                        <div style="margin-top: 20px;" ><h3>Invoices by Zip Code</h3></div>
                        <div id="visualization2" style="border: 1px solid black; width:100%"></div-->

                <!--/article>
                <article class="stats_graph_right">
                    <div style="margin-top: 20px; width:100%;" ><h3>Invoices by Zip Code</h3></div>
                    <div id="chart_div10" style=" width:100%;float:right;"></div>
                    <div id="piechart" style="float:left;"></div>
                </article>
            </div>
                <div class="clear"></div>
            </div>
        </article><!-- end of stats article >



        <div class="clear"></div>
    </section-->
    <section id="main" class="column">
    <!--h4 class="alert_warning">You have inventory items that are ready for re-order<a href="#" style="float:right;margin-right:1%;">Click here to view</a></h4-->
    <article class="module width_full">
        <header id="modules">
            <h2 class="section_title">Hourly Transactions & Income</h2>
        </header>
        <div class="module_content">
            <div class="select_me">
                <select>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="last30">Last 30 Days</option>
                    <option value="last60">Last 60 Days</option>
                    <option value="last90">Last 90 Days</option>
                    <option value="last180">Last 180 Days</option>
                    <option value="lastYear">Last Year</option>
                    <option value="lastFiveYears">Last 5 Years</option>
                </select>
            </div>
            <article class="stats_graph">
                <div id="visualization" style="height: 400px;"></div>
            </article>
            <article class="stats_overview" style="margin-top: 30px;">
                <div class="overview_today">
                    <p class="overview_day">Today</p>
                    <p class="overview_count">$676.74</p>
                    <p class="overview_type">Avg Hourly Income</p>
                    <p class="overview_count">8</p>
                    <p class="overview_type">Avg Hourly Visits</p>
                </div>
                <div class="overview_previous">
                    <p class="overview_day">Yesterday</p>
                    <p class="overview_count">$546.24</p>
                    <p class="overview_type">Avg Hourly Income</p>
                    <p class="overview_count">5</p>
                    <p class="overview_type">Avg Hourly Visits</p>
                </div>
            </article>
            <article class="stats_overview" style="margin-top: 30px;">
                <div class="overview_today">
                    <p class="overview_day">Last 365 Days</p>
                    <p class="overview_count">$448.52</p>
                    <p class="overview_type">Avg Hourly Income</p>

                </div>
                <div class="overview_previous">
                    <p class="overview_day">Last 365 Days</p>
                    <p class="overview_count">12</p>
                    <p class="overview_type">Avg Hourly Visits</p>
                </div>
            </article>
            <div class="clear"></div>
        </div>
        <footer></footer>
    </article><!-- end of stats article -->

    <article class="module width_full">
        <header id="modules"><h2 class="section_title">Information by Zipcode</h2></header>
        <div class="module_content">
            <div class="select_me">
                <select>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="yesterday">Current Week</option>
                    <option value="yesterday">Last Week</option>
                    <option value="yesterday" selected>Last Two Weeks</option>
                    <option value="last30">Last 30 Days</option>
                    <option value="last60">Last 60 Days</option>
                    <option value="last90">Last 90 Days</option>
                    <option value="last180">Last 180 Days</option>
                    <option value="lastYear">Last Year</option>
                    <option value="lastFiveYears">Last 5 Years</option>
                </select>
            </div>
            <div class="testing">
                <div class="testing_half">
                    <div id="chart_div3" style="height: 400px;"></div>
                </div>
                <div class="testing_half">
                    <div id="chart_div12" style="height: 400px;"></div>
                </div>
                <div class="testing">
                    <div id="chart_div10" style="height: 400px;"></div>
                </div>
            </div>
            <!--article class="stats_overview" style="margin-top: 30px;">
                <div class="overview_today">
                    <p class="overview_day">Today</p>
                    <p class="overview_count">$676.74</p>
                    <p class="overview_type">Avg Hourly Income</p>
                    <p class="overview_count">8</p>
                    <p class="overview_type">Avg Hourly Visits</p>
                </div>
                <div class="overview_previous">
                    <p class="overview_day">Yesterday</p>
                    <p class="overview_count">$546.24</p>
                    <p class="overview_type">Avg Hourly Income</p>
                    <p class="overview_count">5</p>
                    <p class="overview_type">Avg Hourly Visits</p>
                </div>
            </article>
            <article class="stats_overview" style="margin-top: 30px;">
                <div class="overview_today">
                    <p class="overview_day">Last 365 Days</p>
                    <p class="overview_count">$448.52</p>
                    <p class="overview_type">Avg Hourly Income</p>

                </div>
                <div class="overview_previous">
                    <p class="overview_day">Last 365 Days</p>
                    <p class="overview_count">12</p>
                    <p class="overview_type">Avg Hourly Visits</p>
                </div>
            </article-->
            <div class="clear"></div>
        </div>
        <footer></footer>
    </article><!-- end of stats article -->

    <article class="module width_full">
        <header id="modules"><h2 class="section_title">Company Performance</h2></header>
        <div class="module_content">
            <div class="select_me">
                <select>
                    <option value="last90" selected>Last 90 Days</option>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="last30">Last 30 Days</option>
                    <option value="last60">Last 60 Days</option>
                    <option value="last180">Last 180 Days</option>
                    <option value="lastYear">Last Year</option>
                    <option value="lastFiveYears">Last 5 Years</option>
                </select>
            </div>
            <div class="testing">
                <div id="comparison" style="height: 400px; width: 50%; float: left;"></div>
                <div id='gauge' style="height: 400px; float: right;"></div>
            </div>
            <div class="testing">
                <div id="comparison2" style="height: 400px; width: 50%; float: left;"></div>
                <div id='gauge2' style="height: 400px; float: right;"></div>
            </div>
            <div class="clear"></div>
        </div>
        <footer></footer>
    </article><!-- end of stats article -->

        <article class="module width_full">
            <header id="modules"><h2 class="section_title">Company Performance</h2></header>
            <div class="module_content">
                <div class="select_me">
                    <select>
                        <option value="last90">Last 90 Days</option>
                        <option value="today">Today</option>
                        <option value="yesterday">Yesterday</option>
                        <option value="last30">Last 30 Days</option>
                        <option value="last60">Last 60 Days</option>
                        <option value="last180" selected>Last 180 Days</option>
                        <option value="lastYear">Last Year</option>
                        <option value="lastFiveYears">Last 5 Years</option>
                    </select>
                </div>
                <div class="testing">
                    <div class="testing_half">
                        <h3 style="width: 100%; float: left;">Last 180 Days Treatments</h3>
                        <div id="table" style="width: 100%; height: 400px; float: left;"></div>
                    </div>
                    <div class="testing_half">
                        <h3 style="width: 100%; float: left;">Last 180 Days Inventory</h3>
                        <div id='table2' style="width: 100%; height: 400px; float: left;"></div>
                    </div>
                </div>
                <div class="testing">
                    <div class="testing_half">
                        <h3 style="width: 50%; float: left;">365 - 180 Days Treatments</h3>
                        <div id="table3" style="width: 100%; height: 400px; float: left;"></div>
                    </div>
                    <div class="testing_half">
                        <h3 style="width: 50%; float: left;">365 - 180 Days Inventory</h3>
                        <div id='table4' style="width: 100%; height: 400px; float: left;"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <footer></footer>
        </article><!-- end of stats article -->
    <div class="clear"></div>





    <!--h4 class="alert_error">An Error Message</h4>

    <h4 class="alert_success">A Success Message</h4-->


    </section>
</body>
</html>