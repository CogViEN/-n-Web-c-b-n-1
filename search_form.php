<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link
            rel="stylesheet"
            href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"
        />
    </head>
    <body>
        <div class="ui-widget" style="margin-top: 8px;">
            <!-- Big image -->
            <!-- <img id="project-icon" height="200" src="images/transparent_1x1.png" class="ui-state-default" alt> -->
            <input id="project">
            <input type="hidden" id="project-id">
            <p id="project-description"></p>
        </div>

        <!-- Fix -->
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#project").autocomplete({
                    minLength: 0,
                    source: 'search.php',
                    focus: function( event, ui ) {
                        $( "#project" ).val( ui.item.label );
                        return false;
                    },
                    select: function( event, ui ) {
                        $( "#project" ).val( ui.item.label );
                        $( "#project-id" ).val( ui.item.value );
                        $( "#project-icon" ).attr( "src", "admin/products/photos/" + ui.item.photo );
                
                        return false;
                    }
                })
                .autocomplete( "instance" )._renderItem = function( ul, item ) {
                    return $( "<div>" )
                    .append( `<div>
                        <a href="product.php?id=${item.value}">
                            ${item.label} 
                            <br>
                            <img src='admin/products/photos/${item.photo}' height='50'>
                            </a>
                        </div>` )
                    .appendTo( ul );
                 };
            });
        </script>
    </body>
</html>
