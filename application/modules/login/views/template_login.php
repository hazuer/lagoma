<?php
#Plantilla que se utiliza para realizar la validación de usuario
#No carga ningun navBar con opciones

$data['titlePage']=$titlePage;
$data['descTitle']=$descTitle;

$this->load->view('template/head',$data);
$this->load->view($contenidoPrincial,$data);
$this->load->view('template/footer');