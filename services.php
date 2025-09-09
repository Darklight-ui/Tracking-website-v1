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
    <title>Our Services - SwiftTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-shipping-fast text-blue-600 text-2xl"></i>
                    <span class="text-xl font-bold text-gray-800">SwiftTrack</span>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php" class="text-gray-700 hover:text-blue-600">Home</a>
                    <a href="services.php" class="text-blue-600 font-semibold">Services</a>
                    <a href="track.php" class="text-gray-700 hover:text-blue-600">Track Parcel</a>
                    <a href="contact.php" class="text-gray-700 hover:text-blue-600">Contact</a>
                    <a href="admin/login.php"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Admin Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Our Services</h1>
            <p class="text-xl">Comprehensive shipping solutions for all your needs</p>
        </div>
    </div>

    <!-- Services Grid -->
    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Express Delivery -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bolt text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-4">Express Delivery</h3>
                    <p class="text-gray-600 text-center mb-4">Fast and reliable express delivery for urgent packages.
                        Get your items delivered within 24-48 hours.</p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> 24-48 hour
                            delivery</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Real-time
                            tracking</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Insurance
                            included</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Signature on
                            delivery</li>
                    </ul>
                    <div class="text-center">
                        <span class="text-2xl font-bold text-blue-600">$25.99</span>
                        <span class="text-gray-500">starting from</span>
                    </div>
                </div>

                <!-- International Shipping -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-globe-americas text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-4">International Shipping</h3>
                    <p class="text-gray-600 text-center mb-4">Ship packages worldwide with customs handling and
                        documentation support.</p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> 200+ countries
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Customs clearance
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Duty & tax
                            calculator</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Documentation
                            support</li>
                    </ul>
                    <div class="text-center">
                        <span class="text-2xl font-bold text-blue-600">$45.99</span>
                        <span class="text-gray-500">starting from</span>
                    </div>
                </div>

                <!-- Same-Day Delivery -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-motorcycle text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-4">Same-Day Delivery</h3>
                    <p class="text-gray-600 text-center mb-4">Ultra-fast same-day delivery for local and urgent
                        shipments within city limits.</p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> 2-6 hour delivery
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Live GPS tracking
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> SMS notifications
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Photo proof
                            delivery</li>
                    </ul>
                    <div class="text-center">
                        <span class="text-2xl font-bold text-blue-600">$15.99</span>
                        <span class="text-gray-500">starting from</span>
                    </div>
                </div>

                <!-- Bulk Shipping -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-boxes text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-4">Bulk Shipping</h3>
                    <p class="text-gray-600 text-center mb-4">Cost-effective solutions for businesses shipping multiple
                        packages regularly.</p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Volume discounts
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Dedicated support
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> API integration
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Monthly reporting
                        </li>
                    </ul>
                    <div class="text-center">
                        <span class="text-2xl font-bold text-blue-600">Custom</span>
                        <span class="text-gray-500">pricing</span>
                    </div>
                </div>

                <!-- Fragile Items -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-wine-glass text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-4">Fragile Items</h3>
                    <p class="text-gray-600 text-center mb-4">Specialized handling and packaging for delicate and
                        fragile items with extra care.</p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Special packaging
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Careful handling
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Extra insurance
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Temperature
                            control</li>
                    </ul>
                    <div class="text-center">
                        <span class="text-2xl font-bold text-blue-600">$35.99</span>
                        <span class="text-gray-500">starting from</span>
                    </div>
                </div>

                <!-- White Glove Service -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-concierge-bell text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-4">White Glove Service</h3>
                    <p class="text-gray-600 text-center mb-4">Premium service with inside delivery, unpacking, and setup
                        for large or valuable items.</p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Inside delivery
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Unpacking service
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Installation help
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Debris removal
                        </li>
                    </ul>
                    <div class="text-center">
                        <span class="text-2xl font-bold text-blue-600">$89.99</span>
                        <span class="text-gray-500">starting from</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gray-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Ship?</h2>
            <p class="text-xl mb-8">Get started with our easy-to-use shipping platform today.</p>
            <div class="space-x-4">
                <a href="track.php"
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 font-semibold inline-block">Track
                    Package</a>
                <a href="contact.php"
                    class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg hover:bg-white hover:text-gray-800 font-semibold inline-block">Contact
                    Us</a>
            </div>
        </div>
    </div>
</body>

</html>