<div class="space-y-6">
    {{-- <h3 class="text-xl font-semibold">Social accounts</h3> --}}
    <ul class="space-y-4">
        <!-- Facebook -->
        <li class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
                <i class="fab fa-facebook-square text-2xl text-blue-600"></i>
            </div>
            <div class="flex-1">
                <span class="font-medium">Facebook account</span>
                <a href="{{ $company->facebook_url }}" target="_blank"
                    class="flex items-center space-x-4 text-gray-700 hover:text-blue-600 transition">
                    <span
                        class="font-medium truncate">{{ parse_url($company->facebook_url, PHP_URL_HOST) ?? 'Non renseigné' }}</span>
                </a>
            </div>
            <button class="text-white  bg-primary rounded-lg px-4 py-2">
                <a href="{{ $company->facebook_url }}" target="_blank" class="hover:underline">Connect</a>
            </button>
        </li>
         <!-- Twitter -->
         <li class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
                <i class="fab fa-twitter text-2xl text-blue-400"></i>
            </div>
            <div class="flex-1">
                <span class="font-medium">Twitter account</span>
                <a href="{{ $company->twitter_url }}" target="_blank"
                    class="flex items-center space-x-4 text-gray-700 hover:text-blue-600 transition">
                    <span
                        class="font-medium truncate">{{ parse_url($company->twitter_url, PHP_URL_HOST) ?? 'Non renseigné' }}</span>
                </a>
            </div>
            <button class="text-white  bg-primary rounded-lg px-4 py-2">
                <a href="{{ $company->twitter_url }}" target="_blank" class="hover:underline">Connect</a>
            </button>
        </li>
        <!-- Instagram -->
        <li class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
                <i class="fab fa-instagram text-2xl text-pink-500"></i>
            </div>
            <div class="flex-1">
                <span class="font-medium">Instagram account</span>
                <a href="{{ $company->instagram_url }}" target="_blank"
                    class="flex items-center space-x-4 text-gray-700 hover:text-pink-500 transition">
                    <span
                        class="font-medium truncate">{{ parse_url($company->instagram_url, PHP_URL_HOST) ?? 'Non renseigné' }}</span>
                </a>
            </div>
            <button class="text-white  bg-primary rounded-lg px-4 py-2">
                <a href="{{ $company->instagram_url }}" target="_blank" class="hover:underline">Connect</a>
            </button>
        </li>

        <!-- LinkedIn -->
        <li class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
                <i class="fab fa-linkedin text-2xl text-blue-700"></i>
            </div>
            <div class="flex-1">
                <span class="font-medium">LinkedIn account</span>
                <a href="{{ $company->linkedin_url }}" target="_blank"
                    class="flex items-center space-x-4 text-gray-700 hover:text-blue-700 transition">
                    <span
                        class="font-medium truncate">{{ parse_url($company->linkedin_url, PHP_URL_HOST) ?? 'Non renseigné' }}</span>
                </a>            </div>
            <button class="text-white  bg-primary rounded-lg px-4 py-2">
                <a href="{{ $company->linkedin_url }}" target="_blank" class="hover:underline">Connect</a>
            </button>
        </li>
        <!-- YouTube -->
        <li class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
                <i class="fab fa-youtube text-2xl text-red-500"></i>
            </div>
            <div class="flex-1">
                <span class="font-medium">YouTube account</span>
                <a href="{{ $company->youtube_url }}" target="_blank"
                    class="flex items-center space-x-4 text-gray-700 hover:text-red-500 transition">
                    <span
                        class="font-medium truncate">{{ parse_url($company->youtube_url, PHP_URL_HOST) ?? 'Non renseigné' }}</span>
                </a>
            </div>
            <button class="text-white  bg-primary rounded-lg px-4 py-2">
                <a href="{{ $company->youtube_url }}" target="_blank" class="hover:underline">Connect</a>
            </button>
        </li>
        <!-- TikTok -->
        <li class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
                <i class="fab fa-tiktok text-2xl text-black"></i>
            </div>
            <div class="flex-1">
                <span class="font-medium">TikTok account</span>
                <a href="{{ $company->tiktok_url }}" target="_blank"
                    class="flex items-center space-x-4 text-gray-700 hover:text-black transition">
                    <span
                        class="font-medium truncate">{{ parse_url($company->tiktok_url, PHP_URL_HOST) ?? 'Non renseigné' }}</span>
                </a>
            </div>
            <button class="text-white  bg-primary rounded-lg px-4 py-2">
                <a href="{{ $company->tiktok_url }}" class="hover:underline">Connect</a>
            </button>
        </li>
        <!-- Website -->
        <li class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
                <i class="fas fa-globe text-2xl text-green-600"></i>
            </div>
            <div class="flex-1">
                <span class="font-medium">Website account</span>
                <a href="{{ $company->website_url }}" target="_blank"
                    class="flex items-center space-x-4 text-gray-700 hover:text-green-600 transition">
                    <span
                        class="font-medium truncate">{{ parse_url($company->website_url, PHP_URL_HOST) ?? 'Non renseigné' }}</span>
                </a>
            </div>
            <button class="text-white  bg-primary rounded-lg px-4 py-2">
                <a href="{{ $company->website_url }}"  target="_blank" class="hover:underline">Connect</a>
            </button>
        </li>
    </ul>
</div>
