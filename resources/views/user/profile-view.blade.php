<!DOCTYPE html>
<html lang="en">


 <head>
    <meta charset="UTF-8">
    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $page_title or "Blood Donation | user" }}</title>
    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset ("public/user/images/resources/favicon.png") }}" sizes="16x16">
    <!-- master stylesheet -->
    <link rel="stylesheet" href="{{ asset("public/user/css/style.css") }}">
    <link href="{{ asset ("public/user/css/orange.css") }}" rel="stylesheet" title="Orange color"> 
    <link rel="stylesheet" href="{{ asset("public/user/css/blue.css")}}" > 
    <link rel="stylesheet" href="{{ asset ("public/user/css/config.css") }}"> 
    <link href="{{ asset ("public/user/css/orange.css") }}" rel="alternate stylesheet" title="Orange color">      
    <link rel="stylesheet" href="{{ asset ("public/user/css/responsive.css") }}"> 
    <link rel="stylesheet" href="{{ asset ("public/user/css/bootstrap-margin-padding.css") }}">
    <style type="text/css">
    	
.title{
 margin-left:20px
}

.fa-user{
 font-size:80px   
}

.searchable-container{
    margin-top:40px;
}

.glyphicon-lg{
    font-size:4em
}
.info-block{
    border-right:5px solid #E6E6E6;margin-bottom:25px
}
.info-block .square-box {
    width:120px;
    min-height:120px;
    margin-right:22px;
    text-align:center!important;
    background-color:#676767;
    padding:20px 0
}
.info-block:hover .info-block.block-info {
    border-color:#20819e
}

.info-block.block-info .square-box {
    background-color:#5bc0de;
    color:#FFF
}
 
body{margin-top:20px;
background:#eee;
}

.btn-compose-email {
    padding: 10px 0px;
    margin-bottom: 20px;
}

.btn-danger {
    background-color: #E9573F;
    border-color: #E9573F;
    color: white;
}

.panel-teal .panel-heading {
    background-color: #37BC9B;
    border: 1px solid #36b898;
    color: white;
}

.panel .panel-heading {
    padding: 5px;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
    border-bottom: 1px solid #DDD;
    -moz-border-radius: 0px;
    -webkit-border-radius: 0px;
    border-radius: 0px;
}

.panel .panel-heading .panel-title {
    padding: 10px;
    font-size: 17px;
}

form .form-group {
    position: relative;
    margin-left: 0px !important;
    margin-right: 0px !important;
}

.inner-all {
    padding: 10px;
}

/* ========================================================================
 * MAIL
 * ======================================================================== */
.nav-email > li:first-child + li:active {
  margin-top: 0px;
}
.nav-email > li + li {
  margin-top: 1px;
}
.nav-email li {
  background-color: white;
}
.nav-email li.active {
  background-color: transparent;
}
.nav-email li.active .label {
  background-color: white;
  color: black;
}
.nav-email li a {
  color: black;
  -moz-border-radius: 0px;
  -webkit-border-radius: 0px;
  border-radius: 0px;
}
.nav-email li a:hover {
  background-color: #EEEEEE;
}
.nav-email li a i {
  margin-right: 5px;
}
.nav-email li a .label {
  margin-top: -1px;
}

.table-email tr:first-child td {
  border-top: none;
}
.table-email tr td {
  vertical-align: top !important;
}
.table-email tr td:first-child, .table-email tr td:nth-child(2) {
  text-align: center;
  width: 35px;
}
.table-email tr.unread, .table-email tr.selected {
  background-color: #EEEEEE;
}
.table-email .media {
  margin: 0px;
  padding: 0px;
  position: relative;
}
.table-email .media h4 {
  margin: 0px;
  font-size: 14px;
  line-height: normal;
}
.table-email .media-object {
  width: 35px;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
}
.table-email .media-meta, .table-email .media-attach {
  font-size: 11px;
  color: #999;
  position: absolute;
  right: 10px;
}
.table-email .media-meta {
  top: 0px;
}
.table-email .media-attach {
  bottom: 0px;
}
.table-email .media-attach i {
  margin-right: 10px;
}
.table-email .media-attach i:last-child {
  margin-right: 0px;
}
.table-email .email-summary {
  margin: 0px 110px 0px 0px;
}
.table-email .email-summary strong {
  color: #333;
}
.table-email .email-summary span {
  line-height: 1;
}
.table-email .email-summary span.label {
  padding: 1px 5px 2px;
}
.table-email .ckbox {
  line-height: 0px;
  margin-left: 8px;
}
.table-email .star {
  margin-left: 6px;
}
.table-email .star.star-checked i {
  color: goldenrod;
}

