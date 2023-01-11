<?php

    //transformar a data no padrao do banco aaaa-mm-dd                
    function dataBanco($dtnasc){
        
        $dtnasc = explode("/", $dtnasc); // [dd][mm][aaaa]
        $dtnasc = array_reverse($dtnasc); //[aaaa][mm][dd]
        $dtnasc = implode("-", $dtnasc); //aaaa-mm-dd
    
        return $dtnasc;
        
    }
    
    //Função para tratar a data que veio do banco para a tela
    function dataView($dtnasc){
        
        $dtnasc = explode("-", $dtnasc); // [dd][mm][aaaa]
        $dtnasc = array_reverse($dtnasc); //[aaaa][mm][dd]
        $dtnasc = implode("/", $dtnasc); //aaaa-mm-dd

        // $str = $dtnasc; //"1978-12-15";
        // $niv = date("d/m/Y", strtotime($str));
    
        return $dtnasc;
        
    }