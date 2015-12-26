<!DOCTYPE HTML html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head <?php echo $header_tag_extras ?>>
        <title> Cairo University, Faculty of Engineering. </title>
        <?php echo $header_section_styles ?>
        <?php echo $header_section_metas ?>
        <?php echo $header_section_scripts ?>
        <?php echo $header_section_extras ?>
        <link rel="stylesheet" href="static-files/css/base.css"></link>
    </head>

    <body <?php echo $body_tag_extras ?> >
        <!-- Header -->
        <?php include ("templates/headr.php"); ?>
        <!-- Header Ends -->

        <!-- Nav Bar -->
        <?php include ("templates/nav.php"); ?>
        <!-- Nav Bar Ends -->

        <?php echo $body_section_styles ?>
        <?php echo $body_section_scripts ?>

        <!-- Content -->
        <?php echo $body_section_content ?>
        <!-- Content Ends -->

        <!-- Footer -->
        <?php include ("templates/footer.php"); ?>
        <!-- Footer Ends -->
    </body>
</html>
