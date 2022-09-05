<?php
#Plantilla principal del sistema

$this->load->view('template/head');

$this->load->view('template/headerNavOpen');
$this->load->view($navPrincipal);
$this->load->view('template/headerNavClose');

$this->load->view('template/slide');

$this->load->view($contenidoPrincial);

$this->load->view('template/footer');