<?php
  require 'vendor/autoload.php';
  require_once 'constants/SampleCodeConstants.php';
//  use PHPMailer\PHPMailer\PHPMailer;
//  use PHPMailer\PHPMailer\Exception;
  use net\authorize\api\contract\v1 as AnetAPI;
  use net\authorize\api\controller as AnetController;

  define("AUTHORIZENET_LOG_FILE", "phplog");

    /* Create a merchantAuthenticationType object with authentication details
       retrieved from the constants file */
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);

    // Set the transaction's refId
    $refId = 'ref' . time();

    // Create the payment data for a credit card
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($_POST['CardNo']);
    $creditCard->setExpirationDate($_POST['Expire']);
    $creditCard->setCardCode($_POST['CardCode']);
    $amount=$_SESSION['Amount'];

    // Add the payment data to a paymentType object
    $paymentOne = new AnetAPI\PaymentType();
    $paymentOne->setCreditCard($creditCard);

    // Create order information
    $order = new AnetAPI\OrderType();
    $order->setInvoiceNumber("10101");
    $order->setDescription("Student Fees");

    // Set the customer's Bill To address
    $customerAddress = new AnetAPI\CustomerAddressType();
    $customerAddress->setFirstName($_POST['Fname']);
    $customerAddress->setLastName($_POST['Lname']);
    $customerAddress->setCompany($_POST['Company']);
    $customerAddress->setAddress($_POST['Address']);
    $customerAddress->setCity($_POST['City']);
    $customerAddress->setState($_POST['State']);
    $customerAddress->setZip($_POST['Zip']);
    $customerAddress->setCountry($_POST['Country']);

    // Set the customer's identifying information
    $customerData = new AnetAPI\CustomerDataType();
    $customerData->setType("individual");
    $customerData->setId("99999456654");
    $customerData->setEmail($_SESSION['Email']);

    // Add values for transaction settings
    $duplicateWindowSetting = new AnetAPI\SettingType();
    $duplicateWindowSetting->setSettingName("duplicateWindow");
    $duplicateWindowSetting->setSettingValue("60");

    // Add some merchant defined fields. These fields won't be stored with the transaction,
    // but will be echoed back in the response.
    $merchantDefinedField1 = new AnetAPI\UserFieldType();
    $merchantDefinedField1->setName("customerLoyaltyNum");
    $merchantDefinedField1->setValue("1128836273");

    $merchantDefinedField2 = new AnetAPI\UserFieldType();
    $merchantDefinedField2->setName("favoriteColor");
    $merchantDefinedField2->setValue("blue");

    // Create a TransactionRequestType object and add the previous objects to it
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("authOnlyTransaction"); 
    $transactionRequestType->setAmount($amount);
    $transactionRequestType->setOrder($order);
    $transactionRequestType->setPayment($paymentOne);
    $transactionRequestType->setBillTo($customerAddress);
    $transactionRequestType->setCustomer($customerData);
    $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
    $transactionRequestType->addToUserFields($merchantDefinedField1);
    $transactionRequestType->addToUserFields($merchantDefinedField2);

    // Assemble the complete transaction request
    $request = new AnetAPI\CreateTransactionRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setRefId($refId);
    $request->setTransactionRequest($transactionRequestType);

    // Create the controller and get the response
    $controller = new AnetController\CreateTransactionController($request);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);


    if ($response != null) {
        // Check to see if the API request was successfully received and acted upon
        if ($response->getMessages()->getResultCode() == "Ok") {
            // Since the API request was successful, look for a transaction response
            // and parse it to display the results of authorizing the card
            $tresponse = $response->getTransactionResponse();
        
            if ($tresponse != null && $tresponse->getMessages() != null) {
                echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
                echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
                echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
                echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";

                // Sending MAIL to customer
                // $mail = new PHPMailer(true);                              
                // try {
                //     //Server settings
                //     $mail->isSMTP();                                      
                //     $mail->Host = 'smtp.gmail.com';  
                //     $mail->SMTPAuth = true;                               
                //     $mail->Username = 'portal.nu.edu@gmail.com';                 
                //     $mail->Password = 'fast@123';   
                //     $mail->SMTPSecure = 'tls';                            
                //     $mail->Port = 587;                                    

                //     //Recipients
                //     $mail->setFrom('portal.nu.edu@gmail.com', 'no-reply@nu.portal');
                //     $mail->addAddress($_SESSION['Email']);


                //     //Content
                //     $mail->isHTML(true);
                //     $mail->Subject = 'Transaction Successful';
                //     $mail->Body = 'Hello, ' . $_POST['Fname']  . 
                //           '. <br>Your transaction was successful! 
                //           <br> Credit card no: ' . $creditCard . ' <br>
                //           Amount charged: ' . $_SESSION['amount'] . '<br>' .
                //           'Description: Student Fees' . '<br>';
                //     $mail->send();
                // } catch (Exception $e) {
                //     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                //     die();
                // }

            } else {
                echo "Transaction Failed \n";
                if ($tresponse->getErrors() != null) {
                    $_SESSION['Error']='1';
                    echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                }
            }
            // Or, print errors if the API request wasn't successful
        } else {
            $_SESSION['Error']='1';
            echo "Transaction Failed \n";
            $tresponse = $response->getTransactionResponse();
        
            if ($tresponse != null && $tresponse->getErrors() != null) {
                echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
            } else {
                echo " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                echo " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
            }
        }      
    } else {
        $_SESSION['Error']='1';
        echo  "No response returned \n";
    }
    die();
?>