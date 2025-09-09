<?php
// track.php - Tracking Page
require_once 'config/database.php';
require_once 'classes/Parcel.php';

$database = new Database();
$db = $database->getConnection();
$parcel = new Parcel($db);

$tracking_result = null;
$error_message = '';

if (isset($_GET['tracking_number']) && !empty($_GET['tracking_number'])) {
    $tracking_number = trim($_GET['tracking_number']);
    $tracking_result = $parcel->findByTrackingNumber($tracking_number);

    if (!$tracking_result) {
        $error_message = "Tracking number not found. Please check and try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="title" content="Parcel Tracking | Fast & Secure Worldwide Tracking">
    <meta name="description"
        content="Track your parcels in real-time with our fast, reliable, and secure worldwide tracking system. Enter your tracking number and get instant updates on your shipment status.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://yourdomain.com/">
    <meta property="og:title" content="Parcel Tracking | Fast & Secure Worldwide Tracking">
    <meta property="og:description"
        content="Track your parcels in real-time with our fast, reliable, and secure worldwide tracking system.">
    <meta property="og:image" content="https://yourdomain.com/og-image.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://yourdomain.com/">
    <meta property="twitter:title" content="Parcel Tracking | Fast & Secure Worldwide Tracking">
    <meta property="twitter:description"
        content="Track your parcels in real-time with our fast, reliable, and secure worldwide tracking system.">
    <meta property="twitter:image" content="https://yourdomain.com/og-image.jpg">

    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>Track Your Parcel - SwiftTrack</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="src/output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <?php include "include/navigation/navigation.php" ?>

    <div class="min-h-screen py-12">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Track Your Parcel</h1>
                <p class="text-gray-600">Enter your tracking number to get real-time updates</p>
            </div>

            <!-- Search Form -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <form method="GET" class="flex flex-col sm:flex-row gap-4">
                    <input type="text" name="tracking_number" placeholder="Enter tracking number (e.g., TRK123456)"
                        value="<?php echo isset($_GET['tracking_number']) ? htmlspecialchars($_GET['tracking_number']) : ''; ?>"
                        class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required>
                    <button type="submit"
                        class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 font-semibold">
                        <i class="fas fa-search mr-2"></i>Track Package
                    </button>
                </form>
            </div>

            <?php if ($error_message): ?>
                <!-- Error Message -->
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-8">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <span><?php echo $error_message; ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($tracking_result): ?>
                <!-- Tracking Result -->
                <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                    <div class="border-b pb-4 mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Tracking Details</h2>
                        <div class="flex flex-wrap items-center gap-4">
                            <span
                                class="text-lg font-semibold text-blue-600"><?php echo $tracking_result['tracking_number']; ?></span>
                            <span class="px-3 py-1 rounded-full text-sm font-medium 
                                   <?php
                                   switch ($tracking_result['status']) {
                                       case 'Pending':
                                           echo 'bg-yellow-100 text-yellow-800';
                                           break;
                                       case 'In Transit':
                                           echo 'bg-blue-100 text-blue-800';
                                           break;
                                       case 'Out for Delivery':
                                           echo 'bg-orange-100 text-orange-800';
                                           break;
                                       case 'Delivered':
                                           echo 'bg-green-100 text-green-800';
                                           break;
                                   }
                                   ?>">
                                <?php echo $tracking_result['status']; ?>
                            </span>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mb-8">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Delivery Progress</span>
                            <span class="text-sm text-gray-500">Last updated:
                                <?php echo date('M j, Y g:i A', strtotime($tracking_result['last_update'])); ?></span>
                        </div>

                        <?php
                        $statuses = ['Pending', 'In Transit', 'Out for Delivery', 'Delivered'];
                        $current_status = $tracking_result['status'];
                        $current_index = array_search($current_status, $statuses);
                        ?>

                        <div class="relative">
                            <div class="flex items-center justify-between">
                                <?php foreach ($statuses as $index => $status): ?>
                                    <div class="flex flex-col items-center flex-1">
                                        <div
                                            class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium
                                          <?php echo $index <= $current_index ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-600'; ?>">
                                            <?php if ($index <= $current_index): ?>
                                                <i class="fas fa-check"></i>
                                            <?php else: ?>
                                                <?php echo $index + 1; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div
                                            class="text-xs mt-2 text-center <?php echo $index <= $current_index ? 'text-blue-600 font-medium' : 'text-gray-500'; ?>">
                                            <?php echo $status; ?>
                                        </div>
                                    </div>
                                    <?php if ($index < count($statuses) - 1): ?>
                                        <div
                                            class="flex-1 h-1 mx-2 rounded-full <?php echo $index < $current_index ? 'bg-blue-600' : 'bg-gray-200'; ?>">
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Parcel Information -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Sender Information</h3>
                            <div class="space-y-2">
                                <div class="flex">
                                    <span class="text-gray-600 w-20">Name:</span>
                                    <span
                                        class="font-medium"><?php echo htmlspecialchars($tracking_result['sender_name']); ?></span>
                                </div>
                                <div class="flex">
                                    <span class="text-gray-600 w-20">Origin:</span>
                                    <span
                                        class="font-medium"><?php echo htmlspecialchars($tracking_result['origin']); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Receiver Information</h3>
                            <div class="space-y-2">
                                <div class="flex">
                                    <span class="text-gray-600 w-24">Name:</span>
                                    <span
                                        class="font-medium"><?php echo htmlspecialchars($tracking_result['receiver_name']); ?></span>
                                </div>
                                <div class="flex">
                                    <span class="text-gray-600 w-24">Destination:</span>
                                    <span
                                        class="font-medium"><?php echo htmlspecialchars($tracking_result['destination']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Tracking Timeline</h3>
                        <div class="border-l-2 border-blue-200 pl-4 ml-4">
                            <div class="mb-4">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-blue-600 rounded-full -ml-6 mr-3"></div>
                                    <span class="font-medium text-blue-600"><?php echo $tracking_result['status']; ?></span>
                                    <span
                                        class="text-gray-500 text-sm ml-2"><?php echo date('M j, Y g:i A', strtotime($tracking_result['last_update'])); ?></span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-gray-400 rounded-full -ml-6 mr-3"></div>
                                    <span class="text-gray-600">Package created</span>
                                    <span
                                        class="text-gray-500 text-sm ml-2"><?php echo date('M j, Y g:i A', strtotime($tracking_result['created_at'])); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Sample Tracking Numbers -->
            <div class="bg-blue-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-blue-800 mb-3">Need a sample tracking number?</h3>
                <p class="text-blue-700 mb-3">Try one of these demo tracking numbers:</p>
                <div class="flex flex-wrap gap-2">
                    <code class="bg-white px-3 py-1 rounded border text-blue-600 cursor-pointer hover:bg-blue-100"
                        onclick="document.querySelector('input[name=tracking_number]').value='TRK67890DEMO'">TRK67890DEMO</code>
                    <code class="bg-white px-3 py-1 rounded border text-blue-600 cursor-pointer hover:bg-blue-100"
                        onclick="document.querySelector('input[name=tracking_number]').value='TRK12345TEST'">TRK12345TEST</code>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>