
<!--Start Our Event Area-->
<div id="donation-forms" class="donation-section bg-img-cover layer-overlay overlay-white-9"
     data-bg-img="images/bg/1.jpg">
    <div class="container-fluid">
        <div class="sec-content">
            <div class="row">
                <div class="col-md-6 promote-project text-left pb-sm-50 p-70 p-md-20 pl-120">
                    <h2 class="text-dark mb-30">রক্তদানের প্রয়োজনিয়তা?</h2>
                    <ul style="color: orange; list-style: circle">
                        <li>প্রথম এবং প্রধান কারণ, আপনার দানকৃত রক্ত একজন মানুষের জীবন বাঁচাবে। রক্তদানের জন্য এর থেকে
                            বড় কারণ আর কি হতে পারে !
                        </li>

                        <li> হয়তো একদিন আপনার নিজের প্রয়োজনে/বিপদে অন্য কেউ এগিয়ে আসবে।</li>

                        <li>নিয়মিত রক্তদানে হৃদরোগ ও হার্ট অ্যাটাকের ঝুঁকি অনেক কম।</li>

                        <li>নিয়মিত স্বেচ্ছায় রক্তদানের মাধ্যমে বিনা খরচে জানা যায় নিজের শরীরে বড় কোনো রোগ আছে কিনা। যেমন
                            : হেপাটাইটিস-বি, হেপাটাইটিস-সি, সিফিলিস, এইচআইভি (এইডস) ইত্যাদি।

                        <li> দেহের রোগ প্রতিরোধ ক্ষমতা অনেকগুন বেড়ে যায়।</li>
                    </ul>

                    <h2 class="text-dark mb-30"> রক্তদাতাদের করণীয় কি ? </h2>
                    <ul style="color: orange; list-style: circle">
                        <li> রোগী কোন হাসপাতাল/ক্লিনিকে আছেন জেনে নিন। হাসপাতাল/ক্লিনিক ছাড়া অন্য কোথাও রক্তদান করতে
                            যাবেন না। রোগীর বাসায় হলেও না।
                        </li>
                        <li>হাসপাতাল/ক্লিনিক ছাড়া অন্য কোথাও রক্ত আবেদনকারী (মোবাইল নম্বরে যে ব্যাক্তির সাথে আপনি
                            যোগাযোগ
                            করছেন) এর সাথে দেখা করবেন না। হাসপাতালের পাশের গলি, কিংবা কোনও দোকানে দেখা করতে বললে যাবেন
                            না।
                        </li>
                        <li>রক্তদানের পূর্বে রোগী দেখে নিবেন। রোগীর রিপোর্ট, ডাক্তারের রিকুইজিশন লেটার দেখে নিবেন।</li>
                        <li>রক্তদানের সময় দুই-একজন বন্ধু সাথে নিয়ে গেলে ভালো হয়।</li>

                        <li>রক্তদানে নতুন সূচ ব্যবহার করছে কিনা নিশ্চিত হয়ে নিন।</li>
                        <li>উপস্থিত বিশেষজ্ঞের দক্ষতা নিয়ে সন্দেহ থাকলে কর্তৃপক্ষকে জানান.</li>
                    </ul>

                    <a href="donate-now.html" class="thm-btn inverse mt-20">Join Us</a>
                    <a href="who-we-are.html" class="read-more thm-btn btn-dark mt-20"> <?=$readmore_bn;?></a>
                </div>
                <div class="col-md-6 bg-f7 p-80 p-md-20 p-sm-70 pb-50">
                    <h2 class="text-dark mt-0 pb-20 text-uppercase font-weight-700">Make a donation</h2>
                    <form id="donation-form" class="donation-form">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-20">
                                    <label class="text-thm">Donation Amount</label>
                                    <div class="switch-field">
                                        <input type="radio" id="donateAmount0020" name="donateAmount" checked>
                                        <label for="donateAmount0020">$20</label>
                                        <input type="radio" id="donateAmount0050" name="donateAmount">
                                        <label for="donateAmount0050">$50</label>
                                        <input type="radio" id="donateAmount00100" name="donateAmount">
                                        <label for="donateAmount00100">$100</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-20">
                                    <label class="text-thm">Donation Type</label>
                                    <div class="switch-field">
                                        <input type="radio" id="donateTypeOneTime" name="donateType" checked>
                                        <label for="donateTypeOneTime">Once</label>
                                        <input type="radio" id="donateTypeMonthly" name="donateType">
                                        <label for="donateTypeMonthly">Monthly</label>
                                        <input type="radio" id="donateTypeYearly" name="donateType">
                                        <label for="donateTypeYearly">Yearly</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="text-thm">Your Name</label>
                                    <input type="text" placeholder="Enter Name" name="donate_name" required=""
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="text-thm">Your Email</label>
                                    <input type="text" placeholder="Enter Email" name="donate_email"
                                           class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="text-thm">Donation For</label>
                                    <select class="form-control">
                                        <option>Educate children</option>
                                        <option>Child Feed</option>
                                        <option>Give Clean Water</option>
                                        <option>Child Clothes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button data-loading-text="Please wait..." class="thm-btn mt-15" type="submit">Donate Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

