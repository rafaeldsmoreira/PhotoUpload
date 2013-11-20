
<?php

class checksDate {

    function dataAtual() {
        ini_set('date.timezone', 'America/SAO_PAULO');
        return date("Y-m-d H:i:s");
    }

    function dataAtualSimples() {
        ini_set('date.timezone', 'America/SAO_PAULO');
        return date("Y-m-d");
    }

    public function convertsDate($date) {
        if (strstr($date, '/')) {
            $date = explode('/', $date);
            $parsedData = $date[2] . "-" . $date[1] . "-" . $date[0];
            return $parsedData;
        }

        if (strstr($date, '-')) {
            $date = explode('-', $date);
            $parsedData = $date[2] . "/" . $date[1] . "/" . $date[0];
            return $parsedData;
        }
    }

    public function convertsDatehora($date) {
        if (strstr($date, '/')) {
            $dateAux = explode(' ', $date);
            $date1 = $dateAux[0];
            $hora = $dateAux[1];
            return $this->convertsDate($date1) . " $hora";
        }
        if (strstr($date, '-')) {
            $dateAux = explode(' ', $date);
            $date1 = $dateAux[0];
            $hora = $dateAux[1];
            return $this->convertsDate($date1) . " $hora";
        }
    }
    
    
    function dateTime() {
        ini_set('date.timezone', 'America/SAO_PAULO');
        return date("Y-m-d_His");
    }
    
     function horaAtual() {
        ini_set('date.timezone', 'America/SAO_PAULO');
        return date("H:i:s");
    }

}

?>