.nav-email-subtitle {
  font-size: 15px;
  text-transform: uppercase;
  color: #333;
  margin-bottom: 15px;
  margin-top: 30px;
}

.compose-mail {
  position: relative;
  padding: 15px;
}
.compose-mail textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #DDD;
}

.view-mail {
  padding: 10px;
  font-weight: 300;
}

.attachment-mail {
  padding: 10px;
  width: 100%;
  display: inline-block;
  margin: 20px 0px;
  border-top: 1px solid #EFF2F7;
}
.attachment-mail p {
  margin-bottom: 0px;
}
.attachment-mail a {
  color: #32323A;
}
.attachment-mail ul {
  padding: 0px;
}
.attachment-mail ul li {
  float: left;
  width: 200px;
  margin-right: 15px;
  margin-top: 15px;
  list-style: none;
}
.attachment-mail ul li a.atch-thumb img {
  width: 200px;
  margin-bottom: 10px;
}
.attachment-mail ul li a.name span {
  float: right;
  color: #767676;
}

@media (max-width: 640px) {
  .compose-mail-wrapper .compose-mail {
    padding: 0px;
  }
}
@media (max-width: 360px) {
  .mail-wrapper .panel-sub-heading {
    text-align: center;
  }
  .mail-wrapper .panel-sub-heading .pull-left, .mail-wrapper .panel-sub-heading .pull-right {
    float: none !important;
    display: block;
  }
  .mail-wrapper .panel-sub-heading .pull-right {
    margin-top: 10px;
  }
  .mail-wrapper .panel-sub-heading img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 10px;
  }
  .mail-wrapper .panel-footer {
    text-align: center;
  }
  .mail-wrapper .panel-footer .pull-right {
    float: none !important;
    margin-left: auto;
    margin-right: auto;
  }
  .mail-wrapper .attachment-mail ul {
    padding: 0px;
  }
  .mail-wrapper .attachment-mail ul li {
    width: 100%;
  }
  .mail-wrapper .attachment-mail ul li a.atch-thumb img {
    width: 100% !important;
  }
  .mail-wrapper .attachment-mail ul li .links {
    margin-bottom: 20px;
  }

  .compose-mail-wrapper .search-mail input {
    width: 130px;
  }
  .compose-mail-wrapper .panel-sub-heading {
    padding: 10px 7px;
  }
}

  
.comment-list .row {
  margin-bottom: 0px;
}
.comment-list .panel .panel-heading {
  padding: 4px 15px;
  position: absolute;
  border:none;
  /*Panel-heading border radius*/
  border-top-right-radius:0px;
  top: 1px;
}
.comment-list .panel .panel-heading.right {
  border-right-width: 0px;
  /*Panel-heading border radius*/
  border-top-left-radius:0px;
  right: 16px;
}
.comment-list .panel .panel-heading .panel-body {
  padding-top: 6px;
}
.comment-list figcaption {
  /*For wrapping text in thumbnail*/
  word-wrap: break-word;
}
/* Portrait tablets and medium desktops */
@media (min-width: 768px) {
  .comment-list .arrow:after, .comment-list .arrow:before {
    content: "";
    position: absolute;
    width: 0;
    height: 0;
    border-style: solid;
    border-color: transparent;
  }
  .comment-list .panel.arrow.left:after, .comment-list .panel.arrow.left:before {
    border-left: 0;
  }
  /*****Left Arrow*****/
  /*Outline effect style*/
  .comment-list .panel.arrow.left:before {
    left: 0px;
    top: 30px;
    /*Use boarder color of panel*/
    border-right-color: inherit;
    border-width: 16px;
  }
  /*Background color effect*/
  .comment-list .panel.arrow.left:after {
    left: 1px;
    top: 31px;
    /*Change for different outline color*/
    border-right-color: #FFFFFF;
    border-width: 15px;
  }
  /*****Right Arrow*****/
  /*Outline effect style*/
  .comment-list .panel.arrow.right:before {
    right: -16px;
    top: 30px;
    /*Use boarder color of panel*/
    border-left-color: inherit;
    border-width: 16px;
  }
  /*Background color effect*/
  .comment-list .panel.arrow.right:after {
    right: -14px;
    top: 31px;
    /*Change for different outline color*/
    border-left-color: #FFFFFF;
    border-width: 15px;
  }
}
.comment-list .comment-post {
  margin-top: 6px;
}

  

