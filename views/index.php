
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center auth">
            <?php

            require_once(ROOT.'/config/api.php');

            $params = array(
                'client_id'     => $client_id,
                'redirect_uri'  => $redirect_uri,
                'response_type' => 'code'
            );

            echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через ВК</a></p>';
            
            ?>
        </div>
    </div>
</div>
