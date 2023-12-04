
function AddNavbar() {
    
    
    const navbarHTML = `
    <nav class="relative mx-10 mb-32 rounded-b-2xl px-4 py-4 flex justify-between items-center bg-white">
        <a class="text-3xl font-bold leading-none" href="#">
            <img src="../pictures/logo_nav.png" alt="" width="100">
        </a>


        <div class="relative hidden sm:block  text-gray-600">
            <input type="search" name="serch" placeholder="Search"
                class="bg-white w-96 h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
            <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                    width="512px" height="512px">
                    <path
                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg>
            </button>
        </div>

        <div class="lg:hidden">
            <button class="navbar-burger flex items-center text-blue-600 p-3">
                <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>

        <a href="#_"
            class=" relative hidden lg:block left-[10%] px-10 py-3 w-48 overflow-hidden font-bold rounded-full group">
            <span class="w-32 h-32 rotate-45 translate-x-12 -translate-y-2 absolute top-0 bg-black opacity-[3%]"></span>
            <span
                class="absolute top-0 left-0 w-48 h-48 -mt-1 transition-all duration-900 ease-in-out rotate-45 -translate-x-56 -translate-y-24 bg-black opacity-100 group-hover:-translate-x-1"></span>
            <span
                class="relative w-full text-left text-blbg-black transition-colors duration-500 ease-in-out group-hover:text-gray-200">Se
                connecter</span>
            <span class="absolute inset-0 border-2 border-blbg-black rounded-full"></span>
        </a>
        <a href="#_"
            class="relative hidden lg:block inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-red-500 rounded-xl group">
            <span
                class="absolute top-0 right-0 inline-block w-4 h-4 transition-all duration-500 ease-in-out bg-red-700 rounded group-hover:-mr-4 group-hover:-mt-4">
                <span
                    class=" absolute top-0 right-0 w-5 h-5 rotate-45 translate-x-1/2 -translate-y-1/2 bg-white"></span>
            </span>
            <span
                class="absolute bottom-0 left-0 w-full h-full transition-all duration-500 ease-in-out delay-200 -translate-x-full translate-y-full bg-red-700 rounded-2xl group-hover:mb-12 group-hover:translate-x-0"></span>
            <span
                class=" relative w-full text-left text-white transition-colors duration-200 ease-in-out group-hover:text-white">Publier
                une annonce</span>
        </a>
    </nav>
    <div class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav
            class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex items-center mb-8 ">
                <a class="mr-auto text-3xl font-bold leading-none" href="#">
                    <img src="../pictures/logo_nav.png" alt="" width="100">
                </a>
                <button class="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="relative text-gray-600">
                <input type="search" name="serch" placeholder="Search"
                    class="bg-white w-[330px] h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                        xml:space="preserve" width="512px" height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>
            </div>
            <div class="mt-auto">
                <div class="pt-6">

                    <a href="#_"
                        class="relative ml-20 inline-flex bottom-72 items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-red-500 rounded-xl group">
                        <span
                            class="absolute top-0 right-0 inline-block w-4 h-4 transition-all duration-500 ease-in-out bg-red-700 rounded group-hover:-mr-4 group-hover:-mt-4">
                            <span
                                class=" absolute top-0 right-0 w-5 h-5 rotate-45 translate-x-1/2 -translate-y-1/2 bg-white"></span>
                        </span>
                        <span
                            class="absolute bottom-0 left-0 w-full h-full transition-all duration-500 ease-in-out delay-200 -translate-x-full translate-y-full bg-red-600 rounded-2xl group-hover:mb-12 group-hover:translate-x-0"></span>
                        <span
                            class=" relative w-full text-left text-white transition-colors duration-200 ease-in-out group-hover:text-white">Publier
                            une annonce</span>
                    </a>
                    <a href="#_" class="relative left-[100px] bottom-64 inline-block text-lg group">
                        <span
                            class="relative z-10 block px-5 py-3 overflow-hidden font-medium leading-tight text-gray-800 transition-colors duration-300 ease-out border-2 border-gray-900 rounded-lg group-hover:text-white">
                            <span class="absolute inset-0 w-full h-full px-5 py-3 rounded-lg bg-gray-50"></span>
                            <span
                                class="absolute left-0 w-48 h-48 -ml-2 transition-all duration-300 origin-top-right -rotate-90 -translate-x-full translate-y-12 bg-gray-900 group-hover:-rotate-180 ease"></span>
                            <span class="relative">Se connecter</span>
                        </span>
                        <span
                            class="absolute bottom-0 right-0 w-full h-12 -mb-1 -mr-1 transition-all duration-200 ease-linear bg-gray-900 rounded-lg group-hover:mb-0 group-hover:mr-0"
                            data-rounded="rounded-lg"></span>
                    </a>
                </div>
                <p class="my-4 text-xs text-center text-gray-400">
                    <span>Copyright © 2021</span>
                </p>
            </div>
        </nav>
    </div>
    `;

    const container = document.getElementById('navbar-container');

    container.innerHTML = navbarHTML;
}

    AddNavbar();
