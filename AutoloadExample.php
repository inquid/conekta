<?php
require_once("lib/Conekta.php");

namespace gogl92\conekta;

/**
 * This is just an example.
 */
class AutoloadExample extends \yii\base\Widget
{
    public function run()
    {
$result = "ok";
	Conekta::setApiKey('1tv5yJp3xnVZ7eK67m4h');
	try {
	  $charge = Conekta_Charge::create(array(
	    "amount"=> 51000,
	    "currency"=> "MXN",
	    "description"=> "Pizza Delivery",
	    "reference_id"=> "orden_de_id_interno",
	    "card"=> "tok_a4Ff0dD2xYZZq82d9"
	  ));
} catch (Conekta_Error $e) {
  $result .= $e->getMessage(); //Dev Message
  $result .= $e->message_to_purchaser;
  //El pago no pudo ser procesado
}
        return $result;
    }
}
