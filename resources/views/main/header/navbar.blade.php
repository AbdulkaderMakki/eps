
{{--nav bar--}}
<nav class="tab-bar">
    <section class="left-small"><a class="left-off-canvas-toggle menu-icon" aria-expanded="false"><span
                    class="removedash"></span></a>
    </section>
    <section class="right tab-bar-section">
        <center>
            <div id="top_menu">
                <ul class="top_menu">
                    <li><a href="http://asu.asugards.edu.eg/credit_hours">Home</a></li>
                    <li><a target="_self" href="http://asu.asugards.edu.eg/aboutus">About</a></li>
                    <li><a target="_self" href="http://asu.asugards.edu.eg/profile">Staff</a></li>
                    <li><a target="_self" href="http://asu.asugards.edu.eg/CHEPContact">Contact Us</a></li>
                    <li class="right" style="padding: 3px 0px 0px 0px; text-align: center; height: 25px;">
	    <span style="font-style: oblique;">Welcome! <span>
		<span style="font-family: PT Sans, sans-serif; color: white;font-size: 12px; height: 12px; font-style: normal;">@if (Auth::check()){{ Auth::user()->user_name }} @else  @endif</span>
	    	<br>
		<span style="font-family: PT Sans, sans-serif; color: #f0f0f0;font-size: 10px; height: 10px; font-style: normal;">LAST LOGIN:
            @if (Auth::check()){{ Auth::user()->updated_at }} @else  @endif	    <span>
	</span></span></span></span></li>
                </ul>
            </div>
        </center>
    </section>
</nav>
{{--end nav bar--}}