.page-header{
  text-align: center;    
}

/*social buttons*/
.btn-social{
  color: white;
  opacity:0.9;
}
.btn-social:hover {
  color: white;
    opacity:1;
}
.btn-facebook {
background-color: #3b5998;
opacity:0.9;
}
.btn-twitter {
background-color: #00aced;
opacity:0.9;
}
.btn-linkedin {
background-color:#0e76a8;
opacity:0.9;
}
.btn-github{
  background-color:#000000;
  opacity:0.9;
}
.btn-google {
  background-color: #c32f10;
  opacity: 0.9;
}
.btn-stackoverflow{
  background-color: #D38B28;
  opacity: 0.9;
}

/* resume stuff */

.bs-callout {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: #eee;
    border-image: none;
    border-radius: 3px;
    border-style: solid;
    border-width: 1px 1px 1px 5px;
    margin-bottom: 5px;
    padding: 20px;
}
.bs-callout:last-child {
    margin-bottom: 0px;
}
.bs-callout h4 {
    margin-bottom: 10px;
    margin-top: 0;
}

.bs-callout-danger {
    border-left-color: #d9534f;
}

.bs-callout-danger h4{
    color: #d9534f;
}

.resume .list-group-item:first-child, .resume .list-group-item:last-child{
  border-radius:0;
}

/*makes an anchor inactive(not clickable)*/
.inactive-link {
   pointer-events: none;
   cursor: default;
}

.resume-heading .social-btns{
  margin-top:15px;
}
.resume-heading .social-btns i.fa{
  margin-left:-5px;
}



@media (max-width: 992px) {
  .resume-heading .social-btn-holder{
    padding:5px;
  }
}


 
.progress-bar {
    text-align: left;
    white-space: nowrap;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	cursor: pointer;
}

.progress-bar > .progress-type {
	padding-left: 10px;
}

.progress-meter {
	min-height: 15px;
	border-bottom: 2px solid rgb(160, 160, 160);
  margin-bottom: 15px;
}

.progress-meter > .meter {
	position: relative;
	float: left;
	min-height: 15px;
	border-width: 0px;
	border-style: solid;
	border-color: rgb(160, 160, 160);
}

.progress-meter > .meter-left {
	border-left-width: 2px;
}

.progress-meter > .meter-right {
	float: right;
	border-right-width: 2px;
}

.progress-meter > .meter-right:last-child {
	border-left-width: 2px;
}

.progress-meter > .meter > .meter-text {
	position: absolute;
	display: inline-block;
	bottom: -20px;
	width: 100%;
	font-weight: 700;
	font-size: 0.85em;
	color: rgb(160, 160, 160);
	text-align: left;
}

.progress-meter > .meter.meter-right > .meter-text {
	text-align: right;
}      
    </style>
</head>

