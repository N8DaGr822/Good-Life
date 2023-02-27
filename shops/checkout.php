<?php
	// Include the Square Connect API resources
require 'vendor/autoload.php';

  // dotenv is used to read from the '.env' file created
  $dotenv = new Dotenv\Dotenv(__DIR__);
  $dotenv->load();
  
	$accessToken = ($_ENV["USE_PROD"] == 'true')  ?  $_ENV["PROD_ACCESS_TOKEN"]
                                                 :  $_ENV["SANDBOX_ACCESS_TOKEN"];
  $locationId =  ($_ENV["USE_PROD"] == 'true')  ?  $_ENV["PROD_LOCATION_ID"]
                                                 :  $_ENV["SANDBOX_LOCATION_ID"];
												
   // setup authorization
  // setup authorization
  \SquareConnect\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);
  \SquareConnect\Configuration::getDefaultConfiguration()->setSSLVerification(FALSE);
  
  
      $checkout_api = new \SquareConnect\Api\CheckoutApi();
      $request_body = new \SquareConnect\Model\CreateCheckoutRequest(
        [
          "idempotency_key" => uniqid(),
          "order" => [
            "line_items" => [
            [
              "name" => "Total",
              "quantity" => "1",
              "base_price_money" => [
                // multiply by 100 due to it being in cents
                "amount" => intval($_POST['total'] * 100),
                "currency" => "USD"
				              ],

            ]],
			'taxes' => [
			[
				'name' => "Sales Tax",
				'percentage' => '10.85'
				]
				]],
			'ask_for_shipping_address' => true,
			'redirect_url' => 'http://www.goodlifenutritionkc.com/confirmation.php'
			
          ]
      );
      $response = $checkout_api->createCheckout($locationId, $request_body);
	  
	  //$checkout = $response->getCheckout();

    // this redirects to the Square hosted checkout page
    header("Location: ".$response->getCheckout()->getCheckoutPageUrl());

 



?>
