<?php
if ( stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) {
    header("Content-type: application/xhtml+xml");
    echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
}
else {
    header("Content-type: text/html");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>IWWW a IDAS2 semestrálka &raquo; Filmotéka</title>
        <link href="/style/screen.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/style/print.css" rel="stylesheet" type="text/css" media="print" />
        <!--
                                        <script type="text/javascript" src="/style/tb/jquery-latest.pack.js"></script>
                                        <script type="text/javascript" src="/style/tb/thickbox.js"></script>
				<link rel="stylesheet" href="/style/tb/thickbox.css" type="text/css" media="screen" />
        -->

        <link rel="stylesheet" href="/style/autocomplete/autocomplete.css" type="text/css" media="screen" />
        <script src="/style/autocomplete/jquery.js" type="text/javascript"></script>
        <script src="/style/autocomplete/dimensions.js" type="text/javascript"></script>
        <script src="/style/autocomplete/autocomplete.js" type="text/javascript"></script>


        <link type="text/css" media="screen" rel="stylesheet" href="/style/colorbox.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <script type="text/javascript" src="/style/colorbox/jquery.colorbox.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                //Examples of how to assign the ColorBox event to elements
                $("a[rel='example1']").colorbox();
                $("a[rel='example2']").colorbox({transition:"fade"});
                $("a[rel='example3']").colorbox({transition:"none", width:"75%", height:"75%"});
                $("a[rel='example4']").colorbox({slideshow:true});
                $(".single").colorbox({}, function(){
                    alert('Howdy, this is an example callback.');
                });
                $(".colorbox").colorbox();
                $(".youtube").colorbox({iframe:true, width:650, height:550});
                $(".iframe").colorbox({width: 450, height:280, iframe:true});
                $(".inline").colorbox({width:"50%", inline:true, href:"#inline_example1"});

                //Example of preserving a JavaScript event for inline calls.
                $("#click").click(function(){
                    $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                    return false;
                });
            });
        </script>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div id="logo">
                    <h1><a href="http://blog.trtkal.net">Trtkalovo pískoviště</a></h1>
                    <p><a href="/">filmotéka</a></p>
                </div>
            </div>
            <!-- end #header -->
            <div id="menu">
                <ul>
