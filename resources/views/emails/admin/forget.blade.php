<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC" rel="stylesheet">
<title> Borrowmyne </title>
<style type="text/css">
body { padding: 0px !important; margin: 0 !important; width: 100% !important; -webkit-text-size-adjust: 100% !important; -ms-text-size-adjust: 100% !important; font-family: 'Noto Sans SC', sans-serif; -webkit-font-smoothing: antialiased !important;  background: #f5f5f5;}
a { color: #382F2E; }
p, h1 { margin: 0; }
div, p, ul, h1 { margin: 0; }
.banner { 
    background-color: rgba(0,0,0,0.12);
            background-blend-mode: multiply;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 50% 0%;
            height: 290px;
            position: relative;
}
.banner_content { position: absolute; top: 20px; left: 0; right: 0; bottom: 0; text-align: center; }
.content_div { color: #333; margin-top: 0; padding: 35px 0px 15px; }
.bigger { font-size: 24px; }
.main_back { background-color: #fff; background-repeat: no-repeat; background-size: 100% 100%; background-image: url("bg.jpg"); border: none; margin: 20px auto; max-width: 580px; padding: 25px 25px 0px; }

.bgItem { background: #ffffff; }
p { color: #333; line-height: 19px; font-weight: normal; }
p strong { color: #000 }
.content_div > p { display: block; font-size: 14px; line-height: 27px; margin-top: 10px; color: #333; }
.content_div a { font-weight: 400; color: #333; }
.content_div > p:nth-child(1) { margin: 0; }
.banner img { max-width: 100%; width: 100%; }
.footer { margin-top: 0; padding: 10px 0 15px; text-align: center; }
.footer > p { font-size: 15px; }
.footer span { background-color: #e9e8e8; display: inline-block; height: 1px; margin-bottom: 12px; width: 170px; }
.footer ul { display: block; margin: 7px 0 0; padding: 0; text-align: center; }
.footer ul li { display: inline-block; margin: 0 7px; }
.footer ul li a { color: #333; font-size: 12px; text-decoration: none; }
.last { margin-top: 0 !important; }
.review_banner_wrapper{position: absolute;top: 42%;left: 50%;text-align: center;transform: translate(-50%,-50%);}

@media(min-width:320px) and (max-width:767px) {
 .review_banner_wrapper img { max-width: 250px;width: auto; }
 body{background: transparent;}
}
</style>
</head>
<body>


<div class="main_back">
  <div class="bgBody">
    <div class="banner" style="background-image:url({{ env('APP_URL') }}/emails/review_banner.jpg);">
        <div class="review_banner_wrapper">
          <img src="{{ env('APP_URL') }}/frontent/images/logo.png" alt="Logo" style="width: 50%;margin-top: 7em;">
        </div>
    </div>
    <div class="content_div" >
      <p style="font-weight: bold;font-size: 19px;">Hello Admin,</p>
      <p>Oh! Did you forget the password for your user account? Don’t worry! Simply, click the link below and set a new password.</p>

      <p style="text-align: center; margin: 20px 0;"><a href="{{$user_info['url']}}" style="background-color: #4B4B4B;color: #fff; font-weight: 500; padding: 9px 20px; text-decoration: none; border-radius: 6px; font-size: 14px; font-weight: 500; display: block;">Reset Your Password</a></p>


     <p>Regards,</p>
       <p class="last">The Bureaucrat Team</p>
       @if(@$user_info['fb_link'] && $user_info['twitter_link'] && $user_info['instagram_link'] && $user_info['pinrest_link'] )
       <p>Follow us</p>
       <p>
        <a href="{{ $user_info['fb_link'] }}" style="margin-right: 5px;"><img src="https://borrowmyne.softuvo.xyz/emails/social_icon1.png"></a>
        <a href="{{ $user_info['twitter_link'] }}" style="margin-right: 5px;"><img src="https://borrowmyne.softuvo.xyz/emails/social_icon2.png"></a>
        <a href="{{ $user_info['instagram_link'] }}" style="margin-right: 5px;"><img src="https://borrowmyne.softuvo.xyz/emails/insta.png"></a>
        <a href="{{ $user_info['pinrest_link'] }}" style="margin-right: 5px;"><img src="https://borrowmyne.softuvo.xyz/emails/social_icon5.png"></a>
      </p>
      @endif
      <!-- <p><a href="../Terms-conditions.php"> Terms and conditions</a> | <a href="../Privacy-policy.php"> Privacy Policy </a> </p> -->
    </div>
    <div class="footer"> <span></span>
      <p style="font-size: 12px; color: #333;">© Copyright 2019 <a style="text-decoration: none; font-weight: 600;" href="{{ env('APP_URL') }}">The Bureaucrat.</a> All Rights Reserved.</p>
    </div>
  </div>
</div>    
</body>
</html>