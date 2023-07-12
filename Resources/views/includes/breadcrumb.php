<?php 
function breadcrumb(){
    $path = $_SERVER['REQUEST_URI'];
    if(str_contains($path, 'Cogip_Challenge/public/')){
        $path = str_replace('Cogip_Challenge/public/','',$path);
    }

    $breadcrumb_trail = explode("/", $path);
    foreach($breadcrumb_trail as $trail){
        $temp = $trail;
        $link = $temp == "dashboard" ? $temp = BASE_URL."dashboard" : $trail;
        if($trail != "/"){
            echo "<p class='breadcrumb__trail'><a href='$link' class='breadcrumb__trail--link'>" . $trail . "</a></p>";
        }
    }
}
?>