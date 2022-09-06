<?php if ( ! defined('BASEPATH')) exit('No esta permitido el acceso'); 
/**
*--------------------------------------------------------------------------------------#
*-------------------------------- CLASES DEL FORMULARIO --------------------------------#
*---------------------------------------------------------------------------------------#                                                                                                                                          
*Clase para la definición de los elementos del formulario
*input,textarea,select,botones y href
*@Version: 1.0                                                                
*@Date:    01-07-2016                                                        
*@Author:  Ing. Isidoro Cornelio Landa <hazuer_icl@hotmail.com>                                                  
*---------------------------------------------------------------------------------------#
*/
Class Crearelemento 
{

    function Input($atributosInput)
    {
        unset($this->input);
        $CI = & get_instance(); 
        $this->psmu = $CI->session->userdata('psmu');

        $this->input="<input ";//Apertura del input
        
        //Volcamos los atributos del input      
        foreach ($atributosInput AS $campo => $valor) 
        {
            $this->input .="$campo = '$valor' ";
        }

        #Perfil para solo consulta
        if($this->psmu==3)
        {
            $this->input .=" disabled='disabled' readonly='readonly'"; //Anexar "restricciones" 
        }
        $this->input .=" />"; //Cerrar el input
        
        echo $this->input;
    }

    function Textarea($atributosTextarea,$text)
    {
        unset($this->textarea);
        $CI = & get_instance(); 
		$this->psmu = $CI->session->userdata('psmu');

        $this->textarea="<textarea ";//Apertura1 del textarea
        //Volcamos los atributos del textarea      
        foreach ($atributosTextarea AS $campo => $valor) 
        {
            $this->textarea .=" $campo = '$valor' ";
        }
        #Perfil para solo consulta
        if($this->psmu==3)
        {
            $this->textarea .=" disabled='disabled' readonly='readonly'";//Anexar "restricciones" 
        }
        $this->textarea.=">";//Apertura2 del textarea
        $this->textarea.=$text;//Agregar la descripcion,texto,valor,etc
        $this->textarea.="</textarea>";//Cerrar el textarea
        
        echo  $this->textarea;
    }

	function Select($atributosSelect,$selected,$sqlSelect)
    {
        unset($this->select);
        $CI = & get_instance(); 
		$this->psmu = $CI->session->userdata('psmu');
        $this->sql_datos=$sqlSelect;
        $this->selected=$selected;

        $this->select = "<select ";//Apertura1 del select
        //Volcamos los atributos        
        foreach ($atributosSelect AS $campo => $valor) 
        {
            $this->select .=" $campo = '$valor' ";
        }
        #Perfil para solo consulta
        if($this->psmu==3)
        {
            $this->select.=" disabled='disabled'"; //Anexar "restricciones" 
        }

        $this->select .=">";//Apertura2 del select
       
        $this->select .= "<option value=''>Selecciona</option>";
        $rstSelect = $CI->db->query($this->sql_datos);
        $result = $rstSelect->result_array();
            foreach($result as $res)
            {
                $r = array_values($res);
                $Tex1 = $r[0];
                $Tex2 = $r[1];
                $this->select .= "<option ";
                if ($this->selected==$Tex1)$this->select .= "selected value=\"$Tex1\">$Tex2";
                else $this->select .= " value=\"$Tex1\">$Tex2 ";
                $this->select .= "</option>";
            }
        $this->select .= "</select>";//Cierre del select
        echo $this->select;
    }

    function Button($atributosButton,$btnText,$iconBtn)
    {
        unset($this->button);
        $CI = & get_instance(); 
		$this->psmu = $CI->session->userdata('psmu');

        #Perfil para solo consulta
        if($this->psmu==3)
        {
        $this->button = " ";
        }
        else
            {
             
                $this->button = "<button ";//Apertura1 de boton
                //Volcamos los atributos        
                foreach ($atributosButton AS $campo => $valor) 
                {
                    $this->button .=" $campo = '$valor' ";
                }
                $this->button .= ">";//Apertura2 de boton

                $this->button .="<i class='$iconBtn'></i> ";

                $this->button .=$btnText;//Descripcion,texto, valor, etc

                $this->button .= "</button>"; //Cierre del boton
             
            }
        echo $this->button;
    }

    function Link($href, $valuesUrl,$btnClass,$btnText,$iconFa)
    {
        unset($this->link);
        $CI = & get_instance(); 
        $this->psmu = $CI->session->userdata('psmu');

        $this->href = $href;
        $this->valuesUrl = $valuesUrl;
        $this->btnClass=$btnClass;
        $this->btnText=$btnText;
        $this->iconFa = $iconFa;

        #Perfil para solo consulta
        if($this->psmu==3)
        {
            $this->link = " ";
        }
        else
            {
                $this->link = "<a class='".$this->btnClass."' href='".$this->href."".$this->valuesUrl."'> <i class='".$this->iconFa."'></i> ".$this->btnText."</a> ";
            }
        echo $this->link;
    }

    function LoadModal($href, $valuesUrl,$btnClass,$btnText,$iconFa)
    {
        unset($this->link);
        $CI = & get_instance(); 
        $this->psmu = $CI->session->userdata('psmu');

        $this->href = $href;
        $this->valuesUrl = $valuesUrl;
        $this->btnClass=$btnClass;
        $this->btnText=$btnText;
        $this->iconFa = $iconFa;

        #Perfil para solo consulta
        if($this->psmu==3)
        {
            $this->link = " ";
        }
        else
            {
                $this->link = "<a class='".$this->btnClass."' href='".$this->href."".$this->valuesUrl."' data-toggle=\"ajaxModal\"> <i class='".$this->iconFa."'></i> ".$this->btnText."</a> ";
            }
        echo $this->link;
    }
}
?>