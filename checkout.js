function pay () {
    		var token = document.getElementById('token').value;
   		var firstname = document.getElementById('firstname').value;
    		var lastname = document.getElementById('lastname').value;
    		var card = document.getElementById('card').value;
		...
		...
 //use paymentData and include the transaction data elements in Converge defined fields. For a list of converge fields, refer to the developer guide

		var paymentData = {
   		ssl_txn_auth_token: token,
		ssl_first_name: firstname,
		ssl_last_name: lastname,
    		ssl_card_number: card,
		...
		...

		};

		//use callback to handle the transaction response appropriately

   	    	var callback = {
   	    		onError: function (error) {
// Take appropriate action to handle errors	    			
       	    	},
   	    		onDeclined: function (response) {
// Take appropriate action to handle decline 	    		},
   	    		onApproval: function (response) {
// Take appropriate action to handle approvals  	    		}
onDCCDecision: function (DCCResponse) {
// DCCResponse has fields “ssl_conversion_rate”, ssl_cardholder_amount”, “ssl_markup”, ssl_dcc_rate_provider”,  //ssl_cardholder_currency” Merchant display DCC fields, call ConvergeEmbeddedPayment.dccDecision() after customer makes // decision;
			},
			onThreeDSecure: function (threeDSecureResponse) {
// threeDSecureResponse has fields “acs_url”, “pareq” and “md”
// Redirect Cardholder to 3DSecure site, call ConvergeEmbeddedPayment.threeDSecureReturn() after redirect comeback.
			 }

   	    	};


   	    	ConvergeEmbeddedPayment.pay(paymentData, callback);
ConvergeEmbeddedPayment.dccDecision(dccOption, callback);
// dccOption = true/false
		ConvergeEmbeddedPayment.threeDSecureReturn(md, pares, callback);
    		return false;