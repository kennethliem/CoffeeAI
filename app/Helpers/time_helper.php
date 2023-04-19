<?php
function secondsToTime($data)
{
    try {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$data");
        return $dtF->diff($dtT)->format('The tokens will expire within %a days, %h hours, %i minutes and %s seconds');
    } catch (Exception) {
        return $data;
    }
}
