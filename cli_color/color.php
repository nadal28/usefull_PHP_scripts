<?php
  function color($texto, $color) {
    switch($color) {
      case 'green':
        $code = 2;
        break;
      case 'red':
        $code = 1;
        break;
      case 'yellow':
        $code = 3;
        break;
      case 'blue':
        $code = 4;
        break;
      default:
        $code = 7;
    }
    return "\033[3".$code."m".$texto."\033[0m";
  }
?>
