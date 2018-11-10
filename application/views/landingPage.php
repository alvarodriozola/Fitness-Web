<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fitness Web</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('CSS/landingPage_style.css'); ?>">
</head>

<body>
    <img src="<?php echo base_url('image/landingPageBg.png');?>" class="landingImg">
    <header>
        <nav>
            <a href="<?php echo base_url()?>"><img src="<?php echo base_url('image/icon.svg');?>" alt="Fitnes Web" class="logo"></a>
            <ul>
                <li><a href="<?php echo site_url('auth/login') ?>" class="btnSignIn">Sign In</a></li>
                <li><a href="<?php echo site_url('auth/register') ?>" class="btnSignUp">Sign Up</a></li>
            </ul>
        </nav>
    </header>

    <div class="webDetail">
        <h1 class="title"> Fitness Web</h1>
        <h3 class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pulvinar pharetra eleifend. Nunc sit amet dapibus nisi. Sed sit amet feugiat nibh, id iaculis sapien. Cras accumsan lacus urna, vitae interdum velit sodales eu.</h3>
        <a href="<?php echo site_url('auth/register') ?>" class="btnGetStarted">Get Started</a>
    </div>
</body>
</html>
