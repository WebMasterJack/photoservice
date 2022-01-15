<?php
function resp ($data,$code,$text){
    return response()->json($data)->setStatusCode($code,$text);
}