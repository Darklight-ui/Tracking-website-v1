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
    <title>Contact Us - SwiftTrack</title>
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
                    <a href="services.php" class="text-gray-700 hover:text-blue-600">Services</a>
                    <a href="track.php" class="text-gray-700 hover:text-blue-600">Track Parcel</a>
                    <a href="contact.php" class="text-blue-600 font-semibold">Contact</a>
                    <a href="admin/login.php"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Admin Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Contact Us</h1>
            <p class="text-xl">We're here to help with all your shipping needs</p>
        </div>
    </div>

    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Send us a Message</h2>
                    <form id="contact-form" class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">First Name</label>
                                <input type="text" name="first_name" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Last Name</label>
                                <input type="text" name="last_name" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Email Address</label>
                            <input type="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Phone Number</label>
                            <input type="tel" name="phone"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Subject</label>
                            <select name="subject" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Select a subject</option>
                                <option value="tracking">Tracking Issue</option>
                                <option value="shipping">Shipping Inquiry</option>
                                <option value="billing">Billing Question</option>
                                <option value="complaint">Complaint</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Message</label>
                            <textarea name="message" rows="5" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Please describe your inquiry or concern..."></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 font-semibold">
                            <i class="fas fa-paper-plane mr-2"></i>Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <!-- Contact Details -->
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Get in Touch</h2>
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <i class="fas fa-phone text-blue-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Phone</h3>
                                    <p class="text-gray-600">+1 (555) 123-4567</p>
                                    <p class="text-sm text-gray-500">Mon-Fri 8AM-8PM EST</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="bg-green-100 p-3 rounded-full">
                                    <i class="fas fa-envelope text-green-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Email</h3>
                                    <p class="text-gray-600">support@swifttrack.com</p>
                                    <p class="text-sm text-gray-500">We'll respond within 24 hours</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="bg-purple-100 p-3 rounded-full">
                                    <i class="fas fa-map-marker-alt text-purple-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Address</h3>
                                    <p class="text-gray-600">123 Delivery Street<br>Logistics City, LC 12345<br>United
                                        States</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Office Hours -->
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Office Hours</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Monday - Friday</span>
                                <span class="font-medium">8:00 AM - 8:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Saturday</span>
                                <span class="font-medium">9:00 AM - 5:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Sunday</span>
                                <span class="font-medium">10:00 AM - 4:00 PM</span>
                            </div>
                        </div>
                    </div>

                    <!-- Emergency Contact -->
                    <div class="bg-red-50 border border-red-200 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-red-800 mb-2">Emergency Support</h3>
                        <p class="text-red-700 mb-3">For urgent delivery issues outside business hours:</p>
                        <p class="text-red-800 font-semibold">📞 +1 (555) 911-HELP</p>
                        <p class="text-sm text-red-600 mt-2">Available 24/7 for critical shipment problems</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('contact-form').addEventListener('submit', function (e) {
            e.preventDefault();
            // Simple form submission feedback
            alert('Thank you for your message! We\'ll get back to you soon.');
            this.reset();
        });
    </script>
</body>

</html>