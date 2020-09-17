<?php

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($strength = 16) {
    global $permitted_chars;
    $input = $permitted_chars;
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}


function write_to_log($object,$data){
    $files = scandir('logs');
    $date = new DateTime('now');
    $date->setTimezone(new DateTimeZone('+5'));
    $time = $date->format('Y-m-d H:i:s.u T');
    $day = $date->format('Y-m-d');

    $filename = false;
    foreach ($files as $file) {
        $parts = explode('__',$file);
        if ($parts[0] == $day){
            $filename = $file;
        }
    }

    if ($filename){
        $log = fopen('logs/'.$filename,'a');
        fwrite($log,'['.$object.'] '.$data.' at <'.$time.'>'."\r\n");
        fclose($log);
    }else{
            $filename = $day.'__'.generate_string().'.log';
            $log = fopen('logs/'.$filename,'a');
            fwrite($log,'['.$object.'] '.$data.' at <'.$time.'>'."\r\n");
            fclose($log);
    }
}
