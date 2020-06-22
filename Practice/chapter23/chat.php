<?php

session_start();

ob_start();

header("Content-type: application/json"); // We set a Content-Type response header with the value of application/json to ensure the requesting client knows we will be returning a JSON document as a response.

date_default_timezone_set('UTC'); // you use date_default_timezone_set() to match the timezone for the server, so that your chat timestamps are all lined up.

//connect to database

$db = mysqli_connect('localhost', 'chatUser', 'chatUser', 'chat');


if (mysqli_connect_errno()) {
    echo '<p>Error: Could not connect to database.<br/>
   Please try again later.</p>';
    exit;
}

try {

    $currentTime = time();
    $session_id = session_id();

    $lastPoll = isset($_SESSION['last_poll']) ?
        $_SESSION['last_poll'] : $currentTime;



    $action = isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == 'POST') ?
        'send' : 'poll';

    switch ($action) { // We are going to define the action we take by the nature of the request we receive from the user interface. For HTTP GET requests, we will retrieve a list of messages that have yet to be seen by the user and return them to the screen. For HTTP POST requests (form submissions), we will accept a new message to be broadcast to all the other users.

        case 'poll': // 
            $query = "SELECT * FROM chatlog WHERE
                     date_created >= ?";

            $stmt = $db->prepare($query);
            $stmt->bind_param('s', $lastPoll);
            $stmt->execute();
            $stmt->bind_result($id, $message, $session_id, $date_created);
            $result = $stmt->get_result();


            $newChats = [];
            while ($chat = $result->fetch_assoc()) {

                if ($session_id == $chat['sent_by']) {
                    $chat['sent_by'] = 'self';
                } else {
                    $chat['sent_by'] = 'other';
                }
                $newChats[] = $chat;
            }

            $_SESSION['last_poll'] = $currentTime;


            print json_encode([
                'success' => true,
                'messages' => $newChats
            ]);
            exit;


        case 'send':

            $message = isset($_POST['message']) ? $_POST['message'] : '';
            $message = strip_tags($message);


            $query = "INSERT INTO chatlog (message, sent_by, date_created)
                      VALUES(?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param('ssi', $message, $session_id, $currentTime);
            $stmt->execute();

            print json_encode(['success' => true]);
            exit;
    }
} catch (\Exception $e) {
    print json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
    // Regardless of the nature of the request, this script always returns a JSON object that has a key called success that will be either a Boolean true or false depending on the success of the operation. If false, we will also provide an error key with an error message. If we are handling an HTTP GET operation we will additionally return a messages key containing a list of messages the client should render.
}
