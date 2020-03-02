<?php

use App\Deposit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/**
 *  ... Please MODIFY this file ...
 *
 *
 *  User-defined function (IPN) for new payments
 *  ---------------------------------------------
 *
 *  User-defined function - cryptobox_new_payment($paymentID = 0, $payment_details = array(), $box_status = "").
 *  Use this function to send confirmation email, update database, update user membership, etc.
 *  
 *  This IPN function will automatically appear for each new payment usually two times : 
 *  a) when a new payment is received, with values: $box_status = cryptobox_newrecord, $payment_details[confirmed] = 0
 *  b) and a second time when existing payment is confirmed (6+ confirmations) with values: $box_status = cryptobox_updated, $payment_details[confirmed] = 1.
 *  
 *  But sometimes if the payment notification is delayed for 20-30min, the payment/transaction will already be confirmed and the function will
 *  appear once with values: $box_status = cryptobox_newrecord, $payment_details[confirmed] = 1
 *  
 *  If payment received with correct amount, function receive: $payment_details[status] = 'payment_received' and $payment_details[user] = 11, 12, etc (user_id who has made payment)
 *  If incorrectly paid amount, the system can not recognize user; function receive: $payment_details[status] = 'payment_received_unrecognised' and $payment_details[user] = ''
 *
 *  Function cryptobox_new_payment($paymentID = 0, $payment_details = array(), $box_status = "")
 *  gets $paymentID from your table crypto_payments, $box_status = 'cryptobox_newrecord' OR 'cryptobox_updated' (description above)
 *  and payment details as array -
 * 
 *  1. EXAMPLE - CORRECT PAYMENT -
 *  -----------------------------------------------------
 *  $payment_details = Array
 *        {
 *            "status":"payment_received"
 *            "err":""
 *            "private_key_hash":"85770A30B97D3AC035EC32354633C1614CF76E1621A20B143A1FBDAD1FCBF25A6EC6C5F99FFF495DD1836E47AE0E37942EC0B04867BD14778B2C93967E4A7FAC" // sha512 hash of gourl payment box private_key
 *            "box":"120"
 *            "boxtype":"paymentbox"
 *            "order":"order15620A"
 *            "user":"user26"
 *            "usercountry":"USA"
 *            "amount":"0.0479166"
 *            "amountusd":"11.5"
 *            "coinlabel":"BTC"
 *            "coinname":"bitcoin"
 *            "addr":"14dt2cSbvwghDcETJDuvFGHe5bCsCPR9jW"
 *            "tx":"95ed924c215f2945e75acfb5650e28384deac382c9629cf0d3f31d0ec23db08d"
 *            "confirmed":0
 *            "timestamp":"1422624765"
 *            "date":"30 January 2015"
 *            "datetime":"2015-01-30 13:32:45"
 *        }
 *         						
 *  2. EXAMPLE - INCORRECT PAYMENT/WRONG AMOUNT -
 *  -----------------------------------------------------
 *     $payment_details = Array 
 *        {
 *            "status":"payment_received_unrecognised"
 *            "err":"An incorrect bitcoin amount has been received"
 *            "private_key_hash":"85770A30B97D3AC035EC32354633C1614CF76E1621A20B143A1FBDAD1FCBF25A6EC6C5F99FFF495DD1836E47AE0E37942EC0B04867BD14778B2C93967E4A7FAC" // sha512 hash of gourl payment box private_key
 *            "box":"120"
 *            "boxtype":"paymentbox"
 *            "order":""
 *            "user":""
 *            "usercountry":""
 *            "amount":"12.26"
 *            "amountusd":"0.05"
 *            "coinlabel":"BTC"
 *            "coinname":"bitcoin"
 *            "addr":"14dt2cSbvwghDcETJDuvFGHe5bCsCPR9jW"
 *            "tx":"6f1c6f34189a27446d18e25b9c79db78be55b0bb775b1768b5aa4520f27d71a8"
 *            "confirmed":0
 *            "timestamp":"1422623712"
 *            "date":"30 January 2015"
 *            "datetime":"2015-01-30 13:15:12"
 *        }	 
 *        
 *        Read more - https://gourl.io/api-php.html#ipn
 */

function cryptobox_new_payment($paymentID = 0, $payment_details = array(), $box_status = "")
{
	$recordExists = run_sql("select paymentID as nme FROM `crypto_payments` WHERE paymentID = " . intval($paymentID));
	if (!$recordExists) run_sql("INSERT INTO `crypto_payments` VALUES(" . intval($paymentID) . ",'" . addslashes($payment_details["user"]) . "','" . addslashes($payment_details["order"]) . "'," . floatval($payment_details["amount"]) . "," . floatval($payment_details["amountusd"]) . ",'" . addslashes($payment_details["coinlabel"]) . "'," . intval($payment_details["confirmed"]) . ",'" . addslashes($payment_details["status"]) . "')");

	// Received second IPN notification (optional) - Bitcoin payment confirmed (6+ transaction confirmations)
	if ($recordExists && $box_status == "cryptobox_updated")  run_sql("UPDATE `crypto_payments` SET txconfirmed = " . intval($payment_details["confirmed"]) . " WHERE paymentID = " . intval($paymentID));

	// Onetime action when payment confirmed (6+ transaction confirmations)
	$processed = run_sql("select processed as nme FROM `crypto_payments` WHERE paymentID = " . intval($paymentID) . " LIMIT 1");
	if (!$processed && $payment_details["confirmed"]) {
		// ... Your code ...

		// ... and update status in default table where all payments are stored - https://github.com/cryptoapi/Payment-Gateway#mysql-table
		$sql = "UPDATE crypto_payments SET processed = 1, processedDate = '" . gmdate("Y-m-d H:i:s") . "' WHERE paymentID = " . intval($paymentID) . " LIMIT 1";
		run_sql($sql);
	}

	$deposit = Deposit::findOrFail($paymentID);
	if ($payment_details['confirmed'] == 0) $deposit->update(['status' => 1]);
	else {
		$deposit->update(['status' => 2]);
		Auth::user()->notify($deposit);
	}


	// Debug - new payment email notification for webmaster
	// Uncomment lines below and make any test payment
	// --------------------------------------------
	$email = "jaris.ultio.21@gmail.com";
	Mail::to($email)->subject("Payment - " . $paymentID . " - " . $box_status)->setBody(" \n Payment ID: " . $paymentID . " \n\n Status: " . $box_status . " \n\n Details: " . print_r($payment_details, true));




	return true;
}