<body>
<div class="se-pre-con"></div>
 <div class="top-bar hidden-xs ">
        <div class="container">
            <div class="social-icons pull-left">
                <ul>
                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
            <!-- /.social-icons -->
            <div class="social-icons pull-right">
                <ul><li>
                        <form class="form-inline" action="" method="post">
                          <input type="text" class="form-control" name="username" placeholder="Email">  
                          <input type="password" class="form-control" name="password" placeholder="Password">
                          <input type="submit" class="form-control" name="submit" value="Login">
                        </form> 
                    </li>
                    <li><a href="{{ url('/project') }}">Support</a></li>
                    <li><a href="{{url('/FAQ')}}">Faq</a></li>
                    <li><a href="{{ url('/project') }}">Help</a></li>
                    <li><a href="{{ url('/search') }}">Search</a></li>
                </ul>
            </div>
            <!-- /.left-text -->
        </div>
    </div> 
    <!-- /.top-bar -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <a href="{{url('/')}}">
                        <div class="logo">
                                <img src="{{ asset ("public/user/images/resources/logo.png") }}" alt="Awesome Image" />
                        </div>  
                    </a>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 hidden-xs ">
                    <div class="header-right-info pull-right sm-pull-none clearfix">
                        <div class="single-header-info pb-sm-20">
                            <div class="icon-box">
                                <div class="inner-box">
                                    <i class="flaticon-interface-2"></i>
                                </div>
                            </div>
                            <div class="content">
                                <h3>EMAIL</h3>
                                <p>info@example.com</p>
                            </div>
                        </div>
                        <div class="single-header-info">
                            <div class="icon-box">
                                <div class="inner-box">
                                    <i class="flaticon-telephone"></i>
                                </div>
                            </div>
                            <div class="content">
                                <h3>Call Now</h3>
                                <p><b> 00 1111 2222</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- /.header -->

    <nav class="mainmenu-area stricky">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div class="nav-header pull-left">
                            <ul>
                                <li class="dropdown">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                              <li class="dropdown">
                                    <a href="{{ url('/aboutus') }}">About Us</a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('/WhoWeAre') }}">Who we are</a></li>
                                        <li><a href="{{ url('/vmv') }}">Vision, Mission, Values</a></li>
                                        <li><a href="#">Message from our CEO</a></li>
                                        <li><a href="#">Our Donation Policy</a></li>
                                        <li><a href="{{ url('/FAQ') }}">FAQ’s</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('/project') }}">Projects</a></li>
                                <li><a href="{{ url('/gallery') }}">Galleries</a></li>
                                <li><a href="{{ url('/donate') }}">Donate</a></li>
                                <li><a href="{{ url('/contact') }}">Contact</a></li>
                                <li><a href="{{ url('/login') }}">Login</a></li>
                              <li class="dropdown">
                                    <a href="{{ url('/') }}">Profile</a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('/profile') }}">Update Profile</a></li>
                                        <li><a href="{{ url('/my-profile') }}">View Profile</a></li> 
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="donate-col col-xs-12 col-sm-12 col-lg-3 col-md-3">
                    <div class="donate-btn clearfix">
                        <!-- Modal: donate now Starts -->
                        <a style="margin-right: 2px;" class="thm-btn pull-right" data-toggle="modal" href="#be_donor"><i class="fa fa-user-plus"></i></a>
                       

                        <div class="nav-footer pull-left">
                            <button class="pull-left"><i class="fa fa-bars"></i></button>
                            <a class="thm-btn"  data-toggle="modal" href="#user_login"><i class="fa fa-lock"></i></a> 

                        </div>
                        
                                                
                    </div>
                </div>
                
            </div>
        </div>
    </nav>
     
</head>
<body>



