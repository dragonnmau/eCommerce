<?php

return [
    # Define your application mode here
    'mode' => 'sandbox',

    # Account credentials from developer portal
    'account' => [
        'client_id' => env('PAYPAL_CLIENT_ID', 'AdckyJdwh6RhQOfMUO-CIY57_8UjZ1e4SIv1AoeSBEYnfcHtoXN34wkzqqRPqcN7UJu3IhsvS18Jp3D6'),
        'client_secret' => env('PAYPAL_CLIENT_SECRET', 'EBtZYJu3wzI85sgSHDd3BofkrKT2XLbhbPcr2Z1CTUb6Mtws67m-YfMBPFNWKulcTWdxUlbLIbayNFvx'),
    ],

    # Connection Information
    'http' => [
        'connection_time_out' => 30,
        'retry' => 1,
    ],

    # Logging Information
    'log' => [
        'log_enabled' => true,

        # When using a relative path, the log file is created
        # relative to the .php file that is the entry point
        # for this request. You can also provide an absolute
        # path here
        'file_name' => '../PayPal.log',

        # Logging level can be one of FINE, INFO, WARN or ERROR
        # Logging is most verbose in the 'FINE' level and
        # decreases as you proceed towards ERROR
        'log_level' => 'FINE',
    ],
];
