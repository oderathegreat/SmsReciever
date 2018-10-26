package com.onboard.sms;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.provider.Telephony;
import android.telephony.SmsMessage;
import android.widget.Toast;

public class SmsReceiver extends BroadcastReceiver {
    @Override
    public void onReceive(Context context, Intent intent) {


        Bundle bundle = intent.getExtras();

        //check if the sms contains any characters

        if (bundle != null ) {


     Object [] pdus = (Object[]) bundle.get("pdu");

        for (int x =0; x<pdus.length; x++ ) {

            SmsMessage sms = SmsMessage.createFromPdu((byte[]) pdus[x]);

            //getting the sender number
            String senderNumber = sms.getOriginatingAddress();
            //show content of the message
            String message = sms.getDisplayMessageBody();

            //Test code to show any incoming message

            Toast.makeText(context,  "From"+ senderNumber + "" + message,  Toast.LENGTH_SHORT).show();



        }

        }
    }
}
