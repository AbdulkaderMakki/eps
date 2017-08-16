<script type="text/javascript">
    $(document).ready(function () {
        $(document).foundation();
        $(".inner-wrap, .left-off-canvas-menu, .main-section").height($(window).height() - $(".fixed").height());
    })
</script>
<!-- -->
<style type="text/css">
    .removedash:after, .removedash:before {
        padding-bottom: 0px;
    }
</style>
<div class="off-canvas-wrap" data-offcanvas>
    <div class="inner-wrap">
        <nav class="tab-bar">
            <section class="left-small"><a class="left-off-canvas-toggle menu-icon"><span class="removedash"></span></a>
            </section>
            <section class="right tab-bar-section">
                <center>
                    <div id="top_menu">
                        <ul class="top_menu">
                            <li><a href="http://asu.asugards.edu.eg/credit_hours">Home</a></li>
                            <li><a target="_self" href="http://asu.asugards.edu.eg/aboutus">About</a></li>
                            <li><a target="_self" href="http://asu.asugards.edu.eg/profile">Staff</a></li>
                            <li><a target="_self" href="http://asu.asugards.edu.eg/CHEPContact">Contact Us</a></li>
                            <li><a target="_self" href="">Admission</a></li>
                            <li><a target="_self" href="">Edit Data</a></li>
                            <li class="right" style="padding: 3px 0px 0px 0px; text-align: center; height: 25px;">
                                <span style="font-style: oblique;">Welcome! </span>
                                <span style="font-family: PT Sans, sans-serif; color: white;font-size: 12px; height: 12px; font-style: normal;"></span>
                                <br/>
                                <span style="font-family: PT Sans, sans-serif; color: #f0f0f0;font-size: 10px; height: 10px; font-style: normal;">LAST LOGIN:</span>
                            </li>
                        </ul>
                    </div>
                </center>
            </section>
        </nav>


        <div id="header">
            <center>
                <div style="width: 1000px; background: #fff; box-shadow: -1px 0px 29px 3px rgba(0, 0, 0, 0.29); padding-bottom: 5px;" class="header2">
                    <div id="logo"><img src="{{ asset('images/logo.png') }}" style="padding: 10px 20px 0 0; float: right; height: 125px; width: auto;">
                        <img src="{{ asset('') }}" style="float: left; height: 125px">
                        <div style="clear: both"></div>
                    </div>
                    <div id="menu2" style="">
                        <ul class="menu2">
                            <li><a target="_self" href="http://asu.asugards.edu.eg/">Education</a>
                                <ul>
                                    <li><a target="_self" href="http://asu.asugards.edu.eg/undergraduateProgram">Undergraduate Programs</a></li>
                                    <li><a target="_self" href="http://asu.asugards.edu.eg/postgraduateProgram">Postgraduate Programs</a></li>
                                    <li>
                                        <a target="_self" href="http://asu.asugards.edu.eg/credit_hours">Credit Hours Program</a>
                                        <ul>
                                            <li class="last"><a href=""><span>Log Out</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a target="_self" href="http://asu.asugards.edu.eg/research">Research</a>
                            </li>
                            <li><a target="_self" href="http://asu.asugards.edu.eg/consultancy">Consultancy</a>
                            </li>
                            <li><a target="_self" href="http://asu.asugards.edu.eg/collegeDepartments">Departments</a>
                            </li>
                            <li><a target="_self" href="http://asu.asugards.edu.eg/educationQuality">Quality</a>
                            </li>
                            <li><a target="_self" href="http://asu.asugards.edu.eg/studentActivities">Student
                                    Activities</a></li>
                            <li><a target="_self" href="http://asu.asugards.edu.eg/news">News</a>
                            </li>
                            <li><a target="_self" href="http://asu.asugards.edu.eg/">ASU
                                    Journal</a></li>
                        </ul>
                    </div>
                    <br/>
                </div>
            </center>
        </div>
    </div>
</div>