<?php /* Smarty version 2.6.19, created on 2017-02-10 01:57:11
         compiled from about.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/COTESTicon.png"/>
    <title><?php echo $this->_tpl_vars['title']; ?>
</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/cotest.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/changelanguage.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<!-- Static navbar -->

<body>
<?php 
    require("navigation.php");
     ?>
<div class="container main-container review-container">
<div class="col-md-12">
<div class="col-md-3 about-nav">

    <div class="about-nav-title"> About us</div>
    <ul class="about-nav-list">

        <li class="active" onclick="javascript:navselect(this)" target="#about-cotest">COTEST</li>
        <li onclick="javascript:navselect(this)" target="#about-icrt">ICRT</li>
        <li onclick="javascript:navselect(this)" target="#about-sw">Stiftung Warentest</li>
        <li onclick="javascript:navselect(this)" target="#how-to-test">How we test</li>
    </ul>
</div>

<div class="col-md-9 ">
<div id="about-cotest"  class="about-article">
    <h2 style="text-center">COTEST</h2>
    <br>
    <h4>Mission</h4>

    <p>
     Association for Comparative & Objective Testing in Europe for Safety & Trust e.V. (COTEST) is registered as a non-profit association under German law with the following mission: To test products and services independently for a safe and trustful marketplace for consumers in developing countries and around the world.
    </p>
    <div class="about-img-container">
        <img src="img/cotest.png" class="about-cotest">
    </div>

    <h4>Powered by European experience</h4>
    <div class="col-md-9 about-para">
    <p>Commissioned by consumer organisations or individual consumers, COTEST will test samples bought by the principal in the respective developing countries in European research labs, which – among other clients – have been testing for German testing foundation Stiftung Warentest, applying scientific methods, which Stiftung Warentest has been developing and applying for over 50 years.
    Thereby, products sold outside Europe are tested in Europe according to European quality and testing standards. The access to the test results is promoted in all countries, where these products are sold to consumers. </p>
    </div>

    <div class=" col-md-3">
        <img src="img/test.png" class="about-test">
    </div>
    <h4>ICRT Membership</h4>
    <div class="about-img-container">
        <img src="img/icrt_c.png" class="about-icrt">
    </div>
    <p>Because COTEST exclusively acts in the consumer interest, does not accept advertising and is independent of commerce, industry and political parties, it has from the first day of its existence already joined ICRT, a global consortium of more than 35 consumer organisations under the leadership of Association des Consommateurs Test-Achats SC (Belgium), Consumentenbond (The Netherlands), Consumer Reports (USA), Stiftung Warentest (Germany), UFC - Que Choisir (France), Which? (UK). As the only independent international organisation for consumer research and testing, ICRT runs thousands of tests annually, on a whole range of consumer products from apple juice to digital cameras, laptops, mobile phones, drinking water, wrinkle creams and yogurt, and plays a key role in promoting higher safety standards for consumer goods such as food, health, the environment and services. </p>
    <div class="about-img-container">
        <img src="img/map.png" class="about-map">
    </div>
    <!--
    <h4>Focus on Chinese Products</h4>
    <p>According to the EU RASFF (Rapid Alert System for Food and Feed) records, China is still the largest place of origin for notified unsafe food and feed products in Europe, and almost 60% of notifications in the EU's Rapid Alert System for non-food dangerous products (RAPEX) concern goods of Chinese origin. In Europe, dangerous Chinese products are still countable, but in China, they have been innumerable for a long time. In China and around the world this really affects the basic human right to live safely. COTEST will therefore, at first, focus on the research and testing of products from China in order to empower consumers in China and around the world to consume safely and healthily.
    </p>

    <div class="about-img-container">
        <img src="img/eu_c.gif" class="about-eu">
    </div>
    -->
    </div>
    <div id="about-icrt" class="about-article" style="display: none">
     <h2 style="text-center">ICRT</h2>
    <br>
    <h4>Mission</h4>

    <p>
     <a href="http://www.international-testing.org">International Consumer Research & Testing</a> (ICRT) is a global consortium of more than 35 consumer organisations dedicated to carrying out joint research and testing in the consumer interest. Its mission is to be the world-leading organisation that empowers its members to provide high quality and independent information to consumers worldwide.
        As the only independent international organisation for consumer research and testing, ICRT runs thousands of tests annually, on a whole range of consumer products from apple juice to digital cameras, laptops, mobile phones, drinking water, wrinkle creams and yogurt, and plays a key role in promoting higher safety standards for consumer goods such as food, health, the environment and services.
    </p>
    <div class="about-img-container" >
        <img src="img/icrt_c.png" class="about-icrt">
    </div>
    <p>ICRT's principal objectives are to facilitate co-operation between its members and to promote research and testing in the field of consumer goods and services. ICRT sets out clear guidelines for successful collaboration, increases the cost effectiveness of testing, develops common test programmes and evaluation methods and helps smaller consumer organisations to grow.</p>
    <h4>Members</h4>
    <p>All ICRT members act exclusively in the consumer interest. They do not accept advertising and are independent of commerce, industry and political parties.</p>
    <p>ICRT's major members are: Association des Consommateurs Test-Achats SC (Belgium), Consumentenbond (The Netherlands), Consumer Reports (USA), Stiftung Warentest (Germany), UFC - Que Choisir (France), Which? (UK). ICRT has member organisations in Europe, Asia Pacific, Latin America and Africa.</p>
    <div class="about-img-container">
        <img src="img/icrtmember.jpg" class="about-member">
    </div>
    <p>ICRT works closely with the two other international campaigning consumer organisations, to which many ICRT members also belong: BEUC - Bureau Européen des Unions de Consommateurs and CI - Consumers International.</p>
    <div class="about-img-container">
        <img src="img/icrtpartner.jpg" class="about-member">
    </div>
    </div>
    <div id="about-sw" class="about-article" style="display: none">
      <h2 style="text-center">Stiftung Warentest</h2>
    <br>
    <p><a href="https://www.test.de/unternehmen/about-us-5017053-0/">Stiftung Warentest</a> is a foundation. It was established in 1964 by the German federal parliament with the aim of helping consumers by providing impartial and objective information based on the results of comparative investigations of goods and services. For more information please go to the website of <a  href="https://www.test.de/unternehmen/about-us-5017053-0/">Stiftung Warentest.</a> </p>
    <div class="about-img-container">
        <img src="img/sw.jpg" class="about-member">
    </div>
    <!--
    <h4>Facts + figures</h4>
    <p>Since it was founded Stiftung Warentest has carried out more than 5,500 tests and tested a good 94,000 products. In addition, it has carried out investigations of over 2,500 services. The results are published each year in more than 8 million copies of our magazines.</p>

    <h4>Publications</h4>
    <div class="row about-para">
    <div class="about-para col-md-9">
         <b>test: </b>the magazine is Stiftung Warentest's oldest and best-known publication. Since 1966 it has provided impartial and objective advice about the products and services of everyday life. In addition to the tests and investigations, there are also articles, as well as information about trends and useful tips for consumers. Paid circulation: 440,000 copies.
    </div>

    <div class="col-md-3">
        <img src="img/test.jpg">
    </div>
    </div>
    <br>
    <div class="row about-para">
    <div class="col-md-3 about-para">
        <img src="img/ftest.jpg">
    </div>

    <div class="col-md-9 about-para">
        From A for assets to Z for zero-bonds – "Finanztest" has been on the market since 1991 and has specialised in topics such as insurance, investment, tax and legal issues. A continually updated database provides a comprehensive comparison of equity funds, loans and savings interest rates each month. The paid circulation totals 219,000 copies.
    </div>
    </div>
    <br>
    <div class="row about-para">
        <div class="col-md-9 about-para">
            <p><b>test.de: </b>The complete contents of "test" and "Finanztest" published since 2000 can be downloaded from the website test.de. Consumers can also compare the tested products using our product databases. They can customise the data to best meet their own personal needs, using the interactive possibilities of various filters. Furthermore, the website provides the latest important information for consumers on a daily basis, as well as the results of exclusive fast track tests.</p>
        </div>
        <div class="col-md-3 about-para">
            <img src="img/testde.jpg">
        </div>

    </div>
    <br>
    <div class="row about-para">
        <div class="col-md-3 about-para">
            <img src="img/book.jpg">
        </div>
        <div class="col-md-9 about-para">
             <p>
             <b>Books: </b>Stiftung Warentest offers an extensive range of books about topics such as health and nutrition, the home and garden as well as finance and legal issues. This year more than 40 new books have been published, and sum total there are more than 120 titles available. In 2014 Stiftung Warentest sold more than 365,000 books.
             </p>
        </div>
    </div>

    <h4>Investigation work</h4>
    <p>
        Following a comprehensive planning phase, Stiftung Warentest's staff compile an investigation programme and purchase the test samples anonymously in shops, just like regular customers.
    </p>
    <p>
        Independent, external labs are then commissioned to carry out the tests on behalf of the foundation. Investigated services are used covertly by trained mystery shoppers. Finally, Stiftung Warentest publishes and disseminates the results of its investigations.
    </p>
    <p>Each year, Stiftung Warentest investigates about 2000 products in more than 100 tests. In addition, it carries out fast-track tests, investigations of services, and provides market overviews and research-based reports.</p>
    -->
    <div class="about-img-container">
        <img src="img/research.jpg" class="about-member">
    </div>
    </div>
    <div id="how-to-test" class="about-article" style="display: none;">
    <h2>How to test</h2>
    <h4>1. Planning the test</h4>
    <div class="about-img-container">
        <div class="about-member sf-img">
          <img src="img/plan.jpg" />
        </div>
    </div>
    <p>First question to be answered in setting up a test is finding out which goods and services are to be tested in order to support the consumer in his day to day live. A selection has to be made from sometimes hundreds of different products in the same product segment or even sub-segment, because it is almost impossible to test all available products. Basically one has to answer the question, which product segments will be tested and which products in each segment will be selected for testing.</p>
    <p>
        The answer usually is strongly influenced by the number of products sold in the market. The assumption normally is that the higher the number of sold copies of a single product is the higher will be the consumer interest in the quality of that product. Technically innovative products, that often attract consumer´s attention or Bio products sometimes are selected more often than their importance in the market mirrors. Furthermore, changes or short term expected changes in the market regulations have an impact on the product selection.
    </p>
    <p>
        It is important to remark, that manufacturers or dealers have absolutely neither influence on product segment and product selection, nor on the planning of our tests.
    </p>
    <h4>2. Test design</h4>
       <div class="about-img-container">
           <div class="about-member sf-img">
             <img src="img/testdesign.jpg" />
           </div>
       </div>

    <p>Once a final decision on product segments and product choice has been made the technical test disciplines and how they are tested have to be defined.
    </p>
    <p>
        The test team creates a test design which encompasses every single test discipline and its subdiscipline. Usually this list is based on and in accordance with the legal regulations and prescriptions. This, however, is not sufficient where regulations do not exist (e.g. practical tests like usability) or have proven not to be up to date (e.g. endurance strength of bikes). In such cases our engineers, together with experts, define new test methods in order to improve the consumer experience.
    </p>
    <h4>3.  Product purchase</h4>
    <div class="about-img-container">
      <div class="about-img-container">
          <div class="about-member sf-img">
            <img src="img/purchase.jpg" />
          </div>
      </div>
    </div>
    <p>
    Selected products have to be purchased in a next step. But how to buy a so called test sample?
    </p>

    <p>
    The test team usually buys the test samples the same way every consumer does. Anonymous test sample buyers visit department stores, supermarkets or shops and prefer to pay cash to avoid being traceable. No rules without exception: Seasonal goods like parasols are randomly picked in the storage areas of the dealers or manufacturers, because you cannot buy them in the stores before the season starts.
    </p>
    <p>
    To make sure that only products are tested that a consumer can buy we do not use so called free of charge test samples offered by the manufacturers.
    </p>
   <h4> 4.  Conduction tests in independent labs</h4>
   <div class="about-img-container">
     <div class="about-img-container">
         <div class="about-member sf-img">
           <img src="img/conclusion.jpg" />
         </div>
     </div>
    </div>
   <p>
    After the test specifications have been designed the test team has to decide, which test service organization should test and at what cost.<br>
    Usually non-profit test organizations like COTEST cannot afford their own labs. For economic reasons you cannot keep a lab organization operational for the whole year with all necessary state of the art testing equipment e.g. for washing machine testing, a product category in which you usually conduct one or two tests a year.
    </p>
    <p>
    The test team typically starts a tender asking three test labs for an offer. This is not only a best price race. In fact the decision is based upon price, competence and history from recent comparable projects with the bidding lab.
    </p>
    <p>
    Generally test labs have to confirm their independency by signing a letter of neutrality. It is obvious that they work for manufacturers. But they have to keep strictly confidential that they work for COTEST and have to confirm e.g. that they do not test the same test samples for the manufacturer and COTEST at the same time.
    </p>
    <p>
    The same is valid for COTEST. As it is the sole responsibility of COTEST to publish the test results without making the identity of the labs public, also to avoid that the labs are endangered to be pressed by manufacturers, e.g. by threatening to place their test orders elsewhere.
    </p>
    <p>
    Before making the test results public the manufacturers are informed about the test results of their own tested products. This is about to recheck test results that mismatch with what the manufacturers have measured themselves. In case of a mismatch possible mistakes can be avoided. Anyway, the final decision is with COTEST.
    </p>
    <h4> 5.  Verdicts based solely on test results</h4>

    <p>
    The evaluation system basically works as follows:
    </p>
For each feature or specification, a score from 0.5 to 5.5 is related to its measured values or evaluation results. Similar to German academic grading scale, the score of 0.5 represents the best and 5.5 the worst test result, meaning that a product with a total score of 0.5 is the "dream product". The scores of all individual features and specifications of a sub-discipline result in a weighted average score for the sub-discipline. The average scores of all individual sub-disciplines of a discipline result in a weighted average score for the discipline. The total test result (TTR) score results from the average scores of all individual disciplines with proportionate weightings.
</p>
<p>
Each of the assessments described above contributes to a total test result accordingly to its weight in the TTR. A smartphone needs a score from 0.5 to 1.5 in our tests to earn our best rating "very good", a score from 1.6 to 2.5 the rating "good", from 2.6 to 3.5 the rating "average" and from 3.6 to 4.5 the rating "adequate". Smartphones that score 4.6 or more are labelled "poor" to make them easier to avoid.
</p>
<div class="about-img-container">
        <img src="img/evaluation.jpg" class="about-member">
    </div>
<p>
But which disciplines do we use to evaluate the individual features and specifications?
</p>
<p>
There is no simple answer, unfortunately. Basically the test organization develops an evaluation function taking two major aspects into consideration:
</p>
<ul>
<li>"Absolute" aspects being set like legally prescribed thresholds, requirements deduced from industry standards, scientific or analytical limits or expert developed quality standards.
</li>
<br>
<li>
"Relative" aspects like the differences between the tested products
</li>
</ul>
<p>
A more touchable explanation goes as follows:
</p>
<p>
So, not meeting legal requirements or industry standards usually ends up in very bad test results. Or to give an example for scientific aspects: A central-heating boiler that completely transforms the energy into heat would gain a 0.5 as to the discipline "energy efficiency". Usually no product can meet such a theoretical target, but some come very close. These are only two examples on how the supporting points of an evaluation function can be found and defined.
</p>
<p>
Another aspect is the bandwidth of test results, meaning the difference between tested products as to all or select disciplines. Evaluating the best test result with a 0.5 and the worst one with 5.5 would mean to overweight small quality differences. So, always the finding of the supporting points for the evaluation function is dominated by the relevance for the consumer. Products showing similar quality in a certain discipline get a similar evaluation.
</p>
<p>
The next step is the one we introduced in the beginning of this chapter, meaning developing a TTR.
</p>
<p>
Having the TTR does not mean that the evaluation result is ready to be delivered. Under certain circumstances so called degradations are possible resp. necessary. What does that mean? Evaluating the overall quality of a product the assumption normally is that weaknesses and strengths of a product can compensate each other only up to a certain degree. A washing machine that works very energy efficient (scored 0.5), but does not deliver spotlessly clean laundry (scored 5.5) would end up in midterm evaluation which does not mirror the weakness in the core aspect in an appropriate manner.
</p>
<p>
Sometimes a bad evaluation is in the wake of knockout disciplines, e.g. a device that is electrically unsafe.
The test results always are enhanced with a detailed report that explains how the test was conducted, which disciplines have been checked and how they have been weighted.
</p>

</div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<?php 
  require("footer.php");
   ?>
</body>
<script type="text/javascript" src="js/cotest.js"></script>
<script type="text/javascript" src="js/review.js"></script>
<script type="text/javascript">
    function navselect(nav){
        var targetPanel=$(nav).attr("target");
        $(".about-nav-list").find("li").removeClass("active");
        $(nav).addClass("active");
        $(".about-article").hide();
        $(targetPanel).show();
    }
</script>
</html>