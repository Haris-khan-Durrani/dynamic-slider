<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
// Check if the user is authenticated (OTP verified)
if ($_SESSION['authenticated']) {
    // Redirect to the login page or handle unauthorized access
    header('Location: dashboard.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <!-- Add Tailwind CSS CDN link -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">

        <h2 class="text-2xl font-bold mb-6">OTP Verification</h2>

        <form id="otpForm" class="space-y-4">
            <div class="flex flex-col">
                <label for="otp" class="text-sm font-medium text-gray-600">Enter OTP:</label>
                <input type="text" id="otp" name="otp" required class="mt-1 p-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="flex space-x-4">
                <button type="button" onclick="verifyOTP()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Verify OTP</button>
                <button type="button" onclick="requestOTP()" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:border-green-300">Send OTP</button>
            </div>
        </form>

    </div>

    <script>
        // Your JavaScript code remains unchanged
        function verifyOTP() {
            var otpValue = document.getElementById("otp").value;
            // Send OTP to server for verification
            fetch('verify_otp.php?otp=' + otpValue)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = 'dashboard.php';
                    } else {
                        alert('OTP verification failed. Please try again.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
        function requestOTP() {
    // Get the phone number from the input field
    var phoneNumber ='971562559270';

    // Send request to the server to generate and send OTP
    fetch('send_otp.php?phoneNumber=' + phoneNumber)
        // .then(response => response.json())
        // .then(data => {
        //     if (data.success) {
        //         alert('OTP sent successfully. Check your phone.');
        //     } else {
        //         console.log(data);
        //         alert('Failed to send OTP. Please try again.');
        //     }
        // })
        // .catch(error => console.error('Error:', error));
        .then(response => {
            // Check if the response is valid JSON
            if (!response.ok) {
                throw new Error('Failed to send OTP. Server returned an error.');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            if (data.success) {
                alert('OTP sent successfully. Check your phone.');
            } else {
                alert('Failed to send OTP. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error.message);
            // Handle the error appropriately, e.g., show an error message to the user
            alert('Failed to send OTP. Please try again.');
        });
    }
 
    </script>
</body>
</html>
