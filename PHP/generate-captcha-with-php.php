<?php
    create_image();
    display();
    function display()
    {
?>

<div class="col-md-12">
    <div class="form-group">
        <div class="col-sm-6">
            <span id="show_image"> <img src="captcha_image.png"> </span>
            <!-- <input type="button" value="Refresh Captcha" class="btn btn-success" onclick="location.reload();"> -->
            <input type="button" value="Refresh Captcha" class="btn btn-success" id="reload">
        </div>
        <div class="col-sm-3">
            <div style="display:block;margin-bottom:20px;margin-top:20px;">
                <input type="text" class="form-control" name="captcha_input" id="captcha_input" placeholder="Enter your captcha" autocomplete="off"/>
                <input type="hidden" name="flag" value="1"/>
            </div>
        </div>
    </div>
</div>
 
 
<?php
    }
 
    function  create_image()
    {
        $image = imagecreatetruecolor(200, 50);       
        $background_color = imagecolorallocate($image, 255, 255, 255);  
        imagefilledrectangle($image,0,0,200,50,$background_color); 
 
        $line_color = imagecolorallocate($image, 64,64,64);
        $number_of_lines=rand(3,7);
 
        for($i=0;$i<$number_of_lines;$i++)
        {
            imageline($image,0,rand()%50,250,rand()%50,$line_color);
        }
 
        $pixel = imagecolorallocate($image, 0,0,255);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixel);
        }  
 
        $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $length = strlen($allowed_letters);
        $letter = $allowed_letters[rand(0, $length-1)];
        $word='';
        $text_color = imagecolorallocate($image, 0,0,0);
        $cap_length=6;// No. of character in image
        for ($i = 0; $i< $cap_length;$i++)
        {
            $letter = $allowed_letters[rand(0, $length-1)];
            imagestring($image, 5,  5+($i*30), 20, $letter, $text_color);
            $word.=$letter;
        }
 
        $_SESSION['captcha_string'] = $word;
 
        imagepng($image, "captcha_image.png");
    }
?>