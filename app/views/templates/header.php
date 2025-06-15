<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Optional: Basic transition for smoother sidebar animation */
        .sidebar-mobile {
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>

<body class="flex min-h-screen bg-gray-100">

    <button id="mobile-menu-button" class="lg:hidden fixed top-4 left-4 z-50 p-2 rounded-md bg-blue-600 text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <aside id="sidebar" class="sidebar-mobile transform -translate-x-full lg:translate-x-0
                                 fixed inset-y-0 left-0 z-40
                                 w-64 bg-gray-800 text-white
                                 flex flex-col
                                 shadow-lg lg:shadow-none
                                 h-screen overflow-y-auto"> <div class="p-6 flex items-center justify-center border-b border-gray-700">
            <img src="<?=BASEURL?>/images/logo.jpg" alt="Expedition Logo" class="h-10 w-10 rounded-full mr-3">
            <span class="text-2xl font-semibold text-white">ExpeditionCo</span>
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="<?=BASEURL?>" class="flex items-center px-4 py-2 rounded-md bg-gray-700 text-white transition duration-200 ease-in-out">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m0 0l7 7m-15 0H5a1 1 0 00-1 1v3m0-3h12a1 1 0 011 1v3"></path>
                </svg>
                Dashboard
            </a>
            <a href="<?=BASEURL?>/pelacakan" class="flex items-center px-4 py-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white transition duration-200 ease-in-out">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Lacak Paket
            </a>
            <a href="<?=BASEURL?>/pengiriman" class="flex items-center px-4 py-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white transition duration-200 ease-in-out">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2m-2 4h2m-2 4h2m-2 4h2M12 4v16"></path>
                </svg>
                New Order
            </a>
            <a href="<?=BASEURL?>/laporan" class="flex items-center px-4 py-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white transition duration-200 ease-in-out">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-4m0 0l4-4m-4 4L6 6"></path>
                </svg>
                Reports
            </a>
            <a href="#" class="flex items-center px-4 py-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white transition duration-200 ease-in-out">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4h.01M6 18H4m0 2H2a1 1 0 01-1-1v-3.586a1 1 0 01.293-.707l2.5-2.5a1 1 0 01.707-.293H7m0 0h2.086c.287-.287.712-.452 1.157-.428L15 4a2 2 0 012 2v2m0 0h2.086c.287-.287.712-.452 1.157-.428L21 8a2 2 0 012 2v2m0 0h2.086c.287-.287.712-.452 1.157-.428L21 12a2 2 0 012 2v2"></path>
                </svg>
                Settings
            </a>
        </nav>

        <div class="p-4 border-t border-gray-700">
            <div class="flex items-center">
                <img src="<?=BASEURL?>/images/logo.jpg" alt="User Avatar" class="h-8 w-8 rounded-full mr-3">
                <div>
                    <p class="font-medium text-white">John Doe</p>
                    <p class="text-sm text-gray-400">Expedition Manager</p>
                </div>
            </div>
            <button class="mt-4 w-full bg-blue-700 hover:bg-blue-800 text-white py-2 rounded-md transition duration-200 ease-in-out">
                Logout
            </button>
        </div>
    </aside>

    <main class="flex-1 overflow-y-auto p-6 lg:p-10 lg:ml-64">