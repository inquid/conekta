<?php
require_once("lib/Conekta.php");

namespace gogl92\conekta;

/**
 * This is just an example.
 */
class AutoloadExample extends \yii\base\Widget
{
  $this->apiKey = "";
    public function run()
    {
      setApiKey($this->apiKey);
      $valid_order =
          array(
              'line_items'=> array(
                  array(
                      'name'        => 'Box of Cohiba S1s',
                      'description' => 'Imported From Mex.',
                      'unit_price'  => 20000,
                      'quantity'    => 1,
                      'sku'         => 'cohb_s1',
                      'category'    => 'food',
                      'tags'        => array('food', 'mexican food')
                      )
                 ),
                'currency'    => 'mxn',
                'metadata'    => array('test' => 'extra info'),
                'charges'     => array(
                    array(
                        'payment_method' => array(
                            'type'       => 'oxxo_cash',
                            'expires_at' => strtotime(date("Y-m-d H:i:s")) + "36000"
                         ),
                         'amount' => 20000
                      )
                  ),
                  'currency'      => 'mxn',
                  'customer_info' => array(
                      'name'  => 'John Constantine',
                      'phone' => '+5213353319758',
                      'email' => 'hola@hola.com'
                  )
              );

      try {
        $order = \Conekta\Order::create($valid_order);
      } catch (\Conekta\ProcessingError $e){
        echo $e->getMessage();
      } catch (\Conekta\ParameterValidationError $e){
        echo $e->getMessage();
      } finally (\Conekta\Handler $e){
        echo $e->getMessage();
      }
}
        return $result;
    }
}
