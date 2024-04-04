<?php


    // Filter and validate input
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Check if both name and message are provided
    if (empty($name) || empty($message)) {
        die('Both Name and Message are required.');
    }

    // MongoDB connection
    $mongoClient = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    // Data to insert
    $data = [
        [
            'name' => $name,
            'message' => $message,
        ]
    ];

    // BulkWrite instance
    $bulkWrite = new MongoDB\Driver\BulkWrite;

    // Insert each document into the collection
    foreach ($data as $document) {
        $bulkWrite->insert($document);
    }

    // Collection name
    $collection = 'nibm.massege'; 

    // Execute the bulk write operation
    try {
        $mongoClient->executeBulkWrite($collection, $bulkWrite);
        echo 'Feedback submitted successfully.';
    } catch (MongoDB\Driver\Exception\Exception $e) {
        echo 'An error occurred: ' . $e->getMessage();
    }

  header("Location:index.php");

?>