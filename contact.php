<?php
    $header_tag_extras = "";
    $header_section_styles = "";
    $header_section_metas = "";
    $header_section_scripts = "";
    $header_section_extras = "";
    $body_tag_extras = "";

    $body_section_styles = "";
    $body_section_scripts = "";

    // TODO: add the mail form
    $body_section_content = "<p> We would like to here from you at any time </p>";

    $navbar_content = array(
        array("index.php", "Home"),
        array("about.php", "About us."),
        array("#", "contact us.")
    );

    include ("templates/base.php");
?>
