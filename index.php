<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="title" content="Parcel Tracking | Fast & Secure Worldwide Tracking">
    <meta name="description"
        content="Track your parcels in real-time with our fast, reliable, and secure worldwide tracking system. Enter your tracking number and get instant updates on your shipment status.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="#">
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
    <title>SwiftTrack | Parcel Tracking | Fast & Secure Worldwide Tracking</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="src/output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <?php include "include/navigation/navigation.php" ?>

    <!-- Hero Section -->
    <div class="relative bg-cover bg-center text-white" style="background-image: url('assets/banner1.jpg');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-15"></div>

        <!-- Content -->
        <div class="relative max-w-7xl mx-auto px-4 py-20">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Track Your Parcels in Real-Time</h1>
                <p class="text-xl md:text-2xl mb-8">Fast, reliable, and secure parcel tracking worldwide</p>

                <!-- Quick Track Form -->
                <div class="max-w-md mx-auto">
                    <form action="track.php" method="GET" class="flex flex-col sm:flex-row gap-2">
                        <input type="text" name="tracking_number" placeholder="Enter tracking number"
                            class="flex-1 px-4 py-3 rounded-lg text-white border-amber-50 border-2 focus:ring-2 focus:ring-blue-300"
                            required>
                        <button type="submit"
                            class="bg-orange-500 text-white px-8 py-3 rounded-lg hover:bg-orange-600 font-semibold">
                            <i class="fas fa-search mr-2"></i>Track Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Features Section -->
    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Why Choose SwiftTrack?</h2>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Real-Time Tracking</h3>
                    <p class="text-gray-600">Get instant updates on your parcel's location and delivery status.</p>
                </div>

                <div class="text-center">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Secure & Reliable</h3>
                    <p class="text-gray-600">Your parcels are safe with our advanced security measures.</p>
                </div>

                <div class="text-center">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-globe text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Worldwide Coverage</h3>
                    <p class="text-gray-600">We deliver to over 200 countries and territories worldwide.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-gray-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold text-blue-400 mb-2">10M+</div>
                    <div class="text-gray-300">Parcels Delivered</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-green-400 mb-2">99.9%</div>
                    <div class="text-gray-300">Delivery Success</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-purple-400 mb-2">200+</div>
                    <div class="text-gray-300">Countries Served</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-orange-400 mb-2">24/7</div>
                    <div class="text-gray-300">Customer Support</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Service -->
    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Our Service</h2>
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
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-shipping-fast text-blue-400 text-2xl"></i>
                        <span class="text-xl font-bold">SwiftTrack</span>
                    </div>
                    <p class="text-gray-300">Your trusted partner for fast and reliable parcel delivery worldwide.</p>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Services</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li>Express Delivery</li>
                        <li>International Shipping</li>
                        <li>Same-Day Delivery</li>
                        <li>Bulk Shipping</li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Support</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li>Track Package</li>
                        <li>Help Center</li>
                        <li>Contact Us</li>
                        <li>FAQ</li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                    <div class="space-y-2 text-gray-300">
                        <div><i class="fas fa-phone mr-2"></i> +1 (555) 123-4567</div>
                        <div><i class="fas fa-envelope mr-2"></i> support@swifttrack.com</div>
                        <div><i class="fas fa-map-marker-alt mr-2"></i> 123 Delivery St, City</div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-300">
                <p>&copy; 2024 SwiftTrack. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>