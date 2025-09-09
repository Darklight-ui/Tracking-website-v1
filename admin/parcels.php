<?php
// admin/parcels.php - Parcel Management
require_once '../config/database.php';
require_once '../config/session.php';
require_once '../classes/Parcel.php';

requireAuth();

$database = new Database();
$db = $database->getConnection();
$parcel = new Parcel($db);

$success_message = '';
$error_message = '';

// Handle form submissions
if ($_POST) {
    if (isset($_POST['add_parcel'])) {
        $data = [
            'tracking_number' => $parcel->generateTrackingNumber(),
            'sender_name' => $_POST['sender_name'],
            'receiver_name' => $_POST['receiver_name'],
            'origin' => $_POST['origin'],
            'destination' => $_POST['destination'],
            'status' => $_POST['status']
        ];

        if ($parcel->create($data)) {
            $success_message = "Parcel added successfully with tracking number: " . $data['tracking_number'];
        } else {
            $error_message = "Error adding parcel.";
        }
    }

    if (isset($_POST['update_parcel'])) {
        $data = [
            'sender_name' => $_POST['sender_name'],
            'receiver_name' => $_POST['receiver_name'],
            'origin' => $_POST['origin'],
            'destination' => $_POST['destination'],
            'status' => $_POST['status']
        ];

        if ($parcel->update($_POST['parcel_id'], $data)) {
            $success_message = "Parcel updated successfully.";
        } else {
            $error_message = "Error updating parcel.";
        }
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    if ($parcel->delete($_GET['delete'])) {
        $success_message = "Parcel deleted successfully.";
    } else {
        $error_message = "Error deleting parcel.";
    }
}

// Get parcel for editing
$edit_parcel = null;
if (isset($_GET['edit'])) {
    $query = "SELECT * FROM parcels WHERE id = ? LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $_GET['edit']);
    $stmt->execute();
    $edit_parcel = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Get all parcels with search
$search = isset($_GET['search']) ? $_GET['search'] : '';
$all_parcels = $parcel->getAll(100);

// Filter parcels if search is provided
if ($search) {
    $all_parcels = array_filter($all_parcels, function ($p) use ($search) {
        return stripos($p['tracking_number'], $search) !== false ||
            stripos($p['sender_name'], $search) !== false ||
            stripos($p['receiver_name'], $search) !== false ||
            stripos($p['status'], $search) !== false;
    });
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Parcels - SwiftTrack Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Admin Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-shipping-fast text-blue-600 text-2xl"></i>
                    <span class="text-xl font-bold text-gray-800">SwiftTrack Admin</span>
                </div>

                <div class="flex items-center space-x-6">
                    <a href="dashboard.php" class="text-gray-700 hover:text-blue-600">Dashboard</a>
                    <a href="parcels.php" class="text-blue-600 font-semibold">Manage Parcels</a>
                    <a href="../index.php" class="text-gray-700 hover:text-blue-600">View Site</a>

                    <div class="flex items-center space-x-2">
                        <span class="text-gray-600">Welcome, <?php echo $_SESSION['admin_username']; ?></span>
                        <a href="logout.php" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Manage Parcels</h1>
            <p class="text-gray-600">Add, edit, and track all parcels in the system</p>
        </div>

        <!-- Messages -->
        <?php if ($success_message): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <?php if ($error_message): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Add/Edit Parcel Form -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">
                        <?php echo $edit_parcel ? 'Edit Parcel' : 'Add New Parcel'; ?>
                    </h2>

                    <form method="POST" class="space-y-4">
                        <?php if ($edit_parcel): ?>
                            <input type="hidden" name="parcel_id" value="<?php echo $edit_parcel['id']; ?>">
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2">Tracking Number</label>
                                <input type="text" value="<?php echo $edit_parcel['tracking_number']; ?>" readonly
                                    class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg">
                            </div>
                        <?php endif; ?>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Sender Name</label>
                            <input type="text" name="sender_name" required
                                value="<?php echo $edit_parcel ? htmlspecialchars($edit_parcel['sender_name']) : ''; ?>"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Receiver Name</label>
                            <input type="text" name="receiver_name" required
                                value="<?php echo $edit_parcel ? htmlspecialchars($edit_parcel['receiver_name']) : ''; ?>"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Origin</label>
                            <input type="text" name="origin" required
                                value="<?php echo $edit_parcel ? htmlspecialchars($edit_parcel['origin']) : ''; ?>"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Destination</label>
                            <input type="text" name="destination" required
                                value="<?php echo $edit_parcel ? htmlspecialchars($edit_parcel['destination']) : ''; ?>"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Status</label>
                            <select name="status" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="Pending" <?php echo ($edit_parcel && $edit_parcel['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                <option value="In Transit" <?php echo ($edit_parcel && $edit_parcel['status'] == 'In Transit') ? 'selected' : ''; ?>>In Transit</option>
                                <option value="Out for Delivery" <?php echo ($edit_parcel && $edit_parcel['status'] == 'Out for Delivery') ? 'selected' : ''; ?>>Out for Delivery
                                </option>
                                <option value="Delivered" <?php echo ($edit_parcel && $edit_parcel['status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                            </select>
                        </div>

                        <div class="flex space-x-2">
                            <?php if ($edit_parcel): ?>
                                <button type="submit" name="update_parcel"
                                    class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">
                                    <i class="fas fa-save mr-2"></i>Update Parcel
                                </button>
                                <a href="parcels.php"
                                    class="flex-1 text-center bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600">
                                    Cancel
                                </a>
                            <?php else: ?>
                                <button type="submit" name="add_parcel"
                                    class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">
                                    <i class="fas fa-plus mr-2"></i>Add Parcel
                                </button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Parcels List -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-gray-800">All Parcels</h2>

                            <!-- Search -->
                            <form method="GET" class="flex">
                                <input type="text" name="search" placeholder="Search parcels..."
                                    value="<?php echo htmlspecialchars($search); ?>"
                                    class="px-4 py-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-500">
                                <button type="submit"
                                    class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tracking Number</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Route</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Created</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php if (empty($all_parcels)): ?>
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                            <?php echo $search ? 'No parcels found matching your search.' : 'No parcels found. Add your first parcel!'; ?>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($all_parcels as $parcel_item): ?>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="font-medium text-blue-600">
                                                    <?php echo $parcel_item['tracking_number']; ?></div>
                                                <div class="text-sm text-gray-500">
                                                    <?php echo htmlspecialchars($parcel_item['sender_name']); ?> →
                                                    <?php echo htmlspecialchars($parcel_item['receiver_name']); ?>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-900">
                                                    <?php echo htmlspecialchars($parcel_item['origin']); ?></div>
                                                <div class="text-sm text-gray-500">↓</div>
                                                <div class="text-sm text-gray-900">
                                                    <?php echo htmlspecialchars($parcel_item['destination']); ?></div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                                   <?php
                                                   switch ($parcel_item['status']) {
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
                                                    <?php echo $parcel_item['status']; ?>
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <?php echo date('M j, Y g:i A', strtotime($parcel_item['created_at'])); ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                                <a href="?edit=<?php echo $parcel_item['id']; ?>"
                                                    class="text-blue-600 hover:text-blue-900" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="../track.php?tracking_number=<?php echo $parcel_item['tracking_number']; ?>"
                                                    target="_blank" class="text-green-600 hover:text-green-900"
                                                    title="View Tracking">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                                <a href="?delete=<?php echo $parcel_item['id']; ?>"
                                                    onclick="return confirm('Are you sure you want to delete this parcel?')"
                                                    class="text-red-600 hover:text-red-900" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>