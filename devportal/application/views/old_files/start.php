<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Developer Documentation</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../plugins/prism/prism.css">
    <link rel="stylesheet" href="../plugins/elegant_font/css/style.css">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="../css/style_dev.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="body-green">
    <div class="page-wrapper">
        <!-- ******Header****** -->
        <header id="header" class="header">
            <div class="container">
                <div class="branding">
                    <h1 class="logo">
                        <a href="../dev">
                            <span aria-hidden="true" class="icon_documents_alt icon"></span>
                            <span class="text-highlight">Certus Dev</span><span class="text-bold">Docs</span>
                        </a>
                    </h1>
                </div><!--//branding-->
                <ol class="breadcrumb">
                    <li><a href="../dev">Home</a></li>
                    <li class="active">Quick Start</li>
                </ol>
            </div><!--//container-->
        </header><!--//header-->
        <div class="doc-wrapper">
            <div class="container">
                <div id="doc-header" class="doc-header text-center">
                    <h1 class="doc-title"><i class="icon fa fa-paper-plane"></i> Quick Start</h1>
                    <div class="meta"><i class="fa fa-clock-o"></i> Last updated: Apr 30th, 2018</div>
                </div><!--//doc-header-->
                <div class="doc-body">
                    <div class="doc-content">
                        <div class="content-inner">
                            <section id="download-section" class="doc-section">
                                <h2 class="section-title">Download</h2>
                                <div class="section-block">
                                <div id="step1"  class="section-block">
                                    <h3 class="block-title">Sourcetree</h3>
                                    <p>Download sourcetree <a href="https://www.sourcetreeapp.com"> here!</a>
                                    </p>
                                    <h3 class="block-title">XAMPP</h3>
                                    <p>Download XAMPP 5.6.35 / PHP 5.6.35 <a href="https://www.apachefriends.org/download.html"> here!</a>
                                    </p>
                                </div><!--//section-block-->

                                </div>
                            </section><!--//doc-section-->
                            <section id="installation-section" class="doc-section">
                                <h2 class="section-title">Setup</h2>
                                <div id="git_repo"  class="section-block">
                                    <h3 class="block-title">Git Repo</h3>
                                    <p>All of our application files are stored on github. Below are the instructions to download the repo on your personal computer!
                                    </p>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h6>Git</h6>
                                            <ol class="list">
                                              <li>Open sourcetree.</li>
                                              <li>At the top of sorcetree click: "+ New..."</li>
                                              <li>In the drop down click: "Clone from URL"
                                                <ul>
                                                  <li>Source URL: https://github.com/certus-applications/certus-applications.git</li>
                                                  <li>Desitnation Path: /Users/your_username/Desktop</li>
                                                    <ul>Click "..."</ul>
                                                    <ul>Click "New folder"</ul>
                                                    <ul>Name your folder "certus" and click create</ul>
                                                    <ul>Click "Open"</ul>
                                                  <li>Name: certus</li>
                                                </ul>
                                              </li>
                                              <li>See screenshot below:</li>
                                            </ol>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <img class="img-responsive" src="/img/sourcetree.jpg">
                                            </div>
                                        </div>
                                    </div><!--//row-->
                                </div><!--//section-block-->
                                <div id="xampp"  class="section-block">
                                    <h3 class="block-title">XAMPP</h3>
                                    <p>We use XAMPP as our Apache HTTP Server.
                                    </p>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h6>XAMPP</h6>
                                            <ol class="list">
                                              <li>Open the new downloaded file and follow the set up wizard.</li>
                                              <li>If on a MAC navigate to applications then to XAMPP.</li>
                                              <li>Open manager-osx.</li>
                                              <li>At the top click manage servers.</li>
                                              <li>Then click Start All.</li>
                                              <li>Set up your virtual host on XAMPP:
                                                <ul>
                                                  <li>If on MAC go to Applications > XAMPP > etc > extra > httpd-vhosts.conf (open the file in sublime or atom)</li>
                                                  <li>Copy the following code:</li>
                                                  <pre><code class="language-markup">&#x3C;VirtualHost *:80&#x3E;
  ServerName certus.local
  DocumentRoot &#x22;/Users/jlamba/Documents/certus&#x22;
  &#x3C;Directory &#x22;/Users/jlamba/Documents/certus&#x22;&#x3E;
      Options Indexes FollowSymLinks Includes execCGI
      AllowOverride All
      Require all granted
  &#x3C;/Directory&#x3E;
&#x3C;/VirtualHost&#x3E;</code></pre>
                                                  <li>Note for Directory and Document root the value needs to be the location where you saved the certus git repo.</li>
                                                </ul>
                                              </li>
                                              <li>Set up your virtual host in Terminal:
                                                <ul>
                                                  <li>If on MAC go to Applications > Utilities > Terminal
                                                  <li>In terminal type the following:</li>
                                                    <ul>sudo nano /etc/hosts (make sure to add a space after nano)</ul>
                                                    <ul>After type the following code:</ul>
                                                  <pre><code class="language-markup">127.0.0.1       certus.local</code></pre>
                                                    <ul> To exit press Control - X and then Y</ul>
                                                </ul>
                                              </li>
                                              <!-- <li>Now go to Applications > XAMPP > etc > extra > httpd.conf (open the file in sublime or atom) and type in the following code:</li> -->

                                              <li>See screenshot below to set up virtual host:</li>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <img class="img-responsive" src="/img/vhost.jpg">
                                              </div>
                                              <li>Open manager-osx again.</li>
                                              <li>At the top click manage servers.</li>
                                              <li>Now click Restart All.</li>
                                              <li>Lastly, go to any browswer and type in: http://certus.local. This is where you will be able to see your changes locally on your computer.</li>
                                            </ol>
                                    </div><!--//row-->
                                </div><!--//section-block-->

                            </section><!--//doc-section-->

                        </div><!--//content-inner-->
                    </div><!--//doc-content-->
                    <div class="doc-sidebar hidden-xs">
                        <nav id="doc-nav">
                            <ul id="doc-menu" class="nav doc-menu" data-spy="affix">
                                <li><a class="scrollto" href="#download-section">Download</a></li>
                                <li>
                                    <a class="scrollto" href="#installation-section">Setup</a>
                                    <ul class="nav doc-sub-menu">
                                        <li><a class="scrollto" href="#git_repo">Git Repo</a></li>
                                        <li><a class="scrollto" href="#xampp">XAMPP</a></li>
                                    </ul><!--//nav-->
                                </li>
                            </ul><!--//doc-menu-->
                        </nav>
                    </div><!--//doc-sidebar-->
                </div><!--//doc-body-->
            </div><!--//container-->
        </div><!--//doc-wrapper-->
    </div><!--//page-wrapper-->

    <footer id="footer" class="footer text-center">
        <div class="container">
            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
            <small class="copyright">Designed with <i class="fa fa-heart"></i> by Jas</small>
        </div><!--//container-->
    </footer><!--//footer-->


    <!-- Main Javascript -->
    <script type="text/javascript" src="../plugins/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="../plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../plugins/prism/prism.js"></script>
    <script type="text/javascript" src="../plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="../plugins/jquery-match-height/jquery.matchHeight-min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>

</body>
</html>

