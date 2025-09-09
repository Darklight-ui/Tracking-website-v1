<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center space-x-2">
                <i class="fas fa-shipping-fast text-blue-600 text-2xl"></i>
                <span class="text-xl font-bold text-gray-800">SwiftTrack</span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-gray-700 hover:text-blue-600">Home</a>
                <a href="services.php" class="text-gray-700 hover:text-blue-600">Services</a>
                <a href="track.php" class="text-gray-700 hover:text-blue-600">Track Parcel</a>
                <a href="contact.php" class="text-gray-700 hover:text-blue-600">Contact</a>
                <a href="admin/login.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Admin
                    Login</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <a href="#" class="block py-2 text-gray-700 hover:text-blue-600">Home</a>
            <a href="services.php" class="block py-2 text-gray-700 hover:text-blue-600">Services</a>
            <a href="track.php" class="block py-2 text-gray-700 hover:text-blue-600">Track Parcel</a>
            <a href="contact.php" class="block py-2 text-gray-700 hover:text-blue-600">Contact</a>
            <a href="admin/login.php" class="block py-2 text-blue-600">Admin Login</a>
        </div>
    </div>
</nav>