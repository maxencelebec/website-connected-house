<?php

class Graphics extends Model{

    var $table = "graph_test";

    function get_label() {

        return $this->find(

            array(

                "order"=> "id DESC",
                "fields"=> "id,timestamp,type,nom,valeur",
                "condition"=> "nom = 'temp1'"

            )

        );

    }
}