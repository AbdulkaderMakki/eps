

{{--nav bar--}}
@include('main.header.navbar')
{{--end nav bar--}}

{{--dashboard menu--}}
<aside class="left-off-canvas-menu" style="height: 671px;">
    <ul class="off-canvas-list">
        <li><label>DashBoard Menu</label></li>
        <!---->


        <!--Tuition system menu -->
        <li class="has-submenu">
            <a href="#" id="current"><span>Tuition System</span></a>
            <ul class="left-submenu">
                <li class="back"><a href="#">Back</a></li>
                <li class="has-submenu">
                    <a href="#" id="current"><span>Add / Explore Tuition Systems</span></a>
                    <ul class="left-submenu">
                        <li class="back"><a href="#">Back</a></li>
                        <li class="last"><a href="http://127.0.0.1/cheptest/Payment/TuitionSystem/addNew"><span>Add New Tuition System</span></a>
                        </li>
                        <li class="last"><a href="http://127.0.0.1/cheptest/Payment/TuitionSystem"><span>Explore Tuition Systems</span></a>
                        </li>
                    </ul>
                </li>


                <li class="has-submenu">
                    <a href="#" id="current"><span>Payment Methods and Fees</span></a>
                    <ul class="left-submenu">
                        <li class="back"><a href="#">Back</a></li>
                        <li class="last"><a href="http://127.0.0.1/cheptest/Payment/PayMethodFee"><span>Explore Payment Fees</span></a>
                        </li>
                        <li class="last"><a
                                    href="http://127.0.0.1/cheptest/Payment/PayMethodFee/addPayFee"><span>Add New Payment Fees</span></a>
                        </li>
                        <li class="last"><a
                                    href="http://127.0.0.1/cheptest/Payment/PayMethodFee/appealFee"><span>Appeal Fees</span></a>
                        </li>
                        <li class="last"><a
                                    href="http://127.0.0.1/cheptest/Payment/PayMethodFee/paymethods"><span>Payment Methods</span></a>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#" id="current"><span>Installments</span></a>
                    <ul class="left-submenu">
                        <li class="back"><a href="#">Back</a></li>
                        <li class="last"><a href="http://127.0.0.1/cheptest/Payment/Installment"><span>Installment System</span></a>
                        </li>
                        <li class="last"><a
                                    href="http://127.0.0.1/cheptest/Payment/Installment/showStudentInstallments"><span>Student Installments</span></a>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#" id="current"><span>Payment Fines</span></a>
                    <ul class="left-submenu">
                        <li class="back"><a href="#">Back</a></li>
                        <li class="last"><a href="http://127.0.0.1/cheptest/Payment/Fine/fineTypes"><span>Add New Fine Type</span></a>
                        </li>
                        <li class="last"><a href="http://127.0.0.1/cheptest/Payment/Fine/addFine"><span>Add New Fine Values</span></a>
                        </li>
                        <li class="last"><a
                                    href="http://127.0.0.1/cheptest/Payment/Fine"><span>Explore Fines</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <!--Discounts menu -->
        <li class="has-submenu">
            <a href="#" id="current"><span>Tuition Discount</span></a>
            <ul class="left-submenu">
                <li class="back"><a href="#">Back</a></li>
                <li class="last"><a href="http://127.0.0.1/cheptest/Payment/Discount/discountTypes"><span>Discount Types</span></a>
                </li>
                <li class="last"><a href="http://127.0.0.1/cheptest/Payment/Discount/addDiscount"><span>Add Discount Details</span></a>
                </li>
                <li class="last"><a
                            href="http://127.0.0.1/cheptest/Payment/Discount"><span>Explore Discounts</span></a>
                </li>
                <li class="last"><a href="http://127.0.0.1/cheptest/Payment/Discount/studentDiscount"><span>Student Discount</span></a>
                </li>
            </ul>
        </li>

        <!--Tuition Fee & Payments menu -->
        <li class="has-submenu">
            <a href="#" id="current"><span>Payment Fees</span></a>
            <ul class="left-submenu">
                <li class="back"><a href="#">Back</a></li>
                <li><a href="http://127.0.0.1/cheptest/Payment/Tuition"><span>View Tuition Fees</span></a></li>
                <li>
                    <a href="http://127.0.0.1/cheptest/Payment/Tuition/generate"><span>Generate Tuition Fees</span></a>
                </li>
            </ul>
        </li>

        <!--Payment Registration -->
        <li class="has-submenu"><a href="#" id="current"><span>Payment Registration</span></a>
            <ul class="left-submenu">
                <li class="back"><a href="#">Back</a></li>
                <li class="last"><a href="http://127.0.0.1/cheptest/Accountant/pendingServices"><span>Pending Services</span></a>
                </li>
                <li class="last"><a href="http://127.0.0.1/cheptest/Accountant/uploadExcelFile"><span>Update Tuition Paid Through Fawry</span></a>
                </li>
            </ul>
        </li>

        <!--Payment Reports -->
        <li class="has-submenu">
            <a href="#" id="current"><span>Payment Reports</span></a>
            <ul class="left-submenu">
                <li class="back"><a href="#">Back</a></li>
                <li class="last"><a href="http://127.0.0.1/cheptest/Payment/Report/tuitionReport"><span>Tuition Report</span></a>
                </li>
                <li class="last"><a href="http://127.0.0.1/cheptest/Payment/Report/fawry"><span>Generate Fawry Report</span></a>
                </li>
                <li class="last"><a href="http://127.0.0.1/cheptest/Payment/Report/annualex"><span>Annual Expenses for Students</span></a>
                </li>
            </ul>
        </li>

        <li class="has-submenu"><a href="#" id="current"><span>Complaints and Suggestions</span></a>
            <ul class="left-submenu">
                <li class="back"><a href="#">Back</a></li>
                <li><a href="http://127.0.0.1/cheptest/Complaints/send" id="current"><span>Send Complaint/Suggestion</span></a>
                </li>
                <li><a href="http://127.0.0.1/cheptest/Complaints/status" id="current"><span>Show Complaints Status</span></a>
                </li>
            </ul>
        </li>


        <li class="has-submenu"><a href="#">Profile</a>
            <ul class="left-submenu">
                <li class="back"><a href="#">Back</a></li>
                <li><a href="http://127.0.0.1/cheptest/changePassword"><span>Change
		Password</span></a>
                </li>


                <li class="last"><a href="http://127.0.0.1/cheptest/logout"><span>Log Out</span></a>
                </li>
            </ul>
        </li>
        <!---->
    </ul>
</aside>
{{--end dashboard menu--}}

<center>

    <div id="header">
        <center>
            <div style="width: 1000px; background: #fff; box-shadow: -1px 0px 29px 3px rgba(0, 0, 0, 0.29); padding-bottom: 5px;"
                 class="header2">

                {{--logo photos and second menu--}}
                @include('main.header.logomenu')
                {{--end logo photos--}}

                <br>

                {{-- privileges --}}
                {{-- we don't need privilege  --}}
                {{--@include('main.header.privileges')--}}
                {{-- end privileges--}}

                <br>

                <div style="clear: both;"></div>

            </div>
        </center>
    </div>

</center>