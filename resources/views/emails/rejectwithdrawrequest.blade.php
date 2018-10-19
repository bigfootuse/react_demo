<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml"> 
   <head>
      <title>{{$f_coin}}</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet">
      <style type="text/css">
         body{
         width: 100%; 
         margin:0; 
         padding:0; 
         -webkit-font-smoothing: antialiased;
         }
         p,h1,h2,h3,h4{
         margin-top:0;
         margin-bottom:0;
         padding-top:0;
         padding-bottom:0;
         }
         html{
         width: 100%; 
         }
         table{
         font-size: 14px;
         border: 0;
         }
         /* ----------- responsivity ----------- */
         @media only screen and (max-width: 640px){
         /*------ top header ------ */
         .header-bg{width: 440px !important; height: 10px !important;}
         .main-header{line-height: 28px !important;}
         .main-subheader{line-height: 28px !important;}
         .container-middle{width: 420px !important;}
         .mainContent{width: 400px !important;}
         .main-image{width: 400px !important; height: auto !important;}
         .banner{width: 400px !important; height: auto !important;}
         /*------ sections ---------*/
         .section-item{width: 400px !important;}
         .section-img{width: 400px !important; height: auto !important;}
         /*------- prefooter ------*/
         .prefooter-header{padding: 0 10px !important; line-height: 24px !important;}
         .prefooter-subheader{padding: 0 10px !important; line-height: 24px !important;}
         /*------- footer ------*/
         .top-bottom-bg{width: 420px !important; height: auto !important;}
         }
         @media only screen and (max-width: 479px){
         /*------ top header ------ */
         .header-bg{width: 280px !important; height: 10px !important;}
         .top-header-left{width: 260px !important; text-align: center !important;}
         .top-header-right{width: 260px !important;}
         .main-header{line-height: 28px !important; text-align: center !important;}
         .main-subheader{line-height: 28px !important; text-align: center !important;}
         /*------- header ----------*/
         .logo{width: 260px !important;}
         .nav{width: 260px !important;}
         .container{width: 397px !important;}
         .container-middle{width: 260px !important;}
         .mainContent{width: 240px !important;}
         .main-image{width: 240px !important; height: auto !important;}
         .banner{width: 240px !important; height: auto !important;}
         /*------ sections ---------*/
         .section-item{width: 240px !important;}
         .section-img{width: 240px !important; height: auto !important;}
         /*------- prefooter ------*/
         .prefooter-header{padding: 0 10px !important;line-height: 28px !important;}
         .prefooter-subheader{padding: 0 10px !important; line-height: 28px !important;}
         /*------- footer ------*/
         .top-bottom-bg{width: 260px !important; height: auto !important;}
         }
         @media only screen and (max-width: 384px){
         .container {
         width: 367px !important;
         }
         }
         @media only screen and (max-width: 375px){
         .container {
         width: 358px !important;
         }
         }
         @media only screen and (max-width: 320px){
         .container {
         width: 303px !important;
         }
         }
         ::selection {
         background: #ff2f2f; /* WebKit/Blink Browsers */
         }
         ::-moz-selection {
         background: #ff2f2f; /* Gecko Browsers */
         }
         /* Responsive */
         @media only screen and (max-width:600px) {
         /* Tables
         parameters: width, alignment, padding */
         table[class=scale] { width: 100%!important; }
         table[class=scale-300] { width: 100%!important; height: 300px!important; }
         table[class=scale-90] { width: 90%!important; }
         /* Td */
         td[class=scale-left] { width: 100%!important; text-align: left!important;}
         td[class=scale-height] { height: 70px!important;}
         td[class=scale-left-bottom] { width: 100%!important; text-align: left!important; padding-bottom: 24px!important; }
         td[class=scale-left-top] { width: 100%!important; text-align: left!important; padding-top: 24px!important; }
         td[class=scale-left-all] { width: 100%!important; text-align: left!important; padding-top: 24px!important; padding-bottom: 24px!important; }
         td[class=scale-center] { width: 100%!important; text-align: center!important;}
         td[class=scale-center-both] { width: 100%!important; text-align: center!important; padding-left: 20px!important; padding-right: 20px!important; }
         td[class=scale-center-bottom] { width: 100%!important; text-align: center!important; padding-bottom: 24px!important; }
         td[class=scale-center-top] { width: 100%!important; text-align: center!important; padding-top: 24px!important; }
         td[class=scale-center-all] { width: 100%!important; text-align: center!important; padding-top: 24px!important; padding-bottom: 24px!important; padding-left: 20px!important; padding-right: 20px!important; }
         td[class=scale-right] { width: 100%!important; text-align: right!important;}
         td[class=scale-right-bottom] { width: 100%!important; text-align: right!important; padding-bottom: 24px!important; }
         td[class=scale-right-top] { width: 100%!important; text-align: right!important; padding-top: 24px!important; }
         td[class=scale-right-all] { width: 100%!important; text-align: right!important; padding-top: 24px!important; padding-bottom: 24px!important; }
         td[class=scale-center-bottom-both] { width: 100%!important; text-align: center!important; padding-bottom: 24px!important; padding-left: 20px!important; padding-right: 20px!important; }
         td[class=scale-center-top-both] { width: 100%!important; text-align: center!important; padding-top: 24px!important; padding-left: 20px!important; padding-right: 20px!important; }
         td[class=reset] { height: 0px!important; }
         td[class=scale-center-topextra] { width: 100%!important; text-align: center!important; padding-top: 84px!important; }
         img[class="reset"] { display: inline!important; }
         img[class="scale-inline"] { display: inline!important; }
         }
      </style>
   </head>
   <body style="margin-top: 0; margin-bottom: 0; background: #e6e6e6; padding-top: 0; padding-bottom: 0; width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;">
      <!-- Header -->
      <!--  top header   -->
      <table border="0" width="620" cellpadding="0" cellspacing="0" align="center" class="container">
         <tr>
            <td height="35" mc:edit="copy1">&nbsp;</td>
         </tr>
         <tr bgcolor="">
            <td align="center">
               <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">
                  <tr>
                     <td>
                        <table border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="top-header-left">
                           <tr>
                              <td align="center">
                                 <table border="0" cellpadding="0" cellspacing="0" class="date">
                                    <tr>
                                       <td align="center">
                                          <center><a href="" style="display: block; border-style: none !important; border: 0 !important;" class="l_img"><img editable="true" mc:edit="logo" width="198" height="50" border="0" style="display: block;" src="{{ URL::asset('assets/images/logo.png') }}" alt="logo"  style="border-radius: 1px;"/></a></center>
                                       </td>
                                       <td>&nbsp;&nbsp;</td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                        <table border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="top-header-right">
                           <tr>
                              <td width="30" height="20"></td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <!-- Header  -->
      </table>
      <!--  end top header  -->
      </td>
      </tr>
      </table>
      <!-- Intro -->
      <table align="center" border="0" cellpadding="0" cellspacing="0" class="scale" data-thumb="#" width="100%" mc:variant="Intro8386" mc:repeatable="Intro8386">
         <tr>
            <td>
               <table align="center" border="0" cellpadding="0" cellspacing="0" class="scale" style="background-color: #FFFFFF" width="620">
                  <tr>
                     <td height="50" mc:edit="space">&nbsp;</td>
                  </tr>
                  <tr>
                     <td align="center">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="scale-90" width="490">
                           <tr>
                              <td>
                                 <h1 style="    font-family: 'Ubuntu', sans-serif;">Reject Withdrawal Request</h1>
                                 <br>
                                 <hr style="    border-top: 1px solid #2bb673;">
                                 <br>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <h2 style="font-family: 'Ubuntu', sans-serif;">Hello {{$user->username}},</h2>
                             
                              </td>
                           </tr>
                           <tr>
                              <td align="left" style="font-family: 'Ubuntu', sans-serif; font-size: 14px; color: #1c1c1c; line-height: 28px;" mc:edit="copy4">
                                 <p>   
                                 <h4 style="font-weight: normal; font-size: 15px; line-height: 23px;">Your {{$f_coin}} account , you Withdrawal Request For {{ number_format($amount,8) }}  {{ $coin }}  Is Rejected. Your Total {{ $coin }} Balance Is {{ number_format($balance,8) }} {{ $coin }}.</h4>
                                 </p>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td height="50" valign="bottom">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="scale-90" width="550">
                           <tr>
                              <td height="1" style="background-color: #E8E8E8"></td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
      <table align="center" border="0" cellpadding="0" cellspacing="0" class="scale w3ls" data-thumb="#" style="background-color: #FFFFFF" width="620px" mc:variant="Footer7059" mc:repeatable="Footer7059">
         <!-- prefooter  -->
         <tr>
            <td>
            </td>
         </tr>
         <!-- end prefooter  -->
         <table border="0" width="620" cellpadding="0" cellspacing="0" align="center" class="container w3">
            <tr bgcolor="ffffff">
               <td height="40"></td>
            </tr>
            <tr bgcolor="ffffff">
               <td align="center" mc:edit="copy11" style="color: #939393; font-size: 11px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;" class="prefooter-subheader">
                  <multiline>
                     <span style="color: #314c67">Email : </span> 
                     support@{{ $f_coin }}.io
                  </multiline>
               </td>
            </tr>
            <tr bgcolor="ffffff">
               <td height="40"></td>
            </tr>
            <!-- end main Content -->
            <!-- footer  -->
            <tr style="background: #f7941e;">
               <td height="14"></td>
            </tr>
            <tr style="background: #f7941e;">
               <td mc:edit="copy12" align="center" style="color: #fff; font-size: 10px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                  <a style="color:#fff; text-decoration:none;" href="{{URL('')}}" target="_blank">{{$f_coin}} </a> © Copyright 2018 . All Rights Reserved
               </td>
            </tr>
            <tr style="background: #f7941e;">
               <td height="14"></td>
            </tr>
         </table>
      </table>
   </body>
</html>
