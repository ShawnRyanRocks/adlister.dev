<!DOCTYPE html>

<html lang="en">
<head>
    <title>Shawn & Ryan Ad lister</title>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/main.css">

</head>
<body>
    <header>
        <h2 id="header_title">Shawn & Ryan Ads</h2>
        <h3 id="header_current_city">Current City</h3>
    </header>
    <main class="container">




<style type="text/css">
    #mobile_ads{
        background: pink;
        height:50px;
    }
    #desktop_ads{
        text-align: center;
        background:pink;
        height:400px;
    }
    #cities_nearby{
        text-align: center;
        background:pink;
        height:400px;
    }
    .main_body{
        text-align: center;
    }
    .test{
        padding-left: 30px;
    }
</style>


<div class="row">

    <div class="hidden-xs col-sm-2  col-md-2 col-lg-3">
        <div id="cities_nearby">cities</div>
    </div>

    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
        <div class="main_body">

            <!-- Top tow inline input options -->

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <form class="form-inline">
                        <div class="form-group">
                            <label for="type_select">Type</label>
                            <select class="form-control" id="type_select" name="type_select">
                                <option>For Sale by Owner</option>
                                <option>For Sale by Dealer</option>
                                <option>Buying</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category_type">Category</label>
                            <select class="form-control" id="category_type" name="type_select">
                                <option>Free</option>
                                <option>Motorcycle</option>
                                <option>Car</option>
                                <option>Antiques</option>
                                <option>Trucks</option>
                                <option>House</option>
                                <option>Bike</option>
                                <option>Toys</option>
                                <option>Ride Home</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">Send invitation</button>
                    </form>

                </div>
            </div>

            <!--  Personal information form -->

            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal">

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-3">
                                <label for="input_email" class="control-label">Email</label>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <input type="email" class="form-control" id="input_email" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-3">
                                <label for="verify_email" class="control-label">Verify Email</label>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <input type="email" class="form-control" id="verify_email" placeholder="Verify Email">
                            </div>
                        </div>

                        <div class="form-inline">

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <label class="" for="contact_info_phone_number">Phone number</label>
                                </div>
                                <div class="col-xs-12">
                                    <input type="email" class="form-control" id="contact_info_phone_number" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <label class="" for="exampleInputPassword3">Password</label>
                                </div>
                                <div class="col-xs-12">
                                    <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                                </div>
                            </div>

                        </div>









                        <div class="row">

                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">

                            <div class="form-group">

                                <div class="checkbox test">
                                  <label>
                                    <input type="checkbox">Call
                                  </label>
                                </div>

                                <div class="checkbox test">
                                    <label>
                                        <input type="checkbox">Text
                                    </label>
                                </div>

                                <div class="checkbox test">
                                    <label>
                                        <input type="checkbox">Email
                                    </label>
                                </div>
                            </div>

                        </div>


                        </div>


                    </form>
                </div>
            </div><!-- row for personal info -->

            <!-- Posting Title , Price, Location, and Zip -->

            <div class="row">
                <div class="col-md-12">

                        <div class="form-inline">

                            <div class="form-group">
                                <div class="col-sm-12">
                                        <label class="" for="contact_info_phone_number">Phone number</label>
                                    <div class="">
                                        <input type="email" class="form-control" id="contact_info_phone_number" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                        <label class="" for="exampleInputPassword3">Password</label>
                                    <div class="">
                                        <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                        <label class="" for="exampleInputPassword3">Password</label>
                                    <div class="">
                                        <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                                    </div>
                                </div>
                            </div>

                        </div>
                        </div>

            </div>

            <!-- Details about item, will change based upon the category -->

            <div class="row">
                <div class="col-md-12">
                    <div>Html that will change based on the categorys</div>
                </div>
            </div>

            <!-- Description of the Item being sold -->

            <div class="row">
                <div class="col-md-12">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 hidden-md hidden-lg">
                    <div id="mobile_ads">Mobie adds</div>
                </div>
            </div>
        </div>


    </div>

    <div class="hidden-xs hidden-sm col-md-2 col-lg-3">
        <div id="desktop_ads">Desktop ADDS</div>
    </div>

</div>











    </main>

    <footer class="row">

        <div class="col-xs-12 col-sm-6 col-md-5">
            <ul class="footer_ul_class" id="footer_ul_left">
                <li class="footer_li_class"><a href="#">FAQ's</a></li>
                <li class="footer_li_class"><a href="#">Feedback</a></li>
                <li class="footer_li_class"><a href="#">Terms and Conditions</a></li>
            </ul>
        </div>

        <div class="hidden-xs hidden-sm col-md-2">
            <img src="/img/codeup-arrow.png">
        </div>

        <div class="col-xs-12 col-sm-6 col-md-5">
            <ul class="footer_ul_class" id="footer_ul_right">
                <li class="footer_li_class"><a href="#">another link</a></li>
                <li class="footer_li_class"><a href="#">last link</a></li>
                <li class="footer_li_class"><a href="#">And one more link</a></li>
            </ul>
        </div>

        <div id="footer_incoparated_info">&#169; 2015 Ryan&Shawn</div>

    </footer>
</body>
</html>