<div class="container">
<div class="row">
    <div class="col-sm-3">
        <a href="mail-compose.html" class="btn btn-danger btn-block btn-compose-email">Compose Email</a>
        <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
            <li class="active">
                <a href="#mail-inbox.html">
                    <i class="fa fa-inbox"></i> Inbox  <span class="label pull-right">7</span>
                </a>
            </li>
            <li>
                <a href="#mail-compose.html"><i class="fa fa-envelope-o"></i> Send Mail</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-certificate"></i> Important</a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-file-text-o"></i> Drafts <span class="label label-info pull-right inbox-notification">35</span>
                </a>
            </li>
            <li><a href="#"> <i class="fa fa-trash-o"></i> Trash</a></li>
        </ul><!-- /.nav -->

        <h5 class="nav-email-subtitle">More</h5>
        <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
            <li>
                <a href="#">
                    <i class="fa fa-folder-open"></i> Promotions  <span class="label label-danger pull-right">3</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-folder-open"></i> Job list
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-folder-open"></i> Backup
                </a>
            </li>
        </ul><!-- /.nav -->
    </div>
    <div class="col-sm-9">
        
        <!-- resumt -->
        <div class="panel panel-default">
               <div class="panel-heading resume-heading">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="col-xs-12 col-sm-4">
                           <figure>
                              <img class="img-circle img-responsive" alt="" src="http://placehold.it/300x300">
                           </figure>
                           <div class="row">
                              <div class="col-xs-12 social-btns">
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-google">
                                    <i class="fa fa-google"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-facebook">
                                    <i class="fa fa-facebook"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-twitter">
                                    <i class="fa fa-twitter"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-linkedin">
                                    <i class="fa fa-linkedin"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-github">
                                    <i class="fa fa-github"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-stackoverflow">
                                    <i class="fa fa-stack-overflow"></i> </a>
                                 </div>
                              </div>
                              
                              
                           </div>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                           <ul class="list-group">
                              <li class="list-group-item">John Doe</li>
                              <li class="list-group-item">Software Engineer</li>
                              <li class="list-group-item">Google Inc. </li>
                              <li class="list-group-item"><i class="fa fa-phone"></i> 000-000-0000 </li>
                              <li class="list-group-item"><i class="fa fa-envelope"></i> john@example.com</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="bs-callout bs-callout-danger">
                  <h4>Summary</h4>
                  <p>
                     Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. Quis verear mel ne. Munere vituperata vis cu, 
                     te pri duis timeam scaevola, nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                  </p>
                  <p>
                     Odio recteque expetenda eum ea, cu atqui maiestatis cum. Te eum nibh laoreet, case nostrud nusquam an vis. 
                     Clita debitis apeirian et sit, integre iudicabit elaboraret duo ex. Nihil causae adipisci id eos.
                  </p>
               </div>
               <div class="bs-callout bs-callout-danger">
                  <h4>Research Interests</h4>
                  <p>
                     Software Engineering, Machine Learning, Image Processing,
                     Computer Vision, Artificial Neural Networks, Data Science,
                     Evolutionary Algorithms.
                  </p>
               </div>
               <div class="bs-callout bs-callout-danger">
                  <h4>Prior Experiences</h4>
                  <ul class="list-group">
                     <a class="list-group-item inactive-link" href="#">
                        <h4 class="list-group-item-heading">
                           Software Engineer at Twitter
                        </h4>
                        <p class="list-group-item-text">
                           Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. Quis verear mel ne. Munere vituperata vis cu, 
                           te pri duis timeam scaevola, nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                        </p>
                     </a>
                     <a class="list-group-item inactive-link" href="#">
                        <h4 class="list-group-item-heading">Software Engineer at LinkedIn</h4>
                        <p class="list-group-item-text">
                           Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. 
                           Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola, 
                           nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                        </p>
                        <ul>
                           <li>
                              Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. 
                              Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola, 
                              nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                           </li>
                           <li>
                              Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. 
                              Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola, 
                              nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                           </li>
                        </ul>
                        <p></p>
                     </a>
                  </ul>
               </div>
               <div class="bs-callout bs-callout-danger">
                  <h4>Key Expertise</h4>
                  <ul class="list-group">
                     <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc </li>
                     <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                     <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                     <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                     <li class="list-group-item">Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                     <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                  </ul>
               </div>
               <div class="bs-callout bs-callout-danger">
                  <h4>Language and Platform Skills</h4>
                  <ul class="list-group">
                     <a class="list-group-item inactive-link" href="#">
                        <div class="progress">
                           <div data-placement="top" style="width: 80%;" 
                              aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">80%</span>
                              <span class="progress-type">Java/ JavaEE/ Spring Framework </span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">70%</span>
                              <span class="progress-type">PHP/ Lamp Stack</span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">70%</span>
                              <span class="progress-type">JavaScript/ NodeJS/ MEAN stack </span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 65%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">65%</span>
                              <span class="progress-type">Python/ Numpy/ Scipy</span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">60%</span>
                              <span class="progress-type">C</span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 50%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">50%</span>
                              <span class="progress-type">C++</span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 10%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-danger">
                              <span class="sr-only">10%</span>
                              <span class="progress-type">Go</span>
                           </div>
                        </div>
                        <div class="progress-meter">
                           <div style="width: 25%;" class="meter meter-left"><span class="meter-text">I suck</span></div>
                           <div style="width: 25%;" class="meter meter-left"><span class="meter-text">I know little</span></div>
                           <div style="width: 30%;" class="meter meter-right"><span class="meter-text">I'm a guru</span></div>
                           <div style="width: 20%;" class="meter meter-right"><span class="meter-text">I''m good</span></div>
                        </div>
                     </a>
                  </ul>
               </div>
               <div class="bs-callout bs-callout-danger">
                  <h4>Education</h4>
                  <table class="table table-striped table-responsive ">
                     <thead>
                        <tr>
                           <th>Degree</th>
                           <th>Graduation Year</th>
                           <th>CGPA</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>Masters in Computer Science and Engineering</td>
                           <td>2014</td>
                           <td> 3.50 </td>
                        </tr>
                        <tr>
                           <td>BSc. in Computer Science and Engineering</td>
                           <td>2011</td>
                           <td> 3.25 </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
        <!-- resume -->

    </div>
