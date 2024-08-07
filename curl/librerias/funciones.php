<?php
/* ****************************************************************************** Debug functions ********************************************************************************** */

function p_() {

    $args = func_get_args();
    $num_args = func_num_args();
    $label = "";

    $font_size = '14';
    $box_size = '10';
    $has_todo = false;
    $bg_color_div = 'white';
    $show_div = true;

    if($num_args>0){
        $last_arg = func_get_arg($num_args-1);
        echo "<div><pre>";
        echo "<div style='margin: 10px; margin-top: 70px; border:0px; padding: 2px;'>";
        $background_color = 'green';
        if(is_string($last_arg) && ($last_arg!="") && substr($last_arg,0,6)==='__lab:'){
            $label = substr($last_arg, 6, strlen($last_arg));
            unset($args[$num_args-1]);
            $label_error = strtolower($label);
            $background_color = '#FF8000';
            if($label_error == 'error' || $label_error == 'exception'){
                $label = 'Exception';
                $background_color = '#C42732';
            }
            if($label_error == 'dev_info'){
                $label = 'Development info';
                $background_color = '#C42732';
                $font_size = '12';
                $box_size = '5';
            }
            if($label_error == 'todo'){
                $label = '!!!!!!!!!! Todo !!!!!!!!!!';
                $background_color = '#f442b0';
                $bg_color_div = '';
                $font_size = '12';
                $box_size = '5';
                $has_todo = true;
            }
            if($label_error == 'empty'){
                $show_div=false;
            }
        }else{
            $label = "PRINT";
        }

        $file_info_used = print_debug('1', false, true);

        // if(is_string($last_arg) && ($last_arg!="") && substr($last_arg,0,4)==='__^:'){
        // 	$key_begins_with = substr($last_arg, 3, strlen($last_arg));
        // 	unset($args[$num_args-1]);
        // 	$label = "BEGINS WITH";
        // }
        if($show_div){
            echo "<div style='margin:10px; margin-bottom:10px;'>".
                "<span style=\"background-color: $background_color; color: white; font-size: 12px; padding: ".$box_size ."px; border: 2px solid black;\"><b>"
                . $label . "</b></span></div>";
        }

        $count = 1;

        foreach($args as $arg){
            if($show_div){
                echo "<div style='margin: 10px 10px 2px 10px; border:2px solid black; padding: 5px; background-color: $bg_color_div;'>";
            }
            if(count($args)>1){
                echo "<span style='font-size: 12px; font-weight: bold; color: red; padding:2px;'>Variable: ".$count."</span></br>";
            }
            if(is_string($arg)){
                if(is_null($arg) || $arg == 'null'){
                    echo "<span style='color:red; font-weight: bold; font-size:".$font_size."px;'>".$arg."</span>";
                }else{
                    echo "<span style='color:green; font-weight: bold; font-size: ".$font_size."px;'>".$arg."</span>";
                }
            }else{
                print_r($arg);
            }
            if($show_div){
                echo "</div>";
            }
            // echo "<div style=\"height:10px;\"></div>";
            ++$count;
        }
        echo "<div style='font-style:italic; padding-left: 10px; font-size: 10px; text-align:right; margin:0px; padding: 0px;'>$file_info_used</div></div>";
        echo "</pre></div>";
        // echo "<br/>";
    }
    return;
}



/**
 * @param int $step_back
 * @param bool $fb
 * @param bool $file_info_only
 * @return string
 */
function print_debug($step_back=2, $fb=false, $file_info_only=false){

    $debug = debug_backtrace();
    $function = $debug[$step_back]['function'];
    $line = isset($debug[$step_back]['line']) ? $debug[$step_back]['line'] : -1;
    $args = isset($debug[$step_back]['args']) ? $debug[$step_back]['args'] : -1;
    $file = isset($debug[$step_back]['file']) ? $debug[$step_back]['file'] : -1;
    if($file_info_only){
        return $file.' => LINE:'.$line;
    }

    if($fb==false){
        d_('called function:'.$function);
        d_('called line:'.$line);
        d_('called arguments:'.$args);
        d_('called file:'.$file);
    }else{
        fb_('called function:'.$function);
        fb_('called line:'.$line);
        fb_('called arguments:'.$args);
        fb_('called file:'.$file);
    }
}