<?PHP
function display_html_head($title){
    echo <<<HTML
<!DOCTYPE>
<html>
    <head>
        <title>$title</title>
    </head>
    <body>
HTML;
}

function display_html_foot(){
    echo <<<HTML
    </body>
    
    </html>
HTML;
}

?>