</div>
</div>

</body>


<!--Start call to action Area-->
<div class="footer-call-to-action">
    <div class="container">
        <div class="row">

            <div class="col-md-4 sm-text-center">
                <h3>Sign up for Updates </h3>
                <p>By subscribing to our mailing list you will always be updated. </p>
            </div>
            <div class="col-md-8 text-right sm-text-center">
                <input type="text" name="name" placeholder="Full Name">
                <input type="text" name="email" placeholder="Email Address">
                <a href="#" class="thm-btn inverse mt-sm-15">Subscribe Now</a>
            </div>

        </div>
    </div>
</div>

   <!--Footer div-->
   <!--Footer div-->
    <footer class="footer sec-padding" style=" padding:55px 0;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="footer-widget about-widget">
                        <a href="index-2.html">
                            <img src="{{ asset ("public/user/images/resources/footer-logo.png") }}" alt="Awesome Image" />
                        </a>
                        <ul class="contact">
                            <li><i class="fa fa-map-marker"></i> <span>00 Monroe Ave, Roseland, NJ, 07068 </span></li>
                            <li><i class="fa fa-phone"></i> <span>(973) 226-6181</span></li>
                            <li><i class="fa fa-phone"></i> <span>(973) 226-6181</span></li>
                            <li><i class="fa fa-envelope-o"></i> <span>info@example.com</span></li>
                        </ul>
                        <ul class="social">
                            <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6  col-md-2">
                    <div class="footer-widget quick-links">
                        <h3 class="title">Navigation</h3>
                        <ul>
                            <li><a href="index-2.html">Home Page</a></li>
                            <li><a href="who-we-are.html">About Us</a></li>
                            <li><a href="global-projects.html">Global Projects</a></li>
                            <li><a href="global-projects.html">Local Projects </a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="events.html">News & Events</a></li>
                                   
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 latest-post col-md-3">
                    <div class="footer-widget latest-post">
                        <h3 class="title">Latest News</h3>
                        <ul>
                            <li>
                                <span class="border"></span>
                                <div class="content">
                                    <a href="events.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a>
                                    <span>jan 1, 2017</span>
                                </div>
                            </li>
                            <li>
                                <span class="border"></span>
                                <div class="content">
                                    <a href="events.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a>
                                    <span>jan 1, 2017</span>
                                </div>
                            </li>
                            <li>
                                <span class="border"></span>
                                <div class="content">
                                    <a href="events.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem ... </a>
                                    <span>jan 1, 2017</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="footer-widget contact-widget">
                        <h3 class="title">Contact Form</h3>
                        <form action="https://demo.servehuman.theme.spidertrixcons.net/submit.php" class="contact-form" id="footer-cf">
                            <input type="text" name="name" placeholder="Full Name">
                            <input type="text" name="email" placeholder="Email Address">
                            <textarea name="message" placeholder="Your Message"></textarea>
                            <button type="submit">Send</button>
                        </form>
                        <div id="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="footer-bottom">
        <div class="container text-center">
            <p>মানুষের প্রতি ভালবাসা আছে বলেই আমরা আজও আছি । আসুন মানুষ কে ভালবাসি , মানুষের পাশে থাকি ।</p>
            <p>© 2017 Blood Donation - ALL RIGHTS RESERVED</p>
        </div>
    </div>
    <div class="modal fade" id="be_donor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog style-one" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Register as Donor</h4>
                </div>
                <div class="modal-body">
                    <div class="donation-form-outer">
                        <form action="#" method="post">
                            <!--Form Portlet-->
                            <div class="form-portlet">
                                <h3 class="text-thm">Name</h3>
                                <div class="row clearfix">
                                    <div class="form-group col-xs-12 clearfix">
                                        
                                    
                                        <div class="switch-field">
                                          <input type="radio" id="donateAmount10" name="donateAmount" checked>
                                          <label for="donateAmount10">$10</label>
                                          <input type="radio" id="donateAmount25" name="donateAmount">
                                          <label for="donateAmount25">$25</label>
                                                <input type="radio" id="donateAmount50" name="donateAmount">
                                          <label for="donateAmount50">$50</label>
                                                <input type="radio" id="donateAmount100" name="donateAmount">
                                          <label for="donateAmount100">$100</label>
                                          <input type="radio" id="donateAmount150" name="donateAmount">
                                          <label for="donateAmount150">$150</label>
                                          <input type="radio" id="donateAmount200" name="donateAmount">
                                          <label for="donateAmount200">$200</label>
                                          <div class="radio-select">
                                            OR
                                        </div>
                                        </div>     
                                       
                                    </div>

                                    <div class="form-group  col-xs-12 padd-top-20">
                                        <input type="text" placeholder="Other Amount" value="" name="other-amount">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!--Form Portlet-->
                            <div class="form-portlet">
                                <h3>Billing Information</h3>
                                <div class="row clearfix">
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Card Number <span class="required">*</span></div>
                                        <input type="text" required="" placeholder="Card Number" value="" name="name">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Security Code (CVC) <span class="required">*</span></div>
                                        <input type="text" required="" placeholder="Security Code" value="" name="name">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Name <span class="required">*</span></div>
                                        <input type="text" required="" placeholder="First Name" value="" name="name">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Email <span class="required">*</span></div>
                                        <input type="email" required="" placeholder="Email" value="" name="name">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Phone <span class="required">*</span></div>
                                        <input type="text" required="" placeholder="Phone" value="" name="name">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Address <span class="required">*</span></div>
                                        <input type="text" required="" placeholder="Address 1" value="" name="name">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">City <span class="required">*</span></div>
                                        <select>
                                            <option>City</option>
                                            <option>City Name</option>
                                            <option>City Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Zip / Postal Code <span class="required">*</span></div>
                                        <input type="text" required="" placeholder="Zip Code" value="" name="name">
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <button class="thm-btn mt-30 mb-30" type="submit">Donate Now</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!--Form Portlet-->
                            <div class="form-portlet">
                                <h3>Online Payment Information</h3>
                                <div class="payment-option-logo"><img alt="" src="{{ asset ("public/user/images/resources/payment-logos.png") }}" class="img-responsive"></div>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: donate now Ends -->


    <div class="modal fade" id="user_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog style-one" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Login Form</h4>
                </div>
                <div class="modal-body">
                    <div class="donation-form-outer">
                        <form action="#" method="post">
                            
                            <!--Form Portlet-->
                            <div class="form-portlet">
                                <h3>Login Form</h3>
                                <div class="row clearfix">
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Email <span class="required">*</span></div>
                                        <input type="text" required="" placeholder="Email" value="" name="email">
                                    </div> 
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Password <span class="required">*</span></div>
                                        <input type="password" required="" placeholder="Password" value="" name="password">
                                    </div> 
                                    <hr>
                                    <div class="text-center">
                                        <button class="thm-btn mt-30 mb-30" type="submit">Login Now</button>
                                    </div>
                                </div>
                            </div>
                            <hr> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: donate now Ends -->


    
    
    <!-- switch color -->
    <div class="config open">
        <div class="config-options">
            <h4>Colors</h4>
            <ul>
                <li><a style="background: #37aecc;color: #37aecc" class="changecolor blue-text" href="#" title="Blue color">---</a></li> 
                <li><a style="background: #FF7619;color: #FF7619" class="changecolor orange-text" href="#" title="Orange color">---</a></li> 
            </ul>
        </div>
        <a class="show-theme-options" href="#"><i class="fa fa-cog"></i></a>
    </div>

    
    <!--Scroll to top-->
    <div class="scroll-to-top"><span class="fa fa-arrow-up"></span></div>

    <!-- main jQuery -->
    <script src="{{ asset ("public/user/js/jquery-1.12.4.min.js") }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset ("public/user/js/bootstrap.min.js") }}"></script>
    <!-- bx slider -->
    <script src="{{ asset ("public/user/js/jquery.bxslider.min.js") }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset ("public/user/js/owl.carousel.min.js") }}"></script>
    <!-- validate -->
    <script src="{{ asset ("public/user/js/jquery-parallax.js") }}"></script>
    <!-- validate -->
    <script src="{{ asset ("public/user/js/validate.js") }}"></script>
    <!-- mixit up -->
    <script src="{{ asset ("public/user/js/jquery.mixitup.min.js") }}"></script>
    <!-- fancybox -->
    <script src="{{ asset ("public/user/js/jquery.fancybox.pack.js") }}"></script>
    <!-- easing -->
    <script src="{{ asset ("public/user/js/jquery.easing.min.js") }}"></script>
    <!-- circle progress -->
    <script src="{{ asset ("public/user/js/circle-progress.js") }}"></script>
    <!-- appear js -->
    <script src="{{ asset ("public/user/js/jquery.appear.js") }}"></script>
    <!-- count to -->
    <script src="{{ asset ("public/user/js/jquery.countTo.js") }}"></script>
    <!-- gmap helper -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzS7kYaXQy0aJGMMArSfa2dDYTyuOzYUc"></script>
    <!-- gmap main script -->
    <script src="{{ asset ("public/user/js/gmap.js") }}"></script>
    <!-- isotope script -->
    <script src="{{ asset ("public/user/js/isotope.pkgd.min.js") }}"></script>
    <!-- jQuery ui js -->
    <script src="{{ asset ("public/user/js/jquery-ui-1.11.4/jquery-ui.js") }}"></script>
    <!-- revolution scripts -->
    <script src="{{ asset ("public/user/revolution/js/jquery.themepunch.tools.min.js") }}"></script>
    <script src="{{ asset ("public/user/revolution/js/jquery.themepunch.revolution.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset ("public/user/revolution/js/extensions/revolution.extension.actions.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset ("public/user/revolution/js/extensions/revolution.extension.carousel.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset ("public/user/revolution/js/extensions/revolution.extension.kenburn.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset ("public/user/revolution/js/extensions/revolution.extension.layeranimation.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset ("public/user/revolution/js/extensions/revolution.extension.migration.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset ("public/user/revolution/js/extensions/revolution.extension.navigation.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset ("public/user/revolution/js/extensions/revolution.extension.parallax.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset ("public/user/revolution/js/extensions/revolution.extension.slideanims.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset ("public/user/revolution/js/extensions/revolution.extension.video.min.js") }}"></script>
    <!-- thm custom script -->
    <script src="{{ asset ("public/user/js/custom.js") }}"></script>

  
    <!-- For demo purposes – can be removed on production -->
    <script src="{{ asset ("public/user/switchstylesheet/switchstylesheet.js") }}"></script>
    
    <script>
        $(document).ready(function(){ 
            $(".changecolor").switchstylesheet( { seperator:"color"} );
            $('.show-theme-options').click(function(){
                $(this).parent().toggleClass('open');
                return false;
            });
        });

        $(window).bind("load", function() {
           $('.show-theme-options').delay(2000).trigger('click');
        });
    </script>
</body>


 </html>