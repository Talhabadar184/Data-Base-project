<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "phase3"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table_name = $_POST['Table_Name'];

    switch (strtolower($table_name)) {
        case 'event':
            $event_id = $_POST['eventid'];
            $event_name = $_POST['eventname'];
            $description = $_POST['description'];
            $start_date = $_POST['startdate'];
            $end_date = $_POST['enddate'];
           
            $sql = "INSERT INTO event (eventid, eventname, description, startdate, enddate) 
                    VALUES ('$event_id', '$event_name', '$description', '$start_date', '$end_date')";
            break;

        case 'location':
            $location_id = $_POST['locationid'];
            $venue_name = $_POST['venuename'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $capacity = $_POST['capacity'];
            

            $sql = "INSERT INTO location (locationid, venuename, city, state, capacity) 
                    VALUES ('$location_id', '$venue_name', '$city', '$state', '$capacity')";
            break;

        case 'organizer':
            $organizer_id = $_POST['organizerid'];
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
            $company_name = $_POST['companyname'];

            $sql = "INSERT INTO organizer (organizerid, firstname, lastname, companyname) 
                    VALUES ('$organizer_id', '$first_name', '$last_name', '$company_name')";
            break;

        case 'organizerphonenum':
            $organizer_phone_num1 = $_POST['OrganizerPhonenum1'];
            $organizer_phone_num2 = $_POST['OrganizerPhonenum2'];
            $organizer_id = $_POST['organizerid'];

            $sql = "INSERT INTO organizerphonenum (OrganizerPhonenum1, OrganizerPhonenum2, organizerid) 
                    VALUES ('$organizer_phone_num1', '$organizer_phone_num2', '$organizer_id')";
            break;

        case 'organizeremail':
            $organizer_email1 = $_POST['organizeremail1'];
            $organizer_email2 = $_POST['organizeremail2'];
            $organizer_id = $_POST['organizerid'];

            $sql = "INSERT INTO organizeremail (organizeremail1, organizeremail2, organizerid) 
                    VALUES ('$organizer_email1', '$organizer_email2', '$organizer_id')";
            break;

        case 'eventtype':
            $event_type = $_POST['eventtype'];
            $event_type_name = $_POST['eventtypename'];
            $description = $_POST['description'];
            

            $sql = "INSERT INTO eventtype (eventtype, eventtypename, description) 
                    VALUES ('$event_type', '$event_type_name', '$description')";
            break;

        case 'attendee':
            $attendee_id = $_POST['attendeeid'];
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
         
            $sql = "INSERT INTO attendee (attendeeid, firstname, lastname) 
                    VALUES ('$attendee_id', '$first_name', '$last_name')";
            break;

        case 'attendeephonenum':
            $attendee_phone_num1 = $_POST['AttendeePhonenum1'];
            $attendee_phone_num2 = $_POST['AttendeePhonenum2'];
            $attendee_id = $_POST['attendeeid'];

            $sql = "INSERT INTO attendeephonenum (AttendeePhonenum1, AttendeePhonenum2, attendeeid) 
                    VALUES ('$attendee_phone_num1', '$attendee_phone_num2', '$attendee_id')";
            break;

        case 'ticket':
            $ticket_id = $_POST['ticketid'];
            $ticket_type = $_POST['tickettype'];
            $purchase_date = $_POST['purchasedate'];
            $price = $_POST['price'];
          

            $sql = "INSERT INTO ticket (ticketid, tickettype, purchasedate, price) 
                    VALUES ('$ticket_id', '$ticket_type', '$purchase_date', '$price')";
            break;

        case 'sponsor':
            $sponsor_id = $_POST['sponsorid'];
            $sponsor_name = $_POST['sponsorname'];
            $contact_person = $_POST['contactperson'];
            $email = $_POST['email'];
            $contact_number = $_POST['contactnumber'];

            $sql = "INSERT INTO sponsor (sponsorid, sponsorname, contactperson, email, contactnumber) 
                    VALUES ('$sponsor_id', '$sponsor_name', '$contact_person', '$email', '$contact_number')";
            break;

        case 'speaker':
            $speaker_id = $_POST['speakerid'];
            $speaker_name = $_POST['speakername'];
            $contact_person = $_POST['contactperson'];

            $sql = "INSERT INTO speaker (speakerid, speakername, contactperson) 
                    VALUES ('$speaker_id', '$speaker_name', '$contact_person')";
            break;

        case 'task':
            $task_id = $_POST['taskid'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            

            $sql = "INSERT INTO task (taskid, description, status) 
                    VALUES ('$task_id', '$description', '$status')";
            break;

        case 'feedback':
            $feedback_id = $_POST['feedbackid'];
            $ratings = $_POST['ratings'];
            $comments = $_POST['comments'];
            

            $sql = "INSERT INTO feedback (feedbackid, ratings, comments) 
                    VALUES ('$feedback_id', '$ratings', '$comments')";
            break;

        default:
            echo "Invalid table name.";
            $conn->close();
            exit();
    }

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}