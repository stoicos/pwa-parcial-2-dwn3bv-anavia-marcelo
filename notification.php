<?PHP
//tengo que pedir y se ejecuta con esos campos
//token
//title
//body

if(isset($_REQUEST['token']) && isset($_REQUEST['title']) && isset($_REQUEST['body'])) {
    enviarNotificacion();
} else {
    echo "Faltan datos";
}

function enviarNotificacion() {
    $url = 'https://fcm.googleapis.com/v1/projects/myproject-b5ae1/messages:send';
    $fields = array([
        'to' => $_REQUEST['token'],
        'notification' => [
            'title' => $_REQUEST['title'],
            'body' => $_REQUEST['body']
        ]
    ]);
    $headers = array([
        'Content-type: application/json',
        'Authorization: key=AAAA0gp98Hs:APA91bED92StENK22UbYnhbchU0-jYBmE_9Xk7NNjKYYDiuZqy0ca0tMrApM1NoXqktpyPwUKQHwa0tvAyXsDOfHofBxd3q1Cnrf9Sy4BltOosOJ6QkrDcRiaAsyKFk22D7hAusWUBdD'
    ]);
    //hago la request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
};

